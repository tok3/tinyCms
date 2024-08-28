<x-assan-layout layout-type="{{$layoutType}}">

            <!--::Start Hero Signup::-->
            <section class="position-relative bg-primary-subtle">
                <!--:Hero divider vector:-->
                <svg class="position-absolute start-0 bottom-0 h-lg-30" style="color: var(--bs-body-bg);" preserveAspectRatio="none" width="100%"
                    height="35%" viewBox="0 0 1296 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M1296 0H1241.56C1188.17 0 1080.35 0 971.477 21.9407C863.651 43.8814 755.826 87.7628 648 110.296C540.174 132.237 432.349 132.237 323.477 128.086C215.651 124.528 107.826 117.412 54.4362 113.854L3.71933e-05 110.296V220H54.4362C107.826 220 215.651 220 323.477 220C432.349 220 540.174 220 648 220C755.826 220 863.651 220 971.477 220C1080.35 220 1188.17 220 1241.56 220H1296V0Z"
                        fill="currentColor" />
                </svg>
                <div class="container col-xl-10 col-xxl-8 pt-12 pt-lg-14 pb-9">
                    <div class="row align-items-center pb-lg-11">
                        <div class="col-lg-7 text-center text-lg-start">
                            <!--:Heading:-->
                            <h1 class="display-2 mb-4">Vertically centered hero sign-up form</h1>
                            <!--:Subheading:-->
                            <p class="w-lg-90 lead">
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                                mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="col-11 mx-auto col-lg-4">
                            <div class="position-relative pe-4 pt-4">
                                <!--:Signup form:-->
                                <form
                                    class="px-4 py-5 rounded-4 bg-body shadow-lg z-1 position-relative needs-validation"
                                    novalidate>
                                    <!--:Input floating:-->
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" required id="floatingInput"
                                            placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                        <span class="invalid-feedback">Please enter a valid email address</span>
                                    </div>
                                    <!--:Password floating:-->
                                    <div class="form-floating mb-3">
                                        <input type="password" required class="form-control" id="floatingPassword"
                                            placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                        <span class="invalid-feedback">Enter the password</span>
                                    </div>
                                    <!--:label:-->
                                    <div class="mb-3 form-check">
                                        <input class="form-check-input me-1" id="terms" type="checkbox" value="">
                                        <label class="form-check-label small" for="terms">Subscribe to our
                                            newsletter</label>
                                    </div>
                                    <!--:Submit button:-->
                                    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
                                    <!--:Info text:-->
                                    <small class="text-body-tertiary d-block pt-2">By clicking Sign up, you agree to the terms & conditions
                                        of use.</small>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--::/End Hero Signup::-->
            <section class="border-bottom">
                <div class="container pt-9 pt-lg-11">

                    <!--//////////////////SNIPPETS:BEGIN////////////////-->
                    <nav class="nav-tabs nav">
                        <a href="{{ URL::asset('#tabMain') }}" data-bs-toggle="tab" class="nav-link active">HTML</a>
                        <a href="{{ URL::asset('#tabCss') }}" data-bs-toggle="tab" class="nav-link">Css</a>
                        <a href="{{ URL::asset('#tabJs') }}" data-bs-toggle="tab" class="nav-link">Js</a>
                    </nav>
                    <div class="tab-content">
                        <!--Element Main code-->
                        <div class="tab-pane fade show active" id="tabMain">
                            <div class="position-relative" style="max-height:75vh; overflow-y:auto">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyHTML1" data-clipboard-action="copy"
                                    id="copyHTML1-1">Copy code</button>
<pre id="copyHTML1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
<code>
    &lt;!--::Start Hero Signup::-->
    &lt;section class="position-relative bg-primary-subtle">
       &lt;!--:Hero divider vector:-->
       &lt;svg class="position-absolute start-0 bottom-0 h-lg-30" style="color: var(--bs-body-bg);" preserveAspectRatio="none" width="100%"
           height="35%" viewBox="0 0 1296 220" fill="none" xmlns="http://www.w3.org/2000/svg">
           &lt;path fill-rule="evenodd" clip-rule="evenodd"
               d="M1296 0H1241.56C1188.17 0 1080.35 0 971.477 21.9407C863.651 43.8814 755.826 87.7628 648 110.296C540.174 132.237 432.349 132.237 323.477 128.086C215.651 124.528 107.826 117.412 54.4362 113.854L3.71933e-05 110.296V220H54.4362C107.826 220 215.651 220 323.477 220C432.349 220 540.174 220 648 220C755.826 220 863.651 220 971.477 220C1080.35 220 1188.17 220 1241.56 220H1296V0Z"
               fill="currentColor" />
       &lt;/svg>
       &lt;div class="container col-xl-10 col-xxl-8 pt-12 pt-lg-14 pb-9">
           &lt;div class="row align-items-center pb-lg-11">
               &lt;div class="col-lg-7 text-center text-lg-start">
                   &lt;!--:Heading:-->
                   &lt;h1 class="display-2 mb-4">Vertically centered hero sign-up form&lt;/h1>
                   &lt;!--:Subheading:-->
                   &lt;p class="w-lg-90 lead">
                       Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                       mollit anim id est laborum.
                   &lt;/p>
               &lt;/div>
               &lt;div class="col-11 mx-auto col-lg-4">
                   &lt;div class="position-relative pe-4 pt-4">
                       &lt;!--:Signup form:-->
                       &lt;form
                           class="px-4 py-5 rounded-4 bg-body shadow-lg z-1 position-relative needs-validation"
                           novalidate>
                           &lt;!--:Input floating:-->
                           &lt;div class="form-floating mb-3">
                               &lt;input type="email" class="form-control" required id="floatingInput"
                                   placeholder="name@example.com">
                               &lt;label for="floatingInput">Email address&lt;/label>
                               &lt;span class="invalid-feedback">Please enter a valid email address&lt;/span>
                           &lt;/div>
                           &lt;!--:Password floating:-->
                           &lt;div class="form-floating mb-3">
                               &lt;input type="password" required class="form-control" id="floatingPassword"
                                   placeholder="Password">
                               &lt;label for="floatingPassword">Password&lt;/label>
                               &lt;span class="invalid-feedback">Enter the password&lt;/span>
                           &lt;/div>
                           &lt;!--:label:-->
                           &lt;div class="mb-3 form-check">
                               &lt;input class="form-check-input me-1" id="terms" type="checkbox" value="">
                               &lt;label class="form-check-label small" for="terms">Subscribe to our
                                   newsletter&lt;/label>
                           &lt;/div>
                           &lt;!--:Submit button:-->
                           &lt;button class="w-100 btn btn-lg btn-primary" type="submit">Sign up&lt;/button>
                           &lt;!--:Info text:-->
                           &lt;small class="text-body-tertiary d-block pt-2">By clicking Sign up, you agree to the terms & conditions
                               of use.&lt;/small>
                       &lt;/form>
                   &lt;/div>
               &lt;/div>
           &lt;/div>
       &lt;/div>
   &lt;/section>
   &lt;!--::/End Hero Signup::-->
</code>
</pre>
                            </div>
                        </div>
                        <!--Element Css-->
                        <div class="tab-pane fade" id="tabCss">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyCss1" data-clipboard-action="copy" id="copyCss1-2">Copy
                                    code</button>
                                <pre id="copyCss1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;link href="{{ URL::asset('assets/css/theme.min.css') }}" rel="stylesheet">
</code>
</pre>
                            </div>
                        </div>

                        <!--Element JS-->
                        <div class="tab-pane fade" id="tabJs">
                            <div class="position-relative">
                                <button
                                    class="btn btn-sm position-absolute end-0 top-0 me-3 mt-3 z-1 btn-primary copy-link"
                                    data-clipboard-target="#copyJs1" data-clipboard-action="copy" id="copyJs1-3">Copy
                                    code</button>
                                <pre id="copyJs1" class="language-markup bg-secondary text-white-50 mt-0" data-lang="html">
                <code>
  &lt;!-- Bootstrap + Vendor + Theme -->
  &lt;script src="{{ URL::asset('assets/css/theme.bundle.js') }}">&lt;/script>
</code>
</pre>
                            </div>
                        </div>
                    </div>
                    <!--//////////////////SNIPPETS:END////////////////-->
                </div>
                <div class="container py-9 py-lg-11">
                    <div class="px-4 rounded-3 shadow-lg py-6 px-lg-5 py-lg-7 bg-gradient bg-secondary text-white position-relative overflow-hidden"
                        data-aos="fade-up" data-aos-duration="400">
                        <svg class="position-absolute end-0 bottom-0 mb-4 text-success" width="200" height="400"
                            preserveAspectRatio="none" viewBox="0 0 150 300" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M150 300C130.302 300 110.796 296.12 92.5975 288.582C74.3986 281.044 57.8628 269.995 43.934 256.066C30.0052 242.137 18.9563 225.601 11.4181 207.403C3.87986 189.204 -6.2614e-07 169.698 0 150C6.2614e-07 130.302 3.87987 110.796 11.4181 92.5975C18.9563 74.3987 30.0052 57.8628 43.934 43.934C57.8628 30.0052 74.3987 18.9563 92.5975 11.4181C110.796 3.87986 130.302 3.51961e-06 150 5.00679e-06L150 37.5C135.226 37.5 120.597 40.4099 106.948 46.0636C93.299 51.7172 80.8971 60.0039 70.4505 70.4505C60.0039 80.8971 51.7172 93.299 46.0636 106.948C40.4099 120.597 37.5 135.226 37.5 150C37.5 164.774 40.4099 179.403 46.0636 193.052C51.7172 206.701 60.0039 219.103 70.4505 229.55C80.8971 239.996 93.299 248.283 106.948 253.936C120.597 259.59 135.226 262.5 150 262.5V300Z"
                                fill="currentColor"></path>
                        </svg>

                        <div class="row align-items-end position-relative">
                            <div class="col-lg-6 col-xl-7">
                                <h5 class="text-white-50 mb-4">Let's start building</h5>
                                <h2 class="mb-5 mb-md-0 display-5">Stunning websites ease</h2>
                            </div>
                            <div class="col-lg-6 col-xl-5 text-lg-end">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg me-2 mb-2 mb-lg-0">Contact sales</a>
                                <a href="{{ URL::asset('#!') }}" class="btn btn-gray-200 btn-lg">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
