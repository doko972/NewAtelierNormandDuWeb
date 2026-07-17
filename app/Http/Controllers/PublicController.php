<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\View\View;

class PublicController extends Controller
{
    public function home(): View
    {
        $page = Page::where('slug', 'accueil')->where('is_published', true)->firstOrFail();

        return view('public.home', compact('page'));
    }

    public function page(string $slug): View
    {
        $page = Page::where('slug', $slug)->where('is_published', true)->firstOrFail();

        $view = match ($slug) {
            'services' => 'public.services',
            'contact' => 'public.contact',
            'mentions-legales', 'politique-de-confidentialite' => 'public.legal',
            default => 'public.page',
        };

        return view($view, compact('page'));
    }
}