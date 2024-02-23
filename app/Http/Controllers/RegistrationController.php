<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        return view('registration');
    }

    public function processRegistration(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phone' => 'required|string|max:20',
            'blood_type' => 'nullable|string|max:255',
            'password' => 'required|string|min:6|confirmed', 
            'terms' => 'required|accepted',
        ]);

        try {
            $user = User::create([
                'full_name' => $validatedData['full_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'blood_type' => $validatedData['blood_type'],
                'username' => $validatedData['username'],
                'password' => Hash::make($validatedData['password']),
            ]);

            return redirect()->route('users.dashboard')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['registration'=> 'Registration failed. Please try again.'])->withInput();
        }
    }
}
