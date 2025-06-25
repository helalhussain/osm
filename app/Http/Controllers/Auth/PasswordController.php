<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Session;
Session_start();

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);
        return redirect()->route('show');
        // return back()->with('status', 'password-updated');
    }


    // public function update(Request $request): JsonResponse
    // {
    //     $validated = $request->validateWithBag('updatePassword', [
    //         'current_password' => ['required', 'current_password'],
    //         'password' => ['required', Password::defaults(), 'confirmed'],
    //     ]);

    //     $request->user(request()->is('admin*') ? 'admin':'web')->update([
    //         'password' => Hash::make($validated['password']),
    //     ]);

    //     return response()->json([
    //         'message' => 'Password updated successfully'
    //     ]);
    //     return redirect()->route('admin.profile.show');

    //     if(request()->is('admin*'))
    //     {
    //         return redirect()->route('admin.profile.show');
    //     }
    //     elseif(request()->is('web*'))
    //     {
    //         return redirect()->route('profile.show');
    //     }else{

    //     }
    //     // return redirect()->back()->with('success', 'password-updated');

    // }
}
