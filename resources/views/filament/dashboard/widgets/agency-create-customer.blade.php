{{-- resources/views/filament/dashboard/widgets/agency-create-customer.blade.php --}}
<div
    x-data="{ showInfo: false }"
    class="rounded-xl border p-5 space-y-4 relative"
>
    <div class="flex items-center justify-between">
        <div class="text-lg font-semibold">Neuen Kunden anlegen</div>
        <button
            type="button"
            @click="showInfo = true"
            class="text-gray-500 hover:text-primary-600 transition"
            title="Mehr Informationen"
        >
            <x-heroicon-o-information-circle class="w-5 h-5" />
        </button>
    </div>

    <p class="text-sm text-gray-600">
        Legen Sie hier Ihren neuen Kunden an. Die Abrechnung erfolgt immer über Ihre Agentur
        (<b>{{ \App\Helpers\CompanyHelper::currentCompany()->name }}</b>),
        Sie erhalten auf die für Ihre Kunden gebuchten Leistungen
        <b>{{ \App\Helpers\CompanyHelper::currentCompany()->agency_discount_percent }}%</b> Rabatt.
        Der Rabatt sowie der Name des Kunden werden auf Ihrer Rechnung ausgewiesen,
        damit Sie die Kosten entsprechend zuordnen können.
    </p>

    <form wire:submit.prevent="createCustomer" class="space-y-3">
        <div>
            <label class="block text-sm font-medium mb-1">Firmenname / Projektname / Domain</label>
            <input type="text" wire:model.defer="name" class="fi-input w-full" />
            @error('name')
            <p class="text-danger-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end">
            <x-filament::button type="submit">Anlegen</x-filament::button>
        </div>
    </form>

    {{-- Overlay für Info --}}
    <div
        x-show="showInfo"
        x-transition
        class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center"
        @click.self="showInfo = false"
    >
        <div class="bg-white dark:bg-gray-900 rounded-xl shadow-xl max-w-lg w-full p-6 relative">
            <button
                type="button"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-800"
                @click="showInfo = false"
            >
                <x-heroicon-o-x-mark class="w-5 h-5" />
            </button>

            <h2 class="text-lg font-semibold mb-2">Wie funktioniert das?</h2>

            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Sie können hier als <strong>Agentur</strong> neue Kunden (Mandanten) anlegen.
                Für diese Kunden können Sie anschließend Produkte oder Abonnements buchen.
                Die <strong>Abrechnung erfolgt zentral über Ihre Agentur</strong>,
                wobei Ihr vereinbarter Agenturrabatt automatisch auf allen Rechnungen berücksichtigt wird.
            </p>

            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Der Kunde selbst erhält <strong>keine eigene Abrechnung oder Zahlungsaufforderung</strong> –
                Sie als Agentur verwalten die Zahlung und können die Leistung an Ihren Kunden weiterberechnen.
            </p>

            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Nachdem Sie einen neuen Mandanten angelegt haben, werden Sie automatisch auf die
                <strong>Produktbuchungs-Seite</strong> im jeweiligen Mandanten-Dashboard weitergeleitet.
                Dort können Sie die gewünschten Produkte und Upgrades für Ihren Kunden auswählen.
            </p>

            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Die angezeigten Preise sind <strong>Endpreise für den Kunden</strong>.
                Ihr Agenturrabatt wird automatisch auf der Rechnung abgezogen.
                Auf Ihrer Rechnung befindet sich außerdem ein Hinweis, für welchen Kunden oder welches Projekt
                (entsprechend des eingegebenen Namens) die Leistung gebucht wurde.
            </p>

            <p class="text-sm text-gray-600 leading-relaxed mb-4">
                Sie können die Firmendaten des Mandanten jederzeit im <strong>Mandanten-Dashboard</strong> anpassen.
                Zur besseren Unterscheidung wird im Dropdown oben links immer der Wert aus dem Feld
                <strong>„Firmenname“</strong> angezeigt.
            </p>

            <p class="text-sm text-gray-600 leading-relaxed">
                Wir kommunizieren ausschließlich über die Kontaktdaten Ihrer Agentur.
                Rechnungen werden immer an die hinterlegte Rechnungsadresse und
                <strong>Rechnungs-E-Mail Ihrer Agentur</strong> gesendet.
            </p>

            <div class="mt-4 text-right">
                <x-filament::button color="gray" @click="showInfo = false">
                    Schließen
                </x-filament::button>
            </div>
        </div>
    </div>
</div>
