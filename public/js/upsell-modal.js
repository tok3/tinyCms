window.openUpsellModal = function (feature) {

    const modal = document.getElementById('upsell-modal');
    const content = document.getElementById('upsell-content');

    if (!modal || !content) return;

    const template = document.querySelector('#upsell-templates [data-feature="' + feature + '"]');

    if (template) {
        content.innerHTML = template.innerHTML;
    } else {
        content.innerHTML = 'Kein Inhalt für dieses Feature';
    }

    modal.style.display = 'flex';
};

window.closeUpsellModal = function () {
    const modal = document.getElementById('upsell-modal');
    if (modal) modal.style.display = 'none';
};


document.addEventListener('click', function (e) {

    const link = e.target.closest('a[href*="#feature="]');
    if (!link) return;

    const match = link.getAttribute('href').match(/feature=([^&]+)/);
    if (!match) return;

    e.preventDefault();

    const feature = decodeURIComponent(match[1]);

    openUpsellModal(feature);
});

document.addEventListener('click', function (e) {

    const modal = document.getElementById('upsell-modal');
    if (!modal) return;

    // Modal überhaupt sichtbar?
    if (modal.style.display !== 'flex') return;

    const inner = modal.querySelector('.upsell-modal');
    if (!inner) return;

    // WICHTIG: Wenn Klick aus Feature-Link kommt → IGNORIEREN
    if (e.target.closest('a[href*="#feature="]')) return;

    //Jetzt erst prüfen ob außerhalb
    if (!inner.contains(e.target)) {
        closeUpsellModal();
    }

});

/*dev : ?upsell=image-alt-tags öffenet modal zum stylen */

/*
document.addEventListener('DOMContentLoaded', function () {

    const params = new URLSearchParams(window.location.search);
    const feature = params.get('upsell');

    if (feature) {
        localStorage.setItem('upsell-dev', feature);
        openUpsellModal(feature);
        return;
    }

    const saved = localStorage.getItem('upsell-dev');

    if (saved) {
        openUpsellModal(saved);
    }

});

 */
