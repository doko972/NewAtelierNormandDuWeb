<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Atelier Normand du Web' }}</title>
    <meta name="description"
        content="{{ $description ?? "Technicien informatique et développeur web à Condé-en-Normandie : dépannage, câblage, sites sur-mesure et IA." }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Atelier Normand du Web' }}">
    <meta property="og:description"
        content="{{ $description ?? "Technicien informatique et développeur web à Condé-en-Normandie : dépannage, câblage, sites sur-mesure et IA." }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'en' ? 'en_US' : 'fr_FR' }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Atelier Normand du Web",
        "description": "Technicien informatique de proximité et développeur web : installation, câblage, dépannage, sites sur-mesure et accompagnement à l'IA.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "route de Vassy",
            "postalCode": "14110",
            "addressLocality": "Condé-en-Normandie",
            "addressRegion": "Normandie",
            "addressCountry": "FR"
        },
        "areaServed": "Condé-en-Normandie et alentours",
        "url": "{{ url('/') }}",
        "email": "contact@ateliernormandduweb.fr"
    }
    </script>

    <script>
        (function () {
            var saved = localStorage.getItem('theme');
            if (saved !== 'light') {
                document.documentElement.classList.add('theme-dark');
            }
        })();

        // Applique les préférences d'accessibilité avant l'affichage (évite un « flash »)
        (function () {
            try {
                var p = JSON.parse(localStorage.getItem('a11y-prefs')) || {};
                var root = document.documentElement;
                if (p.fontScale && p.fontScale !== 1) root.style.fontSize = (p.fontScale * 100) + '%';
                var map = {
                    spacing: 'a11y-spacing', readableFont: 'a11y-readable-font', alignLeft: 'a11y-align-left',
                    highContrast: 'a11y-high-contrast', grayscale: 'a11y-grayscale', underlineLinks: 'a11y-underline-links',
                    strongFocus: 'a11y-strong-focus', noMotion: 'a11y-no-motion', bigCursor: 'a11y-big-cursor'
                };
                for (var k in map) if (p[k]) root.classList.add(map[k]);
            } catch (e) {}
        })();
    </script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="layout-public">
    <a href="#contenu" class="skip-link">Aller au contenu</a>

    <x-navbar />

    <main id="contenu" tabindex="-1">
        {{ $slot }}
    </main>

    <x-footer />
    <x-accessibility-panel />
    <x-chatbot-widget />
</body>

</html>