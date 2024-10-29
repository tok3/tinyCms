$(document).ready(function () {
    // Smart Wizard Initialisierung
    $('#smartwizard').smartWizard({
        autoAdjustHeight: true,
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

                // Wenn das Produkt geladen werden kann, Produktinformationen dynamisch aktualisieren
                $.ajax({
                    url: '/get-product-details', // Route zum Abrufen der Produktdetails
                    type: 'GET',
                    data: { product_id: selectedProductId },
                    success: function(response) {

                        $('#product-name').text(response.name);
                        $('#product-description').text(response.description);
                        $('.total-price').text(response.formattedPrice + ' €');

                        // Definiere das paymentModality-Objekt in JavaScript
                        const paymentModality = {
                            "weekly": "pro Woche </br>bei Monatlicher Zahlung",
                            "daily": "pro Tag </br>bei Monatlicher Zahlung",
                            "annual": "pro Jahr </br>bei jährlicher Zahlung",
                            "monthly": "pro Monat </br>bei Monatlicher Zahlung"
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
                    error: function(xhr) {

                        console.log(xhr.responseText);
                    }
                });
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
// Überprüfe, ob die AGB- und Datenschutz-Checkboxen angeklickt wurden
    function validatePrivacyAndAgb() {
        var agbChecked = $('#agb').is(':checked');
        var privacyChecked = $('#privacy').is(':checked');

        // Fehlerausgabe anzeigen, wenn nicht beide aktiviert sind
        if (!agbChecked) {
            $('#agb-error').text('Bitte akzeptieren Sie unsere AGB.');
        } else {
            $('#agb-error').text('');
        }

        if (!privacyChecked) {
            $('#privacy-error').text('Bitte stimmen Sie den Datenschutzbestimmungen zu.');
        } else {
            $('#privacy-error').text('');
        }

        return agbChecked && privacyChecked;
    }

//-----------

    $(document).on('change', 'input[name="product_id"]', function () {
        var selectedProductId = $(this).val(); // Der ausgewählte product_id

        // Speichere die Produkt-ID im sessionStorage
        sessionStorage.setItem('selectedProductId', selectedProductId);

        console.log('Produkt-ID in sessionStorage gespeichert: ' + sessionStorage.getItem('selectedProductId'));
    });

//-----------
})
;


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
