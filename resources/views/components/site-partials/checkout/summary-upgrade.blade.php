
<style>
    .error {
        color: red; /* Fehlerfarbe */
        margin-left: 10px;

    }

    .custom-control-label {

        margin-left: 10px; /* Platz zwischen der Checkbox und dem Label-Text */
    }
</style>
<h4>Bestellinformationen</h4>
<div class="row">
    <div class="col-sm-6 mb-4">
        <div class="h6 d mb-2">Rechnungsempfänger:</div>
        <div id="customer-name"></div>
        <div id="company-name"></div>
        <div id="customer-address"></div>
        <div id="customer-plz-ort"></div>
        <br>
        {{--<div id="customer-email"></div>
        --}}<div id="company-email"></div>


    </div>

    <div class="col-sm-6 mb-4">
        <div class="h6 mb-2">Zusammenfassung der Bestellung:</div>
        <table id="listTotal">
            <tbody>
            <tr>
                <td class="pr-3 align-text-top " style="white-space: nowrap!important;"><nowrap>Beschreibung:&nbsp</nowrap></td>
                <td><strong id="product-name">
                        <div class="xs spinner-border text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </strong>
                    <p id="product-description">

                    </p>
                </td>

            </tr>
            <tr>
                <td class="align-text-top">Preis:&nbsp</td>
                <td><strong class="total-price"><div class="xs spinner-border text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div> </strong> <small id="payment-modality">%%filledInByJs%%</small></td>
            </tr>

                <tr id="trial-period-row">
                    <td class="align-text-top text-right text-danger" style="text-align: right !important;"><i class="bi bi-info-circle"></i>&nbsp;</td>
                    <td class=" text-danger small"><strong id="product-trial-period">%%filledInByJs%%</strong>, Sie zahlen heute <strong>0,00 €</strong>, nutzen sie das Produkt über die Testphase hinaus, stellen wir Ihnen den Betrag von <strong class="total-price">placeholder</strong> am <span id="trial-period-ends">%trial-period-ends%</span> in Rechnung.

                    </td>

                </tr>

            </tbody>
        </table>


    </div>
</div>
<hr>
<div class="row">
    <fieldset class="mb-4" id="by-invoice">
        <legend>Abonnement Zahlungsweise</legend>
        <div id="pay_by_invoice_error"></div>
        <div class="form-group">
            <input type="radio" name="pay_by_invoice" value="0" id="payment_creditcard" >

            <label for="payment_creditcard">&nbsp;<i class="bi bi-credit-card"></i>&nbsp;<i class="bi bi-paypal"></i>&nbsp;<i class="bi bi-wallet2"></i>&nbsp;<i class="bi bi-credit-card-2-front"></i> Standard</label>
            &nbsp;&nbsp;&nbsp; <input type="radio" name="pay_by_invoice" value="1" id="payment_sepa">
            <label for="payment_sepa"><i class="bi bi-receipt"></i> Kauf auf Rechnung </label>
        </div>

        <div class="form-group" id="iban_container" style="display: none; margin-top: 15px;">
            <label for="iban">IBAN</label>
            <input type="text" class="form-control" name="iban" id="iban" placeholder="Ihre IBAN">
            <span class="text-danger" id="iban-error"></span>
        </div>
    </fieldset>
    <div id="priv" novalidate="novalidate">
        <div class="col-md-12">
            <div class="custom-control custom-checkbox mr-sm-2">
                <input class="custom-control-input" id="agb" name="agb" type="checkbox" value="1">
                <label class="custom-control-label" for="agb">Ich habe die <a href="/agb" target="_blank">AGB</a> gelesen und akzeptiere diese.</label>
            </div>
            <div class="custom-control custom-checkbox mr-sm-2">
                <input class="custom-control-input" id="privacy" name="privacy" type="checkbox" value="1">
                <label class="custom-control-label" for="privacy">Ja, ich stimme den <a href="/privacy" target="_blank">Datenschutzbestimmungen</a> zu.</label>
            </div>
        </div>
        {{--<div class="form-group _text-end" id="by-invoice">

            <input type="checkbox" name="pay_by_invoice"  value="1" >
            <label for="pay_by_invoice">&nbsp;&nbsp;Kauf auf Rechnung</label>

        </div>--}}
    </div>
</div>
