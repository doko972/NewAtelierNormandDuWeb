<x-layouts.admin title="Utilisateurs">
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
        <p class="text-muted">{{ $users->total() }} utilisateur(s)</p>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Nouvel utilisateur</a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Langue</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role === 'admin' ? 'Administrateur' : 'Utilisateur' }}</td>
                    <td>{{ strtoupper($user->locale) }}</td>
                    <td style="display:flex; gap:8px;">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary">Éditer</a>
                        @if ($user->id !== auth()->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Supprimer cet utilisateur ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-secondary">Supprimer</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top:16px;">
        {{ $users->links() }}
    </div>
</x-layouts.admin>