<style>
    .error {
        color: red;
        margin-left: 10px;
    }

    .custom-control-label {
        margin-left: 10px;
    }
</style>

<div x-show="step === 2">
    <h4 class="mb-4">Bestellinformationen</h4>
    <div class="row">
        <!-- Kundendaten -->
        <div class="col-sm-6 mb-4">
            <div class="h6 mb-2">Rechnungsempfänger:</div>
            <div x-text="form.vorname + ' ' + form.name"></div>
            <div x-text="form.company"></div>
            <div x-text="form.street"></div>
            <div x-text="form.plz + ' ' + form.ort"></div>
            <div x-text="form.company_email"></div>
        </div>
        <!-- Produktinfos -->
        <div class="col-sm-6 mb-4">
            <div class="h6 mb-2">Zusammenfassung der Bestellung:</div>
            <table class="table table-borderless" id="listTotal">
                <tbody>
                <tr>
                    <td class="text-nowrap">Beschreibung:</td>
                    <td>
                        <strong x-text="product.name || 'Lädt …'"></strong>
                        <p x-html="product.description || 'Lädt …'"></p>
                    </td>
                </tr>
                <tr>
                    <td class="align-text-top">Preis:</td>
                    <td>
                        <strong x-show="!product.discounted" x-text="product.price">Lädt ...</strong><small>&nbsp;(inkl. MwSt.)</small>
                        <template x-if="product.discounted">
                            <div>
                                <strong class="text-success" x-text="product.price"></strong><br>
                                <small class="text-muted"><s x-text="product.formattedPrice + ' €'"></s></small>
                            </div>
                        </template>
                        <div>
                            <small x-html="product.modality"></small>
                        </div>
                    </td>
                </tr>

                <!-- Testphase Hinweis -->
                <tr x-show="product.trial_days > 0">
                    <td class="text-danger align-top"><i class="bi bi-info-circle"></i></td>
                    <td class="text-danger small">
                        <strong x-text="product.trial_days + ' Tage kostenlose Testphase'"></strong>,
                        Sie zahlen heute <strong>0,00 €</strong>. Nutzen Sie das Produkt über die Testphase hinaus,
                        stellen wir Ihnen <strong x-text="product.price"></strong> am
                        <span x-text="product.trial_ends"></span> in Rechnung.
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <!-- AGB / Datenschutz -->
    <div class="row">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                <input
                    class="custom-control-input"
                    id="agb"
                    name="agb"
                    type="checkbox"
                    value="1"
                    x-model="form.agb"
                >
                <label class="custom-control-label" for="agb">
                    Ich habe die <a href="/agb" target="_blank">AGB</a> gelesen und akzeptiere diese.
                </label>
                <div class="text-danger" x-text="errors.agb"></div>
            </div>

            <div class="custom-control custom-checkbox mr-sm-2">
                <input
                    class="custom-control-input"
                    id="privacy"
                    name="privacy"
                    type="checkbox"
                    value="1"
                    x-model="form.privacy"
                >
                <label class="custom-control-label" for="privacy">
                    Ja, ich stimme den <a href="/privacy" target="_blank">Datenschutzbestimmungen</a> zu.
                </label>
                <div class="text-danger" x-text="errors.privacy"></div>
            </div>
        </div>
    </div>
</div>
