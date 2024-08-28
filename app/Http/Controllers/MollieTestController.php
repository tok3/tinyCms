<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class MollieTestController extends Controller
{
    //




    public function index(){
        $company = Company::find(7);
        $company->newSubscription('main', 'gold')->create();
        $this->charges();
        die();
        $company = Company::find(5);
        /*
         $invoices = $company->invoices();
         echo "<pre>";
         print_r($invoices);
         echo "</pre>";


         if ($company->subscribed('gold')) {
             //

        echo "yep";
         }

         die();*/
        $company->newSubscription('main', 'gold')
            ->withCoupon('go2024')
            ->create();
    }


//https://github.com/mollie/laravel-cashier-mollie/blob/main/docs/04-charges.md

public function charges(){


    $company = Company::find(3);

    $item = new \Laravel\Cashier\Charge\ChargeItemBuilder($company);
    $item->unitPrice(money(100,'EUR')); //1 EUR
    $item->description('Test Item 1');
    $chargeItem = $item->make();

    $item2 = new \Laravel\Cashier\Charge\ChargeItemBuilder($company);
    $item2->unitPrice(money(200,'EUR'));
    $item2->description('Test Item 2');
    $chargeItem2 = $item2->make();

    $result = $company->newCharge()
        ->addItem($chargeItem)
        ->addItem($chargeItem2)
        ->setRedirectUrl(url('/'))
        ->create();

    if(is_a($result, \Laravel\Cashier\Http\RedirectToCheckoutResponse::class)) {
        return $result;
    }

    return back()->with('status', 'Thank you.');

}
    public function createSubscription()
    {

        $company = Company::find(1);

// Make sure to configure the 'premium' plan in config/cashier_plans.php
        $result = $company->newSubscription('main', 'premium')->create();
    }
}
