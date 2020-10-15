@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Hello, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Tell Us About Your Certification Details</h3>
                    <hr>
                    <form action="{{route('certificate_store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row no-gutters">
                                <div class="col-md-5">
                                    <label for="">Certificate Name : </label>
                                    <input type="text" class="form-control @error('certificate_name') is-invalid @enderror" name="certificate_name" placeholder="Enter Certificate Name" value="{{ old('certificate_name') }}">
                                    @error('certificate_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <label for="">About : </label>
                                    <input type="text" class="form-control @error('about') is-invalid @enderror" name="about" placeholder="About Certificate " value="{{ old('about') }}">
                                    @error('about')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <label for="">Certification Year : </label>
                                    <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" placeholder="Certification Year" value="{{ old('year') }}">
                                    @error('year')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                               <div class="col-md-6">
                                   <a href="{{route('work_index')}}" class="btn btn-primary">Back</a>
                               </div>
                                <div class="col-md-6 text-right">
                                   <input type="submit" class="btn btn-success" value="Continue">
                                    
                                </div>
                            </div>
                        </div>
                    </form>
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
