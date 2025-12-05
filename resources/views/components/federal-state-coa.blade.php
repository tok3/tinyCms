<style>

    .federal-state-coa {
        max-height: 60px;
        width: auto;

    }

    .federal-state-label {
        font-weight: 600;
        font-size: 1.2rem;
        line-height: 1.2;
    }
</style>

@if($coat)
    <div class="federal-state d-flex align-items-start gap-2">


        <img
            src="{{ $coat['img'] }}"
            alt="{{ $coat['alt'] }}"
            class="federal-state-coa"
        >
        <span class="federal-state-label">{{ $label }}</span>
    </div>


@else
    <span>{{ $label }}</span>
@endif
