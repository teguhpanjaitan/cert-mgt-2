<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Certificate;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        $userList = User::where('locked', '=', '0')->get();
        $certList = Certificate::where('deleted', '=', '0')->get();
        $userCount = $userList->count();
        $certCount = $certList->count();
        return view('pages/dashboard',['userCount' => $userCount,'certCount' => $certCount]);
    }
}
