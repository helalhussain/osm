<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    public function stripe()
    {
        // return view('stripe');
        return view('auth.login');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    // public function stripeCheckout(Request $request)
    // {
    //     $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

    //     $redirectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';

    //     $response = $stripe->checkout->sessions->create([
    //         'success_url' => $redirectUrl,

    //         'customer_email' => 'demo@gmail.com',

    //         'payment_method_types' => ['link','card'],

    //         'line_items' => [
    //             [
    //                 'price_data' => [
    //                     'product_data' => [
    //                         'name' => "Tution fee",
    //                     ],
    //                     'unit_amount' => 100,
    //                     'currency' => 'USD',
    //                 ],
    //                 'quantity' => 1
    //             ],
    //         ],

    //         'mode' => 'payment',
    //         'allow_promotion_codes' => true,
    //     ]);

    //     return redirect($response['url']);
    // }

    public function stripeCheckoutSuccess(Request $request)
    {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        
        $response = $stripe->checkout->sessions->retrieve($request->session_id);

        return redirect()->route('stripe.index')
                            ->with('success','Payment successful.');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->amount,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $request->description
        ]);


        Session::flash('success', 'Payment successful!');

        return back();
    }
    // public function stripePost(Request $request)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create ([
    //             "amount" => $request->amount,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => $request->description
    //     ]);


    //     Session::flash('success', 'Payment successful!');

    //     return back();
    // }
}
