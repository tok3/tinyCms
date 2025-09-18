<?php

namespace App\Http\Controllers;

use App\Helpers\CompanyHelper;
use App\Http\Middleware\PreventRequestsDuringMaintenance;
use App\Models\MollieCustomer;
use App\Services\InvoiceService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Mollie\Laravel\Facades\Mollie;
use App\Models\User;
use App\Models\Company;
use App\Models\Subscription;
use Faker\Factory as Faker;
use GuzzleHttp\Client;
use App\Models\TemporaryUserData;
use Illuminate\Support\Str;
use App\Helpers\FormatHelper;

/**
 *
 */
class CheckoutController extends MolliePaymentController

{

    var $descriptionLength = 80; // item description length on invoice. combination of product_name and description

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    public function preparePayment(Request $request)
    {


        $checkoutUrl = $this->firstPayment($request);


        return redirect($checkoutUrl, 303);

    }


    /**
     * @param $orderedProduct
     * @return \Mollie\Api\Resources\Payment
     * @throws \Mollie\Api\Exceptions\ApiException
     */
    private function firstPayment(Request $request)
    {
        [$productId, $interval] = $this->parseSelection($request->input('product_selection'));

        $orderedProduct = $this->prepareOrderedProduct($productId, $interval);

        // Kunde/Company/Mandat/temporäre Daten vorbereiten
        [$customerID, $billingEmail, $customerName] = $this->resolveCustomerContext($request);

        // Zero-/Rechnung-Flow (keine Gateway-Zahlung)
        if ($this->isZeroOrInvoiceFlow($orderedProduct, $request))
        {
            return $this->handleZeroOrInvoice($request, $orderedProduct, $customerID, $interval);
        }

        // Preis berechnen (Coupon + Trial)
        $couponCode = $request->input('coupon_code') ?? '0';
        $priceCents = $this->computePriceCents($orderedProduct, $couponCode);
        if ($orderedProduct->trial_period_days > 0)
        {
            $priceCents = 0;
        }

        // Payment-Metadaten & Beschreibung
        $metadata = $this->buildMetadata($request, $orderedProduct->id, $interval, $customerID, $couponCode);
        $itemDescription = $this->buildItemDescription($orderedProduct);

        // Redirects
        $redirectUrl = $this->redirectUrlFor($request);

        // Payment erstellen (Mollie)
        $payment = $this->createMolliePayment(
            priceCents: $priceCents,
            currency: $orderedProduct->currency,
            billingEmail: $billingEmail,
            description: $itemDescription,
            redirectUrl: $redirectUrl,
            webhookUrl: route('mollie.paymentWebhook'),
            metadata: $metadata,
            customerID: $customerID,
            orderedProduct: $orderedProduct
        );

        return $payment->getCheckoutUrl();
    }

    /* ===========================
    |  Hilfsmethoden
    |===========================*/

    private function parseSelection(?string $selection): array
    {
        if (!$selection || !str_contains($selection, ':'))
        {
            abort(400, 'Ungültige Produktauswahl.');
        }

        return explode(':', $selection, 2); // [productId, interval]
    }

    private function prepareOrderedProduct(int|string $productId, string $interval)
    {
        $product = Product::where('id', $productId)->firstOrFail();
        $product->setAttribute('price', $product->priceFor($interval));
        $product->setAttribute('interval', $interval);

        return $product;
    }

    /**
     * Liefert [customerID, billingEmail, customerName].
     * Behandelt:
     * - bestehende MollieCustomer bei eingeloggtem User
     * - Neuanlage Mollie Customer (+ optional Company/User Update bei firstContract)
     * - optionales SEPA-Mandat
     * - persistiert TemporaryUserData
     */
    private function resolveCustomerContext(Request $request): array
    {
        $user = auth()->user();

        if ($user && $user->companies->isNotEmpty() && $user->companies[0]->mollieCustomer)
        {
            $mollieCustomer = $user->companies[0]->mollieCustomer;
            $customerID = $mollieCustomer->mollie_customer_id;
            $billingEmail = $user->companies[0]->email;
            $customerName = $user->name ?? '';

            return [$customerID, $billingEmail, $customerName];
        }

        // Neuanlage
        $name = trim(($request->input('user')['vorname'] ?? '') . ' ' . ($request->input('user')['name'] ?? ''));
        $email = $request->input('user')['email'] ?? null;
        $billingEmail = $request->input('company')['email'] ?? $email;

        $customer = Mollie::api()->customers->create([
            'name' => $name,
            'email' => $email,
        ]);
        $customerID = $customer->id;

        if ($request->boolean('firstContract'))
        {
            $this->updateCompanyAndAttachMollieCustomer($request, $customerID);
            $this->updateUserNameFromRequest($request);
        }

        if ($request->input('payment_method') === 'sepa')
        {
            $this->createSepaMandate($customerID, $name, $request->input('iban'));
        }

        // Temporäre Daten sichern
        TemporaryUserData::create([
            'mollie_customer_id' => $customerID,
            'user_data' => json_encode($request->input('user')),
            'company_data' => json_encode($request->input('company')),
        ]);

        return [$customerID, $billingEmail, $name];
    }

    private function updateCompanyAndAttachMollieCustomer(Request $request, string $customerID): void
    {
        $companyData = $request->input('company', []);
        $company = auth()->user()?->companies()->first();

        if ($company && !empty($companyData))
        {
            $company->update($companyData);

            MollieCustomer::create([
                'model_id' => $company->id,
                'model_type' => get_class($company),
                'mollie_customer_id' => $customerID,
            ]);
        }
    }

    private function updateUserNameFromRequest(Request $request): void
    {
        $userData = $request->input('user', []);
        $user = auth()->user();

        if ($user && !empty($userData))
        {
            $user->name = trim(($userData['vorname'] ?? '') . ' ' . ($userData['name'] ?? ''));
            $user->save();
        }
    }

    private function createSepaMandate(string $customerID, string $consumerName, ?string $ibanRaw): void
    {
        $iban = preg_replace('/\s+/', '', trim($ibanRaw ?? ''));
        if (!$iban)
        {
            return;
        }

        Mollie::api()
            ->customers
            ->get($customerID)
            ->createMandate([
                'method' => 'directdebit',
                'consumerAccount' => $iban,
                'consumerName' => $consumerName,
            ]);
    }

    private function isZeroOrInvoiceFlow($orderedProduct, Request $request): bool
    {
        return ($orderedProduct->payment_type === 'one_time' && (float)$orderedProduct->price <= 0)
            || (int)$request->input('pay_by_invoice') === 1;
    }

    /**
     * Abwicklung ohne Gateway:
     * - Company ermitteln/erstellen
     * - optional Coupon anwenden (beeinflusst orderedProduct->price)
     * - Contract erstellen
     * - ggf. Rechnung „Kauf auf Rechnung“ vorbereiten
     * - passende Redirect-URL zurückgeben
     */
    private function handleZeroOrInvoice(Request $request, $orderedProduct, string $customerID, string $interval)
    {
        $company = auth()->check()
            ? auth()->user()->companies[0]
            : $this->initCompanyAccount($customerID);

        $couponCode = $request->input('coupon_code') ?: null;
        // Finalpreis + Rabattzeile
        [$finalCents, $discountLine, $discountMeta] =
            $this->computePriceWithBreakdown($orderedProduct, $couponCode, $company);
        if (!empty($couponCode)) {
            // Einmalige Verwendung sicherstellen: sofort aus Session und Request entfernen
            session()->forget('coupon_code');
            $request->merge(['coupon_code' => null]);
        }

        // Produktpreis für Contract setzen
        $orderedProduct->price = $finalCents;
        $additionalData = [];
        if ($discountMeta)
        {
            $additionalData['discount'] = $discountMeta;
            $additionalData['bemerkung'] = $discountMeta['type'] === 'coupon'
                ? ('Produkt über Promocode #' . ($discountMeta['code'] ?? '') . ' erworben')
                : 'Agentur-Rabatt angewendet';
        }

        $contract = $this->createContract($company, $orderedProduct, false, Carbon::now(), $additionalData, $interval);

        // Rechnung bei Kauf auf Rechnung direkt vorbereiten – Rabattzeile übergeben
        if ((int)$orderedProduct->trial_period_days === 0)
        {
            $this->prepareInvoicePurchaseByInvoice($orderedProduct, $company, $contract, discountLine: $discountLine);
        }

        return auth()->check()
            ? url('dashboard/' . $company->id . '/upgrade-page')
            : route('view.plans') . '#step-4';
    }

    /**
     * Gibt [finalCents, discountLine|null, discountMeta|null] zurück.
     * - Coupon ODER Agentur (Coupon hat Vorrang)
     * - discountLine ist eine fertige negative Rechnungsposition (in Cent)
     * - discountMeta ist ein flaches Array für Payment-Metadata/Webhook
     */
    private function computePriceWithBreakdown($orderedProduct, ?string $couponCode, ?\App\Models\Company $company): array
    {
        // echo "-->".$orderedProduct->price;

        // Normalisiere Grundpreis auf Cent (unterstützt Euro- und Cent-Quelle)
        $baseRaw = $orderedProduct->price_cents ?? $orderedProduct->price; // kann Euro (99.90) oder Cent (9990) sein
        $baseCents = (int) (
            is_numeric($baseRaw)
                ? ($baseRaw < 1000 ? round(((float)$baseRaw) * 100) : round($baseRaw))
                : 0
        );

        // 1) Coupon
        if ($couponCode && ($coupon = Coupon::where('code', $couponCode)->first()))
        {
            $cpCtrl = new CouponController();
            $discountedDecimal = $cpCtrl->calculateTotalPrice($coupon->promotion, $orderedProduct, false); // Euro
            $finalCents = (int)round($discountedDecimal * 100);

            $discountAmount = $baseCents - $finalCents; // Cent
            $discountLine = $this->buildDiscountLineItem(
                title: 'Gutschein ' . $coupon->code,
                amountCents: -abs($discountAmount),
                taxRate: $orderedProduct->vat_rate ?? 0
            );

            $discountMeta = [
                'type' => 'coupon',
                'code' => $coupon->code,
                'amount_cents' => -abs($discountAmount),
                'vat_rate' => $orderedProduct->vat_rate ?? 0,
            ];

            return [$finalCents, $discountLine, $discountMeta];
        }

        // 2) Agency
        if ($company && $company->is_agency && $company->agency_discount_percent > 0)
        {
            $factor = max(0, 100 - (float)$company->agency_discount_percent) / 100;
            $finalCents = (int)round($baseCents * $factor);

            $discountAmount = $baseCents - $finalCents; // Cent
            $discountLine = $this->buildDiscountLineItem(
                title: 'Agentur-Rabatt ' . rtrim(rtrim((string)$company->agency_discount_percent, '0'), '.') . '%',
                amountCents: -abs($discountAmount),
                taxRate: $orderedProduct->vat_rate ?? 0
            );

            $discountMeta = [
                'type' => 'agency',
                'percent' => (float)$company->agency_discount_percent,
                'amount_cents' => -abs($discountAmount),
                'vat_rate' => $orderedProduct->vat_rate ?? 0,
            ];

            return [$finalCents, $discountLine, $discountMeta];
        }

        // 3) Kein Rabatt
        return [$baseCents, null, null];
    }

    /**
     * Baut eine negative Rechnungsposition (Rabattzeile).
     * amountCents NEGATIV übergeben (z. B. -1500 für -15,00 €)
     */
    private function buildDiscountLineItem(string $title, int $amountCents, float $taxRate = 0.0): array
    {
        return [
            'title' => $title,
            'quantity' => 1,
            'unit_price_cents' => $amountCents,              // negativ
            'total_cents' => $amountCents,              // negativ
            'vat_rate' => $taxRate,                  // z. B. 19.0
            'is_discount' => true,
        ];
    }

    /**
     * Berechnet den endgültigen Preis in Cent (Coupon berücksichtigt).
     * Verändert nicht das Produkt-Objekt – gibt nur den Zielpreis zurück.
     */
    private function computePriceCents($orderedProduct, ?string $couponCode): int
    {
        $baseCents = (int)round($orderedProduct->price);

        if (!$couponCode)
        {
            return $baseCents;
        }

        $coupon = Coupon::where('code', $couponCode)->first();
        if (!$coupon)
        {
            return $baseCents;
        }

        $cpCtrl = new CouponController();
        $discountedDecimal = $cpCtrl->calculateTotalPrice($coupon->promotion, $orderedProduct, false); // Euro

        return (int)round($discountedDecimal * 100);
    }

    /**
     * Passt den Produktpreis (Cent) an, wenn Coupon vorliegt.
     * Wird im Zero-/Invoice-Flow benötigt, weil dort der Produktpreis für Contract/Invoice verwendet wird.
     */
    private function applyCouponToProduct($orderedProduct, string $couponCode, array &$additionalData): void
    {
        $coupon = Coupon::where('code', $couponCode)->first();
        if (!$coupon)
        {
            return;
        }

        $cpCtrl = new CouponController();
        $discountedDecimal = $cpCtrl->calculateTotalPrice($coupon->promotion, $orderedProduct, false);
        $orderedProduct->price = (int)round($discountedDecimal * 100);

        $additionalData['promotion'] = $coupon->promotion;
        $additionalData['bemerkung'] = 'Product über Promocode #' . $couponCode . ' erworben';
    }

    private function buildMetadata(Request $request, $productId, string $interval, string $customerID, ?string $couponCode): array
    {
        $metadata = [
            'product_id' => $productId,
            'interval' => $interval,
            'customer_id' => $customerID,
            'company' => $request->input('company')['name'] ?? '',
            'coupon_code' => $couponCode ?: '0',
            'company_id' => $request->input('company_id') ?? '0',
        ];

        return $metadata;
    }

    private function buildItemDescription($orderedProduct): string
    {
        $raw = $orderedProduct->invoice_text ?: $orderedProduct->description;
        $clean = FormatHelper::stripHtmlButKeepSpaces($raw);

        return Str::limit($clean, $this->descriptionLength, '...');
    }

    private function redirectUrlFor(Request $request): string
    {
        if ($request->input('company_id'))
        {
            return url('dashboard/' . $request->input('company_id') . '/upgrade-page');
        }

        return url('preise#step-4');
    }

    /**
     * Erzeugt das Mollie-Payment. Beachtet den „first“-SequenceType bei Customer-Zahlungen.
     * Wenn one_time und Produktpreis <= 0 (Edge-Case), wird ohne customerId angelegt (wie zuvor).
     */
    private function createMolliePayment(
        int    $priceCents,
        string $currency,
        string $billingEmail,
        string $description,
        string $redirectUrl,
        string $webhookUrl,
        array  $metadata,
        string $customerID,
               $orderedProduct
    )
    {
        $amount = [
            'currency' => $currency,
            'value' => number_format($priceCents / 100, 2, '.', ''),
        ];

        $common = [
            'amount' => $amount,
            'billingEmail' => $billingEmail,
            'description' => $description,
            'redirectUrl' => $redirectUrl,
            'webhookUrl' => $webhookUrl,
            'metadata' => $metadata,
        ];

        $methods = ["creditcard", "directdebit", "sofort", "klarnapaylater", "ideal", "paypal", "banktransfer"];

        // Historisches Verhalten beibehalten:
        if ($orderedProduct->payment_type === 'one_time' && (float)$orderedProduct->price <= 0)
        {
            return Mollie::api()->payments->create(array_merge($common, [
                'method' => $methods,
            ]));
        }

        // Customer-gebundenes „first“-Payment
        return Mollie::api()->payments->create(array_merge($common, [
            'customerId' => $customerID,
            'sequenceType' => 'first',
            'method' => $methods,
        ]));
    }


    private function prepareInvoicePurchaseByInvoice($orderedProduct, $company, $contract, ?array $discountLine = null)
    {
        $tax_rate = (float)config('accounting.tax_rate'); // z. B. 19.0
        $final_gross = round(((int)$orderedProduct->price) / 100, 2); // € brutto nach Rabatt

        if ($final_gross <= 0.0)
        {
            return;
        }

        // Rabatt-Brutto (positiver Betrag in €), falls vorhanden
        $discount_gross = 0.0;
        $discount_title = null;

        if ($discountLine) {
            // akzeptiere mehrere mögliche Schlüsselnamen aus buildDiscountLineItem()
            $cents = $discountLine['amount_cents']
                ?? $discountLine['total_cents']
                ?? $discountLine['unit_price_cents']
                ?? null;

            if ($cents !== null) {
                $discount_gross = round(abs((int) $cents) / 100, 2);
                $discount_title = $discountLine['title'] ?? 'Rabatt';
            }
        }

        // Basis-Position: Brutto vor Rabatt = final + rabatt
        $base_gross = round($final_gross + $discount_gross, 2);

        // Netto/Steuer je Position
        $divisor = 1 + ($tax_rate / 100);
        $base_net = round($base_gross / $divisor, 2);
        $base_tax = round($base_gross - $base_net, 2);

        $disc_net = round($discount_gross / $divisor, 2);
        $disc_tax = round($discount_gross - $disc_net, 2);

        // Gesamtsummen der Rechnung
        $total_net = round($base_net - $disc_net, 2);
        $tax = round($base_tax - $disc_tax, 2);
        $total_gross = round($final_gross, 2); // sollte = base_gross - discount_gross sein

        // Positionen bauen (netto-Beträge)
        $descriptionText = FormatHelper::stripHtmlButKeepSpaces($orderedProduct->invoice_text ?: $orderedProduct->description);
        $itemDescription = Str::limit($descriptionText, $this->descriptionLength, '...');

        $items = [
            [
                'id' => '1',
                'description' => $itemDescription,
                'quantity' => 1,
                'line_total_amount' => $base_net,     // netto
            ],
        ];

        if ($discount_gross > 0.0)
        {
            $items[] = [
                'id' => '2',
                'description' => $discount_title,
                'quantity' => 1,
                'line_total_amount' => -$disc_net,    // netto negativ
                // optional kannst du hier weitere Flags setzen (z. B. 'is_discount' => true)
            ];
        }

        $invoiceData = [
            'company_id' => $company->id,
            'contract_id' => $contract->id,
            'issue_date' => now()->format('Y-m-d'),
            'mollie_payment_id' => null,
            'due_date' => \Carbon\Carbon::now()->addWeekdays(10)->format('Y-m-d'),
            'payment_date' => null,
            'total_net' => $total_net,
            'total_gross' => $total_gross,
            'tax' => $tax,
            'tax_rate' => $tax_rate,
            'status' => 'sent',
            'data' => [
                'items' => $items,
            ],
        ];

        $invoiceService = new InvoiceService();
        $invoiceService->createInvoice($invoiceData);
        $invoiceService->sendInvoiceEmail();
    }

    /**
     * email check auf uniqueness
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkEmail(Request $request)
    {
        $emailExists = User::where('email', $request->email)->exists();

        return response()->json(['exists' => $emailExists]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function showPlans(Request $request)
    {

        $products = Product::where(['active' => 1, 'visible' => 1])
            ->orderBy('payment_type')->orderBy('sequence')->get();


        return view('checkout', ['products' => $products]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function checkoutUpgrade(Product $product, Request $request)
    {
        $interval = $request->input('interval');

        // Sicherheitsprüfung
        if (!$interval || !in_array($interval, ['monthly', 'annual', 'one_time']))
        {
            abort(400, 'Ungültiges Intervall.');
        }

        // Preis für dieses Intervall holen
        $priceModel = $product->prices()->where('interval', $interval)->first();
        if (!$priceModel)
        {
            abort(404, 'Kein Preis für dieses Intervall gefunden.');
        }

        // Preis vorbereiten
        $priceFormatted = number_format($priceModel->price / 100, 2, ',', '.');

        // Optional: Coupon aus Session
        $couponCode = session('coupon_code');

        session()->put('selectedProductSelection', "{$product->id}:{$interval}");

        // Weitergabe an View
        return view('checkout-upgrade', [
            'product' => $product,
            'interval' => $interval,
            'price' => $priceFormatted,
            'coupon' => $couponCode,
            // ggf. weitere Variablen wie Trial-Ends, etc.
        ]);
    }

    /**
     * Produktdetails für die Checkout-Zusammenfassung im Smart Wizard abrufen
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductDetails(Request $request)
    {
        // 1) Ziehe nur noch product_selection (z.B. "3:annual")
        $selection = $request->input('product_selection');
        $couponCode = $request->input('coupon_code', '');

        if (!$selection || !str_contains($selection, ':'))
        {
            return response()->json(['error' => 'Ungültige Produktauswahl.'], 400);
        }
        [$productId, $interval] = explode(':', $selection, 2);

        // 2) Lade Produkt und den passenden Preis
        $product = Product::find($productId);
        if (!$product)
        {
            return response()->json(['error' => 'Produkt nicht gefunden.'], 404);
        }
        $priceModel = $product->prices()->where('interval', $interval)->first();
        if (!$priceModel)
        {
            return response()->json(['error' => 'Kein Preis für dieses Intervall gefunden.'], 404);
        }

        // 3) Basis-Antwort aufbauen
        $basePriceCents = $priceModel->price;
        $formattedBase = number_format($basePriceCents / 100, 2, ',', '.');

        $productDetails = [
            'name' => $product->name,
            'description' => $product->description,
            'price_cents' => $basePriceCents,        // <— Integer Cent-Wert
            'formattedPrice' => $formattedBase,         // <— String für Anzeige
            'interval' => $interval,
            'trial_period_days' => $product->trial_period_days,
            'laufzeit' => $product->lz,
        ];

        // 4) Rabattcode
        if ($couponCode && $coupon = Coupon::where('code', $couponCode)->first())
        {
            $type = $coupon->promotion->discount_type === 'fixed'
                ? $coupon->promotion->formatted_discount . ' €'
                : $coupon->promotion->formatted_discount . ' %';

            $cpCtrl = new CouponController;

            $subtotal = $cpCtrl->calculateTotalPrice($coupon->promotion, $priceModel, false) ?? 0;
            $formattedSubtotal = number_format($subtotal, 2, ',', '.');


            $productDetails = [
                'name' => $product->name,
                'description' => $product->description
                    . "<br>Aktionscode: <b>{$coupon->code}</b> angewendet.<br>"
                    . $coupon->promotion->description
                    . "<br><span style=\"display:inline-block;text-align:right;\">"
                    . "<b>{$formattedBase} €</b><br><b>&minus; {$type}</b>"
                    . "</span>",
                'formattedPrice' => $formattedSubtotal, // <— formatiert für Anzeige
                'interval' => $interval,
                'trial_period_days' => $product->trial_period_days,
                'has_discount' => true,
                'discountedPriceCents' => $subtotal * 100,          // <— evtl. extra Feld
            ];
        }

        return response()->json($productDetails);
    }

}
