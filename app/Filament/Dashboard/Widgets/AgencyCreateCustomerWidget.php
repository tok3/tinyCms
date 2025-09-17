<?php

namespace App\Filament\Dashboard\Widgets;

use App\Models\Company;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;

class AgencyCreateCustomerWidget extends Widget
{
    protected static string $view = 'filament.dashboard.widgets.agency-create-customer';

    // einfache Livewire-Props statt Filament-Form
    public string $name = '';
    public ?string $email = null;

    public static function canView(): bool
    {

        $tenant = Filament::getTenant();


        return (bool) ($tenant && $tenant->isAgency());
    }

    public function createCustomer(): void
    {
        $this->validate([
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
        ]);

        $agency = \Filament\Facades\Filament::getTenant();
        abort_unless($agency && $agency->is_agency, 403);

        $customer = \App\Models\Company::create([
            'name'               => $this->name,
            'email'              => $this->email ?: null,
            'agency_company_id'  => $agency->id,   // ← Zuordnung zur Agentur
            'billing_via_agency' => true,          // ← später im InvoiceService verwenden
        ]);

        // User ↔ Company verknüpfen (ohne Pivot-Attribute)
        if (method_exists(\Auth::user(), 'companies')) {
            \Auth::user()->companies()->syncWithoutDetaching([$customer->id]);
        }

        \Filament\Notifications\Notification::make()
            ->title("„{$customer->name}“ wurde angelegt")
            ->body('Die Firma wurde der Agentur zugeordnet und erscheint im Tenant-Dropdown.')
            ->success()
            ->send();

        $this->reset(['name', 'email']);
    }
}
