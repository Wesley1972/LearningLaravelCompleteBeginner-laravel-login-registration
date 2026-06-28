<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function showForm() {
        return view('register');
    }

    public function processForm(Request $request) {
        $request->validate([
            'name' => 'required|unique:users|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return redirect()->route('login')->with('status', 'Registration successful, you can now login');
    }
}
