<x-layouts.public :title="$page->meta_title_fr ?? $page->title_fr" :description="$page->meta_description_fr">

    <section class="container section">
        <div class="section-header">
            <h1>{{ app()->getLocale() === 'en' ? $page->title_en : $page->title_fr }}</h1>
        </div>

        @if ($page->body_fr || $page->body_en)
            <div class="page-content">
                {!! app()->getLocale() === 'en' ? $page->body_en : $page->body_fr !!}
            </div>
        @else
            <p class="text-muted">Contenu à venir — cette page sera complétée depuis l'espace admin.</p>
        @endif
    </section>

</x-layouts.public>