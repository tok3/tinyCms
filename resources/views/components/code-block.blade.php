<div {{ $attributes->merge(['class' => 'relative code-block-wrapper']) }} style="padding: 1em; background-color: #292D3E; border-radius: 0.5rem; color: white;">
    <div style="position: absolute; top: 1.5em; right: 0.8em; display: flex; align-items: center;">

        <x-filament::icon-button
            icon="heroicon-m-clipboard-document-list"
            tag="a"
            style="cursor:pointer; display:inline !important;"
            color="info"
            label="Copy code to clipboard"
            tooltip="Code kopieren"
            onclick="copyToClipboard('embedCode-{{ $promoType }}')"
        />
    </div>

    <pre id="embedCode-{{ $promoType }}" style="line-height: 1.4; padding: 1em;padding-bottom:0px;margin:0; color: white; text-align: left;"><br><code class="language-html" id="code-block-text-{{ $promoType }}"><span style="color: #569CD6">&lt;a</span> <span style="color: #4EC9B0">href=</span><span style="color: #CE9178">&quot;{{ $hrefTarget }}&quot;</span><span style="color: #569CD6">&gt;</span><br>    <span style="color: #569CD6">&lt;img</span> <span style="color: #4EC9B0">src=</span><span style="color: #CE9178">&quot;{{ $imgSrc }}&quot;</span><br><span style="color: #4EC9B0">alt=</span><span style="color: #CE9178">&quot;newsletter abonnieren&quot;</span><span style="color: #569CD6">&gt;</span><br><span style="color: #569CD6">&lt;/a&gt;</span>
        </code></pre>
</div>

<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const copyButton = document.getElementById('code-block-copy-button-{{ $promoType }}');
        const textElement = document.getElementById('code-block-text-{{ $promoType }}');

        if (copyButton && textElement) {
            copyButton.addEventListener('click', function() {
                const tempElement = document.createElement('textarea');
                let textToCopy = textElement.innerText;

                // Remove all semicolons
                textToCopy = textToCopy.replace(/;/g, '');

                // Set the value to the cleaned text
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
            });
        } else {
            false
        }
    });

</script>
