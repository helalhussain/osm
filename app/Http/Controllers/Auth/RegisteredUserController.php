<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Notifications\EmailNotification;
use Illuminate\View\View;
use App\Models\Setting;
use App\Models\Classroom;
// use App\Http\Controllers\Auth\gs();
use App\Models\Payment;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $tution_fee = Setting::all();
        $classes = Classroom::all();
        return view('auth.register',compact('tution_fee','classes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'studentId' => ['required'],
            'class' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);




            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

            $redirectUrl = route('stripe.checkout.success').'?session_id={CHECKOUT_SESSION_ID}';

            $response = $stripe->checkout->sessions->create([
                'success_url' => $redirectUrl,

                'customer_email' => $request->email,

                'payment_method_types' => ['link','card'],

                'line_items' => [
                    [
                        'price_data' => [
                            'product_data' => [
                                'name' => $request->name,
                                // 'email' => $request->email,
                            ],
                            'unit_amount' => 100,
                            'currency' => 'USD',
                        ],
                        'quantity' => 1
                    ],
                ],

                'mode' => 'payment',
                'allow_promotion_codes' => true,
            ]);
            $user = User::create([
                'name' => $request->name,
                'student_id' => $request->studentId,
                'classroom_id' => $request->class,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'in_active' =>'deactive',
            ]);
            return redirect($response['url']);
            // return json_encode($send);
            // event(new Registered($user));
            // $user->notify(new EmailNotification());
            // Auth::login($user);

            return redirect(RouteServiceProvider::HOME);




    }

}
