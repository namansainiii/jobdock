<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class LoginController extends Controller
{
    public function login():View {
        return view('auth.login');
    }


    public function authenticate(Request $request):RedirectResponse {
        $loginDetails = $request->validate([
            'email' => 'required|string|email|max:100',
            'password' => 'required|string'
        ]);

        // dd($loginDetails);

        if(Auth::attempt($loginDetails)){
            //regenerate session to prevent fixation attacks 
            $request->session()->regenerate();

            return redirect()->intended(route('home'))->with('success' , 'Loged In Successfully!');
        }

        return back()->withErrors([
            'email' => 'Incorrect Login Details. Please Try Again!'
        ])->onlyInput('email');
    }


    public function logout(Request $request):RedirectResponse {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }
}
