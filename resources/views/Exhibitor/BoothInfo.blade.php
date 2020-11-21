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
                                                                        <h4>{{__('message.ChangeLang')}}</h4>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">

                                    <div class="dropdown">

                                        <a style="text-decoration: none !important" class="" href="{{ url('locale/en') }}"><i
                                                class="fa fa-globe"></i>English</a><br>
                                        <a style="text-decoration: none !important" class="" href="{{ url('locale/de') }}"><i
                                                class="fa fa-globe"></i>German</a><br>
                                        <a style="text-decoration: none !important" class="" href="{{ url('locale/al') }}"><i
                                                class="fa fa-globe"></i>Shqip</a><br>


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



                            <div class="modal fade" role="dialog" tabindex="-1" id="avatar_modal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>{{__('message.ChangeAvatarPhoto')}}</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('Exhibitor.UpdateAvatar')}}" method="post"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="file" name="Avatar">
                                                </div>

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-block" type="submit">{{__('message.UpdateAvatar')}} <i
                                                    class="fa fa-save" style="margin-left: 9px;"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>








                <div class="modal fade" role="dialog" tabindex="-1" id="BoothLogo">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>{{__('message.BoothLogo')}}</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">

                                <img src="{{$Booth->Logo}}" alt="no_picture" class="img-thumbnail">

                                <br>

                                <div class="form-group">
                                    <p class="text-left">{{__('message.BoothLogo')}}<br></p>
                                    <input class="form-control" type="file" name="Logo"
                                           value="{{$Booth->Logo}}">
                                </div>


                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-success w-100" data-dismiss="modal" type="button">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>




{{--Hasan start here !!!!!--}}


<body style="background: url('{{\App\Site::ExhibitorBackground()}}') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    height: 100%;
    ;">
<div>

    <!-- Main navbar -->
    <div class="navbar navbar-expand-md">
        <div class="navbar-brand wmin-200">
            <a href="profile.php" class="d-inline-block">
            </a>
        </div>
        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">

            </button>
            <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
                <i class="fa fas fa-bars" style="color: white !important;"></i>
            </button>
        </div>
    </div>
    <!-- /main navbar -->


    <div class="page-content pt-0 mt-3">
        <!-- Main sidebar -->
        <div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

            <!-- Sidebar mobile toggler -->
            <div class="sidebar-mobile-toggler text-center">
                <a href="#" class="sidebar-mobile-main-toggle">
                    <i class="fa fas fa-chevron-left"></i>
                </a>
                <span class="font-weight-semibold">Main sidebar</span>
                <a href="#" class="sidebar-mobile-expand">
                    <i class="fa fas fa-expand"></i>
                    <i class="icon-screen-normal"></i>
                </a>
            </div>
            <!-- /sidebar mobile toggler --

            <!-- Sidebar content -->
            <div class="sidebar-content">
                <div class="card card-sidebar-mobile">

                    <!-- Header -->
                {{--                    <div class="card-header header-elements-inline">--}}
                {{--                    </div>--}}

                <!-- User menu -->
                    <div class="sidebar-user">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8"></div>
                                <div class="col-md-4">
                                    <a title="logout" class="btn btn-dark btn-sm " href="{{ route('logout') }}" style="font-size:12px;color: #c5c5c5;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i></a>

                                    <a title="language" type="button" data-toggle="tooltip" data-placement="top" title="Change Language" onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning btn-sm text-dark"><i class="fa fa-globe" style="font-size: 15px;"></i></a>

                                </div>
                            </div>
                            <div class="media">

                                <div class="mr-3">
                                    {{--                            href="#myModal">Launch Demo Modal</a>--}}
                                    {{--                                    <a href="#"><img src="Chrysanthemum.jpg" width="38" height="38" class="rounded-circle" alt=""></a>--}}
                                    <a href="#avatar_modal" role="button" data-toggle="modal"><img class="rounded-circle" width="38" height="38" src="{{asset(\Illuminate\Support\Facades\Auth::user()->Image)}}"></a>
                                </div>

                                <div class="media-body">
                                    <div class="media-title font-weight-semibold mt-md-2">{{\Illuminate\Support\Facades\Auth::user()->UserName}} </div>

                                    {{--                                    <span class="btn btn-danger btn-sm">Logout</span>--}}

                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- /user menu -->


                    <!-- Main navigation -->














                    <div class="card-body p-0">
                        <ul class="nav nav-sidebar" data-nav-type="accordion" style="height: 500px !important ;">
                            <!-- Main -->
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.index')}}" class="nav-link">
                                        <span>
										{{__('message.Profile')}}
                                </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.MyBooth')}}" class="nav-link active"><span>{{__('message.Booth')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.Inbox')}}" class="nav-link"> <span>{{__('message.Inbox')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.Statistics')}}" class="nav-link"> <span>{{__('message.Statistics')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.History')}}" class="nav-link"><span>{{__('message.History')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.Payment')}}" class="nav-link"><span>{{__('message.Payment')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.Confirmation')}}" class="nav-link"><span>{{__('message.ConfirmationStatus')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Exhibitor.ContactUs')}}" class="nav-link"><span>{{__('message.ContactUs')}}</span></a>
                            </li>

                            <li class="nav-item text-center mt-md-2">
                                <a href="/Exhabition/" class="" target="_blank"><span class="btn btn-success btn-lg">Enter Exhibition</span></a>
                            </li>
                            <!-- /main -->
                        </ul>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /sidebar content -->
        </div>
        <!-- /main sidebar -->






        <!-- Main content -->
        <div class="content-wrapper" style="overflow: hidden">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-12">
                        <form action="{{route('Exhibitor.UpdateBooth')}}" method="post" enctype="multipart/form-data" class="w-100">
                        @csrf
                        <!-- Traffic sources -->
                            <div class="card p-3" style="background-color:rgba(54,54,54,0.65);color: white">
                                <div class="card-body py-0">
                                    <div class="row">
                                        <div class="col-md-7 font-size-lg">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="image-upload">
                                                        <img
                                                            src="@if($Booth->Poster1) {{$Booth->Poster1}} @else {{asset('assets/img/download.jpg')}} @endif"
                                                            onclick="$('#Poster1').trigger('click');"  style="width: 200px;height: 200px;" class="cursor-pointer w-75">
                                                        <input type="file" id="Poster1" name="Poster1" style="display:none;width: 200px !important;height: 200px !important;"/><span>
                                                        @if($Booth->Type == 'A')
                                                                poster1(630*700)
                                                            @elseif($Booth->Type == 'B')
                                                                poster1(500*700)
                                                            @elseif($Booth->Type == 'C')
                                                                poster1(700*700)
                                                            @elseif($Booth->Type == 'D')
                                                                poster1(630x700)
                                                            @endif
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="image-upload">
                                                        <img
                                                            src="@if($Booth->Poster2) {{$Booth->Poster2}} @else {{asset('assets/img/download.jpg')}} @endif"
                                                            onclick="$('#Poster2').trigger('click');" class="cursor-pointer w-75" style="margin: 5px;width: 200px;height: 200px;">
                                                        <input type="file" id="Poster2" name="Poster2" style="display:none"/><span>
                                                        @if($Booth->Type == 'A')
                                                                poster2(640x1920)
                                                            @elseif($Booth->Type == 'B')
                                                                poster2(590x990)
                                                            @elseif($Booth->Type == 'C')
                                                                poster2(700x700)
                                                            @elseif($Booth->Type == 'D')
                                                                poster2(870x1920)
                                                            @endif

                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="image-upload">
                                                        <img
                                                            src="@if($Booth->Poster3) {{$Booth->Poster3}} @else {{asset('assets/img/download.jpg')}} @endif"
                                                            onclick="$('#Poster3').trigger('click');"  class="cursor-pointer w-75" style="margin: 5px;width: 200px;height: 200px;">
                                                        <input type="file" id="Poster3" name="Poster3" style="display:none"/><span>

                                                    @if($Booth->Type == 'A')
                                                                poster3(860x700)
                                                            @elseif($Booth->Type == 'B')
                                                                poster3(805x1920)
                                                            @elseif($Booth->Type == 'C')
                                                                poster3(700x700)
                                                            @elseif($Booth->Type == 'D')
                                                                poster3(720x700)
                                                            @endif
                                                    </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group mt-2">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="">
                                                            Upload PDF (max:20MB)
                                                        </label>
                                                        <input type="file" class="form-control-file" name="PdfFile">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group mt-2">

                                                <label for="">
                                                    Youtube Video Link
                                                </label>
                                                <input type="url" class="form-control" name="Video" value="{{$Booth->Video}}">
                                            </div>
                                            <hr>
                                            <button class="btn btn-dark w-100 mt-2" type="button" onclick="$('#BoothColor').modal('show')">{{__('message.AdjustBoothColors')}}</button>
                                            <button class="btn btn-info w-100 mt-2" type="button" onclick="$('#BoothLogo').modal('show')">{{__('message.BoothLogo')}}</button>



                                            <div class="modal fade" role="dialog" tabindex="-1" id="BoothColor">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-dark">{{__('message.SelectBoothColor')}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <p class="text-left text-dark">{{__('message.BoothBodyColor')}}<br></p>
                                                                <input class="form-control" type="color" name="Color2"
                                                                       value="{{$Booth->Color2}}" id="Color2">
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left text-dark">{{__('message.BoothHeaderColor')}}<br></p>
                                                                <input class="form-control" type="color" name="Color1"
                                                                       value="{{$Booth->Color1}}" id="Color1">
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left text-dark">{{__('message.BoothTextColor')}}</p>
                                                                <input class="form-control" type="color" name="WebSiteColor"
                                                                       value="{{$Booth->WebSiteColor}}" id="WebSiteColor">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light btn-block" data-dismiss="modal" type="button">
                                                                {{__('message.Close')}}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-5">
                                            <img src="{{asset('assets/img/Booth'.$Booth->Type.'.png')}}" alt="" class="w-100">




                                            <div class="row">

                                                <div class="col-md-6">
                                                    <p>
                                                        <strong>{{__('message.Hall')}}: {{$Booth->Hall}}</strong></p>
                                                    </p>
                                                    <p>
                                                        {{__('message.Booth')}} Type: {{$Booth->Type}}
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <a target="_blank" href="/Showroom" class="btn btn-info w-100">See Booth in 3D</a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" value="Save Your Changes" class="btn btn-success w-100 mt-2">{{__('message.Save')}}</button>
                                </div>
                            </div>
                        </form>
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



@endsection
