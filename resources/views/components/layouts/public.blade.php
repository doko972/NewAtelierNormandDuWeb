<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Atelier Normand du Web' }}</title>
    <meta name="description"
        content="{{ $description ?? "Développement web sur-mesure, automatisation et services informatiques en Normandie." }}">

    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Atelier Normand du Web' }}">
    <meta property="og:description"
        content="{{ $description ?? "Développement web sur-mesure, automatisation et services informatiques en Normandie." }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:locale" content="{{ app()->getLocale() === 'en' ? 'en_US' : 'fr_FR' }}">

    <link rel="canonical" href="{{ url()->current() }}">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Atelier Normand du Web",
        "description": "Développement web sur-mesure, automatisation et services informatiques.",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "Rue de Copenhague",
            "postalCode": "14120",
            "addressLocality": "Mondeville",
            "addressCountry": "FR"
        },
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
    </script>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="layout-public">
    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <x-footer />
    <x-accessibility-panel />
    <x-chatbot-widget />
</body>

</html>