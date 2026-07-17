<x-layouts.public title="Accès refusé">
    <section class="container section" style="text-align:center;">
        <div class="eyebrow">Erreur 403</div>
        <h1>Accès non autorisé.</h1>
        <p class="text-muted" style="max-width:480px; margin:0 auto 24px;">Vous n'avez pas les droits nécessaires pour accéder à cette page.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
    </section>
</x-layouts.public>