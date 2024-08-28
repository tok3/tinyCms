<x-page-layout>


    <section class="position-relative pt-10">

        <div class="container pt-11 pt-lg-14 pb-9 pb-lg-11 position-relative z-1">
            <div class="row align-items-center justify-content-center">
                <div class=" col-xl-4 col-lg-5 col-md-6 col-sm-8 z-2">

                    <h2 class="mb-1 display-6">
                       Neues Passwort
                    </h2>
                    <p class="mb-4 text-body-secondary">
                    </p>
                    <div class="position-relative">
                        <div>
                            <form method="POST" action="{{ route('password.store') }}">
                            @csrf

                            <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <!--input-with-icon-->
                                <div class="input-icon-group mb-3">
                                            <span class="input-icon">
                                          <i class="bx bx-envelope"></i>
                                        </span>
                                    <!-- Email Address -->
                                    <x-text-input id="email" class="form-control" type="email" name="email"  :value="old('email', $request->email)"  required autofocus autocomplete="username" :placeholder="__('Email')"/>
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
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



                                <div class="d-grid">
                                    <button class="btn btn-primary" type="submit">
                                       Passwort zurücksetzten
                                    </button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-page-layout>
