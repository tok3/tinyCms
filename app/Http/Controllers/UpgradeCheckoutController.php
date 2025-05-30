<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\Contract;
use Carbon\Carbon;

class UpgradeCheckoutController extends Controller
{
    public function show(Product $product)
    {
        $user = auth()->user();
        $company = $user->companies()->first();

        return view('upgrade-checkout.show', compact('product', 'user', 'company'));
    }

    public function process(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $user = Auth::user();
        $company = $user->companies()->first(); // Annahme: Ein Nutzer = eine Company

        $price = $product->price;

        // Direkt buchen bei 0 €
        if ($price <= 0) {
            // Contract anlegen
            $contract = new Contract([
                'contractable_type' => Company::class,
                'contractable_id' => $company->id,
                'product_id' => $product->id,
                'interval' => $product->interval,
                'price' => 0,
                'order_date' => Carbon::now(),
                'start_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths(24),
                'data' => json_encode(['manuell_bestellt' => true]),
            ]);
            $contract->save();

            return redirect()->route('filament.dashboard.pages.dashboard')
                ->with('success', 'Produkt erfolgreich gebucht!');
        }

        // Mollie Customer holen (Annahme: MollieCustomer existiert)
        $mollieCustomer = $company->mollieCustomer->mollie_customer_id ?? null;
        if (!$mollieCustomer) {
            return redirect()->back()->withErrors(['mollie' => 'Kein Mollie-Kunde vorhanden.']);
        }

        // Mandate checken
        $mandates = Mollie::api()->mandates->allFor($mollieCustomer);
        $hasValidMandate = collect($mandates)->first(fn($m) => $m->status === 'valid');

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => $product->currency,
                "value" => number_format($price / 100, 2, '.', ''),
            ],
            'customerId' => $mollieCustomer,
            'sequenceType' => $hasValidMandate ? 'recurring' : 'first',
            'description' => $product->invoice_text,
            'redirectUrl' => route('upgrade.checkout.redirect'),
            'webhookUrl' => route('mollie.paymentWebhook'),
            "metadata" => [
                "product_id" => $product->id,
                "customer_id" => $mollieCustomer,
                "company_id" => $company->id,
            ],
        ]);

        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function redirect()
    {
        return redirect()->route('filament.dashboard.pages.dashboard')
            ->with('success', 'Zahlung erfolgreich! Produkt wurde freigeschaltet.');
    }
}
