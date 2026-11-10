<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Connexion' }} — Atelier Normand du Web</title>

    {{-- Anti-flash : applique le thème sombre par défaut avant même le chargement du CSS --}}
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
<body class="auth-body">
    <div class="auth-wrapper">
        <div class="auth-brand">
            <div class="auth-brand-logo">Atelier·Normand·Web</div>
            <p class="auth-brand-tagline">Des sites qui vous appartiennent. Une informatique qui vous simplifie la vie.</p>
        </div>
        <div class="auth-card">
            <div class="auth-card__header">
                {{ $header ?? '' }}
            </div>
            <div class="auth-card__body">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>
</html>