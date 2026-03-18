<div id="ctaSection" class="container py-4 py-lg-6 cta-hidden">
    <div class="bg-body overflow-hidden shadow-lg px-4 py-6 px-lg-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-9 col-md-8">
                <!--Sub-heading-->
                <h6 class="mb-3 text-success">{!! $data['ctaHeadingSmall'] !!}</h6>
                <!--Heading-->
                <h2 class="mb-3 display-5">
                    {!! $data['ctaHeading'] !!}
                </h2>
                <!--Text-->
                <p class="mb-5 mb-md-0 pe-lg-11">
                    {!! $data['ctaText'] !!}
                </p>
            </div>
            <!--End Col-->
            <div class="col-lg-3 col-md-4 text-md-end">
                <!--Action-->
                <div>
                    <a href="{!! $data['ctaButtonTarget'] !!}" class="btn {!! $data['ctaButtonAppearance'] !!} btn-lg">{!! $data['ctaButtonText'] !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
