<x-layouts.public title="Page introuvable">
    <section class="container section" style="text-align:center;">
        <div class="eyebrow">Erreur 404</div>
        <h1>Cette page n'existe pas.</h1>
        <p class="text-muted" style="max-width:480px; margin:0 auto 24px;">Le lien est peut-être obsolète, ou l'adresse mal tapée.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Retour à l'accueil</a>
    </section>
</x-layouts.public>