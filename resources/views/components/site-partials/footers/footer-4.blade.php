<!--begin:Footer-->
<footer id="footer" class="bg-body footer">
    <div class="container pt-9 pt-lg-11 pb-5">
        <div class="row">
            <div class="col-sm-7 mb-4 mb-sm-0">
                <h5 class="mb-0 text-body-secondary">1355 Market St, <br> Suite 900,
                    San Francisco<br>
                    CA, 94103</h5>
                <x-partials.color-mode />
            </div>
            <div class="col-sm-5 text-sm-end">
                <a href="{{ URL::asset('#!') }}" class="fs-6 link-hover-underline">+011(1234) 56789</a><br><br>
                <a href="{{ URL::asset('mailto:mail@domain.agency') }}" class="fs-6 link-hover-underline">mail@domain.agency</a>
            </div>
        </div>
        <hr class="my-4">
        <div class="row text-secondary">
            <div class="col-sm-7 mb-3 mb-sm-0">
                <nav class="nav mb-0 gap-3">
                    <a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Facebook</a>
                    <a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Twitter</a>
                    <a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Linkedin</a>
                    <a class="link-hover-underline nav-link px-0 pt-0" href="{{ URL::asset('#') }}">Behance</a>
                </nav>
            </div>
            <div class="col-sm-5 text-sm-end">
                <span class="d-block lh-sm small text-body-tertiary">&copy; Copyright
                    <script>
                        document.write(new Date().getFullYear())

                    </script>. camindu
                </span>
            </div>
        </div>
    </div>
</footer>
<!--end:Footer-->
