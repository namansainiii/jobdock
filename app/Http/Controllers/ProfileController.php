<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse{
        //get logged in user
        $user = Auth::user();

        //validate data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => ['required','email',Rule::unique('users')->ignore($user->id),],
            'avatar' => 'nullable|image|mimes:jog,jpeg,png|max:2048',
        ]);

        
        //check for image
        if($request->hasFile('avatar')){
            //Delete old images if exist
            // if($user->avatar){
            //    Storage::delete('public/avatar/' . basename($user->avatar));
            // }

            if($user->avatar){
                Storage::disk('public')->delete($user->avatar);
            }

            //store the file and get path
            $path = $request->file('avatar')->store('avatar' , 'public');

            //add path to db
            $validatedData['avatar'] = $path;
        }

        //update user info
        $user->update($validatedData);

        return redirect()->route('dashboard.index')->with('success' , 'Profile Update Successfully!');
    }
}
