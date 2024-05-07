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

    // public function edit(): View
    // {
    //     return view('profile.edit', [
    //         'user' => $request->user(),
    //     ]);
    //     return view('student.profile.edit');
    // }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();
    //     return response()->json([
    //         'message' => 'Profile update successfully'
    //     ]);
    //     return Redirect::route('profile.index')->with('status', 'profile-updated');
    // }

    // public function update(ProfileUpdateRequest $request): JsonResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return response()->json(['message' => translate('updated_message', ['text' => 'Profile'])]);
    // }

    // public function update(Request $request)
    // {
    //     $request->validate([

    //         'name' => 'required',


    //     ]);
    //     // dd($request->all());
    //     $user->update([
    //             'name'=>$request->name,
    //     ]);
    //     return response()->json(['message' => 'Profile updated successfully']);
    // }
    /**
     * Delete the user's account.
     */
    public function show()
     {
         return view('student.profile.show');
     }


    /**
     * Show the form for editing the specified resource.
    */
        public function edit()
        {

            return view('student.profile.edit');
        }

        /**
         * Update the specified resource in storage.
        */
            public function password()
            {
                return view('student.profile.password');
            }

        public function update(Request $request)
        {
            $request->validate([
                'name'  => ['required','string','max:20'],
                // 'email' => ['required','email','string','unique:admins,email,'.auth()->id()],
                'image' => ['nullable','image',image_allowed_extensions(),'max:512']
            ]);

            $user = User::find(auth()->id());

            $user->update([
                'name'  => $request->name,
                'phone'  => $request->phone,
                'dob'=>$request->date,
                'gender'  => $request->gender,
                'address'  => $request->address,
                'image'  => $request->hasFile('image') ? file_upload($request->image, 'user', $user->image) : $user->image
            ]);

            return response()->json([
                'message' => 'Student updated successfully'
            ]);
        }



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
