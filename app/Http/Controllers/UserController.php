<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    

    public function registerPost(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:users,name',
            'email' => 'required|email',
            'role' => 'required|in:customer,vendor',
            'password' => 'required|min:8|confirmed'
        ]);

        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect('/register')->with('success' , 'You have Registered Successfully!');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect based on role
            // if ($user->role === 'admin') {
            //     return redirect()->intended('/admin');
            // } elseif ($user->role === 'vendor') {
            //     return redirect()->intended('/');
            // } else {
            //     return redirect()->intended('/');
            // }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
