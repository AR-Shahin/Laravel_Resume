<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CareerObject;
use App\basicInfo;
use App\Certificate;
use App\Education;
use App\Work;
use PDF;

class PdfController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $usrId = Auth::user()->id;
        $data= array();

        $data['basicInfo'] = basicInfo::where('user_id', $usrId)->first();
        $data['objective'] = CareerObject::where('user_id', $usrId)->first();
        $data['educations'] = Education::where('user_id', $usrId)->get();
        $data['works'] = Work::where('user_id', $usrId)->get();
        $data['cetificates'] = Certificate::where('user_id', $usrId)->get();
        return view('pdf.index',compact('data'));
    }

    public function download()
    {
        $usrId = Auth::user()->id;
        $data= array();

        $data['basicInfo'] = basicInfo::where('user_id', $usrId)->first();
        $data['objective'] = CareerObject::where('user_id', $usrId)->first();
        $data['educations'] = Education::where('user_id', $usrId)->get();
        $data['works'] = Work::where('user_id', $usrId)->get();
        $data['cetificates'] = Certificate::where('user_id', $usrId)->get();
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('pdf.index',compact('data'));
        return $pdf->download('myresume.pdf');
    }
}
