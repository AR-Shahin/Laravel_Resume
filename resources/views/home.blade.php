@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header"><h5>Hello, {{ ucwords(Auth::user()->name)}}</h5></div>
                <div class="card-body">
                    <h3 class="text-info">Tell Us About Yourself</h3>

                    <form action="{{route('store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Frist Name : </label>
                                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" placeholder="Enter First Name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Last Name : </label>
                                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" placeholder="Enter Last Name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Profession : </label>
                                    <input type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" placeholder="Enter Your profession" value ="{{old('profession')}}">
                                    @error('profession')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Email : </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email" value ="{{old('email')}}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Phone : </label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter Your Phone Number" value ="{{old('phone')}}">
                                    @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Website : </label>
                                    <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" placeholder="Enter Your Website" value ="{{old('website')}}">
                                    @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-6">
                                    <label for="">Address : </label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter Your Address" value ="{{old('address')}}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Post Code : </label>
                                    <input type="text" class="form-control @error('post_code') is-invalid @enderror" name="post_code" placeholder="Enter Your Post Code" value ="{{old('post_code')}}">
                                    @error('post_code')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="">Division : </label>
                                    <input type="text" class="form-control @error('division') is-invalid @enderror" name="division" placeholder="Enter Your Division" value ="{{old('division')}}">
                                    @error('division')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row ">
                                <div class="col-md-6">
                                    <a href="{{route('main_index')}}" class="btn btn-info">Back</a>
                                  
                                </div>
                                <div class="col-md-6 text-right">
                                    <input type="submit"class="btn btn-success" value="Continue">
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
