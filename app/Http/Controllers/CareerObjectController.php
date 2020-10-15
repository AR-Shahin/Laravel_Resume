<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\CareerObject;
class CareerObjectController extends Controller
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
    {    $id = Auth::user()->id;
        $d = array();
        $d = CareerObject::where('user_id', $id)->first();
     return view('career.index',compact('d'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('career.create');
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
            'career_object' => ['required','string'],
        ],[
            'career_object.required' =>"Field Must not be empty",
            'career_object.string' =>"Name Should be a String",
        ]);
        $cer = new CareerObject;

        $cer->career_object = $request->career_object;
        $cer->user_id = Auth::user()->id;
        if($cer->save()){
            return redirect('ca_summery_display');
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
    public function edit($id)
    {
         $id = base64_decode($id);
        $data = CareerObject::findorFail($id);
        return view('career.update',compact('data'));
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
            'career_object' => ['required','string'],
        ],[
            'career_object.required' =>"Field Must not be empty",
        ]);
        $update = CareerObject::findorFail($id)->update([
            'career_object' => $request->career_object,
        ]);
        if($update)
        {
            return redirect('ca_summery_display')->with('update','Updated Successfully!');
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
        //
    }
}
