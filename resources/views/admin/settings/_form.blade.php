@php $s = $setting ?? null; @endphp

<div class="field">
    <label for="key">Clé</label>
    <input id="key" type="text" name="key" value="{{ old('key', $s?->key) }}" required {{ $s ? 'readonly' : '' }}>
    @error('key') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="value">Valeur</label>
    <textarea id="value" name="value" rows="3">{{ old('value', $s?->value) }}</textarea>
</div>

<div class="field">
    <label for="group">Groupe</label>
    <select id="group" name="group" required>
        @foreach (['general', 'mail', 'seo', 'theme'] as $group)
            <option value="{{ $group }}" {{ old('group', $s?->group) === $group ? 'selected' : '' }}>{{ $group }}</option>
        @endforeach
    </select>
    @error('group') <p class="field-error">{{ $message }}</p> @enderror
</div>