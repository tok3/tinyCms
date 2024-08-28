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
                                                <li class="breadcrumb-item active" aria-current="page">Utility classess</li>
                                            </ol>
                                        </div>
                                    </nav>
                                    <h1 class="mb-0 display-4">
                                     Utility classes
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section class="position-relative">
                <div class="container py-9 py-lg-11">
                    <p class="w-lg-60">For faster mobile-friendly and responsive development, Bootstrap includes dozens of utility classes for showing, hiding, aligning, and spacing content.</p>
                    <a target="_blank" href="{{ URL::asset('https://getbootstrap.com/docs/5.3/utilities/api/') }}" class="btn btn-primary">Bootstrap utilities</a>
                <div class="table-responsive mt-7">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="small text-uppercase text-body-tertiary">
                                <th style="width: 120px;">Class Name</th>
                                <th style="width: 200px;">Description</th>
                                <th style="width: 300px;">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>bg-[options]</td>
                                <td>Theme background colors classes</td>
                                <td>
                                    <code>.bg-gradient-primary</code><br><code>.bg-gradient-tint</code><br>
                                    <code>.bg-gradient-blur</code><br>
                                    <code>.bg-gradient-light</code><br>
                                    <code>.bg-gradient-white</code><br>
                                    <code>.bg-gradient-dark</code><br>
                                </td>
                            </tr>
                            <tr>
                                <td>width-[options]</td>
                                <td>Width in pixels</td>
                                <td><code>.width-[1x-20x]</code></td>
                            </tr>
                            <tr>
                                <td>height-[options]</td>
                                <td>Height in pixels</td>
                                <td><code>.height-[1x-20x]</code></td>
                            </tr>
                            <tr>
                                <td>shadow-[options]</td>
                                <td>Additional Box shadow classes</td>
                                <td><code>.shadow-3d</code><br>
                                    <code>.shadow-xl</code></td>
                            </tr>
                            <tr>
                                <td>hover-shadow-[options]</td>
                                <td>On element hover shadow classes</td>
                                <td><code>.hover-shadow</code><br>
                                    <code>.hover-shadow-sm</code><br>
                                    <code>.hover-shadow-lg</code><br>
                                    <code>.hover-shadow-3d</code>
                                </td>
                            </tr>
                            <tr>
                                <td>hover-lift</td>
                                <td>On hover move-up element</td>
                                <td><code>.hover-lift</code><br>
                                    <code>.hover-lift-lg</code>
                                </td>
                            </tr>
                            <tr>
                                <td>rounded-[options]</td>
                                <td>Additional border-radius classes</td>
                                <td><code>.rounded-blob</code><br>
                                    <code>.rounded-block</code></td>
                            </tr>
                            <tr>
                                <td>border-dashed</td>
                                <td>Convert border style to dashed</td>
                                <td><code>.border-dashed</code>
                                </td>
                            </tr>
                            <tr>
                                <td>bg-</td>
                                <td>Background image positions</td>
                                <td><code>.bg-cover</code><br>
                                    <code>.bg-contain</code><br>
                                    <code>.bg-100</code><br>
                                    <code>.bg-no-repeat</code><br>
                                    <code>.bg-center</code><br>
                                    <code>.bg-cover</code><br>
                                </td>
                            </tr>
                            <tr>
                                <td>flip-</td>
                                <td>Flip an element</td>
                                <td><code>.flip-x</code><br>
                                    <code>.flip-y</code>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
            </section>
</x-assan-layout>
