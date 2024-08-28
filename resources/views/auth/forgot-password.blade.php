<x-page-layout>

    <section class="position-relative">
        <!--:Pattern:-->
        <div class="_bg-pattern text-primary text-opacity-50 opacity-25 w-100 h-100 start-0 top-0 position-absolute"></div>
        <div class="container pt-11 pt-lg-14 pb-9 pb-lg-11 position-relative z-1">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 z-2">

                    <h2 class="mb-1 display-6">
                       Passwort vergessen?
                    </h2>
                    <p class="mb-4 text-body-secondary">
                        Kein Problem. Teilen Sie uns einfach Ihre E-Mail-Adresse mit, und wir senden Ihnen einen Link zum Zurücksetzen des Passworts.
                    </p>
                    <div class="position-relative">
                        <div>
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <form method="POST" novalidate  action="{{ route('password.email') }}">
                                @csrf
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>


                                    <!-- Email Address -->
                                    <div>
                                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" :placeholder="__('Email')"/>

                                    </div>
                                </div>

                                <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                <div class="d-grid">
                                    <x-primary-button class="btn btn-primary">
                                      Passwort zurücksetzen Link <senden></senden>
                                    </x-primary-button>

                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-page-layout>
