<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocaleController extends Controller
{
    public function switch(string $locale): RedirectResponse
    {
        if (in_array($locale, ['fr', 'en'])) {
            session(['locale' => $locale]);

            if (auth()->check()) {
                auth()->user()->update(['locale' => $locale]);
            }
        }

        return back();
    }
}