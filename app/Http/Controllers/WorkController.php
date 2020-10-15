<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use Illuminate\Support\Facades\Auth;

class WorkController extends Controller
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
        $data = Work::all()->where('user_id',$id);
        return view('work.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('work.create');
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
            'company_name' => ['required', 'max:255','string'],
            'position' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'company_name.required' =>"Field Must not be empty",
            'position.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $work = new Work;

        $work->company_name = $request->company_name;
        $work->position = $request->position;
        $work->year = $request->year;
        $work->user_id = Auth::user()->id;
        if($work->save()){
            return redirect('work_summery_display');
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
        $data = Work::findorFail($id);
        return view('work.update',compact('data'));
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
            'company_name' => ['required', 'max:255','string'],
            'position' => ['required', 'max:255'],
            'year' => ['required', 'integer'],
        ],[
            'company_name.required' =>"Field Must not be empty",
            'position.string' =>"Name Should be a String",
            'year.required' =>"Field Must not be empty",
            'year.integer' =>"Enter valid Year!",
        ]);
        $update = Work::findorFail($id)->update([
            'company_name' => $request->company_name,
            'position' => $request->position,
            'year' => $request->year,
        ]);
        if($update)
        {
            return redirect('work_summery_display')->with('update','Updated Successfully!');
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
        $del = Work::findorFail($id)->delete();
        if($del)
        {
            return back()->with('delete','Deleted Successfully!');
        }
    }
}
