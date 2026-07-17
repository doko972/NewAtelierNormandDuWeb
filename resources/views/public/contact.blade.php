<x-layouts.public :title="$page->meta_title_fr ?? $page->title_fr">

    <section class="container section">
        <div class="section-header">
            <h1>{{ app()->getLocale() === 'en' ? $page->title_en : $page->title_fr }}</h1>
            <p class="text-muted">Une question, un projet ? Écrivez-moi, je réponds rapidement.</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('contact.store') }}" style="max-width:560px;">
            @csrf

            <div class="field">
                <label for="name">Nom</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required>
                @error('name') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="field">
                <label for="subject">Sujet (optionnel)</label>
                <input id="subject" type="text" name="subject" value="{{ old('subject') }}">
            </div>

            <div class="field">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="6" required>{{ old('message') }}</textarea>
                @error('message') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            {{-- Honeypot : invisible pour un humain, tentant pour un bot --}}
            <div class="field-honeypot" aria-hidden="true">
                <label for="website">Laissez ce champ vide</label>
                <input type="text" id="website" name="website" tabindex="-1" autocomplete="off">
            </div>

            <div class="field">
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                @error('g-recaptcha-response') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Envoyer le message</button>
        </form>
    </section>

</x-layouts.public>