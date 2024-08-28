<x-assan-layout layout-type="{{$layoutType}}">
        <section class="position-relative bg-gradient-tint">
            <!--divider-->
            <svg class="position-absolute start-0 bottom-0 flip-y" style="color: var(--bs-body-bg);" width="100%"
                height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 152" fill="none"
                preserveAspectRatio="none">
                <path
                    d="M126.597 138.74C99.8867 127.36 76.6479 109.164 59.2161 85.9798L0 3.05176e-05L1440 0C1440 0 1419.98 25.8404 1380.15 32.9584L211.382 150.811C182.549 154.283 153.308 150.12 126.597 138.74Z"
                    fill="currentColor" />
            </svg>
            <div class="container position-relative pt-12 pb-9">
                <div class="row align-items-center pb-8 pt-lg-9">
                    <div class="col-md-10 col-lg-8">
                        <h1 class="display-4 mb-3">
                            Get in touch with us
                        </h1>
                        <p class="mb-0 lead pe-lg-8">Do you have questions about our products or need a quote? Use
                            the
                            contact form below and we will get back to you.</p>
                    </div>
                </div>
                <!--/.row-->
            </div>
            <!--/.content-->
        </section>
        <!--/section-->

        <section class="position-relative">
            <div class="container py-9 py-lg-11">
                <div class="row">
                    <div class="col-md-8 col-lg-7 mb-7 mb-md-0 me-auto">
                        <div class="position-relative">
                            <h2>
                                Contact form
                            </h2>
                            <p class="mb-3 w-lg-75">
                                Use the contact form if you have questions about our products. Our sales team will
                                be happy to help you:
                            </p>
                            <div class="width-7x pt-1 bg-primary mb-5"></div>
                            <!-- Contacts Form -->

                            <form id="contactForm" action="assets/contact/send_mail.php" method="post" role="form"
                                class="needs-validation mb-5 mb-lg-7" novalidate>
                                <div class="row">
                                    <!-- Input -->
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="name">Your name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="John Doe" required>
                                    </div>
                                    <!-- End Input -->

                                    <!-- Input -->
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label" for="email">Your email address</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="john@gmail.com" aria-label="jackwayley@gmail.com" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid email address
                                        </div>
                                    </div>

                                    <div class="w-100"></div>

                                    <!-- Input -->

                                    <!-- Services -->
                                    <div class="col-sm-12 mb-3">
                                        <label class="form-label" for="subject">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject"
                                            placeholder="Web Design" required>
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <!-- Message -->
                                <div class="mb-3">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" name="message" placeholder="Hi there...."
                                        required=""></textarea>
                                    <div class="invalid-feedback">
                                        Please enter a message in the textarea.
                                    </div>
                                </div>

                                <div class="d-md-flex justify-content-between align-items-center">
                                    <p class="small mb-4 text-body-secondary mb-md-0">We'll get back to you in 1-2
                                        business days.</p>
                                    <input type="submit" name="submit" value="Submit message" id="sendBtn"
                                        class="btn btn-lg btn-primary">
                                </div>
                            </form>
                            <!-- End Contacts Form -->

                            <!--Card-->
                            <div class="px-4 py-7 px-lg-5 py-lg-7 border border-2 rounded-3 position-relative"
                                data-aos="fade-up">
                                <div class="position-relative">

                                    <h3 class="mb-4">Need customer support?</h3>
                                    <p class="w-lg-90 mb-5 lead">
                                        If you are already a customer with us, we will be happy to help you in our
                                        Customer Support.
                                    </p>
                                    <div class="width-6x pt-1 bg-success mb-5"></div>
                                    <a href="{{ URL::asset('#') }}" class="btn btn-outline-primary btn-rise">
                                        <div class="btn-rise-bg bg-primary"></div>
                                        <div class="btn-rise-text">
                                            Customer support
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div data-aos="fade-up">
                            <h4 class="mb-0">Global Offices</h4>
                            <div class="border-top border-2 border-secondary mb-4 mt-2" data-aos="fade-up"></div>
                        </div>
                        <div data-aos="fade-up">
                            <h5>USA</h5>
                            <div class="position-relative">
                                <p><strong>Brooklyn </strong><br>Street name 21, Ipsum,<br> 12345,&nbsp;New York
                                    City</p>
                                <p>Phone:&nbsp;+01 1234 456 678<br>Fax: +01 1234 567 890<br>Website: <a rel="noopener"
                                        href="{{ URL::asset('#!') }}">www.site.se</a><br>Email: <a rel="noopener"
                                        href="{{ URL::asset('#!') }}">info@yourmail.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="border-top border-2 border-secondary my-4 my-lg-5" data-aos="fade-up"></div>
                        <div data-aos="fade-up" data-aos-delay="100">
                            <h5>Sweden</h5>
                            <div class="position-relative">
                                <p><strong>Stockholm </strong><br>Street name 21, Danderyd,<br>
                                    SE-12345,&nbsp;Sweden</p>
                                <p>Phone:&nbsp;+46 1234 56789<br>Fax: +46 123 123456<br>Website: <a rel="noopener"
                                        href="{{ URL::asset('#') }}">www.site.se</a><br>Email: <a rel="noopener"
                                        href="{{ URL::asset('#!') }}">info@yourmail.com</a>
                                </p>
                            </div>
                        </div>
                        <div class="border-top border-2 border-secondary my-4 my-lg-5" data-aos="fade-up"></div>
                        <div class="pb-0" data-aos="fade-up" data-aos-delay="150">
                            <h5>South Korea</h5>
                            <div class="position-relative">
                                <p>373 Gangnam-daero<br> Seocho-gu, Seoul, 06621,<br> South Korea</p>
                                <p>Phone:&nbsp;+82 1234 56789<br>Fax: +82 123 123456<br>Website: <a rel="noopener"
                                        href="{{ URL::asset('#') }}">www.site.se</a><br>Email: <a rel="noopener"
                                        href="{{ URL::asset('#!') }}">info@yourmail.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="border-top border-bottom overflow-hidden position-relative">
            <div class="container py-9 py-lg-11">
                <div class="row align-items-end position-relative">
                    <div class="col-lg-7 text-center text-lg-start">
                        <h5 class="mb-3 text-body-tertiary">Let's start building</h5>
                        <h1 class="mb-5 mb-lg-0 display-5">Stunning websites ease</h1>
                    </div>
                    <div class="col-lg-5 text-lg-end text-center">
                        <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg me-2 mb-2 mb-lg-0 rounded-4">Contact sales</a>
                        <a href="{{ URL::asset('#!') }}" class="btn btn-success btn-lg rounded-4">Purchase Now</a>
                    </div>
                </div>
            </div>
        </section>
</x-assan-layout>
