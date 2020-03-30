<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Academic as Certificate;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class CertificateController extends Controller
{
    //
    public function index()
    {
        $certificates = Certificate::where('deleted', '=', '0')->get();
        return view('pages.certificate.all', ['role' => Auth::user()->user_role, 'certificates' => $certificates]);
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            $rules = array(
                'certno' => 'required|numeric|min:5',
                'dateawarded' => 'required|date_format:Y-m-d',
                'recipient' => 'required|min:3',
                'awardname' => 'required|min:5',
                'natureofaward' => 'required|min:5',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('/certificate/add')->withErrors($validator)->withInput();
            }

            Certificate::create([
                'cred_reference' => $request->certno,
                'awarded_date' => $request->dateawarded,
                'recipient' => $request->recipient,
                'name_of_award' => $request->awardname,
                'nature_of_award' => $request->natureofaward,
                'updated_by' => Auth::id()
            ]);
            return redirect(route('certificate.all'));
        } else {
            return view('pages.certificate.add');
        }
    }

    public function edit($id)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        $certificate = Certificate::findOrFail($id);
        $user = User::find($certificate->updated_by);
        return view('pages.certificate.edit', ['certificate' => $certificate,'user' => $user]);
    }

    public function update(Request $request)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        if ($request->isMethod('post')) {
            $rules = array(
                'certno' => 'required|numeric|min:5',
                'dateawarded' => 'required|date_format:Y-m-d',
                'recipient' => 'required|min:3',
                'awardname' => 'required|min:5',
                'natureofaward' => 'required|min:5',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return Redirect::to('/certificate')->withErrors($validator);
            }

            Certificate::where('id', $request->id)->update([
                'cred_reference' => $request->certno,
                'awarded_date' => $request->dateawarded,
                'recipient' => $request->recipient,
                'name_of_award' => $request->awardname,
                'nature_of_award' => $request->natureofaward,
                'updated_by' => Auth::id()
            ]);
        }

        return redirect(route('certificate.all'));
    }

    public function delete($id)
    {
        if(Auth::user()->user_role != "admin"){
            return view('pages.notauthorized');
        }

        Certificate::where('id', $id)->update([
            'deleted' => '1',
            'updated_by' => Auth::id()
        ]);

        return redirect(route('certificate.all'));
    }
}
