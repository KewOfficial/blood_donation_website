<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
    

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->route('donor-dashboard')->with('success', 'Login successful!');
        }

        return redirect()->back()->withErrors(['login' => 'Invalid username or password.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Logout successful!');
    }
}
