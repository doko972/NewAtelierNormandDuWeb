<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $pages = Page::where('is_published', true)->get();

        $xml = view('sitemap', compact('pages'))->render();

        return response($xml, 200)->header('Content-Type', 'application/xml');
    }
}