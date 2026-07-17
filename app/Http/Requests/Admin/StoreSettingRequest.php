<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->user()?->role === 'admin';
    }

    public function rules(): array
    {
        $settingId = $this->route('setting')?->id;

        return [
            'key' => ['required', 'string', 'max:255', 'unique:settings,key,' . $settingId],
            'value' => ['nullable', 'string'],
            'group' => ['required', 'string', 'in:general,mail,seo,theme'],
        ];
    }
}