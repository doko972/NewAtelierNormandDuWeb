@php
    $navPages = \App\Models\Page::where('is_published', true)
        ->whereIn('slug', ['services', 'tarifs', 'contact'])
        ->orderBy('order')
        ->get();
@endphp

<nav class="navbar">
    <a href="{{ route('home') }}" class="navbar-logo">Atelier·Normand·Web</a>

    <button class="navbar-burger" aria-expanded="false" aria-controls="navbar-links">
        <span aria-hidden="true">☰</span>
    </button>

    <div class="navbar-links" id="navbar-links">
        @foreach ($navPages as $navPage)
            <a href="{{ url($navPage->slug) }}" class="{{ request()->is($navPage->slug) ? 'is-active' : '' }}">
                {{ app()->getLocale() === 'en' ? $navPage->title_en : $navPage->title_fr }}
            </a>
            @if ($navPage->slug === 'services')
                <a href="{{ url('services') }}#ia">{{ app()->getLocale() === 'en' ? 'AI' : 'IA' }}</a>
            @endif
        @endforeach

        <a href="{{ route('lang.switch', app()->getLocale() === 'fr' ? 'en' : 'fr') }}" title="Changer de langue">
            {{ app()->getLocale() === 'fr' ? 'EN' : 'FR' }}
        </a>

        <button class="theme-switcher" aria-label="Changer de thème">🌓</button>

        <a href="{{ route('page.show', 'contact') }}" class="nav-cta">Discuter du projet</a>
    </div>
</nav>