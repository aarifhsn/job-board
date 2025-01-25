<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;


class RegistrationController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        // validate the request
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(10),
        ]);

        // redirect to home page
        return redirect()->route('login')->with('success', __('messages.registration_success'));
    }
}
