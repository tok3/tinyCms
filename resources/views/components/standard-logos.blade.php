<style>
    /* Container Styling */
    .standard-logos-container {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        gap: 0px;

    }

    /* Logos */
    .logo-item {
        display: inline-block;
        text-decoration: none;
        transition: transform 0.2s ease-in-out;
    }

    .logo-item:hover {
        transform: scale(1.05);
    }

    .logo-img {
        display: block;
        height: 32px;
        width: auto;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Badges */
    .badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 4px 8px;
        font-size: 14px;
        font-family: 'OCR A', monospace;
        background-color: #d8e5f0;
        color: #000;
        border-top: 1px solid #dadada;
        border-left: 1px solid #dadada;
        border-bottom: 1px solid #6a6c6e;
        border-right: 1px solid #6a6c6e;
        border-radius: 0;
        text-align: center;
        min-width: 88px; /* Optional: sorgt für gleichmäßige Breite */
        box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.5);
    }
</style>
<div class="standard-logos-container">
    <!-- Logos -->
    <div class="logos flex flex-wrap gap-2">
        @foreach ($processedStandards['logos'] as $logo)
            <a href="{{ $logo['link'] }}" title="{{ $logo['alt'] }}" class="logo-item">
                <img src="{{ $logo['img'] }}" alt="{{ $logo['alt'] }}" class="logo-img">
            </a>
        @endforeach
    </div>

    <!-- Unmatched Standards -->
    <div class="unmatched flex flex-wrap gap-2 mt-4">
        @foreach ($processedStandards['unmatched'] as $standard)
            <span class="badge">{{ $standard }}</span>
        @endforeach
    </div>
</div>
