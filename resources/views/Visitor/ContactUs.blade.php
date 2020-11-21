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


    {{--    Hasan start Here !!!--}}




    <body class="" style="background: url('{{\App\Site::VisitorBackground()}}') no-repeat center center fixed;
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


    <!-- Page content -->
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
                                    <a data-toggle="modal" href="#avatar_modal" role="button"><img class="rounded-circle" width="38" height="38" src="{{asset(\Illuminate\Support\Facades\Auth::user()->Image)}}"></a>
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
                                <a href="{{route('Visitor.index')}}" class="nav-link @if(Request::is('index*')) active @endif">
                                    <i class="fa fa-home"></i>
                                    <span>
										{{__('message.Profile')}}
                                </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Visitor.VisitHistory')}}" class="nav-link @if(Request::is('*History*')) active @endif"><i class="fa fas fa-history"></i> <span>{{__('message.Visit')}} {{__('message.History')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Visitor.Payment')}}" class="nav-link @if(Request::is('*Payment*')) active @endif"><i class="fa fab fa-paypal"></i> <span>{{__('message.Entrance')}} {{__('message.Payment')}}</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('Visitor.Contact')}}" class="nav-link @if(Request::is('*Contact*')) active @endif   "><i class="fa fa-phone"></i> <span>{{__('message.ContactSupportTeam')}}</span></a>
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





                                                    <div class="scroll_box ChatsDiv w-100" id="ChatsDiv" style="background-color:transparent;border: 1px solid transparent ;height: 450px;border-radius: 5px;overflow-y: auto;overflow-x:hidden ">
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-8 bg-primary mt-2 ml-3" style="border-radius: 5px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, laudantium, voluptates. Adipisci aspernatur at commodi dolor et hic itaque odio provident quae, unde? Distinctio, est explicabo incidunt pariatur soluta totam.                                      </div>--}}

{{--                                                            <div class="col-3"></div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-3"></div>--}}
{{--                                                            <div class="col-8 bg-success mt-2 ml-3" style="border-radius: 5px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, laudantium, voluptates. Adipisci aspernatur at commodi dolor et hic itaque odio provident quae, unde? Distinctio, est explicabo incidunt pariatur soluta totam.                                          </div>--}}
{{--                                                        </div>--}}
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
                                    <div class="card" style="background-color:rgba(168,168,168,0.5);color: white;height: 535px !important">
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

        window.setInterval(function() {
            var elem = document.getElementById('ChatsDiv');
            elem.scrollDown = elem.scrollHeight;
        }, 3000);

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

            $.get('{{route('Visitor.ChatGet')}}',
                function (data) {

                    $(".ChatsDiv").empty();
                    if (data["Chat"].length <= 0){
                        var fieldhtml = '{{__('message.NoMessageAvailable')}}';
                        $('.ChatsDiv').append(fieldhtml);

                    }else {

                        for (var i = 0; i < data["Chat"].length; i++) {
                            if (data["Chat"][i]["Sender"] === 'Visitor') {
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
                url: '{{route('Visitor.Chat')}}',
                method: 'post',
                data: {
                    Text: new_message
                },
                success: function (data) {
                    $(".ChatsDiv").empty();
                    for (var i = 0; i < data["Chat"].length; i++) {
                        if (data["Chat"][i]["Sender"] === 'Visitor') {
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

    </script>
@endsection
