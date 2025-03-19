<div class="row">
    <div class="col-xl-6 mx-auto">
        <blockquote class="blockquote rounded-4 rounded-0 px-4 px-lg-6 py-6 py-lg-8 bg-body-tertiary shadow-lg border-success border-start border-3 my-7 my-lg-9">
            <h2 class="mb-4 display-6 fw-semibold">
                "{{$data['quote']}}"
            </h2>
            <div class="d-flex pt-4 justify-content-between align-items-center">
                @if($data['author'])
                    <figcaption class="blockquote-footer fs-5 fw-semibold">
                        {{$data['author']}}
                    </figcaption>
                @endif
                <div class="text-end">

                    @if($data['buttonText'])
                        <a href="{!! $data['buttonTarget'] !!}" class="btn btn-primary hover-lift hover-shadow si-hover-twitter border _text-body">
                            {!! $data['buttonText'] !!}
                        </a>
                    @endif
                </div>
            </div>
        </blockquote>
    </div>
</div>

<div class="row  ">
    <div class="col-xl-6 mx-auto">
        <figure class="border-start border-4 border-primary ps-4 blockquote rounded-4 rounded-0 px-3 px-lg-5 py-5 py-lg-3 bg-body-tertiary shadow-lg border-success border-start border-3 my-7 my-lg-9">
            <blockquote class="blockquote font-serif fs-1 lh-sm mb-4 mb-lg-5 ">
                <p>" {{$data['quote']}}"</p>
            </blockquote>
            @if($data['author'])
                <figcaption class="blockquote-footer fs-5 fw-semibold">
                    {{$data['author']}}
                </figcaption>
            @endif
            <div class="text-end mt--50">

                @if($data['buttonText'])
                    <a href="{!! $data['buttonTarget'] !!}" class="btn btn-primary hover-lift hover-shadow si-hover-twitter border _text-body">
                        {!! $data['buttonText'] !!}
                    </a>
                @endif
            </div>
        </figure>
    </div>
</div>
