<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(){
        return view('student.profile.index');
    }

    public function edit(): View
    {

        // return view('profile.edit', [
        //     'user' => $request->user(),
        // ]);
        return view('student.profile.edit');
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }
    // public function update(ProfileUpdateRequest $request): JsonResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return response()->json(['message' => translate('updated_message', ['text' => 'Profile'])]);
    // }

    // public function update(Request $request, User $user)
    // {
    //     $request->validate([
    //         'student_id'=>'required',
    //         'name' => 'required',
    //         'email' =>'required|email',

    //     ]);
    //     // dd($request->all());
    //     $user->update([
    //             'name'=>$request->name,
    //             'email'=>$request->email,
    //             'phone'=>$request->phone,
    //             'dob'=>$request->dob,
    //             'gender'=>$request->gender
    //     ]);
    //     return response()->json(['message' => 'Profile updated successfully']);
    // }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
