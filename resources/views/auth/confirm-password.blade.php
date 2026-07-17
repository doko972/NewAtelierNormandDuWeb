<x-layouts.auth title="Confirmer le mot de passe">
    <x-slot name="header">
        <h1>Confirmer le mot de passe</h1>
        <p class="text-muted">Zone sécurisée — merci de confirmer votre mot de passe avant de continuer.</p>
    </x-slot>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="field">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required autofocus autocomplete="current-password">
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;">Confirmer</button>
    </form>
</x-layouts.auth>