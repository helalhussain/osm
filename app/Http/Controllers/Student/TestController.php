<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Payment;
use Auth;


class TestController extends Controller
{

    public function payment(Request $request)
    {

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        // dd($stripe);
        $request->validate([

        ]);


        $classroom = $request->classroom;

        $user_id = auth()->user()->id;


// dd($course);
            $redirectUrl = route('success').'?session_id={CHECKOUT_SESSION_ID}';

            $store = new Payment();
            $store->user_id = auth()->user()->id;
            $store->amount =$request->fee;
            $store->classroom_id = $request->classroom_id;
            $store->course_id = $request->course_id;
            $store->status = 'success';
            $store->save();


            $response = $stripe->checkout->sessions->create([

                'success_url' => $redirectUrl,

                'customer_email' => auth()->user()->email,

                'payment_method_types' => ['link','card'],

                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' =>  $request->course,
                                // 'email' => $request->email,
                            ],
                            'unit_amount' => $request->fee*100,
                            'currency' => 'USD',
                        ],
                        'quantity' => 1
                    ],
                ],

                'mode' => 'payment',
                'allow_promotion_codes' => true,
            ]);



            // $store = new Payment();
            // $store->user_id = auth()->user()->id;
            // $store->amount = 220;
            // $store->classroom_id = $request->classroom;
            // $store->course_id = $request->course;
            // $store->status = 'success';
            // $store->save();


            return redirect($response['url']);
            // return json_encode($send);
            // event(new Registered($user));
            // $user->notify(new EmailNotification());
            // Auth::login($user);

            return redirect(RouteServiceProvider::HOME);



    }


    public function success(Request $request)
    {

        return redirect()->back()->with('success', 'Payment Successfull!');
    }
    public function payment_success(Request $request)
    {
        return view('auth.login');
    }
    public function cancel(Request $request)
    {

    }
}
