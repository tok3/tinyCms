//$(document).ready(function(){

    

    
    
    const hostElement = document.createElement('div');
    
    //hostElement.id = 'shadow-host';

    document.body.appendChild(hostElement);

    // Attach a shadow root to the new element
    //const shadowRoot = hostElement.attachShadow({ mode: 'open' });

    // Add content and styles to the shadow root
    hostElement.innerHTML = `
    <div id="ini-bf-panel-box" class="ini-bf-modal-animation-fade ini-bf-modal-fixed " aria-hidden="true" data-nosnippet style="display: none"> <div id="ini-bf-panel" role="dialog" aria-modal="true" data-start="right" aria-labelledby="ini-bf-panel-box"> <section id="ini-bf-panel-header"> <h3>Barrierefreiheit</h3> <button id="ini-bf-panel-close" aria-label="Barrierfreiheit schließen"></button> </section> <section id="ini-bf-panel-main"> <div class="ini-bf-subheader"></div> <div id="ini-bf-readable-experience-box"> <div id="ini-bf-action-content-scaling" class="ini-bf-action-box ini-bf-adjustable"> <div class="ini-bf-action-box-content"> <span class="ini-bf-title">Inhaltsgröße </span> </div> <div class="ini-bf-adjustable-input" data-step="5"> <div class="ini-bf-control"> <button class="ini-bf-plus" tabindex="0" aria-label="Increase Content Size"></button> <div class="ini-bf-value" data-value="0">Standard</div> <button class="ini-bf-minus" tabindex="0" aria-label="Decrease Content Size"></button> </div> </div> </div> <div id="ini-bf-action-magnifier" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Lupe</span> </div> </div> <div id="ini-bf-action-dark-contrast" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Dunkler Kontrast</span> </div> </div> <div id="ini-bf-action-light-contrast" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Heller Kontrast</span> </div> </div> <div id="ini-bf-action-readable-font" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Lesbare Schriftart</span> </div> </div> <div id="ini-bf-action-dyslexia-font" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Unterstützung für Legasthenie</span> </div> </div> <div id="ini-bf-action-font-sizing" class="ini-bf-action-box ini-bf-adjustable"> <div class="ini-bf-action-box-content"> <span class="ini-bf-title">Schriftgröße</span> </div> <div class="ini-bf-adjustable-input" data-step="5"> <div class="ini-bf-control"> <button class="ini-bf-plus" tabindex="0" aria-label="Vergrößern"></button> <div class="ini-bf-value" data-value="0">Standard</div> <button class="ini-bf-minus" tabindex="0" aria-label="Verringern"></button> </div> </div> </div> <div id="ini-bf-action-line-height" class="ini-bf-action-box ini-bf-adjustable"> <div class="ini-bf-action-box-content"> <span class="ini-bf-title">Zeilenhöhe</span> </div> <div class="ini-bf-adjustable-input" data-step="5"> <div class="ini-bf-control"> <button class="ini-bf-plus" tabindex="0" aria-label="Vergrößern"></button> <div class="ini-bf-value" data-value="0">Standard</div> <button class="ini-bf-minus" tabindex="0" aria-label="Verringern"></button> </div> </div> </div> <div id="ini-bf-action-letter-spacing" class="ini-bf-action-box ini-bf-adjustable"> <div class="ini-bf-action-box-content"> <span class="ini-bf-title">Buchstabenabstand</span> </div> <div class="ini-bf-adjustable-input" data-step="5"> <div class="ini-bf-control"> <button class="ini-bf-plus" tabindex="0" aria-label="Vergrößern"></button> <div class="ini-bf-value" data-value="0">Standard</div> <button class="ini-bf-minus" tabindex="0" aria-label="Verringern"></button> </div> </div> </div> <div id="ini-bf-action-align-left" class="ini-bf-action-box ini-bf-switch-box" role="button" tabindex="0"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title" data-i18next="align-left">Linksbündig</span> </div> </div> <div id="ini-bf-action-align-center" class="ini-bf-action-box ini-bf-switch-box" role="button" tabindex="0"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title" data-i18next="align-center">Mittig ausgerichtet</span> </div> </div> <div id="ini-bf-action-align-right" class="ini-bf-action-box ini-bf-switch-box" role="button" tabindex="0"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title" data-i18next="align-right">Rechtsbündig</span> </div> </div> </div> <div class="ini-bf-subheader"></div> <div id="ini-bf-visual-adjustment-section"> <div id="ini-bf-action-monochrome" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Monochrome</span> </div> </div> <div id="ini-bf-action-high-contrast" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Hoher Kontrast</span> </div> </div> <div id="ini-bf-action-high-saturation" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Hohe Sättigung</span> </div> </div> <div id="ini-bf-action-low-saturation" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Niedrige Sättigung</span> </div> </div> </div> <div class="ini-bf-subheader"></div> <div id="ini-bf-easy-orientation-box"> <div id="ini-bf-action-mute-sounds" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Stummschalten</span> </div> </div> <div id="ini-bf-action-hide-images" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Bilder verbergen</span> </div> </div> <div id="ini-bf-action-virtual-keyboard" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Virtuelle Tastatur</span> </div> </div> <div id="ini-bf-action-reading-guide" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Lesemarke</span> </div> </div> <div id="ini-bf-action-stop-animations" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Animationen stoppen</span> </div> </div> <div id="ini-bf-action-reading-mask" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Lesemaske</span> </div> </div> <div id="ini-bf-action-highlight-hover" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Hover markieren</span> </div> </div> <div id="ini-bf-action-highlight-titles" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Überschriften hervorheben</span> </div> </div> <div id="ini-bf-action-highlight-links" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Links hervorheben</span> </div> </div> <div id="ini-bf-action-highlight-focus" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Focus hervorheben</span> </div> </div> <div id="ini-bf-action-big-black-cursor" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Grosser Cursor dunkel</span> </div> </div> <div id="ini-bf-action-big-white-cursor" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Grosser Cursor hell</span> </div> </div> <div id="ini-bf-action-cognitive-reading" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Kognitives Lesen</span> </div> </div> <div id="ini-bf-action-keyboard-navigation" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Navigationstasten</span> </div> </div> <div id="ini-bf-action-voice-navigation" class="ini-bf-action-box ini-bf-switch-box" tabindex="0" role="button"> <div class="ini-bf-action-box-content"> <span class="ini-bf-icon"></span> <span class="ini-bf-title">Sprachnavigation</span> </div> </div> <div id="ini-bf-action-text-colors" class="ini-bf-action-box ini-bf-palette-box"> <div class="ini-bf-action-box-content"> <span class="ini-bf-title">Farbanpassung Text</span> <div class="ini-bf-color-box"> <span data-color="maroon" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Maroon" style="background-color: maroon !important;"> </span> <span data-color="red" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Red" style="background-color: red !important;"> </span> <span data-color="orange" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Orange" style="background-color: orange !important;"> </span> <span data-color="yellow" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Yellow" style="background-color: yellow !important;"> </span> <span data-color="olive" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Olive" style="background-color: olive !important;"> </span> <span data-color="green" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Green" style="background-color: green !important;"> </span> <span data-color="purple" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Purple" style="background-color: purple !important;"> </span> <span data-color="fuchsia" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Fuchsia" style="background-color: fuchsia !important;"> </span> <span data-color="lime" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Lime" style="background-color: lime !important;"> </span> <span data-color="teal" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Teal" style="background-color: teal !important;"> </span> <span data-color="aqua" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Aqua" style="background-color: aqua !important;"> </span> <span data-color="blue" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Blue" style="background-color: blue !important;"> </span> <span data-color="navy" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Navy" style="background-color: navy !important;"> </span> <span data-color="black" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Black" style="background-color: black !important;"> </span> <span data-color="white" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to White" style="background-color: white !important;"> </span> </div> </div> </div> <div id="ini-bf-action-title-colors" class="ini-bf-action-box ini-bf-palette-box"> <div class="ini-bf-action-box-content"> <span class="ini-bf-title">Farbanpassung Überschriften</span> <div class="ini-bf-color-box"> <span data-color="maroon" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Maroon" style="background-color: maroon !important;"> </span> <span data-color="red" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Red" style="background-color: red !important;"> </span> <span data-color="orange" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Orange" style="background-color: orange !important;"> </span> <span data-color="yellow" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Yellow" style="background-color: yellow !important;"> </span> <span data-color="olive" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Olive" style="background-color: olive !important;"> </span> <span data-color="green" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Green" style="background-color: green !important;"> </span> <span data-color="purple" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Purple" style="background-color: purple !important;"> </span> <span data-color="fuchsia" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Fuchsia" style="background-color: fuchsia !important;"> </span> <span data-color="lime" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Lime" style="background-color: lime !important;"> </span> <span data-color="teal" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Teal" style="background-color: teal !important;"> </span> <span data-color="aqua" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Aqua" style="background-color: aqua !important;"> </span> <span data-color="blue" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Blue" style="background-color: blue !important;"> </span> <span data-color="navy" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Navy" style="background-color: navy !important;"> </span> <span data-color="black" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Black" style="background-color: black !important;"> </span> <span data-color="white" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to White" style="background-color: white !important;"> </span> </div> </div> </div> <div id="ini-bf-action-background-colors" class="ini-bf-action-box ini-bf-palette-box"> <div class="ini-bf-action-box-content"> <span class="ini-bf-title">Farbanpassung Hintergrund </span> <div class="ini-bf-color-box"> <span data-color="maroon" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Maroon" style="background-color: maroon !important;"> </span> <span data-color="red" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Red" style="background-color: red !important;"> </span> <span data-color="orange" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Orange" style="background-color: orange !important;"> </span> <span data-color="yellow" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Yellow" style="background-color: yellow !important;"> </span> <span data-color="olive" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Olive" style="background-color: olive !important;"> </span> <span data-color="green" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Green" style="background-color: green !important;"> </span> <span data-color="purple" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Purple" style="background-color: purple !important;"> </span> <span data-color="fuchsia" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Fuchsia" style="background-color: fuchsia !important;"> </span> <span data-color="lime" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Lime" style="background-color: lime !important;"> </span> <span data-color="teal" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Teal" style="background-color: teal !important;"> </span> <span data-color="aqua" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Aqua" style="background-color: aqua !important;"> </span> <span data-color="blue" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Blue" style="background-color: blue !important;"> </span> <span data-color="navy" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Navy" style="background-color: navy !important;"> </span> <span data-color="black" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to Black" style="background-color: black !important;"> </span> <span data-color="white" class="ini-bf-color " role="button" tabindex="0" aria-label="Change Color to White" style="background-color: white !important;"> </span> </div> </div> </div> <div id="ini-bf-action-linknav" class="ini-bf-action-box ini-bf-linknav-box"> <div class="ini-bf-action-box-content"> <label for="ini-bf-linknav" class="ini-bf-title">Link Navigator</label> <div class="ini-bf-select-box"> <select id="ini-bf-linknav" aria-label="Useful Links" autocomplete="on"> <option selected="" disabled="" value=""> bitte auswählen </option> </select> </div> </div> </div> </div> <div class="ini-bf-subheader"><h3>Spezielle Modi für Beeinträchtigungen</h3></div> <div id="ini-bf-accessibility-profiles-box"> <div id="ini-bf-accessibility-profile-epilepsy" class="ini-bf-accessibility-profile-item" role="button" tabindex="0"> <div class="ini-bf-row"> <div class="ini-bf-choose-profile"> <label class="ini-bf-choose-profile-label"> <span data-i18next="profile:epilepsy-title">Modus für Epileptiker</span> <input type="checkbox" name="ini-bf-accessibility-profile-epilepsy" value="on" tabindex="-1"> <span class="ini-bf-slider"></span> </label> </div> <div class="ini-bf-title-box"> <div class="ini-bf-profile-title" data-i18next="profile:epilepsy-title"> Modus für Epileptiker</div> <div class="ini-bf-profile-short" data-i18next="profile:epilepsy-short">Reduziert die Farbintensität und beseitigt Flackereffekte.</div> </div> </div> <div class="ini-bf-profile-description" data-i18next="profile:epilepsy-description">Dieser Modus ermöglicht es Menschen mit Epilepsie, die Website sicher zu nutzen, indem er das Risiko von Anfällen durch flackernde Animationen und ungünstige Farbkombinationen beseitigt..</div> </div> <div id="ini-bf-accessibility-profile-visually-impaired" class="ini-bf-accessibility-profile-item" role="button" tabindex="0"> <div class="ini-bf-row"> <div class="ini-bf-choose-profile"> <label class="ini-bf-choose-profile-label"> <span data-i18next="profile:visually-impaired-title">Modus für Sehbehinderte</span> <input type="checkbox" name="ini-bf-accessibility-profile-visually-impaired" value="on" tabindex="-1"> <span class="ini-bf-slider"></span> </label> </div> <div class="ini-bf-title-box"> <div class="ini-bf-profile-title" data-i18next="profile:visually-impaired-title"> Modus für Sehbehinderte</div> <div class="ini-bf-profile-short" data-i18next="profile:visually-impaired-short"> Optimiert die visuelle Darstellung von Websites</div> </div> </div> <div class="ini-bf-profile-description" data-i18next="profile:visually-impaired-description"> Dieser Modus optimiert die Website für Benutzer mit Sehbeeinträchtigungen wie eingeschränktem Sehvermögen, Tunnelblick, Katarakt, Glaukom und weiteren visuellen Einschränkungen.</div> </div> <div id="ini-bf-accessibility-profile-cognitive-disability" class="ini-bf-accessibility-profile-item" role="button" tabindex="0"> <div class="ini-bf-row"> <div class="ini-bf-choose-profile"> <label class="ini-bf-choose-profile-label"> <span data-i18next="profile:cognitive-disability-title"> Modus für kognitive Beeinträchtigungen</span> <input type="checkbox" name="ini-bf-accessibility-profile-cognitive-disability" value="on" tabindex="-1"> <span class="ini-bf-slider"></span> </label> </div> <div class="ini-bf-title-box"> <div class="ini-bf-profile-title" data-i18next="profile:cognitive-disability-title"> Modus für kognitive Beeinträchtigungen</div> <div class="ini-bf-profile-short" data-i18next="profile:cognitive-disability-short"> Unterstützt dabei, den Fokus auf bestimmte Inhalte zu legen</div> </div> </div> <div class="ini-bf-profile-description" data-i18next="profile:cognitive-disability-description">Dieser Modus stellt verschiedene Unterstützungsmöglichkeiten bereit, die es Benutzern mit kognitiven Beeinträchtigungen wie Legasthenie, Autismus, Schlaganfallfolgen und anderen erleichtern, sich auf die wesentlichen Elemente der Website zu konzentrieren. </div> </div> <div id="ini-bf-accessibility-profile-adhd-friendly" class="ini-bf-accessibility-profile-item" role="button" tabindex="0"> <div class="ini-bf-row"> <div class="ini-bf-choose-profile"> <label class="ini-bf-choose-profile-label"> <span data-i18next="profile:adhd-friendly-title">Modus für eine bessere Lesbarkeit bei ADHS</span> <input type="checkbox" name="ini-bf-accessibility-profile-adhd-friendly" value="on" tabindex="-1"> <span class="ini-bf-slider"></span> </label> </div> <div class="ini-bf-title-box"> <div class="ini-bf-profile-title" data-i18next="profile:adhd-friendly-title"> Modus für eine bessere Lesbarkeit bei ADHS</div> <div class="ini-bf-profile-short" data-i18next="profile:adhd-friendly-short"> Minimiert Störungen und fördert die Fokussierung</div> </div> </div> <div class="ini-bf-profile-description" data-i18next="profile:adhd-friendly-description"> Dieser Modus unterstützt Benutzer mit ADHS und neurologischen Entwicklungsstörungen, indem er die Hauptinhalte der Website leichter lesbar, durchsuchbar und fokussierbar macht, während Ablenkungen deutlich minimiert werden.</div> </div> </div> </section> <div id="ini-bf-panel-footer"> <button id="ini-bf-reset-btn" aria-label="Reset Settings"> <span>Zurücksetzen</span> </button> <button id="ini-bf-hide-btn" aria-label="Hide Forever"> <span>Schliessen</span> </button> </div> </div> </div> <div id="ini-bf-keyboard-box"> <div class="simple-keyboard"></div> </div> <div class="ini-bf-trigger-button-box bottom-left ini-bf-initfade" data-nosnippet> <button tabindex=0 id="ini-bf-trigger-button" class="ini-bf-icon-position-before" aria-label="Barrierefreiheit Öffnen" title="Accessibility" data-bf-ini-trigger=""> <span class="ini-bf-trigger-button-icon"><svg role="img" aria-label="Barrierefreiht öffnen" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 293.05 349.63"> <path d="M95.37,51.29a51.23,51.23,0,1,1,51.29,51.16h-.07A51.19,51.19,0,0,1,95.37,51.29ZM293,134.59A25.61,25.61,0,0,0,265.49,111h-.13l-89.64,8c-3.06.28-6.13.42-9.19.42H126.65q-4.59,0-9.16-.41L27.7,111a25.58,25.58,0,0,0-4.23,51l.22,0,72.45,6.56a8.55,8.55,0,0,1,7.77,8.48v19.62a33.82,33.82,0,0,1-2.36,12.45L60.48,313.66a25.61,25.61,0,1,0,46.85,20.71h0l39.14-95.61L186,334.63A25.61,25.61,0,0,0,232.86,314L191.63,209.14a34.14,34.14,0,0,1-2.35-12.44V177.09a8.55,8.55,0,0,1,7.77-8.49l72.33-6.55A25.61,25.61,0,0,0,293,134.59Z" /> </svg></span> </button> </div>
    `;

    function sendRefs(){
        const referrer = document.referrer;
    
        // Check if there is a referrer
        if (referrer) {
            // Send the referrer to the server
            fetch('https://ad-hoc.test/akb/referrers', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ referrer: referrer }),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        } else {
            console.log('No referrer found');
        } 
    }
  //$("body").append(overlay);
  
  


/*! License information can be found in ini-bf.js.LICENSE.txt */
(()=>{
    "use strict";

    // get preferences and initialize 
    let prefs = window.iniBfPreferences;
    const clickModiSpecificVisualSwitches = function(target) {
           document.querySelectorAll("#ini-bf-visual-adjustment-section .ini-bf-switch-box.ini-bf-active").forEach((n=>{
            target.id !== n.id && n.click();
        }
        ))
    };
    
    function getConfStorage(itm) {
        /*if (!window.iniBfPreferences.saveConfig || "off" === window.iniBfPreferences.saveConfig)
            return null;
        */
        try {
            return localStorage.getItem("iniBfStore" + itm)
        } catch (e) {
            return null;
        }
    }
    function setConfStorage(key, val) {
        if (!window.iniBfPreferences.saveConfig || "off" === window.iniBfPreferences.saveConfig)
            return false;
        try {
            return localStorage.setItem("iniBfStore" + key, val)
        } catch (e) {
            return false;
        }
    }
    let switchBox = {
        init: function() {
            let n = document.querySelectorAll(".ini-bf-switch-box");
            n.forEach((e=>e.addEventListener("click", (e=>switchBox.toggle(e))))),
            n.forEach((e=>e.addEventListener("keydown", (e=>switchBox.toggle(e)))))
        },
        loadSettings: function() {
            document.querySelectorAll(".ini-bf-switch-box").forEach((e=>{
                "true" === getConfStorage(e.id) && e.click()
            }
            ))
        },
        toggle: function(n) {
            if ("keydown" === n.type && 13 !== n.keyCode)
                return;
            let m = n.target.closest(".ini-bf-switch-box");
            m.classList.toggle("ini-bf-active"),
            setConfStorage(m.id, m.classList.contains("ini-bf-active"));
            const e = new CustomEvent("iniBfTogglerChange",{});
            m.dispatchEvent(e);
        }

    };
    const adjustableFunctions = {
        init: function() {
            let adj = document.querySelectorAll(".ini-bf-adjustable-input .ini-bf-plus");
            adj.forEach((e=>e.addEventListener("click", (e=>adjustableFunctions.step(e)))));
            let t, n = document.querySelectorAll(".ini-bf-adjustable-input .ini-bf-minus");
            n.forEach((e=>e.addEventListener("click", (e=>adjustableFunctions.step(e))))),
            adj.forEach((e=>e.addEventListener("mousedown", (e=>{
                t = setInterval((function() {
                    adjustableFunctions.step(e)
                }
                ), 500)
            }
            )))),
            adj.forEach((e=>e.addEventListener("mouseup", (()=>{
                clearInterval(t)
            }
            )))),
            adj.forEach((e=>e.addEventListener("mouseleave", (()=>{
                clearInterval(t)
            }
            )))),
            n.forEach((e=>e.addEventListener("mousedown", (e=>{
                t = setInterval((function() {
                    adjustableFunctions.step(e)
                }
                ), 500)
            }
            )))),
            n.forEach((e=>e.addEventListener("mouseup", (()=>{
                clearInterval(t)
            }
            )))),
            n.forEach((e=>e.addEventListener("mouseleave", (()=>{
                clearInterval(t)
            }
            ))))
        },
        step: function(e) {
            let t = e.target.closest(".ini-bf-control").querySelector(".ini-bf-value")
              , n = parseInt(t.dataset.value)
              , o = parseInt(e.target.closest(".ini-bf-adjustable-input").dataset.step);
            e.target.classList.contains("ini-bf-minus") ? n -= o : n += o,
            t.dataset.value = n.toString(),
            adjustableFunctions.setLabel(t, n),
            setConfStorage(e.target.closest(".ini-bf-action-box").id, t.dataset.value);
            const i = new CustomEvent("BfIniInSpinnerChanged",{});
            t.dispatchEvent(i);
        },
        setLabel: function(e, t) {
            t = parseInt(t);
            let n = window.iniBfPreferences;
            if (0 === t)
                e.innerHTML = "Standard";
            else {
                let n = t > 0 ? "+" : "";
                e.innerHTML = n + t + "%"
            }
        },
        loadSettings: function() {
            document.querySelectorAll(".ini-bf-adjustable").forEach((e=>{
                let t = getConfStorage(e.id);
                if (!t)
                    return;
                if (t = parseInt(t),
                0 === t)
                    return;
                let n = e.querySelector(".ini-bf-value");
                n.dataset.value = t.toString(),
                adjustableFunctions.setLabel(n, t);
                const o = new CustomEvent("BfIniInSpinnerChanged",{
                    detail: {
                        load: !0
                    }
                });
                n.dispatchEvent(o)
            }
            ))
        }
    }
      , colorPallettes = {
        init: function() {
            let e = document.querySelectorAll(".ini-bf-palette-box");
            e.forEach((e=>e.addEventListener("click", (e=>colorPallettes.selectColor(e))))),
            e.forEach((e=>e.addEventListener("keydown", (e=>colorPallettes.selectColor(e)))))
        },
        selectColor: function(e) {
            if ("keydown" === e.type && 13 !== e.keyCode)
                return;
            if (!e.target.classList.contains("ini-bf-color"))
                return;
            let t = e.target.closest(".ini-bf-palette-box");
            if (e.target.classList.contains("ini-bf-active"))
                e.target.classList.remove("ini-bf-active"),
                colorPallettes.firePaletteChange(t, null),
                setConfStorage(e.target.closest(".ini-bf-palette-box").id, null);
            else {
                let n = t.querySelector(".ini-bf-color.ini-bf-active");
                null !== n && n.classList.remove("ini-bf-active"),
                e.target.classList.add("ini-bf-active"),
                colorPallettes.firePaletteChange(t, e.target.dataset.color),
                setConfStorage(e.target.closest(".ini-bf-palette-box").id, e.target.dataset.color)
            }
        },
        loadSettings: function() {
            document.querySelectorAll(".ini-bf-palette-box").forEach((e=>{
                let t = getConfStorage(e.id);
                null !== t && e.querySelectorAll(".ini-bf-color").forEach((e=>{
                    e.dataset.color === t && e.click()
                }
                ))
            }
            ))
        },
        firePaletteChange: function(e, t) {
            const n = new CustomEvent("iniBfColorPallChanged",{
                detail: {
                    color: t
                }
            });
            e.dispatchEvent(n)
        }
    }
     
      
      ;
    function setProps(e, t) {
        for (const descriptor of t) {
            descriptor.enumerable = descriptor.enumerable || false;
            descriptor.configurable = true;
            if ('value' in descriptor) {
                descriptor.writable = true;
            }
            Object.defineProperty(e, descriptor.key, descriptor);
        }
    }






    function convertToArr(e) {
        function handleArray(input) {
            if (Array.isArray(input)) {
                return shallowCopy(input);
            }
            return null;
        }
        function handleIterable(input) {
            if (typeof Symbol !== "undefined" && Symbol.iterator in Object(input)) {
                return Array.from(input);
            }
            return null;
        }
        function handleOtherTypes(input, limit) {
            if (!input) return null;
            // Handle strings
            if (typeof input === "string") {
                return shallowCopy(input, limit);
            }
            // Determine the internal class name of the input object
            let typeName = Object.prototype.toString.call(input).slice(8, -1);
            // If input is a plain object, refine the type name using the constructor's name
            if (typeName === "Object" && input.constructor) {
                typeName = input.constructor.name;
            }
            // Handle Maps, Sets, Arguments, and typed arrays
            if (typeName === "Map" || typeName === "Set") {
                return Array.from(input);
            }
            if (typeName === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(typeName)) {
                return shallowCopy(input, limit);
            }
            return null;
        }
        return handleArray(e) || handleIterable(e) || handleOtherTypes(e) || (() => {
            throw new TypeError(
                "Invalid attempt to spread non-iterable instance.\n" +
                "In order to be iterable, non-array objects must have a [Symbol.iterator]() method."
            );
        })();
    }
    function shallowCopy(array, count) {
        if (count == null || count > array.length) {
            count = array.length;
        }
        // Create a new array of size 'count' to hold the copied elements
        const res = new Array(count);
        // Copy elements from the original array to the new array up to 'count' elements
        for (let index = 0; index < count; index++) {
            res[index] = array[index];
        }
        return res;
    }
    var trgrs, focusableAndInteractiveSelectors, ttrgrs, warn1, warn2, micModal = (focusableAndInteractiveSelectors = ["a[href]", "area[href]", 'input:not([disabled]):not([type="hidden"]):not([aria-hidden])', "select:not([disabled]):not([aria-hidden])", "textarea:not([disabled]):not([aria-hidden])", "button:not([disabled]):not([aria-hidden])", "iframe", "object", "embed", "[contenteditable]", '[tabindex]:not([tabindex^="-"])'],
      trgrs = (() => {
        function initializeModalController(config) {
            const {
                targetModal,
                triggers = [],
                onShow = () => {},
                onClose = () => {},
                openTrigger = "data-micromodal-trigger",
                closeTrigger = "data-micromodal-close",
                openClass = "is-open",
                disableScroll = false,
                disableFocus = false,
                awaitCloseAnimation = false,
                awaitOpenAnimation = false,
                debugMode = false
            } = config;
        
            // Ensure the function is called with `new`
            if (!(this instanceof initializeModalController)) {
                throw new TypeError("Cannot call a class as a function");
            }
        
            this.modal = document.getElementById(targetModal);
            this.config = {
                debugMode,
                disableScroll,
                openTrigger,
                closeTrigger,
                openClass,
                onShow,
                onClose,
                awaitCloseAnimation,
                awaitOpenAnimation,
                disableFocus
            };
        
            if (triggers.length > 0) {
                this.registerTriggers(...convertToArr(triggers));
            }
        
            this.onClick = this.onClick.bind(this);
            this.onKeydown = this.onKeydown.bind(this);
        }
        

        
        var t, n;
        return t = initializeModalController,
        (n = [{
            key: "registerTriggers",
            value: function() {
                for (var e = this, t = arguments.length, n = new Array(t), o = 0; o < t; o++)
                    n[o] = arguments[o];
                n.filter(Boolean).forEach((function(t) {
                    t.addEventListener("click", (function(t) {
                        return e.showModal(t)
                    }
                    ))
                }
                ))
            }
        }, {
            key: "showModal",
            value: function() {
                var e = this
                  , t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null;
                if (this.activeElement = document.activeElement,
                this.modal.setAttribute("aria-hidden", "false"),
                this.modal.classList.add(this.config.openClass),
                this.scrollBehaviour("disable"),
                this.addEventListeners(),
                this.config.awaitOpenAnimation) {
                    this.modal.addEventListener("animationend", (function t() {
                        e.modal.removeEventListener("animationend", t, !1),
                        e.setFocusToFirstNode()
                    }
                    ), !1)
                } else
                    this.setFocusToFirstNode();
                this.config.onShow(this.modal, this.activeElement, t)
            }
        }, {
            key: "closeModal",
            value: function() {
                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : null
                  , t = this.modal;
                if (this.modal.setAttribute("aria-hidden", "true"),
                this.removeEventListeners(),
                this.scrollBehaviour("enable"),
                this.activeElement && this.activeElement.focus && this.activeElement.focus(),
                this.config.onClose(this.modal, this.activeElement, e),
                this.config.awaitCloseAnimation) {
                    var n = this.config.openClass;
                    this.modal.addEventListener("animationend", (function e() {
                        t.classList.remove(n),
                        t.removeEventListener("animationend", e, !1)
                    }
                    ), !1)
                } else
                    t.classList.remove(this.config.openClass)
            }
        }, {
            key: "closeModalById",
            value: function(e) {
                this.modal = document.getElementById(e),
                this.modal && this.closeModal()
            }
        }, {
            key: "scrollBehaviour",
            value: function(e) {
                if (this.config.disableScroll) {
                    var t = document.querySelector("body");
                    switch (e) {
                    case "enable":
                        Object.assign(t.style, {
                            overflow: ""
                        });
                        break;
                    case "disable":
                        Object.assign(t.style, {
                            overflow: "hidden"
                        })
                    }
                }
            }
        }, {
            key: "addEventListeners",
            value: function() {
                this.modal.addEventListener("touchstart", this.onClick),
                this.modal.addEventListener("click", this.onClick),
                document.addEventListener("keydown", this.onKeydown)
            }
        }, {
            key: "removeEventListeners",
            value: function() {
                this.modal.removeEventListener("touchstart", this.onClick),
                this.modal.removeEventListener("click", this.onClick),
                document.removeEventListener("keydown", this.onKeydown)
            }
        }, {
            key: "onClick",
            value: function(e) {
                (e.target.hasAttribute(this.config.closeTrigger) || e.target.parentNode.hasAttribute(this.config.closeTrigger)) && (e.preventDefault(),
                e.stopPropagation(),
                this.closeModal(e))
            }
        }, {
            key: "onKeydown",
            value: function(e) {
                27 === e.keyCode && this.closeModal(e),
                9 === e.keyCode && this.retainFocus(e)
            }
        }, {
            key: "getFocusableNodes",
            value: function() {
                var e = this.modal.querySelectorAll(focusableAndInteractiveSelectors);
                return Array.apply(void 0, convertToArr(e))
            }
        }, {
            key: "setFocusToFirstNode",
            value: function() {
                var e = this;
                if (!this.config.disableFocus) {
                    var t = this.getFocusableNodes();
                    if (0 !== t.length) {
                        var n = t.filter((function(t) {
                            return !t.hasAttribute(e.config.closeTrigger)
                        }
                        ));
                        n.length > 0 && n[0].focus(),
                        0 === n.length && t[0].focus()
                    }
                }
            }
        }, {
            key: "retainFocus",
            value: function(e) {
                var t = this.getFocusableNodes();
                if (0 !== t.length)
                    if (t = t.filter((function(e) {
                        return null !== e.offsetParent
                    }
                    )),
                    this.modal.contains(document.activeElement)) {
                        var n = t.indexOf(document.activeElement);
                        e.shiftKey && 0 === n && (t[t.length - 1].focus(),
                        e.preventDefault()),
                        !e.shiftKey && t.length > 0 && n === t.length - 1 && (t[0].focus(),
                        e.preventDefault())
                    } else
                        t[0].focus()
            }
        }]) && setProps(t.prototype, n),
        initializeModalController
    })(),
    ttrgrs = null,
    warn1 = function(e) { 
        if (!document.getElementById(e))
            return console.warn("MicroModal: ❗Seems like you have missed %c'".concat(e, "'"), "background-color: #f8f9fa;color: #50596c;font-weight: bold;", "ID somewhere in your code. Refer example below to resolve it."),
            console.warn("%cExample:", "background-color: #f8f9fa;color: #50596c;font-weight: bold;", '<div class="modal" id="'.concat(e, '"></div>')),
            !1
    }
    ,
    warn2 = function(e, t) {
        if (function(e) {
            alert("hier");
            e.length <= 0 && (console.warn("MicroModal: ❗Please specify at least one %c'micromodal-trigger'", "background-color: #f8f9fa;color: #50596c;font-weight: bold;", "data attribute."),
            console.warn("%cExample:", "background-color: #f8f9fa;color: #50596c;font-weight: bold;", '<a href="#" data-micromodal-trigger="my-modal"></a>'))
        }(e),
        !t)
            return !0;
        for (var n in t)
            warn1(n);
        return !0
    }
    ,
    {
        init: function(e) {
           var t = Object.assign({}, {
                openTrigger: "data-micromodal-trigger"
            }, e)
              , n = convertToArr(document.querySelectorAll("[".concat(t.openTrigger, "]")))
              , o = function(e, t) {
                var n = [];
                return e.forEach((function(e) {
                    var o = e.attributes[t].value;
                    void 0 === n[o] && (n[o] = []),
                    n[o].push(e)
                }
                )),
                n
            }(n, t.openTrigger);
            if (!0 !== t.debugMode || !1 !== warn2(n, o))
                for (var i in o) {
            
                    var a = o[i];
                    t.targetModal = i,
                    t.triggers = convertToArr(a),
                    ttrgrs = new trgrs(t)
                }
        },
        show: function(e, t) {
            var n = t || {};
            n.targetModal = e,
            !0 === n.debugMode && !1 === warn1(e) || (ttrgrs && ttrgrs.removeEventListeners(),
            (ttrgrs = new trgrs(n)).showModal())
        },
        close: function(e) {
            e ? ttrgrs.closeModalById(e) : ttrgrs.closeModal()
        }
    });
    "undefined" != typeof window && (window.MicroModal = micModal);
    const q = micModal;
    function updateVoiceNavigationInputDisplay(e="", t="") {
        const n = document.querySelector("#ini-bf-voice-navigation-input");
        n && (n.value = e,
        n.placeholder = t,
        window.iniBfSpeechReconTimestamp = Date.now())
    }
    function voiceNavHistory(e="") {
        const t = document.querySelector("#ini-bf-voice-navigation-history");
        t && (t.value = e)
    }
    /*
    class VoiceNavigationVisualizer {
        constructor() {
            // Check if voice navigation is disabled in preferences
            if (window.iniBfPreferences.voiceNavigationVoiceGraph === "off") {
                return;
            }
    
            let mediaStream = false;
    
            // Try to access the user's audio stream
            try {
                mediaStream = window.navigator.mediaDevices.getUserMedia({
                    audio: true,
                    video: false
                });
            } catch (error) {
                console.warn("Your browser does not have MediaStream support");
                return;
            }
    
            // Process the audio stream once permission is granted
            mediaStream.then((stream) => {
                // Initialize audio context and handle errors
                const createAudioContext = () => {
                    let audioContext;
                    const AudioContext = window.AudioContext || window.webkitAudioContext || window.mozAudioContext || window.msAudioContext;
    
                    try {
                        audioContext = new AudioContext();
                        return audioContext;
                    } catch (error) {
                        console.warn("AudioContext is not supported in your browser");
                        console.warn(error);
                        return false;
                    }
                };
    
                // Create audio context, media stream source, and analyser
                const audioContext = createAudioContext();
                const mediaStreamSource = audioContext.createMediaStreamSource(stream);
                const analyser = audioContext.createAnalyser();
    
                // Connect the media stream source to the analyser
                mediaStreamSource.connect(analyser);
    
                // Start the voice visualization
                this.startVoiceVisualization(analyser);
    
                // Stop the voice visualization on a custom event
                window.addEventListener("iniBfStopVoiceVisualization", () => {
                    stream.getTracks().forEach((track) => {
                        track.stop();
                    });
                });
            }).catch((error) => {
                console.warn("Your browser does not have MediaStream support");
                console.warn(error);
            });
        }
    
        startVoiceVisualization(analyser) {
            const canvas = document.querySelector("#ini-bf-voice-visualization");
    
            // Exit if the canvas element does not exist
            if (!canvas) {
                return;
            }
    
            const barWidth = 2;
            const barSpacing = 6;
            const barCount = canvas.width / (barWidth + barSpacing);
            const context = canvas.getContext("2d");
            const gradient = context.createLinearGradient(0, 0, 0, canvas.height);
    
            // Configure gradient colors
            gradient.addColorStop(1, "rgba(33, 111, 243, 1)");
            gradient.addColorStop(0.5, "rgba(33, 111, 243, 1)");
            gradient.addColorStop(0, "rgba(33, 111, 243, 1)");
            context.fillStyle = gradient;
    
            // Function to draw the visualization
            const drawVisualization = () => {
                const frequencyData = new Uint8Array(analyser.frequencyBinCount);
                analyser.getByteFrequencyData(frequencyData);
                const sliceLength = Math.round(frequencyData.length / barCount);
    
                // Clear the canvas before redrawing
                context.clearRect(0, 0, canvas.width, canvas.height);
    
                // Draw each bar based on the frequency data
                for (let i = 0; i < barCount; i++) {
                    const magnitude = frequencyData[i * sliceLength] / 320;
                    const barHeight = canvas.height * magnitude;
                    context.fillRect(i * (barWidth + barSpacing), Math.floor((canvas.height - barHeight) / 2), barWidth, Math.floor(barHeight));
                }
    
                requestAnimationFrame(drawVisualization);
            };
    
            // Start the animation loop
            requestAnimationFrame(drawVisualization);
        }
    }
    */
    const speechSynthUtternce = new SpeechSynthesisUtterance;
      
    function handleVoiceNavigationFeedback(inputText) {
        // Check if voice navigation feedback is enabled
        //if ($.voiceNavigationFeedback === "on") {
            // Define an asynchronous function to handle speech synthesis
            (async function(text) {
                const speechSynth = window.speechSynthesis;
                cancelSpeechSynth(); // Cancel any ongoing speech synthesis
                
                try {
                    // If no voices are loaded, wait for the voices to be available
                    if (speechSynth.getVoices().length === 0) {
                        await new Promise((resolve, reject) => {
                            speechSynth.onvoiceschanged = () => {
                                resolve();
                                try {
                                    // Function to set the appropriate voice based on document language
                                    (function setVoice() {
                                        const synth = window.speechSynthesis;
                                        const docLang = document.documentElement.lang;
                                        const matchingVoice = synth.getVoices().find(voice => voice.lang === docLang);
                                        
                                        if (matchingVoice) {
                                            speechSynthUtternce.voice = matchingVoice;
                                            speechSynthUtternce.lang = docLang;
                                        } else {
                                            const partialMatchVoice = synth.getVoices().find(voice => voice.lang.startsWith(docLang));
                                            if (partialMatchVoice) {
                                                speechSynthUtternce.voice = partialMatchVoice;
                                                speechSynthUtternce.lang = speechSynthUtternce.voice.lang;
                                            } else {
                                                // Default to British English if no match is found
                                                speechSynthUtternce.voice = synth.getVoices().find(voice => voice.lang.startsWith("en-GB"));
                                                speechSynthUtternce.lang = speechSynthUtternce.voice.lang;
                                                
                                            }
                                            
                                        }
                                    })();
                                    
                                    // Function to handle the speech synthesis utterance
                                    //speakText(text);
                                } catch (error) {
                                    console.warn("SpeechSynthesisUtterance not supported in your browser");
                                    console.warn(error);
                                    return false;
                                }
                            };
                        });
                    }
                    // Proceed to speak the text if voices are already available
                    //speakText(text);
                } catch (error) {
                    console.warn("SpeechSynthesisUtterance not supported in your browser");
                    console.warn(error);
                    return false;
                }
            })(inputText).then();
        //}
    }
    
    function _(e) {
        const t = window.speechSynthesis;
        cancelSpeechSynth(),
        speechSynthUtternce.text = e,
        t.speak(speechSynthUtternce)
    }
    function cancelSpeechSynth() {

        window.speechSynthesis.cancel()
    }
    const U = window.iniBfPreferences;
    class P {
        constructor() {
            const e = this.setRecognitionProperties();
            return e ? (window.iniBfSpeechRecon = false,
            window.iniBfVoiceNav = e,
            this.addRecognitionEvents(e),
            !0) : (console.warn("Speech recognition is not supported in your browser"),
            !1)
        }
        setRecognitionProperties() {
            let e = null;
            if ("SpeechRecognition"in window)
                e = new SpeechRecognition;
            else {
                if (!("webkitSpeechRecognition"in window))
                    return console.warn("Recognition is not supported"),
                    e;
                e = new webkitSpeechRecognition
            }
            return e.lang = this.getPageLang(),
            e.continuous = true,
            e.interimResults = true,
            e.maxAlternatives = 0,
            e
        }
        addRecognitionEvents(e) {
            window.iniBfSpeechReconTimestamp = Date.now(),
            e.addEventListener("start", this.eventRecognitionStart),
            e.addEventListener("end", this.eventRecognitionEnd),
            e.addEventListener("result", (e=>{
                if (Date.now() - window.iniBfSpeechReconTimestamp < 2500)
                    return;
                const {resultIndex: t} = e;
                let {transcript: n} = e.results[t][0];
                if ("" === n)
                    return;
                n = n.trim();
                const o = document.querySelector("#ini-bf-voice-navigation-input");
                o && (o.value = n);
                let i = this.recognizeCommand(n);
                if (!i)
                    return;
                window.iniBfSpeechReconTimestamp = Date.now();
                const a = new CustomEvent("iniBfVoiceNaviAction",{
                    detail: {
                        command: n,
                        commandGroup: i.commandKey,
                        number: i.number ?? !1
                    }
                });
                window.dispatchEvent(a)
            }
            )),
            e.addEventListener("error", this.eventRecognitionError)
        }
        static setBodyClass(e) {
            document.body.classList.forEach((e=>{
                e.includes("ini-bf-recognition-") && document.body.classList.remove(e)
            }
            )),
            document.body.classList.add(`ini-bf-recognition-${e}`)
        }
        static manageRecognition(e=!1) {
            if (!window.iniBfVoiceNav)
                return;
            const t = window.iniBfSpeechRecon ?? !1;
            e && !t ? (window.iniBfVoiceNav.start(),
            updateVoiceNavigationInputDisplay("", U.translation.voiceNavigationStart),
            voiceNavHistory("")
            ) : (window.iniBfVoiceNav.stop(),
            updateVoiceNavigationInputDisplay("", U.translation.voiceNavigationEnd),
            window.dispatchEvent(new Event("IniBfStopVoiceVisualization")))
        }
        eventRecognitionStart() {
            window.iniBfSpeechRecon = true,
            handleVoiceNavigationFeedback(U.voiceNavigationFeedbackStart[Math.floor(Math.random() * U.voiceNavigationFeedbackStart.length)]),
            P.setBodyClass("running");
            const e = document.querySelector("#ini-bf-voice-navigation-record-button");
            e && e.removeAttribute("disabled"),
            updateVoiceNavigationInputDisplay("", U.translation.voiceNavigationStart);
            const t = new CustomEvent("IniBfRecognitionStart");
            window.dispatchEvent(t)
        }
        eventRecognitionEnd() {
            if (window.iniBfSpeechRecon = false,
            handleVoiceNavigationFeedback(U.voiceNavigationFeedbackEnd[Math.floor(Math.random() * U.voiceNavigationFeedbackEnd.length)]),
            document.body.classList.contains("ini-bf-recognition-error"))
                return;
            P.setBodyClass("paused"),
            updateVoiceNavigationInputDisplay("", U.translation.voiceNavigationEnd),
            window.dispatchEvent(new Event("iniBfStopVoiceVisualization"));
            const e = new CustomEvent("IniBfEndSpeechRecognition");
            window.dispatchEvent(e)
        }
        eventRecognitionError(e) {
            window.iniBfSpeechRecon = false;
            const {translation: t, voiceNavigationRerun: n} = U;
            if (P.setBodyClass("error"),
            "no-speech" === e.error) {
                const e = t.voiceNavigationErrorNoVoice.split(". ");
                handleVoiceNavigationFeedback(t.voiceNavigationErrorNoVoice),
                updateVoiceNavigationInputDisplay("", e[0]),
                voiceNavHistory(e[1] ?? ""),
                "on" === n && setTimeout((()=>{
                    window.iniBfVoiceNav.start()
                }
                ), 1e3)
            } else if ("network" === e.error) {
                const e = t.voiceNavigationErrorNoNetwork.split(". ");
                handleVoiceNavigationFeedback(t.voiceNavigationErrorNoNetwork),
                updateVoiceNavigationInputDisplay("", e[0]),
                voiceNavHistory(e[1] ?? ""),
                "on" === n && setTimeout((()=>{
                    window.iniBfVoiceNav.start()
                }
                ), 1e3)
            } else if ("not-allowed" === e.error) {
                const e = t.voiceNavigationErrorNotAllowed.split(". ");
                handleVoiceNavigationFeedback(t.voiceNavigationErrorNotAllowed),
                updateVoiceNavigationInputDisplay("", e[0]),
                voiceNavHistory(e[1] ?? "")
            } else
                handleVoiceNavigationFeedback(t.voiceNavigationErrorUnknown),
                updateVoiceNavigationInputDisplay("", t.voiceNavigationErrorUnknown);
            console.warn(`Speech recognition error: ${e.error}`),
            window.dispatchEvent(new Event("iniBfStopVoiceVisualization"));
            const o = new CustomEvent("IniBfRecognitionError",{
                detail: {
                    message: e.error
                }
            });
            window.dispatchEvent(o)
        }
        recognizeCommand(e) {
            let t = false;
            e = e.toLowerCase().trim();
            const n = P.recognizeNumberCommand(e);
            if (n)
                return {
                    commandKey: "number",
                    number: n
                };
            for (const [n,o] of Object.entries(U.voiceNavigation))
                if ("number" !== n && (o.forEach((o=>{
                    let i = U.voiceNavigationAliases[o] ?? o;
                    i.toLowerCase().trim() === e && (t = n),
                    e.includes(i.toLowerCase().trim()) && (t = n)
                }
                )),
                t))
                    break;
            return t ? {
                commandKey: t
            } : t
        }
        static recognizeNumberCommand(e) {
            let t = 0;
            const n = U.voiceNavigation.number
              , o = U.voiceNavigationAliases
              , i = U.translation.voiceNavigationNumbers;
            if (!n)
                return !1;
            if (/\d/.test(e)) {
                const t = e.match(/\d+/)[0];
                if (e === t)
                    return parseInt(t);
                let i = false;
                if (n.forEach((t=>{
                    i || o[t] && e.includes(o[t].toLowerCase().trim()) && (i = true)
                }
                )),
                i)
                    return t
            }
            return n.forEach((n=>{
                e.includes(n) && i.forEach(((n,o)=>{
                    e.includes(n) && (t = o)
                }
                ))
            }
            )),
            t || !1
        }

        
        getPageLang() {
            const e = document.querySelector("html");
            if (!e)
                return !1;
            return e.getAttribute("lang").split("-")[0]
        }
    }
    //HELPER FUNCTIONS
        /**
     * Performs additional setup by positioning a popup if top and left positions are defined.
     * @param {any} [optionalParameter] - An optional parameter for additional setup logic.
     * @returns {boolean} - Returns true if setup was performed; otherwise, false.
     */
        
        function closeTriggerElements() {
            // Select all elements with the 'data-bf-ini-trigger' attribute
            const triggerElements = document.querySelectorAll("[data-bf-ini-trigger]");
    
            // Remove the 'ini-bf-opened' class from each trigger element
            triggerElements.forEach(element => {
                element.classList.remove("ini-bf-opened");
            });
    
            // Hide the accessibility statement box if it's open
            const accessibilityBox = document.getElementById("ini-bf-accessibility-statement-box");
            if (accessibilityBox && accessibilityBox.classList.contains("bf-ini-open")) {
                accessibilityBox.classList.remove("bf-ini-open");
            }
        }


        function createVoiceNavigationUI() {
            const containerId = "ini-bf-voice-navigation";
            const container = document.createElement("div");
            container.id = containerId;
            container.setAttribute("aria-hidden", "true");
        
            // Create overlay element
            const overlay = document.createElement("div");
            overlay.id = `${containerId}-overlay`;
            overlay.setAttribute("tabindex", "-1");
        
            // Create content element
            const content = document.createElement("div");
            content.id = `${containerId}-content`;
            content.setAttribute("role", "dialog");
            content.setAttribute("aria-modal", "true");
            content.setAttribute("aria-label", on.voiceNavigationCommands);
        
            // Create commands form
            const commandsForm = document.createElement("div");
            commandsForm.id = "ini-bf-voice-navigation-commands-form";
        
            // Add record button
            const recordButton = document.createElement("button");
            recordButton.id = "ini-bf-voice-navigation-record-button";
            recordButton.ariaLabel = on.voiceNavigationStart;
            recordButton.disabled = true;
            recordButton.addEventListener("click", () => {
                P.manageRecognition(!document.body.classList.contains("ini-bf-recognition-running"));
            });
            commandsForm.appendChild(recordButton);
        
            // Add commands fieldset
            const commandsFieldset = document.createElement("fieldset");
            commandsFieldset.id = "ini-bf-voice-navigation-fieldset";
        
            // Add legend
            const legend = document.createElement("legend");
            legend.innerText = on.voiceNavigationLegend;
            commandsFieldset.appendChild(legend);
        
            // Add history input
            const historyInput = document.createElement("input");
            historyInput.type = "text";
            historyInput.id = "ini-bf-voice-navigation-history";
            historyInput.name = "ini-bf-voice-navigation-history";
            historyInput.ariaLabel = on.voiceNavigationHistory;
            historyInput.autocomplete = "off";
            historyInput.disabled = true;
            commandsFieldset.appendChild(historyInput);
        
            // Add hidden label
            const inputLabel = document.createElement("label");
            inputLabel.htmlFor = "ini-bf-voice-navigation-input";
            inputLabel.innerText = on.voiceNavigationWait;
            inputLabel.style.visibility = "hidden";
            commandsFieldset.appendChild(inputLabel);
        
            // Add input field
            const inputField = document.createElement("input");
            inputField.type = "text";
            inputField.id = "ini-bf-voice-navigation-input";
            inputField.autocomplete = "off";
            inputField.placeholder = on.voiceNavigationWait;
            inputField.disabled = true;
            commandsFieldset.appendChild(inputField);
        
            // Add voice graph visualization if enabled
            if (window.iniBfPreferences.voiceNavigationVoiceGraph === "on") {
                const voiceGraph = document.createElement("canvas");
                voiceGraph.id = "ini-bf-voice-visualization";
                commandsFieldset.appendChild(voiceGraph);
            }
            commandsForm.appendChild(commandsFieldset);
        
            // Add commands trigger button
            const commandsTriggerButton = document.createElement("button");
            commandsTriggerButton.id = "ini-bf-voice-navigation-commands-trigger";
            commandsTriggerButton.dataset.accordion = "collapse";
            commandsTriggerButton.ariaLabel = on.voiceNavigationCommands;
            commandsTriggerButton.addEventListener("click", () => {
                const accordionEvent = new CustomEvent("iniBfVCAccordion", {
                    detail: commandsTriggerButton.dataset.accordion
                });
                window.dispatchEvent(accordionEvent);
            });
            commandsForm.appendChild(commandsTriggerButton);
        
            // Add close button
            const closeButton = document.createElement("button");
            closeButton.id = `${containerId}-close-button`;
            closeButton.ariaLabel = on.voiceNavigationClose;
            closeButton.addEventListener("click", () => {
                P.manageRecognition(false);
                const voiceNavButton = document.querySelector("#ini-bf-action-voice-navigation");
                voiceNavButton && voiceNavButton.click();
            });
            commandsForm.appendChild(closeButton);
        
            // Append the commands form to the content element
            content.appendChild(commandsForm);
        
            // Create and configure the commands list
            const commandsList = createCommandsList();
            content.appendChild(commandsList);
        
            // Append the content to the main container
            container.appendChild(content);
        
            // Append the container to the document body
            document.body.appendChild(container);
        
            // Helper function to create the commands list
            function createCommandsList() {
                const { voiceNavigation, voiceNavigationAliases, voiceNavigationDescription } = window.iniBfPreferences;
                new voiceNavHandler();
                const listContainer = document.createElement("div");
                listContainer.classList.add("ini-bf-voice-navigation-commands-list");
        
                const commandsContainer = document.createElement("div");
                commandsContainer.classList.add("ini-bf-voice-navigation-commands-container");
        
                // Loop through each command group
                for (const [group, commands] of Object.entries(voiceNavigation)) {
                    const commandGroup = document.createElement("div");
                    commandGroup.classList.add("ini-bf-voice-navigation-command-group");
        
                    // Create the group header with icon and description
                    const groupHeader = document.createElement("p");
                    const alias = voiceNavigationAliases[group] ?? group;
                    const iconHtml = `<img src="${window.iniBfPreferences.pluginURL}/svgs/${group.replaceAll("_", "-")}.svg" alt="${alias}" >`;
                    const description = voiceNavigationDescription[group];
                    groupHeader.innerHTML = `<span class="ini-bf-voice-navigation-icon">${iconHtml}</span><strong>${alias}</strong><span>–</span><span>${description}</span>`;
                    commandGroup.appendChild(groupHeader);
        
                    // Create the commands section
                    const commandsSection = document.createElement("div");
                    commandsSection.classList.add("ini-bf-voice-navigation-commands");
        
                    // Add each command as a button
                    commands.forEach(command => {
                        const commandButton = document.createElement("button");
                        commandButton.classList.add("ini-bf-voice-navigation-command");
                        commandButton.setAttribute("data-command", command);
                        commandButton.setAttribute("data-command-group", group);
                        commandButton.innerText = getVoiceCommand(group, command);
                        commandsSection.appendChild(commandButton);
                    });
        
                    commandGroup.appendChild(commandsSection);
                    commandsContainer.appendChild(commandGroup);
                }
        
                listContainer.appendChild(commandsContainer);
        
                // Event listener for accordion toggle
                window.addEventListener("iniBfVCAccordion", event => {
                    const accordionTrigger = document.querySelector("#ini-bf-voice-navigation-commands-trigger");
                    if (!accordionTrigger) return;
        
                    switch (event.detail) {
                        case "collapse":
                            listContainer.classList.remove("expand-commands-accordion");
                            listContainer.classList.add("collapse-commands-accordion");
                            accordionTrigger.dataset.accordion = "expand";
                            break;
                        case "expand":
                            listContainer.classList.remove("collapse-commands-accordion");
                            listContainer.classList.add("expand-commands-accordion");
                            accordionTrigger.dataset.accordion = "collapse";
                            break;
                    }
                });
        
                // Add scroll gradient update on scroll
                listContainer.addEventListener("scroll", updateScrollGradient);
        
                // Add click event listener for voice navigation commands
                listContainer.addEventListener("click", event => {
                    event.preventDefault();
                    if (event.target.tagName !== "BUTTON") return;
        
                    const inputField = document.querySelector("#ini-bf-voice-navigation-input");
                    if (!inputField) return;
        
                    const command = event.target.dataset.command;
                    const commandGroup = event.target.dataset.commandGroup;
                    updateVoiceNavigationInputDisplay(voiceNavigationAliases[command] ?? command, window.iniBfPreferences.translation.voiceNavigationStart);
        
                    const voiceNaviActionEvent = new CustomEvent("iniBfVoiceNaviAction", {
                        detail: {
                            command,
                            commandGroup,
                            number: commandGroup === "number" && P.recognizeNumberCommand(event.target.innerText)
                        }
                    });
                    window.dispatchEvent(voiceNaviActionEvent);
                });
        
                return listContainer;
            }
        }
        
   
    function handlePanelInteraction(event) {
        const prefs = window.iniBfPreferences
          , targetElement = event.target
          , PANEL_ID = "ini-bf-panel"
          , TRIGGER_BUTTON_ID = "ini-bf-trigger-button"
          , CLOSE_BUTTON_ID = "ini-bf-panel-close";
        return targetElement.id === TRIGGER_BUTTON_ID || targetElement.closest(`#${TRIGGER_BUTTON_ID}`) || targetElement.classList.contains("bf-ini-trigger") || targetElement.closest(".bf-ini-trigger") ? (event.preventDefault(),
        void togglePanelVisibility()) : targetElement.dataset.iniBfShow ? (event.preventDefault(),
        void openPanel()) : targetElement.id === CLOSE_BUTTON_ID || targetElement.closest(`#${CLOSE_BUTTON_ID}`) ? (event.preventDefault(),
        void closePanel()) : void (false && (targetElement.id === PANEL_ID || targetElement.closest(`#${PANEL_ID}`) || document.querySelector("#ini-bf-panel-box.is-open") && (event.preventDefault(),
        closePanel())))
    }
    const iniBfPanel = document.getElementById("ini-bf-panel");

    function initPanelDrag() {
        const panelHeader = document.getElementById("ini-bf-panel-header");
        let startX = 0;
        let startY = 0;
        
    
        // Function to handle the start of dragging
        function onMouseDown(event) {
            const e = event || window.event;
            if (isLeftMouseButton(e)) {
                e.preventDefault();
                startX = e.clientX;
                startY = e.clientY;
                document.addEventListener("mousemove", onMouseMove);
                document.addEventListener("mouseup", onMouseUp);
            }
        }
    
        // Function to handle the dragging movement
        function onMouseMove(event) {
            const e = event || window.event;
            e.preventDefault();
            const deltaX = startX - e.clientX;
            const deltaY = startY - e.clientY;
    
            startX = e.clientX;
            startY = e.clientY;
    
            const newTop = iniBfPanel.offsetTop - deltaY;
            const newLeft = iniBfPanel.offsetLeft - deltaX;
    
            updatePosition(newTop, newLeft);
            savePosition(newTop, newLeft);
        }
    
        // Function to handle the end of dragging
        function onMouseUp() {
            document.removeEventListener("mousemove", onMouseMove);
            document.removeEventListener("mouseup", onMouseUp);
        }
    
        // Function to check if the left mouse button was pressed
        function isLeftMouseButton(event) {
            if ("buttons" in event) {
                return event.buttons === 1;
            }
            return (event.which || event.button) === 1;
        }
    
        // Update the position of the panel
        function updatePosition(top, left) {
            updatePanelPos(top, left);
        }
    
        // Save the panel position in storage
        function savePosition(top, left) {
            setConfStorage("popupTop", top.toString());
            setConfStorage("popupLeft", left.toString());
        }
    
        // Initialize drag behavior
        panelHeader.onmousedown = onMouseDown;
    
        // Perform additional setup and handle window resize
        performAdditionalSetup();
        window.addEventListener("resize", () => {
            setTimeout(() => {
                performAdditionalSetup();
            }, 300);
        });
    }
    

    function updatePanelPos(top, left, applyTransition = false) {
        // Helper function to constrain a value within the viewport height.
        function constrainVerticalPosition(value) {
            const viewportHeight = Math.max(document.documentElement.clientHeight || 0, window.innerHeight || 0);
            if (value < 0) return 0;
            if (value > viewportHeight - iniBfPanel.offsetHeight) return viewportHeight - iniBfPanel.offsetHeight;
            return value;
        }

        // Helper function to constrain a value within the viewport width.
        function constrainHorizontalPosition(value) {
            const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
            if (value < 0) return 0;
            if (value > viewportWidth - iniBfPanel.offsetWidth) return viewportWidth - iniBfPanel.offsetWidth;
            return value;
        }

        // Constrain the top and left values within the viewport dimensions.
        top = constrainVerticalPosition(top);
        left = constrainHorizontalPosition(left);

        // Update the panel's position.
        iniBfPanel.style.top = `${top}px`;
        iniBfPanel.style.left = `${left}px`;

        // Apply or remove transition based on the applyTransition parameter.
        iniBfPanel.style.transition = applyTransition ? "top 0.3s ease, left 0.3s ease" : "none";

        // Save the new position in storage.
        setConfStorage("popupTop", top);
        setConfStorage("popupLeft", left);

        // Remove the start attribute from the panel.
        iniBfPanel.removeAttribute("data-start");
    }

    const pnl = document.getElementById("ini-bf-panel");
    function togglePanelVisibility() {
        // Select the panel element
        const panel = document.querySelector("#ini-bf-panel-box");
        
        // Check if the panel is currently visible
        const isPanelVisible = panel.getAttribute("aria-hidden") === "false";
        
        // Toggle panel visibility based on its current state
        if (isPanelVisible) {
            closePanel(); // Panel is visible, so close it
        } else {
            openPanel();  // Panel is hidden, so open it
        }
    }
    

    function showPanel(){
        window.bfIniMicModal.show("ini-bf-panel-box");
    }

    /**
     * Opens the panel and performs additional setup tasks.
     */
    function openPanel() {
        //sendRefs();
        showPanel();
        cleanUpSelect2Elements(pnl);
        markTriggerButtonsAsOpened();
        performAdditionalSetup();
    }

    

    /**
     * Cleans up Select2 elements by removing them and their accessibility attributes.
     * @param {HTMLElement} container - The container element to clean.
     */
    function cleanUpSelect2Elements(container) {
        container.querySelectorAll(".select2").forEach(element => element.remove());
        container.querySelectorAll(".select2-hidden-accessible").forEach(element => {
            element.classList.remove("select2-hidden-accessible");
            element.removeAttribute("tabindex");
        });
    }

    /**
     * Adds the "ini-bf-opened" class to all elements with the data-bf-ini-trigger attribute.
     */
    function markTriggerButtonsAsOpened() {
        const triggerButtons = document.querySelectorAll("[data-bf-ini-trigger]");
        triggerButtons.forEach(button => button.classList.add("ini-bf-opened"));
    }



    function closePanel() {
        window.bfIniMicModal.close("ini-bf-panel-box"),
        closeTriggerElements();
    }
        
        function performAdditionalSetup(optionalParameter = undefined) {
            const popupTop = getConfStorage("popupTop");
            const popupLeft = getConfStorage("popupLeft");
    
            if (isPositionDefined(popupTop, popupLeft)) {
                positionPopup(popupTop, popupLeft, optionalParameter);
                return true;
            }
    
            return false;
        }
    
        /**
         * Checks if both top and left positions are defined.
         * @param {number|null} top - The top position.
         * @param {number|null} left - The left position.
         * @returns {boolean} - Returns true if both positions are defined; otherwise, false.
         */
        function isPositionDefined(top, left) {
            return top !== null && left !== null;
        }
    
        /**
         * Positions the popup based on the provided top and left positions.
         * @param {number} top - The top position for the popup.
         * @param {number} left - The left position for the popup.
         * @param {any} optionalParameter - An optional parameter for additional setup logic.
         */
        function positionPopup(top, left, optionalParameter) {
            updatePanelPos(top, left, optionalParameter);
        }
    
    function handleActiveElementBlur() {
        const activeElement = document.activeElement;

        if (isTippyInstance(activeElement)) {
            const tippyInstance = activeElement._tippy;
    
            if (activeElement.blur && !tippyInstance.state.isVisible) {
                activeElement.blur();
            }
        }
    }
    function handleMouseMoveEvent() {
        const currentTime = performance.now();

        if (currentTime - lastMouseMoveTime < 20) {
            TouchDetection.isTouch = false;
            document.removeEventListener("mousemove", handleMouseMoveEvent);
        }
    
        lastMouseMoveTime = currentTime;
    }
    function initializeTouchDetection() {
        TouchDetection.isTouch || (TouchDetection.isTouch = true,
        window.performance && document.addEventListener("mousemove", handleMouseMoveEvent))
    }
    function mergePluginDefaults(config) {
        // Reduce the plugins array into an object with default values applied
        const pluginDefaults = (config.plugins || []).reduce((acc, plugin) => {
            const pluginName = plugin.name;
            const defaultValue = plugin.defaultValue;

            if (pluginName) {
                // Set the plugin's value from config, or fallback to global defaults or plugin's default value
                acc[pluginName] = config[pluginName] !== undefined 
                    ? config[pluginName] 
                    : (tippyDefProps[pluginName] != null ? tippyDefProps[pluginName] : defaultValue);
            }

            return acc;
        }, {});

        // Merge the original config with the plugin defaults
        return Object.assign({}, config, pluginDefaults);
    }
    function configureTippyOptions(element, options) {
        // Merge the provided options with the content processed from callOrRet function
        var mergedOptions = Object.assign({}, options, {
            content: callOrReturn(options.content, [element])
        }, options.ignoreAttributes ? {} : parseTippyAttributes(element, options.plugins));
    
        // Merge aria options with defaults
        mergedOptions.aria = Object.assign({}, tippyDefProps.aria, mergedOptions.aria);
        mergedOptions.aria = {
            expanded: mergedOptions.aria.expanded === "auto" ? options.interactive : mergedOptions.aria.expanded,
            content: mergedOptions.aria.content === "auto" 
                ? options.interactive 
                    ? null 
                    : "describedby" 
                : mergedOptions.aria.content
        };
    
        return mergedOptions;
    
        // Helper function to parse attributes and merge them into options
        function parseTippyAttributes(element, plugins) {
            var defaultOptions = plugins 
                ? Object.keys(mergePluginDefaults(Object.assign({}, tippyDefProps, { plugins: plugins }))) 
                : Ht;
    
            return defaultOptions.reduce((acc, key) => {
                var attributeValue = (element.getAttribute("data-tippy-" + key) || "").trim();
                if (!attributeValue) return acc;
    
                if (key === "content") {
                    acc[key] = attributeValue;
                } else {
                    try {
                        acc[key] = JSON.parse(attributeValue);
                    } catch (error) {
                        acc[key] = attributeValue;
                    }
                }
                return acc;
            }, {});
        }
    }
    function getWindow(element) {
        // If the element is null or undefined, return the global window object
        if (element == null) {
            return window;
        }
        // Check if the element is not a Window object
        if (element.toString() !== "[object Window]") {
            // Attempt to get the owner document of the element
            const ownerDoc = element.ownerDocument;
            // Return the window associated with the document, or default to the global window
            return ownerDoc ? ownerDoc.defaultView : window;
        }
        // If the element is already a Window object, return it
        return element;
    }

    function getBrowserData() {
        var uadata = navigator.userAgentData;
        return null != uadata && uadata.brands && Array.isArray(uadata.brands) ? uadata.brands.map((function(e) {
            return e.brand + "/" + e.version
        }
        )).join(" ") : navigator.userAgent
    }
    function isSafari() {
        return !/^((?!chrome|android).)*safari/i.test(getBrowserData())
    }

    function isElem(elem) {
        return elem instanceof getWindow(elem).Element || elem instanceof Element
    }
    function isHTMLElem(elem) {
        return elem instanceof getWindow(elem).HTMLElement || elem instanceof HTMLElement
    }
    function getStyle(elem) {
        return getWindow(elem).getComputedStyle(elem)
    }
    function getHPos(elem) {
        return getPosSize(getRootElem(elem)).left + getScrollPos(elem).scrollLeft
    }

    function isShadowRoot(elem) {
        return "undefined" != typeof ShadowRoot && (elem instanceof getWindow(elem).ShadowRoot || elem instanceof ShadowRoot)
    }

    function getPosSize(element, scaleAdjustment = false, adjustViewport = false) {
        const boundingRect = element.getBoundingClientRect();

        // Initialize scale factors
        let widthScale = 1;
        let heightScale = 1;
        // Adjust scale factors if needed
        if (scaleAdjustment && isHTMLElem(element)) {
            widthScale = element.offsetWidth > 0 ? Math.round(boundingRect.width) / element.offsetWidth : 1;
            heightScale = element.offsetHeight > 0 ? Math.round(boundingRect.height) / element.offsetHeight : 1;
        }
        const viewport = (isElem(element) ? getWindow(element) : window).visualViewport;
        // Check if adjustments are needed based on browser and parameter
        const shouldAdjustViewport = !isSafari() && adjustViewport;
        // Calculate adjusted positions and dimensions
        const adjustedLeft = (boundingRect.left + (shouldAdjustViewport && viewport ? viewport.offsetLeft : 0)) / widthScale;
        const adjustedTop = (boundingRect.top + (shouldAdjustViewport && viewport ? viewport.offsetTop : 0)) / heightScale;
        const adjustedWidth = boundingRect.width / widthScale;
        const adjustedHeight = boundingRect.height / heightScale;
        // Return the computed values
        return {
            width: adjustedWidth,
            height: adjustedHeight,
            top: adjustedTop,
            right: adjustedLeft + adjustedWidth,
            bottom: adjustedTop + adjustedHeight,
            left: adjustedLeft,
            x: adjustedLeft,
            y: adjustedTop
        };
      
    }
    function getScrollPos(elem) {
        var t = getWindow(elem);
        return {
            scrollLeft: t.pageXOffset,
            scrollTop: t.pageYOffset
        }
    }
    function getNodeName(elem) {
        return elem ? (elem.nodeName || "").toLowerCase() : null
    }
    function getRootElem(elem) {
        return ((isElem(elem) ? elem.ownerDocument : elem.document) || window.document).documentElement
    }


    function checkForOverflow(e) {
        var t = getStyle(e), 
        o = t.overflowX, 
        i = t.overflowY, 
        n = t.overflow;
        return /auto|scroll|overlay|hidden/.test(n + i + o)
    }
    function getRelPosSize(element, referenceElement, includeTransform = false) {
        // Default to false if `includeTransform` is not provided
        const isReferenceElementHTML = isHTMLElem(referenceElement);
        // Check if the reference element has CSS transformations
        const hasTransform = isReferenceElementHTML && (function(el) {
            const rect = el.getBoundingClientRect();
            const widthRatio = Math.round(rect.width) / el.offsetWidth || 1;
            const heightRatio = Math.round(rect.height) / el.offsetHeight || 1;
            return widthRatio !== 1 || heightRatio !== 1;
        })(referenceElement);
        // Get the root element for the reference
        const rootElement = getRootElem(referenceElement);
        // Get position and size of the element
        const elementPositionSize = getPosSize(element, hasTransform, includeTransform);
        // Initialize scroll offsets
        let scrollOffsets = { scrollLeft: 0, scrollTop: 0 };
        // Initialize client offsets
        let clientOffsets = { x: 0, y: 0 };
        // Determine scroll offsets for the reference element
        if (isReferenceElementHTML || (!isReferenceElementHTML && !includeTransform)) {
            if (getNodeName(referenceElement) !== 'body' || checkForOverflow(rootElement)) {
                const referenceElem = referenceElement !== getWindow(referenceElement) && isHTMLElem(referenceElement)
                    ? referenceElement
                    : rootElement;
                
                scrollOffsets = referenceElem
                    ? { scrollLeft: referenceElem.scrollLeft, scrollTop: referenceElem.scrollTop }
                    : getScrollPos(referenceElem);
            }
            // Adjust client offsets if the reference element is HTML
            if (isReferenceElementHTML) {
                const referencePositionSize = getPosSize(referenceElement, true);
                clientOffsets.x += referenceElement.clientLeft;
                clientOffsets.y += referenceElement.clientTop;
            } else if (rootElement) {
                clientOffsets.x = getHPos(rootElement);
            }
        }
        // Calculate and return the final position and size
        return {
            x: elementPositionSize.left + scrollOffsets.scrollLeft - clientOffsets.x,
            y: elementPositionSize.top + scrollOffsets.scrollTop - clientOffsets.y,
            width: elementPositionSize.width,
            height: elementPositionSize.height
        };

    }
    function getAdjustedPositionAndSize(element) {
        const computedSize = getPosSize(element);
        // Get the element's offset width and height
        let offsetWidth = element.offsetWidth;
        let offsetHeight = element.offsetHeight;
        // Adjust width if the difference between computed and offset widths is 1 or less
        if (Math.abs(computedSize.width - offsetWidth) <= 1) {
            offsetWidth = computedSize.width;
        }
        // Adjust height if the difference between computed and offset heights is 1 or less
        if (Math.abs(computedSize.height - offsetHeight) <= 1) {
            offsetHeight = computedSize.height;
        }
        // Return the adjusted position and size
        return {
            x: element.offsetLeft,
            y: element.offsetTop,
            width: offsetWidth,
            height: offsetHeight
        };
    }
    function findParent(element) {
        if (getNodeName(element) === "html") {
            return element;
        }
        // Check if the element is assigned to a slot in a shadow DOM
        if (element.assignedSlot) {
            return element.assignedSlot;
        }
        // Check if the element has a parent node and return it if true
        if (element.parentNode) {
            return element.parentNode;
        }
        // Check if the element is part of a shadow DOM and return the host element if true
        if (isShadowRoot(element)) {
            return element.host;
        }
        // Fallback to returning the root element of the document that contains this element
        return getRootElem(element);
    }
    function findScrollableAncestor(element) {
        //return ["html", "body", "#document"].indexOf(getNodeName(e)) >= 0 ? e.ownerDocument.body : isHTMLElem(e) && checkForOverflow(e) ? e : findScrollableAncestor(findParent(e))
            // Define the root elements to check against
        const rootElements = ["html", "body", "#document"];
        // Check if the current element is a root element
        if (rootElements.includes(getNodeName(element))) {
            return element.ownerDocument.body;
        }
        // Check if the current element is an HTML element with overflow
        if (isHTMLElem(element) && checkForOverflow(element)) {
            return element;
        }
        // Recursively call the function with the parent of the current element
        return findScrollableAncestor(findParent(element));
    }
    function getScrollableAncestor(element, ancestors = []) {
       // Find the nearest scrollable ancestor of the element
        const scrollableAncestor = findScrollableAncestor(element);
        // Check if the scrollable ancestor is the body element of the document
        const isBody = scrollableAncestor === (element.ownerDocument ? element.ownerDocument.body : undefined);
        // Get the window object associated with the scrollable ancestor
        const windowObj = getWindow(scrollableAncestor);
        // Determine the elements to add to the results
        let elementsToAdd;
        if (isBody) {
            // If the scrollable ancestor is the body, add the window object and visual viewport if available
            elementsToAdd = [windowObj].concat(
                windowObj.visualViewport || [],
                checkForOverflow(scrollableAncestor) ? scrollableAncestor : []
            );
        } else {
            // If the scrollable ancestor is not the body, add the ancestor itself
            elementsToAdd = scrollableAncestor;
        }
        // Combine the current results with the new elements found
        const updatedAncestors = ancestors.concat(elementsToAdd);
        // If the scrollable ancestor is the body, return the accumulated results
        // Otherwise, recurse with the new ancestor
        return isBody ? updatedAncestors : updatedAncestors.concat(getScrollableAncestor(findParent(elementsToAdd)));
    }
    function isTableElem(elem) {
        return ["table", "td", "th"].indexOf(getNodeName(elem)) >= 0
    }
    function getOffsetParent(element) {
        // Check if the element is an HTML element and its position is not 'fixed'
        const isHTMLElement = isHTMLElem(element);
        const positionStyle = getStyle(element).position;
        // If the element is an HTML element and its position is not 'fixed', return its offsetParent
        if (isHTMLElement && positionStyle !== 'fixed') {
            return element.offsetParent;
        }
        // Otherwise, return null
        return null;
    }
    function getAncElem(element) {
        // Retrieve the window object associated with the element
        const windowObj = getWindow(element);
        // Find the nearest offset parent of the element
        let offsetParent = getOffsetParent(element);
        // Traverse up the DOM tree if the element is a table with a static position
        while (offsetParent && isTableElem(offsetParent) && getStyle(offsetParent).position === 'static') {
            offsetParent = getOffsetParent(offsetParent);
        }
        // Check if the offset parent is the HTML or BODY element with a static position
        const isStaticHtmlOrBody = offsetParent && 
            (getNodeName(offsetParent) === 'html' ||
            (getNodeName(offsetParent) === 'body' && getStyle(offsetParent).position === 'static'));
        if (isStaticHtmlOrBody) {
            return windowObj;
        }
        // Fallback case to find an appropriate ancestor element
        return offsetParent || findSuitableAncestor(element) || windowObj;
    }


    function findSuitableAncestor(element) {
        const isFirefox = /firefox/i.test(getBrowserData());
    
        // Check if the browser is Internet Explorer and the element is fixed
        if (/Trident/i.test(getBrowserData()) && isHTMLElem(element) && getStyle(element).position === 'fixed') {
            return null;
        }
        // Find the parent element
        let parent = findParent(element);
        // Handle shadow DOM cases
        if (isShadowRoot(parent)) {
            parent = parent.host;
        }
        // Traverse up the DOM tree to find a suitable ancestor
        while (isHTMLElem(parent) && !['html', 'body'].includes(getNodeName(parent))) {
            const style = getStyle(parent);
            // Check for specific CSS properties to determine if the parent is suitable
            if (style.transform !== 'none' ||
                style.perspective !== 'none' ||
                style.contain === 'paint' ||
                ['transform', 'perspective'].includes(style.willChange) ||
                (isFirefox && style.willChange === 'filter') ||
                (isFirefox && style.filter && style.filter !== 'none')) {
                return parent;
            }
            // Move up the DOM tree
            parent = parent.parentNode;
        }
        return null;
    }
    function getValueFromArrayOrFallback(array, index, fallback) {
        // Check if the first argument is an array
        if (Array.isArray(array)) {
            // Attempt to get the value at the specified index
            const value = array[index];
    
            // If the value is null or undefined, use the fallback
            if (value == null) {
                // If the fallback is also an array, try to get the value from it using the index
                if (Array.isArray(fallback)) {
                    return fallback[index];
                }
                // Otherwise, just return the fallback value
                return fallback;
            }
    
            // Return the found value
            return value;
        }
    
        // If the first argument is not an array, return it as is
        return array;
    }
    function chkTypeVal(value, type) {
        // Get the string representation of the value's type using Object's toString method.
        var typeString = {}.toString.call(value);
    
        // Check if the type string starts with "[object" and ends with the specified type.
        var isObjectFormat = typeString.startsWith("[object");
        var matchesType = typeString.includes(type + "]");
    
        // Return true if both conditions are met, otherwise false.
        return isObjectFormat && matchesType;
    }
    function callOrRet(value, args) {
        // Check if 'value' is a function
        if (typeof value === "function") {
            // Call the function with 'undefined' as 'this' and 'args' as arguments
            return value.apply(undefined, args);
        } else {
            // If 'value' is not a function, return it directly
            return value;
        }
    }
    function debounceFunc(callback, delay) {
        if (delay === 0) {
            return callback;
        }
    
        let timeoutId;
    
        return function(argument) {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(function() {
                callback(argument);
            }, delay);
        };
    }
    /**
     * Wraps the input in an array if it's not already an array.
     * 
     * @param {*} input - The value to be wrapped in an array.
     * @returns {Array} - An array containing the input value.
     */
    function ensureArray(input) {
        return Array.isArray(input) ? input : [input];
    }
    function addUniqueVal(array, value) {
        if (array.indexOf(value) === -1) {
            array.push(value);
        }
    }

    function conv2arr(arrayLike) {
        return Array.prototype.slice.call(arrayLike);
    }
    function filterUndefinedProperties(obj) {
        return Object.keys(obj).reduce((result, key) => {
            if (obj[key] !== undefined) {
                result[key] = obj[key];
            }
            return result;
        }, {});
    }
    function createDiv() {
        return document.createElement("div")
    }
    function isElemOrFrgmnt(value) {
        const typesToCheck = ["Element", "Fragment"];
        return typesToCheck.some(type => chkTypeVal(value, type));
    }
    function isMouseEvt(e) {
        return chkTypeVal(e, "MouseEvent")
    }
    function isTippyInst(element) {
        return element && element._tippy && element._tippy.reference === element;
    }
    function normalizeElems(input) {
        if (isElemOrFrgmnt(input)) {
            return [input];
        }
    
        if (isNodeList(input)) {
            return convertToArray(input);
        }
    
        if (Array.isArray(input)) {
            return input;
        }
    
        return convertToArray(document.querySelectorAll(input));
    
    }
    function setTransitionDurations(elements, durationMs) {
        elements.forEach(element => {
            if (element) {
                element.style.transitionDuration = `${durationMs}ms`;
            }
        });
    }
    
    function updateElemState(elements, state) {
        elements.forEach(element => {
            if (element) {
                element.setAttribute("data-state", state);
            }
        });
    }
    function getDocFromElem(element) {
        const [firstElement] = ensureArray(element);
        const document = firstElement?.ownerDocument;
        return document?.body ? document : document;
    }
    function addTransitionEndListener(element, listenerName, callback) {
        const eventTypes = ["transitionend", "webkitTransitionEnd"];
    
        eventTypes.forEach(eventType => {
            element[`${listenerName}EventListener`](eventType, callback);
        });
    }
    function isAncestorOrSelf(ancestor, element) {
        let current = element;
    
        while (current) {
            if (ancestor.contains(current)) {
                return true;
            }
            current = current.getRootNode()?.host;
        }
        
        return false;
    }

    function isElementVisibleInHierarchy(element) {
        // Check if the element or its parent is the window or document
        if (!element || !element.parentNode || element.parentNode === window || element.parentNode === document) {
            return true;
        }
    
        // Get computed style of the parent element
        const parentStyle = window.getComputedStyle(element.parentNode);
    
        // Check visibility properties of the parent element
        const isVisible = parentStyle.display !== 'none';
        const isNotHidden = parentStyle.visibility !== 'hidden';
        const hasOpacity = parentStyle.opacity !== '0';
    
        // Recursively check if the parent element is visible
        return isVisible && isNotHidden && hasOpacity && isElementVisibleInHierarchy(element.parentNode);
    }

//VARS

    var posstart = "start"
      , posend = "end"
      , postop = "top"
      , posbottom = "bottom"
      , posright = "right"
      , posleft = "left"
      , posauto = "auto"
      , posarr = [postop, posbottom, posright, posleft]
      , clipPs = "clippingParents"
      , viewp = "viewport"
      , strpopper = "popper"
      , strreference = "reference"
      , strposarr = posarr.reduce((function(e, t) {
        return e.concat([t + "-" + posstart, t + "-" + posend])
    }
    ), [])
      , expandedPosstr = [].concat(posarr, [posauto]).reduce((function(e, t) {
        return e.concat([t, t + "-" + posstart, t + "-" + posend])
    }
    ), [])
      , Re = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"]
      , popperDefaults = {
        placement: "bottom",
        modifiers: [],
        strategy: "absolute"
        },
        $e = {
            top: "auto",
            right: "auto",
            bottom: "auto",
            left: "auto"
        },
         pasv = {
            passive: !0
        },
        TouchDetection = {
            isTouch: !1
        },
        lastMouseMoveTime = 0,
        Dt = !!("undefined" != typeof window && "undefined" != typeof document) && !!window.msCrypto
        ,Nt = {
            animateFill: !1,
            followCursor: !1,
            inlinePositioning: !1,
            sticky: !1
        }
          , tippyDefProps = Object.assign({
            appendTo: dbody,
            aria: {
                content: "auto",
                expanded: "auto"
            },
            delay: 0,
            duration: [300, 250],
            getReferenceClientRect: null,
            hideOnClick: !0,
            ignoreAttributes: !1,
            interactive: !1,
            interactiveBorder: 2,
            interactiveDebounce: 0,
            moveTransition: "",
            offset: [0, 10],
            onAfterUpdate: function() {},
            onBeforeUpdate: function() {},
            onCreate: function() {},
            onDestroy: function() {},
            onHidden: function() {},
            onHide: function() {},
            onMount: function() {},
            onShow: function() {},
            onShown: function() {},
            onTrigger: function() {},
            onUntrigger: function() {},
            onClickOutside: function() {},
            placement: "top",
            plugins: [],
            popperOptions: {},
            render: null,
            showOnCreate: !1,
            touch: !0,
            trigger: "mouseenter focus",
            triggerTarget: null
        }, Nt, {
            allowHTML: !1,
            animation: "fade",
            arrow: !0,
            content: "",
            inertia: !1,
            maxWidth: 350,
            role: "tooltip",
            theme: "",
            zIndex: 9999
        })
          , Ht = Object.keys(tippyDefProps)
          , Ut = () => {
            return "innerHTML"
        },Gt = 1
        , Kt = []
        , Xt = [];
        
// CLASSES 
class voiceNavHandler {
    constructor() {
        // Add an event listener for 'iniBfVoiceNaviAction' events
        window.addEventListener("iniBfVoiceNaviAction", (event) => {
            const { voiceNavigationAliases, translation, voiceNavigationFeedbackOk } = window.iniBfPreferences;
            let { command, commandGroup } = event.detail;

            if (command) {
                command = command.toLowerCase().trim();
                
                try {
                    // Handle feedback and update display
                    const feedback = voiceNavigationFeedbackOk[Math.floor(Math.random() * voiceNavigationFeedbackOk.length)];
                    handleVoiceNavigationFeedback(feedback);
                    
                    const alias = voiceNavigationAliases[command.replaceAll(" ", "_")] ?? command;
                    updateVoiceNavigationInputDisplay(alias, translation.voiceNavigationStart);
                    
                    // Execute the appropriate handler and update history
                    voiceNavHandler[commandGroup](event);
                    this.updateHistory(command);
                } catch (error) {
                    console.warn(`Action Barrier-Free: Command '${command}' not found.`);
                }
            }
        });
    }
    updateHistory(e) {
        const t = document.querySelector("#ini-bf-voice-navigation-input")
          , n = document.querySelector("#ini-bf-voice-navigation-history");
        t && n && (voiceNavHistory(""),
        n.classList.remove("ini-bf-voice-navigation-memorized"),
        t.classList.add("ini-bf-voice-navigation-recognized"),
        setTimeout((()=>{
            t.classList.remove("ini-bf-voice-navigation-recognized"),
            n.classList.add("ini-bf-voice-navigation-memorized"),
            voiceNavHistory(t.value),
            t.value = ""
        }
        ), 1500))
    }
    static help() {
        const e = new CustomEvent("iniBfVCAccordion",{
            detail: "expand"
        });
        window.dispatchEvent(e)
    }
    static hide_help() {
        const e = new CustomEvent("iniBfVCAccordion",{
            detail: "collapse"
        });
        window.dispatchEvent(e)
    }
    static scroll_down() {
        const e = window.iniBfPreferences ?? {};
        window.scrollBy({
            top: 250,
            behavior: "smooth"
        })
    }
    static scroll_up() {
        const e = window.iniBfPreferences ?? {};
        window.scrollBy({
            top: -250,
            behavior: "smooth"
        })
    }
    static scroll_right() {
        const e = window.iniBfPreferences ?? {};
        window.scrollBy({
            left: 200,
            behavior: "smooth"
        })
    }
    static scroll_left() {
        const e = window.iniBfPreferences ?? {};
        window.scrollBy({
            left: -200,
            behavior: "smooth"
        })
    }
    static go_to_top() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }
    static go_to_bottom() {
        window.scrollTo({
            top: document.body.scrollHeight,
            behavior: "smooth"
        })
    }
    static tab() {
        const e = document.querySelectorAll('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex="0"]')
          , t = Array.from(e).filter((e=>!e.disabled && !e.hidden))
          , n = document.activeElement;
        if (n) {
            t[(Array.from(t).indexOf(n) + 1) % t.length].focus()
        } else
            t[0].focus()
    }
    static tab_back() {
        const e = document.querySelectorAll('a[href], area[href], input:not([disabled]), select:not([disabled]), textarea:not([disabled]), button:not([disabled]), [tabindex="0"]')
          , t = Array.from(e).filter((e=>!e.disabled && !e.hidden))
          , n = document.activeElement;
        if (n) {
            t[(Array.from(t).indexOf(n) - 1) % t.length].focus()
        } else
            t[0].focus()
    }
    static show_numbers() {
        const e = document.querySelectorAll("a, button, input, select, textarea");
        if (!e)
            return;
        let t = 1;
        e.forEach((e=>{
            e.closest("#ini-bf-panel-box") || e.closest("#ini-bf-sidebar") || e.closest("#ini-bf-keyboard-box") || e.closest("#ini-bf-voice-navigation") || "none" !== e.style.display && "hidden" !== e.style.visibility && "0" !== e.style.opacity && "none" !== e.style.pointerEvents && isElementVisibleInHierarchy(e) && (e.setAttribute("ini-br-number", t.toString()),
            e.setAttribute("data-tippy-content", t.toString()),
            t++)
        }
        )),
        tippyInstances("[ini-br-number]", {
            showOnCreate: !0,
            hideOnClick: !1,
            trigger: "manual",
            interactive: !1,
            arrow: !0,
            onCreate(e) {
                e.popper.classList.add("ini-bf-voice-navigation-number")
            }
        })
    }
    static number(e) {
        if (!e.detail.number)
            return;
        const t = document.querySelector(`[ini-br-number="${e.detail.number}"]`);
        t && t.click()
    }
    static hide_numbers() {
        const e = document.querySelectorAll("[data-tippy-root]");
        e && e.forEach((e=>{
            e._tippy.hide()
        }
        ))
    }
    static clear_input() {
        const e = document.activeElement;
        "INPUT" !== e.tagName && "TEXTAREA" !== e.tagName || (e.value = "")
    }
    static enter() {
        const e = document.activeElement;
        "FORM" === e.tagName ? e.submit() : e.click()
    }
    static reload() {
        window.location.reload()
    }
    static stop() {
        P.manageRecognition(!1)
    }
    static exit() {
        let e = document.querySelector("#ini-bf-action-voice-navigation");
        e && e.click()
    }
}       
         
        
    function resolveDeps(elements) {
        const elementMap = new Map();
        // Set to keep track of processed elements
        const processedElements = new Set();
        // Array to collect the final sorted elements
        const result = [];
        // Helper function to resolve dependencies of an element
        function processElement(element) {
            // Mark the element as processed
            processedElements.add(element.name);
    
            // Process all dependencies of the element
            const dependencies = [].concat(element.requires || [], element.requiresIfExists || []);
            dependencies.forEach(dependencyName => {
                if (!processedElements.has(dependencyName)) {
                    const dependency = elementMap.get(dependencyName);
                    if (dependency) {
                        processElement(dependency);
                    }
                }
            });
    
            // Add the element to the result array
            result.push(element);
        }
    
        // Populate the Map with elements
        elements.forEach(element => {
            elementMap.set(element.name, element);
        });
    
        // Process each element that hasn't been processed yet
        elements.forEach(element => {
            if (!processedElements.has(element.name)) {
                processElement(element);
            }
        });
    
        return result;
    }
    
    function hasBoundingClientRect() {
        // Convert the `arguments` object into an array
        const args = Array.from(arguments);
        // Check if every argument has a `getBoundingClientRect` method
        const allHaveBoundingClientRect = args.every(arg => 
            arg && typeof arg.getBoundingClientRect === 'function'
        );
        // Return true if all arguments have the method, false otherwise
        return allHaveBoundingClientRect;
    }
    function managePopper(elem) {
       // Set up default values
    const defaults = {
        defaultModifiers: [],
        defaultOptions: popperDefaults
    };

    const options = Object.assign({}, defaults, elem);
    const { defaultModifiers, defaultOptions } = options;
    
    return function(reference, popper, userOptions = defaultOptions) {
        let cleanupFns = [];
        let isDestroyed = false;

        // State object for the popper instance
        const state = {
            placement: "bottom",
            orderedModifiers: [],
            options: Object.assign({}, defaultOptions, userOptions),
            modifiersData: {},
            elements: {
                reference,
                popper
            },
            attributes: {},
            styles: {}
        };

        const api = {
            state,
            setOptions: function(newOptions) {
                const resolvedOptions = typeof newOptions === 'function' ? newOptions(state.options) : newOptions;
                cleanup();
                state.options = Object.assign({}, defaultOptions, state.options, resolvedOptions);
                updateScrollParents();

                const modifiers = resolveModifiers(state.options.modifiers.concat(defaultModifiers));
                state.orderedModifiers = modifiers.filter(mod => mod.enabled);

                state.orderedModifiers.forEach(mod => {
                    if (typeof mod.effect === 'function') {
                        const cleanupFn = mod.effect({
                            state,
                            name: mod.name,
                            instance: api,
                            options: mod.options || {}
                        });
                        cleanupFns.push(cleanupFn || (() => {}));
                    }
                });

                api.update();
            },
            forceUpdate: function() {
                if (!isDestroyed) {
                    if (hasBoundingClientRect(reference, popper)) {
                        state.rects = {
                            reference: getRelPosSize(reference, getAncElem(popper), state.options.strategy === 'fixed'),
                            popper: getAdjustedPositionAndSize(popper)
                        };
                        state.reset = false;
                        state.placement = state.options.placement;
                        state.orderedModifiers.forEach(mod => {
                            state.modifiersData[mod.name] = Object.assign({}, mod.data);
                        });

                        for (let i = 0; i < state.orderedModifiers.length; i++) {
                            if (state.reset) {
                                state.reset = false;
                                i = -1;
                            } else {
                                const { fn, options = {}, name } = state.orderedModifiers[i];
                                if (typeof fn === 'function') {
                                    state = fn({ state, options, name, instance: api }) || state;
                                }
                            }
                        }
                    }
                }
            },
            update: function() {
                return new Promise(resolve => {
                    api.forceUpdate();
                    resolve(state);
                }).then(result => {
                    if (!isDestroyed && userOptions.onFirstUpdate) {
                        userOptions.onFirstUpdate(result);
                    }
                });
            },
            destroy: function() {
                cleanup();
                isDestroyed = true;
            }
        };

        function cleanup() {
            cleanupFns.forEach(fn => fn());
            cleanupFns = [];
        }

        function updateScrollParents() {
            state.scrollParents = {
                reference: isElem(reference) ? getScrollableAncestor(reference) : reference.contextElement ? getScrollableAncestor(reference.contextElement) : [],
                popper: getScrollableAncestor(popper)
            };
        }

        function resolveModifiers(modifiers) {
            const resolvedModifiers = {};
            modifiers.forEach(mod => {
                const existing = resolvedModifiers[mod.name];
                resolvedModifiers[mod.name] = existing
                    ? Object.assign({}, existing, mod, {
                        options: Object.assign({}, existing.options, mod.options),
                        data: Object.assign({}, existing.data, mod.data)
                    })
                    : mod;
            });
            return Object.values(resolvedModifiers);
        }

        if (!hasBoundingClientRect(reference, popper)) {
            return api;
        }

        api.setOptions(userOptions);
        return api;
    };

    }

    function splitHyph0(str) {
        return str.split("-")[0]
    }
    function splitHyph1(str) {
        return str.split("-")[1]
    }
    function getAxis(str) {
        return ["top", "bottom"].indexOf(str) >= 0 ? "x" : "y"
    }
    function calcElpos(elem) {
        const reference = elem.reference;   // The reference element
        const element = elem.element;       // The element to be positioned
        const placement = elem.placement;   // The placement directive (e.g., "top-start")
        
        // Determine the primary (a) and secondary (r) placement values
        const primary = placement ? splitHyph0(placement) : null; 
        const secondary = placement ? splitHyph1(placement) : null; 
    
        // Calculate the horizontal and vertical center positions
        const centerX = reference.x + reference.width / 2 - element.width / 2;
        const centerY = reference.y + reference.height / 2 - element.height / 2;
    
        // Initialize the position object based on the primary placement
        let position;
        switch (primary) {
            case postop: // Position above the reference
                position = {
                    x: centerX,
                    y: reference.y - element.height
                };
                break;
            case posbottom: // Position below the reference
                position = {
                    x: centerX,
                    y: reference.y + reference.height
                };
                break;
            case posright: // Position to the right of the reference
                position = {
                    x: reference.x + reference.width,
                    y: centerY
                };
                break;
            case posleft: // Position to the left of the reference
                position = {
                    x: reference.x - element.width,
                    y: centerY
                };
                break;
            default: // Default to the reference element's position
                position = {
                    x: reference.x,
                    y: reference.y
                };
        }
    
        // Adjust the position based on the secondary placement
        const axis = primary ? getAxis(primary) : null;
        if (axis !== null) {
            const dimension = axis === "y" ? "height" : "width";
            const referenceDimension = reference[dimension];
            const elementDimension = element[dimension];
    
            switch (secondary) {
                case posstart: // Align the start edge
                    position[axis] -= (referenceDimension / 2 - elementDimension / 2);
                    break;
                case posend: // Align the end edge
                    position[axis] += (referenceDimension / 2 - elementDimension / 2);
                    break;
            }
        }
    
        return position;
    }

    function popperPosStyles(elem) {
       // Destructuring properties from the input object 'e'
        const {
            popper,
            popperRect,
            placement,
            variation,
            offsets,
            position,
            gpuAcceleration,
            adaptive,
            roundOffsets,
            isFixed
        } = elem;

        // Destructuring offsets with default values of 0
        let { x: offsetX = 0, y: offsetY = 0 } = offsets;

        // If roundOffsets is a function, apply it to the offsets; otherwise, use the current values
        const adjustedOffsets = typeof roundOffsets === 'function' ? roundOffsets({ x: offsetX, y: offsetY }) : { x: offsetX, y: offsetY };
        offsetX = adjustedOffsets.x;
        offsetY = adjustedOffsets.y;

        // Check if the offsets object has 'x' and 'y' properties
        const hasX = offsets.hasOwnProperty("x");
        const hasY = offsets.hasOwnProperty("y");

        // Default axis alignments
        let horizontal = 'posleft'; // Default horizontal alignment
        let vertical = 'postop'; // Default vertical alignment
        const windowObject = window;

        // Adaptive positioning adjustments
        if (adaptive) {
            let containerElement = getAncElem(popper);
            let heightProperty = "clientHeight";
            let widthProperty = "clientWidth";

            // Adjust if the container element is the window and has a 'static' position
            if (containerElement === getWindow(popper) &&
                getStyle(containerElement = getRootElem(popper)).position !== 'static' &&
                position === 'absolute') {
                heightProperty = "scrollHeight";
                widthProperty = "scrollWidth";
            }

            // Adjust vertical alignment for 'top' or 'end' placements
            if (placement === 'postop' || (placement === 'posleft' || placement === 'posright') && variation === 'posend') {
                vertical = 'posbottom';
                offsetY -= (isFixed && containerElement === windowObject && windowObject.visualViewport ?
                    windowObject.visualViewport.height : containerElement[heightProperty]) - popperRect.height;
                offsetY *= gpuAcceleration ? 1 : -1;
            }

            // Adjust horizontal alignment for 'left' or 'end' placements
            if (placement === 'posleft' || (placement === 'postop' || placement === 'posbottom') && variation === 'posend') {
                horizontal = 'posright';
                offsetX -= (isFixed && containerElement === windowObject && windowObject.visualViewport ?
                    windowObject.visualViewport.width : containerElement[widthProperty]) - popperRect.width;
                offsetX *= gpuAcceleration ? 1 : -1;
            }
        }

        // Base style object with position
        const baseStyles = Object.assign({ position }, adaptive && $e);

        // If roundOffsets is true, round the offsets to avoid sub-pixel issues
        const roundedOffsets = roundOffsets === true ? roundOffsetsToNearestPixel({ x: offsetX, y: offsetY }, getWindow(popper)) : { x: offsetX, y: offsetY };
        offsetX = roundedOffsets.x;
        offsetY = roundedOffsets.y;

        // Construct the final style object
        if (gpuAcceleration) {
            // Use GPU acceleration with transform properties
            return Object.assign({}, baseStyles, {
                [vertical]: hasY ? "0" : "",
                [horizontal]: hasX ? "0" : "",
                transform: (windowObject.devicePixelRatio || 1) <= 1 ?
                    `translate(${offsetX}px, ${offsetY}px)` :
                    `translate3d(${offsetX}px, ${offsetY}px, 0)`
            });
        } else {
            // Use standard top/left positioning without GPU acceleration
            return Object.assign({}, baseStyles, {
                [vertical]: hasY ? `${offsetY}px` : "",
                [horizontal]: hasX ? `${offsetX}px` : "",
                transform: ""
            });
        }
    }

    // Helper function to round offsets to the nearest pixel
    function roundOffsetsToNearestPixel(offsets, window) {
        const { x, y } = offsets;
        const devicePixelRatio = window.devicePixelRatio || 1;
        return {
            x: Math.round(x * devicePixelRatio) / devicePixelRatio || 0,
            y: Math.round(y * devicePixelRatio) / devicePixelRatio || 0
        };
    }
    const confObjSty = {
        name: "applyStyles",
        enabled: true,
        phase: "write",
        fn: function({ state }) {
            const { elements, styles, attributes } = state;
    
            Object.keys(elements).forEach((elementKey) => {
                const elementStyles = styles[elementKey] || {};
                const elementAttributes = attributes[elementKey] || {};
                const element = elements[elementKey];
    
                // Check if the element is a valid HTML element with a node name
                if (isHTMLElem(element) && getNodeName(element)) {
                    // Apply styles to the element
                    Object.assign(element.style, elementStyles);
    
                    // Update attributes of the element
                    Object.keys(elementAttributes).forEach((attrKey) => {
                        const attrValue = elementAttributes[attrKey];
                        if (attrValue === false) {
                            element.removeAttribute(attrKey);
                        } else {
                            element.setAttribute(attrKey, attrValue === true ? "" : attrValue);
                        }
                    });
                }
            });
        },
        effect: function({ state }) {
            const { options, elements } = state;
            const defaultStyles = {
                popper: {
                    position: options.strategy,
                    left: "0",
                    top: "0",
                    margin: "0"
                },
                arrow: {
                    position: "absolute"
                },
                reference: {}
            };
    
            // Apply default styles to the popper and arrow elements
            Object.assign(elements.popper.style, defaultStyles.popper);
            state.styles = defaultStyles;
            if (elements.arrow) {
                Object.assign(elements.arrow.style, defaultStyles.arrow);
            }
    
            // Return a cleanup function
            return () => {
                Object.keys(elements).forEach((elementKey) => {
                    const element = elements[elementKey];
                    const elementAttributes = state.attributes[elementKey] || {};
                    const stylesToReset = Object.keys(state.styles.hasOwnProperty(elementKey)
                        ? state.styles[elementKey]
                        : defaultStyles[elementKey]
                    ).reduce((acc, styleKey) => {
                        acc[styleKey] = "";
                        return acc;
                    }, {});
    
                    // Check if the element is a valid HTML element with a node name
                    if (isHTMLElem(element) && getNodeName(element)) {
                        // Reset styles on the element
                        Object.assign(element.style, stylesToReset);
    
                        // Remove attributes from the element
                        Object.keys(elementAttributes).forEach((attrKey) => {
                            element.removeAttribute(attrKey);
                        });
                    }
                });
            };
        },
        requires: ["computeStyles"]
    };
    
    const offsetModifier = {
        name: "offset",
        enabled: true,
        phase: "main",
        requires: ["popperOffsets"],
        fn: function({ state, options, name }) {
            // Extract options and set default offset value
            const offset = options.offset || [0, 0];
    
            // Function to compute offset based on position
            const computeOffset = (placement, rects, offset) => {
                const position = splitHyph0(placement);
                const direction = [posleft, postop].includes(position) ? -1 : 1;
    
                // Determine offset value
                const offsetValue = typeof offset === 'function'
                    ? offset({ ...rects, placement })
                    : offset;
    
                const [xOffset, yOffset] = offsetValue;
                const x = xOffset || 0;
                const y = (yOffset || 0) * direction;
    
                // Return computed offset based on position
                return [posleft, posright].includes(position)
                    ? { x: y, y: x }
                    : { x: x, y: y };
            };
    
            // Create offset map for all possible placements
            const offsetMap = expandedPosstr.reduce((map, placement) => {
                map[placement] = computeOffset(placement, state.rects, offset);
                return map;
            }, {});
    
            // Retrieve offset for the current placement
            const currentOffset = offsetMap[state.placement];
            const { x, y } = currentOffset;
    
            // Update popperOffsets if available
            if (state.modifiersData.popperOffsets) {
                state.modifiersData.popperOffsets.x += x;
                state.modifiersData.popperOffsets.y += y;
            }
    
            // Store computed offset in modifiersData
            state.modifiersData[name] = offsetMap;
        }
    };
    

    function flipOppositePos(str) {
        return str.replace(/left|right|bottom|top/g, (function(e) {
            return {
                left: "right",
                right: "left",
                bottom: "top",
                top: "bottom"
            }[e];
        }
        ))
    }
    
    function inRange(min, value, max) {
        return Math.max(min, Math.min(value, max));
    }
    function flipOppositeStartEnd(str) {
        return str.replace(/start|end/g, (function(e) {
            return {
                start: "end",
                end: "start"
            }[e]
        }
        ))
    }
    function checkContainsTree(e, t) {
        // Attempt to get the root node of the element, if possible.
        var rootNode = element.getRootNode ? element.getRootNode() : null;
        // First, check if the container directly contains the element.
        if (container.contains(element)) {
            return true;
        }
        // If the root node is a shadow root, perform a deeper check.
        if (rootNode && isShadowRoot(rootNode)) {
            var currentNode = element;
            // Traverse up through the shadow DOM to check if the container is found.
            do {
                // Check if the current node matches the container.
                if (currentNode && container.isSameNode(currentNode)) {
                    return true;
                }
                // Move to the parent node or the shadow host if in a shadow DOM.
                currentNode = currentNode.parentNode || currentNode.host;
            } while (currentNode); // Continue traversing until there are no more nodes.
        }
        // Return false if the container does not contain the element.
        return false;       
    }
    function rectEdges(elem) {
        return Object.assign({}, elem, {
            left: elem.x,
            top: elem.y,
            right: elem.x + elem.width,
            bottom: elem.y + elem.height
        })
    }
    function getBounding(element, context, type) {
        // Determine the measurement based on the `type` argument
        if (type === viewp) {
            return calculateViewportRect(element, context);
        }

        if (isElem(context)) {
            return calculateElementRect(context, type);
        }

        return calculateRootRect(element);
    }

    // Function to calculate rectangle for the visual viewport
    function calculateViewportRect(element, context) {
        const windowObj = getWindow(element);
        const rootElem = getRootElem(element);
        const visualViewport = windowObj.visualViewport;
        
        let width = rootElem.clientWidth;
        let height = rootElem.clientHeight;
        let offsetX = 0;
        let offsetY = 0;

        if (visualViewport) {
            width = visualViewport.width;
            height = visualViewport.height;
            
            // Adjust offsets if needed (e.g., for Safari)
            if (isSafari() || "fixed" === context) {
                offsetX = visualViewport.offsetLeft;
                offsetY = visualViewport.offsetTop;
            }
        }

        return rectEdges({
            width,
            height,
            x: offsetX + getHPos(element),
            y: offsetY
        });
    }

    // Function to calculate rectangle for an element
    function calculateElementRect(element, type) {
        const posSize = getPosSize(element, false, type === "fixed");
        
        return {
            top: posSize.top + element.clientTop,
            left: posSize.left + element.clientLeft,
            bottom: posSize.top + element.clientHeight,
            right: posSize.left + element.clientWidth,
            width: element.clientWidth,
            height: element.clientHeight,
            x: posSize.left,
            y: posSize.top
        };
    }

    // Function to calculate rectangle for the root element of the document
    function calculateRootRect(element) {
        const rootElem = getRootElem(element);
        const scrollPos = getScrollPos(element);
        const body = element.ownerDocument ? element.ownerDocument.body : null;

        const scrollWidth = Math.max(rootElem.scrollWidth, rootElem.clientWidth, body ? body.scrollWidth : 0, body ? body.clientWidth : 0);
        const scrollHeight = Math.max(rootElem.scrollHeight, rootElem.clientHeight, body ? body.scrollHeight : 0, body ? body.clientHeight : 0);
        
        let xOffset = -scrollPos.scrollLeft + getHPos(element);
        let yOffset = -scrollPos.scrollTop;

        if (getStyle(body || rootElem).direction === "rtl") {
            xOffset += Math.max(rootElem.clientWidth, body ? body.clientWidth : 0) - scrollWidth;
        }

        return rectEdges({
            width: scrollWidth,
            height: scrollHeight,
            x: xOffset,
            y: yOffset
        });
    }
 
    function getBoundingRect(element, clippingContext, boundary, offset) {
        // Determine the clipping parents or use the provided clipping context
        const getClippingParents = (el) => {
            const scrollableAncestors = getScrollableAncestor(findParent(el));
            const isPositionedElement = ["absolute", "fixed"].includes(getStyle(el).position);
            const actualElement = isPositionedElement && isHTMLElem(el) ? getAncElem(el) : el;

            return isElem(actualElement) 
                ? scrollableAncestors.filter(parent => 
                    isElem(parent) && checkContainsTree(parent, actualElement) && getNodeName(parent) !== "body")
                : [];
        };

        const clippingParents = clippingContext === "clippingParents" ? getClippingParents(element) : [].concat(clippingContext);
        const contexts = [...clippingParents, boundary];

        // Calculate the bounding rectangle based on the combined contexts
        const initialRect = getBounding(element, contexts[0], offset);
        const boundingRect = contexts.reduce((rect, context) => {
            const currentRect = getBounding(element, context, offset);

            return {
                top: Math.max(currentRect.top, rect.top),
                right: Math.min(currentRect.right, rect.right),
                bottom: Math.min(currentRect.bottom, rect.bottom),
                left: Math.max(currentRect.left, rect.left)
            };
        }, initialRect);

        // Compute the width, height, x, and y of the final bounding rectangle
        boundingRect.width = boundingRect.right - boundingRect.left;
        boundingRect.height = boundingRect.bottom - boundingRect.top;
        boundingRect.x = boundingRect.left;
        boundingRect.y = boundingRect.top;
        return boundingRect;
    }
    function set0Defaults(elem) {
        return Object.assign({}, {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        }, elem)
    }
    function createObjectWithKeys(value, keys) {
        return keys.reduce((result, key) => {
            result[key] = value;
            return result;
        }, {});
    }
    function calcPopperOffset(elem, options = {}) {
    // Destructure and set default values for options
    const {
        placement = elem.placement,
        strategy = elem.strategy,
        boundary = clipPs,
        rootBoundary = viewp,
        elementContext = strpopper,
        altBoundary = false,
        padding = 0
    } = options;

    // Set padding with default values if needed
    const paddingValues = typeof padding === 'number' ? 
        set0Defaults(createObjectWithKeys(padding, posarr)) : 
        set0Defaults(padding);

    // Determine the context element and alternative boundary
    const contextElement = altBoundary ? 
        (elementContext === strpopper ? strreference : strpopper) : 
        elementContext;

    // Retrieve elements and compute their bounding rectangles
    const popperRect = elem.rects.popper;
    const referenceElement = elem.elements[contextElement];
    const boundaryRect = getBoundingRect(
        isElem(referenceElement) ? referenceElement : referenceElement.contextElement || getRootElem(elem.elements.popper),
        boundary,
        rootBoundary,
        strategy
    );

    // Get the position and size of the reference element
    const referenceRect = getPosSize(elem.elements.reference);

    // Calculate element position and offsets
    const elementPos = calcElpos({
        reference: referenceRect,
        element: popperRect,
        strategy: "absolute",
        placement
    });

    const adjustedRect = rectEdges({ ...popperRect, ...elementPos });
    const referenceOrPopperRect = elementContext === strpopper ? adjustedRect : referenceRect;

    // Calculate offsets with padding
    const offsets = {
        top: boundaryRect.top - referenceOrPopperRect.top + paddingValues.top,
        bottom: referenceOrPopperRect.bottom - boundaryRect.bottom + paddingValues.bottom,
        left: boundaryRect.left - referenceOrPopperRect.left + paddingValues.left,
        right: referenceOrPopperRect.right - boundaryRect.right + paddingValues.right
    };

    // Adjust offsets based on modifiers data
    const offsetModifier = elem.modifiersData.offset;
    if (elementContext === strpopper && offsetModifier) {
        const modifierOffset = offsetModifier[placement];
        Object.keys(offsets).forEach((key) => {
            const isVertical = [posright, posbottom].includes(key);
            const direction = [postop, posbottom].includes(key) ? 'y' : 'x';
            offsets[key] += modifierOffset[direction] * (isVertical ? 1 : -1);
        });
    }

    return offsets;
    }


    const popperFlip = {
        name: "flip",
        enabled: true,
        phase: "main",
        fn: function (data) {
            const { state, options, name } = data;
            const modifiersData = state.modifiersData[name];
    
            // Skip if the flip modifier is marked to be skipped
            if (modifiersData._skip) return;
    
            // Destructure options
            const {
                mainAxis = true,
                altAxis = true,
                fallbackPlacements,
                padding = 0,
                boundary = clipPs,
                rootBoundary = viewp,
                altBoundary = false,
                flipVariations = true,
                allowedAutoPlacements = []
            } = options;
    
            // Get the placement from state or use default
            const placement = state.options.placement;
            const basePlacement = splitHyph0(placement);
    
            // Determine fallback placements
            const fallback = fallbackPlacements || (basePlacement === placement || !flipVariations
                ? [flipOppositePos(placement)]
                : getFlipVariations(placement));
    
            // Combine base placement with fallback placements
            const placements = [placement, ...fallback];
            const placementsToTry = placements.reduce((acc, currentPlacement) => {
                const base = splitHyph0(currentPlacement);
                const autoPlacements = base === posauto
                    ? getAutoPlacements(currentPlacement, {
                        boundary,
                        rootBoundary,
                        padding,
                        flipVariations,
                        allowedAutoPlacements
                    })
                    : [currentPlacement];
    
                return [...acc, ...autoPlacements];
            }, []);
    
            const { reference, popper } = state.rects;
            const popperRect = popper;
            const referenceRect = reference;
            const placementMap = new Map();
            let bestPlacement = placements[0];
            let isPlacementFound = true;
    
            for (const currentPlacement of placementsToTry) {
                const base = splitHyph0(currentPlacement);
                const isVertical = [postop, posbottom].includes(base);
                const dimension = isVertical ? "width" : "height";
                const offset = calcPopperOffset(state, {
                    placement: currentPlacement,
                    boundary,
                    rootBoundary,
                    altBoundary,
                    padding
                });
                const flippedPlacement = flipOppositePos(base);
                const flippedAltPlacement = flipOppositePos(flippedPlacement);
    
                const autoPlacement = getAutoPlacement({
                    isVertical,
                    base,
                    flippedPlacement,
                    flippedAltPlacement,
                    offset,
                    popperRect,
                    referenceRect
                });
    
                const criteria = [
                    mainAxis && offset[base] <= 0,
                    altAxis && (offset[autoPlacement] <= 0 || offset[flippedAltPlacement] <= 0)
                ];
    
                if (criteria.every(Boolean)) {
                    bestPlacement = currentPlacement;
                    isPlacementFound = false;
                    break;
                }
    
                placementMap.set(currentPlacement, criteria);
            }
    
            if (isPlacementFound) {
                for (let i = flipVariations ? 3 : 1; i > 0; i--) {
                    const foundPlacement = placements.find(p => {
                        const criteria = placementMap.get(p);
                        return criteria && criteria.slice(0, i).every(Boolean);
                    });
    
                    if (foundPlacement) {
                        bestPlacement = foundPlacement;
                        break;
                    }
                }
            }
    
            if (state.placement !== bestPlacement) {
                modifiersData._skip = true;
                state.placement = bestPlacement;
                state.reset = true;
            }
        },
        requiresIfExists: ["offset"],
        data: {
            _skip: false
        }
    };
    
    // Utility functions
    function getFlipVariations(placement) {
        if (splitHyph0(placement) === posauto) return [];
        const opposite = flipOppositePos(placement);
        return [flipOppositeStartEnd(placement), opposite, flipOppositeStartEnd(opposite)];
    }
    
    function getAutoPlacements(placement, options) {
        const {
            boundary,
            rootBoundary,
            padding,
            flipVariations,
            allowedAutoPlacements
        } = options;
    
        const base = splitHyph0(placement);
        const variation = splitHyph1(placement);
        const autoPlacements = base ? (flipVariations ? strposarr : strposarr.filter(v => splitHyph1(v) === variation)) : posarr;
    
        let placements = autoPlacements.filter(p => allowedAutoPlacements.includes(p));
        if (placements.length === 0) placements = autoPlacements;
    
        const placementScores = placements.reduce((scores, p) => {
            scores[p] = calcPopperOffset(state, {
                placement: p,
                boundary,
                rootBoundary,
                padding
            })[base];
            return scores;
        }, {});
    
        return Object.keys(placementScores).sort((a, b) => placementScores[a] - placementScores[b]);
    }
    
    function getAutoPlacement({ isVertical, base, flippedPlacement, flippedAltPlacement, offset, popperRect, referenceRect }) {
        const isHorizontal = !isVertical;
        const placement = isHorizontal ? (isVertical ? posright : posleft) : (isVertical ? posbottom : postop);
        return popperRect[isVertical ? "width" : "height"] > referenceRect[isVertical ? "width" : "height"]
            ? flipOppositePos(placement)
            : placement;
    }
    
    
    const popperPreventOverflow = {
        name: "preventOverflow",
        enabled: true,
        phase: "main",
        fn: function (data) {
            const { state, options, name } = data;
            const { 
                mainAxis = true, 
                altAxis = false, 
                boundary = clipPs, 
                rootBoundary = viewp, 
                altBoundary = false, 
                padding = 0, 
                tether = true, 
                tetherOffset = 0 
            } = options;
    
            const offsets = calcPopperOffset(state, {
                boundary,
                rootBoundary,
                padding,
                altBoundary
            });
    
            const placement = state.options.placement;
            const basePlacement = splitHyph0(placement);
            const variation = splitHyph1(placement);
    
            const isHorizontal = getAxis(basePlacement) === "x";
            const oppositeAxis = isHorizontal ? "y" : "x";
            const size = isHorizontal ? "width" : "height";
            
            const popperOffsets = state.modifiersData.popperOffsets;
            const referenceRect = state.rects.reference;
            const popperRect = state.rects.popper;
    
            const offset = typeof tetherOffset === "function" 
                ? tetherOffset({ ...state.rects, placement }) 
                : tetherOffset;
    
            const tetherOffsetValue = typeof offset === "number" 
                ? { mainAxis: offset, altAxis: offset }
                : { mainAxis: 0, altAxis: 0, ...offset };
    
            const currentOffset = state.modifiersData.offset ? state.modifiersData.offset[placement] : null;
    
            const adjustments = { x: 0, y: 0 };
    
            if (popperOffsets) {
                if (mainAxis) {
                    adjustMainAxis();
                }
                if (altAxis) {
                    adjustAltAxis();
                }
                state.modifiersData[name] = adjustments;
            }
    
            function adjustMainAxis() {
                const start = isHorizontal ? posleft : postop;
                const end = isHorizontal ? posright : posbottom;
                const sizeProperty = size;
                const popperSize = popperOffsets[isHorizontal ? "x" : "y"];
                const boundaryStart = popperSize + offsets[start];
                const boundaryEnd = popperSize - offsets[end];
                const tetherOffsetAdjust = tether ? -popperRect[sizeProperty] / 2 : 0;
                const referenceSize = variation === posstart ? referenceRect[sizeProperty] : popperRect[sizeProperty];
                const boundaryAdjustment = variation === posstart ? -popperRect[sizeProperty] : -referenceRect[sizeProperty];
                
                const arrowElement = state.elements.arrow;
                const arrowSize = arrowElement ? getAdjustedPositionAndSize(arrowElement) : { width: 0, height: 0 };
                const arrowPadding = state.modifiersData["arrow#persistent"] ? state.modifiersData["arrow#persistent"].padding : { top: 0, right: 0, bottom: 0, left: 0 };
                const arrowPaddingStart = arrowPadding[start];
                const arrowPaddingEnd = arrowPadding[end];
    
                const availableSpace = inRange(0, referenceRect[sizeProperty], arrowSize[sizeProperty]);
                const offsetAdjustment = variation === posstart 
                    ? referenceRect[sizeProperty] / 2 - tetherOffsetAdjust - availableSpace - arrowPaddingStart - tetherOffsetValue.mainAxis 
                    : referenceSize - availableSpace - arrowPaddingStart - tetherOffsetValue.mainAxis;
    
                const maxOverflow = variation === posstart 
                    ? -referenceRect[sizeProperty] / 2 + tetherOffsetAdjust + availableSpace + arrowPaddingEnd + tetherOffsetValue.mainAxis 
                    : boundaryAdjustment + availableSpace + arrowPaddingEnd + tetherOffsetValue.mainAxis;
    
                const offsetBase = popperOffsets[isHorizontal ? "x" : "y"];
                const offsetBound = inRange(
                    tether ? Math.min(boundaryStart, offsetBase + offsetAdjustment - (state.elements.arrow ? getAncElem(state.elements.arrow).clientTop || 0 : 0)) : boundaryStart,
                    offsetBase,
                    tether ? Math.max(boundaryEnd, offsetBase + offsetAdjustment - (state.elements.arrow ? getAncElem(state.elements.arrow).clientTop || 0 : 0)) : boundaryEnd
                );
    
                popperOffsets[isHorizontal ? "x" : "y"] = offsetBound;
                adjustments[isHorizontal ? "x" : "y"] = offsetBound - offsetBase;
            }
    
            function adjustAltAxis() {
                const start = isHorizontal ? postop : posleft;
                const end = isHorizontal ? posbottom : posright;
                const popperSize = popperOffsets[oppositeAxis];
                const boundaryStart = popperSize + offsets[start];
                const boundaryEnd = popperSize - offsets[end];
    
                const isVertical = [postop, posleft].includes(basePlacement);
                const currentOffset = currentOffset ? currentOffset[oppositeAxis] : 0;
    
                const availableSpace = isVertical 
                    ? inRange(popperSize, popperSize, boundaryStart) 
                    : inRange(popperSize, boundaryStart, boundaryEnd);
    
                const offsetBound = inRange(
                    tether && isVertical ? Math.max(boundaryStart, popperSize + boundaryStart - currentOffset - tetherOffsetValue.altAxis) : boundaryStart,
                    popperSize,
                    tether ? Math.min(boundaryEnd, popperSize + boundaryEnd - currentOffset - tetherOffsetValue.altAxis) : boundaryEnd
                );
    
                popperOffsets[oppositeAxis] = offsetBound;
                adjustments[oppositeAxis] = offsetBound - popperSize;
            }
        },
        requiresIfExists: ["offset"]
    };
    
    const popperArrow = {
        name: "arrow",
        enabled: true,
        phase: "main",
        fn: function ({ state, name, options }) {
            const arrowElement = state.elements.arrow;
            const popperOffsets = state.modifiersData.popperOffsets;
            const placementBase = splitHyph0(state.placement);
            const axis = getAxis(placementBase);
            const size = [posleft, posright].includes(placementBase) ? "height" : "width";
    
            if (arrowElement && popperOffsets) {
                const padding = hgetPadding(options.padding, state);
                const arrowSize = getAdjustedPositionAndSize(arrowElement);
                const mainAxis = axis === "y" ? postop : posleft;
                const altAxis = axis === "y" ? posbottom : posright;
    
                const referenceSize = state.rects.reference[size];
                const referenceOffset = state.rects.reference[axis];
                const popperSize = state.rects.popper[size];
    
                const availableSpace = referenceSize + referenceOffset - popperOffsets[axis] - popperSize;
                const offsetAdjustment = popperOffsets[axis] - referenceOffset;
    
                const arrowContainer = getAncElem(arrowElement);
                const containerSize = arrowContainer
                    ? axis === "y" ? arrowContainer.clientHeight || 0 : arrowContainer.clientWidth || 0
                    : 0;
    
                const offsetFromCenter = availableSpace / 2 - offsetAdjustment / 2;
                const paddingStart = padding[mainAxis];
                const paddingEnd = padding[altAxis];
                const containerCenter = containerSize / 2;
                const arrowCenter = containerCenter - arrowSize[size] / 2 + offsetFromCenter;
    
                const constrainedOffset = inRange(paddingStart, arrowCenter, containerSize - arrowSize[size] - paddingEnd);
    
                // Update modifiers data with calculated values
                state.modifiersData[name] = {
                    [axis]: constrainedOffset,
                    centerOffset: constrainedOffset - arrowCenter
                };
            }
        },
        effect: function ({ state, options }) {
            const arrowSelector = options.element || "[data-popper-arrow]";
            const arrowElement = typeof arrowSelector === "string"
                ? state.elements.popper.querySelector(arrowSelector)
                : arrowSelector;
    
            if (arrowElement && checkContainsTree(state.elements.popper, arrowElement)) {
                state.elements.arrow = arrowElement;
            }
        },
        requires: ["popperOffsets"],
        requiresIfExists: ["preventOverflow"]
    };
    
    // Helper Functions
    
    function hgetPadding(padding, state) {
        if (typeof padding === "function") {
            padding = padding({ ...state.rects, placement: state.placement });
        }
    
        return set0Defaults(
            typeof padding === "number" ? createObjectWithKeys(padding, posarr) : padding
        );
    }
    function adjustBoundingBoxPositions(box, size, offset = { x: 0, y: 0 }) {
            // Calculate new positions adjusted by the size and offset
        return {
            top: box.top - size.height - offset.y,
            right: box.right - size.width + offset.x,
            bottom: box.bottom - size.height + offset.y,
            left: box.left - size.width - offset.x
        };
    }
    function checkPosKeys(elem) {
        // Array of position keys that we want to check
        const positions = [postop, posright, posbottom, posleft];

        // Check if any of the values corresponding to these keys are non-negative
        return positions.some(function(position) {
            return elem[position] >= 0;
        });
    }
    var ppInstance = managePopper({
        defaultModifiers: [
            {
                name: "eventListeners",
                enabled: true,
                phase: "write",
                fn: function() {}, // Empty function as placeholder
                effect: function(context) {
                    var state = context.state;
                    var instance = context.instance;
                    var options = context.options;
    
                    // Determine if scroll and resize listeners are enabled
                    var scrollEnabled = options.scroll !== undefined ? options.scroll : true;
                    var resizeEnabled = options.resize !== undefined ? options.resize : true;
    
                    // Get the window object for the popper
                    var windowObject = getWindow(state.elements.popper);
    
                    // Combine scroll parents of reference and popper
                    var scrollParents = [].concat(state.scrollParents.reference, state.scrollParents.popper);
    
                    // Add scroll and resize event listeners if enabled
                    if (scrollEnabled) {
                        scrollParents.forEach((parent) => {
                            parent.addEventListener("scroll", instance.update, { passive: true });
                        });
                    }
    
                    if (resizeEnabled) {
                        windowObject.addEventListener("resize", instance.update, { passive: true });
                    }
    
                    // Return cleanup function to remove event listeners
                    return function() {
                        if (scrollEnabled) {
                            scrollParents.forEach((parent) => {
                                parent.removeEventListener("scroll", instance.update, { passive: true });
                            });
                        }
    
                        if (resizeEnabled) {
                            windowObject.removeEventListener("resize", instance.update, { passive: true });
                        }
                    };
                },
                data: {}
            },
            {
                name: "popperOffsets",
                enabled: true,
                phase: "read",
                fn: function(context) {
                    var state = context.state;
                    var modifierName = context.name;
    
                    // Calculate popper offsets
                    state.modifiersData[modifierName] = calcElpos({
                        reference: state.rects.reference,
                        element: state.rects.popper,
                        strategy: "absolute",
                        placement: state.placement
                    });
                },
                data: {}
            },
            {
                name: "computeStyles",
                enabled: true,
                phase: "beforeWrite",
                fn: function(context) {
                    var state = context.state;
                    var options = context.options;
    
                    // Determine various style options
                    var gpuAcceleration = options.gpuAcceleration !== undefined ? options.gpuAcceleration : true;
                    var adaptive = options.adaptive !== undefined ? options.adaptive : true;
                    var roundOffsets = options.roundOffsets !== undefined ? options.roundOffsets : true;
    
                    // Style context object
                    var styleContext = {
                        placement: splitHyph0(state.placement),
                        variation: splitHyph1(state.placement),
                        popper: state.elements.popper,
                        popperRect: state.rects.popper,
                        gpuAcceleration: gpuAcceleration,
                        isFixed: state.options.strategy === "fixed"
                    };
    
                    // Apply styles for popper
                    if (state.modifiersData.popperOffsets != null) {
                        state.styles.popper = Object.assign(
                            {},
                            state.styles.popper,
                            popperPosStyles(
                                Object.assign({}, styleContext, {
                                    offsets: state.modifiersData.popperOffsets,
                                    position: state.options.strategy,
                                    adaptive: adaptive,
                                    roundOffsets: roundOffsets
                                })
                            )
                        );
                    }
    
                    // Apply styles for arrow if present
                    if (state.modifiersData.arrow != null) {
                        state.styles.arrow = Object.assign(
                            {},
                            state.styles.arrow,
                            popperPosStyles(
                                Object.assign({}, styleContext, {
                                    offsets: state.modifiersData.arrow,
                                    position: "absolute",
                                    adaptive: false,
                                    roundOffsets: roundOffsets
                                })
                            )
                        );
                    }
    
                    // Update popper attributes with placement information
                    state.attributes.popper = Object.assign({}, state.attributes.popper, {
                        "data-popper-placement": state.placement
                    });
                },
                data: {}
            },
            confObjSty, // Other modifiers presumably defined elsewhere
            offsetModifier, 
            popperFlip, 
            popperPreventOverflow, 
            popperArrow,
            {
                name: "hide",
                enabled: true,
                phase: "main",
                requiresIfExists: ["preventOverflow"],
                fn: function(context) {
                    var state = context.state;
                    var modifierName = context.name;
    
                    // Extract reference and popper rects
                    var referenceRect = state.rects.reference;
                    var popperRect = state.rects.popper;
    
                    // Retrieve prevent overflow data if available
                    var preventOverflowData = state.modifiersData.preventOverflow;
    
                    // Calculate clipping offsets
                    var referenceClippingOffsets = calcPopperOffset(state, { elementContext: "reference" });
                    var popperClippingOffsets = calcPopperOffset(state, { altBoundary: true });
    
                    // Adjust bounding box positions
                    var adjustedReference = adjustBoundingBoxPositions(referenceClippingOffsets, referenceRect);
                    var adjustedPopper = adjustBoundingBoxPositions(popperClippingOffsets, popperRect, preventOverflowData);
    
                    // Determine hidden and escaped states
                    var isReferenceHidden = checkPosKeys(adjustedReference);
                    var hasPopperEscaped = checkPosKeys(adjustedPopper);
    
                    // Store hide data in modifiersData
                    state.modifiersData[modifierName] = {
                        referenceClippingOffsets: adjustedReference,
                        popperEscapeOffsets: adjustedPopper,
                        isReferenceHidden: isReferenceHidden,
                        hasPopperEscaped: hasPopperEscaped
                    };
    
                    // Update popper attributes with hidden and escaped states
                    state.attributes.popper = Object.assign({}, state.attributes.popper, {
                        "data-popper-reference-hidden": isReferenceHidden,
                        "data-popper-escaped": hasPopperEscaped
                    });
                }
            }
        ]
    });
    
    
    
    // Function returning document body
    var dbody = () => {
        return document.body;
    };
    
 
    /* TODO CHECK RAUSGENOMMEN */
    /*
    // Define element class names
    var contentClass = "tippy-content";
    var backdropClass = "tippy-backdrop";
    var arrowClass = "tippy-arrow";
    var svgArrowClass = "tippy-svg-arrow";
    
    // Event options
    var eventOptions = {
        passive: true,
        capture: true
    };



    function Pt(e, t) {
        
        e[Ut()] = t
    }
        
    function jt(e) {
        alert("jier");
        var t = createDiv();
        return !0 === e ? t.className = dt : (t.className = lt,
        isElemOrFrgmnt(e) ? t.appendChild(e) : Pt(t, e)),
        t
    }
    function Vt(e, t) {
        isElemOrFrgmnt(t.content) ? (Pt(e, ""),
        e.appendChild(t.content)) : "function" != typeof t.content && (t.allowHTML ? Pt(e, t.content) : e.textContent = t.content)
    }
    
    function zt(e) {
        
        var t = e.firstElementChild
          , n = conv2arr(t.children);
        return {
            box: t,
            content: n.find((function(e) {
                return e.classList.contains(at)
            }
            )),
            arrow: n.find((function(e) {
                return e.classList.contains(dt) || e.classList.contains(lt)
            }
            )),
            backdrop: n.find((function(e) {
                return e.classList.contains(rt)
            }
            ))
        }
    }
    function Wt(e) {
        
        var t = createDiv()
          , n = createDiv();
        n.className = "tippy-box",
        n.setAttribute("data-state", "hidden"),
        n.setAttribute("tabindex", "-1");
        var o = createDiv();
        function i(n, o) {
            var i = zt(t)
              , a = i.box
              , r = i.content
              , d = i.arrow;
            o.theme ? a.setAttribute("data-theme", o.theme) : a.removeAttribute("data-theme"),
            "string" == typeof o.animation ? a.setAttribute("data-animation", o.animation) : a.removeAttribute("data-animation"),
            o.inertia ? a.setAttribute("data-inertia", "") : a.removeAttribute("data-inertia"),
            a.style.maxWidth = "number" == typeof o.maxWidth ? o.maxWidth + "px" : o.maxWidth,
            o.role ? a.setAttribute("role", o.role) : a.removeAttribute("role"),
            n.content === o.content && n.allowHTML === o.allowHTML || Vt(r, e.props),
            o.arrow ? d ? n.arrow !== o.arrow && (a.removeChild(d),
            a.appendChild(jt(o.arrow))) : a.appendChild(jt(o.arrow)) : d && a.removeChild(d)
        }
        return o.className = at,
        o.setAttribute("data-state", "hidden"),
        Vt(o, e.props),
        t.appendChild(n),
        n.appendChild(o),
        i(e.props, e.props),
        {
            popper: t,
            onUpdate: i
        }
    }

    
    Wt.$$tippy = true;
    
    


    function createTippyInstance(referenceElement, options) {
        alert("createTippyInstance");
        const config = configureTippyOptions(referenceElement, {
            ...$t,
            ...mergePluginDefaults(filterUndefinedProperties(options))
        });
    
        let clearTimeouts = null;
        let animationFrameRequest = null;
        let hasBeenShown = false;
        let hasBeenInteracted = false;
        const eventHandlers = [];
        const debouncedMouseMoveHandler = debounceFunc(handleMouseMove, config.interactiveDebounce);
        const instanceId = Gt++;
        
        // Unique plugins setup
        const uniquePlugins = [...new Set(config.plugins)];
    
        // Initial setup of the Tippy instance
        const tippyInstance = {
            id: instanceId,
            reference: referenceElement,
            popper: createDiv(),
            popperInstance: null,
            props: config,
            state: {
                isEnabled: true,
                isVisible: false,
                isDestroyed: false,
                isMounted: false,
                isShown: false
            },
            plugins: uniquePlugins,
            clearDelayTimeouts: function() {
                clearTimeout(clearTimeouts);
                cancelAnimationFrame(animationFrameRequest);
            },
            setProps: function(newProps) {
                if (tippyInstance.state.isDestroyed) return;
                triggerEvent("onBeforeUpdate", [tippyInstance, newProps]);
    
                const updatedProps = configureTippyOptions(referenceElement, {
                    ...tippyInstance.props,
                    ...filterUndefinedProperties(newProps),
                    ignoreAttributes: true
                });
    
                tippyInstance.props = updatedProps;
                applyStyles();
                adjustInteractiveDebounce(updatedProps);
    
                // Update attributes and DOM as needed
                handleAttributesUpdate(updatedProps);
                triggerEvent("onAfterUpdate", [tippyInstance, newProps]);
            },
            setContent: function(content) {
                this.setProps({ content });
            },
            show: function() {
                if (tippyInstance.state.isVisible || tippyInstance.state.isDestroyed || !tippyInstance.state.isEnabled || 
                    (TouchDetection.isTouch && !tippyInstance.props.touch)) {
                    return;
                }
    
                if (T().hasAttribute("disabled")) return;
    
                triggerEvent("onShow", [tippyInstance]);
    
                if (tippyInstance.props.onShow(tippyInstance) === false) return;
    
                tippyInstance.state.isVisible = true;
                updateVisibility("visible");
    
                if (!tippyInstance.state.isMounted) {
                    applyNoTransition();
                }
    
                setupTransition();
                setTransitionDurations();
    
                clearTimeouts = setTimeout(() => {
                    if (tippyInstance.state.isVisible && !hasBeenInteracted) {
                        hasBeenInteracted = true;
                        tippyInstance.props.animation && applyAnimation();
                    }
                }, 0);
    
                mountPopper();
                addEventListeners();
            },
            hide: function() {
                if (!tippyInstance.state.isVisible || tippyInstance.state.isDestroyed || !tippyInstance.state.isEnabled) {
                    return;
                }
    
                triggerEvent("onHide", [tippyInstance]);
    
                if (tippyInstance.props.onHide(tippyInstance) === false) return;
    
                tippyInstance.state.isVisible = false;
                tippyInstance.state.isShown = false;
                hasBeenInteracted = false;
    
                updateVisibility("hidden");
                clearTimeouts = setTimeout(() => {
                    if (tippyInstance.state.isVisible) {
                        hidePopper();
                    }
                }, getHideDelay());
            },
            hideWithInteractivity: function(event) {
                addEventListenersForInteractivity();
                debouncedMouseMoveHandler(event);
            },
            enable: function() {
                tippyInstance.state.isEnabled = true;
            },
            disable: function() {
                tippyInstance.hide();
                tippyInstance.state.isEnabled = false;
            },
            unmount: function() {
                if (tippyInstance.state.isVisible) {
                    tippyInstance.hide();
                }
    
                if (!tippyInstance.state.isMounted) return;
    
                removeEventListeners();
                if (tippyInstance.popper.parentNode) {
                    tippyInstance.popper.parentNode.removeChild(tippyInstance.popper);
                }
                Xt = Xt.filter(instance => instance !== tippyInstance);
                tippyInstance.state.isMounted = false;
                triggerEvent("onHidden", [tippyInstance]);
            },
            destroy: function() {
                if (tippyInstance.state.isDestroyed) return;
    
                tippyInstance.clearDelayTimeouts();
                tippyInstance.unmount();
                z();
                delete referenceElement._tippy;
                tippyInstance.state.isDestroyed = true;
                triggerEvent("onDestroy", [tippyInstance]);
            }
        };
    
        if (config.render) {
            const { popper, onUpdate } = config.render(tippyInstance);
            popper.setAttribute("data-tippy-root", "");
            popper.id = `tippy-${tippyInstance.id}`;
            tippyInstance.popper = popper;
            referenceElement._tippy = tippyInstance;
            popper._tippy = tippyInstance;
    
            const pluginInstances = uniquePlugins.map(plugin => plugin.fn(tippyInstance));
            const ariaExpanded = referenceElement.hasAttribute("aria-expanded");
    
            applyStyles();
            setupInitialEvents();
    
            triggerEvent("onCreate", [tippyInstance]);
    
            if (config.showOnCreate) {
                tippyInstance.show();
            }
    
            popper.addEventListener("mouseenter", () => {
                if (tippyInstance.props.interactive && tippyInstance.state.isVisible) {
                    tippyInstance.clearDelayTimeouts();
                }
            });
    
            popper.addEventListener("mouseleave", () => {
                if (tippyInstance.props.interactive && tippyInstance.props.trigger.includes("mouseenter")) {
                    addEventListenersForInteractivity();
                }
            });
        }
    
        // Helper Functions
        function triggerEvent(eventName, args = [], defaultReturn = true) {
            pluginInstances.forEach(plugin => {
                if (plugin[eventName]) plugin[eventName](...args);
            });
    
            if (defaultReturn && tippyInstance.props[eventName]) {
                return tippyInstance.props[eventName](...args);
            }
        }
    
        function updateVisibility(visibility) {
            if (R()) {
                tippyInstance.popper.style.visibility = visibility;
            }
        }
    
        function applyNoTransition() {
            tippyInstance.popper.style.transition = "none";
        }
    
        function setupTransition() {
            if (R() && tippyInstance.props.animation) {
                const { box, content } = O();
                setTransitionDurations([box, content], 0);
                updateElemState([box, content], "visible");
            }
        }
    
        function setTransitionDurations(elements, duration = 0) {
            elements.forEach(element => {
                if (element) {
                    element.style.transitionDuration = `${duration}ms`;
                }
            });
        }
    
        function applyAnimation() {
            const { box, content } = O();
            setTransitionDurations([box, content], config.duration);
            updateElemState([box, content], "visible");
            requestAnimationFrame(() => {
                tippyInstance.state.isShown = true;
                triggerEvent("onShown", [tippyInstance]);
            });
        }
    
        function mountPopper() {
            const appendTo = getAppendTo();
            if (!appendTo.contains(tippyInstance.popper)) {
                appendTo.appendChild(tippyInstance.popper);
            }
            tippyInstance.state.isMounted = true;
        }
    
        function getAppendTo() {
            return tippyInstance.props.appendTo === "parent" ? T().parentNode : callOrReturn(tippyInstance.props.appendTo, [T()]);
        }
    
        function addEventListeners() {
            const triggerEvents = tippyInstance.props.trigger.split(/\s+/).filter(Boolean);
            triggerEvents.forEach(event => {
                if (event !== "manual") {
                    addEventListenerForTrigger(event);
                }
            });
        }
    
        function addEventListenerForTrigger(event) {
            switch (event) {
                case "mouseenter":
                    addEventListener("mouseleave", handleMouseLeave);
                    break;
                case "focus":
                    addEventListener("focusout", handleFocusOut);
                    break;
                case "focusin":
                    addEventListener("focusout", handleFocusOut);
                    break;
                default:
                    addEventListener(event, handleEvent);
            }
        }
    
        function handleEvent(event) {
            if (tippyInstance.state.isEnabled && !shouldIgnoreEvent(event)) {
                const isFocusEvent = event.type === "focus";
                a = event;
                l = event.currentTarget;
    
                updateAttributes();
                handleVisibility(event);
                if (event.type === "click" && (tippyInstance.props.trigger.includes("mouseenter") || u)) {
                    handleClick(event);
                }
            }
        }
    
        function shouldIgnoreEvent(event) {
            return Y(event) || hasBeenInteracted;
        }
    
        function handleVisibility(event) {
            if (event.type === "click") {
                const shouldHide = tippyInstance.props.hideOnClick;
                if (shouldHide && tippyInstance.state.isVisible) {
                    tippyInstance.hide();
                } else {
                    tippyInstance.show();
                }
            }
        }
    
        function handleClick(event) {
            if (tippyInstance.props.trigger.includes("click")) {
                tippyInstance.show();
            }
        }
    
        function handleMouseMove(event) {
            if (shouldHandleMouseMove(event)) {
                const poppers = Z().concat(tippyInstance.popper).map(getPopperInfo).filter(Boolean);
                const shouldHide = !isWithinInteractiveArea(event, poppers);
                if (shouldHide) {
                    tippyInstance.hide();
                }
            }
        }
    
        function isWithinInteractiveArea(event, poppers) {
            return poppers.some(popper => {
                const { left, top, right, bottom } = popper.getBoundingClientRect();
                return event.clientX >= left && event.clientX <= right && event.clientY >= top && event.clientY <= bottom;
            });
        }
    
        function addEventListenersForInteractivity() {
            tippyInstance.popper.addEventListener("mouseenter", handleMouseEnter);
            tippyInstance.popper.addEventListener("mouseleave", handleMouseLeave);
        }
    
        function removeEventListeners() {
            eventHandlers.forEach(({ event, handler }) => {
                referenceElement.removeEventListener(event, handler);
            });
        }
    
        function handleMouseEnter() {
            clearTimeouts();
        }
    
        function handleMouseLeave() {
            if (tippyInstance.props.interactive) {
                tippyInstance.hide();
            }
        }
    
        function handleFocusOut(event) {
            if (!event.relatedTarget || !tippyInstance.popper.contains(event.relatedTarget)) {
                tippyInstance.hide();
            }
        }
    
        function updateAttributes() {
            // Custom logic to update attributes based on the current state
        }
    
        function filterUndefinedProperties(obj) {
            return Object.fromEntries(Object.entries(obj).filter(([_, value]) => value !== undefined));
        }
    
        function debounceFunc(func, delay) {
            let timeout;
            return function(...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func(...args), delay);
            };
        }
    
        function configureTippyOptions(reference, options) {
            // Custom logic to configure options
            return options;
        }
    
        function mergePluginDefaults(obj) {
            // Custom logic to merge plugin defaults
            return obj;
        }
    
        function createDiv() {
            return document.createElement("div");
        }
    
        function getPopperInfo(popper) {
            return popper.getBoundingClientRect();
        }
    
        function callOrReturn(func, args = []) {
            return typeof func === "function" ? func(...args) : func;
        }
    
        function getHideDelay() {
            return tippyInstance.props.hideOnClick ? 0 : tippyInstance.props.duration;
        }
    
        return tippyInstance;
    }
        */
    /* TODOEND CHECK RAUSGENOMMEN */
    
    function initializeTippyInstances(elements, options = {}) {
        // Combine default plugins with user-provided plugins
        const combinedPlugins = tippyDefProps.plugins.concat(options.plugins || []);
    
        // Event listeners for touch detection and window blur
        document.addEventListener("touchstart", initializeTouchDetection, st);
        window.addEventListener("blur", handleActiveElementBlur);
    
        // Prepare the configuration for each Tippy instance
        const config = {
            ...options,
            plugins: combinedPlugins
        };
    
        // Normalize the elements and create Tippy instances
        const tippyInstances = normalizeElems(elements).reduce((instances, element) => {
            const instance = element && createTippyInstance(element, config);
            if (instance) {
                instances.push(instance);
            }
            return instances;
        }, []);
    
        // Return the first instance if a single element is provided, otherwise return all instances
        return isElemOrFrgmnt(elements) ? tippyInstances[0] : tippyInstances;
    }
    
        
    initializeTippyInstances.defaultProps = tippyDefProps,
    initializeTippyInstances.setDefaultProps = function(e) {
        Object.keys(e).forEach((function(t) {
            tippyDefProps[t] = e[t]
        }
        ))
    }
    ,
    initializeTippyInstances.currentInput = TouchDetection;
    const styleModifier = {
        ...confObjSty,
        effect: function({ state }) {
            // Destructure state for easier access
            const { elements, options } = state;
    
            // Define the default styles for popper, arrow, and reference elements
            const defaultStyles = {
                popper: {
                    position: options.strategy,
                    left: "0",
                    top: "0",
                    margin: "0"
                },
                arrow: {
                    position: "absolute"
                },
                reference: {}
            };
    
            // Apply the default styles to the popper element
            Object.assign(elements.popper.style, defaultStyles.popper);
    
            // Assign the styles to the state
            state.styles = defaultStyles;
    
            // Apply the default styles to the arrow element if it exists
            if (elements.arrow) {
                Object.assign(elements.arrow.style, defaultStyles.arrow);
            }
        }
    };
    
    initializeTippyInstances.setDefaultProps({
        render: initializeTippyInstances
    });
    const tippyInstances = initializeTippyInstances;

    

    /**
     * Retrieves a voice navigation command or its associated number based on input.
     *
     * @param {string} type - The type of the command (e.g., "number").
     * @param {string} key - The key to look up in the voiceNavigationAliases.
     * @returns {string} The command or command with a number, based on the input type.
     */
    function getVoiceCommand(type, key) {
        const { voiceNavigationAliases, translation } = window.iniBfPreferences;

        // Return the original key if no alias is found
        if (!voiceNavigationAliases[key]) {
            return key;
        }

        // If the type is "number", append a random number to the command
        if (type === "number") {
            const randomIndex = Math.floor(Math.random() * 10); // Random number between 0 and 9
            return `${voiceNavigationAliases[key]} ${translation.voiceNavigationNumbers[randomIndex]}`;
        }

        // Return the alias for the key
        return voiceNavigationAliases[key];
    }

    /**
     * Toggles the "scroll-up-gradient" class on an element based on its position relative to a child container.
     *
     * @param {Event} event - The event object, which contains the target element.
     */
    function updateScrollGradient(event) {
        const targetElement = event.target;

        // Exit if the target element is not available
        if (!targetElement) return;

        // Find the child container within the target element
        const commandContainer = targetElement.querySelector(".ini-bf-voice-navigation-commands-container");

        // Exit if the child container is not found
        if (!commandContainer) return;

        // Compare the vertical position of the target element and the child container
        const isScrollingUp = targetElement.getBoundingClientRect().top > commandContainer.getBoundingClientRect().top;

        // Add or remove the "scroll-up-gradient" class based on the scroll direction
        if (isScrollingUp) {
            targetElement.classList.add("scroll-up-gradient");
        } else {
            targetElement.classList.remove("scroll-up-gradient");
        }
    }

    const {translation: on} = window.iniBfPreferences;

// QQQ

    
    
    /**
     * Initializes and manages the focus highlight effect for accessibility.
     */
    const focusHighlightManager = (() => {
        // Configuration values
        const margin = 0;
        const polygonWidth = 12;
        const polygonHeight = 8;

        // Settings object for the highlight
        const settings = {
            enabled: false,
            trigger: handleTrigger
        };

        // Handle trigger event to initialize or update the focus highlight
        function handleTrigger(element, target) {
            if (highlightElement) {
                updateHighlight();
            } else {
                initializeHighlight();
            }

            const start = calculatePosition(element);
            const end = calculatePosition(target);

            const distance = calculateDistance(start.left, start.top, end.left, end.top);
            const animationDuration = 50 * Math.cbrt(distance);

            animateHighlight(animationDuration);
        }

        // Initialize the focus highlight element
        function initializeHighlight() {
            const createSVG = () => {
                const svgElement = document.createElement("div");
                svgElement.innerHTML = `
                    <svg id="focus-snail_svg" width="1000" height="800">
                        <linearGradient id="focus-snail_gradient">
                            <stop id="focus-snail_start" offset="0%" stop-color="${highlightColor}" stop-opacity="0"/>
                            <stop id="focus-snail_middle" offset="80%" stop-color="${highlightColor}" stop-opacity="0.8"/>
                            <stop id="focus-snail_end" offset="100%" stop-color="${highlightColor}" stop-opacity="0"/>
                        </linearGradient>
                        <polygon id="focus-snail_polygon" fill="url(#focus-snail_gradient)"/>
                    </svg>
                `;
                return svgElement;
            };

            highlightElement = createSVG();
            svgPolygon = highlightElement.querySelector("#focus-snail_polygon");
            gradientStart = highlightElement.querySelector("#focus-snail_start");
            gradientMiddle = highlightElement.querySelector("#focus-snail_middle");
            gradientEnd = highlightElement.querySelector("#focus-snail_end");
            gradient = highlightElement.querySelector("#focus-snail_gradient");

            document.body.appendChild(highlightElement);
        }

        // Calculate position and size of an element
        function calculatePosition(element) {
            const rect = element.getBoundingClientRect();
            const scroll = getPageScroll();
            const top = rect.top + scroll.top - document.body.clientTop;
            const left = rect.left + scroll.left - document.body.clientLeft;

            return {
                left: left - margin,
                top: top - margin,
                width: Math.max(polygonWidth, element.offsetWidth) + 2 * margin,
                height: Math.max(polygonHeight, element.offsetHeight) + 2 * margin
            };
        }

        // Calculate distance between two points
        function calculateDistance(x1, y1, x2, y2) {
            const dx = x1 - x2;
            const dy = y1 - y2;
            return Math.sqrt(dx * dx + dy * dy);
        }

        // Animate the highlight effect
        function animateHighlight(duration) {
            let animationFrameId = 0;
            let animationInProgress = true;

            function animate() {
                const startTime = Date.now();

                function update() {
                    const elapsedTime = Date.now() - startTime;
                    const progress = Math.min(elapsedTime / duration, 1);

                    if (animationInProgress) {
                        updateHighlight(progress);

                        if (elapsedTime < duration) {
                            animationFrameId = requestAnimationFrame(update);
                        } else {
                            animationInProgress = false;
                        }
                    }
                }

                update();
            }

            animate();
        }

        // Update the highlight element based on the current progress
        function updateHighlight(progress) {
            const { left, top, width, height } = calculatePosition(targetElement);

            highlightElement.style.left = `${left}px`;
            highlightElement.style.top = `${top}px`;
            highlightElement.style.width = `${width}px`;
            highlightElement.style.height = `${height}px`;
            highlightElement.classList.add("focus-snail_visible");

            svgPolygon.setAttribute("offset", 100 * progress + "%");
            gradientMiddle.setAttribute("offset", 100 * progress + "%");

            if (progress >= 1) {
                resetHighlight();
            }
        }

        // Reset the highlight effect
        function resetHighlight() {
            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }

            highlightElement.classList.remove("focus-snail_visible");
        }

        // Get current page scroll position
        function getPageScroll() {
            return {
                top: window.pageYOffset || document.documentElement.scrollTop || 0,
                left: window.pageXOffset || document.documentElement.scrollLeft || 0
            };
        }

        // Set up event listeners for focus and blur
        document.documentElement.addEventListener("keydown", () => {
            if (settings.enabled) {
                lastInteractionTime = Date.now();
            }
        });

        document.documentElement.addEventListener("blur", (event) => {
            if (settings.enabled) {
                resetHighlight();
                focusedElement = (shouldHighlight() ? event.target : null);
            }
        }, true);

        document.documentElement.addEventListener("focus", (event) => {
            if (focusedElement && shouldHighlight()) {
                handleTrigger(focusedElement, event.target);
            }
        }, true);

        // Helper function to check if highlight should be triggered
        function shouldHighlight() {
            return Date.now() - lastInteractionTime < 42;
        }

        // Create and append the CSS style for the highlight effect
        const style = document.createElement("style");
        style.textContent = `
            #focus-snail_svg {
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                margin: 0;
                background: transparent;
                visibility: hidden;
                pointer-events: none;
                transform: translateZ(0);
            }
            #focus-snail_svg.focus-snail_visible {
                visibility: visible;
                z-index: 999;
            }
            #focus-snail_polygon {
                stroke-width: 0;
            }
        `;
        document.body.appendChild(style);

        // Initialize variables
        let highlightElement = null;
        let svgPolygon = null;
        let gradientStart = null;
        let gradientMiddle = null;
        let gradientEnd = null;
        let gradient = null;
        let targetElement = null;
        let lastInteractionTime = 0;
        let focusedElement = null;
        let animationFrameId = 0;

        // Return settings object
        return settings;
    })();

    
    let Ln = [];
    function markSettingsLoaded(e) {
        Ln.push(e)
    }
    function kn() {
        return Ln
    }
    
    /*
    TODO class _n {
    
    */    
    let Fn = (() => {
    //let Fn = function() {
        let e, t = {
            init: function() {
                let t = "on" === e.ignoreSavedConfig;
                const n = ["content_scaling", "font_sizing", "line_height", "letter_spacing"];
                hasIniBfStoreKey() && !t || e.startConfig && e.startConfig.forEach((t=>{
                    const o = t.includes("profile") ? `accessibility-${t}` : `action-${t}`
                      , i = `ini-bf-${o.replaceAll("_", "-")}`
                      , a = document.getElementById(i);
                    if (a)
                        if (n.includes(t)) {
                            const n = e[toCamelCase(t, "_", "start")] ? e[toCamelCase(t, "_", "start")] : 0;
                            let o = a.querySelector(".ini-bf-value");
                            o.dataset.value = n.toString(),
                            adjustableFunctions.setLabel(o, n);
                            const r = new CustomEvent("BfIniInSpinnerChanged",{
                                detail: {
                                    load: !0
                                }
                            });
                            o.dispatchEvent(r),
                            setConfStorage(i, o.dataset.value)
                        } else {
                            const e = getConfStorage(`ini-bf-${o.replaceAll("_", "-")}`);
                            JSON.parse(e) || a.click()
                        }
                }
                ))
            }
        }, a = {
            profiles: document.querySelectorAll("#ini-bf-accessibility-profiles-box .ini-bf-accessibility-profile-item"),
            init: function() {
                a.isProfiles && (this.profiles.forEach((e=>e.addEventListener("click", createDebouncedFunction(this.toggleProfile, 100)))),
                this.profiles.forEach((e=>e.addEventListener("keydown", createDebouncedFunction(this.toggleProfile, 100)))))
            },
            toggleProfile: function(e) {
                if ("keydown" === e.type && 13 !== e.keyCode)
                    return;
                let t = this.closest(".ini-bf-accessibility-profile-item")
                  , n = t.querySelector('input[type="checkbox"]');
                if (t.classList.contains("ini-bf-active")) {
                    t.classList.remove("ini-bf-active"),
                    n.checked = false,
                    setConfStorage(t.id, "0");
                    let e = t.id.replace("ini-bf-accessibility-profile-", "");
                    e = capitalizeWords(e, "-"),
                    e = e.replace("-", ""),
                    e = "profile" + e,
                    a[e](!1)
                } else {
                    let e = document.querySelector("#ini-bf-accessibility-profiles-box .ini-bf-accessibility-profile-item.ini-bf-active");
                    e && e.click(),
                    t.classList.add("ini-bf-active"),
                    n.checked = true,
                    setConfStorage(t.id, "1");
                    let o = t.id.replace("ini-bf-accessibility-profile-", "");
                    o = capitalizeWords(o, "-"),
                    o = o.replace("-", ""),
                    o = "profile" + o,
                    a[o](!0)
                }
            },
            loadSaved: function() {
                a.profiles.forEach((e=>{
                    "1" === getConfStorage(e.id) && (e.querySelector('input[type="checkbox"]').checked = true,
                    e.click())
                }
                ))
            },
            profileEpilepsy: function(e) {
                let t = "ini-bf-profile-epilepsy";
                if (e) {
                    document.body.classList.add(t);
                    let e = document.querySelector("#ini-bf-action-low-saturation:not(.ini-bf-active)");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-stop-animations:not(.ini-bf-active)");
                    n && n.click()
                } else {
                    document.body.classList.remove(t);
                    let e = document.querySelector("#ini-bf-action-low-saturation.ini-bf-active");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-stop-animations.ini-bf-active");
                    n && n.click()
                }
            },
            profileVisuallyImpaired: function(e) {
                let t = "ini-bf-profile-visually-handicapped";
                
                if (e) {
                    document.body.classList.add(t);
                    let e = document.querySelector("#ini-bf-action-readable-font:not(.ini-bf-active)");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-high-saturation:not(.ini-bf-active)");
                    n && n.click()
                } else {
                    document.body.classList.remove(t);
                    let e = document.querySelector("#ini-bf-action-readable-font.ini-bf-active");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-high-saturation.ini-bf-active");
                    n && n.click()
                }
            },
            profileCognitiveDisability: function(e) {
                let t = "ini-bf-profile-cognitive-disability";
                if (e) {
                    document.body.classList.add(t);
                    let e = document.querySelector("#ini-bf-action-highlight-titles:not(.ini-bf-active)");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-highlight-links:not(.ini-bf-active)");
                    n && n.click();
                    let o = document.querySelector("#ini-bf-action-stop-animations:not(.ini-bf-active)");
                    o && o.click()
                } else {
                    document.body.classList.remove(t);
                    let e = document.querySelector("#ini-bf-action-highlight-titles.ini-bf-active");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-highlight-links.ini-bf-active");
                    n && n.click();
                    let o = document.querySelector("#ini-bf-action-stop-animations.ini-bf-active");
                    o && o.click()
                }
            },
            profileAdhdFriendly: function(e) {
                let t = "ini-bf-profile-adhd-friendly";
                if (e) {
                    document.body.classList.add(t);
                    let e = document.querySelector("#ini-bf-action-high-saturation:not(.ini-bf-active)");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-stop-animations:not(.ini-bf-active)");
                    n && n.click();
                    let o = document.querySelector("#ini-bf-action-reading-mask:not(.ini-bf-active)");
                    o && o.click()
                } else {
                    document.body.classList.remove(t);
                    let e = document.querySelector("#ini-bf-action-high-saturation.ini-bf-active");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-stop-animations.ini-bf-active");
                    n && n.click();
                    let o = document.querySelector("#ini-bf-action-reading-mask.ini-bf-active");
                    o && o.click()
                }
            },
            profileBlindUsers: function(e) {
                let t = "ini-bf-profile-blind-users";
                if (e) {
                    document.body.classList.add(t);
                    let e = document.querySelector("#ini-bf-action-readable-font:not(.ini-bf-active)");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-virtual-keyboard:not(.ini-bf-active)");
                    n && n.click();
                    let o = document.querySelector("#ini-bf-action-text-to-speech:not(.ini-bf-active)");
                    o && o.click();
                    let i = document.querySelector("#ini-bf-action-keyboard-navigation:not(.ini-bf-active)");
                    i && i.click()
                } else {
                    document.body.classList.remove(t);
                    let e = document.querySelector("#ini-bf-action-readable-font.ini-bf-active");
                    e && e.click();
                    let n = document.querySelector("#ini-bf-action-virtual-keyboard.ini-bf-active");
                    n && n.click();
                    let o = document.querySelector("#ini-bf-action-text-to-speech.ini-bf-active");
                    o && o.click();
                    let i = document.querySelector("#ini-bf-action-keyboard-navigation.ini-bf-active");
                    i && i.click()
                }
            },
            isProfiles: function() {
                return !!(e.profileEpilepsy || e.profileVisuallyImpaired || e.profileCognitiveDisability || e.profileAdhdFriendly || e.profileBlindUsers)
            }
        }, alignLeft = {
            init: function() {
                document.querySelector("#ini-bf-action-align-left").addEventListener("iniBfTogglerChange", alignLeft.alignLeft);

            },
            alignLeft: function(e) {
                e.target.classList.contains("ini-bf-active") ? (alignLeft.disableOthers(),
                document.body.classList.add("ini-bf-align-left")
                ) : document.body.classList.remove("ini-bf-align-left")
            },
            disableOthers: function() {
                let e = document.getElementById("ini-bf-action-align-center");
                null !== e && e.classList.contains("ini-bf-active") && e.click();
                let t = document.getElementById("ini-bf-action-align-right");
                null !== t && t.classList.contains("ini-bf-active") && t.click()
            }
        }, alignRight = {
            init: function() {
                document.querySelector("#ini-bf-action-align-right").addEventListener("iniBfTogglerChange", alignRight.alignRight)
            },
            alignRight: function(e) {
                e.target.classList.contains("ini-bf-active") ? (alignRight.disableOthers(),
                document.body.classList.add("ini-bf-align-right")
                ) : document.body.classList.remove("ini-bf-align-right")
            },
            disableOthers: function() {
                let e = document.getElementById("ini-bf-action-align-center");
                null !== e && e.classList.contains("ini-bf-active") && e.click();
                let t = document.getElementById("ini-bf-action-align-left");
                null !== t && t.classList.contains("ini-bf-active") && t.click()
            }
        }, alignCenter = {
            init: function() {
                document.querySelector("#ini-bf-action-align-center").addEventListener("iniBfTogglerChange", alignCenter.alignCenter)
            },
            alignCenter: function(e) {

                e.target.classList.contains("ini-bf-active") ? (alignCenter.disableOthers(),
                document.body.classList.add("ini-bf-align-center")
            ) : document.body.classList.remove("ini-bf-align-center")
            },
            disableOthers: function() {
                let e = document.getElementById("ini-bf-action-align-left");
                null !== e && e.classList.contains("ini-bf-active") && e.click();
                let t = document.getElementById("ini-bf-action-align-right");
                null !== t && t.classList.contains("ini-bf-active") && t.click()
            }
        }, backgroundColors = {
            backgroundColorsStyle: document.createElement("style"),
            init: function() {
                document.querySelector("#ini-bf-action-background-colors").addEventListener("iniBfColorPallChanged", backgroundColors.backgroundColors)
            },
            backgroundColors: function(e) {
                let t = e.detail.color;
                null !== t ? (document.body.classList.add("ini-bf-background-colors"),
                //I.backgroundColorsStyle.innerHTML = `\n                /*noinspection CssUnusedSymbol*/\n                body.ini-bf-background-colors,\n                body.ini-bf-background-colors h1,\n                body.ini-bf-background-colors h1 span,\n                body.ini-bf-background-colors h2,\n                body.ini-bf-background-colors h2 span,\n                body.ini-bf-background-colors h3,\n                body.ini-bf-background-colors h3 span,\n                body.ini-bf-background-colors h4,\n                body.ini-bf-background-colors h4 span,\n                body.ini-bf-background-colors h5,\n                body.ini-bf-background-colors h5 span,\n                body.ini-bf-background-colors h6,\n                body.ini-bf-background-colors h6 span,\n\n                body.ini-bf-background-colors p,\n                body.ini-bf-background-colors a,\n                body.ini-bf-background-colors li,\n                body.ini-bf-background-colors label,\n                body.ini-bf-background-colors input,\n                body.ini-bf-background-colors select,\n                body.ini-bf-background-colors textarea,\n                body.ini-bf-background-colors legend,\n                body.ini-bf-background-colors code,\n                body.ini-bf-background-colors pre,\n                body.ini-bf-background-colors dd,\n                body.ini-bf-background-colors dt,\n                body.ini-bf-background-colors span,\n                body.ini-bf-background-colors blockquote {\n                    background-color: ${t} !important;\n                }\n            `,
                backgroundColors.backgroundColorsStyle.innerHTML = `\n  body.ini-bf-background-colors *:is(h1, h2, h3, h4, h5, h6, h1 *, h2 *, h3 *, h4 *, h5 *, h6 *, p, a, li, label, input, select, textarea, legend, code, pre, dd, dt, span, blockquote, caption, cite, em, sub, sup) { background-color: ${t} !important;}  \n`,
                document.head.appendChild(backgroundColors.backgroundColorsStyle)) : document.body.classList.remove("ini-bf-background-colors")
            }
        }, textColors = {
            textColorsStyle: document.createElement("style"),
            init: function() {
                document.querySelector("#ini-bf-action-text-colors").addEventListener("iniBfColorPallChanged", textColors.textColors)
            },
            textColors: function(e) {
                let t = e.detail.color;
                null !== t ? (document.body.classList.add("ini-bf-text-colors"),
                textColors.textColorsStyle.innerHTML = `\n body.ini-bf-text-colors * {color: ${t} !important;}`,
                document.head.appendChild(textColors.textColorsStyle)) : document.body.classList.remove("ini-bf-text-colors")
            }
        }, titleColors = {
            titleColorsStyle: document.createElement("style"),
            init: function() {
                document.querySelector("#ini-bf-action-title-colors").addEventListener("iniBfColorPallChanged", titleColors.titleColors)
            },
            titleColors: function(e) {
                let t = e.detail.color;
                null !== t ? (document.body.classList.add("ini-bf-title-colors"),
                titleColors.titleColorsStyle.innerHTML = `\n body.ini-bf-title-colors *:is(h1,h2,h3,h4,h5,h6, h1 *, h2 *, h3 *, h4 *, h5 *, h6 *) {color: ${t} !important;}\n`,
                document.head.appendChild(titleColors.titleColorsStyle)) : document.body.classList.remove("ini-bf-title-colors")
            }
        }, cursorBk = {
            init: function() {
                document.querySelector("#ini-bf-action-big-black-cursor").addEventListener("iniBfTogglerChange", cursorBk.bigBlackCursor)
            },
            bigBlackCursor: function(e) {
                e.target.classList.contains("ini-bf-active") ? (cursorBk.disableWhite(),
                document.body.classList.add("ini-bf-big-black-cursor")
                ) : document.body.classList.remove("ini-bf-big-black-cursor")
            },
            disableWhite: function() {
                let e = document.getElementById("ini-bf-action-big-white-cursor");
                null !== e && e.classList.contains("ini-bf-active") && e.click()
            }
        }, cursorWhite = {
            init: function() {
                document.querySelector("#ini-bf-action-big-white-cursor").addEventListener("iniBfTogglerChange", cursorWhite.bigWhiteCursor)
            },
            bigWhiteCursor: function(e) {
                e.target.classList.contains("ini-bf-active") ? (cursorWhite.disableBlack(),
                document.body.classList.add("ini-bf-big-white-cursor")
                ) : document.body.classList.remove("ini-bf-big-white-cursor")
            },
            disableBlack: function() {
                let e = document.getElementById("ini-bf-action-big-black-cursor");
                null !== e && e.classList.contains("ini-bf-active") && e.click()
            }
        }, fontSize = {
            textTags: ["h1", "h2", "h3", "h4", "h5", "h6", "p", "span", "a", "li", "label", "input", "select", "textarea", "legend", "code", "pre", "dd", "dt", "span", "blockquote", "th", "bdi", 'button[type="submit"]', "button.fusion-button"],
            init: function() {
                document.querySelector("#ini-bf-action-font-sizing .ini-bf-value").addEventListener("BfIniInSpinnerChanged", this.fontSizing)
            },
            fontScaling: function(e, t) {
                const n = "object" == typeof avadaHeaderVars || "object" == typeof avadaSelectVars;
                for (let o of fontSize.textTags)
                    if (document.querySelectorAll(o) && 0 !== document.querySelectorAll(o).length)
                        for (let i of document.querySelectorAll(o)) {
                            let o = false;
                            if (!n || !fontSize.avadaFontScaling(i)) {
                                if (t.load) {
                                    let e = i.closest("[original-size]");
                                    if (e) {
                                        const t = window.getComputedStyle(i).fontSize.split("px", 1)[0]
                                          , n = window.getComputedStyle(e).fontSize.split("px", 1)[0];
                                        if (parseInt(t) === parseInt(n))
                                            continue
                                    }
                                } else if ("INPUT" !== i.tagName) {
                                    const e = this.getElementOriginalSize(i)
                                      , t = this.getParentOriginalSize(i);
                                    o = null !== t && e === t
                                }
                                if (o) {
                                    const t = this.getParentOriginalSize(i);
                                    i.style.fontSize = `${this.newFontSize(t, e)}px`
                                } else {
                                    const t = this.getElementOriginalSize(i);
                                    i.style.fontSize = `${this.newFontSize(t, e)}px`
                                }
                            }
                        }
            },
            fontSizing: function(e) {
                let t = parseInt(e.target.dataset.value);
                0 !== t ? (document.body.classList.add("ini-bf-font-sizing"),
                fontSize.fontScaling(t, e.detail ?? {})) : document.body.classList.remove("ini-bf-font-sizing")
            },
            getElementOriginalSize: function(e) {
                let t = window.getComputedStyle(e).fontSize.split("px", 1)[0];
                return t = parseInt(t),
                null === e.getAttribute("original-size") ? e.setAttribute("original-size", t) : t = e.getAttribute("original-size"),
                t
            },
            getParentOriginalSize: function(e) {
                const t = e.parentElement;
                return t ? t.getAttribute("original-size") : null
            },
            newFontSize: function(e, t) {
                return Math.floor(parseInt(e) + e * (.01 * t))
            },
            avadaFontScaling: function(e) {
                if (setTimeout((function() {
                    let t = e.getAttribute("style");
                    t && t.includes("--fontSize") && (t = t.replace("--fontSize:", "--fusionFontSize:"),
                    e.setAttribute("style", t)),
                    e.classList.contains("fusion-responsive-typography-calculated") && e.classList.remove("fusion-responsive-typography-calculated")
                }
                ), 0),
                "INPUT" !== e.tagName && "BUTTON" !== e.tagName && (null !== e.parentElement.getAttribute("original-size") || null !== e.parentElement.parentElement.getAttribute("original-size"))) {
                    if (null !== e.getAttribute("style")) {
                        let t = e.getAttribute("style");
                        t = t.replace(/font-size:.*?;/, ""),
                        t = t.replace("font-size:", ""),
                        e.setAttribute("style", t)
                    }
                    return !0
                }
                return !1
            }
        }, lineHeight = {
            init: function() {
                document.querySelector("#ini-bf-action-line-height .ini-bf-value").addEventListener("BfIniInSpinnerChanged", this.lineHeight)
            },
            fontLeading: function(e, t) {
                for (let n of e)
                    if (document.getElementsByTagName(n).length > 0)
                        for (let e of document.getElementsByTagName(n)) {
                            let n = window.getComputedStyle(e).lineHeight.split("px", 1)[0];
                            null === e.getAttribute("original-leading") ? e.setAttribute("original-leading", n) : n = e.getAttribute("original-leading"),
                            e.style.lineHeight = `${parseInt(n) + n * (.01 * t)}px`
                        }
            },
            lineHeight: function(e) {
                let t = parseInt(e.target.dataset.value);
                0 !== t ? (document.body.classList.add("ini-bf-line-height"),
                lineHeight.fontLeading(["h1", "h2", "h3", "h4", "h5", "h6", "p", "span", "p", "a", "li", "label", "input", "select", "textarea", "legend", "code", "pre", "dd", "dt", "span", "blockquote"], t)) : document.body.classList.remove("ini-bf-line-height")
            }
        }, letterSpacing = {
            letterSpacingStyle: document.createElement("style"),
            init: function() {
                document.querySelector("#ini-bf-action-letter-spacing .ini-bf-value").addEventListener("BfIniInSpinnerChanged", this.letterSpacing)
            },
            letterSpacing: function(e) {
                let t = parseInt(e.target.dataset.value);
                if (0 === t)
                    return void document.body.classList.remove("ini-bf-letter-spacing");
                document.body.classList.add("ini-bf-letter-spacing");
                let n = t / 100;
                letterSpacing.letterSpacingStyle.innerHTML = `\n body.ini-bf-letter-spacing {letter-spacing: ${n}px !important; } \n`,
                document.head.appendChild(letterSpacing.letterSpacingStyle)
            }
        }, titleHighlight = {
            init: function() {
                document.querySelector("#ini-bf-action-highlight-titles").addEventListener("iniBfTogglerChange", titleHighlight.highlightTitles)
            },
            highlightTitles: function(t) {
                t.target.classList.contains("ini-bf-active") ? (document.body.classList.add("ini-bf-highlight-titles")
                ) : document.body.classList.remove("ini-bf-highlight-titles")
            }
        }, linkHighlight = {
            init: function() {
                document.querySelector("#ini-bf-action-highlight-links").addEventListener("iniBfTogglerChange", linkHighlight.highlightLinks)
            },
            highlightLinks: function(t) {
                t.target.classList.contains("ini-bf-active") ? (document.body.classList.add("ini-bf-highlight-links")
            ) : document.body.classList.remove("ini-bf-highlight-links")
            }
        }, scaleContents = {
            init: function() {
                document.querySelector("#ini-bf-action-content-scaling .ini-bf-value").addEventListener("BfIniInSpinnerChanged", this.scaleContent)
            },
            scaleContent: function(e) {
                let t = parseInt(e.target.dataset.value);
                navigator.userAgent.toLowerCase().indexOf("firefox") > 0 ? scaleContents.setFirefoxProperty(t, "body", "-moz-transform", "") : scaleContents.setElementProperty(t, "body > *", "zoom", "")
            },
            setFirefoxProperty: function(e, t, n, o) {
                let i = capitalizeWords(n, "-").replace("-", "");
                i = "aktionBf" + i;
                let a = document.querySelector(t)
                  , r = parseFloat(a.dataset[i]);
                if (!r || isNaN(r)) {
                    let e = window.getComputedStyle(a, null).getPropertyValue(n);
                    r = "none" === e ? 1 : parseFloat(e.split("(")[1].split(")")[0]),
                    a.dataset[i] = r.toString()
                }
                0 === r && (r = 1);
                let d = (r + Math.abs(r / 100) * e).toFixed(2);
                1 === parseFloat(d) ? (a.style.setProperty(n, "none", "important"),
                a.style.removeProperty("-moz-transform-origin")) : (a.style.setProperty(n, `scale(${d.toString()})`, "important"),
                a.style.setProperty("-moz-transform-origin", "top left", "important"))
            },
            setElementProperty: function(e, t, n, o) {
                let i = capitalizeWords(n, "-").replace("-", "");
                i = "aktionBf" + i,
                document.querySelectorAll(t).forEach((t=>{
                    let a = parseFloat(t.dataset[i]);
                    if (!a) {
                        let e = window.getComputedStyle(t, null).getPropertyValue(n);
                        a = parseFloat(e),
                        "normal" === e && (a = 0),
                        t.dataset[i] = a.toString()
                    }
                    0 === a && (a = 1);
                    let r = (a + Math.abs(a / 100) * e).toFixed(2);
                    t.style.setProperty(n, r.toString() + o, "important")
                }
                ))
            }
        }, dyslexia = {
            init: function() {
                document.querySelector("#ini-bf-action-dyslexia-font").addEventListener("iniBfTogglerChange", dyslexia.dyslexiaFriendly)
            },
            dyslexiaFriendly: function(t) {
                t.target.classList.contains("ini-bf-active") ? (dyslexia.disableOthers(),
                document.body.classList.add("ini-bf-dyslexia-font")) : document.body.classList.remove("ini-bf-dyslexia-font")
            },
            disableOthers: function() {
                let e = document.getElementById("ini-bf-action-readable-font");
                e.classList.contains("ini-bf-active") && e.click()
            }
        }, readableFont = {
            init: function() {
                document.querySelector("#ini-bf-action-readable-font").addEventListener("iniBfTogglerChange", readableFont.readableFont)
            },
            readableFont: function(e) {
                e.target.classList.contains("ini-bf-active") ? (readableFont.disableOthers(),
                document.body.classList.add("ini-bf-readable-font")
                ) : document.body.classList.remove("ini-bf-readable-font")
            },
            disableOthers: function() {
                let e = document.getElementById("ini-bf-action-dyslexia-font");
                e && e.classList.contains("ini-bf-active") && e.click()
            }
        }, highContrast = {
            init: function() {
                document.querySelector("#ini-bf-action-high-contrast").addEventListener("iniBfTogglerChange", highContrast.highContrast)
            },
            highContrast: function(e) {
                e.target.classList.contains("ini-bf-active") ? (clickModiSpecificVisualSwitches(e.target),
                document.body.classList.add("ini-bf-high-contrast")) : document.body.classList.remove("ini-bf-high-contrast")
            }
        }, blackContrast = {
            init: function() {
                document.querySelector("#ini-bf-action-dark-contrast").addEventListener("iniBfTogglerChange", blackContrast.darkContrast)
            },
            darkContrast: function(e) {
                e.target.classList.contains("ini-bf-active") ? (clickModiSpecificVisualSwitches(e.target),
                document.body.classList.add("ini-bf-dark-contrast")) : document.body.classList.remove("ini-bf-dark-contrast")
            }
        }, fairContrast = {
            init: function() {
                document.querySelector("#ini-bf-action-light-contrast").addEventListener("iniBfTogglerChange", fairContrast.lightContrast)
            },
            lightContrast: function(e) {
                e.target.classList.contains("ini-bf-active") ? (clickModiSpecificVisualSwitches(e.target),
                document.body.classList.add("ini-bf-light-contrast")) : document.body.classList.remove("ini-bf-light-contrast")
            }
        }, highSaturation = {
            init: function() {
                document.querySelector("#ini-bf-action-high-saturation").addEventListener("iniBfTogglerChange", highSaturation.highSaturation)
            },
            highSaturation: function(e) {
                e.target.classList.contains("ini-bf-active") ? (clickModiSpecificVisualSwitches(e.target),
                document.body.classList.add("ini-bf-high-saturation")) : document.body.classList.remove("ini-bf-high-saturation")
            }
        }, lowSaturation = {
            init: function() {
                document.querySelector("#ini-bf-action-low-saturation").addEventListener("iniBfTogglerChange", lowSaturation.lowSaturation)
            },
            lowSaturation: function(e) {
                e.target.classList.contains("ini-bf-active") ? (clickModiSpecificVisualSwitches(e.target),
                document.body.classList.add("ini-bf-low-saturation")) : document.body.classList.remove("ini-bf-low-saturation")
            }
        }, hideImgs = {
            init: function() {
                document.querySelector("#ini-bf-action-hide-images").addEventListener("iniBfTogglerChange", hideImgs.hideImages)
            },
            hideImages: function(e) {
                e.target.classList.contains("ini-bf-active") ? (document.body.classList.add("ini-bf-hide-images")
                ) : document.body.classList.remove("ini-bf-hide-images")
            }
        }, highlightHover = {
            init: function() {
                document.querySelector("#ini-bf-action-highlight-hover").addEventListener("iniBfTogglerChange", highlightHover.highlightHover)
            },
            highlightHover: function(t) {
                t.target.classList.contains("ini-bf-active") ? (document.body.classList.add("ini-bf-highlight-hover")
                ) : document.body.classList.remove("ini-bf-highlight-hover")
            }
        }, highlightFocus = {
            init: function() {
                document.querySelector("#ini-bf-action-highlight-focus").addEventListener("iniBfTogglerChange", highlightFocus.highlightFocus)
            },
            highlightFocus: function(t) {
                t.target.classList.contains("ini-bf-active") ? (document.body.classList.add("ini-bf-highlight-focus")
                ) : document.body.classList.remove("ini-bf-highlight-focus")
            }
        }, magnifier = {
            tooltip: document.createElement("div"),
            init: function() {
                document.querySelector("#ini-bf-action-magnifier").addEventListener("iniBfTogglerChange", magnifier.magnifier),
                magnifier.tooltip.id = "ini-bf-magnifier-tooltip"
            },
            magnifier: function(t) {
                if (!t.target.classList.contains("ini-bf-active"))
                    return document.body.classList.remove("ini-bf-magnifier"),
                    document.removeEventListener("mousemove", magnifier.updateTooltip, !1),
                    document.body.removeChild(magnifier.tooltip),
                    document.removeEventListener("mouseleave", magnifier.hideTooltip, !1),
                    void document.removeEventListener("mouseenter", magnifier.showTooltip, !1);
                document.body.classList.add("ini-bf-magnifier"),
                document.body.appendChild(magnifier.tooltip),
                document.addEventListener("mouseleave", magnifier.hideTooltip, !1),
                document.addEventListener("mousemove", magnifier.updateTooltip, !1),
                document.addEventListener("mouseenter", magnifier.showTooltip, !1)
            },
            updateTooltip: function(e) {
                if (!["H1", "H2", "H3", "H4", "H5", "H6", "SPAN", "P", "LI", "LABEL", "INPUT", "SELECT", "TEXTAREA", "LEGEND", "CODE", "PRE", "DD", "DT", "A", "STRONG", "B", "BLOCKQUOTE"].includes(e.target.nodeName))
                    return void magnifier.hideTooltip();
                if ("" === e.target.innerText.trim())
                    return void magnifier.hideTooltip();
                magnifier.showTooltip(),
                magnifier.tooltip.innerHTML = e.target.innerText;
                const t = 15;
                let n = window.innerWidth;
                magnifier.tooltip.style.top = `${e.clientY + t}px`,
                e.clientX > .5 * window.innerWidth ? (n = e.clientX - t <= 680 ? e.clientX - t : 680,
                magnifier.tooltip.style.left = "unset",
                magnifier.tooltip.style.right = window.innerWidth - e.clientX - t + "px",
                magnifier.tooltip.style.maxWidth = `${n}px`) : (n = window.innerWidth - e.clientX - 45 < 680 ? window.innerWidth - e.clientX - 45 : 680,
                magnifier.tooltip.style.right = "unset",
                magnifier.tooltip.style.left = `${e.clientX + t}px`,
                magnifier.tooltip.style.maxWidth = `${n}px`)
            },
            hideTooltip: function() {
                magnifier.tooltip.style.visibility = "hidden"
            },
            showTooltip: function() {
                magnifier.tooltip.style.visibility = "visible"
            }
        }, muteWebsite = {
            init: function() {
                document.querySelector("#ini-bf-action-mute-sounds").addEventListener("iniBfTogglerChange", muteWebsite.muteSounds)
            },
            muteSounds: function(e) {
                if (!e.target.classList.contains("ini-bf-active"))
                    return muteWebsite.mute(!1),
                    void document.documentElement.classList.remove("ini-bf-mute-sounds");
                muteWebsite.mute(!0),
                document.documentElement.classList.add("ini-bf-mute-sounds")
            },
            mute: function(e) {
                document.querySelectorAll("video, audio").forEach((t=>{
                    t.muted = e
                }
                )),
                document.querySelectorAll("iframe").forEach((t=>{
                    if (t.src.toLowerCase().includes("youtube.com") || t.src.toLowerCase().includes("vimeo.com")) {
                        let n = new URL(t.src);
                        e ? (n.searchParams.append("mute", "1"),
                        n.searchParams.append("muted", "1")) : (n.searchParams.delete("mute"),
                        n.searchParams.delete("muted")),
                        t.src = n.href
                    }
                }
                ))
            }
        }, stopAnims = {
            init: function() {
                document.querySelector("#ini-bf-action-stop-animations").addEventListener("iniBfTogglerChange", stopAnims.stopAnimations)
            },
            stopAnimations: function(e) {
                if (!e.target.classList.contains("ini-bf-active"))
                    return document.body.classList.remove("ini-bf-stop-animations"),
                    void document.querySelectorAll("video").forEach((e=>{
                        !0 === e.paused && "true" === e.dataset.iniBfPaused && (e.play(),
                        e.dataset.iniBfPaused = "false")
                    }
                    ));
                document.body.classList.add("ini-bf-stop-animations"),
                document.querySelectorAll("video").forEach((e=>{
                    !1 === e.paused && (e.pause(),
                    e.dataset.iniBfPaused = "true")
                }
                )),
                document.querySelectorAll("iframe").forEach((e=>{
                    "undefined" === e.dataset.iniBfPaused ? e.dataset.iniBfPaused = "true" : setTimeout((function() {
                        let t = e.src;
                        t.includes("www.youtube.com/embed") && (e.src = t,
                        e.dataset.iniBfPaused = "true")
                    }
                    ), 300)
                }
                )),
                document.querySelectorAll('svg').forEach((e=>{
                    // Stop SMIL animations
                    e.pauseAnimations();
                    // Stop CSS animations
                    e.querySelectorAll('*').forEach(el => {
                        el.style.animationPlayState = 'paused';
                        el.style.transition = 'none';
                    })
                })),
                
                document.querySelectorAll('object').forEach((e=>{
                    
                    // Ensure the SVG content is loaded and accessible
                    e.addEventListener('load', () => {
                        // Access the SVG document inside the <object> tag
                        const svgDocument = e.contentDocument;
                            
                        // Check if the SVG document exists
                        if (svgDocument) {
                                                      
                            
                            svgDocument.querySelectorAll('g').forEach((gElement=>{
                                
                                // Pause SMIL animations in the <g> tag and its descendants
                                    gElement.pauseAnimations();
                                    // Pause SMIL animations in the <g> tag's SVG
                                    gElement.closest('svg').pauseAnimations();
                                
                                    // Pause CSS animations within the <g> tag and its descendants
                                    gElement.querySelectorAll('*').forEach(el => {
                                        el.style.animationPlayState = 'paused';
                                        el.style.transition = 'none';
                                    });
                            }));
                            // Get the root SVG element
                            const svgElement = svgDocument.querySelector('svg');
                            e.pauseAnimations();
                            // Pause all SMIL animations in the SVG
                            if (svgElement) {
                                svgElement.pauseAnimations();
                                svgDocument.querySelectorAll('*').forEach(el => {
                                    el.style.animationPlayState = 'paused';
                                    el.style.transition = 'none';
                                    
                                });
                            }
                        }
                    })    
                })),
                document.querySelectorAll('g').forEach((gElement=>{
                    // Pause SMIL animations in the <g> tag and its descendants
                    
                        // Pause SMIL animations in the <g> tag's SVG
                        gElement.closest('svg').pauseAnimations();
                    
                        // Pause CSS animations within the <g> tag and its descendants
                        gElement.querySelectorAll('*').forEach(el => {
                            el.style.animationPlayState = 'paused';
                            el.style.transition = 'none';
                        });
                }))
                
            }
        }, monochrome = {
            init: function() {
                document.querySelector("#ini-bf-action-monochrome").addEventListener("iniBfTogglerChange", monochrome.monochrome)
            },
            monochrome: function(e) {
                e.target.classList.contains("ini-bf-active") ? (clickModiSpecificVisualSwitches(e.target),
                document.body.classList.add("ini-bf-monochrome")) : document.body.classList.remove("ini-bf-monochrome")
            }
        }, cognitiveReading = {
            textSelectors: "h1, h2, h3, h4, h5, h6, p, a, span, li, label, legend, dd, dt, blockquote, time",
            init: function() {
                document.querySelector("#ini-bf-action-cognitive-reading").addEventListener("iniBfTogglerChange", this.cognitiveReading)
            },
            cognitiveReading: function(e) {
                document.querySelectorAll(`${cognitiveReading.textSelectors}`) && (e.target.classList.contains("ini-bf-active") ? cognitiveReading.enableCognitiveReading() : cognitiveReading.disableCognitiveReading())
            },
            enableCognitiveReading: function() {
                document.body.classList.add("ini-bf-cognitive-reading"),
                this.addCognitiveExperience()
            },
            disableCognitiveReading: function() {
                document.body.classList.remove("ini-bf-cognitive-reading"),
                document.querySelectorAll("b.ini-bf-cognitive-reading").forEach((e=>{
                    e.outerHTML = e.innerHTML
                }
                )),
                document.querySelectorAll(".ini-bf-cognitive-reading-color").forEach((e=>{
                    e.style.color = "",
                    e.classList.remove("ini-bf-cognitive-reading-color")
                }
                ))
            },
            cognitivePlaintNode: function(element) {
                    // Skip processing if the element is identified as a skip node
                    if (this.isSkipNode(element)) {
                        return;
                    }

                    // Skip processing if the element's text is empty or too short
                    if (element.innerText === "" || element.innerText.length < 2) {
                        return;
                    }

                    // Get the computed color style of the element
                    let textColor = getComputedStyle(element).color;

                    // Apply cognitive sentence processing to the element's text
                    element.innerHTML = this.cognitiveSentence(element.innerText, textColor);

                    // Add cognitive focus to the element
                    this.addCognitiveFocus(element);
            },
            cognitiveMixedNode: function(element) {
                // Skip processing if the element is identified as a skip node
                if (this.isSkipNode(element)) {
                    return;
                }

                // Skip processing if the element's inner HTML is empty after removing all HTML tags
                const cleanedText = element.innerHTML.replaceAll(/(<+.+>)/g, "").trim();
                if (cleanedText.length === 0) {
                    return;
                }

                // Get the computed color style of the element
                let textColor = getComputedStyle(element).color;
                let processedContent = [];

                // Split the element's inner HTML by tags and process each segment
                element.innerHTML.split(/(<+.+>)/g).forEach((segment) => {
                    if (!segment) {
                        processedContent.push(segment);
                        return;
                    }

                    // Check if the segment is an HTML tag
                    if (segment.match(/(<[^>]+>)/g) || segment.match(/(<\/[^>]+>)/g)) {
                        processedContent.push(segment);
                    } else if (segment.trim() && ![".", ",", ":", ";", "?", "!"].includes(segment.trim())) {
                        // Apply cognitive processing to non-empty text segments that aren't punctuation
                        processedContent.push(this.cognitiveSentence(segment, textColor));
                    } else {
                        processedContent.push(segment);
                    }
                });

                // Set the processed content back to the element's inner HTML
                element.innerHTML = processedContent.join("");

                // Add cognitive focus to the element
                this.addCognitiveFocus(element);
            },
            addCognitiveExperience: function() {
                document.querySelectorAll(`${cognitiveReading.textSelectors}`).forEach((e=>{
                    0 === e.children.length && this.cognitivePlaintNode(e)
                }
                )),
                document.querySelectorAll(`${cognitiveReading.textSelectors}`).forEach((e=>{
                    0 !== e.children.length && this.cognitiveMixedNode(e)
                }
                ))
            },
            addCognitiveFocus: function(e) {
                let t = getComputedStyle(e).color;
                e.classList.add("ini-bf-cognitive-reading-color");
                e.style.color = cognitiveReading.toRGBA(t, .5);
            },
            toRGBA: function(e, t=1) {
                if (-1 !== e.indexOf("rgba"))
                    return e;
                if (-1 !== e.indexOf("rgb"))
                    return e.replace("rgb", "rgba").replace(")", `, ${t})`);
                if (-1 !== e.indexOf("#")) {
                    let n = e.replace("#", "");
                    return `rgba(${parseInt(n.substring(0, 2), 16)}, ${parseInt(n.substring(2, 4), 16)}, ${parseInt(n.substring(4, 6), 16)}, ${t = Math.min(Math.max(t, 0), 1)})`
                }
                return e
            },
            cognitiveSentence: function(e, t) {
                let n = [];
                return e.split(/\s+/).forEach((e=>{
                    0 !== e.trim().length ? n.push(cognitiveReading.congnitiveWord(e, t)) : n.push(e)
                }
                )),
                n.join(" ")
            },
            congnitiveWord(e, t) {
                const n = cognitiveReading.charIndex(e);
                return `<b class="ini-bf-cognitive-reading" style="color: ${t} !important;">${e.slice(0, n)}</b>${e.slice(n)}`
            },
            charIndex: function(e) {
                if (e.length < 3)
                    return 0;
                if (/\d/.test(e))
                    return e.length;
                if (e.includes("[[[ini-bf-cognitive-reading-a]]]"))
                    return 0;
                if (/^[#@&()–\[\]{}:;?/*`~$^+=<>.,]/.test(e))
                    return 0;
                let n = Math.min(Math.floor(e.length / 3), e.length - 1);
                return 1 === n && e.length > 2 ? 2 : n
            },
            isSkipNode: function(e) {
                return 1 !== e.nodeType || (!(!e.className.includes("ini-bf-c") && !e.id.includes("ini-bf-c")) || e.closest("#ini-bf-panel-box"))
            }
        }, virtualKeyboardBox = {
            keyboardBox: document.getElementById("ini-bf-keyboard-box"),
            keyboard: null,
            selectedInput: null,
            init: function() {
                
                document.querySelector("#ini-bf-action-virtual-keyboard").addEventListener("iniBfTogglerChange", virtualKeyboardBox.virtualKeyboard),
                document.addEventListener("focusin", (()=>{
                    const e = virtualKeyboardBox.isTextInput()
                      , t = virtualKeyboardBox.keyboardBox;
                    e ? (virtualKeyboardBox.onInputFocus(e),
                    e.addEventListener("input", virtualKeyboardBox.onInputChange)) : "none" !== t.style && (t.style.display = "none")
                }
                ), !0),
                document.addEventListener("click", (e=>{
                    let t = e.target.nodeName.toLowerCase();
                    null === e.target.closest("#ini-bf-keyboard-box") && "input" !== t && "textarea" !== t && (virtualKeyboardBox.keyboardBox.style.display = "none")
                }
                )),
                virtualKeyboardBox.makeKeyboardDraggable()
            },
            isTextInput: function() {
                
                const e = document.activeElement
                  , t = e.tagName
                  , n = e.getAttribute("type");
                return !(!["TEXTAREA", "INPUT"].includes(t) || ["radio", "checkbox", "hidden"].includes(n) && null !== n) && e
            },
            onInputFocus: function(e) {
                
                document.body.classList.contains("ini-bf-virtual-keyboard") && (virtualKeyboardBox.keyboardBox.style.display = "block",
                e.id || (e.id = virtualKeyboardBox.uid()),
                virtualKeyboardBox.selectedInput = `#${e.id}`,
                virtualKeyboardBox.keyboard.setOptions({
                    inputName: e.id
                }))
            },
            onInputChange: function(e) {
                document.body.classList.contains("ini-bf-virtual-keyboard") && virtualKeyboardBox.keyboard.setInput(e.target.value, e.target.id)
            },
            virtualKeyboard: function(e) {
                if (!e.target.classList.contains("ini-bf-active"))
                    return document.body.classList.remove("ini-bf-virtual-keyboard"),
                    void virtualKeyboardBox.keyboard.destroy();
                document.body.classList.add("ini-bf-virtual-keyboard");
                let t = {
                    newLineOnEnter: !0,
                    onChange: e=>virtualKeyboardBox.onChange(e),
                    onKeyPress: e=>virtualKeyboardBox.onKeyPress(e),
                    theme: "ini-bf-simple-keyboard",
                    physicalKeyboardHighlight: !0
                }
                  , n = virtualKeyboardBox.simpleKeyboardLayout();
                n && (t.layout = n),
                virtualKeyboardBox.keyboard = new window.SimpleKeyboard.default(t)
            },
            simpleKeyboardLayout: function() {
                let layout = "{\"default\":[\"^ 1 2 3 4 5 6 7 8 9 0 ß ´ {bksp}\",\"{tab} q w e r t z u i o p ü + \\\\\",\"{lock} a s d f g h j k l ö ä {enter}\",\"{shift} y x c v b n m , . - {shift}\",\".com @ {space}\"],\"shift\":[\"° ! ' § $ % & / ( ) = ? ` {bksp}\",\"{tab} Q W E R T Z U I O P Ü * \",\"{lock} A S D F G H J K L Ö Ä ' {enter}\",\"{shift} Y X C V B N M ; : _ {shift}\",\".com @ {space}\"],\"lang\":{\"de\":\"Deutsch\"}}";
                if (!layout)
                    return false;
                layout = layout.replace(/\\\\u/g, "\\u");
                try {
                    return JSON.parse(layout)
                } catch (e) {
                    return console.warn(e),
                    false;
                }
            },
            onChange: function(e) {
                document.querySelector(virtualKeyboardBox.selectedInput).value = e
            },
            onKeyPress: function(e) {
                "{lock}" !== e && "{shift}" !== e || virtualKeyboardBox.handleShiftButton()
            },
            handleShiftButton: function() {
                let e = "default" === virtualKeyboardBox.keyboard.options.layoutName ? "shift" : "default";
                virtualKeyboardBox.keyboard.setOptions({
                    layoutName: e
                })
            },
            uid: function() {
                return "bfini-" + Date.now().toString(36) + Math.random().toString(36).substring(2)
            },
            makeKeyboardDraggable: function() {
                let offsetX, offsetY;
                let startX = 0, startY = 0;
                let isDragging = false;
                const keyboardBox = virtualKeyboardBox.keyboardBox;
                const rootElement = document.documentElement;
                let currentX = 0, currentY = 0;
            
                // Handle start of the drag
                function onDragStart(event) {
                    if (event.type === "touchstart") {
                        // Touch start coordinates
                        offsetX = event.touches[0].clientX - startX;
                        offsetY = event.touches[0].clientY - startY;
                    } else {
                        // Mouse start coordinates
                        offsetX = event.clientX - startX;
                        offsetY = event.clientY - startY;
                    }
                    
                    // Set dragging flag if the target is the keyboard box
                    if (event.target === keyboardBox) {
                        isDragging = true;
                    }
                }
            
                // Handle end of the drag
                function onDragEnd() {
                    offsetX = startX;
                    offsetY = startY;
                    isDragging = false;
                }
            
                // Handle the drag movement
                function onDragMove(event) {
                    if (!isDragging) return;
            
                    // Update the position based on the event type
                    if (event.type === "touchmove") {
                        currentX = event.touches[0].clientX - offsetX;
                        currentY = event.touches[0].clientY - offsetY;
                    } else {
                        currentX = event.clientX - offsetX;
                        currentY = event.clientY - offsetY;
                    }
            
                    // Update start positions
                    startX = currentX;
                    startY = currentY;
            
                    // Move the keyboard box
                    keyboardBox.style.transform = `translate3d(${currentX}px, ${currentY}px, 0)`;
                }
            
                // Attach event listeners for touch and mouse interactions
                rootElement.addEventListener("touchstart", onDragStart, false);
                rootElement.addEventListener("touchend", onDragEnd, false);
                rootElement.addEventListener("touchmove", onDragMove, false);
                rootElement.addEventListener("mousedown", onDragStart, false);
                rootElement.addEventListener("mouseup", onDragEnd, false);
                rootElement.addEventListener("mousemove", onDragMove, false);
            }
            
        }, readingRuler = {
            readingRulerEl: null,
            init: function() {
                document.querySelector("#ini-bf-action-reading-guide").addEventListener("iniBfTogglerChange", readingRuler.readingRuler)
            },
            readingRuler: function(e) {
                e.target.classList.contains("ini-bf-active") ? readingRuler.createReadingRuler() : readingRuler.removeReadingRuler()
            },
            createReadingRuler: function() {
                document.querySelectorAll(".ini-bf-reading-guide-element").length || (readingRuler.addCSS(),
                readingRuler.readingRulerEl = document.createElement("div"),
                readingRuler.readingRulerEl.classList.add("ini-bf-reading-guide-element"),
                document.body.appendChild(readingRuler.readingRulerEl),
                document.addEventListener("mousemove", readingRuler.moveReadingRuler),
                document.addEventListener("click", readingRuler.moveReadingRuler))
            },
            moveReadingRuler: function(e) {
                let t = e.clientX - Math.round(readingRuler.readingRulerEl.clientWidth / 2)
                  , n = e.clientY;
                readingRuler.readingRulerEl.style.transform = "translate3d(" + t + "px," + n + "px,0px)"
            },
            removeReadingRuler: function() {
                document.body.classList.remove("ini-bf-reading-guide"),
                readingRuler.readingRulerEl.remove(),
                document.removeEventListener("mousemove", readingRuler.moveReadingRuler),
                document.removeEventListener("click", readingRuler.moveReadingRuler)
            },
            addCSS: function() {
                document.body.classList.add("ini-bf-reading-guide")
            }
        }, readingMask = {
            readingMaskTop: null,
            readingMaskBottom: null,
            init: function() {
                document.querySelector("#ini-bf-action-reading-mask").addEventListener("iniBfTogglerChange", readingMask.readingMask)
            },
            readingMask: function(e) {
                e.target.classList.contains("ini-bf-active") ? readingMask.createReadingMask() : readingMask.removeReadingMask()
            },
            createReadingMask: function() {
                document.querySelectorAll(".ini-bf-reading-mask-top").length || (document.body.classList.add("ini-bf-reading-mask"),
                readingMask.readingMaskTop = document.createElement("div"),
                readingMask.readingMaskTop.classList.add("ini-bf-reading-mask-top"),
                document.body.appendChild(readingMask.readingMaskTop),
                readingMask.readingMaskBottom = document.createElement("div"),
                readingMask.readingMaskBottom.classList.add("ini-bf-reading-mask-bottom"),
                document.body.appendChild(readingMask.readingMaskBottom),
                document.addEventListener("mousemove", readingMask.moveReadingMask))
            },
            moveReadingMask: function(t) {
                let n = t.clientY
                  , o = Math.round(190 / 2);
                readingMask.readingMaskTop.style.height = n - o + "px",
                readingMask.readingMaskBottom.style.top = `${n + o}px`
            },
            removeReadingMask: function() {
                document.body.classList.remove("ini-bf-reading-mask"),
                readingMask.readingMaskTop.remove(),
                readingMask.readingMaskBottom.remove(),
                document.removeEventListener("mousemove", readingMask.moveReadingMask)
            }
        }, keyboardNavigation = {
            init: function() {
                document.querySelector("#ini-bf-action-keyboard-navigation").addEventListener("iniBfTogglerChange", keyboardNavigation.keyboardNavigation)
            },
            keyboardNavigation: function(e) {
                if (!e.target.classList.contains("ini-bf-active"))
                    return document.body.classList.remove("ini-bf-keyboard-navigation"),
                    keyboardNavigation.restoreOriginalTabIndex(),
                    void (keyboardNavigation.enabled = false);
                document.body.classList.add("ini-bf-keyboard-navigation"),
                keyboardNavigation.makeFocusable(),
                keyboardNavigation.enabled = true
            },
            makeFocusable: function() {
                document.querySelectorAll('nav, [role="navigation"], h1, h2, h3, h4, h5, h6, [role="heading"], form:not([disabled]), button:not([disabled]), [role="button"]:not([disabled]), img, picture, svg').forEach((e=>{
                    e.tabIndex < 0 && (e.dataset.iniBfTabindexOrig = e.tabIndex,
                    e.tabIndex = 0)
                }
                ))
            },
            restoreOriginalTabIndex: function() {
                document.querySelectorAll('nav, [role="navigation"], h1, h2, h3, h4, h5, h6, [role="heading"], form:not([disabled]), button:not([disabled]), [role="button"]:not([disabled]), img, picture, svg').forEach((e=>{
                    null != e.dataset.iniBfTabindexOrig && (e.tabIndex = e.dataset.iniBfTabindexOrig,
                    delete e.dataset.iniBfTabindexOrig)
                }
                ))
            },
            setFocus: function(selector, forward = true) {
                // Check if there is an active element on the document
                if (!document.activeElement) {
                    return;
                }
            
                // Select all elements matching the selector that are visible or the currently active element
                let focusableElements = Array.prototype.filter.call(
                    document.querySelectorAll(selector),
                    (element) => element.offsetWidth > 0 || element.offsetHeight > 0 || element === document.activeElement
                );
            
                // Find the index of the currently active element
                let currentIndex = focusableElements.indexOf(document.activeElement);
            
                if (currentIndex > -1) {
                    // Determine the next element to focus on, based on the navigation direction
                    let nextElement = forward 
                        ? focusableElements[currentIndex + 1] || focusableElements[0] 
                        : focusableElements[currentIndex - 1] || focusableElements[focusableElements.length - 1];
            
                    // Focus on the determined element
                    nextElement.focus();
                } else {
                    // If the active element is not found, focus on the first or last element based on the direction
                    forward ? focusableElements[0].focus() : focusableElements[focusableElements.length - 1].focus();
                }
            }
            
        }, voiceNavi = {
            init: function() {
                let e = document.querySelector("#ini-bf-action-voice-navigation");
                new P ? (window.iniBfVNavMicroModal = q,
                createVoiceNavigationUI(),
                e.addEventListener("iniBfTogglerChange", voiceNavi.voiceNavigation)) : e.classList.add("ini-bf-disabled")
            },
            voiceNavigation: function(e) {
                const t = "ini-bf-voice-navigation";
                if (!e.target.classList.contains("ini-bf-active"))
                    return document.body.classList.remove(t),
                    void window.iniBfVNavMicroModal.close(t);
                document.body.classList.add(t),
                window.iniBfVNavMicroModal.show(t, {
                    onClose: e=>{
                        e.id && e.id === t && P.manageRecognition(!1)
                    }
                    ,
                    onShow: e=>{
                        e.id && e.id === t && P.manageRecognition(!0)
                    }
                    ,
                    closeTrigger: "ini-bf-data-voice-navi-close",
                    openTrigger: "ini-bf-voice-navi-open",
                    disableScroll: !1,
                    disableFocus: !0,
                    awaitOpenAnimation: !1,
                    awaitCloseAnimation: !1
                })
            }
        } 
        /*
        textToSpeech = {
            iniBf: null,
            AudioContext: window.AudioContext || window.webkitAudioContext || !1,
            iniBfAudiocontext: null,
            init: function() {
                if (document.querySelectorAll("#ini-bf-action-text-to-speech").length < 1)
                    return;
                document.querySelector("#ini-bf-action-text-to-speech").addEventListener("iniBfTogglerChange", textToSpeech.textToSpeech)
            },
            webAudioTouchUnlock: function() {
                null === textToSpeech.iniBfAudiocontext && (textToSpeech.iniBfAudiocontext = new AudioContext,
                textToSpeech.iniBfAudiocontext.resume())
            },
            textToSpeech: function(t) {
                t.target.classList.contains("ini-bf-active") ? (textToSpeech.iniBf = new e,
                textToSpeech.iniBf.init(),
                document.body.addEventListener("click", textToSpeech.webAudioTouchUnlock, !1),
                textToSpeech.voiceGuide(t.target.title),
                textToSpeech.highlightParagraph()) : (textToSpeech.iniBf = null,
                document.body.removeEventListener("click", textToSpeech.webAudioTouchUnlock, !1))
            },
            voiceGuide: function(e) {
                if (e.length < 1)
                    return;
                if (null === e.match(/^([\w\-]+)/g))
                    return;
                let req = new XMLHttpRequest
                  , prefs = window.iniBfPreferences;
                req.open("POST", prefs.textToSpeechAjaxUrl, !0),
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"),
                req.onload = () => {
                    if (this.status >= 200 && this.status < 400) {
                        if (!textToSpeech.AudioContext)
                            return void console.warn("Error with creating AudioContext.");
                        textToSpeech.iniBfAudiocontext.decodeAudioData(this.response, (function(e) {
                            const t = textToSpeech.iniBfAudiocontext.createBufferSource();
                            t.buffer = e,
                            t.connect(textToSpeech.iniBfAudiocontext.destination),
                            t.start(0)
                        }
                        ), (e=>console.warn("Error with decoding audio data" + e.err)))
                    } else
                        console.error(this.response)
                }
                ,
                req.onerror = () => {
                    console.error("Connection error.")
                }
                ,
                req.responseType = "arraybuffer",
                req.send(`action=readablergspeak&nonce=${prefs.textToSpeechNonce}&text=${e}`)
            },
            highlightParagraph: function() {
                prefs.highlightP && document.querySelectorAll("p").forEach((function(e) {
                    e.addEventListener("click", (function(t) {
                        let n = document.createRange()
                          , o = window.getSelection();
                        n.selectNodeContents(e),
                        o.removeAllRanges(),
                        o.addRange(n)
                    }
                    ))
                }
                ))
            }
        }
            */
        , linkNavigator = {
            select: document.getElementById("ini-bf-linknav"),
            init: function() {
                linkNavigator.buildSelect(),
                linkNavigator.select.addEventListener("change", (e=>{
                    window.location.href = e.target.value
                }
                ))
            },
            crawlLinks: function() {
                const anchorElements = document.querySelectorAll("a");
    const linksArray = [];

    // Add the home link with the origin URL
    linksArray.push(["Home", window.location.origin]);

    // Iterate over each anchor element
    for (let i = 0; i < anchorElements.length; i++) {
        let linkText = anchorElements[i].innerText;

        // Normalize spaces and trim the link text
        linkText = linkText.replace(/\s+/g, " ").trim();

        // Skip if the link text is empty
        if (linkText === "") {
            continue;
        }

        // Limit the link text to 42 characters
        linkText = linkText.substring(0, 42);

        // Get and clean up the href attribute
        let href = anchorElements[i].href;
        href = href.trim();
        href = href.replace(/#$/, ""); // Remove trailing #
        href = href.replace(/\/$/, ""); // Remove trailing /

        // Skip if the href is empty or invalid, otherwise add to the array
        if (href !== "" && href !== "#" && !href.toLowerCase().startsWith("javascript:")) {
            // Check if the link is already in the array
            const isDuplicate = linksArray.some(existingLink => existingLink[1] === href);

            // Add the link if it's not a duplicate
            if (!isDuplicate) {
                linksArray.push([linkText, href]);
            }
        }
    }

    return linksArray;
            },
            buildSelect: function() {
                let e = linkNavigator.crawlLinks();
                for (let t = 0; t < e.length; t++) {
                    let n = document.createElement("option");
                    n.textContent = e[t][0],
                    n.value = e[t][1],
                    linkNavigator.select.appendChild(n)
                }
            }
        }, resetIniBf = {
            init: function() {
                let e = document.getElementById("ini-bf-reset-btn");
                e && e.addEventListener("click", resetIniBf.reset)
            },
            reset: function(e) {
                e.preventDefault();
                let t = Object.keys(localStorage);
                for (const e in t)
                    t[e].toString().startsWith("iniBfStore") && localStorage.removeItem(t[e]);
                location.reload()
            }
        }, panelClose = {
            init: function() {
                let e = document.getElementById("ini-bf-hide-btn");
                e && e.addEventListener("click", panelClose.hide)
            },
            hide: function(t) {
               closePanel();
            },
        };


        function setupNavigationShortcut(hotkey, selector) {
            // Register hotkeys for both the hotkey and its Shift variant
            hotkeys(`${hotkey},shift+${hotkey}`, function(event, handler) {
                // Check if the body has the class indicating keyboard navigation is enabled
                if (!document.body.classList.contains("ini-bf-keyboard-navigation")) {
                    return;
                }
                // Prevent default behavior for the hotkey action
                event.preventDefault();
                // Determine the focus direction: forward by default, backward if Shift key is used
                let forwardFocus = true;
                if (handler.key.startsWith("shift+")) {
                    forwardFocus = false;
                }
                // Set focus to the target elements with the specified direction
                keyboardNavigation.setFocus(selector, forwardFocus);
            });
        }
           /**
     * Initializes hotkey handlers for accessibility features.
     *
     * @param {Object} hotkeysConfig - Configuration object containing hotkey definitions.
     */
    function initializeHotkeyHandlers(hotkeysConfig) {
        // Setup hotkey to toggle the panel visibility
        (function(config) {
            hotkeys(config.hotKeyOpenInterface, function(event) {
                event.preventDefault();
                togglePanelVisibility();
            });
        })(hotkeysConfig);

        // Setup navigation shortcuts for various elements
        setupNavigationShortcut(hotkeysConfig.hotKeyMenu, 'nav, [role="navigation"]');
        setupNavigationShortcut(hotkeysConfig.hotKeyHeadings, 'h1, h2, h3, h4, h5, h6, [role="heading"]');
        setupNavigationShortcut(hotkeysConfig.hotKeyForms, 'form:not([disabled])');
        setupNavigationShortcut(hotkeysConfig.hotKeyButtons, 'button:not([disabled]), [role="button"]:not([disabled])');
        setupNavigationShortcut(hotkeysConfig.hotKeyGraphics, 'img, picture, svg');

        // Handle spacebar keydown event for specific accessibility items
        document.body.onkeydown = function(event) {
            const keyCode = event.keyCode || event.charCode || event.which;

            // Check if the spacebar (key code 32) is pressed
            if (keyCode === 32) {
                const activeElement = document.activeElement;
                const isAccessibilityItem = activeElement.classList.contains("ini-bf-accessibility-profile-item") ||
                                            activeElement.classList.contains("ini-bf-switch-box") ||
                                            activeElement.classList.contains("ini-bf-color");

                // If the active element is an accessibility item, prevent default and trigger click
                if (isAccessibilityItem) {
                    event.preventDefault();
                    activeElement.click();
                }
            }
        };
    }


        function initPanel(settings) {
            
            // Check if the "ini-bf-hide" cookie is set to 1, indicating the panel should be hidden
            if (window.document.cookie.indexOf("ini-bf-hide=1") > -1) {
                const panelBox = document.querySelector("#ini-bf-panel-box");
                const triggerButton = document.querySelector("#ini-bf-trigger-button");
                
                // Remove the panel and trigger button if they exist
                if (panelBox) panelBox.remove();
                if (triggerButton) triggerButton.remove();
                
                // Exit the function early since the panel is hidden
                return;
            }

            // Assign the provided settings to a variable
            e = settings;

            // If the document is still loading, delay initialization until it is ready
            if (document.readyState === "loading") {
                document.addEventListener("DOMContentLoaded", initialize);
            } else {
                // Initialize immediately if the document is already loaded
                initialize();
            }
        }
    /**
     * Initializes the accessibility panel and related functionalities.
     */
    function initialize() {
        
        // Select the panel box element and remove any inline styles
        const panelBox = document.querySelector("#ini-bf-panel-box");
        if (panelBox) {
            panelBox.removeAttribute("style");
        }

        // Initialize the modal and add event listeners for panel interactions
        setupModal(e);
        
        // Initialize hotkey handlers and various accessibility features
        initializeHotkeyHandlers(e);
        initializeAccessibilityFeatures();

        // Load settings and saved configurations if applicable
        if (shouldLoadSettings()) {
            loadAllSettings();
            markSettingsLoaded();
        }

        // Initialize additional features or components
        t.init();
    }

    /**
     * Sets up the modal with the provided settings.
     * 
     * @param {Object} settings - Configuration settings for the modal.
     */
    function setupModal(settings) {
        
        window.bfIniMicModal = q;
        window.bfIniMicModal.init("ini-bf-panel-box", {
            onClose: modal => {
                if (modal.id === "ini-bf-panel-box") {
                    closeTriggerElements();
                }
            },
            openTrigger: "data-bf-ini-trigger",
            closeTrigger: "data-bf-ini-close",
            disableScroll: !1,
            disableFocus: false
        });

        // Add event listener for panel interactions
        document.addEventListener("click", handlePanelInteraction, false);

        // Initialize panel drag functionality
        initPanelDrag(settings);
    }

    /**
     * Initializes various accessibility features and functionalities.
     */
    function initializeAccessibilityFeatures() {
        const features = [
            adjustableFunctions,
            switchBox,
            colorPallettes,
            resetIniBf,
            a,
            alignLeft,
            alignRight,
            alignCenter,
            backgroundColors,
            textColors,
            titleColors,
            cursorBk,
            cursorWhite,
            fontSize,
            lineHeight,
            letterSpacing,
            titleHighlight,
            linkHighlight,
            scaleContents,
            dyslexia,
            readableFont,
            highContrast,
            blackContrast,
            fairContrast,
            highSaturation,
            lowSaturation,
            hideImgs,
            highlightHover,
            highlightFocus,
            magnifier,
            muteWebsite,
            stopAnims,
            monochrome,
            cognitiveReading,
            virtualKeyboardBox,
            readingRuler,
            readingMask,
            // textToSpeech,  // Uncomment if needed
            keyboardNavigation,
            voiceNavi,
            linkNavigator
        ];

        // Initialize each feature
        features.forEach(feature => feature.init());
    }

    /**
     * Checks if settings should be loaded and returns true if so.
     * 
     * @returns {boolean} - Whether to load settings.
     */
    function shouldLoadSettings() {
        return hasIniBfStoreKey();
    }

    /**
     * Loads settings for all configurable components.
     */
    function loadAllSettings() {
        switchBox.loadSettings();
        adjustableFunctions.loadSettings();
        colorPallettes.loadSettings();
        a.loadSaved();
    }

        function capitalizeWords(text, separator = " ") {
            return text
            .toLowerCase()
            .split(separator)
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(separator);
        }
    /**
     * Converts a string to camelCase format, with optional prefixes and suffixes.
     *
     * @param {string} text - The main text to convert.
     * @param {string} separator - The separator used to split the text into words. Default is an underscore ('_').
     * @param {string} prefix - An optional prefix to add before the main text.
     * @param {string} suffix - An optional suffix to add after the main text.
     * @returns {string} - The camelCase formatted string with optional prefix and suffix.
     */
    function toCamelCase(text, separator = "_", prefix = "", suffix = "") {
        let result = "";
        // Add prefix and suffix around the text, then split by the separator
        const formattedText = (prefix + separator + text + separator + suffix).toLowerCase();
        
        formattedText.split(separator).forEach((word, index) => {
            // Lowercase the first word; capitalize the first letter of subsequent words
            result += index === 0 ? word.toLowerCase() : word.charAt(0).toUpperCase() + word.slice(1);
        });

        return result;
    }

        function hasIniBfStoreKey() {
            // Get all keys from localStorage
            const localStorageKeys = Object.keys(localStorage);
            
            // Check if any key contains the substring "iniBfStore"
            return localStorageKeys.some(key => key.includes("iniBfStore"));
        }
        function createDebouncedFunction(func, delay) {
            let timeoutId = null;

            return function(...args) {
                // Clear the previous timeout if it exists
                clearTimeout(timeoutId);
        
                // Set a new timeout to call the function after the specified delay
                timeoutId = setTimeout(() => func.apply(this, args), delay || 0);
            };
        }
        return {
            run: function(e) {
                initPanel(e)
            }
        }
    })();
    Fn.run(window.iniBfPreferences)
}
)();
//});
