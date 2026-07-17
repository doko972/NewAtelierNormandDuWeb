@php $p = $page ?? null; @endphp

<div class="field">
    <label for="slug">Slug (URL)</label>
    <input id="slug" type="text" name="slug" value="{{ old('slug', $p?->slug) }}" required>
    <p class="field-hint">Ex : entreprise/qui-sommes-nous</p>
    @error('slug') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="title_fr">Titre (FR)</label>
    <input id="title_fr" type="text" name="title_fr" value="{{ old('title_fr', $p?->title_fr) }}" required>
    @error('title_fr') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="title_en">Titre (EN)</label>
    <input id="title_en" type="text" name="title_en" value="{{ old('title_en', $p?->title_en) }}" required>
    @error('title_en') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="body_fr">Contenu (FR)</label>
    <textarea id="body_fr" name="body_fr" rows="6">{{ old('body_fr', $p?->body_fr) }}</textarea>
</div>

<div class="field">
    <label for="body_en">Contenu (EN)</label>
    <textarea id="body_en" name="body_en" rows="6">{{ old('body_en', $p?->body_en) }}</textarea>
</div>

<div class="field">
    <label for="meta_title_fr">Meta title (FR)</label>
    <input id="meta_title_fr" type="text" name="meta_title_fr" value="{{ old('meta_title_fr', $p?->meta_title_fr) }}">
</div>

<div class="field">
    <label for="meta_description_fr">Meta description (FR)</label>
    <textarea id="meta_description_fr" name="meta_description_fr" rows="2">{{ old('meta_description_fr', $p?->meta_description_fr) }}</textarea>
</div>

<div class="field">
    <label for="order">Ordre d'affichage</label>
    <input id="order" type="number" name="order" value="{{ old('order', $p?->order ?? 0) }}" min="0">
</div>

<div class="field">
    <label style="display:flex; align-items:center; gap:8px; font-weight:400;">
        <input type="checkbox" name="is_published" value="1" {{ old('is_published', $p?->is_published ?? true) ? 'checked' : '' }}>
        Page publiée
    </label>
</div>