<!DOCTYPE html>
<html lang="de">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anleitung</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 14px;
        }
.x-small{

    font-size: 1.4rem;
    font-family: Helvetica !important;
    font-style: normal !important;
    font-size:9pt;
}
.xx-small{
    font-size:8pt;
    color:grey !important;
    font-style: normal !important;

}
        h1 {
            text-align: left;
            font-size: 1.6em;
        }

        h2 {
            text-align: left;
            font-size: 1.4em;
        }

        p {
            margin: 10px 0;
        }

        .important {
            color: yellow;
            font-weight: regular;
            background-color: black;
            padding: 5px;
        }

        .code-block-wrapper {
            font-size: 0.9em;
            padding: 0.9em;
            background-color: #292D3E;
            border-radius: 0.5rem;
            color: white;
            font-family: "Courier New", Courier, monospace; /* Monospaced Schriftart */
            overflow-x: auto;

        }

        pre {
            margin: 0;
            color: white;
            line-height: 1.5;
            white-space: pre-wrap; /* Zeilenumbruch innerhalb von <pre> */
            tab-size: 4; /* Konsistente Tab-Größe */
        }

        .highlight {
            color: #569CD6; /* Blau für HTML-Tags */
        }

        .attribute {
            color: #4EC9B0; /* Grün für Attribute */
        }

        .value {
            color: #CE9178; /* Orange für Werte */
        }
    </style>
</head>
<body>
<table style="width:100%;" class="head">
    <tr>
        <td style="vertical-align:top;width:450px !important;">
            <img src="assets/img/logo/font-logo-camindu.png" style="width:190px;" alt="logo">


            <div id="spacer-top"></div>

           </td>
        <td style="text-align: right !important;">
            <div style="">
                <address class="x-small text-right">
                    camindu GmbH
                    <br>
                    Behringstr. 13<br>
                    <b>63814</b> Mainaschaff<br>
                </address>
<br>
                <address class="xx-small text-right">
                    <span title="Tel">Fon</span> +49 6021-130 712-8<br>
                    <span title="Fax">Fax</span> +49 6021-130 712-1<br>
                    <span title="mail">Web</span> www.camindu.de<br>
                    <span title="mail">USt-Id: </span> DE275889 289<br>
                    <span title="mail">Str-Nr: </span> 20412300425<br>
                    <br>
                </address>

            </div>
        </td>
    </tr>
</table>
<br><br>
<table>
    <tr>
        <td style="width:130px !important;">
            <img src="assets/img/logo/logo.svg" style="width:13px;" alt="logo">


            <div id="spacer-top"></div>

        </td>
        <td style="width:360px;">
           {{-- <img src="assets/img/logo/fixstern-logo.svg" style="width:43px;" alt="logo">--}}
        </td>
        <td style="width:260px !important;">
            {{--            <img src="assets/img/logo/font-logo-camindu.png" style="width:200px;" alt="logo">--}}


            <div id="spacer-top"></div>

        </td>
    </tr>
</table>

<br><br>
<h1>Anleitung zur Einbindung des Fixstern-Widget</h1>

<p class="important">BITTE BEACHTEN: Der Einbindungscode ist nur für <strong>{{ $companyName }}</strong> gültig!</p>

<h2>Standard Integration</h2>
<p>Um das Fixstern-Widget in Ihre Website zu integrieren, kopieren Sie bitte den untenstehenden Code an das Ende Ihrer Website, direkt vor den schließenden &lt;/body&gt;-Tag</p>.
<div class="code-block-wrapper">
    <pre>
        <span class="highlight">&lt;link</span>
        <span class="attribute">rel=</span><span class="value">"stylesheet"</span>
        <span class="attribute">href=</span><span class="value">"{{ url('service/fixstern.css') }}"</span>
        <span class="highlight">&gt;</span>
        <span class="highlight">&lt;script</span>
        <span class="attribute">src=</span><span class="value">"{{ url('service/' . $company->ulid . '/fixstern.js') }}"</span>
        <span class="highlight">&gt;&lt;/script&gt;</span>
    </pre>
</div>

<p>Nach dem Einfügen des Codes sollte das Widget auf der Webseite verfügbar sein. Oben rechts sehen Sie nun den Aktivierungsbutton mit dem Fixstern-Accessibility-Logo:   <img src="assets/img/logo/fixstern-2.svg" style="width:10px; position:relative; border:5px solid transparent;" alt="logo">
</p>.

<h2>Positionierung und Abstände</h2>
<p>
    Die Position des Buttons kann durch den GET-Parameter <b>pos</b> eingestellt werden. Mögliche Werte sind:<br>
    <b>tl</b> = oben links (top left)<br>
    <b>tr</b> = oben rechts (top right)<br>
    <b>br</b> = unten rechts (bottom right)<br>
    <b>bl</b> = unten links (bottom left)
</p>
<p>
    Über die GET-Parameter <b>valX</b> und <b>valY</b> lassen sich die Abstände in der X- und Y-Achse einstellen. Hier muss zwingend die gewünschte Einheit wie z.B. <b>px</b> oder <b>em</b> mitgegeben werden.
</p>
<p>
    Im folgenden Beispiel wird der Button oben links angezeigt, mit einem Abstand von 10px vom linken Rand und 100px vom oberen Rand.
</p>
<div class="code-block-wrapper">
    <pre>
        <span class="highlight">&lt;link</span>
        <span class="attribute">rel=</span><span class="value">"stylesheet"</span>
        <span class="attribute">href=</span><span class="value">"{{ url('service/fixstern.css') }}"</span>
        <span class="highlight">&gt;</span>
        <span class="highlight">&lt;script</span>
        <span class="attribute">src=</span><span class="value">"{{ url('service/' . $company->ulid . '/fixstern.js') }}?pos=tl&valX=10px&valY=100px"</span>
        <span class="highlight">&gt;&lt;/script&gt;</span>
    </pre>
</div>
<h2>Custom Trigger-Button verwenden</h2>
<p>
    Um die vollständige Freiheit über das Design zu haben, können Sie einen eigenen Trigger-Button verwenden, der z. B. vollständig auf Ihr Website-Design abgestimmt ist. Dazu binden Sie das Fixstern-Script ohne Button ein, indem Sie den Parameter <b>nobutton</b> auf „true“ setzen.
</p>
<div class="code-block-wrapper">
    <pre>
        <span class="highlight">&lt;link</span>
        <span class="attribute">rel=</span><span class="value">"stylesheet"</span>
        <span class="attribute">href=</span><span class="value">"{{ url('service/fixstern.css') }}"</span>
        <span class="highlight">&gt;</span>
        <span class="highlight">&lt;script</span>
        <span class="attribute">src=</span><span class="value">"{{ url('service/' . $company->ulid . '/fixstern.js') }}?nobutton=true"</span>
        <span class="highlight">&gt;&lt;/script&gt;</span>
    </pre>
</div>
<p>
    Nun können Sie auf Ihrer Webseite ein beliebiges Element setzen, um Fixstern zu öffnen. Das Element muss lediglich die <b>ID</b> “ini-bf-trigger-button” besitzen, wie in diesem Beispiel:
</p>

<div class="code-block-wrapper">
    <pre>
        <span class="highlight">&lt;button</span>
        <span class="attribute">type=</span><span class="value">"button"</span>
        <span class="attribute">id=</span><span class="value">"ini-bf-trigger-button"</span>
        <span class="attribute">class=</span><span class="value">"btn btn-primary"</span><span class="highlight">&gt;</span>
            <span class="highlight">&lt;i</span> <span class="attribute">class=</span><span class="value">"bi bi-universal-access"</span><span class="highlight">&gt;&lt;/i&gt;</span>
        <span class="highlight">&lt;/button&gt;</span>
    </pre>
</div>
</body>
</html>
