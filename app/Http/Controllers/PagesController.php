<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Donor;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:donors'],
            'phone' => ['required', 'string', 'max:15'],
            'blood_type' => ['required', 'string', 'max:3'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $donor = Donor::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'blood_type' => $request->blood_type,
            'password' => Hash::make($request->password),
            'unique_id' => $this->generateUniqueId(),
            'total_points' => 0,
            'donation_count' => 0,
            'status' => 'active',
            'reward_tier_id' => null,
        ]);

        

        return redirect()->route('home')->with('success', 'Registration successful. Please log in.');
    }

    private function generateUniqueId()
    {
        return 'DNR-' . strtoupper(uniqid());
    }
}
