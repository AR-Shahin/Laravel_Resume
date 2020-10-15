<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\basicInfo;
use Illuminate\Support\Facades\Auth;
class BasicInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
return view('home');
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
            'first_name' => ['required', 'max:255','string'],
            'last_name' => ['required', 'max:255'],
            'profession' => ['required', 'max:255'],
            'division' => ['required', 'max:255'],
            'address' => ['required', 'max:255'],
            'website' => ['required', 'URL'],
            'post_code' => ['required', 'integer'],
            'phone' => ['required', 'integer'],
            'email' => ['required','email','unique:basic_information'],
        ],[
            'first_name.required' =>"Field Must not be empty",
            'first_name.string' =>"Name Should be a String",
            'last_name.required' =>"Field Must not be empty",
            'profession.required' =>"Field Must not be empty",
            'division.required' =>"Field Must not be empty",
            'address.required' =>"Field Must not be empty",
            'email.required' =>"Field Must not be empty",
            'email.email' =>"Please Enter a valid Email",
            'website.required' =>"Field Must not be empty",
            'website.URL' =>"Enter a valid URL",
            'post_code.required' =>"Field Must not be empty",
            'post_code.integer' =>"Enter valid Post Code",
            'phone.required' =>"Field Must not be empty",
            'phone.integer' =>"Enter valid Phone Number",
        ]);
        
        $bInfo = new basicInfo;
        
        $bInfo->first_name = $request->first_name;
        $bInfo->last_name = $request->last_name;
        $bInfo->profession = $request->profession;
        $bInfo->division = $request->division;
        $bInfo->address = $request->address;
        $bInfo->website = $request->website;
        $bInfo->post_code = $request->post_code;
        $bInfo->phone = $request->phone;
        $bInfo->email = $request->email;
        $bInfo->user_id = Auth::user()->id;
        if($bInfo->save()){
            return redirect('education_information');
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
        //
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
        //
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
