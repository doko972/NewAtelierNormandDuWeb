<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Erreur — Atelier Normand du Web</title>
    <script>
        if (localStorage.getItem('theme') !== 'light') {
            document.documentElement.classList.add('theme-dark');
        }
    </script>
    @vite(['resources/sass/app.scss'])
</head>
<body class="layout-public" style="display:flex; align-items:center; justify-content:center; min-height:100vh; text-align:center;">
    <div>
        <div class="eyebrow">Erreur 500</div>
        <h1>Une erreur est survenue.</h1>
        <p class="text-muted" style="max-width:480px; margin:16px auto 24px;">Le problème vient de notre côté, pas du vôtre. Réessayez dans quelques instants.</p>
        <a href="/" class="btn btn-primary">Retour à l'accueil</a>
    </div>
</body>
</html>