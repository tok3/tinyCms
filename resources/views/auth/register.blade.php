<x-page-layout>

    <!--page-hero-->
    <section class="position-relative">
        <div class="_bg-pattern text-primary text-opacity-50 opacity-25 w-100 h-100 start-0 top-0 position-absolute"></div>
        <div class="bg-gradientwhite flip-y w-50 h-100 start-50 top-0 translate-middle-x position-absolute"></div>
        <div class="container pt-11 pt-lg-14 pb-9 pb-lg-11 position-relative z-1">
            <div class="row align-items-center justify-content-center">
                <div class=" col-xl-4 col-lg-5 col-md-6 col-sm-8 z-2">

                    <h2 class="mb-1 display-6">
                        Willkommen an Board!
                    </h2>
                    <p class="mb-4 text-body-secondary">
                        Benutzerkonto anlegen und durchstarten...
                    </p>
                    <div class="position-relative">
                        <div>
                            <form method="POST" novalidate action="{{ route('register') }}">
                            @csrf

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                              <i class="bx bx-user"></i>
                                            </span>
                                    <!-- Name -->
                                        <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" :placeholder="__('Name')"/>

                                </div>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                              <i class="bx bx-building"></i>
                                            </span>
                                    <!-- Name -->
                                        <x-text-input id="company_name" class="form-control" type="text" name="company_name" :value="old('company_name')" required autofocus autocomplete="company_name" :placeholder="__('Firma Name')"/>
                                </div>
                                <x-input-error :messages="$errors->get('company_name')" class="mt-2" />

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>
                                    <!-- Email Address -->
                                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" :placeholder="__('Email')"/>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2 " />

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-lock-open"></i>
                                            </span>
                                    <x-text-input id="password" class="form-control"
                                                  type="password"
                                                  name="password"
                                                  :placeholder="__('Password')"
                                                  required autocomplete="new-password" />
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                                <i class="bx bx-lock-open"></i>
                                            </span>
                                    <x-text-input id="password_confirmation" class="form-control"
                                                  type="password"
                                                  name="password_confirmation"
                                                  :placeholder="__('Confirm Password')"
                                                  required autocomplete="new-password" />
                                </div>
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                                <!--Checkbox-->
                                <div class="mb-3 d-flex justify-content-between">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="checkbox" value=""
                                               id="flexCheckDefault">
                                        <label class="form-check-label small text-body-secondary" for="flexCheckDefault">
                                            Agree to <a href="{{ URL::asset('#!') }}" class="fw-semibold link-decoration">Terms & conditions</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">
                                        Sign Up
                                    </button>
                                </div>
                            </form>


                            <p class="pt-3 small text-body-tertiary">
                                {{ __('Already registered?') }}
                                <a href="{{ route('login') }}"
                                class="ms-2 fw-semibold link-underline">Sign in</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-page-layout>
