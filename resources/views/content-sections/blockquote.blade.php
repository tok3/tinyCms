<div class="row">
    <div class="col-xl-6 mx-auto">
        <blockquote class="blockquote rounded-4 rounded-0 px-4 px-lg-6 py-6 py-lg-8 bg-body-tertiary shadow-lg border-success border-start border-3 my-7 my-lg-9">
            <h2 class="mb-4 display-6 fw-semibold">
                "{{$data['quote']}}"
            </h2>
            <div class="d-flex pt-4 justify-content-between align-items-center">
                <footer class="{{ $data['author'] ? 'blockquote-footer' : '' }} fs-5 fw-semibold">
                    {{$data['author']}}
                </footer>
                <div class="text-end">

                    @if($data['buttonText'])
                        <a href="{!! $data['buttonTarget'] !!}" class="btn hover-lift hover-shadow si-hover-twitter border text-body">
                            {!! $data['buttonText'] !!}
                        </a>
                    @endif
                </div>
            </div>
        </blockquote>
    </div>
</div>
