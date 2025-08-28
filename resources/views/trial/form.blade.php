<x-layouts.blank :title="'Detaillierte Einsicht anfordern'">
    <div class="container py-5">
        <h1 class="mb-4">Detaillierte Einsicht anfordern</h1>

        @if ($errors->any())
            <div class="alert alert-warning">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('trial.store') }}" novalidate>
            @csrf
            <div class="mb-3">
                <label for="url" class="form-label">Zu prüfende URL</label>
                <input type="url" id="url" name="url" class="form-control"
                       placeholder="https://ihre-domain.de"
                       value="{{ old('url') }}" required>
            </div>
            <div class="mb-3">
                <label for="first_name" class="form-label">Vorname</label>
                <input type="text" id="first_name" name="first_name" class="form-control"
                       value="{{ old('first_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Nachname</label>
                <input type="text" id="last_name" name="last_name" class="form-control"
                       value="{{ old('last_name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E‑Mail</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{ old('email') }}" required>
            </div>


            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="consent" name="consent" required>
                <label class="form-check-label" for="consent">
                    Ja, ich stimme den Datenschutzbestimmungen zu.
                </label>
            </div>

            <input type="text" name="website" class="d-none"> {{-- Honeypot --}}

            <button class="btn btn-primary" type="submit">Absenden</button>
        </form>
    </div>

    @push('scripts')
        <script>
            // Platz für page-spezifisches JS
        </script>
    @endpush
</x-layouts.blank>
