<x-layouts.admin title="Pages">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <p class="text-muted">{{ $pages->total() }} page(s)</p>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">+ Nouvelle page</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Titre (FR)</th>
                <th>Slug</th>
                <th>Statut</th>
                <th>Ordre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)
                <tr>
                    <td>{{ $page->title_fr }}</td>
                    <td><code>/{{ $page->slug }}</code></td>
                    <td>
                        @if ($page->is_published)
                            <span class="alert alert-success" style="display:inline-block; margin:0; padding:2px 8px;">Publiée</span>
                        @else
                            <span class="alert alert-info" style="display:inline-block; margin:0; padding:2px 8px;">Brouillon</span>
                        @endif
                    </td>
                    <td>{{ $page->order }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-secondary">Éditer</a>
                        <form method="POST" action="{{ route('admin.pages.destroy', $page) }}" onsubmit="return confirm('Supprimer cette page ?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top:16px;">
        {{ $pages->links() }}
    </div>
</x-layouts.admin>