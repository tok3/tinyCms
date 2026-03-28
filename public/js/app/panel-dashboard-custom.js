
document.addEventListener('click', function (e) {

    if (!window.App?.isTrial) return;

    const el = e.target.closest('.trial-blocked');

    if (!el) return;

    e.preventDefault();
    e.stopPropagation();

    showTrialUpgradeModal();
});

function showTrialUpgradeModal() {
    alert(
        "Diese Funktion ist in der Testversion nicht verfügbar.\n\n" +
        "Erweitern Sie Ihr Paket, um Statistiken und Exporte zu nutzen."
    );
}
