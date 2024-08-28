<x-page-layout>

    <section class="position-relative">
                <div class="container pt-14 pb-9 pb-lg-11">
                    <div class="row pt-lg-7 justify-content-center text-center">
                        <div class="col-xl-8">



                            @if(session('error'))
                                <div class="container mt-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                <h4 class="alert-heading">Fehler!</h4>
                                                <p>Leider konnte keine daten gefunden werden </p>
                                                <hr>
                                                <p class="mb-0">Wenn du weiterhin Probleme hast, kontaktiere bitte unseren Support.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            @if (\Request::input('verified') == 1)
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    Die Email wurde bereits verifiziert, bitte loggen Sie sich hier ein: <b><a href="{{url('login')}}">LOGIN</a></b><br>Wenn Sie Ihr Passwort gerade nicht zur Hand haben, nutzen Sie bitte die Funktion "<a class="link-decoration" href="{{ route('password.request') }}">{{ __('Passwort vergessen') }}"</a>

                                </div>

                              {{--  <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ request()->segment(2)}}">
                                    <input type="hidden" name="token" value="{{ request()->segment(3)}}">

                                    <div>
                                        <x-primary-button class="btn btn-primary btn-lg px-4 px-lg-5">
                                            {{ __('Resend Verification Email') }}
                                        </x-primary-button>
                                    </div>
                                </form>--}}
                            @else
                                <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                                    <i class="bx bx-check lh-1 display-4 fw-normal"></i>
                                </div>
                                <h1 class="display-4 mb-3">
                                    Nur noch ein Schritt ..
                                </h1>
                                <p class="mb-5 lead mx-auto">
                                    Wir haben Ihnen eine E-Mail zum <b>Freischalten Ihres Benutzerkontos zugesendet</b>. Bitte überprüfen Sie Ihren Posteingang und <b>klicken Sie auf den Link in der E-Mail</b>, um Ihre E-Mail-Adresse zu bestätigen. Sollten Sie die E-Mail nicht erhalten haben, senden wir Ihnen gerne eine neue zu. </p>
                            @endif


                                @auth

                                    @if (session('status') == 'verification-link-sent')
                                        <div class="mb-4 font-medium text-sm text-green-600">
                                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                        </div>
                                    @endif

                                    <div class="mt-4 flex items-center justify-between">
                                        <form method="POST" action="{{ route('verification.send') }}">
                                            @csrf
                                            <div>
                                                <x-primary-button>
                                                    {{ __('Resend Verification Email') }}
                                                </x-primary-button>
                                            </div>
                                        </form>

                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                        @endauth

                                    </div>

                        </div>
                    </div>
                </div>
            </section>


</x-page-layout>
