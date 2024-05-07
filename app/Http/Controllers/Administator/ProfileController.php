<?php

namespace App\Http\Controllers\Administator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Administator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show()
    {
        return view('administator.profile.show');
    }


/**
 * Show the form for editing the specified resource.
 */
public function edit()
{

    return view('administator.profile.edit');
}

/**
 * Update the specified resource in storage.
 */
// public function password()
// {
//     return view('administator.profile.password');
// }
public function update(Request $request)
{

    $request->validate([
        'name'  => ['required','string','max:20'],
        // 'email' => ['required','email','string','unique:administators,email,'.auth()->id()],
        'image' => ['nullable','image',image_allowed_extensions(),'max:512']
    ]);

    $administator = Administator::find(auth()->id());

    $administator->update([
        'name'  => $request->name,
        'image'  => $request->hasFile('image') ? file_upload($request->image, 'administator', $administator->image) : $administator->image
    ]);

    return response()->json([
        'message' => 'Administator updated successfully'
    ]);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
