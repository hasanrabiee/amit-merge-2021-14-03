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



                    <div>
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
                    </div>



{{--    Hasan start here !!!--}}





    <body style="background: url('{{\App\Site::VisitorBackground()}}') no-repeat center center fixed;
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
                <!-- /sidebar mobile toggler -->

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

                                        {{--                                    <a href="#"><img src="Chrysanthemum.jpg" width="38" height="38" class="rounded-circle" alt=""></a>--}}

                                        <a href="#avatar_modal" role="button" data-toggle="modal"><img class="rounded-circle" width="38" height="38" src="{{asset(\Illuminate\Support\Facades\Auth::user()->Image)}}"></a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title font-weight-semibold mt-md-2">{{\Illuminate\Support\Facades\Auth::user()->UserName}}     </div>

                                        {{--                                    <span class="btn btn-danger btn-sm">Logout</span>--}}

                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /user menu -->


                        <!-- Main navigation -->
                        <div class="card-body p-0">
                            <ul class="nav nav-sidebar" data-nav-type="accordion" style="height: 435px !important ;">
                                <!-- Main -->
                                <li class="nav-item">
                                    <a href="{{route('Visitor.index')}}" class="nav-link">
                                        <i class="fa fa-home"></i>
                                        <span>
										Profile
                                </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link active"><i class="fa fas fa-history"></i> <span>{{__('message.Visit')}} {{__('message.History')}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Visitor.Payment')}}" class="nav-link"><i class="fa fab fa-paypal"></i> <span>{{__('message.Entrance')}} {{__('message.Payment')}}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Visitor.Contact')}}" class="nav-link"><i class="fa fa-phone"></i> <span>{{__('message.ContactSupportTeam')}}</span></a>
                                </li>

                                <li class="nav-item text-center mt-md-5">
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
        <div class="content-wrapper" style="overflow-x: hidden">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Traffic sources -->
                        <div class="card p-3 pc-height-visitor-history" style="background-color:rgba(54,54,54,0.65);color: white;">
                            <div class="card-body py-0">
                                <div class="row">
                                    <div class="col-md-4" style="">
                                        <form onblur="is_typing = false" onfocus="is_typing = true" action="#search_company" class="w-100">
                                            <div class="input-group mt-2 mb-2 w-100">
                                                    <input type="text" class="form-control" placeholder="Company Name" name="search">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="submit">Search</button>
                                                    </div>

                                            </div>
                                        </form>
                                        <div class="row">
                                                <div class="booth-btn booth-btn-height">
                                                    @foreach($Booths as $booth)
                                                        <div class="col-12">
                                                            <a href="?CompanyID={{$booth->id}}" type="button" @if(request()->CompanyID == $booth->id) class="text-left btn btn-primary mb-2 w-100" @else class="text-left btn btn-outline-dark mb-2 w-100" @endif>
                                                                {{$booth->CompanyName}}
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                        </div>
                                    </div>



                                    @if(isset($Booth))
                                        <div class="col-md-4 mt-md-0 mt-2" style="border: 1px solid white;border-radius: 5px;">
                                            <h3 class="text-white mb-4">{{__('message.CompanyInformation')}}</h3>
                                            <img src="{{$Booth->Logo}}" style="width: 65px;">
                                            <p>{{__('message.Company')}} {{__('message.Name')}}: {{$Booth->CompanyName}}</p>
                                            <p>{{__('message.Hall')}}: {{$Booth->Hall}}</p>
                                            <p>{{__('message.Booth')}} {{__('message.number')}}: {{$Booth->Position}} </p>
                                            <p>{{__('message.AboutCompany')}} :{{$Booth->Description}}</p>
                                            <p>{{__('message.WebSite')}}: <a class="text-dark" href="{{$Booth->WebSite}}">{{$Booth->WebSite}}</a></p>
                                            <p class="text-left">{{__('message.Resume')}}: <a href="{{$User->resume}}">Download</a></p>

                                        </div>


                                        <div class="col-md-4 mt-md-0 mt-2">
                                            <h4>Chat History</h4>
                                            <div class="pc-height-visitor-history-chat" style="background-color:transparent;border: 1px solid transparent ;border-radius: 5px;overflow-y: scroll;overflow-x:hidden ">

                                                @foreach(\App\Chat::where('UserID' , \Illuminate\Support\Facades\Auth::id())->where('BoothID' , $Booth->id)->get() as $Chat)

                                                    @if($Chat->Sender == 'Visitor')
                                                        <div class="row">
                                                            <div class="col-3"></div>
                                                            <div class="col-8 bg-success mt-2 ml-3 p-2" style="border-radius: 5px;">{{$Chat->Text}}</div>
                                                        </div>
                                                    @else

                                                        <div class="row">
                                                            <div class="col-8 bg-primary mt-2 ml-3 p-2" style="border-radius: 5px;">{{$Chat->Text}}</div>

                                                            <div class="col-3"></div>
                                                        </div>
                                                    @endif

                                                @endforeach




                                            </div>
                                        </div>


                                    @endif


                                </div>


                            </div>
                            <div class="chart position-relative" id="traffic-sources"></div>
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






@endsection
