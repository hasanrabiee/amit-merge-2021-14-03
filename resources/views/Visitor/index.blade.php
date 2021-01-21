@extends('layouts.Panel')

@section("Head")


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="{{asset("css/bootstrap-limitless.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/layout.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/components.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/colors.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/hasan-custom.css")}}" rel="stylesheet" type="text/css">

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


@section('content')




    <div class="modal fade" role="dialog" tabindex="-1" id="Lang_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Change Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">

                    <div class="dropdown">

                        <a style="text-decoration: none !important" class="" href="{{ url('locale/en') }}"><i
                                class="fa fa-globe"></i>English</a><br>
                        <a style="text-decoration: none !important" class="" href="{{ url('locale/de') }}"><i
                                class="fa fa-globe"></i>Germany</a><br>
                        <a style="text-decoration: none !important" class="" href="{{ url('locale/al') }}"><i
                                class="fa fa-globe"></i>Albanian</a><br>


                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light btn-block" data-dismiss="modal" type="button">Close
                    </button>
                </div>
            </div>
        </div>
    </div>


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>





    <div class="modal fade" role="dialog" tabindex="-1" id="Resume_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="text-dark">{{__('message.Resume')}}</h4>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">


                    <div class="container">


                        <div class="row">


                            <div class="col-12">

                                <form id="resume_form" class="" method="post" action="{{route("Visitor.Resume")}}" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group ">

                                        <input name="resume" type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">{{__('message.Resume')}}</label>

                                    </div>






                                </form>

                            </div>

                        </div>


                    </div>





                </div>
                <div class="modal-footer">
                    <button onclick="resume_form.submit()" class="btn btn-success btn-block" type="button">{{__('message.Upload')}}
                    </button>
                </div>
            </div>
        </div>
    </div>

                            <div class="modal fade" role="dialog" tabindex="-1" id="avatar_modal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>{{__('message.ChangeAvatarPhoto')}}</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body">
                                            <form action="{{route('Visitor.UpdateAvatar')}}" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="file" name="Avatar">
                                                </div>
                                                <button class="btn btn-success btn-block" type="submit">{{__('message.UpdateAvatar')}}<i class="fa fa-save" style="margin-left: 9px;"></i></button></form>
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light btn-block" data-dismiss="modal" type="button">{{__('message.Close')}}</button></div>
                                    </div>
                                </div>
                            </div>





    {{--    Hassan Start Here !!!--}}

    <body style="background: url('{{\App\Site::VisitorBackground()}}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
        ;">
    <div>

    @include("Sidebars.visitor-sidebar")





    <!-- Main content -->

            <div class="content-wrapper" style="overflow-x: hidden">
            {{--            <div class="row mb-2">--}}
            {{--                <div class="col-md-10"></div>--}}
            {{--                <div class="col-md-2">--}}
            {{--                    <a class="text-white" href="{{ url('locale/en') }}"><i--}}
            {{--                            class="ml-2"></i>En</a>--}}
            {{--                    <a class="text-white" href="{{ url('locale/de') }}"><i--}}
            {{--                            class="ml-2"></i>Ge</a>--}}
            {{--                    <a class="text-white" href="{{ url('locale/al') }}"><i--}}
            {{--                            class="ml-2"></i>Al</a>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Traffic sources -->

                            <div class="card" style="background-color:rgba(54,54,54,0.65);color: white">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">{{__('message.Profile')}}</h6>

                                    @if(\Illuminate\Support\Facades\Auth::user()->AccountStatus == 'Active')
                                        <button class="btn btn-success ml-md-n5">{{__('message.AccountActive')}}</button>
                                    @else
                                        <button class="btn btn-danger ml-md-n5">{{__('message.AccountSuspended')}}</button>
                                    @endif


                                    <div class="header-elements">
                                    </div>
                                </div>
                                <div class="chart position-relative" id="traffic-sources"></div>
                            </div>

                            <div class="card p-3" style="background-color:rgba(54,54,54,0.65);color: white">
                                <div class="card-body py-0">
                                    <div class="row">
                                        <div class="col-6 font-size-lg">
                                            <p>{{__('message.fn')}}  : {{\Illuminate\Support\Facades\Auth::user()->FirstName}}</p>
                                            <p>{{__('message.ln')}} : {{\Illuminate\Support\Facades\Auth::user()->LastName}}</p>
                                            <p>{{__('message.Profession')}}: {{\Illuminate\Support\Facades\Auth::user()->Profession}}</p>
                                            <p>{{__('message.City')}}: {{\Illuminate\Support\Facades\Auth::user()->City}}</p>
                                        </div>
                                        <div class="col-6 font-size-lg">
                                            <p>{{__('message.Gender')}}: {{\Illuminate\Support\Facades\Auth::user()->Gender}}</p>
                                            <p>{{__('message.Country')}}: {{\Illuminate\Support\Facades\Auth::user()->Country}}</p>
                                            <p>{{__('message.BirthDate')}}: {{\Illuminate\Support\Facades\Auth::user()->BirthDate}}</p>
                                            <p>{{__('message.Email')}}: {{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                            <button  data-toggle="tooltip" data-placement="top" title="Upload Resume" onclick="$('#Resume_Modal').modal('show')" class="btn btn-dark w-50">
                                                <span class="fa fa-upload"></span>
                                                {{__("message.Upload")}} CV</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart position-relative" id="traffic-sources"></div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card p-3" style="background-color:rgba(54,54,54,0.65);;color: white">
                                        <div class="card-body py-0">
                                            <div class="row">
                                                <form action="{{route('Visitor.ChangePassword')}}" method="post" class="w-100">
                                                    @csrf
                                                    <div class="form-group col-12">
                                                        <input class="form-control" type="password" placeholder="{{__('message.OldPass2')}}" name="OldPassword">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <input class="form-control" type="password" placeholder="{{__('message.NewPass2')}}" name="password">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <input class="form-control" type="password" placeholder="{{__('message.passwordConfrimation')}}" name="password_confirmation">                                                </div>

                                                    <div class="form-group text-center">
                                                        {{--                                                    <input type="submit" class="btn btn-success ml-2" value="Update Password">--}}
                                                        <button class="btn btn-success ml-2" type="submit">{{__('message.Update')}}</button>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="chart position-relative" id="traffic-sources"></div>
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="card p-3" style="background-color:rgba(54,54,54,0.65);color: white">
                                        <div class="card-body py-0">
                                            <div class="row">
                                                <form method="post" action="{{route('Visitor.VisitExperience')}}" class="w-100">
                                                    @csrf
                                                    <div class="form-group col-12">
                                                        <textarea type="text" class="form-control" rows="5" style="padding-bottom: 19px;" placeholder="{{__('message.VisitExp')}}..." maxlength="120" name="VisitExperience">{!! \Illuminate\Support\Facades\Auth::user()->VisitExperience !!}</textarea>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-success ml-2" type="submit">{{__('message.Send')}}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="chart position-relative" id="traffic-sources"></div>
                                    </div>
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


    </div>
    </body>





@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function show_info(javad) {
            Swal.fire({
                text: javad,
            })
        }
    </script>
@endsection
