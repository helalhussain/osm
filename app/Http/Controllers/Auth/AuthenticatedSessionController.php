<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // return request()->is('admin*') ? view('admin.login') : view('auth.login');
        if(request()->is('administator*'))
        {
            return view('administator.login');
        }
        elseif(request()->is('admin*'))
        {
           return view('admin.login');
        }

        elseif(request()->is('teacher*'))
        {
            return view('teacher.login');
        }
        else
        {
            return view('auth.login');
        }
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(request()->is('admin*') ? RouteServiceProvider::DASHBOARD : RouteServiceProvider::HOME);
        if(request()->is('administator*')){
            $redirect= RouteServiceProvider::ADMINISTATOR_DASHBOARD;
        }
        elseif(request()->is('admin*')){
            $redirect = RouteServiceProvider::DASHBOARD;
         }
        elseif(request()->is('teacher*')){
            $redirect = RouteServiceProvider::TEACHER_DASHBOARD;
         }
        else{
            $redirect =RouteServiceProvider::HOME;
        }

        // $redirect = isAdminUrlRequest() ? RouteServiceProvider::DASHBOARD : RouteServiceProvider::HOME;
        return redirect()->intended($redirect);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Auth::guard('web')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        // return redirect('/');

            // Auth::guard(request()->is('admin*') ? 'admin':'web')->logout();
        if(request()->is('administator*')){
            Auth::guard('administator')->logout();
        }

        elseif(request()->is('admin*')){
            Auth::guard('admin')->logout();
        }

        elseif(request()->is('teacher*')){
            Auth::guard('teacher')->logout();
        }
        
        else{
            Auth::guard('web')->logout();
        }
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // return request()->is('admin*') ? to_route('admin.login') : to_route('login');
            if(request()->is('administator*'))
            {
                return to_route('administator.login');
            }
            elseif(request()->is('admin*'))
            {
                return to_route('admin.login');
            }
            elseif(request()->is('teacher*'))
            {
                return to_route('teacher.login');
            }
            else{
               return  to_route('login');
            }


    }
}
