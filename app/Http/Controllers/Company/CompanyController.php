<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function showRegistrationForm()
    {
        return view('company.auth.register-company');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'contact_number' => 'required|string|max:15',
            'website' => 'nullable|url',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'],
            'website' => $validated['website'],
            'password' => Hash::make($validated['password']),
            'status' => 'pending',
        ]);

        return redirect()->route('login')->with('success', 'Your account has been created. Please wait for admin approval.');
    }

    public function showLoginForm()
    {
        return view('company.auth.login-company');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->guard('company')->attempt($validated)) {
            return redirect()->route('company.dashboard');
        }

        return back()->with('error', 'Invalid credentials.');
    }
}
