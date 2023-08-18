<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestEmailController extends Controller
{
    public function sendTestEmail()
{
    $user = auth()->user(); // Assuming authenticated user
    $email = new TestEmail($user); // Replace with your email class

    Mail::to($user->email)->send($email);

    return 'Test email sent.';
}
}
