<x-layouts.auth title="Mot de passe oublié">
    <x-slot name="header">
        <h1>Mot de passe oublié</h1>
        <p class="text-muted">Indiquez votre e-mail, un lien de réinitialisation vous sera envoyé.</p>
    </x-slot>

    @session('status')
        <div class="alert alert-success">{{ $value }}</div>
    @endsession

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="field">
            <label for="email">Adresse e-mail</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <p class="field-error">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary" style="width:100%;">Envoyer le lien</button>
    </form>

    <p class="auth-card__footer">
        <a href="{{ route('login') }}">← Retour à la connexion</a>
    </p>
</x-layouts.auth>