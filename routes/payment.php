<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// tests

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\CreateSubscriptionController;

use App\Http\Controllers\MollieTestController;
use App\Http\Controllers\MolliePaymentController;

use App\Http\Controllers\InvoiceController;

// invoiceing

Route::get('invoices/create', [InvoiceController::class, 'create'])->name('invoices.create');

Route::get('/invoice/pdf/{id}', [InvoiceController::class, 'generatePDF']);
Route::get('/invoices/{rg_nr}/show', [InvoiceController::class, 'showInvoice'])->name('invoices.pdf');

// ende ivoices


//subscriptiopn test
Route::get('/subscription', [CheckoutController::class, 'subscription'])->name('subscription');

Route::get('/mollietest', [CheckoutController::class, 'mollietest'])->name('mollietest');
Route::get('/subscriptiontest', [CheckoutController::class, 'subscriptiontest'])->name('subscriptiontest');

Route::post('/check-email', [CheckoutController::class, 'checkEmail']);

//Route::get('/get-product-details', [CheckoutController::class, 'getProductDetails']);
//
Route::get('/mollie/payment/test', [MolliePaymentController::class, 'test']);

Route::post('/mollie/payment', [MolliePaymentController::class, 'handlePaymentNotification'])->name('mollie.paymentWebhook');
Route::post('/mollie/subscription', [MolliePaymentController::class, 'handleSubscriptionWebhook'])->name('mollie.subscriptionWebhook');

Route::get('/get-product-details', [CheckoutController::class, 'getProductDetails'])->name('getProductDetails'); // route für ajax um beim checkout das produkt vom server zu holen um die zusammenfassung in smartwizzard anzuzeigen
// ende testroute

Route::get('/upgrade/{product}', [CheckoutController::class, 'checkoutUpgrade'])->name('view.upgrade');
Route::get('/preise', [CheckoutController::class, 'showPlans'])->name('view.plans');

Route::get('/register', [CheckoutController::class, 'showPlans']);

Route::post('/checkout', [CheckoutController::class, 'preparePayment'])->name('checkout.plan');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('order.success');

Route::post('/webhooks/mollie', [CheckoutController::class, 'handleWebhookNotification'])->name('ng-webhook');
/*Route::post('/webhooks/mollie/first-payment', [CheckoutController::class, 'handleWebhookNotification'])->name('webhooks.mollie-first');
Route::get('/webhooks/mollie/first-payment', [CheckoutController::class, 'handleWebhookNotification'])->name('webhooks.mollie-frst');*/


Route::get('/mollie/subscribe', [CheckoutController::class, 'newSubscription']);
Route::post('/molliesubscription', CreateSubscriptionController::class)->name('checkout.plan-mollie');


//Route::post('/webhooks/mollie', [WebhookController::class, 'handleWebhook'])->name('ng-webhook');

// molllie test

Route::get('/mollie/index', [MollieTestController::class, 'index']);
Route::get('/mollie/create-subscription', [MollieTestController::class, 'createSubscription']);


// ende mollie test
