<x-filament::widget class="fi-account-widget">
    <x-filament::section>


        <div class="flex items-center gap-x-3">


        </div>

        <div class="text-left bg-gray p-4 ">

            <!-- -->
            @php
                $promoType ="fixsternWidged";
                $hrefTarget ="fixstern";
            @endphp

            <div class="p-4 mb-4 text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300" role="alert">
                <h2
                    class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white">
                    <h2 class="text-lg font-bold">Integration der automatischen Generierung von Image‐Alt‐Tags</h2>
                    <p>
                        Um die automatische Generierung der Image‐Alt‐Tags schnell in Ihre Website zu integrieren, kopieren Sie bitte den unten stehenden Code an das Ende Ihrer Website, direkt vor den <b>schließenden <code>&lt;/body&gt;</code>-Tag</b>.
                    </p>
                </h2>
            </div>
{{--
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                <span class="font-bold">Hinweis !</span> Eine detaillierte, individualisierte Anleitung zur Integration, Positionierung des Trigger-Buttons oder Nutzung eines eigenen Buttons finden Sie im PDF <x-filament::link
                    color="gray"
                    style="position:relative; top:5px;"
                    href="{{url('documents/fixstern-integration/'.$ulid)}}"
                    icon="heroicon-m-book-open"
                    icon-alias="panels::widgets.filament-info.open-documentation-button"
                    rel="noopener noreferrer"
                    target="_blank"
                >
                    <x-slot name="icon">
                        <x-pdf-icon class="w-6 h-6 mr-2"/>
                    </x-slot>
                    Web Site Integration
                </x-filament::link>, das Sie hier herunterladen können. Wenn die Einbindung von Ihrem Webmaster oder einer Agentur vorgenommen wird, lassen Sie ihnen dieses PDF bitte zukommen.


            </div>--}}

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
