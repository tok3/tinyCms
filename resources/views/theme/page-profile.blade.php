<x-assan-layout layout-type="{{$layoutType}}">
            <section class="position-relative bg-primary-subtle">
                <div class="container position-relative py-9">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <nav class="d-md-flex justify-content-center" aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{ URL::asset('#!') }}">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">
                                        Profile
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--/.row-->

                </div>
            </section>
            <section class="position-relative">
                <div class="container position-relative">
                    <div class="">

                        <!--Profile info header-->
                        <div class="position-relative pt-9 pb-9 pb-lg-11">
                            <div class="row">
                                <div class="col-lg-3 mb-5 mb-lg-0">
                                    <div class="mt-lg-n14 position-relative z-1">
                                        <div class="card shadow p-3">
                                            <div>
                                                <!--profile image-->
                                                <div class="width-15x height-15x mb-5 rounded-circle shadow bg-no-repat overflow-hidden bg-contain"
                                                    style="background-image: url(assets/img/avatar/4.jpg);">
                                                </div>
                                                <h4 class="mb-2">Emily Doe</h4>
                                                <small class="d-block mb-3">Senior Software developer</small>
                                                <ul class="list-group list-group-flush mb-0">
                                                    <li class="d-flex align-items-center list-group-item px-0">
                                                        <i class="bx bx-map me-2 align-middle text-body-secondary"></i>
                                                        <span class="small">Barcelona, Spain</span>
                                                    </li>
                                                    <li class="d-flex align-items-stretch list-group-item px-0">
                                                        <i class="bx bx-globe me-2 align-middle text-body-secondary"></i>
                                                        <a href="{{ URL::asset('#!') }}"
                                                            class="small link-hover-decoration">https://emilydoe.com/</a>
                                                    </li>
                                                    <li class="d-flex align-items-center list-group-item px-0">
                                                        <i
                                                            class="bx bx-check fs-5 lh-1 text-success me-2 align-middle"></i>
                                                        <span class="small">Available for hire</span>
                                                    </li>
                                                    <li class="d-flex align-items-center list-group-item px-0">
                                                        <i class="bx bxl-twitter me-2 align-middle text-body-secondary"></i>
                                                        <a href="{{ URL::asset('#!') }}" class="small link-hover-decoration">@emily.dev</a>
                                                    </li>
                                                    <li class="d-flex align-items-center list-group-item px-0">
                                                        <i class="bx bxl-linkedin me-2 align-middle text-body-secondary"></i>
                                                        <a href="{{ URL::asset('#!') }}" class="small link-hover-decoration">emilyatin</a>
                                                    </li>
                                                    <li class="d-flex align-items-center list-group-item px-0">
                                                        <i class="bx bxl-instagram me-2 align-middle text-body-secondary"></i>
                                                        <a href="{{ URL::asset('#!') }}" class="small link-hover-decoration">emily93</a>
                                                    </li>
                                                </ul>
                                                <ul class="list-group border-top list-group-flush mb-3">
                                                    <li class="d-flex list-group-item px-0 justify-content-between align-items-center">
                                                        <span class="small">Followers</span>
                                                        <span class="fs-5">134</span>
                                                    </li>
                                                    <li class="d-flex list-group-item px-0 justify-content-between align-items-center">
                                                        <span class="small">Following</span>
                                                        <span class="fs-5">23</span>
                                                    </li>
                                                    <li class="list-group-item px-0">
                                                        <div class="d-grid pt-3">
                                                            <button class="btn btn-light border shadow-sm mb-2 py-1"
                                                                type="button"><i
                                                                    class="bx bx-person-plus me-2 lh-1"></i>
                                                                Follow</button>
                                                            <button class="btn btn-primary shadow-sm py-1" type="button"><i
                                                                    class="bx bx-envelope me-2 lh-1"></i>
                                                                Message</button>
                                                        </div>
                                                    </li>
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="d-flex flex-column">
                                        <nav class="nav mb-5 nav-pills">
                                            <a href="{{ URL::asset('page-profile.html') }}" class="nav-link active"> <i
                                                    class="bx bx-user-circle me-2"></i>My profile</a>
                                          
                                            <a href="{{ URL::asset('page-profile-settings.html') }}" class="nav-link"><i
                                                    class="bx bx-cog me-2"></i>Settings</a>
                                            <a href="{{ URL::asset('#') }}" class="nav-link disabled"><i
                                                    class="bx bx-layer me-2"></i>Orders</a>
                                            <a href="{{ URL::asset('#') }}" class="nav-link disabled"><i
                                                    class="bx bx-credit-card me-2"></i>Billing</a>
                                            <a href="{{ URL::asset('#') }}" class="nav-link disabled"><i
                                                    class="bx bx-group me-2"></i>Followers</a>
                                        </nav>

                                        <div class="h-100">
                                            <h5 class="mb-4">Profile Details</h5>

                                            <div class="row align-items-center">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Name</label>
                                                    <div class="form-control">Emily Doe
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Email address</label>
                                                    <div class="form-control">info@emilydoe.com
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Phone</label>
                                                    <div class="form-control">+34 1234 567 890
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Company</label>
                                                    <div class="form-control">Assan inc.
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Country</label>
                                                    <div class="form-control">Spain
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Gender</label>
                                                    <div class="form-control">Male
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Date of birth</label>
                                                    <div class="form-control">19 August 1993</div>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Plan</label>
                                                    <div class="form-control"><span
                                                            class="badge px-2 bg-primary rounded-pill">Starter</span>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Communication</label>
                                                    <div>
                                                        <span
                                                            class="badge px-2 bg-primary-subtle text-primary rounded-pill">Phone</span>
                                                        <span
                                                            class="badge px-2 bg-primary-subtle text-primary rounded-pill">Email</span>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Address</label>
                                                    <div class="form-control">
                                                        1355 Market St, Suite 900
                                                        San Francisco
                                                        CA 94103
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
</x-assan-layout>
