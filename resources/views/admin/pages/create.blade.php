<x-layouts.admin title="Nouvelle page">
    <form method="POST" action="{{ route('admin.pages.store') }}">
        @csrf
        @include('admin.pages._form')
        <button type="submit" class="btn btn-primary">Créer la page</button>
    </form>
</x-layouts.admin>