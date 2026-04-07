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
