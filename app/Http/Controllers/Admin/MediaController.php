<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMediaRequest;
use App\Models\Media;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        $medias = Media::latest()->paginate(20);

        return view('admin.medias.index', compact('medias'));
    }

    public function create(): View
    {
        $pages = Page::orderBy('order')->get();

        return view('admin.medias.create', compact('pages'));
    }

    public function store(StoreMediaRequest $request): RedirectResponse
    {
        $file = $request->file('file');
        $path = $file->store('medias', 'public');

        Media::create([
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'alt_fr' => $request->input('alt_fr'),
            'alt_en' => $request->input('alt_en'),
            'type' => str_starts_with($file->getMimeType(), 'image/') ? 'image' : 'document',
            'page_id' => $request->input('page_id'),
        ]);

        return redirect()->route('admin.medias.index')->with('success', 'Média envoyé avec succès.');
    }

    public function destroy(Media $media): RedirectResponse
    {
        Storage::disk('public')->delete($media->path);
        $media->delete();

        return redirect()->route('admin.medias.index')->with('success', 'Média supprimé.');
    }
}