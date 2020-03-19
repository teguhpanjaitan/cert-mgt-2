<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //
    public function show()
    {
        return view('pages.forgotpassword');
    }

    public function reset()
    {
        dd("reset");
    }
}
