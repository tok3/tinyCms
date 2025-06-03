$(document).ready(function () {

    window.updateProductSummary =  function updateProductDetails(productId, interval, couponCode = '') {
        const selection = `${productId}:${interval}`;

        $.ajax({
            url: '/get-product-details',
            method: 'GET',
            data: {
                product_selection: selection,
                coupon_code: couponCode
            },
            success: function (data) {
                // Name + Beschreibung
                $('#product-name').text(data.name || '–');
                $('#product-description').html(data.description || '');

                // Preis & ggf. Rabatt
                if (data.discountedPrice) {
                    $('#product-price').text(data.discountedPrice + ' €');
                    $('#product-price').addClass('text-success');
                } else {
                    $('#product-price').text(data.formattedPrice + ' €');
                    $('#product-price').removeClass('text-success');
                }

                // Zahlungsmodality
                const modalityMap = {
                    "weekly": "pro Woche </br>bei Monatlicher Zahlung",
                    "daily": "pro Tag </br>bei Monatlicher Zahlung",
                    "annual": "pro Jahr </br>bei jährlicher Zahlung",
                    "monthly": "pro Monat </br>bei Monatlicher Zahlung",
                    "one_time": "Einmalzahlung"
                };
                $('#payment-modality').html(modalityMap[data.interval] || '');

                // Testphase sichtbar machen (optional)
                if (data.trial_period_days > 0) {
                    $('#trial-info').removeClass('hidden');

                    $('.trial-days').text(data.trial_period_days);
                    $('.trial-price').text((data.discountedPrice ?? data.formattedPrice) + ' €');
                    $('.trial-ends').text(addDaysToDate(data.trial_period_days));
                    $('.trial-modality').html(getModalityText(data.interval));
                } else {
                    $('#trial-info').addClass('hidden');
                }
            },
            error: function (xhr) {
                console.error('Fehler beim Laden der Produktdaten:', xhr.responseText);
            }
        });
    }
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
        errorPlacement: function (error, element) {
            if (element.attr('name') === 'pay_by_invoice') {
                error.appendTo('#pay_by_invoice_error');
            } else {
                error.insertAfter(element);
            }
        },
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

            }, 'pay_by_invoice': {

                required: true,


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
                required: "Bitte stimmen Sie den Datenschutzbestimmungen zu!",
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
        window.location.href = saveProductAndCouponToSession($(this).val());

    });


//-----------
    function saveProductAndCouponToSession(productId) {
        const interval = document.querySelector('input[name="offer_interval"]:checked')?.value;

        if (productId && interval) {
            sessionStorage.setItem('selectedProductSelection', `${productId}:${interval}`);
        }

        const couponCode = document.getElementById('code')?.value;
        if (couponCode) {
            sessionStorage.setItem('couponCode', couponCode);
        }
  return  redirectUrl+'/preise?interval='+interval+'#step-2'
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
/*

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

                if(parseInt(response.formattedPrice) < 1)
                {
                    $('#by-invoice').remove();
                }
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
*/

//-----------
    $('#upgrade').on('click', function(){
        validatePriv();
    });

    window.validatePriv = function () {
        // AGB + Datenschutz
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

        // Zahlungsweise
        $('input[name="pay_by_invoice"]').rules('add', {
            required: true,
            messages: {
                required: "Bitte wählen Sie eine Zahlungsweise."
            }
        });

        // IBAN nur wenn Kauf auf Rechnung gewählt
        if ($('input[name="pay_by_invoice"]:checked').val() === "1") {
            $('#iban').rules('add', {
                required: true,
                iban: true, // optional: wenn du Plugin hast
                messages: {
                    required: "Bitte geben Sie Ihre IBAN an."
                }
            });
        } else {
            $('#iban').rules('remove'); // falls vorher gesetzt
        }

        const agbOk = $('#agb').valid();
        const privacyOk = $('#privacy').valid();
        const payOk = $('input[name="pay_by_invoice"]').valid();
        const ibanOk = $('input[name="pay_by_invoice"]:checked').val() === "1" ? $('#iban').valid() : true;

        if (agbOk && privacyOk && payOk && ibanOk) {
            $('#checkout').submit();
            sessionStorage.removeItem('couponCode');
            return false;
        } else {
            return false;
        }
    };

//-----------

    $('input[name="payment_method"]').on('change', function(){
        if($(this).val() === 'sepa'){
            $('#iban_container').show();
        } else {
            $('#iban_container').hide();
        }
    });


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
