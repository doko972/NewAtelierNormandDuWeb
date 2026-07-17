<x-layouts.admin title="Réglages">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <p class="text-muted">Réglages regroupés par catégorie</p>
        <a href="{{ route('admin.settings.create') }}" class="btn btn-primary">+ Nouveau réglage</a>
    </div>

    @foreach ($settings as $group => $items)
        <h3 style="margin-top:24px; margin-bottom:8px; text-transform:capitalize;">{{ $group }}</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Clé</th>
                    <th>Valeur</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $setting)
                    <tr>
                        <td><code>{{ $setting->key }}</code></td>
                        <td>{{ Str::limit($setting->value, 60) }}</td>
                        <td style="display:flex; gap:8px;">
                            <a href="{{ route('admin.settings.edit', $setting) }}" class="btn btn-secondary">Éditer</a>
                            <form method="POST" action="{{ route('admin.settings.destroy', $setting) }}" onsubmit="return confirm('Supprimer ce réglage ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</x-layouts.admin>