@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Hello, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info" style="display:inline-block">Your Career Summery</h3>
                    <div class="text-right" style="display:inline-block;float:right">
                    </div>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <h6>Your Carrer Object</h6>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <td><p class="lead">{{ $d->career_object}}</p></td>  
                            </tr>
                           
                            <tr>
                                <td>
                                    <a href="{{url('ca_update/'.base64_encode($d->id))}}" class="btn btn-warning btn-block">Update</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="{{url('pdf_display')}}" class="btn btn-primary btn-block">Preview Your Resume</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-3 align-self-center">
            <h5 class="text-info">This is a Demo Resume.</h5>
            <img src="{{asset('images/cv.jpg')}}" alt="" class="img-fluid">
        </div>
    </div>
</div>
@endsection
