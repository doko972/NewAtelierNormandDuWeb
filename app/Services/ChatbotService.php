<?php

namespace App\Services;

use App\Models\ChatMessage;
use App\Models\Setting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ChatbotService
{
    protected array $faq;

    public function __construct()
    {
        $this->faq = config('chatbot.faq');
    }

    public function reply(string $sessionId, string $userMessage, ?string $ip = null): string
    {
        ChatMessage::create([
            'session_id' => $sessionId,
            'role' => 'user',
            'content' => $userMessage,
            'ip' => $ip,
        ]);

        $answer = $this->matchFaq($userMessage) ?? $this->askOpenAI($sessionId, $userMessage);

        ChatMessage::create([
            'session_id' => $sessionId,
            'role' => 'assistant',
            'content' => $answer,
        ]);

        return $answer;
    }

    protected function matchFaq(string $message): ?string
    {
        $normalized = Str::lower($message);

        // Cas spécial : demande explicite du téléphone (seul cas où on le communique)
        if (Str::contains($normalized, ['téléphone', 'telephone', 'numéro', 'numero', 'joindre par tel', 'appeler'])) {
            $phone = Setting::where('key', 'phone')->value('value');

            return $phone
                ? "Vous pouvez joindre David au {$phone}."
                : "Le plus simple est de passer par le formulaire de contact, David revient vers vous rapidement.";
        }

        foreach ($this->faq as $entry) {
            foreach ($entry['keywords'] as $keyword) {
                if (Str::contains($normalized, $keyword)) {
                    return $entry['answer'];
                }
            }
        }

        return null;
    }

    protected function askOpenAI(string $sessionId, string $userMessage): string
    {
        $history = ChatMessage::where('session_id', $sessionId)
            ->latest()
            ->take(10)
            ->get()
            ->reverse()
            ->map(fn ($m) => ['role' => $m->role, 'content' => $m->content])
            ->values()
            ->all();

        $response = Http::withToken(config('services.openai.key'))
            ->timeout(15)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => config('services.openai.model'),
                'messages' => [
                    ['role' => 'system', 'content' => $this->systemPrompt()],
                    ...$history,
                ],
                'max_tokens' => 400,
                'temperature' => 0.4,
            ]);

        if ($response->failed()) {
            return "Désolé, je rencontre un souci technique. Vous pouvez utiliser le formulaire de contact en attendant.";
        }

        return trim($response->json('choices.0.message.content') ?? "Désolé, je n'ai pas compris votre question.");
    }

    protected function systemPrompt(): string
    {
        return <<<PROMPT
Tu es l'assistant du site de l'Atelier Normand du Web, micro-entreprise de David GROUGI basée à Mondeville (Normandie).

Activité : développement web sur-mesure (Laravel), applications Android, automatisation (chatbots, connexions d'outils), et services informatiques (dépannage, installation, baies informatiques, sensibilisation à l'IA).

Positionnement : contrairement aux agences classiques, les clients sont propriétaires de leur site (pas d'abonnement mensuel forcé), avec des tarifs transparents expliqués avant tout devis.

Règles :
- Réponds en français, de façon concise et chaleureuse, sans jargon inutile.
- Ne donne jamais le numéro de téléphone sauf si on te le demande explicitement.
- Ne donne aucun tarif précis (ils dépendent du projet) : oriente vers le formulaire de contact pour un devis.
- Si tu ne sais pas répondre, propose le formulaire de contact plutôt que d'inventer une réponse.
PROMPT;
    }
}