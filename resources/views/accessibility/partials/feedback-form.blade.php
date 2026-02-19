<div id="a11y-feedback" class="mt-5 col-lg-8">

    @if(session('a11y_feedback_sent'))
        <div class="alert alert-success mb-4">
            Vielen Dank für Ihre Rückmeldung. Ihre Nachricht wurde erfolgreich übermittelt.
        </div>
    @else
        <h3>Kontakt / Rückmeldung zur Barrierefreiheit</h3>

        <p class="mb-3">
            Nutzen Sie dieses Formular, um uns Barrieren oder Probleme bei der Nutzung dieser Website mitzuteilen.
        </p>

        <form
                method="POST"
                action="{{ route('accessibility-feedback.store', $company) }}"
                class="mt-4"

        >
            @csrf

            {{-- Honeypot-Feld (für Bots) --}}
            <div class="hp-field" aria-hidden="true">
                <label for="website">Bitte dieses Feld frei lassen</label>
                <input type="text" name="website" id="website" autocomplete="off">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="first_name" class="form-label">Vorname *</label>
                    <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name') }}"
                            required
                    >
                    @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="last_name" class="form-label">Nachname</label>
                    <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name') }}"
                    >
                    @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-Mail-Adresse *</label>
                <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        required
                >
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="page_url" class="form-label">Link der beanstandeten Seite</label>
                <input
                        type="url"
                        id="page_url"
                        name="page_url"
                        class="form-control @error('page_url') is-invalid @enderror"
                        value="{{ old('page_url') }}"
                        placeholder="https://..."
                >
                @error('page_url')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Beanstandung / Nachricht *</label>
                <textarea
                        id="body"
                        name="body"
                        rows="6"
                        class="form-control @error('body') is-invalid @enderror"
                        required
                >{{ old('body') }}</textarea>
                @error('body')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- hier könntest du später ein echtes Captcha integrieren --}}
            {{-- <div class="mb-3"> … reCAPTCHA etc. … </div> --}}

            <div class="form-check mb-3">
                <input
                        class="form-check-input @error('privacy_accepted') is-invalid @enderror"
                        type="checkbox"
                        value="1"
                        id="privacy_accepted"
                        name="privacy_accepted"
                        {{ old('privacy_accepted') ? 'checked' : '' }}
                        required
                >
                <label class="form-check-label" for="privacy_accepted">
                    Ich habe die Datenschutzhinweise zur Kenntnis genommen und bin mit der Verarbeitung meiner Angaben zum Zweck der Bearbeitung meiner Rückmeldung einverstanden.
                </label>
                @error('privacy_accepted')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit"  id="fbForm" class="btn btn-primary">
                Nachricht absenden
            </button>
        </form>
    @endif
</div>
