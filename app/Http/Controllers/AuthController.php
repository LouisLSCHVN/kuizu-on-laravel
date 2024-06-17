<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        $users = User::all();
        return view('', ['users'=> $users]);
    }

    public function register(Request $request) {
        // Validate the request
        $fields = $request->validate([
            'username' => ['required','max:255', 'unique:users'],
            'email' => ['required','email', 'unique:users'],
            'password' => ['required'],
        ]);

        // Create a new user
        $user = User::create($fields);

        Auth::login($user);

        // Redirect to the home page
        return redirect()->route('home')->with('success', 'You created an account!');
    }

    public function login(Request $request) {
        // Validate the request
        $fields = $request->validate([
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        // Attempt to log the user in
        if (!Auth::attempt($fields)) {
            return back()->withErrors([
                'failed' =>
                    'The provided credentials do not match our records.']);
        }

        // Redirect to the home page
        return redirect()->route('home')->with('success', 'You are now logged in!');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home')->with('success', 'You are now logged out!');
    }
}
