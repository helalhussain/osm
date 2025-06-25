<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;

class ActiveMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $student_deactive = User::Where('in_active','=','deactive')->get();
        // if($student_deactive){

        //         return redirect()->route('dashboard');

        // }
        $student_auth_id = auth()->user()->id;
        $student_active = User::find($student_auth_id);
        if($student_active->in_active=='active'){
            return $next($request);


        }else{
            return redirect()->back()->with('success','Unauthorize');
        }


    }
}
