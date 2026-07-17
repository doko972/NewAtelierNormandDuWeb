<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMediaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public function rules(): array
    {
        return [
            'file' => ['required', 'file', 'mimes:jpg,jpeg,png,webp,svg,pdf', 'max:5120'],
            'alt_fr' => ['nullable', 'string', 'max:255'],
            'alt_en' => ['nullable', 'string', 'max:255'],
            'page_id' => ['nullable', 'exists:pages,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'file.mimes' => 'Formats acceptés : jpg, jpeg, png, webp, svg, pdf.',
            'file.max' => 'Le fichier ne doit pas dépasser 5 Mo.',
        ];
    }
}