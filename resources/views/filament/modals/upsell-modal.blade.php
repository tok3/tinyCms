<style>
    .upsell-overlay {
        display: none;
        position: fixed;
        inset: 0;
        z-index: 99999;
        background: radial-gradient(
            circle at center,
            rgba(15, 23, 42, 0.6) 0%,
            rgba(2, 6, 23, 0.95) 100%
        );
        align-items: center;
        justify-content: center;
        padding: 40px;
    }

    .upsell-modal {
        width: 100%;
        max-width: 1100px;
        border-radius: 16px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 40px 100px rgba(0, 0, 0, 0.6);
        color: white;
        position: relative;
    }

    .upsell-close {
        position: absolute;
        top: 14px;
        right: 16px;
        background: rgba(255, 255, 255, 0.1);
        border: none;
        color: white;
        font-size: 20px;
        width: 36px;
        height: 36px;
        border-radius: 8px;
        cursor: pointer;
    }
</style>

<div id="upsell-modal" class="upsell-overlay">

    <div class="upsell-modal">

        <button onclick="closeUpsellModal()" class="upsell-close">×</button>

        <div id="upsell-content">
            <!-- kompletter Inhalt kommt aus dem Promo -->
        </div>

    </div>

</div>
