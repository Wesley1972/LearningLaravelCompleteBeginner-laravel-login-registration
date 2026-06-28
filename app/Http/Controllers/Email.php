<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Email extends Controller
{
    public function resetPasswordPage(string $token) {
        return view('forgot-password-reset-form', ['token' => $token]);
    }
}
