<x-layouts.admin title="Éditer : {{ $page->title_fr }}">
    <form method="POST" action="{{ route('admin.pages.update', $page) }}">
        @csrf
        @method('PUT')
        @include('admin.pages._form')
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</x-layouts.admin>