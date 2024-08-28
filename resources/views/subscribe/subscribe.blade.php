<x-blank-layout>

    @extends('layouts.subscribe')

    @section('content')

        <section class="position-relative" id="contact">



            @if(session('info'))

                <div class="container pt-14 pb-9 pb-lg-11">
                    <div class="row pt-lg-7 justify-content-center text-center">
                        <div class="col-xl-8">
                            <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                                <i class="bx bx-alarm-exclamation lh-1 display-4 fw-normal"></i>
                            </div>
                            <h3 class="display-4 mb-3">
                                Fast fertig!
                            </h3>
                            <p class="mb-5 lead mx-auto">
                            <p class="lead">Um die Anmeldung abzuschließen, musst Du <strong><a href="#">nur noch Deine E-Mail-Adresse bestätigen</a></strong>. Es befindet sich eine E-Mail in deinem Posteingang mit einem Link zur Bestätigung. Solltest du
                                keine E-Mail erhalten haben, überprüfe bitte auch deinen Ordner für unerwünschte Werbung (Spam).</p>
                            <hr>
                            <p class="mb-0 lead">Die Bestätigung deiner E-Mail-Adresse ist der letzte Schritt, um unseren Newsletter zu erhalten. Wir freuen uns darauf, dich bald als Abonnenten begrüßen zu
                                dürfen!</p>
                            </p>

                        </div>
                    </div>
                </div>

            @elseif(session('success'))
                <div class="container pt-14 pb-9 pb-lg-11">
                    <div class="row pt-lg-7 justify-content-center text-center">
                        <div class="col-xl-8">
                            <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                                <i class="bx bx-check lh-1 display-4 fw-normal"></i>
                            </div>
                            <h3 class="display-4 mb-3">
                                Vielen Dank!
                            </h3>
                            <div class="alert _alert-success" role="alert">
                                <p class="lead">Deine E-Mail-Adresse wurde erfolgreich bestätigt. Du wirst ab sofort unseren Newsletter erhalten.</p>
                                <hr>
                                <p class="mb-0 lead">Solltest du Fragen haben, kannst du uns jederzeit kontaktieren.</p>
                            </div>

                        </div>
                    </div>
                </div>
            @elseif(session('unsubscribe_success'))
                <div class="container pt-14 pb-9 pb-lg-11">
                    <div class="row pt-lg-7 justify-content-center text-center">
                        <div class="col-xl-8">
                            <div class="width-10x height-10x rounded-circle position-relative bg-success text-white flex-center mb-4">
                                <i class="bx bx-check lh-1 display-4 fw-normal"></i>
                            </div>
                            <h3 class="display-4 mb-3">
                               Auf Wiedersehen!
                            </h3>
                            <div class="alert _alert-success" role="alert">
                                <p class="lead">Die E-Mail-Adresse wurde erfolgreich von der Liste entfernt!</p>
                                <hr>
                            </div>

                        </div>
                    </div>
                </div>
            @elseif(session('error'))
                <div class="container pt-14 pb-9 pb-lg-11">
                    <div class="row pt-lg-7 justify-content-center text-center">
                        <div class="col-xl-8">
                            <div class="width-10x height-10x rounded-circle position-relative bg-danger text-white flex-center mb-4">
                                <i class="bx bx-message-alt-error lh-1 display-4 fw-warning"></i>
                            </div>
                            <h3 class="display-4 mb-3">
                                Fehler!
                            </h3>
                            <p class="mb-5 lead mx-auto">
                            <p class="lead">Der Bestätigungscode ist ungültig oder abgelaufen. Bitte überprüfe den Link oder fordere eine <a href="{{url()->current()}}"><strong>neue Bestätigungsmail</strong></a> an.</p>
                            <hr>
                            <p class="mb-0 lead">Wenn du weiterhin Probleme hast, kontaktiere bitte unseren Support.</p>
                            </p>

                        </div>
                    </div>
                </div>
            @else

            <div class="container py-9 py-lg-12">
                <div class="row">
                    <div class="col-md-8 col-lg-7 mb-7 mb-md-0 me-auto">
                        <div class="position-relative">
                            <h2 class="display-5 mb-4">
                                Newsletter erhalten
                            </h2>
                            <p class="mb-5 lead pe-lg-8">
                                Wir freuen uns über Ihre Newsletter-Registrierung, um Sie regelmäßig über interessante Angebote informieren zu können.
                            </p>
                            <!-- Contacts Form -->
                            <form method="POST" action="{{ route('subscribe.register', ['company_id' => $company->id]) }}" class="needs-validation mb-5 mb-lg-7" novalidate="">
                                @csrf
                                <input type="hidden" name="company_id" value="{{ $company->id}}">
                                <div class="form-group">
                                    <label for="first_name">Vorname</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name">
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Nachname</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail Adresse</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>


                                <div class="d-md-flex justify-content-between align-items-center">
                                    <div class="form-group form-check">
                                        &nbsp;&nbsp;<input type="checkbox" class="form-check-input" id="privacy" name="privacy">
                                        <label class="form-check-label" for="privacy">Ich stimme der Datenschutzerklärung zu.</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn btn-lg btn-primary">Abonnieren</button>
                                </div>
                            </form>
                            <!-- End Contacts Form -->
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <div data-aos="fade-up" class="aos-init aos-animate">
                            <img src="{{ asset('storage/'.$company->logo_image)}}" width="100%" alt="{{ $company->name .  $company->name2}}-Logo">
                            <h4 class="mb-0">{{ $company->name .  $company->name2}}</h4>
                            <div class="border-top border-secondary mb-4 mt-2 aos-init aos-animate" data-aos="fade-up"></div>
                        </div>
                        <div data-aos="fade-up" class="aos-init aos-animate">
                            <div class="position-relative">
                                <p>{{ $company->str}}<br><strong>{{ $company->plz}} </strong>{{ $company->ort}}</p>
                                @if($company->web !="")
                                    Website: <a rel="noopener" href="#!">{{ $company->web}}</a>
                                @endif
                                @if($company->email !='')
                                    <br>Email: <a rel="noopener" href="#!">{{ $company->email}}</a>
                                @endif
                            </div>
                        </div>
                        {{--     <div class="_border-top border-secondary my-4 my-lg-5 aos-init aos-animate" data-aos="fade-up"></div>
                             <div data-aos="fade-up" data-aos-delay="100" class="aos-init aos-animate">
                                 <h5>Sweden</h5>
                                 <div class="position-relative">
                                     <p><strong>Stockholm </strong><br>Street name 21, Danderyd,<br>
                                         SE-12345,&nbsp;Sweden</p>
                                     <p>Phone:&nbsp;+46 1234 56789<br>Fax: +46 123 123456<br>Website: <a rel="noopener" href="#">www.site.se</a><br>Email: <a rel="noopener" href="#!">info@yourmail.com</a>
                                     </p>
                                 </div>
                             </div>
                        --}}
                    </div>
                </div>
            </div>

      @endif
        </section>



       {{-- @if(session('info'))
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Fast fertig!</h4>
                            <p>Um die Anmeldung abzuschließen, musst du deine E-Mail-Adresse bestätigen. Es befindet sich eine E-Mail in deinem Posteingang mit einem Link zur Bestätigung. Solltest du
                                keine E-Mail erhalten haben, überprüfe bitte auch deinen Ordner für unerwünschte Werbung (Spam).</p>
                            <hr>
                            <p class="mb-0">Die Bestätigung deiner E-Mail-Adresse ist der letzte Schritt, um unseren Newsletter zu erhalten. Wir freuen uns darauf, dich bald als Abonnenten begrüßen zu
                                dürfen!</p>
                        </div>

                    </div>
                </div>
            </div>
        @elseif(session('success'))
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading">Vielen Dank!</h4>
                            <p>Deine E-Mail-Adresse wurde erfolgreich bestätigt. Du wirst ab sofort unseren Newsletter erhalten.</p>
                            <hr>
                            <p class="mb-0">Solltest du Fragen haben, kannst du uns jederzeit kontaktieren.</p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif(session('error'))
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger" role="alert">
                            <h4 class="alert-heading">Fehler!</h4>
                            <p>Der Bestätigungscode ist ungültig oder abgelaufen. Bitte überprüfe den Link oder fordere eine neue Bestätigungsmail an.</p>
                            <hr>
                            <p class="mb-0">Wenn du weiterhin Probleme hast, kontaktiere bitte unseren Support.</p>
                        </div>
                    </div>
                </div>
            </div>
        @else

            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">Newsletter Abonnieren</div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('subscribe.register', ['company_id' => $company->id]) }}">
                                    @csrf

                                    <div class="form-group">
                                        <label for="first_name">Vorname</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Nachname</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-Mail Adresse</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>

                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="privacy" name="privacy">
                                        <label class="form-check-label" for="privacy">Ich stimme der Datenschutzerklärung zu.</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Abonnieren</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif--}}

    @endsection

</x-blank-layout>
