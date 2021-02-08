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




@endsection
<!-- Page content -->

<div class="page-content pt-0 mt-3">

    @include("Sidebars.admin-sidebar")



    @section('content')
        <body style="background: url('{{\App\Site::AdminBackground()}}') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
            ;"><!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Traffic sources -->
                        <div class="card" style="background-color:rgba(168,168,168,0.5);color: white">
                            <div class="card-header header-elements-inline">
                                <div class="header-elements">
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" class="w-100">
                                    <div class="row">


                                        {{--                            Dates--}}


                                        <div class="col-md-2" style="height: 530px; border: 2px solid white;border-radius: 5px">
                                            <a href="" class="btn btn-primary text-white w-100 mt-md-2">2020-11-21</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-22</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-23</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-24</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-25</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-26</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-27</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-28</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-29</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-30</a>
                                            <a href="" class="btn btn-outline-dark text-white w-100 mt-md-2">2020-11-31</a>
                                        </div>


                                        {{--                            /Dates--}}


                                        {{--                            Conference name input--}}


                                        @if (\request()->has('day'))
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="">
                                                            <div class="form-group">
                                                                <label for=""><h6>Conference Title</h6></label>
                                                                <input type="text" class="form-control">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for=""><h6>Speakers Name</h6></label>
                                                                <input type="text" class="form-control">
                                                            </div>



                                                            {{--                            Conference name input--}}




                                                            {{--                                          Added Speakers--}}


                                                            <h4>Added Speakers</h4>
                                                            <div style="overflow-y: auto;height: 200px;">
                                                                <table class="table table-light table-hover table-bordered text-center" style="">
                                                                    <thead>
                                                                    <th>id</th>
                                                                    <th>SpeakerName</th>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>name1</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>name2</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>name3</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>name4</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>5</td>
                                                                        <td>name5</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>6</td>
                                                                        <td>name6</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>7</td>
                                                                        <td>name7</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>8</td>
                                                                        <td>name8</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>9</td>
                                                                        <td>name9</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>10</td>
                                                                        <td>name10</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>


                                                            <button type="button" onclick="$('#AddSpeaker').modal('show')" class="btn btn-primary w-100" data-toggle="modal" data-target="#myModal">Add Speaker To List</button>




                                                            <div class="form-group mt-2">
                                                                <label for="">
                                                                    <h3>
                                                                        Add Conference Abstract
                                                                    </h3>
                                                                </label>
                                                                <textarea type="text" class="form-control" rows="5"></textarea>
                                                            </div>
                                                            {{--                                          /Added Speakers--}}
                                                        </div>
                                                    </div>


                                                    {{--                                    Requested Conference--}}

                                                    <div class="col-md-6">
                                                        <h4 class="">Requested Conference</h4>
                                                        <div class="bg-white p-2" style="height: 270px;margin-top:22px;overflow-y: auto">
                                                            <a href="" class="w-100 btn btn-primary mb-2">Conference Name</a>
                                                            <a href="" class="w-100 btn btn-outline-dark mb-2">Conference Name</a>
                                                            <a href="" class="w-100 btn btn-outline-dark mb-2">Conference Name</a>
                                                            <a href="" class="w-100 btn btn-outline-dark mb-2">Conference Name</a>
                                                            <a href="" class="w-100 btn btn-outline-dark mb-2">Conference Name</a>
                                                            <a href="" class="w-100 btn btn-outline-dark mb-2">Conference Name</a>
                                                            <a href="" class="w-100 btn btn-outline-dark mb-2">Conference Name</a>
                                                        </div>

                                                        <h4 class="mt-md-3">Selected Conference Speakers</h4>
                                                        <div class=" w-100" style="height: 238px;overflow-y: auto">
                                                            <table class="table table-hover table-bordered table-light text-center">
                                                                <thead>
                                                                <th>SpeakerName</th>
                                                                <th>Edit</th>
                                                                <th>Delete</th>
                                                                </thead>
                                                                <tbody>
                                                                <tr>
                                                                    <td>Speakername</td>
                                                                    <td><a href="" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                                                                    <td><a href="" class="btn btn-danger"><i class="fa fa-xing"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Speakername</td>
                                                                    <td><a href="" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                                                                    <td><a href="" class="btn btn-danger"><i class="fa fa-xing"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Speakername</td>
                                                                    <td><a href="" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                                                                    <td><a href="" class="btn btn-danger"><i class="fa fa-xing"></i></a></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Speakername</td>
                                                                    <td><a href="" class="btn btn-info"><i class="fa fa-edit"></i></a></td>
                                                                    <td><a href="" class="btn btn-danger"><i class="fa fa-xing"></i></a></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>





                                                    {{--                                    /Requested Conference--}}





                                                </div>
                                            </div>

                                        @endif


                                    </div>

                                    @if (\request()->has('day'))

                                    <input type="submit" class="btn btn-success w-100">


                                    @endif

                                </form>

                            </div>
                        </div>
                        <!-- /traffic sources -->
                    </div>
                </div>
                <!-- /main charts -->
            </div>
            <!-- /content area -->
        </div>
        <!-- /main content -->
</div>
<!-- /page content -->


</body>
