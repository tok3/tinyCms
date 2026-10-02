<x-page-layout navbarType="1" page="{!! $pageMeta !!}">
    <article class="accessibility-atlas-page">
        <section class="accessibility-atlas-hero" aria-labelledby="atlas-page-title">
            <div class="container accessibility-atlas-hero__inner">
                <div class="accessibility-atlas-hero__copy">
                    <p class="accessibility-atlas-eyebrow">
                        <span aria-hidden="true">●</span>
                        Barrierefreiheitsatlas im Web
                    </p>
                    <h1 id="atlas-page-title">Hilf uns, das Web zugänglicher zu machen.</h1>
                    <p class="accessibility-atlas-hero__lead">
                        Du bist auf eine digitale Barriere gestoßen? Teile sie mit uns. Dein Hinweis hilft uns dabei,
                        Hindernisse sichtbar zu machen und an einem barrierefreieren Internet zu arbeiten.
                    </p>
                </div>

                <div class="accessibility-atlas-marker" aria-hidden="true">
                    <div class="accessibility-atlas-marker__emblem">
                        <svg class="accessibility-atlas-marker__title" viewBox="0 0 220 108">
                            <defs>
                                <path id="webverbesserer-arc" d="M 20 94 A 90 82 0 0 1 200 94" />
                            </defs>
                            <text>
                                <textPath href="#webverbesserer-arc" startOffset="50%" text-anchor="middle">
                                    WEBVERBESSERER
                                </textPath>
                            </text>
                        </svg>
                        <span class="accessibility-atlas-marker__ring">
                            <img src="{{ asset('assets/img/barrierefreiheitsatlas-globe.svg') }}" alt="">
                        </span>
                    </div>
                    <strong>Jeder Hinweis<br>macht Barrieren<br>sichtbarer.</strong>
                </div>
            </div>
        </section>

        <section class="accessibility-atlas-content" aria-label="Beitrag zum Atlas">
            <div class="container">
                <ol class="accessibility-atlas-steps" aria-label="So funktioniert dein Beitrag">
                    <li><span>1</span><strong>Website nennen</strong></li>
                    <li><span>2</span><strong>Barriere beschreiben</strong></li>
                    <li><span>3</span><strong>Beitrag senden</strong></li>
                </ol>

                <div class="accessibility-atlas-form-card" id="beitrag">
                    @if(session('accessibility_atlas_sent'))
                        <div class="accessibility-atlas-success" role="status" tabindex="-1">
                            <span class="accessibility-atlas-success__icon" aria-hidden="true">✓</span>
                            <p class="accessibility-atlas-kicker">Beitrag angekommen</p>
                            <h2>Danke für deinen Hinweis.</h2>
                            <p>
                                Danke, dass du uns hilfst, das Internet barrierefreier zu machen. Dein Hinweis ist bei
                                uns angekommen und fließt in unsere Arbeit am Barrierefreiheitsatlas ein.
                            </p>
                            <div class="accessibility-atlas-success__actions">
                                <a class="accessibility-atlas-submit" href="{{ route('home') }}">Zur Startseite</a>
                                <a class="accessibility-atlas-secondary-link" href="{{ route('accessibility-atlas.contribute') }}">
                                    Noch einen Beitrag senden
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="accessibility-atlas-form-card__intro">
                            <p class="accessibility-atlas-kicker">Deine Erfahrung zählt</p>
                            <h2>Was ist dir aufgefallen?</h2>
                            <p>
                                Nenne uns die betroffene Seite und beschreibe kurz, was dort nicht funktioniert hat.
                                Persönliche Angaben sind nur nötig, wenn wir dich für Rückfragen kontaktieren dürfen.
                            </p>
                        </div>

                        @if(session('accessibility_atlas_error'))
                            <div class="accessibility-atlas-error" role="alert">
                                <strong>Senden gerade nicht möglich</strong>
                                <p>{{ session('accessibility_atlas_error') }}</p>
                                <a href="mailto:info@aktion-barrierefrei.org">Direkt an info@aktion-barrierefrei.org schreiben</a>
                            </div>
                        @endif

                        <form class="accessibility-atlas-form" method="POST" action="{{ route('accessibility-atlas.store') }}">
                            @csrf

                            <div class="accessibility-atlas-honeypot" aria-hidden="true">
                                <label for="website">Website</label>
                                <input id="website" name="website" type="text" value="" autocomplete="off" tabindex="-1">
                            </div>

                            <div class="accessibility-atlas-field">
                                <label for="page_url">
                                    Webadresse
                                    <span aria-hidden="true">*</span>
                                    <span class="visually-hidden">Pflichtfeld</span>
                                </label>
                                <p class="accessibility-atlas-field__help" id="page_url_help">
                                    Kopiere hier die Adresse der Seite hinein, auf der die Barriere aufgetreten ist.
                                </p>
                                <input
                                    class="form-control @error('page_url') is-invalid @enderror"
                                    id="page_url"
                                    name="page_url"
                                    type="url"
                                    value="{{ old('page_url') }}"
                                    placeholder="https://www.beispiel.de/seite"
                                    autocomplete="url"
                                    required
                                    aria-invalid="{{ $errors->has('page_url') ? 'true' : 'false' }}"
                                    aria-describedby="page_url_help @error('page_url') page_url_error @enderror"
                                >
                                @error('page_url')
                                    <p class="invalid-feedback" id="page_url_error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="accessibility-atlas-field">
                                <label for="body">
                                    Was hat nicht funktioniert?
                                    <span aria-hidden="true">*</span>
                                    <span class="visually-hidden">Pflichtfeld</span>
                                </label>
                                <p class="accessibility-atlas-field__help" id="body_help">
                                    Beschreibe einfach in deinen Worten, was schwierig oder gar nicht nutzbar war.
                                </p>
                                <textarea
                                    class="form-control @error('body') is-invalid @enderror"
                                    id="body"
                                    name="body"
                                    rows="6"
                                    required
                                    aria-invalid="{{ $errors->has('body') ? 'true' : 'false' }}"
                                    aria-describedby="body_help @error('body') body_error @enderror"
                                >{{ old('body') }}</textarea>
                                @error('body')
                                    <p class="invalid-feedback" id="body_error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="accessibility-atlas-field">
                                <label for="expected_help">Was hätte dir geholfen? <span>(optional)</span></label>
                                <p class="accessibility-atlas-field__help" id="expected_help_help">
                                    Wenn du eine Idee hast, was besser funktionieren könnte, teile sie gern mit uns.
                                </p>
                                <textarea
                                    class="form-control @error('expected_help') is-invalid @enderror"
                                    id="expected_help"
                                    name="expected_help"
                                    rows="4"
                                    aria-invalid="{{ $errors->has('expected_help') ? 'true' : 'false' }}"
                                    aria-describedby="expected_help_help @error('expected_help') expected_help_error @enderror"
                                >{{ old('expected_help') }}</textarea>
                                @error('expected_help')
                                    <p class="invalid-feedback" id="expected_help_error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="accessibility-atlas-field">
                                <label for="email">E-Mail für Rückfragen <span>(optional)</span></label>
                                <p class="accessibility-atlas-field__help" id="email_help">
                                    Nur wenn wir dich zu deinem Hinweis kontaktieren dürfen. Wir veröffentlichen sie nicht.
                                </p>
                                <input
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    type="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                    aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
                                    aria-describedby="email_help @error('email') email_error @enderror"
                                >
                                @error('email')
                                    <p class="invalid-feedback" id="email_error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="accessibility-atlas-privacy">
                                <input
                                    class="form-check-input @error('privacy_accepted') is-invalid @enderror"
                                    id="privacy_accepted"
                                    name="privacy_accepted"
                                    type="checkbox"
                                    value="1"
                                    {{ old('privacy_accepted') ? 'checked' : '' }}
                                    required
                                    aria-invalid="{{ $errors->has('privacy_accepted') ? 'true' : 'false' }}"
                                    @error('privacy_accepted') aria-describedby="privacy_accepted_error" @enderror
                                >
                                <div>
                                    <label for="privacy_accepted">
                                        Ich habe die <a href="{{ url('/privacy') }}" target="_blank" rel="noopener noreferrer">Datenschutzhinweise</a>
                                        gelesen und bin mit der Verarbeitung meiner Angaben zur Bearbeitung des Hinweises einverstanden.
                                        <span aria-hidden="true">*</span>
                                        <span class="visually-hidden">Pflichtfeld</span>
                                    </label>
                                    @error('privacy_accepted')
                                        <p class="invalid-feedback d-block" id="privacy_accepted_error">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="accessibility-atlas-form__footer">
                                <button class="accessibility-atlas-submit" type="submit">
                                    Beitrag zum Atlas senden
                                    <span aria-hidden="true">→</span>
                                </button>
                                <p><span aria-hidden="true">*</span> Pflichtfelder</p>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>
    </article>
</x-page-layout>
