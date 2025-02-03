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
                                        <p>Leider konnten keine daten gefunden werden </p>
                                        <hr>
                                        <p class="mb-0">Versuchen sie eine erneute Registrierung. Sollten weiterhin Probleme auftreten, kontaktieren Sie einfach unseren Support.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif






                        <div class="mb-4 text-sm text-gray-600">

                        </div>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mb-4 font-medium text-sm text-green-600">
                                <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                                    <i class="bx bx-check lh-1 display-4 fw-normal"></i>
                                </div>
                                <p class="mb-5 lead mx-auto">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </p>
                            </div>
                        @else

                            <div class="width-10x height-10x rounded-circle position-relative bg-danger text-white flex-center mb-4">
                                <i class="icon-Repeat-2 lh-1 display-4 fw-normal"></i>
                            </div>
                            <h1 class="display-4 mb-3">
                                schade ..
                            </h1>
                            <p class="mb-5 lead mx-auto">
                                {{ __('Der Der E-Mail-Verifizierungscode ist leider abgelaufen, klicken Sie einfach den Button um einen neuen code zu erhalten') }}</p>

                            <div class="mt-4 flex items-center justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ \Request::segment(2)}}">
                                <input type="hidden" name="token" value="{{ \Request::segment(3)}}">
                                <div>
                                    <x-primary-button  class="btn btn-primary btn-lg px-4 px-lg-5">
                                        {{ __('Resend Verification Email') }}
                                    </x-primary-button>
                                </div>
                            </form>


                        </div>
                        @endif

                </div>
            </div>
        </div>
    </section>

</x-page-layout>
