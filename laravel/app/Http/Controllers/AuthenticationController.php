<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    //
    public function showLogin()
    {
        return view('pages.login');
    }

    public function doLogin(Request $request)
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'loginid'    => 'required|alphaNum|min:5', // make sure the email is an actual email
            'userpassword' => 'required|alphaNum|min:5' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make($request->all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput($request->except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {
            //check locked first

            $result = User::where([
                ['login_id', "=", $request->get('loginid')],
                ['locked', "=", '1']
            ])->get();

            if (!$result->isEmpty()) {
                return Redirect::to('login')->withErrors('Your Accout is locked. Please contact site Admin.');
            }

            // create our user data for the authentication
            $userdata = array(
                'login_id'     => $request->get('loginid'),
                'password'  => $request->get('userpassword')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {
                if(Auth::user()->user_role == "admin"){
                    return redirect(route('dashboard'));
                }
                else{
                    return redirect(route('certificate.all'));
                }
            } else {
                // validation not successful, send back to form 
                return Redirect::to('login')->withErrors('Sorry, we cannot find your account details please try again');
            }
        }
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('login'); // redirect the user to the login screen
    }
}
