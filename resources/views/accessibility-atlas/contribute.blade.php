<x-page-layout navbarType="1" :page="$pageMeta">
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
                    <span class="accessibility-atlas-marker__ring">
                        <img src="{{ asset('assets/img/barrierefreiheitsatlas-globe.svg') }}" alt="">
                    </span>
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
                    <div class="accessibility-atlas-form-card__intro">
                        <p class="accessibility-atlas-kicker">Deine Erfahrung zählt</p>
                        <h2>Was ist dir aufgefallen?</h2>
                        <p>
                            Nenne uns die betroffene Seite und beschreibe kurz, was dort nicht funktioniert hat.
                            Persönliche Angaben sind nur nötig, wenn wir dich für Rückfragen kontaktieren dürfen.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </article>
</x-page-layout>
