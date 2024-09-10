<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// tests

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WebhookController;
use App\Http\Controllers\CreateSubscriptionController;

use App\Http\Controllers\MollieTestController;


Route::get('/preise', [CheckoutController::class, 'showPlans'])->name('view.plans');

Route::post('/checkout', [CheckoutController::class, 'preparePayment'])->name('checkout.plan');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('order.success');
Route::get('/webhooks/mollie', [CheckoutController::class, 'handleWebhookNotification'])->name('webhooks.mollie');
Route::post('/webhooks/mollie/first-payment', [CheckoutController::class, 'handleWebhookNotification'])->name('webhooks.mollie-first');
Route::get('/webhooks/mollie/first-payment', [CheckoutController::class, 'handleWebhookNotification'])->name('webhooks.mollie-frst');


Route::get('/mollie/subscribe', [CheckoutController::class, 'newSubscription']);
Route::post('/molliesubscription', CreateSubscriptionController::class)->name('checkout.plan-mollie');


Route::post('/webhooks/mollie', [WebhookController::class, 'handleWebhook'])->name('ng-webhook');

// molllie test

Route::get('/mollie/index', [MollieTestController::class, 'index']);
Route::get('/mollie/create-subscription', [MollieTestController::class, 'createSubscription']);


// ende mollie test
