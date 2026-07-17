<x-layouts.public :title="$page->meta_title_fr ?? $page->title_fr">

    <section class="container section">
        <div class="section-header">
            <h1>{{ app()->getLocale() === 'en' ? $page->title_en : $page->title_fr }}</h1>
        </div>

        @if ($page->body_fr)
            <div class="page-content">
                {!! $page->body_fr !!}
            </div>
        @else
            <p class="text-muted">Contenu à venir.</p>
        @endif
    </section>

</x-layouts.public>