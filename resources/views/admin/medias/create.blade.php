<x-layouts.admin title="Ajouter un média">
    <form method="POST" action="{{ route('admin.medias.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="field">
            <label for="file">Fichier</label>
            <input id="file" type="file" name="file" required accept=".jpg,.jpeg,.png,.webp,.svg,.pdf">
            @error('file') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label for="alt_fr">Texte alternatif (FR)</label>
            <input id="alt_fr" type="text" name="alt_fr" value="{{ old('alt_fr') }}">
            <p class="field-hint">Important pour l'accessibilité et le SEO.</p>
        </div>

        <div class="field">
            <label for="alt_en">Texte alternatif (EN)</label>
            <input id="alt_en" type="text" name="alt_en" value="{{ old('alt_en') }}">
        </div>

        <div class="field">
            <label for="page_id">Page associée (optionnel)</label>
            <select id="page_id" name="page_id">
                <option value="">Aucune</option>
                @foreach ($pages as $page)
                    <option value="{{ $page->id }}" {{ old('page_id') == $page->id ? 'selected' : '' }}>{{ $page->title_fr }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</x-layouts.admin>