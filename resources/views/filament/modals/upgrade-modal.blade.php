<div id="upgrade-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:9999;">
    <div style="background:white; max-width:500px; margin:10% auto; padding:20px; border-radius:8px;">

        <h2>Upgrade erforderlich</h2>

        <p id="upgrade-text">
            Dieses Feature ist nicht verfügbar.
        </p>

        <a href="/dashboard/upgrade" style="display:inline-block; margin-top:10px;">
            Jetzt upgraden
        </a>

        <button onclick="closeUpgradeModal()" style="margin-top:20px;">
            Schließen
        </button>
    </div>
</div>

<script>
    function openUpgradeModal(feature) {
        document.getElementById('upgrade-modal').style.display = 'block';
        document.getElementById('upgrade-text').innerText =
            'Feature "' + feature + '" ist nicht in deinem Paket enthalten.';
    }

    function closeUpgradeModal() {
        document.getElementById('upgrade-modal').style.display = 'none';
    }
</script>
