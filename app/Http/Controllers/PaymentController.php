<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function process($amount)
    {
        $general = gs();
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => strtolower($general->currency_text),
                        'unit_amount' => round($amount, 2) * 100,
                        'product_data' => [
                            'name' => $general->site_name,
                            'description' => 'Payment  with Stripe',
                            // 'images' => [uploaded_file('assets/images/logoIcon/logo.png')],
                        ],
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'cancel_url' => route('payment.callback', 'cancel'),
                'success_url' => route('payment.callback', 'success'),
            ]);
        } catch (\Exception $e) {
            $send['error'] = true;
            $send['message'] = $e->getMessage();
            return json_encode($send);
        }

        $send['session'] = $session;

        return json_encode($send);
    }


    /**
     * Payment callback
     *
     */
    public function callback($status)
    {
        if (!session()->has('track')) {
            return redirect()->to('/');
        }

        $payment = Payment::with('order','order.orderDetails','order.orderDetails.book:id,name')->where('trx', session()->get('track'))->first();

        $payment->status = $status;
        $payment->save();

        $email = $payment->order?->billing_info?->email;

        Mail::to($email)->send(new InvoiceMail($payment));

        session()->forget('track');
        return view('frontend.payment_status', compact('payment'));
    }
}
