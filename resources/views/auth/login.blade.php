<x-layouts.auth title="Connexion">
    <x-slot name="header">
        <h1>Connexion</h1>
        <p class="text-muted">Accédez à votre espace d'administration.</p>
    </x-slot>

    @session('status')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="field">
            <label for="email">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="field">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            @error('password') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <div class="field" style="display:flex; align-items:center; justify-content:space-between;">
            <label style="display:flex; align-items:center; gap:8px; font-weight:400;">
                <input type="checkbox" name="remember">
                Se souvenir de moi
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;">Se connecter</button>
    </form>

    <p class="auth-card__footer">
        Pas encore de compte ?
        <a href="{{ route('register') }}">Créer un compte</a>
    </p>
</x-layouts.auth>