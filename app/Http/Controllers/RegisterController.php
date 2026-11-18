<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // create() only shows the register form. No database needed.
    public function create()
    {
        return view('register');
    }

    // store() receives the submitted form, validates it, and creates the user.
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);


        // B1: create the user. Do NOT call Hash::make() here (B4).
        // The User model's 'hashed' cast hashes the password automatically.
        $user = User::create($validated);

        // B2: use Auth::login() to log the user in.
        Auth::login($user);

        return redirect()->route('home')->with('success', 'Account created.');
    }
}
