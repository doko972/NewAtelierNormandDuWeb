<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            // Honeypot : ce champ doit rester vide. Un bot le remplit, un humain ne le voit jamais.
            'website' => ['prohibited'],
            'g-recaptcha-response' => ['required', 'captcha'],
        ];
    }

    public function messages(): array
    {
        return [
            'g-recaptcha-response.required' => 'Merci de valider le captcha.',
            'g-recaptcha-response.captcha' => 'La validation du captcha a échoué, réessaie.',
        ];
    }
}