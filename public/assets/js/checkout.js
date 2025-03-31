$(document).ready(function () {
    // Smart Wizard Initialisierung
    $('#smartwizard').smartWizard({
        keyboardSettings: {
            keyNavigation: false, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
        },
        autoAdjustHeight: false,
        backButtonSupport: true,
        theme: 'square',
        useURLhash: true,
        lang: { // Language variables for button
            next: 'Weiter',
            previous: 'Zurück'
        },
        toolbarSettings: {
            toolbarPosition: 'bottom',
            showNextButton: true,  // Next-Button aktivieren
            showPreviousButton: true // Zurück-Button aktivieren
        }
    });


        // Smart Wizard: leaveStep Event
    $("#smartwizard").on("leaveStep", function (e, anchorObject, currentStepIndex, nextStepIndex, stepDirection) {


            if(event.keyCode == 39 || event.keyCode == 37) {
                event.preventDefault();
                return false;
            }

        // Prüfen, ob der Benutzer vorwärts geht (nicht rückwärts)
        if (stepDirection === 'forward') {

            // Wenn sich der Benutzer im ersten Schritt befindet (z.B. Step 0 für Registrierung)
            if (currentStepIndex == 0) {

            }
            if (currentStepIndex === 1) {
                // Prüfe, ob das Formular gültig ist
                if ($('#checkout').valid()) {
                    return true; // Das Formular ist valide, zum nächsten Schritt wechseln
                } else {
                    // Formular ist ungültig, verhindere den Wechsel zum nächsten Schritt
                    return false;
                }
            }
            // Step 2: AGB und Datenschutz validieren (letzter Schritt)
            if (currentStepIndex === 2) {
                // Dynamisch nur die Validierungsregeln für AGB und Datenschutz aktivieren
                $('#agb').rules('add', {
                    required: true,
                    messages: {
                        required: "Bitte akzeptieren Sie die AGB."
                    }
                });

                $('#privacy').rules('add', {
                    required: true,
                    messages: {
                        required: "Bitte stimmen Sie den Datenschutzbestimmungen zu."
                    }
                });

                // Beide Checkboxen gleichzeitig validieren
                var isAGBValid = $('#agb').valid();
                var isPrivacyValid = $('#privacy').valid();

                // Überprüfen, ob beide Felder valide sind
                if (isAGBValid && isPrivacyValid) {
                    sessionStorage.removeItem('couponCode');
                    $('#checkout').submit(); // Formular absenden
                    return false; // Verhindert den Wechsel zu Step 4
                } else {
                    // Beide Felder validieren, aber verhindern, dass es weitergeht
                    $('#agb').valid();
                    $('#privacy').valid();
                    return false; // Verhindere den Wechsel, wenn eine Checkbox nicht ausgewählt ist
                }
            }

        }
        return true; // Wenn der Schritt nicht validiert werden muss, einfach zum nächsten Schritt wechseln
    }).on("showStep", function (e, anchorObject, stepIndex, stepDirection) {

        // Scroll automatisch zu SmartWizzard Container
        document.getElementById("smartWizzardContainer").scrollIntoView({
            behavior: 'smooth' // für sanftes Scrollen
        });


        if (stepIndex === 0) {

            // Überprüfe, ob `couponCode` und `selectedProductId` im sessionStorage existieren
            const couponCode = sessionStorage.getItem('couponCode');
            const selectedProductId = sessionStorage.getItem('selectedProductId');

            if (couponCode || selectedProductId) {
                // Lösche die Einträge aus dem sessionStorage
                sessionStorage.removeItem('couponCode');
                sessionStorage.removeItem('selectedProductId');

                // AJAX-Call, um die PHP-Session-Variablen zu löschen
                clearSessionVariables(['coupon_code', 'product_id']);

                //removeHiddenInputs('product_id', 'coupon_code');
            }

        }

        if (stepIndex === 2) {
            // Firmendaten holen und anzeigen
            var name = $('#name').val();
            var vorname = $('#vorname').val();
            var companyName = $('#compName').val();
            var companyEmail = $('#compEmail').val();
            var street = $('#str').val();
            var houseNumber = $('#haus_nr').val();
            var plz = $('#plz').val();
            var ort = $('#ort').val();
            var email = $('#email').val();

            $('#customer-name').text(vorname + ' ' + name);
            $('#company-name').text(companyName);
            $('#customer-address').text(street);
            $('#customer-plz-ort').text(plz + ' ' + ort);
            $('#customer-email').text(email);
            $('#company-email').text(companyEmail);


            // Lade das ausgewählte Produkt aus der Session oder einem Input-Feld
            var selectedProductId = sessionStorage.getItem('selectedProductId');

            if (selectedProductId) {

                updateProductDetails(selectedProductId);
                // Wenn das Produkt geladen werden kann, Produktinformationen dynamisch aktualisieren

            }


            // Ändere den "Next"-Button zu "Kostenpflichtig bestellen"
            var nextButton = $('#smartwizard').find('.sw-btn-next');
            nextButton.text('Kostenpflichtig bestellen'); // Ändere den Button-Text
            nextButton.off('click'); // Entferne den Standard-Click-Event

            // Füge ein Submit-Event für den Button hinzu
            nextButton.on('click', function (e) {
                e.preventDefault();
                $('#checkout-form').submit(); // Formular absenden
            });

        } else if (stepIndex === 3) {

            validateFixHeight(e, 'checkout');

            // Verberge alle Buttons im letzten Schritt (Step 4)
            $('#smartwizard').find('.sw-btn-next, .sw-btn-prev, .sw-btn-group-extra').hide();
        } else {

            // Bei jedem anderen Schritt sicherstellen, dass der "Next"-Button den Text "Next" hat
            var nextButton = $('#smartwizard').find('.sw-btn-next');
            nextButton.text('Weiter'); // Zurücksetzen auf "Next"
            nextButton.off('click'); // Entferne vorhandene Click-Events
        }



        // Wenn man zurückgeht, alle Buttons wieder einblenden
        if (stepIndex !== 3) {


            $('#smartwizard').find('.sw-btn-next, .sw-btn-prev, .sw-btn-group-extra').show();
        }

    });

    // --------------

    function addDaysToDate(days) {
        const date = new Date(); // Aktuelles Datum
        date.setDate(date.getDate() + days); // Tage hinzufügen

        // Datum formatieren im "d.m.Y"-Stil
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Monate sind nullbasiert
        const year = date.getFullYear();

        return `${day}.${month}.${year}`;
    }


// validation -------------------------------------------------


    function emailUnique(value) {

        var isUnique = false;

        $.ajax({
            url: "/check-email", // Route zur Überprüfung der E-Mail
            type: "POST", // Ändere den Typ auf POST
            dataType: "json", // Stelle sicher, dass die Rückgabe JSON ist
            data: {
                email: value,
                _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
            },
            success: function (response) {
                // Überprüfe die Serverantwort
                $.validator.addMethod('unique', function () {
                    return !response.exists; // Wenn die E-Mail nicht existiert, ist sie unique
                }, "Die Email existiert bereits in unserem System!");
            },
            error: function (xhr) {
                console.log("Fehler bei der Anfrage: " + xhr.responseText);
            }
        });
    }

    emailUnique($('#email').val());

    $('#email').focusout(function () {

        sessionStorage.setItem("unique", 'false');

        emailUnique($(this).val());

    });

// ---------------------------------------------------------
    var toValidateForms = { // initialize the plugin
        lang: 'de',
        onfocusout: false,
        onkeyup: false,
        errorClass: "error text-danger",
        rules: {


            'company[name]': {
                required: true
            },


            'company[ort]': {
                required: true,

            }, 'company[email]': {

                email: true,
                unique: true,

            },
            'user[vorname]': {
                required: true
            },
            'user[name]': {
                required: true,
            },
            'user[email]': {
                required: true,
                email: true,
                unique: true,


            },
            'user[password]': {
                required: true,
                minlength: 8

            },
            'iban': {
                required: {
                    depends: function(element) {
                        // Prüfe, ob die Zahlungsmethode SEPA gewählt ist
                        return $('input[name="payment_method"]:checked').val() === 'sepa';
                    }
                },
                validIban: true // Unsere benutzerdefinierte Methode
            }
        },
        messages: {
            privacy: {
                required: "Bitte stimmen  Sie den Datenschutzbestimmungen zu!",
            },
            agb: {
                required: "Bitte akzeptieren Sie unsere AGB!",
            },
            'user[password]': {
                minlength: "Das Passwort muss mindestens 8 Zeichen haben.",
            },
            'iban': {
                required: "Bitte geben Sie Ihre IBAN ein, wenn SEPA-Lastschrift gewählt wurde.",
                validIban: "Bitte geben Sie eine gültige IBAN ein."
            }
        },
        invalidHandler: function (form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {

            }

            var errors = validator.numberOfInvalids();  // reports the number of errors


        }

    };
    $('#checkout').validate(toValidateForms);


    // ibasn checken
    $.validator.addMethod("validIban", function(value, element) {
        // Entferne Leerzeichen und prüfe das Format (dieser Regex ist nur ein Beispiel und deckt nicht alle Fälle ab)
        var iban = value.replace(/\s+/g, '');
        return this.optional(element) || /^[A-Z]{2}[0-9]{2}[A-Z0-9]{10,30}$/.test(iban);
    }, "Bitte geben Sie eine gültige IBAN ein.");


// privacy form
    $('#priv').validate({ // initialize the plugin
        onfocusout: false,
        onkeyup: false,
        rules: {

            'agb': {
                required: true,
            },
            'privacy': {
                required: true,


            }
        },
        messages: {
            privacy: {
                required: "Bitte stimmen  Sie den Datenschutzbestimmungen zu!",
            },
            agb: {
                required: "Bitte akzeptieren Sie unsere AGB!",
            }
        },
        errorElement: 'label',
        errorLabelContainer: '.errorTxt'
    });


//-----------

    $(document).on('change', 'input[name="product_id"]', function () {
        saveProductAndCouponToSession($(this).val());
    });

    $('#offerAccept').click(function () {
        saveProductAndCouponToSession($(this).val());

        window.location.href = redirectUrl;
    });


//-----------
    function saveProductAndCouponToSession(selectedValue) {
        // Speichern der übergebenen Produkt-ID im sessionStorage
        if (selectedValue) {
            sessionStorage.setItem('selectedProductId', selectedValue);
        }

        // Prüfen, ob das Eingabefeld mit der ID "code" existiert
        if ($('#code').length > 0) {
            var couponCode = $('#code').val();

            // Speichern des Gutschein-Codes im sessionStorage
            if (couponCode) {
                sessionStorage.setItem('couponCode', couponCode);
            }
        }
    }

//-----------

    function validateFixHeight(evt, formId) {

        var height = $('.tab-pane').height();

        $(".tab-content").height('3000px');
    }

//-----------

    /**
     * Löscht eine oder mehrere Session-Variablen auf dem Server.
     * @param {string|array} sessionKeys - Ein einzelner Schlüssel als String oder mehrere Schlüssel als Array.
     */
    function clearSessionVariables(sessionKeys) {
        // Konvertiere den Schlüssel in ein Array, falls es sich um einen einzelnen String handelt
        const keys = Array.isArray(sessionKeys) ? sessionKeys : [sessionKeys];

        $.ajax({
            url: '/clear-session',
            type: 'POST',
            data: { keys: keys },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response.message);
            },
            error: function (xhr) {
                console.error('Fehler beim Löschen der Session-Variablen:', xhr.responseText);
            }
        });
    }
//-----------

    // Funktion zum Entfernen der hidden Inputs aus dem Formular
    function removeHiddenInputs(names) {
        names.forEach(name => {
            $(`input[name="${name}"]`).remove();
        });
    }


//-----------

    window.updateProductDetails =  function updateProductDetails(selectedProductId) {
        $.ajax({
            url: '/get-product-details', // Route zum Abrufen der Produktdetails
            type: 'GET',
            data: {
                product_id: selectedProductId,
                coupon_code: sessionStorage.getItem('couponCode') || null // Abrufen des Rabattcodes aus sessionStorage
            },
            success: function (response) {
                $('#product-name').text(response.name);
                $('#product-description').html(response.description);
                $('.total-price').html(response.formattedPrice + ' €');

                // Definiere das paymentModality-Objekt in JavaScript
                const paymentModality = {
                    "weekly": "pro Woche </br>bei Monatlicher Zahlung",
                    "daily": "pro Tag </br>bei Monatlicher Zahlung",
                    "annual": "pro Jahr </br>bei jährlicher Zahlung",
                    "monthly": "pro Monat </br>bei Monatlicher Zahlung",
                    "one_time": "&nbsp;"
                };

                $('#payment-modality').html(paymentModality[response.interval]);

                if (response.trial_period_days > 0) {
                    var trialEnddate = addDaysToDate(response.trial_period_days);
                    $('#trial-period-row').show();
                    $('#product-trial-period').text(response.trial_period_days + ' Tage kostenlose Testphase');
                    $('#trial-period-ends').html(trialEnddate);
                } else {
                    $('#trial-period-row').hide();
                }
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            }
        });
    }

//-----------
    $('#upgrade').on('click', function(){
        validatePriv();
    });

    window.validatePriv =  function validatePriv() {
    // Dynamisch nur die Validierungsregeln für AGB und Datenschutz aktivieren
    $('#agb').rules('add', {
        required: true,
        messages: {
            required: "Bitte akzeptieren Sie die AGB."
        }
    });

    $('#privacy').rules('add', {
        required: true,
        messages: {
            required: "Bitte stimmen Sie den Datenschutzbestimmungen zu."
        }
    });

    // Beide Checkboxen gleichzeitig validieren
    var isAGBValid = $('#agb').valid();
    var isPrivacyValid = $('#privacy').valid();

    // Überprüfen, ob beide Felder valide sind
    if (isAGBValid && isPrivacyValid) {

        $('#checkout').submit(); // Formular absenden

        sessionStorage.removeItem('couponCode');
        return false; // Verhindert den Wechsel zu Step 4
    } else {
        // Beide Felder validieren, aber verhindern, dass es weitergeht
        $('#agb').valid();
        $('#privacy').valid();
        return false; // Verhindere den Wechsel, wenn eine Checkbox nicht ausgewählt ist
    }

}

//-----------

    $('input[name="payment_method"]').on('change', function(){
        if($(this).val() === 'sepa'){
            $('#iban_container').show();
        } else {
            $('#iban_container').hide();
        }
    });

//-----------
});



/*

function prevalidateUserdata() {
    // Fehlernachrichten zurücksetzen
    resetErrors();

    // Formulardaten sammeln
    var name = $('#name').val();
    var company_name = $('#company_name').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var password_confirmation = $('#password_confirmation').val();

    // Client-seitige Validierungen
    var isValid = true;

    // Name prüfen
    if (name.trim() === '') {
        $('#name-error').text('Name ist ein Pflichtfeld.');
        isValid = false;
    }

    // Firmenname prüfen
    if (company_name.trim() === '') {
        $('#company-error').text('Firmenname ist ein Pflichtfeld.');
        isValid = false;
    }

    // E-Mail-Format prüfen
    if (!validateEmail(email)) {
        $('#email-error').text('Das Format der E-Mail ist nicht korrekt.');
        isValid = false;
    }

    // Passwortlänge prüfen (min. 8 Zeichen)
    if (password.length < 8) {
        $('#password-error').text('Das Passwort muss mindestens 8 Zeichen lang sein.');
        isValid = false;
    }

    // Passwörter vergleichen
    if (password !== password_confirmation) {
        $('#password-confirmation-error').text('Die Passwörter stimmen nicht überein.');
        isValid = false;
    }

    // Wenn Client-seitige Validierung fehlschlägt, breche ab
    if (!isValid) {
        return false;
    }

    // Wenn die Client-seitige Validierung erfolgreich ist, führe die E-Mail-Überprüfung durch
    return $.ajax({
        url: '/check-email',
        type: 'POST',
        data: {
            email: email,
            _token: $('meta[name="csrf-token"]').attr('content') // CSRF Token
        },
        success: function (response) {
            if (response.exists) {
                $('#email-error').text('Die E-Mail existiert bereits in unserem System.');
                return false; // Die E-Mail ist nicht unique, bleibe auf dem aktuellen Schritt
            } else {
                // Die E-Mail ist unique, gehe zum nächsten Schritt
                $("#smartwizard").smartWizard("next");
            }
        },
        error: function (xhr) {
            console.log(xhr.responseText);
            return false; // Fehlerbehandlung
        }
    });
}

// E-Mail-Format-Validierung
function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Funktion zum Zurücksetzen der Fehlernachrichten
function resetErrors() {
    $('#name-error').text('');
    $('#company-error').text('');
    $('#email-error').text('');
    $('#password-error').text('');
    $('#password-confirmation-error').text('');
}
*/
