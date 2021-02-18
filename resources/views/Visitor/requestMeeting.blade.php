@extends('layouts.Panel')
@section("Head")

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset("css/style-icon.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/bootstrap-limitless.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/layout.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/components.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/colors.min.css")}}" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.bundler.js")}}"></script>
    <script src="{{asset("js/blockui.min.js")}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset("js/d3.min.js")}}"></script>
    <script src="{{asset("js/d3tooltip.js")}}"></script>
    <script src="{{asset("js/switchery.min.js")}}"></script>
    <script src="{{asset("js/momment.min.js")}}"></script>
    <script src="{{asset("js/app2.js")}}"></script>
    <script src="{{asset("js/dashboard.js")}}"></script>
    <script src="https://use.fontawesome.com/fd423b8d2f.js"></script>
    <!-- /theme JS files -->

    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>


@endsection

@section("content")



    <div class="container-fluid m-0 p-0">
        <div class="" style="height: 100px;background-color:#242B2E;">
            <div class="container">
                <div>
                    <br>
                    <p style="font-size: 36px;color: white" class="">
                        Request For Meeting to {{$company->CompanyName}}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mt-4">
                <h3>
                    PLEASE SELECT A DATE AND TIME FOR ZOOM MEETING
                </h3>
                <p style="font-size: 16px;">
                    You will be able to see your request status <br> in your website panel at meeting section
                </p>

            </div>
            <div class="col-md-3 mt-0">
                <div class="container-fluid p-0 m-0" style="height: 100vh;background-color:#242B2E;">
                    <div class="p-2">
                        <h3 class="text-white">
                            Dates
                        </h3>
                        <p>



                            @foreach($Days as $day)


                                @if (\request()->input('Day') && \request()->input('Day') == $day)


                                    <a href="?Day={{$day}}" class="btn btn-primary w-100 text-white mb-md-2">
                                        {{$day}}
                                    </a>
                                @else


                                    <a href="?Day={{$day}}" class="btn btn-dark w-100 text-white mb-md-2">
                                        {{$day}}
                                    </a>

                                @endif





                            @endforeach



                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-md-4">
                <h3>
                    Please Select Your Meeting Time
                </h3>
                <div class="row">
                    <div class="col-md-6 text-center">


                        @if (\request()->input('Day'))







                            @foreach($times as $time)




                                @if (\Carbon\Carbon::parse($time->start_time)->toTimeString() > \Carbon\Carbon::now()->toTimeString())


                                    @php

                                    dd(1111111);

                                    @endphp

                                    <a href=""  class="btn btn-secondary mb-2 w-100">
                                        {{                            \Carbon\Carbon::parse($time->start_time)->toTimeString() }}
                                    </a>






                                @else



                                    <a href="{{\request()->fullUrlWithQuery(['Day' => \request()->Day, 'time' => \Carbon\Carbon::parse($time->start_time)->toTimeString()])}}"  class="btn btn-success mb-2 w-100">
                                        {{                            \Carbon\Carbon::parse($time->start_time)->toTimeString() }}
                                    </a>






                                @endif








                            @endforeach


                            @endif






                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection


