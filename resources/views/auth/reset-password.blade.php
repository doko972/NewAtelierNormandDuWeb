<x-layouts.auth title="Réinitialiser le mot de passe">
    <x-slot name="header">
        <h1>Réinitialiser le mot de passe</h1>
    </x-slot>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="field">
            <label for="email">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label for="password">Nouveau mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;">Réinitialiser</button>
    </form>
</x-layouts.auth>