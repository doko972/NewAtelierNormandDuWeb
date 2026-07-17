<x-layouts.auth title="Vérification de l'e-mail">
    <x-slot name="header">
        <h1>Vérifiez votre e-mail</h1>
        <p class="text-muted">Un lien de vérification vient de vous être envoyé.</p>
    </x-slot>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success">
            Un nouveau lien de vérification a été envoyé à l'adresse fournie lors de l'inscription.
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}" style="margin-bottom: 16px;">
        @csrf
        <button type="submit" class="btn btn-primary" style="width:100%;">Renvoyer l'e-mail de vérification</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-secondary" style="width:100%;">Se déconnecter</button>
    </form>
</x-layouts.auth>