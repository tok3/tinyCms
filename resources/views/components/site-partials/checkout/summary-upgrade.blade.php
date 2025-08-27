@php
    $modalityTexts = [
        'daily' => 'pro Tag</br>bei monatlicher Zahlung',
        'annual' => 'pro Jahr</br>bei jährlicher Zahlung',
        'monthly' => 'pro Monat</br>bei monatlicher Zahlung',
        'one_time' => 'Einmalzahlung',
    ];
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
<div class=" bg-light p-5 rounded mb-4">

    <h4>Bestellinformationen</h4>


    <div class="row">
        <div class="col-sm-6 mb-4">
            @if(count(\Auth::user()->companies->first()->contracts) == 0)
                <input type="hidden" name="firstContract" value="1">
                <input type="hidden" name="user[email]" value="{{\Auth::user()->email}}">
                <fieldset>

                    <div class="row" style="font-size: 16px;">
                        <!-- Vorname -->
                        <small>Benutzername</small>

                        <div class="col-md-6">

                            <div class="text-danger mb-1" x-text="errors.vorname"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-user"></i></span>
                                <input id="vorname" class="form-control" id="customer-name" name="user[vorname]" type="text" placeholder="Vorname" x-model="form.vorname">
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="text-danger mb-1" x-text="errors.name"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-user"></i></span>
                                <input id="name" class="form-control" name="user[name]" type="text" placeholder="Name" x-model="form.name">
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <small>Firmenangaben</small>
                            <div class="text-danger mb-1" x-text="errors.company"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map"></i></span>
                                <input id="compName" class="form-control" name="company[name]" type="text" placeholder="Firma" x-model="form.company">
                            </div>
                        </div>

                        <!-- Firmen-Email -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.company_email"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-envelope"></i></span>
                                <input id="compEmail" class="form-control" name="company[email]" type="email" placeholder="Firma Email / Rechnungsemail" x-model="form.company_email">
                            </div>
                        </div>

                        <!-- Straße -->
                        <div class="col-md-12">
                            <div class="text-danger mb-1" x-text="errors.street"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map"></i></span>
                                <input id="str" class="form-control" name="company[str]" type="text" placeholder="Straße / Haus-Nr." x-model="form.street">
                            </div>
                        </div>

                        <!-- PLZ & Ort -->
                        <div class="col-md-4">
                            <div class="text-danger mb-1" x-text="errors.plz"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-map-pin"></i></span>
                                <input id="plz" class="form-control" name="company[plz]" type="text" placeholder="PLZ / Postcode" x-model="form.plz">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="text-danger mb-1" x-text="errors.ort"></div>
                            <div class="input-icon-group mb-3">
                                <span class="input-icon"><i class="bx bx-buildings"></i></span>
                                <input id="ort" class="form-control" name="company[ort]" type="text" placeholder="Ort" x-model="form.ort">
                            </div>
                        </div>
                    </div>
                </fieldset>

            @else

                <div class="h6 d mb-2">Rechnungsempfänger:</div>
                <div id="customer-name"></div>
                <div id="company-name"></div>
                <div id="customer-address"></div>
                <div id="customer-plz-ort"></div>
                <br>
                <div id="customer-email"></div>

                <div id="company-email"></div>
            @endif

        </div>

        <div class="col-sm-6 mb-4">
            <div class="h6 mb-2">Zusammenfassung der Bestellung:</div>
            <table class="table table-borderless bg-light " id="listTotal">
                <tbody class="rounded" style="border:1px dashed lightgray;">
                <!-- Produktname & Beschreibung -->
                <tr>
                    <td class="text-nowrap">Beschreibung:</td>
                    <td>
                        <strong id="product-name">–</strong>
                        <p id="product-description">–</p>
                    </td>
                </tr>

                <!-- Preis & Rabatt -->
                <tr>
                    <td class="align-text-top">Preis:</td>
                    <td>
                        <strong id="product-price">–</strong>
                        <small>&nbsp;(inkl. MwSt.)</small>
                        <div>
                            <small id="payment-modality"></small>
                        </div>
                    </td>
                </tr>

                <!-- Testphase Hinweis -->
                <tr id="trial-info" class="hidden">
                    <td class="text-danger align-top"><i class="bi bi-info-circle"></i></td>
                    <td class="text-danger small">
                        <strong class="trial-days">–</strong> Tage kostenlose Testphase.<br>
                        Sie zahlen heute <strong>0,00 €</strong>.<br>
                        Nutzen Sie das Produkt über die Testphase hinaus,<br>
                        stellen wir Ihnen am <span class="trial-ends">–</span> <strong class="trial-price">–</strong> <span class="trial-modality">–</span> in Rechnung.
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

                <input type="radio" name="pay_by_invoice" value="0" id="payment_creditcard">

                <label for="payment_creditcard">&nbsp;<i class="bi bi-credit-card"></i>&nbsp;<i class="bi bi-paypal"></i>&nbsp;<i class="bi bi-wallet2"></i>&nbsp;<i
                        class="bi bi-credit-card-2-front"></i> Standard</label>
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


        </div>
    </div>
</div>
