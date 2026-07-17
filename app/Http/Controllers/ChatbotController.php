<?php

namespace App\Http\Controllers;

use App\Services\ChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    protected const DAILY_LIMIT = 40;

    public function store(Request $request, ChatbotService $chatbot): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:1000'],
            'session_id' => ['nullable', 'uuid'],
        ]);

        $sessionId = $validated['session_id'] ?? (string) Str::uuid();

        // Plafond quotidien par IP — maîtrise du coût des appels OpenAI
        $cacheKey = 'chatbot_daily_' . $request->ip();
        $count = Cache::get($cacheKey, 0);

        if ($count >= self::DAILY_LIMIT) {
            return response()->json([
                'session_id' => $sessionId,
                'reply' => "Vous avez atteint la limite de messages pour aujourd'hui. N'hésitez pas à utiliser le formulaire de contact.",
            ]);
        }

        Cache::put($cacheKey, $count + 1, now()->endOfDay());

        $reply = $chatbot->reply($sessionId, $validated['message'], $request->ip());

        return response()->json([
            'session_id' => $sessionId,
            'reply' => $reply,
        ]);
    }
}