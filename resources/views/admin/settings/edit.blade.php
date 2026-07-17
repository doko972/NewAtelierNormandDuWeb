<x-layouts.admin title="Éditer : {{ $setting->key }}">
    <form method="POST" action="{{ route('admin.settings.update', $setting) }}">
        @csrf
        @method('PUT')
        @include('admin.settings._form')
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</x-layouts.admin>