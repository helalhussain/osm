<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Payment;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Course::query();

        if($request->ajax()){
        //    $students = $query->where('name','LIKE','%'.$request->name.'%')->get();
           $courses = $query->where('classroom_id',$request->title)->get();
           $subjects = Subject::all();

            return response()->json(['courses'=>$courses,'subjects'=>$subjects]);
        }else{
            $classrooms = Classroom::all();
        
            $courses = $query->get();
            return view('student.course.index',compact('classrooms','courses'));
        }
    }

    // public function show_fee(){

    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([

        ]);


        $classroom = $request->$classroom;
        $course = $request->$course;
        $user_id = auth()->user()->id;

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

            return redirect($response['url']);
            // return json_encode($send);
            // event(new Registered($user));
            // $user->notify(new EmailNotification());
            // Auth::login($user);

            return redirect(RouteServiceProvider::HOME);




    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
