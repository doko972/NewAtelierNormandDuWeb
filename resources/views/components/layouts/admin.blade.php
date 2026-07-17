<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Administration' }} — Atelier Normand du Web</title>

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
<body class="admin-body layout-admin">
    <aside class="sidebar">
        <div class="sidebar__brand">
            <span>Atelier·Normand·Web</span>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}">Tableau de bord</a>
            <a href="{{ route('admin.pages.index') }}" class="{{ request()->routeIs('admin.pages.*') ? 'is-active' : '' }}">Pages</a>
            <a href="{{ route('admin.medias.index') }}" class="{{ request()->routeIs('admin.medias.*') ? 'is-active' : '' }}">Médias</a>
            <a href="{{ route('admin.settings.index') }}" class="{{ request()->routeIs('admin.settings.*') ? 'is-active' : '' }}">Réglages</a>
            <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'is-active' : '' }}">Utilisateurs</a>
        </nav>
        <div class="sidebar__footer">
            <span>{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-secondary">Déconnexion</button>
            </form>
        </div>
    </aside>

    <main class="admin-main">
        <header class="admin-header">
            <h1>{{ $header ?? $title ?? '' }}</h1>
        </header>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        <div class="admin-content">
            {{ $slot }}
        </div>
    </main>
</body>
</html>