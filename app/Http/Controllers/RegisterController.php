<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function register():View {
        return view('auth.register');
    }

    public function store(Request $request):RedirectResponse {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        //hash the password
        $validatedData['password'] = Hash::make($validatedData['password']);

        //create the user 
        $user = User::create($validatedData);

        return redirect()->route('login')->with('success' , 'User Created Successfully! Please Login.');
    }
}
