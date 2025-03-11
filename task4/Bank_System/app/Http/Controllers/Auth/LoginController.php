<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');  // This is the view that displays the login form
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Validate the form input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to log the user in with the given credentials
        if (Auth::attempt($credentials)) {
            // If login is successful, redirect to the intended page (or the default home page)
            return redirect()->intended('/home');  // Change this URL to wherever you want users to go after login
        }

        // If login fails, return back with an error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email'); // Keep the entered email on the form
    }

    // Logout the user
    public function logout(Request $request)
    {
        Auth::logout();  // Log the user out
        $request->session()->invalidate();  // Invalidate the session
        $request->session()->regenerateToken();  // Regenerate the CSRF token

        return redirect('/');  // Redirect to the homepage or login page
    }
}
