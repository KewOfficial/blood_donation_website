<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;

class HospitalAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('hospital.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::guard('hospital')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('hospital.dashboard'));
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('hospital')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/hospital/login');
    }

    public function dashboard()
    {
        return view('hospital.dashboard');
    }
    
}
