<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('edit', compact('user'))->with('title', 'Edit Profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        return redirect()->route('profile')->with('status', 'Profile updated successfully!');
    }
}
