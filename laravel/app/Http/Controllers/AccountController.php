<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        $accounts = User::all();
        return view('pages.account.all', ['role' => Auth::user()->user_role, 'accounts' => $accounts]);
    }

    public function add(Request $request)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        if ($request->isMethod('post')) {
            $rules = array(
                'login_id'    => 'required|unique:users|min:5',
                'inputPassword3' => 'required|alphaNum|min:5',
                'fullname' => 'required|min:5',
                'inputEmail3' => 'required|email',
                'role' => 'required',
            );

            $customMessages = [
                'inputPassword3.required' => 'The password field is required.',
                'inputEmail3.required' => 'The email field is required.'
            ];        

            $validator = Validator::make($request->all(), $rules, $customMessages);

            if ($validator->fails()) {
                return Redirect::to('/account/add')->withErrors($validator)->withInput($request->except('password'));
            }

            User::create([
                'user_role' => $request->role,
                'login_id' => $request->login_id,
                'password' => Hash::make($request->inputPassword3),
                'name' => $request->fullname,
                'email' => $request->inputEmail3,
                'remarks' => $request->remarks,
                'updated_by' => Auth::id()
            ]);

            return redirect(route('account.all'));
        } else {
            return view('pages.account.add');
        }
    }

    public function edit($id)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        $user = User::findOrFail($id);
        $updatedBy = User::find($user->updated_by);
        return view('pages.account.edit', ['user' => $user,'updatedBy' => $updatedBy]);
    }

    public function update(Request $request)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        if ($request->isMethod('post')) {
            $rules = array(
                'login_id'    => [
                    'required',
                    'min:5',
                    Rule::unique('users')->ignore($request->id),
                ],
                'inputPassword3' => 'required|alphaNum|min:5',
                'fullname' => 'required|min:5',
                'inputEmail3' => 'required|email',
                'role' => 'required',
            );

            $customMessages = [
                'inputPassword3.required' => 'The password field is required.',
                'inputEmail3.required' => 'The email field is required.'
            ];        

            $validator = Validator::make($request->all(), $rules, $customMessages);

            if ($validator->fails()) {
                return Redirect::to('/account')->withErrors($validator);
            }

            $data = [
                'user_role' => $request->role,
                'login_id' => $request->login_id,
                'name' => $request->fullname,
                'email' => $request->inputEmail3,
                'remarks' => $request->remarks,
                'updated_by' => Auth::id()
            ];

            if (!empty($request->inputPassword3)) {
                $data['password'] = Hash::make($request->inputPassword3);
            }

            User::where('id', $request->id)->update($data);
        }

        return redirect(route('account.all'));
    }

    public function delete($id)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        $user = User::find($id);
        $user->delete();

        return redirect(route('account.all'));
    }

    public function lock($id, $value)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }
        
        User::where('id', $id)->update([
            'locked' => $value,
            'updated_by' => Auth::id()
        ]);

        return redirect(route('account.all'));
    }
}
