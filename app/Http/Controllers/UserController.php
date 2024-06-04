<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $username)
    {
        return view('users.show', [
            'user' => User::where('username', $username)->firstOrFail()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('users.account', [
            'user' => Auth::user()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $path = null;
        if($request->hasFile('profile_picture')) {
            $path = Storage::disk('public')->put('users', $request->profile_picture);
        }


        $fields = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $user = Auth::user();
        User::where('id', $user->id)->update([
            ...$fields,
            'profile_picture' => $path
        ]);

        dd($fields);

        return redirect()->route('users.edit')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
