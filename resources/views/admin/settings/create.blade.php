<x-layouts.admin title="Nouveau réglage">
    <form method="POST" action="{{ route('admin.settings.store') }}">
        @csrf
        @include('admin.settings._form')
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</x-layouts.admin>