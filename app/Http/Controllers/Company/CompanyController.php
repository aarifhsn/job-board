<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function showRegistrationForm()
    {
        return view('company.auth.register-company');
    }

    public function register(Request $request)
    {
        // Validate only the required fields for registration
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'contact_number' => 'required|string|max:15',
            'website' => 'nullable|url',
            'password' => 'required|confirmed|min:8',
        ]);

        // Create the user record with 'company' role
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'company', // Set the role to 'company'
        ]);

        // Generate a unique slug for the company
        $slug = Str::slug($validated['name'] . '-' . uniqid(), '-');

        // Create the company record with minimal information (for registration)
        Company::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'slug' => $slug,
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'],
            'website' => $validated['website'],
            'status' => 'pending', // Set the status to 'pending'
        ]);

        // Redirect to login with a success message
        return redirect()->route('home')->with('success', __('messages.company_registration_success'));
    }

    public function profile($slug)
    {
        $company = Company::where('slug', $slug)->firstOrFail();

        // Get the latest jobs posted by the company
        $company_jobs = $company->jobs()->with('tag')->latest()->get();

        return view('company.profile', compact('company', 'company_jobs'));
    }

    public function editProfile()
    {
        $company = auth()->user()->company;  // Get the company related to the logged-in user

        return view('company.edit-profile', compact('company'));
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'contact_number' => 'string|max:15',
            'industry' => 'nullable|string|max:255',
            'website' => 'nullable|url',
            'address' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'country' => 'nullable|string',
            'pincode' => 'nullable|string|max:10',
            'description' => 'nullable|string',

        ]);

        // Update the company's profile data
        $company = auth()->user()->company;
        $company->update($validated);

        return redirect()->route('company.profile')->with('success', 'Profile updated successfully.');
    }

}
