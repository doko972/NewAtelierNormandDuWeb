<x-layouts.admin title="Éditer : {{ $user->name }}">
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')
        @include('admin.users._form')
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</x-layouts.admin>