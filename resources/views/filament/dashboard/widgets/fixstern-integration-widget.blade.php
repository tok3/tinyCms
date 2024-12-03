<x-filament::widget class="fi-account-widget">
    <x-filament::section>


        <div class="flex items-center gap-x-3">


            <div class="flex-1">
                <h2
                    class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white"
                >
                    <h2 class="text-lg font-bold">Integration des Widgets</h2>
                    <p>
                        Um das Widget für die Barrierefreie Website zu integrieren, kopieren Sie bitte den unten stehenden Code an das Ende Ihrer Website, direkt vor den schließenden <code>&lt;/body&gt;</code>-Tag.
                    </p>
                </h2>

            </div>


        </div>


        <div class="text-left bg-gray p-4 ">

            <!-- -->
            @php
                $promoType ="fixsternWidged";
                $hrefTarget ="fixstern";
            @endphp

            <div class="code-block-wrapper" style="padding: 1em; background-color: #292D3E; border-radius: 0.5rem; color: white;">
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
                <pre id="embedCode-aktion-bf" style="line-height: 1.4; padding: 1em; padding-bottom: 0px; margin: 0; color: white; text-align: left; border-radius: 5px;">
<code class="language-html" id="code-block-text-aktion-bf">
<span style="color: #569CD6">&lt;link</span> <span style="color: #4EC9B0">rel=</span><span style="color: #CE9178">"stylesheet"</span> <span style="color: #4EC9B0">href=</span><span
        style="color: #CE9178">"{!! url('/assets/css/aktion-bf.min.css') !!}"</span><span style="color: #569CD6">&gt;</span><br>
<span style="color: #569CD6">&lt;script</span> <span style="color: #4EC9B0">src=</span><span style="color: #CE9178">"{!! url($fixsternLink) !!}"</span><span
        style="color: #569CD6">&gt;&lt;/script&gt;</span>
</code>
</pre>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                const copyButton = document.getElementById('code-block-copy-button-{{ $promoType }}');
                const textElement = document.getElementById('code-block-text-{{ $promoType }}');

                if (copyButton && textElement) {
                    copyButton.addEventListener('click', function () {
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


    </x-filament::section>
</x-filament::widget>
