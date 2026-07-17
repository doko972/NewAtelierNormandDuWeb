@php $u = $user ?? null; @endphp

<div class="field">
    <label for="name">Nom</label>
    <input id="name" type="text" name="name" value="{{ old('name', $u?->name) }}" required>
    @error('name') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="email">Email</label>
    <input id="email" type="email" name="email" value="{{ old('email', $u?->email) }}" required>
    @error('email') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="password">Mot de passe {{ $u ? '(laisser vide pour ne pas changer)' : '' }}</label>
    <input id="password" type="password" name="password" {{ $u ? '' : 'required' }}>
    @error('password') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="field">
    <label for="role">Rôle</label>
    <select id="role" name="role" required>
        <option value="user" {{ old('role', $u?->role) === 'user' ? 'selected' : '' }}>Utilisateur</option>
        <option value="admin" {{ old('role', $u?->role) === 'admin' ? 'selected' : '' }}>Administrateur</option>
    </select>
</div>

<div class="field">
    <label for="locale">Langue</label>
    <select id="locale" name="locale" required>
        <option value="fr" {{ old('locale', $u?->locale) === 'fr' ? 'selected' : '' }}>Français</option>
        <option value="en" {{ old('locale', $u?->locale) === 'en' ? 'selected' : '' }}>Anglais</option>
    </select>
</div>