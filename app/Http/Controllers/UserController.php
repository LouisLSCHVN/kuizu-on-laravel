<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        return view('', ['users'=> $users]);
    }

    public function signIn(Request $request) {
        $fields = $request->validate([
            'username' => ['required','max:255'],
            'email' => ['required','email'],
            'password' => ['required'],
        ]);

        User::create($fields);

        return redirect('/');
    }
}
