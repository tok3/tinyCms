
@php
    // Hole das ausgewählte Produkt aus der Session
    $selectedProductId = session('selected_product_id');
    $selectedProductId = 1;
    $selectedProduct = $products->firstWhere('id', $selectedProductId);
@endphp

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
                <td><strong id="product-name">{{ $selectedProduct->name }}</strong>
                    <p id="product-description">
                        {{ $selectedProduct->description }}
                    </p>
                </td>

            </tr>
            <tr>
                <td class="align-text-top">Preis:&nbsp</td>
                <td><strong class="total-price">{{$selectedProduct->formattedPrice}} €</strong> <small id="payment-modality">{!!  $paymentModality[$selectedProduct->interval]!!}</small></td>
            </tr>
            -->{{$selectedProduct->trial_period_days}}
            @if($selectedProduct->trial_period_days > 0)
                <tr id="trial-period-row">
                    <td class="align-text-top text-right text-danger" style="text-align: right !important;"><i class="bi bi-info-circle"></i>&nbsp;</td>
                    <td class=" text-danger small"><strong id="product-trial-period">{{$selectedProduct->trial_period_days}} Tage kostenlose Testphase</strong>, Sie zahlen heute <strong>0,00 €</strong>, nutzen sie das Produkt über die Testphase hinaus, stellen wir Ihnen den Betrag von <strong class="total-price">placeholder</strong> am <span id="trial-period-ends">%trial-period-ends%</span> in Rechnung.</td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>
</div>
<hr>
<div class="row">
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
    </div>
</div>
