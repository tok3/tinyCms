// In checkout-alpine.js

window.checkoutAlpine = function () {
    return {
        step: 0,
        steps: ['Plan wählen', 'Zugangsdaten', 'Zahlung', 'Fertig'],
        form: {
            vorname: '',
            name: '',
            company: '',
            company_email: '',
            street: '',
            plz: '',
            ort: '',
            pay_by_invoice: '',
            iban: '',
            email: '',
            password: '',
            confirmPassword: '',
            agb: false,
            privacy: false
        },
        errors: {},
        emailTimer: null,
        summary: {},
        product: {
            name: '',
            description: '',
            price: '',
            formattedPrice: '',
            discountedPrice: '',
            discounted: false,
            modality: '',
            trial_days: 0,
            trial_ends: ''
        },
        paymentModality: {
            weekly: "pro Woche </br>bei monatlicher Zahlung",
            daily: "pro Tag </br>bei monatlicher Zahlung",
            annual: "pro Jahr </br>bei jährlicher Zahlung",
            monthly: "pro Monat </br>bei monatlicher Zahlung",
            one_time: "Einmalzahlung"
        },
        trialEnds: '',
        initStepFromHash() {
            const hash = window.location.hash;
            const match = hash.match(/#step-(\d)/);
            if (match) {
                const index = parseInt(match[1]) - 1;
                if (index >= 0 && index < this.steps.length) {
                    this.step = index;
                }
            }
        },

        init() {
            this.initStepFromHash();
            this.restoreAndValidateStateOnInit();


            const storedProductId = sessionStorage.getItem('selectedProductId');
            if (storedProductId) {
                this.form.product_id = storedProductId;

                // Optionale automatische Daten-Nachladung (falls nicht eh schon woanders)
                this.updateProductDetails(storedProductId);
            }
        },
        updateProductDetails(productId) {
            const coupon = sessionStorage.getItem('couponCode') || '';

            fetch(`/get-product-details?product_id=${productId}&coupon_code=${coupon}`)
                .then(res => res.json())
                .then(data => {
                    this.product.name        = data.name;
                    this.product.description = data.description;
                    this.product.price       = data.formattedPrice + ' €';

                    // 1) Default-Laufzeit (falls null/undefined → 24)
                    const laufzeit     = (data.laufzeit ?? 24);
                    const laufzeitText = `Laufzeit ${laufzeit} Monate`;

                    // 2) Basis-Modality-Texte
                    const modalityBaseTexts = {
                        weekly:    'pro Woche</br>bei Monatlicher Zahlung',
                        daily:     'pro Tag</br>bei Monatlicher Zahlung',
                        annual:    'pro Jahr</br>bei jährlicher Zahlung',
                        monthly:   'pro Monat</br>bei Monatlicher Zahlung',
                        one_time:  ''
                    };

                    // 3) An jeden Text (außer one_time) Laufzeit-Suffix anhängen
                    const modalityTexts = Object.fromEntries(
                        Object.entries(modalityBaseTexts).map(([key, txt]) => {
                            if (key === 'one_time') {
                                return [key, txt];
                            }
                            return [key, `${txt}</br>${laufzeitText}`];
                        })
                    );

                    // 4) Ergebnis setzen (oder leer, falls Interval unbekannt)
                    this.product.modality = modalityTexts[data.interval] || '';

                    // Rabatt anzeigen, falls vorhanden
                    if (data.has_discount && data.discountedPrice) {
                        this.product.price     = `${data.discountedPrice} € (statt ${data.formattedPrice} €)`;
                        this.product.discounted = true;
                    } else {
                        this.product.discounted = false;
                    }

                    // Trial-Period
                    if (data.trial_period_days && data.trial_period_days > 0) {
                        this.product.trial_days = data.trial_period_days;
                        this.product.trial_ends = this.addDaysToDate(data.trial_period_days);
                    } else {
                        this.product.trial_days = 0;
                        this.product.trial_ends = '';
                    }
                })
                .catch(error => {
                    console.error('Produktdaten konnten nicht geladen werden:', error);
                });
        },
        addDaysToDate(days) {
            const date = new Date();
            date.setDate(date.getDate() + days);
            return date.toLocaleDateString('de-DE');
        },
        async checkEmailUniqueness() {
            try {
                const response = await fetch('/check-email', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({email: this.form.email})
                });

                const data = await response.json();
                if (data.exists) {
                    this.errors.email = 'Diese E-Mail ist bereits vergeben.';
                }
            } catch (error) {
                console.error('Fehler beim E-Mail-Check:', error);
            }
        },

        async nextStep() {
            this.errors = {};

            if (this.step === 0) {
                if (!sessionStorage.getItem('selectedProductId')) {
                    this.errors.product_id = 'Bitte ein Produkt auswählen.';
                    return;
                }
            }

            if (this.step === 1) {
                if (!this.form.vorname) this.errors.vorname = 'Vorname erforderlich.';
                if (!this.form.name) this.errors.name = 'Name erforderlich.';
                if (!this.form.company) this.errors.company = 'Firmenname erforderlich.';
                if (!this.form.company_email || !this.validEmail(this.form.company_email)) {
                    this.errors.company_email = 'Gültige Firmen-E-Mail erforderlich.';
                }
                if (!this.form.street) this.errors.street = 'Straße / Haus-Nr. erforderlich.';
                if (!this.form.plz) this.errors.plz = 'PLZ erforderlich.';
                if (!this.form.ort) this.errors.ort = 'Ort erforderlich.';
                if (!this.form.email || !this.validEmail(this.form.email)) {
                    this.errors.email = 'Login-E-Mail ungültig.';
                }
                if (!this.form.password || this.form.password.length < 8) {
                    this.errors.password = 'Passwort muss mind. 8 Zeichen lang sein.';
                }
                if (this.form.password !== this.form.confirmPassword) {
                    this.errors.confirmPassword = 'Passwörter stimmen nicht überein.';
                }
                if (!this.form.pay_by_invoice && this.form.pay_by_invoice !== '0') {
                    this.errors.pay_by_invoice = 'Zahlungsmethode wählen.';
                }

                if (Object.keys(this.errors).length > 0) return;

                await this.checkEmailUniqueness();
                if (this.errors.email) return;
            }

            if (this.step === 2) {
                this.populateSummary();

                if (!this.form.agb) this.errors.agb = 'Bitte AGB akzeptieren.';
                if (!this.form.privacy) this.errors.privacy = 'Bitte Datenschutz bestätigen.';

                this.ensureProductSynced();

                if (Object.keys(this.errors).length > 0) return;
            }

            this.step++;
            window.location.hash = '#step-' + (this.step + 1);
            this.watchStep();
        },
        goToStep(index) {
            if (index > this.step) return;

            if (index === 0) {
                sessionStorage.removeItem('couponCode');

                const couponInput = document.querySelector('input[name="coupon_code"]');
                if (couponInput) {
                    couponInput.remove();
                }
            }


            this.step = index;
            window.location.hash = '#step-' + (index + 1);
            this.watchStep();
        },
        prevStep() {
            if (this.step > 0) {
                const newStep = this.step - 1; // Vorab berechnen!

                if (newStep === 0) {
                    sessionStorage.removeItem('couponCode');

                    const couponInput = document.querySelector('input[name="coupon_code"]');
                    if (couponInput) {
                        couponInput.remove();
                    }

                }

                this.step = newStep;
                window.location.hash = '#step-' + (this.step + 1);
                this.watchStep();
            }
        },
        watchStep() {
            const productId = sessionStorage.getItem('selectedProductId');
            if (!productId) return;
            if ([0, 1, 2].includes(this.step)) {
                this.updateProductDetails(productId);
            }
        },
        buttonClass(index) {
            if (index === this.step) {
                return 'btn btn-primary btn-circle sw-active'; // Aktiver Step
            } else if (index < this.step) {
                return 'btn btn-outline-primary btn-circle sw-past'; // Erreichbare Steps mit weißem Hintergrund
            } else {
                return 'btn btn-outline-secondary btn-circle sw-future'; // Noch nicht erreichte Steps mit weißem Hintergrund
            }
        },
        ensureProductSynced() {
            const productId = sessionStorage.getItem('selectedProductId');
            if (productId) {
                this.updateProductDetails(productId);
            }
        },
        submitForm() {
            const selectedProductId = sessionStorage.getItem('selectedProductId');

            if (selectedProductId && !document.querySelector('input[name="product_id"]')) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'product_id';
                input.value = selectedProductId;
                document.getElementById('checkout').appendChild(input);
            }
            sessionStorage.removeItem("couponCode");
            document.getElementById('checkoutForm').submit();
        },
        validateAndSubmit() {
            this.errors = {};

            if (!this.form.agb) this.errors.agb = 'Bitte AGB akzeptieren.';
            if (!this.form.privacy) this.errors.privacy = 'Bitte Datenschutz bestätigen.';

            this.ensureProductSynced();
            if (Object.keys(this.errors).length === 0) {
                this.submitForm();
            }
        },
        watchEmail() {
            clearTimeout(this.emailTimer);
            this.emailTimer = setTimeout(() => {
                this.checkEmailUnique();
            }, 500);
        },
        checkEmailUnique() {
            if (!this.form.email || !this.validEmail(this.form.email)) {
                this.errors.email = 'Gültige E-Mail erforderlich.';
                return;
            }

            fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({email: this.form.email})
            })
                .then(res => res.json())
                .then(data => {
                    if (data.exists) {
                        this.errors.email = 'Diese E-Mail existiert bereits.';
                    } else {
                        if (this.errors.email === 'Diese E-Mail existiert bereits.') {
                            delete this.errors.email;
                        }
                    }
                })
                .catch(err => {
                    console.error('Fehler bei der E-Mail-Überprüfung:', err);
                });
        },
        validEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        },
        saveProductToSession(value) {
            this.form.product_id = value;
            sessionStorage.setItem('selectedProductId', value);

            //nach produktauswahl direkt auf step 2
            if (this.step === 0) {
                this.step = 1;
                window.location.hash = '#step-2';
                this.watchStep();
            }
        },
        restoreAndValidateStateOnInit() {
            const productId = sessionStorage.getItem('selectedProductId');

            // Wenn kein Produkt gewählt wurde, zurück zu Step 0
            if (!productId) {
                this.step = 0;
                window.location.hash = '#step-1';
                return;
            }

            // Produktdetails erneut laden
            this.updateProductDetails(productId);

            // Wenn wir auf Step 2 (Zusammenfassung) sind, validiere vorherige Eingaben
            if (this.step === 2) {
                const requiredFields = ['vorname', 'name', 'company', 'company_email', 'street', 'plz', 'ort', 'email', 'password', 'confirmPassword', 'pay_by_invoice'];

                for (let field of requiredFields) {
                    if (!this.form[field]) {
                        this.step = 1;
                        window.location.hash = '#step-2';
                        return;
                    }
                }

                // Passwort-Validierung
                if (this.form.password.length < 8 || this.form.password !== this.form.confirmPassword) {
                    this.step = 1;
                    window.location.hash = '#step-2';
                    return;
                }

                // E-Mail Format
                if (!this.validEmail(this.form.email) || !this.validEmail(this.form.company_email)) {
                    this.step = 1;
                    window.location.hash = '#step-2';
                    return;
                }

                // Falls alles passt → populate Summary nochmal
                this.populateSummary();
            }
            // Falls Step 0 → aktuelles Produkt im UI markieren (falls vorhanden)
            if (this.step === 0) {
                const productId = sessionStorage.getItem('selectedProductId');
                if (productId) {
                    // Versuche, das passende Radio-Input zu aktivieren
                    const radio = document.querySelector(`input[name="product_id"][value="${productId}"]`);
                    if (radio) {
                        radio.checked = true;
                    }
                    // Und sicherheitshalber nochmal Produktdaten laden
                    this.updateProductDetails(productId);
                }
            }
        },
        populateSummary() {
            this.summary = {
                name: this.form.vorname + ' ' + this.form.name,
                company: this.form.company,
                address: this.form.street,
                plz_ort: this.form.plz + ' ' + this.form.ort,
                email: this.form.company_email
            };

            const productId = sessionStorage.getItem('selectedProductId');
            if (!productId) return;

            fetch(`/get-product-details?product_id=${productId}&coupon_code=${sessionStorage.getItem('couponCode') || ''}`)
                .then(res => res.json())
                .then(data => {
                    this.product = data;

                    if (data.trial_period_days > 0) {
                        this.product.trial_ends = this.addDaysToDate(data.trial_period_days);
                    }
                });
        }
    }
};
