<?php

namespace App\Filament\Dashboard\Widgets;

use App\Models\Company;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use App\Helpers\CompanyHelper;
class AgencyCreateCustomerWidget extends Widget
{
    protected static string $view = 'filament.dashboard.widgets.agency-create-customer';

    // einfache Livewire-Props statt Filament-Form
    public string $name = '';
    public ?string $email = null;

    public function getColumnSpan(): int|string|array
    {
        return 'full';
    }
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
            'name'                   => $this->name,
            'email'                  => $this->email ?: null,
            'agency_company_id'      => $agency->id,   // Zuordnung zur Agentur
            'billing_via_agency'     => true,          // für InvoiceService
            'billing_email_override' => true,          // für InvoiceService
        ]);

        // User ↔ Company verknüpfen (nur wenn eingeloggt)
        if ($user = \Auth::user()) {
            $user->companies()->syncWithoutDetaching([$customer->id]);
        }

        // Optionale Notification (erscheint kurz vorm Redirect)
        \Filament\Notifications\Notification::make()
            ->title("„{$customer->name}“ wurde angelegt")
            ->body("Sie befinden sich nun im Account von „{$customer->name}“")
            ->success()
            ->send();

        CompanyHelper::setCurrentCompany($customer);

         // Livewire v3 SPA-Redirect
        $this->redirect($customer->id.'/upgrade-page', navigate: true);

        // Felder aufräumen (optional, wird nach Redirect eh neu geladen)
        $this->reset(['name', 'email']);
    }
}
