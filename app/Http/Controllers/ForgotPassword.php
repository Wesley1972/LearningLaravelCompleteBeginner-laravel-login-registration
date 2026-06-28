<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPassword extends Controller
{
    public function forgotPasswordProccess(Request $request)
    {
        // Input must be an email to continue
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email exit in DB
        $userExist = DB::table('users')->where('email', $request->input('email'))->exists();

        if ($userExist) {
            $token = Str::random(64);

            $isSaved = DB::table('password_reset_tokens')->insert([
                'email' => $request->input('email'),
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
            // dd($isSaved);

            // Send the reset password link to the user by email
            $isSent = Mail::send('email-forgot-password', ['token' => $token], function ($message) use ($request) {
                $message->to($request->input('email'));
                $message->subject('Reset you password');
            });

            // dd($isSent);
        }

        return redirect()->route('homepage')->with('status', 'Please check your inbox for the reset password link');
    }

    public function resetForgotPassword(Request $request)
    {
        // Validate the form first
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'token' => 'required'
        ]);

        // Check if email and token exit in DB
        $resetRecord = DB::table('password_reset_tokens')
            ->where('email', $request->input('email'))
            ->where('token', $request->input('token'))
            ->first();

        // Check if the data is in DB
        if (!$resetRecord) {
            // If data is not on DB stop here and send the user back
            return back()->with('status', 'Invalid or expired password link');
        }

        // If reset data is in DB, change the password
        $user = User::where('email', $request->input('email'))->first();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        // Send the user back to the home page
        return redirect()->route('homepage')->with('status', 'Password has been updated');
    }
}
