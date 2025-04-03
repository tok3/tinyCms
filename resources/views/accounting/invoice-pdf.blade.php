<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/pdf_expose.css"/>


    <style>
        BODY {
            font-family: sans-serif;
            font-style: normal !important;
            font-size: 14px;
        }

        #spacer-top {
            height: 70px;
        }

        TABLE.head td:first-child {

            width: 30%;

        }

        h4 {

            font-style: bold !important;
        }
        #bezahlcode {
            width: 120px;
            position: relative;
            /*top: -10px;
            left: -10px;*/

        }
        .table-striped TD {
            line-height: 25px;
            padding: 0 2 3 3;
        }

        .table-striped > tbody > tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }

        #leistungen td:nth-child(2) {
            text-align: center;
        }

        #leistungen th:nth-child(1) {
            text-align: left !important;
        }

        #leistungen th:nth-child(3), #leistungen td:nth-child(3) {
            text-align: right;
        }

        .text-right {
            text-align: right;
        }

        .small {
            font-size: small;
        }

        .x-small {
            font-size: x-small;
        }

        .xx-small {
            font-size: xx-small;
        }

        TABLE.head,
        TABLE.leistungen {
            width: 100%;

        }

        .leistungen td:last-child {

            width: 85px;
            padding-right: 5;

        }

        #leistungen th:nth-child(2),
        #leistungen td:nth-child(2) {
            text-align: center;
            width: 50px;
        }

        #leistungen th:nth-child(3),
        #leistungen td:nth-child(3) {
            text-align: right;
        }

        #ges-listing td:nth-child(1),
        #ges-listing td:nth-child(2) {
            text-align: right;
        }

        #ges-listing td:nth-child(1) {
            /*background:white;*/
        }

        .addText {

            line-height: 1.2em !important;
            font-size: 10px !important;
            font-weight: 8000 !important;
            /*color: dimgrey;*/

        }

        .addText UL {
            margin-top: 2px;
            margin-bottom: 3px;
        }

    </style>

</head>

<body>


<div class="panel-body p-xl">
    <table class="head">
        <tr>
            <td style="width:350px !important;">
                <img src="assets/img/logo/logo.svg" style="width:17px;" alt="logo">


                <div id="spacer-top"></div>
                <address class="xx-small">camindu GmbH, Behringstr. 13, 63814 Mainaschaff</address>
                <address style="margin-top:5px;">
                    <strong>{{$invoice['company']['name']}}</strong>
                    @if($invoice['company']['name_2'] !== '')
                        <br>{{$invoice['company']['name_2'] }}<br>
                    @else
                        <br>
                    @endif
                    {{$invoice['company']['str'] }}<br>

                    <strong>{{$invoice['company']['plz'] }}</strong> {{$invoice['company']['ort'] }}
                </address>
                <br>

                <p class="x-small">
                    <span><strong>Datum:</strong> {{\Carbon\Carbon::parse($invoice['rg_date'])->formatLocalized('%d.%m.%Y')}}</span><br>

                    <span><strong>Kunden-Nr:</strong> {{$invoice['company']['kd_nr']}}</span><br>
                    <span><strong>Rechnung Nr:</strong> {{$invoice['invoice_number']}}</span><br>
                    <span><strong>Leistungszeitraum:</strong> {{$invoice['leistungszeitraum']}}</span><br>

                    <span><strong>Fälligkeit:</strong> {{\Carbon\Carbon::parse($invoice['due_date']) ->formatLocalized('%d.%m.%Y')}}</span>
                </p>
            </td>
            <td>
                <div style="position:relative; top:-30px !important;">
                    <address class="x-small text-right">
                        eine Marke der camindu GmbH
                        <br>
                        Behringstr. 13<br>
                        63814 Mainaschaff<br>

                        <p class="text-color xx-small">vertreten durch:<br>
                            Tobias Clemens Koch (Geschäftsführer)<br>USt-Id Nr. DE275889 289<br>St.-Nr. 204 123 00425</p>

                    </address>

                    <address class="xx-small text-right">
                        <strong>Kontakt:</strong><br>

                        <span title="Tel">Fon:</span> +49 6021-130 712-8<br>
                        <span title="Fax">Fax:</span> +49 6021-130 712-1<br>
                        <span title="mail">Mail:</span> info@aktion-barrierefrei.org<br>
                        <br>
                    </address>
                    <address class="xx-small text-right">
                        <strong>Bankverbindung:</strong><br>

                        Hypovereinsbank<br>

                        IBAN DE43 7952 0070 0032 9269 83<br>
                        Swift (BIC) HYVE DEMM 407<br>
                    </address>
                </div>
            </td>
        </tr>
    </table>
    <br>

    @if(isset($additionalData['hint']))

        <style>
            h4 {
                margin-top: 10px;
                margin-bottom: 10px;
            }

            h4 {
                font-size: 16px;
            }

            p {
                margin: 0 0 10px;
            }

            /*! CSS Used from: http://localhost:8002/css/styles/style.css */
            .callout {
                margin: 10px 0;
                padding: 10px;
                border-left: 3px solid #eee;
            }

            .callout h4 {
                margin-top: 0;
                margin-bottom: 5px;
            }

            .callout p:last-child {
                margin-bottom: 0;
            }

            .callout-danger {
                border-color: #e74c3c;
                background-color: #fefaf9;
            }

            .callout-danger h4 {
                color: #e74c3c;
            }

            .panel-body h4 {
                font-weight: 600;
            }
        </style>
        <div class="row m-t">
            <div class="col-md-6">
                <div class="callout callout-danger">
                    <h4>Hinweis</h4>

                    <p>{!!  nl2br($additionalData['hint'])!!}</p>
                </div>
            </div>
        </div>


    @endif

    <div class="table-responsive m-t">
        <table id="leistungen" class="table table-striped leistungen">
            <thead>
            <tr>
                <th>Leistungen</th>
                <th>Anzahl</th>
                <th>Preis/Einh.</th>
            </tr>
            </thead>
            <tbody>
            @php
                // JSON-String in ein Array umwandeln
               $data = json_decode($invoice['data'], true);
            @endphp

            @if(isset($data['items']))
                @foreach(json_decode($invoice['data'], true)['items'] as $item)
                    <tr>
                        <td>
                            {{ $item['description'] }}
                        </td>
                        <td>
                            {{ $item['quantity'] }}
                        </td>
                        <td>
                            {{ number_format((float) $item['line_total_amount'], 2, ',', '.') }}&nbsp;&euro;
                        </td>
                    </tr>
                @endforeach
            @endif

            </tbody>
        </table>

    </div>

    <div class="table-responsive m-t">
        <table id="ges-listing" class="table table-striped leistungen">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><strong>Nettobetrag :</strong></td>
                <td>{!! number_format((float) $invoice['total_net'], 2, ',', '.')  !!}&nbsp;&euro;</td>
            </tr>
            <tr>
                <td><strong>{!! number_format((float) $invoice['tax_rate'], 2, ',', '.')  !!} % USt :</strong></td>
                <td>{!! number_format((float) $invoice['tax'], 2, ',', '.')  !!}&nbsp;&euro;</td>
            </tr>
            <tr>
                <td><strong>Gesamt :</strong></td>
                <td>{!! number_format((float) $invoice['total_gross'], 2, ',', '.')  !!}&nbsp;&euro;</td>
            </tr>

            </tbody>
        </table>


@if($invoice['mollie_payment_id'] == "")
        <table style="margin-top:10em;">

            <tr>
                <td>

                    <div class="m-t">
                        Bitte überweisen Sie den Gesamtbetrag in Höhe von <strong>{!! number_format((float) $invoice['total_gross'], 2, ',', '.')  !!}&nbsp;&euro;</strong> untr Nennung des Verwendungszwecks
                        <strong style="white-space:nowrap;">{{$invoice['invoice_number']}}X{{$invoice['company']['kd_nr']}}</strong> bis zum {{\Carbon\Carbon::parse($invoice['due_date']) ->formatLocalized('%d.%m.%Y')}}
                        (Zahlungseingang)
                        auf das folgende Konto:
                        <br><br>
                        Hypovereinsbank<br>
                        IBAN DE43 7952 0070 0032 9269 83<br>
                        Swift (BIC) HYVE DEMM 407<br>
                    </div>

                </td>
                <td>
                    <img id="bezahlcode"
                         src="https://dev.matthiasschaffer.com/bezahlcode/api.php?iban={!! urlencode('DE43 7952 0070 0032 9269 83') !!}&bic={!! urlencode('HYVE DEMM 407') !!}&name={!! urlencode('camindu GmbH') !!}&usage={!! urlencode($invoice['invoice_number'].'X'.$invoice['company']['kd_nr']) !!}&amount={!! urlencode(number_format((float) $invoice['total_gross'], 2, ',', '.')) !!}"
                         alt="bezahlcode">

                </td>
            </tr>
        </table>
@endif

    </div>

</div>


</body>
</html>
