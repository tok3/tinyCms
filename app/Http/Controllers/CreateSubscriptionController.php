<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Laravel\Cashier\SubscriptionBuilder\RedirectToCheckoutResponse;
use Illuminate\Support\Facades\Auth;

class CreateSubscriptionController extends Controller
{
    /**
     * @param string $plan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        $plan = $request->input('plan');

        $company = Company::find(2);
        $name = ucfirst($plan) . ' membership';

        if(!$company->subscribed($name, $plan)) {

            $result = $company->newSubscription($name, $plan)->create();


            if(is_a($result, RedirectToCheckoutResponse::class)) {

                return $result; // Redirect to Mollie checkout
            }

            return back()->with('status', 'Welcome to the ' . $plan . ' plan');
        }

        return back()->with('status', 'You are already on the ' . $plan . ' plan');
    }
}
