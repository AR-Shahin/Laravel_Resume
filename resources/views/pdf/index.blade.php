<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <style>
            .page-break {
                page-break-after: always;
            }
        </style>
        <title>Make you Resume as PDF</title>
    </head>
    <body>
        <div class="container " >
            <div class="main-content mt-4" style="border: 1px solid;padding:15px; margin:30px 0">
                <div class="row justify-content-center">
                    <div class="offset ">
                        <table>
                            <tr>
                                <h4 style="text-transform:uppercase;text-align:center">Curriculum Vitae</h4>
                            </tr>
                        </table>

                    </div>
                </div>
                <div class="row justify-content-center mt-3">
                    <div class="col-11">
                        <div class="row">
                            <table>
                                <tr>
                                    <td>
                                        <div class="name">
                                            <h5 style="font-weight:700" class="m-0 p-0">{{$data['basicInfo']->first_name }}{{" " .$data['basicInfo']->last_name }}</h5>
                                            <span class="m-0 p-0">{{$data['basicInfo']->profession }}</span>
                                        </div>
                                        <span class="d-block">{{$data['basicInfo']->post_code }},{{$data['basicInfo']->address }}</span>
                                        <span class="d-block">{{$data['basicInfo']->division }},Bangladesh</span>
                                    </td>
                                    <td><span style="margin:0 50px"></span></td>
                                    <td style="float:right;">
                                        <h6><b>Email : </b> {{$data['basicInfo']->email }}</h6>
                                        <h6><b>Website : </b> {{$data['basicInfo']->website }}</h6>
                                        <h6><b>Phone : </b> {{$data['basicInfo']->phone }}</h6>
                                    </td> 
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h4>Objective</h4>
                        <p>{{$data['objective']->career_object }}</p>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h4>Education</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Degree / Diploma</th>
                                    <th scope="col">Institue</th>
                                    <th scope="col">Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['educations'] as $edu)
                                <tr>
                                    <td>{{$edu->degree }}</td>
                                    <td>{{$edu->institute }}</td>
                                    <td>{{$edu->year }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h4>Work Experience</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Position</th>
                                    <th scope="col">Year</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($data['works'] as $work)
                                <tr>
                                    <td>{{$work->company_name }}</td>
                                    <td>{{$work->position }}</td>
                                    <td>{{$work->year }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h4>Certification</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Certification</th>
                                    <th scope="col">Institue</th>
                                    <th scope="col">Year</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['cetificates'] as $cer)
                                <tr>
                                    <td>{{$cer->certificate_name }}</td>
                                    <td>{{$cer->about }}</td>
                                    <td>{{$cer->year }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <a href="{{route('main_index')}}" class="btn btn-warning">Back</a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ url('pdf_download')}}" class="btn btn-primary" onclick="return confirm('Are you Sure ?')">Download</a>
                    </div>
                </div>
            </div> <!-- main-content -->
        </div> <!-- container -->
        <!-- ptional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>