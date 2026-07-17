<x-layouts.admin title="Médias">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <p class="text-muted">{{ $medias->total() }} média(s)</p>
        <a href="{{ route('admin.medias.create') }}" class="btn btn-primary">+ Ajouter un média</a>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(160px, 1fr)); gap:16px;">
        @foreach ($medias as $media)
            <div class="card">
                @if ($media->type === 'image')
                    <img src="{{ Storage::url($media->path) }}" alt="{{ $media->alt_fr ?? $media->filename }}" style="width:100%; height:100px; object-fit:cover; border-radius:4px; margin-bottom:8px;">
                @else
                    <div class="text-muted" style="margin-bottom:8px;">📄 Document</div>
                @endif
                <p style="font-size:13px; word-break:break-word;">{{ $media->filename }}</p>
                <form method="POST" action="{{ route('admin.medias.destroy', $media) }}" onsubmit="return confirm('Supprimer ce média ?');" style="margin-top:8px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary" style="width:100%;">Supprimer</button>
                </form>
            </div>
        @endforeach
    </div>

    <div style="margin-top:16px;">
        {{ $medias->links() }}
    </div>
</x-layouts.admin>