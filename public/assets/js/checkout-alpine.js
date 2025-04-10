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
            if (hash === '#step-2') {
                this.step = 1; // Index 3 entspricht "Fertig" bzw. Step 4
            }
           if (hash === '#step-4') {
                this.step = 3; // Index 3 entspricht "Fertig" bzw. Step 4
            }
        },

        init() {
            this.initStepFromHash();
        },
        updateProductDetails(productId) {
            const coupon = sessionStorage.getItem('couponCode') || '';

            fetch(`/get-product-details?product_id=${productId}&coupon_code=${coupon}`)
                .then(res => res.json())
                .then(data => {
                    // Basisdaten setzen
                    this.product.name = data.name;
                    this.product.description = data.description;
                    this.product.price = data.formattedPrice + ' €';

                    // Intervall-Text
                    const modalityTexts = {
                        weekly: 'pro Woche</br>bei Monatlicher Zahlung',
                        daily: 'pro Tag</br>bei Monatlicher Zahlung',
                        annual: 'pro Jahr</br>bei jährlicher Zahlung',
                        monthly: 'pro Monat</br>bei Monatlicher Zahlung',
                        one_time: ''
                    };

                    this.product.modality = modalityTexts[data.interval] || '';

                    // Rabatt-Hinweis / rabattierter Preis anzeigen, falls vorhanden
                    if (data.has_discount && data.discountedPrice) {
                        this.product.price = `${data.discountedPrice} € (statt ${data.formattedPrice} €)`;
                        this.product.discounted = true;
                    } else {
                        this.product.discounted = false;
                    }

                    // Testphase anzeigen
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
                    body: JSON.stringify({ email: this.form.email })
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

                // optional IBAN-Check (falls später aktiviert)
                // if (this.form.pay_by_invoice == 1 && !this.form.iban) {
                //     this.errors.iban = 'IBAN erforderlich bei Kauf auf Rechnung.';
                // }

                // Email-Check nur wenn noch kein Fehler vorhanden
                if (Object.keys(this.errors).length === 0) {
                    this.checkEmailUniqueness().then(() => {
                        if (Object.keys(this.errors).length === 0) {
                            this.step++;
                            this.watchStep(); // trigger Produkt-Sync
                        }
                    });
                    return; // warte auf Email-Check → kein step++
                } else {
                    return;
                }
            }

            if (this.step === 2) {
                this.populateSummary(); // Adressdaten etc.

                if (!this.form.agb) this.errors.agb = 'Bitte AGB akzeptieren.';
                if (!this.form.privacy) this.errors.privacy = 'Bitte Datenschutz bestätigen.';

                // Produktdaten trotzdem aktualisieren
                this.ensureProductSynced();

                if (Object.keys(this.errors).length > 0) return;
            }

            this.step++;
            this.watchStep(); // wichtig: nach jedem Stepwechsel Produkt neu laden
        },
        ensureProductSynced() {
            const productId = sessionStorage.getItem('selectedProductId');
            if (productId) {
                this.updateProductDetails(productId);
            }
        },
        prevStep() {
            if (this.step > 0) this.step--;
        },
        goToStep(index) {
            this.step = index;
            this.watchStep();
        },
        watchStep() {
            const productId = sessionStorage.getItem('selectedProductId');
            if (!productId) return;

            // Produktdaten immer nachladen, wenn ein Step gewechselt wird
            if ([0, 1, 2].includes(this.step)) {
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
            document.getElementById('checkoutForm').submit();
        },
        validateAndSubmit() {
            this.errors = {};

            if (!this.form.agb) this.errors.agb = 'Bitte AGB akzeptieren.';
            if (!this.form.privacy) this.errors.privacy = 'Bitte Datenschutz bestätigen.';

            // Produktdaten sicherheitshalber aktualisieren
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
                body: JSON.stringify({ email: this.form.email })
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


