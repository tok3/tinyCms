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
                            <div class="text-danger mb-1" x-text="errors.vorname"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-user"></i></span>
                                <input id="vorname" class="form-control" name="user[vorname]" type="text" placeholder="Vorname" x-model="form.vorname">
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="text-danger mb-1" x-text="errors.name"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-user"></i></span>
                                <input id="name" class="form-control" name="user[name]" type="text" placeholder="Name" x-model="form.name">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Firma -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.company"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map"></i></span>
                                <input id="compName" class="form-control" name="company[name]" type="text" placeholder="Firma" x-model="form.company">
                            </div>
                        </div>

                        <!-- Firmen-Email -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.company_email"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-envelope"></i></span>
                                <input id="compEmail" class="form-control" name="company[email]" type="email" placeholder="Firma Email / Rechnungsemail" x-model="form.company_email">
                            </div>
                        </div>

                        <!-- Straße -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.street"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map"></i></span>
                                <input id="str" class="form-control" name="company[str]" type="text" placeholder="Straße / Haus-Nr." x-model="form.street">
                            </div>
                        </div>

                        <!-- PLZ & Ort -->
                        <div class="col-md-4">
                            <div class="text-danger mb-1" x-text="errors.plz"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map-pin"></i></span>
                                <input id="plz" class="form-control" name="company[plz]" type="number" placeholder="PLZ" x-model="form.plz">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="text-danger mb-1" x-text="errors.ort"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-buildings"></i></span>
                                <input id="ort" class="form-control" name="company[ort]" type="text" placeholder="Ort" x-model="form.ort">
                            </div>
                        </div>
                    </div>
                </fieldset>

                <!-- Zahlungsweise -->
                <fieldset class="mb-4" id="by-invoice">
                    <legend>Abonnement Zahlungsweise</legend>

                    <div class="text-danger mb-1" x-text="errors.pay_by_invoice"></div>
                    <div class="form-group">
                        <input type="radio" name="pay_by_invoice" value="0" id="payment_creditcard" x-model="form.pay_by_invoice">
                        <label for="payment_creditcard">&nbsp;<i class="bi bi-credit-card"></i>&nbsp;<i class="bi bi-paypal"></i>&nbsp;<i class="bi bi-wallet2"></i>&nbsp;<i class="bi bi-credit-card-2-front"></i> Standard</label>

                        <input type="radio" style="margin-left:10px;" name="pay_by_invoice" value="1" id="payment_sepa" x-model="form.pay_by_invoice">
                        <label for="payment_sepa"><i class="bi bi-receipt"></i> Kauf auf Rechnung </label>
                    </div>

                   {{-- <div class="form-group" id="iban_container" style="margin-top: 15px;" x-show="form.pay_by_invoice == 1">
                        <label for="iban">IBAN</label>
                        <div class="text-danger mb-1" x-text="errors.iban"></div>
                        <input type="text" class="form-control" name="iban" id="iban" placeholder="Ihre IBAN" x-model="form.iban">
                    </div>--}}
                </fieldset>

                <!-- Benutzerangaben -->
                <fieldset>
                    <legend>Benutzerangaben</legend>
                    <div class="row">
                        <!-- Benutzer-Email -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.email"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-envelope"></i></span>
                                <input
                                    id="email"
                                    class="form-control"
                                    name="user[email]"
                                    type="email"
                                    placeholder="Login Email"
                                    x-model="form.email"
                                    @input="watchEmail()"
                                />
                            </div>
                        </div>

                        <!-- Passwort -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.password"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-lock-open"></i></span>
                                <input id="password" class="form-control" name="user[password]" type="password" placeholder="Passwort" x-model="form.password">
                            </div>
                        </div>

                        <!-- Passwort-Wiederholung -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.confirmPassword"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-lock-open"></i></span>
                                <input id="password_confirmation" class="form-control" name="user[password_confirmation]" type="password" placeholder="Passwort wiederholen"
                                       x-model="form.confirmPassword">
                            </div>
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
