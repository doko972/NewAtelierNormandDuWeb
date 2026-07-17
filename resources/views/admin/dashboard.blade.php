<x-layouts.admin title="Tableau de bord">
    <div class="admin-stats" style="display:flex; gap:16px;">
        <div class="card">
            <span class="card-tag">Pages</span>
            <h3>{{ $pagesCount }}</h3>
        </div>
        <div class="card">
            <span class="card-tag">Médias</span>
            <h3>{{ $mediasCount }}</h3>
        </div>
        <div class="card">
            <span class="card-tag">Utilisateurs</span>
            <h3>{{ $usersCount }}</h3>
        </div>
    </div>
</x-layouts.admin>