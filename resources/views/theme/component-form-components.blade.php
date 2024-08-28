<x-assan-layout layout-type="{{$layoutType}}">
            <!--page-hero-->
            <section class="bg-gradient-primary text-white position-relative">
                <div class="container pt-14 pb-9 pb-lg-12 position-relative z-1">
                    <div class="row pt-lg-5 align-items-center justify-content-center text-center">
                        <div class="col-lg-10 col-xl-7 z-2">
                            <div class="position-relative">
                                <div>
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <div class="mb-4">
                                            <ol class="breadcrumb mb-0">
                                                <li class="breadcrumb-item"><a href="{{ URL::asset('#') }}">Home</a></li>
                                                <li class="breadcrumb-item active">Components</li>
                                                <li class="breadcrumb-item active" aria-current="page">Form components
                                                </li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                        Form components
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <div class="row justify-content-between">
                        <div class="order-md-last col-md-3">
                            <!--sticky top-->

                            <div class="position-sticky top-0">
                                <h6 class="mb-0 pt-3">On this page</h6>
                                <hr class="mt-2">
                                <div class="nav nav-pills flex-column" id="navbar-elements">
                                    <a href="{{ URL::asset('#navinput') }}" class="nav-link px-4">Input</a>
                                    <a href="{{ URL::asset('#navfile') }}" class="nav-link px-4">File
                                        upload</a>
                                    <a href="{{ URL::asset('#navselect') }}" class="nav-link px-4">Select
                                        box</a>
                                    <a href="{{ URL::asset('#nav-checks-radio') }}" class="nav-link px-4">Checks &amp; radios</a>
                                    <a href="{{ URL::asset('#navrange') }}" class="nav-link px-4">Range</a>
                                    <a href="{{ URL::asset('#navfgroup') }}" class="nav-link px-4">Input
                                        group</a>
                                    <a href="{{ URL::asset('#navflabels') }}" class="nav-link px-4">Floating
                                        Labels</a>
                                    <a href="{{ URL::asset('#navficons') }}" class="nav-link px-4">Input
                                        icons</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-xl-8 order-md-1">
                            <div id="navinput" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Input</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <!--Input-->
                            <input type="text" class="form-control" placeholder="Default Input">
                            <hr class="mt-5 mb-3">
                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Input sizing</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <!--Input-->
                            <input type="text" class="form-control form-control-sm mb-2" placeholder="Small Input">
                            <input type="text" class="form-control mb-2" placeholder="Default Input">
                            <input type="text" class="form-control form-control-lg mb-2" placeholder="Large Input">

                            <hr class="mt-5 mb-3">
                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Readonly &amp; disabled </h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <!--Input-->
                            <input type="text" class="form-control mb-2" placeholder="Readonly Input" readonly="">
                            <!--Input-->
                            <input type="text" class="form-control" placeholder="Disabled Input" disabled="">


                            <hr class="mt-5 mb-3">
                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Custom input</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <small class="mb-1 d-block text-body-secondary"><code>.rounded-0</code></small>
                            <!--Input-->
                            <input type="text" class="form-control rounded-0 mb-3" placeholder="Input placeholder">

                            <small class="mb-1 d-block text-body-secondary"><code>.rounded-pill</code></small>
                            <!--Input-->
                            <input type="text" class="form-control rounded-pill px-4 mb-3"
                                placeholder="Input placeholder">

                            <small class="mb-1 d-block text-body-secondary"><code>.rounded-0 +
                                    .shadow-none</code></small>
                            <!--Input-->
                            <input type="text" class="form-control shadow-none rounded-0 mb-3"
                                placeholder="Input placeholder">

                            <small class="mb-1 d-block text-body-secondary"><code>.rounded-0 + .shadow-none +
                                    .border-secondary</code></small>
                            <!--Input-->
                            <input type="text" class="form-control border-secondary shadow-none rounded-0 mb-3"
                                placeholder="Input placeholder">

                            <small class="mb-1 d-block text-body-secondary"><code>.rounded-0 + .shadow-none +
                                    .border-secondary + .border-2</code></small>
                            <!--Input-->
                            <input type="text" class="form-control border-2 border-secondary shadow-none rounded-0 mb-3"
                                placeholder="Input placeholder">
                            <small class="mb-1 d-block text-body-secondary"><code>.border-2 +
                                    .shadow-none</code></small>
                            <!--Input-->
                            <input type="text" class="form-control border-2 shadow-none mb-3"
                                placeholder="Input placeholder">
                            <small class="mb-1 d-block text-body-secondary"><code>.bg-body-tertiary +
                                    .shadow-none</code></small>
                            <!--Input-->
                            <input type="text"
                                class="form-control border-0 form-control-lg bg-body-tertiary shadow-none mb-3"
                                placeholder="Input placeholder">
                            <small class="mb-1 d-block text-body-secondary"><code>.bg-secondary +
                                    .shadow-none</code></small>
                            <!--Input-->
                            <input type="text"
                                class="form-control border-0 form-control-lg bg-secondary text-white shadow-none mb-3"
                                placeholder="Input placeholder">
                            <hr class="mt-5 mb-3">

                            <div id="navfile" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">File Input</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <!--Input-->
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Default file input example</label>
                                <input class="form-control" type="file" id="formFile">
                            </div>
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Multiple files input example</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple="">
                            </div>
                            <div class="mb-3">
                                <label for="formFileDisabled" class="form-label">Disabled file input example</label>
                                <input class="form-control" type="file" id="formFileDisabled" disabled="">
                            </div>
                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Small file input example</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            <div>
                                <label for="formFileLg" class="form-label">Large file input example</label>
                                <input class="form-control form-control-lg" id="formFileLg" type="file">
                            </div>


                            <hr class="mt-5 mb-3">

                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Datalist</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <label for="exampleDataList" class="form-label">Datalist example</label>
                            <input class="form-control" list="datalistOptions" id="exampleDataList"
                                placeholder="Type to search...">
                            <datalist id="datalistOptions">
                                <option value="San Francisco">
                                </option>
                                <option value="New York">
                                </option>
                                <option value="Seattle">
                                </option>
                                <option value="Los Angeles">
                                </option>
                                <option value="Chicago">
                                </option>
                            </datalist>
                            <hr class="mt-5 mb-3">

                            <div id="navselect" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Select</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <hr class="mt-5 mb-3">

                            <div id="nav-checks-radio"
                                class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Checks and radios</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <p class="mb-3 text-body-secondary">Checkbox</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-5">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked"
                                    checked="">
                                <label class="form-check-label" for="flexCheckChecked">
                                    Checked checkbox
                                </label>
                            </div>
                            <p class="mb-3 text-body-secondary">Disabled checkbox</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled"
                                    disabled="">
                                <label class="form-check-label" for="flexCheckDisabled">
                                    Disabled checkbox
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckCheckedDisabled"
                                    checked="" disabled="">
                                <label class="form-check-label" for="flexCheckCheckedDisabled">
                                    Disabled checked checkbox
                                </label>
                            </div>

                            <hr class="mt-5 mb-3">

                            <div class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Radios</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Default radio
                                </label>
                            </div>
                            <div class="form-check mb-5">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" checked="">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Default checked radio
                                </label>
                            </div>

                            <p class="mb-3 text-body-secondary">Disabled radio</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                    id="flexRadioDisabled" disabled="">
                                <label class="form-check-label" for="flexRadioDisabled">
                                    Disabled radio
                                </label>
                            </div>
                            <div class="form-check mb-5">
                                <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                    id="flexRadioCheckedDisabled" checked="" disabled="">
                                <label class="form-check-label" for="flexRadioCheckedDisabled">
                                    Disabled checked radio
                                </label>
                            </div>


                            <h6 class="mb-3">Switches</h6>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox
                                    input</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                                    input</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled"
                                    disabled="">
                                <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox
                                    input</label>
                            </div>
                            <div class="form-check form-switch mb-5">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled"
                                    checked="" disabled="">
                                <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked
                                    switch checkbox input</label>
                            </div>

                            <h6 class="mb-3">Toggle buttons</h6>
                            <input type="radio" class="btn-check" id="plan-monthly" name="toggle-radio" checked="">
                            <label class="btn btn-outline-primary" for="plan-monthly">Monthly</label>
                            <input type="radio" class="btn-check" id="plan-yearly" name="toggle-radio">
                            <label class="btn btn-outline-primary" for="plan-yearly">Yearly</label>



                            <hr class="mt-5 mb-3">

                            <div id="navrange" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Range input</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <label for="customRange1" class="form-label">Example range</label>
                            <input type="range" class="form-range mb-4" id="customRange1">

                            <p class="mb-3 text-body-secondary">Min and max</p>
                            <label for="customRange2" class="form-label">Example range</label>
                            <input type="range" class="form-range" min="0" max="5" id="customRange2">


                            <hr class="mt-5 mb-3">

                            <div id="navfgroup" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Input Group</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username"
                                    aria-describedby="basic-addon1">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Recipient's username"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text" id="basic-addon2">@example.com</span>
                            </div>

                            <label for="basic-url" class="form-label">Your vanity URL</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-text">.00</span>
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                            </div>

                            <div class="input-group mb-5">
                                <span class="input-group-text">With textarea</span>
                                <textarea class="form-control" aria-label="With textarea"></textarea>
                            </div>

                            <p class="mb-3 text-body-secondary">Sizing</p>

                            <div class="input-group input-group-sm mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Small</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-sm">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default">
                            </div>

                            <div class="input-group input-group-lg mb-5">
                                <span class="input-group-text" id="inputGroup-sizing-lg">Large</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-lg">
                            </div>


                            <h6 class="mb-3">Buttons with Dropdown</h6>
                            <div class="input-group mb-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a></li>
                                </ul>
                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                            </div>

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a></li>
                                </ul>
                            </div>

                            <div class="input-group">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Action before</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Another action before</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a></li>
                                </ul>
                                <input type="text" class="form-control" aria-label="Text input with 2 dropdown buttons">
                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">Dropdown</button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Action</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Another action</a></li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Something else here</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="{{ URL::asset('#') }}">Separated link</a></li>
                                </ul>
                            </div>


                            <hr class="mt-5 mb-3">

                            <div id="navflabels" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Floating Labels</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="floatingInput"
                                    placeholder="name@example.com">
                                <label for="floatingInput">Email address</label>
                            </div>
                            <div class="form-floating mb-5">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <h6>Textarea</h6>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Comments</label>
                            </div>
                            <hr class="mt-5 mb-3">
                            <div id="navficons" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                                <h6 class="mb-0 me-2 me-lg-4">Input icon Labels</h6>
                                <span class="border-top d-block flex-grow-1"></span>
                            </div>
                            <div>
                                <div class="input-icon-group input-icon-group-sm mb-3">
                                    <span class="input-icon">
                                        <i class="bx bx-envelope"></i>
                                    </span>
                                    <input type="email" class="form-control form-control-sm" placeholder="email id">
                                </div>
                                <div class="input-icon-group mb-3">
                                    <span class="input-icon">
                                        <i class="bx bx-envelope fs-5"></i>
                                    </span>
                                    <input type="email" class="form-control" placeholder="email id">
                                </div>
                                <div class="input-icon-group input-icon-group-lg mb-3">
                                    <span class="input-icon">
                                        <i class="bx bx-envelope fs-4"></i>
                                    </span>
                                    <input type="email" class="form-control form-control-lg" placeholder="email id">
                                </div>
                                <div class="input-icon-group input-icon-group-lg mb-3">
                                    <span class="input-icon">
                                        <i class="bx bx-chat fs-5"></i>
                                    </span>
                                    <textarea rows="2" class="form-control form-control-lg"
                                        placeholder="comment..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Call to action-->
            <section class="bg-gradient bg-secondary text-white position-relative border-top">
                <div class="container py-9 py-lg-11">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-10 col-xl-9 text-center mx-auto">
                            <h2 class="mb-4 display-4" data-aos="fade-up">
                                Accelerate your business online
                            </h2>
                            <p class="lead mb-5 opacity-75" data-aos="fade-up">Build any type of landing page ease.</p>
                            <div data-aos="fade-up">
                                <a href="{{ URL::asset('#!') }}" class="btn btn-primary btn-lg">Purchase a license</a>
                            </div>
                        </div>
                        <!--End Col-->
                    </div> <!-- / .row -->
                </div> <!-- / .container -->
            </section>
</x-assan-layout>
