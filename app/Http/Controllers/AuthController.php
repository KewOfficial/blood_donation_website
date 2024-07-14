<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registration');
    }
    public function processRegistration(Request $request)
{
    $request->validate([
        'full_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:donors,email',
        'phone' => 'required|string|max:255',
        'blood_type' => 'required|string|max:3',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $donor = new Donor();
    $donor->full_name = $request->full_name;
    $donor->email = $request->email;
    $donor->phone = $request->phone;
    $donor->blood_type = $request->blood_type;
    $donor->password = Hash::make($request->password);
    $donor->status = 'active'; 
    $donor->save();

    Auth::guard('donor')->login($donor);

    return redirect()->route('donor.dashboard');
}


    public function showLoginForm()
    {
        if (Auth::guard('donor')->check()) {
            return redirect()->route('donor.dashboard');
        }
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('donor')->attempt($credentials)) {
            return redirect()->route('donor.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('donor')->logout();
        return redirect()->route('login');
    }
}
