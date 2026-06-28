<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        // if(!Auth::check()) {
        //     return redirect()->route('login')
        //     ->with('status', 'Please login to view page');
        // }

        return view('dashboard');
    }

    public function list()
    {
        // Grab all the data from db
        $allTokens = DB::table('password_reset_tokens')->get();

        // Pass data to the webpage
        return view('forgot-password-list', ['tokens' => $allTokens]);
    }

    public function deleteLink(string $email) // $email is grab from the web.php
    {
        // Delete row from the db
        DB::table('password_reset_tokens')->where('email', $email)->delete();

        return redirect()->route('homepage')
            ->with('status', 'Reset link has been deleted');
    }

    public function viewUsers() {
        $allUsers = DB::table('users')->get();

        return view('view-users', ['users' => $allUsers]);
    }
}
