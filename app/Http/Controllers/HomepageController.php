<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function homepage() {
        return view('home');
    }

    public function showForgotPasswordPage() {
        return view('forgot-password');
    }
}
