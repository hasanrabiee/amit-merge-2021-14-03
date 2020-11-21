@extends('layouts.Panel')
@section('Head')
    <meta name="_token" content="{{csrf_token()}}"/>



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
{{--    <header class="d-flex masthead" style="background-image: url({{\App\Site::ExhibitorBackground()}});padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">--}}
{{--        <div class="container my-auto text-center">--}}
{{--            <h3 class="mb-5"></h3>--}}
{{--         <div class="pull-right d-inline m-0">--}}


{{--                @if(\App\Site::find(1)->Logo1)--}}
{{--                    <img class="float-right" src="{{\App\Site::find(1)->Logo1}}"--}}
{{--                         style="width: 113px;margin-right: 34px;">--}}
{{--                @endif--}}
{{--                @if(\App\Site::find(1)->Logo2)--}}
{{--                    <img class="float-right" src="{{\App\Site::find(1)->Logo2}}"--}}
{{--                         style="width: 113px;margin-right: 34px;">--}}
{{--                @endif--}}
{{--                @if(\App\Site::find(1)->Logo3)--}}
{{--                    <img class="float-right" src="{{\App\Site::find(1)->Logo3}}"--}}
{{--                         style="width: 113px;margin-right: 34px;">--}}
{{--                @endif--}}

{{--            </div>--}}

{{--            <div style="width: 354px;height: 45px;background-color: #525252; margin-top: 70px" class="rounded">--}}

{{--                <div class="pull-right p-1">--}}
{{--                    <button type="button" data-toggle="tooltip" data-placement="top" title="Change Language" onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning">--}}
{{--                        <i class="fa fa-globe"></i>--}}
{{--                    </button>--}}
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

{{--                </div>--}}

{{--                <div class="pull-right p-1 logout_section">--}}
{{--                    <button data-toggle="tooltip" data-placement="top" title="Logout" onclick="document.getElementById('logout-form').submit()" class="btn btn-danger">--}}
{{--                        <i class="fa fa-sign-out"></i>--}}
{{--                    </button>--}}

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


{{--                </div>--}}





{{--                <div class="d-inline float-left"--}}
{{--                     style="background-color: transparent;height: 26px;width: 122px;margin-left: 2px;">--}}
{{--                    <h6 class="text-left"--}}
{{--                        style="width: 115px;height: 41px;padding: 7px;color: rgb(255,255,255);margin-left: 4px;">--}}
{{--                        {{\Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Auth::user()->UserName , 18)}} </h6>--}}
{{--                </div>--}}



{{--            </div><div class="d-inline-block float-left rounded amitiss_back"  style="width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">--}}
{{--                <div class="float-left border rounded" style="width: 244px;height: 452px;background-color: transparent;"><a href="#avatar_modal" data-toggle="modal">--}}
{{--                        <img class="rounded-circle border" src="{{\Illuminate\Support\Facades\Auth::user()->Image}}" style="width: 76px;height: 74px;margin-top: 8px;">--}}
{{--                    </a>--}}
{{--                    <div><a class="btn btn-primary btn-lg make_hidden" role="button" data-toggle="modal" href="#myModal">Launch Demo Modal</a>--}}
                        <div class="modal fade" role="dialog" tabindex="-1" id="avatar_modal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>{{__('message.ChangeAvatarPhoto')}}</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                    <div class="modal-body">
                                        <form action="{{route('Exhibitor.UpdateAvatar')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="file" name="Avatar">
                                            </div>
                                            <button class="btn btn-success btn-block" type="submit">{{__('message.UpdateAvatar')}} <i class="fa fa-save" style="margin-left: 9px;"></i></button></form>
                                    </div>
                                    <div class="modal-footer"><button class="btn btn-light btn-block" data-dismiss="modal" type="button">{{__('message.Close')}}</button></div>
                                </div>
                            </div>
                        </div>
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-left" style="background-color: transparent;height: 35px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="remove_underline" href="{{route('Exhibitor.index')}}" style="font-size: 19px;color: #ffffff;">{{__('message.Profile')}}</a></div>--}}
{{--                        <div class="text-left" style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Exhibitor.MyBooth')}}" style="font-size: 20px;color: #ffffff;">{{__('message.Booth')}}</a></div>--}}
{{--                        <div class="text-left" style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Exhibitor.Inbox')}}" style="font-size: 20px;color: #ffffff;">{{__('message.Inbox')}}</a></div>--}}
{{--                        <div class="text-left" style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Exhibitor.Statistics')}}" style="font-size: 20px;color: #ffffff;">{{__('message.Statistics')}}</a></div>--}}
{{--                        <div class="text-left" style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Exhibitor.History')}}" style="font-size: 20px;color: #ffffff;">{{__('message.History')}}</a></div>--}}
{{--                        <div class="text-left" style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Exhibitor.Payment')}}" style="font-size: 20px;color: #ffffff;">{{__('message.Payment')}}</a></div>--}}
{{--                        <div class="text-left" style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Exhibitor.Confirmation')}}" style="font-size: 20px;color: #ffffff;">{{__('message.ConfirmationStatus')}}</a></div>--}}
{{--                        <div class="text-left user_active_menu" style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="#" style="font-size: 20px;color: #000000;">{{__('message.ContactUs')}}</a></div>--}}
{{--                        <div class="text-left" style="background-color: #00000000;height: 20px;margin-top: -15px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"> <a href="/Exhabition/" class="" target="_blank">--}}
{{--                            <button class="btn btn-block" type="button"--}}
{{--                                    style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 18px;text-decoration: none !important" >--}}
{{--                               {{__('message.EnterExhabition')}}--}}
{{--                            </button>--}}
{{--                            </a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="border rounded d-block float-left border" style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">--}}
{{--                    <div class="border rounded border-primary float-left border" style="background-color: #ffffff;height: 400px;width: 815px;margin-bottom: 0px;margin-left: 2px;padding: 2px;padding-top: -2px;margin-top: 6px;">--}}
{{--                        <div class="border rounded-0 float-left" style="width: 387px;margin-right: 1px;margin-left: 6px;margin-bottom: 8px;height: 318px;">--}}
{{--                            <div class="scroll_box ChatsDiv" style="height: 264px;margin-bottom: 11px;" id="ChatsDiv">--}}


{{--                                {{__('message.Loading')}}--}}


{{--                            </div>--}}



{{--                            <input class="border rounded border-dark form-control d-inline" type="text" style="margin-right: 17px;width: 208px;" id="myInput"  name="Text" value="{{old('Text')}}">--}}
{{--                            <button class="btn btn-success d-inline" style="height: 36px;width: 103px;" onclick="sendMessage()">--}}
{{--                                {{__('message.Send')}}--}}
{{--                            </button>--}}

{{--                        </div>--}}
{{--                        <div class="float-right" style="width: 391px;height: 334px;padding: 16px;margin-right: 22px;">--}}
{{--                            <h2 class="text-left" style="margin-right: 85px;margin-bottom: 24px;color: #7abbb2;">{{__('message.ContactUs')}}</h2>--}}
{{--                            <h2 class="text-left float-left" style="margin-right: 500px;margin-bottom: 24px;font-size: 24px;color: #7abbb2;width: 224px;">{{\App\Site::find(1)->Name}}</h2>--}}
{{--                            <div class="text-left" >--}}
{{--                                <p><i class="fa fa-map-marker" style="width: 17px;font-size: 24px;margin-right: 11px;color: #7abbb2;"></i>{{\App\Site::find(1)->AdminLocation}}</p>--}}
{{--                                <p><i class="fa fa-phone" style="width: 17px;font-size: 24px;margin-right: 11px;color: #7abbb2;"></i>{{\App\Site::find(1)->AdminTel}}</p>--}}
{{--                                <p><i class="fa fa-envelope" style="width: 17px;font-size: 24px;margin-right: 15px;color: #7abbb2;"></i>{{\App\Site::find(1)->AdminAddress}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}




{{--    Hasan start here !!!!--}}




    <body style="background: url('{{\App\Site::ExhibitorBackground()}}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
        ;">


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
                                <a href="{{route('Exhibitor.MyBooth')}}" class="nav-link"><span>{{__('message.Booth')}}</span></a>
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
                                <a href="{{route('Exhibitor.ContactUs')}}" class="nav-link active"><span>{{__('message.ContactUs')}}</span></a>
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
        <div class="content-wrapper" style="overflow-x: hidden">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Traffic sources -->
                        <div class="row">
                            <div class="col-md-6" style="height: 600px !important;">
                                <div class="card w-100" style="background-color:rgba(168,168,168,0.5);color: white;">
                                    <div class="card-body">
                                        <div class="row w-100">
                                            <div class="w-100">
                                                <div style="background-color:transparent;border: 1px solid transparent ;border-radius: 5px;" class="w-100">





                                                    <div class="scroll_box ChatsDiv w-100" id="ChatsDiv" style="background-color:transparent;border: 1px solid transparent ;height: 540px;border-radius: 5px;overflow-y: auto;overflow-x:hidden ">

                                                    </div>
                                                    <div class="input-group mt-1">
                                                        <textarea id="myInput"  name="Text" type="text" rows="1" class="form-control" aria-describedby="basic-addon2"></textarea>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-success" type="button" onclick="sendMessage()">Send</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mt-3 mt-md-0">
                                    <div class="card" style="background-color:rgba(168,168,168,0.5);color: white;height: 620px !important">
                                        <div class="card-body">
                                            <h3>{{__("message.ContactUs")}}</h3>
                                            <h4 class="ml-md-3 ml-2" style="">{{\App\Site::find(1)->Name}}</h4>
                                            <div class="row mt-md-5">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">

                                                </div>
                                                <div class="col-md-3"></div>
                                                <div class="col-md-9">
                                                    <i class="fa fa-home" style="font-size: 24px !important;"></i><span class="ml-md-3 ml-2" style="font-size: 18px;">{{\App\Site::find(1)->AdminLocation}}</span>
                                                </div>
                                                <div class="col-md-3 mt-md-3 mt-1"></div>
                                                <div class="col-md-9 mt-md-3 mt-1">
                                                    <i class="fa fa-phone" style="font-size: 24px !important;"></i><span class="ml-md-3 ml-2" style="font-size: 18px;">{{\App\Site::find(1)->AdminTel}}</span>
                                                </div>
                                                <div class="col-md-3 mt-md-3 mt-1"></div>
                                                <div class="col-md-9 mt-md-3 mt-1">
                                                    <i class="fa fa-envelope" style="font-size: 24px !important;"></i><span class="ml-md-3 ml-2" style="font-size: 18px;">{{\App\Site::find(1)->AdminAddress}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
    <!-- /page content -->
    </body>







@endsection

@section('js')
    <script>


        myInput.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                sendMessage()
                // Trigger the button element with a click
            }
        });


        myInput.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                sendMessage()
                // Trigger the button element with a click
            }
        });

        setInterval(GetMesage, 3000);

        function GetMesage() {

            $.get('{{route('Exhibitor.ChatGet')}}',
                function (data) {

                    $(".ChatsDiv").empty();
                    if (data["Chat"].length <= 0){
                        var fieldhtml = '{{__('message.NoMessageAvailable')}}';
                        $('.ChatsDiv').append(fieldhtml);

                    }else {

                        for (var i = 0; i < data["Chat"].length; i++) {
                            if (data["Chat"][i]["Sender"] === 'Exhibitor') {
                                var fieldHTML = '<div class="row"><div class="col-3" style=""></div><div class="col-8 bg-success mt-2 ml-3 p-1" style="border-radius: 5px;"><p>' + data['Chat'][i]['Text'] + '</p></div></div>';
                            } else {
                                var fieldHTML = '<div class="row"><div class="col-8 bg-primary mt-2 ml-3 p-1" style="border-radius: 5px;"><p>' + data['Chat'][i]['Text'] + '</p></div><div class="col-3" style=""></div></div>';
                            }
                            $('.ChatsDiv').append(fieldHTML); //Add field html

                            var objDiv = document.getElementById("ChatsDiv");
                            objDiv.scrollTop = objDiv.scrollHeight;
                        }
                    }
                });
        }

        function sendMessage() {


            new_message = myInput.value
            myInput.value = ''
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route('Exhibitor.ChatAdmin')}}',
                method: 'post',
                data: {
                    Text: new_message
                },
                success: function (data) {
                    $(".ChatsDiv").empty();
                    for (var i = 0; i < data["Chat"].length; i++) {
                        if (data["Chat"][i]["Sender"] === 'Exhibitor') {
                            var fieldHTML = '<div class="row"><div class="col-3" style=""></div><div class="col-8 bg-success mt-2 ml-3 p-1" style="border-radius: 5px;"><p>' + data['Chat'][i]['Text'] + '</p></div></div>';
                        } else {
                            var fieldHTML = '<div class="row"><div class="col-8 bg-primary mt-2 ml-3 p-1" style="border-radius: 5px;"><p>' + data['Chat'][i]['Text'] + '</p></div><div class="col-3" style=""></div></div>';
                        }

                     $('.ChatsDiv').append(fieldHTML);
                        var objDiv = document.getElementById("ChatsDiv");
                        objDiv.scrollTop = objDiv.scrollHeight;
                    }
                }
            });

        }



        $(".remove_underline").hover(function (){


            if($(this).parent().hasClass('user_active_menu')){

                return;
            }else{

                $(this).parent().css('background-color', '#ffffff')
                $(this).css('color', '#000000')

            }


        }, function (){


            if($(this).parent().hasClass('user_active_menu')){

                return;
            }else{

                $(this).parent().css('background-color', '')
                $(this).css('color', '#ffffff')

            }



        })



    </script>

@endsection
