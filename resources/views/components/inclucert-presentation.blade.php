@props([
    'mode' => 'teaser',
    'heading' => 'IncluCert',
    'body' => '',
    'badgeUlid' => null,
    'badgeAppearance' => 'compact',
    'badgeTheme' => 'auto',
    'badgeThemeCycle' => false,
    'buttonText' => null,
    'buttonUrl' => null,
])

@php
    $resolvedMode = in_array($mode, ['feature', 'teaser'], true) ? $mode : 'teaser';
    $resolvedAppearance = in_array($badgeAppearance, ['full', 'compact', 'minimal', 'micro'], true)
        ? $badgeAppearance
        : 'compact';
    $resolvedTheme = in_array($badgeTheme, ['default', 'dark', 'stealth', 'light', 'mono', 'auto'], true)
        ? $badgeTheme
        : 'auto';
    $hasBadge = is_string($badgeUlid) && \Illuminate\Support\Str::isUlid($badgeUlid);
    $resolvedHeading = trim((string) $heading) !== '' ? trim((string) $heading) : 'IncluCert';
    $resolvedButtonText = trim((string) $buttonText);
    $resolvedButtonUrl = trim((string) $buttonUrl);
    $isInternalButtonUrl = str_starts_with($resolvedButtonUrl, '/') && ! str_starts_with($resolvedButtonUrl, '//');
    $isHttpsButtonUrl = filter_var($resolvedButtonUrl, FILTER_VALIDATE_URL)
        && parse_url($resolvedButtonUrl, PHP_URL_SCHEME) === 'https';
    $hasButton = $resolvedButtonText !== '' && ($isInternalButtonUrl || $isHttpsButtonUrl);
@endphp

<section @class([
    'inclucert-presentation',
    'inclucert-presentation--'.$resolvedMode,
    'overflow-hidden',
    'bg-gradient-dark-night text-white no-hyphen' => $resolvedMode === 'feature',
])>
    <div class="container py-9 py-lg-11">
        <div class="row align-items-center g-6 g-lg-9">
            <div class="{{ $hasBadge ? 'col-lg-7' : 'col-lg-9' }}">
                @if ($resolvedMode === 'feature')
                    <h1 class="display-4 mb-4 text-white">{{ $resolvedHeading }}</h1>
                @else
                    <h2 class="display-6 mb-4">{{ $resolvedHeading }}</h2>
                @endif

                @if (trim((string) $body) !== '')
                    <div @class([
                        'inclucert-presentation__body lead',
                        'text-white-75' => $resolvedMode === 'feature',
                        'text-body-secondary' => $resolvedMode !== 'feature',
                    ])>
                        {!! $body !!}
                    </div>
                @endif

                @if ($hasButton)
                    <a href="{{ $resolvedButtonUrl }}" class="btn btn-primary mt-4">
                        {{ $resolvedButtonText }}
                    </a>
                @endif
            </div>

            @if ($hasBadge)
                <div class="col-lg-5">
                    <div class="inclucert-presentation__badge" aria-label="IncluCert-Nachweis ansehen">
                        <inclucert-badge
                            data-ulid="{{ $badgeUlid }}"
                            data-appearance="{{ $resolvedAppearance }}"
                            data-theme="{{ $resolvedTheme }}"
                            @if ($badgeThemeCycle) data-theme-cycle="stealth,light,mono" @endif
                            data-pulse="true"
                            aria-label="IncluCert-Nachweis ansehen"
                        ></inclucert-badge>
                    </div>
                </div>

                @once
                    <script src="{{ asset('js/inclucert-badge.js') }}" defer></script>
                @endonce
            @endif
        </div>
    </div>
</section>
