<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect('/')->with('status', 'Login successful');
        };

        return back()->withInput()->with('status', 'Invalid credentials');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'reset-password' => 'required',
            'confirm-password' => 'required'
        ]);

        if ($request->input('reset-password') === $request->input('confirm-password')) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->password = Hash::make($request->input('reset-password'));
            $user->save();

            return redirect()->back()->with('status', 'Your password has been succssfully updated');
        } else {
            return redirect()->back()->with('status', 'Password dont match, please try again');
        }
    } 
}

// explain it shortly and in simple terms