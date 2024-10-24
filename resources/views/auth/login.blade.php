<x-page-layout>


    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="position-relative">
        <!--:Pattern:-->
        <div class="text-primary text-opacity-50 opacity-25 w-100 h-100 start-0 top-0 position-absolute"></div>
        <div class="container pt-11 pt-lg-14 pb-9 pb-lg-11 position-relative z-1">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 z-2">

                    <h2 class="mb-1 display-6">
                        ... zurück an Board !
                    </h2>
                    <p class="mb-4 text-body-secondary">
                        anmelden mit Ihren Benutzerdaten ...
                    </p>
                    <div class="position-relative">
                        <div>
                            <form method="POST" action="{{ route('login') }}" novalidate>
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
                                <x-input-error :messages="$errors->get('email')" class="mt-2 " />
                                <div class="input-icon-group mb-3">
                                        <span class="input-icon">
                                            <i class="bx bx-lock-open"></i>
                                        </span>
                                    <x-text-input id="password" class="form-control"
                                                  type="password"
                                                  name="password"
                                                  :placeholder="__('Password')"
                                                  required autocomplete="current-password" />
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <div class="mb-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input id="flexCheckDefault" type="checkbox" class="form-check-input" name="remember">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ __('Remember me') }}
                                        </label>
                                    </div>
                                    <div>

                                        @if (Route::has('password.request'))
                                            <label class="text-end d-block small mb-0">

                                            <a class="link-decoration" href="{{ route('password.request') }}">
                                                {{ __('Passwort vergessen') }}?
                                            </a>
                                        </label>
                                        @endif

                                    </div>
                                </div>

                                <div class="d-grid">
                                    <x-primary-button class="btn btn-primary">
                                        {{ __('Log in') }}
                                    </x-primary-button>

                                </div>
                            </form>

                            <!---->
                            <p class="pt-4 small text-body-secondary">
                                Noch keinen Zugang? <a href="{{ route('view.plans') }}" class="ms-2 fw-semibold link-underline">Plan wählen</a>
                            </p>

                            {{--<!--Divider-->
                            <div class="d-flex align-items-center py-3">
                                <span class="flex-grow-1 border-bottom pt-1"></span>
                                <span class="d-inline-flex flex-center lh-1 mx-2 width-2x height-2x rounded-circle text-mono">or</span>
                                <span class="flex-grow-1 border-bottom pt-1"></span>
                            </div>
                            <div class="d-grid">
                                <a href="{{ URL::asset('#!') }}" class="d-flex hover-lift btn-secondary mb-2 btn position-relative flex-center">
                                    <!--Main Icon-->
                                    <div class="position-relative d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/brands/google.svg') }}" alt="" class="width-2x me-2">
                                        <span>sign in with google</span>
                                    </div>
                                </a>
                                <a href="{{ URL::asset('#!') }}" class="d-flex hover-lift btn-secondary btn position-relative flex-center">
                                    <!--Main Icon-->
                                    <div class="position-relative d-flex align-items-center">
                                        <img src="{{ URL::asset('assets/img/brands/Facebook.svg') }}" alt="" class="width-2x me-2">
                                        <span>sign in with facebook</span>
                                    </div>
                                </a>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-page-layout>
