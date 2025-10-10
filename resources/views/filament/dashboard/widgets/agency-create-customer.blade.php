{{-- resources/views/filament/dashboard/widgets/agency-create-customer.blade.php --}}
<div class="rounded-xl border p-5 space-y-4">
    <div class="text-lg font-semibold">Neuen Kunden anlegen</div>
    <p class="text-sm text-gray-600">
     Legen Sie hier Ihren neuen Kunde an. Die Abrechnung erfolgt immer über Ihre Agentur (<b>{{\App\Helpers\CompanyHelper::currentCompany()->name}}</b>), Sie erhalten auf die für Ihre Kunden gebuchten Leistungen <b>{{\App\Helpers\CompanyHelper::currentCompany()->agency_discount_percent}}%</b> Rabatt. Der Rabatt so wie der Name des Kunden wird auf Ihrer Rechung ausgewiesen, damit Sie die Kosten entsprechend zuordnen können.
    </p>

    <form wire:submit.prevent="createCustomer" class="space-y-3">
        <div>
            <label class="block text-sm font-medium mb-1">Firmenname / Projektname / Domain</label>
            <input type="text" wire:model.defer="name" class="fi-input w-full" />
            @error('name') <p class="text-danger-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

       {{-- <div>
            <label class="block text-sm font-medium mb-1">Kontakt-E-Mail (optional)</label>
            <input type="email" wire:model.defer="email" class="fi-input w-full" />
            @error('email') <p class="text-danger-600 text-sm mt-1">{{ $message }}</p> @enderror
        </div>--}}

        <div class="flex justify-end">
            <x-filament::button type="submit">Anlegen</x-filament::button>
        </div>
    </form>
</div>
