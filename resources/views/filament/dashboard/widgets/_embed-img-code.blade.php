<?php

$imgSrc = url('promo-src/' . \App\Helpers\QrPromoHelper::getPromoId($company->id, $promoType));



?>

<x-code-block promoType="{{$promoType}}" imgSrc="{{ $imgSrc }}" hrefTarget="{{ url('/subscribe/' . $company->slug) }}" />
{{--


<small >
    <pre id="embedCode-{{ $promoType }}" style="margin: 0; line-height: 125%"><span
            style="color: #000080">&lt;a</span> <span style="color: #008080">href=</span><span style="color: #bb8844">&quot;{{ url('/subscribe/' . $company->slug) }}&quot;</span><span style="color: #000080">&gt;</span>
        <span style="color: #000080">&lt;img</span> <span style="color: #008080">src=</span><span style="color: #bb8844">&quot;{{ $imgSrc }}&quot;</span><br><span
            style="color: #008080">alt=</span><span style="color: #bb8844">&quot;newsletter abonnieren&quot;</span><span style="color: #000080">&gt;</span>
    <span style="color: #000080">&lt;/a&gt;</span>
    </pre>


</small>

<x-filament::icon-button
    icon="heroicon-m-clipboard-document-list"
    tag="a"
    style="cursor:pointer;display:inline !important"
    color="info"
    label="Copy code to clipboard"
tooltip="mei"
    onclick="copyToClipboard('embedCode-{{ $promoType }}')"
/>
--}}

<script>


    function copyToClipboard(preId) {
        // Get the text content of the pre element
        let textToCopy = document.getElementById(preId).innerText;

        // Remove all semicolons
        textToCopy = textToCopy.replace(/;/g, '');

        // Create a temporary element to hold the cleaned text
        const tempElement = document.createElement('textarea');
        tempElement.value = textToCopy;
        document.body.appendChild(tempElement);

        // Select the text
        tempElement.select();
        tempElement.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text to the clipboard
        document.execCommand('copy');

        // Remove the temporary element
        document.body.removeChild(tempElement);

        // Use Filament notification
        new FilamentNotification()
            .title('Code in Zwischenablage Kopiert')
            .icon('heroicon-o-document-text')
            .iconColor('success')
            .send();
    }




</script>



