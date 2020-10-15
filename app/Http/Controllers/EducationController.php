<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\User;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
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
        $data = Education::all()->where('user_id',$id);
        return view('education.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('education.create');
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
            'degree' => ['required', 'max:255','string'],
            'institute' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'degree.required' =>"Field Must not be empty",
            'institute.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $edu = new Education;

        $edu->degree = $request->degree;
        $edu->institute = $request->institute;
        $edu->year = $request->year;
        $edu->user_id = Auth::user()->id;
        if($edu->save()){
            return redirect('education_summery');
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
        $data = Education::findorFail($id);
        return view('education.update',compact('data'));
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
            'degree' => ['required', 'max:255','string'],
            'institute' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'degree.required' =>"Field Must not be empty",
            'institute.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $update = Education::findorFail($id)->update([
            'degree' => $request->degree,
            'institute' => $request->institute,
            'year' => $request->year,
        ]);
        if($update)
        {
            return redirect('education_summery')->with('update','Updated Successfully!');
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
        $del = Education::findorFail($id)->delete();
        if($del)
        {
            return redirect('education_summery')->with('delete','Deleted Successfully!');
            return back();
        }
    }
}
