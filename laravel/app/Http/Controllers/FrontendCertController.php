<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Certificate;

class FrontendCertController extends Controller
{
    //
    public function index()
    {
        return view('pages/frontend');
    }

    public function find()
    {
    }

    public function result(Request $request)
    {
        if ($request->ajaxaction == 'checkcertificate') {
            $certNo = $request->certificatenumber;
            if (!empty($certNo)) {
                $rules = array(
                    'certno' => 'required|numeric|min:10',
                );
    
                $validator = Validator::make($request->certificatenumber, $rules);

                if ($validator->fails()) {
                    $result = ['success' => false, 'msg' => '', 'errors' => ['code' => '60','msg' => $validator->errors()->first()]];
                }
                else{
                    $certificate = Certificate::find($certNo);

                    if(!empty($certificate)){
                        $result = ['success' => true, 'msg' => ''];
                    }
                    else{
                        $result = ['success' => false, 'msg' => '', 'errors' => ['code' => '60','msg' => 'Certificate not found']];
                    }
                }

                return response($result,200);
            }
        }
    }
}
