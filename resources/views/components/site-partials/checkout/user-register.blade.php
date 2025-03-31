<!-- Container für das Formular -->
<div class="container">
    <div class="row mt-50 justify-content-center text-center">
        <div class="col-xl-9">
            <h2 class="mb-4">Kunden- und Zugangsdaten Angeben</h2>
        </div>
    </div>

    <div class="container pb-2 pb-lg-7 position-relative z-1" style="overflow:auto">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-7 col-sm-8 z-2">


                <fieldset>
                    <legend>Firmenangaben</legend>

                    <div class="row" style="font-size: 16px;">
                        <!-- Vorname -->
                        <div class="col-md-6">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-user"></i></span>
                                <input id="vorname" class="form-control" name="user[vorname]" type="text" required placeholder="Vorname">
                            </div>
                            <div class="text-danger" id="vorname-error"></div>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-user"></i></span>
                                <input id="name" class="form-control" name="user[name]" type="text" required placeholder="Name">
                            </div>
                            <div class="text-danger" id="name-error"></div>
                        </div>
                    </div>

                    <div class="row" style="font-size: 16px;">
                        <!-- Straße -->
                        <div class="col-md-12">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map"></i></span>
                                <input id="compName" class="form-control" name="company[name]" type="text" required placeholder="Firma">
                            </div>
                            <div class="text-danger" id="companyname-error"></div>
                        </div>

                    </div>      <div class="row" style="font-size: 16px;">
                        <!-- Straße -->
                        <div class="col-md-12">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-envelope"></i></span>
                                <input id="compEmail" class="form-control" name="company[email]" type="email" required placeholder="Firma Email / Rechnungsemail">
                            </div>
                            <div class="text-danger" id="compEmail-error"></div>
                        </div>

                    </div>

                    <div class="row" style="font-size: 16px;">
                        <!-- Straße -->
                        <div class="col-md-12">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map"></i></span>
                                <input id="str" class="form-control" name="company[str]" type="text" required placeholder="Straße / Haus-Nr.">
                            </div>
                            <div class="text-danger" id="str-error"></div>
                        </div>

                    </div>

                    <div class="row" style="font-size: 16px;">
                        <!-- PLZ -->
                        <div class="col-md-4">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map-pin"></i></span>
                                <input id="plz" class="form-control" name="company[plz]" type="number" required placeholder="PLZ">
                            </div>
                            <div class="text-danger" id="plz-error"></div>
                        </div>

                        <!-- Ort -->
                        <div class="col-md-8">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-buildings"></i></span>
                                <input id="ort" class="form-control" name="company[ort]" type="text" required placeholder="Ort">
                            </div>
                            <div class="text-danger" id="ort-error"></div>
                        </div>
                    </div>
                    </fieldset>
                <fieldset class="mb-4">
                    <legend>Abonnement Zahlungsweise</legend>

                    <div class="form-group">
                        <input type="radio" name="payment_method" value="creditcard" id="payment_creditcard" checked>
                        <label for="payment_creditcard">Kreditkarte</label>
                           &nbsp;&nbsp;&nbsp; <input type="radio" name="payment_method" value="sepa" id="payment_sepa">
                        <label for="payment_sepa">SEPA-Lastschrift</label>
                    </div>
                    <div class="form-group" id="iban_container" style="display: none; margin-top: 15px;">
                        <label for="iban">IBAN</label>
                        <input type="text" class="form-control" name="iban" id="iban" placeholder="Ihre IBAN">
                        <span class="text-danger" id="iban-error"></span>
                    </div>
                </fieldset>
                    <fieldset>
                        <legend>Benutzerangaben</legend>

                    <div class="row" style="font-size: 16px;">
                        <!-- E-Mail-Adresse -->
                        <div class="col-md-12">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-envelope"></i></span>
                                <input id="email" class="form-control" name="user[email]" type="email" required placeholder="Login Email">
                            </div>
                            <div class="text-danger" id="email-error"></div>
                        </div>

                        <!-- Passwort -->
                        <div class="col-md-12">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-lock-open"></i></span>
                                <input id="password" class="form-control" name="user[password]" type="password" required placeholder="Passwort">
                            </div>
                            <div class="text-danger" id="password-error"></div>
                        </div>

                        <!-- Passwort bestätigen -->
                        <div class="col-md-12">
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-lock-open"></i></span>
                                <input id="password_confirmation" class="form-control" name="user[password_confirmation]" type="password" required placeholder="Passwort wiederholen">
                            </div>
                            <div class="text-danger" id="password-confirmation-error"></div>
                        </div>

                    </div>
                </fieldset>



            </div>
        </div>
    </div>
</div>
{{--<button id="prevalidate">test</button>--}}
@push('scripts')

  {{--  <script>

        $(document).ready(function () {
            $('#prevalidate').on('click', function (e) {
                e.preventDefault();

                // Reset error messages
                resetErrors();

                // Collect form data
                var name = $('#name').val();
                var company_name = $('#company_name').val();
                var email = $('#email').val();
                var password = $('#password').val();
                var password_confirmation = $('#password_confirmation').val();

                // Client-side validations
                var isValid = true;

                if (name.trim() === '') {
                    $('#name-error').text('Name is required.');
                    isValid = false;
                }

                if (company_name.trim() === '') {
                    $('#company-error').text('Company name is required.');
                    isValid = false;
                }

                if (!validateEmail(email)) {
                    $('#email-error').text('Invalid email format.');
                    isValid = false;
                }

                if (password !== password_confirmation) {
                    $('#password-confirmation-error').text('Passwords do not match.');
                    isValid = false;
                }

                if (isValid) {

                    // Proceed with server-side email uniqueness validation
                    $.ajax({
                        url: '/check-email', // Define the Laravel route for checking email
                        type: 'POST',
                        data: {
                            email: email,
                            _token: $('meta[name="_token"]').attr('content') // CSRF token for Laravel
                        },
                        success: function (response) {
                            if (response.exists) {
                                $('#email-error').text('Email already exists.');
                            } else {
                                // If all validations pass, move to the next step
                                alert("All validations passed!");
                                // Code to go to the next step in SmartWizard
                                $("#smartwizard").smartWizard("next");
                            }
                        },
                        error: function (xhr) {
                            console.log(xhr.responseText);
                        }
                    });
                }
            });

            function resetErrors() {
                $('#name-error').text('');
                $('#company-error').text('');
                $('#email-error').text('');
                $('#password-error').text('');
                $('#password-confirmation-error').text('');
            }

            function validateEmail(email) {
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }
        });

    </script>--}}
@endpush
