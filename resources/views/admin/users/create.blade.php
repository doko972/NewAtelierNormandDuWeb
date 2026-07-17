<x-layouts.admin title="Nouvel utilisateur">
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        @include('admin.users._form')
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</x-layouts.admin>