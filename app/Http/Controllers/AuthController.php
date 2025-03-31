<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register'); // Create a Blade file at resources/views/auth/register.blade.php
    }

    // Handle user registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('dashboard'); // Redirect after successful registration
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // Create a Blade file at resources/views/auth/login.blade.php
    }

    // Handle user login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // Redirect after login
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle user logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}
