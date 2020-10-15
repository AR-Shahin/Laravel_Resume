<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use Illuminate\Support\Facades\Auth;
class CertificateController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = array();
        $data = Certificate::all()->where('user_id',$id);
        return view('certificate.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'certificate_name' => ['required', 'max:255','string'],
            'about' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'certificate_name.required' =>"Field Must not be empty",
            'about.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $cer = new Certificate;

        $cer->certificate_name = $request->certificate_name;
        $cer->about = $request->about;
        $cer->year = $request->year;
        $cer->user_id = Auth::user()->id;
        if($cer->save()){
            return redirect('certificate_summery_display');
        }else{
            echo 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = base64_decode($id);
        $data = Certificate::findorFail($id);
        return view('certificate.update',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id = base64_decode($id);
        $request->validate([
            'certificate_name' => ['required', 'max:255','string'],
            'about' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'certificate_name.required' =>"Field Must not be empty",
            'about.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
       $update = Certificate::findorFail($id)->update([
            'certificate_name' => $request->certificate_name,
            'about' => $request->about,
            'year' => $request->year,
        ]);
        if($update)
        {
       
            return redirect('certificate_summery_display')->with('update','Updated Successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $id = base64_decode($id);
        $del = Certificate::findorFail($id)->delete();
        if($del)
        {
            return back()->with('delete','Deleted Successfully!');
        }
    }
}
