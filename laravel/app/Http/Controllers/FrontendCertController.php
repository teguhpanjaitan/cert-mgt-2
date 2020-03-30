<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Academic as Certificate;

class FrontendCertController extends Controller
{
    //
    public function index()
    {
        return view('pages/frontend/checker');
    }

    public function result()
    {
        return view('pages/frontend/result');
    }

    public function find(Request $request)
    {
        if ($request->ajaxaction == 'checkcertificate') {
            $certNo = $request->certificatenumber;
            if (!empty($certNo)) {
                $rules = array(
                    'certificatenumber' => 'required|numeric|min:10',
                );

                $validator = Validator::make(["certificatenumber" => $request->certificatenumber], $rules);

                if ($validator->fails()) {
                    $result = ['success' => false, 'msg' => '', 'errors' => ['code' => '60', 'msg' => $validator->errors()->first()]];
                } else {
                    $certificate = Certificate::where('number', '=', $this->convertCertNumber($certNo))->first();

                    if (!empty($certificate)) {
                        $date = \Carbon\Carbon::parse($certificate->date)->format('d F Y');
                        $result = ['success' => true, 'msg' => '', "errors" => "", "Name" => $certificate->name, "Date12" => $date, "type" => $certificate->type, "Number" => $certificate->number, "Awarded" => $certificate->awarded, "Certified" => $certificate->certified];
                    } else {
                        $result = ['success' => false, 'msg' => '', 'errors' => ['code' => '60', 'msg' => 'Certificate not found']];
                    }
                }

                return response($result, 200);
            }
        }
    }

    private function convertCertNumber($number = "")
    {
        //format 1601-0005-49
        if (ctype_digit($number) && strlen($number) == 10) {
            $number = substr($number, 0, 4) . '-' .
                substr($number, 4, 4) . '-' .
                substr($number, 8);
        }

        return $number;
    }
}
