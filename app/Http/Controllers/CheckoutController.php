<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Order;
use App\Models\Payment;
use App\Models\OrderDetail;

class CheckoutController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }
    public function store(Request $request)
    {
        $cartQtyTotal = $request->totalCartQuantity;
        $amount = $request->amount;

        $new  = new PaymentController;
        $data = $new->process($amount);
        $data = json_decode($data);

        if (isset($data->error)) {
            return response()->json([
                'message' => $data->message
            ], 300);
        }

        $order = Order::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'billing_info' => [
                'first_name' => $request->first_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'phone'      => $request->phone,
                'address'    => $request->address,
                'address2'   => $request->address2,
                'city'       => $request->city,
                'state'      => $request->state,
                'zipcode'    => $request->zipcode,
                'country'    => $request->country
            ],
            'additional_info' => $request->additional_info,
        ]);

        // foreach (cart_data() as $cart) {
        //     $price = getCartBinding($cart->id, $cart->binding);
        //     OrderDetails::create([
        //         'order_id'    => $order->id,
        //         'product_id'  => $cart->id?->product_id,
        //         'binding'     => $cart->binding,
        //         'price'       => $price,
        //         'quantity'    => $cart->quantity,
        //         'total_price' => $price * $cart->quantity
        //     ]);
        // }

        $payment = Payment::create([
            'order_id'    => 13,
            'amount'      => ($request->has('payment') && $request->has('trx_id')) ? $amount : $cartQtyTotal,
            // 'charge'      => ($request->has('payment') && $request->has('trx_id')) ? 0 : $cartQtyTotal->shipping,
            'charge'     => 10,
            'grand_total' => ($request->has('payment') && $request->has('trx_id')) ? $amount : $cartQtyTotal,
            'trx'         => ($request->has('payment') && $request->has('trx_id')) ? $amount : $cartQtyTotal,
        ]);

        $payment->btc_wallet = $data->session->id;
        $payment->save();

        session()->forget('cart');
        session()->put('track', $payment->trx);

        return redirect('');

        // return response()->json([
        //     'redirect' => $data->session->url
        //     ]);
    }

}
