<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request): RedirectResponse
    {
        //get logged in user
        $user = Auth::user();

        //define validation rules depending on role
        if ($user->role === 'company') {
            $rules = [
                'name'              => 'required|string',
                'email'             => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'avatar'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'company_about'     => 'nullable|string',
                'technologies_used' => 'nullable|string',
                'contact_phone'     => 'nullable|string',
                'contact_email'     => 'nullable|email',
            ];
        } else {
            $rules = [
                'name'              => 'required|string',
                'email'             => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                'avatar'            => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'resume_path'       => 'nullable|file|mimes:pdf|max:5120',
                'about_me'          => 'nullable|string',
                'skills'            => 'nullable|string',
                'education'         => 'nullable|string',
                'contact_phone'     => 'nullable|string',
                'contact_email'     => 'nullable|email',
            ];
        }

        //validate data
        $validatedData = $request->validate($rules);

        // Explicitly set boolean checkbox flag
        $validatedData['show_phone_to_others'] = $request->has('show_phone_to_others');

        // --- Handle avatar upload ---
        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $path = $request->file('avatar')->store('avatars', 'public');
            $validatedData['avatar'] = $path;
        } else {
            // Don't overwrite avatar if no new file was uploaded
            unset($validatedData['avatar']);
        }

        // --- Handle resume upload ---
        if ($request->hasFile('resume_path')) {
            // Delete old resume if one exists
            if ($user->resume_path) {
                Storage::disk('public')->delete($user->resume_path);
            }

            $resumePath = $request->file('resume_path')->store('resumes', 'public');
            $validatedData['resume_path'] = $resumePath;
        } else {
            // Don't overwrite resume if no new file was uploaded
            unset($validatedData['resume_path']);
        }

        // Update user info
        $user->update($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Profile updated successfully!');
    }

    public function deleteResume(): RedirectResponse
    {
        $user = Auth::user();

        if ($user->resume_path) {
            Storage::disk('public')->delete($user->resume_path);
            $user->update(['resume_path' => null]);
        }

        return redirect()->route('dashboard.index')->with('success', 'Resume removed successfully!');
    }
}
