@extends('layouts.app')

@section('content')
<div class="container" style="margin-top:100px">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <h1 style="font-size:46px;font-weight:700">Only 2% of resumes make it past the first round. Be in the top 2%</h1>
            <p class="lead">Use professional field-tested resume templates that follow the exact <br> ‘resume rules’ employers look for. Easy to use and done within <br> minutes - try now for free! </p>
            <a href="{{ route('home')}}" class="btn btn-primary btn-lg">Create My Resume</a>
        </div>
    </div>
</div>
@endsection
