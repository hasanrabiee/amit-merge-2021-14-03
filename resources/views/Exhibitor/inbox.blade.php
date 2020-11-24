@extends('layouts.Panel')
@section('Head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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

                                        <a style="text-decoration: none !important" class=""
                                           href="{{ url('locale/en') }}"><i
                                                class="fa fa-globe"></i>English</a><br>
                                        <a style="text-decoration: none !important" class=""
                                           href="{{ url('locale/de') }}"><i
                                                class="fa fa-globe"></i>German</a><br>
                                        <a style="text-decoration: none !important" class=""
                                           href="{{ url('locale/al') }}"><i
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
                                            <button class="btn btn-success btn-block"
                                                    type="submit">{{__('message.UpdateAvatar')}} <i
                                                    class="fa fa-save" style="margin-left: 9px;"></i></button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light btn-block" data-dismiss="modal" type="button">
                                            {{__('message.Close')}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


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


                                {{--                            href="#myModal">Launch Demo Modal</a>--}}
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
                            <a href="{{route('Exhibitor.Inbox')}}" class="nav-link active"> <span>{{__('message.Inbox')}}</span></a>
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
                            <a href="/Exhibition/" class="" target="_blank"><span class="btn btn-success btn-lg">Enter Exhibition</span></a>
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
                        <div class="card p-3 card-inbox-ex-h" style="background-color:rgba(54,54,54,0.65);color: white;">
                            <div class="card-body py-0">
                                <div class="row">

                                    <div class="col-md-4" style="border: 1px solid white;border-radius: 5px; height: 600px;overflow-y: auto">


                                        <form action="{{route("Exhibitor.Inbox")}}" method="GET" class="w-100">
                                        <div class="input-group mt-2 mb-2">

                                            <input name="SearchTerm" type="text" class="form-control" placeholder="Search...">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">Search</button>
                                                <button  class="btn shadow-none" type="button"
                                                         style=""><i id="visiotr_refresh"
                                                                                                                                        class="fa fa-cog text-dark"
                                                                                                                                        style="font-size: 20px;"></i></button>
                                            </div>

                                        </div>

                                        </form>



                                        <div class="row">
                                            <div class="col-12 scroll_box"  id="Users" style="height: 450px !important;overflow-y: scroll" onscroll="scroll_status = true">
                                                @include("Exhibitor.user-list-data")
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-7">
                                        <p class="text-left">
                                            <strong>{{__('message.Messages')}}:
                                                @if(request()->UserID)
                                                    {{\App\User::find(request()->UserID)->UserName}}
                                                @endif
                                            </strong>
                                        </p>

                                            <div>
                                                <div class="scroll_box ChatsDiv" id="ChatsDiv" style="height: 460px;">


                                                    @if(isset($Chat))
                                                        {{__('message.Loading')}}
                                                    @else
                                                        @if(\Illuminate\Support\Facades\Auth::user()->ChatMode == 'Available')
                                                            {{__('message.PleaseSelectaChatFirst')}}
                                                        @else
                                                            {{__('message.MakeChatModeAvailable')}}
                                                        @endif
                                                    @endif


                                                </div>
                                            </div>
                                            <div
                                                @if(\Illuminate\Support\Facades\Auth::user()->ChatMode != 'Available') style="display: none" @endif>

                                                <div class="input-group mt-1">
                                                    <textarea type="text" class="form-control" aria-describedby="basic-addon2" id="myInput" rows="1"
                                                              name="Text" value="{{old('Text')}}"></textarea>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-success" type="button" onclick="sendMessage()"> {{__('message.Send')}}</button>
                                                    </div>
                                                </div>



{{--                                                <input class="border rounded border-dark form-control d-inline" type="text"--}}
{{--                                                       style="margin-right: 17px;width: 208px;"--}}
{{--                                                       id="myInput"--}}
{{--                                                       name="Text" value="{{old('Text')}}">--}}
{{--                                                <button class="btn btn-success d-inline" onclick="sendMessage()"--}}
{{--                                                        style="height: 36px;width: 103px;">--}}
{{--                                                    {{__('message.Send')}}--}}
{{--                                                </button>--}}
                                            </div>

                                        <div class="mt-3">
                                            <button
                                                @if(\Illuminate\Support\Facades\Auth::user()->ChatMode == 'Available')  class="btn btn-dark"
                                                disabled @else class="btn btn-success" @endif><a
                                                    href="@if(\Illuminate\Support\Facades\Auth::user()->ChatMode != 'Available') ?Mode=Available @else #  @endif"
                                                    class="text-light">{{__('message.ImAvailable')}}</a></button>
                                            <button @if(\Illuminate\Support\Facades\Auth::user()->ChatMode == 'Busy')   class="btn btn-dark"
                                                    disabled @else class="btn btn-danger" @endif><a
                                                    href=" @if(\Illuminate\Support\Facades\Auth::user()->ChatMode != 'Busy' ) ?Mode=Busy @else #  @endif"
                                                    class="text-light">{{__('message.ImBusy')}}</a></button>
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
        var scroll_status = false;

        var company_page = 1;
        var user_page = 1;
        function RefreshPage() {
            if (scroll_status == false) {
                $('#visiotr_refresh').trigger('click');
            }else {
                scroll_status = false;
            }
        }
        setInterval(RefreshPage, 10000);


        $( '#visiotr_refresh' ).click(function() {
            $( this ).addClass( 'fa-spin' );
            var $el = $(this);
            setTimeout(function() { $el.removeClass( 'fa-spin' ); }, 2000);
            reloadUsers()


        });
        function reloadUsers(){

            user_page = 1;
            $('#Users').empty()
            loadMoreDataUsers(user_page)



        }


        $(".scroll_box").on("scroll", function(){


            if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                    user_page++;
                    $( '#visiotr_refresh' ).addClass( 'fa-spin' );
                    var $el = $('#visiotr_refresh');
                    setTimeout(function() { $el.removeClass( 'fa-spin' ); }, 2000);
                    loadMoreDataUsers(user_page);
                }
        });



        function loadMoreDataUsers(page){
            $.ajax(
                {
                    url: '?page=' + page @if(\request()->UserID) + '&UserID={{\request()->UserID}}' @endif,
                    type: "get",
                    beforeSend: function()
                    {
                        $('.ajax-load').show();
                    }
                })
                .done(function(data)
                {
                    if(data.users_list == " "){
                        $('.ajax-load').html("No more records found");
                        return;
                    }
                    $('.ajax-load').hide();
                    $("#Users").append(data.Users);
                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                    alert('server not responding...');
                });
        }


        myInput.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                sendMessage()
                // Trigger the button element with a click
            }
        });




        var last_username = "";
        var field_html = "";





        @if (request()->input('UserID'))
        setInterval(GetMesage, 3000);



        function read_messages(BoothID, UserID ){


            $.get("{{route('Exhibitor.ChangeChatStatus')}}", {
                BoothID: BoothID,
                UserID: UserID
            },function (data){
            })

        }

        function sendMessage() {


            new_message = myInput.value
            myInput.value = ''
            const BoothID = {{$Booth->id}}
            const UserID = {{request()->UserID}};
            const url = '{{route('Exhibitor.InboxPost')}}';
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    Text: new_message,
                    BoothID: BoothID,
                    UserID: UserID,
                },
                success: function (data) {
                    $(".ChatsDiv").empty();
                    if (data["Chat"].length <= 0){
                        var fieldhtml = '{{__('message.NoMessageAvailable')}}';
                        $('.ChatsDiv').append(fieldhtml); //Add field html

                    }else {
                        for (var i = 0; i < data["Chat"].length; i++) {
                            if (data["Chat"][i]["Sender"] === 'Exhibitor') {


                                // <div class="col-8 bg-success mt-2 ml-3" style="border-radius: 5px;">
                                //     Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea, laudantium, voluptates. Adipisci aspernatur at commodi dolor et hic itaque odio provident quae, unde? Distinctio, est explicabo incidunt pariatur soluta totam.
                                // </div>
                                // <div class="col-3"></div>



                                var fieldHTML = '<div class="row"><div class="col-3"></div><div class="col-8 bg-success mt-2 ml-3" style="border-radius: 5px;"><p class="nonoverflow">' + data['Chat'][i]['Text'] + '</p></div></div>';
                            } else {
                                var fieldHTML = '<div class="row"><div class="col-8 bg-primary mt-2 ml-3" style="border-radius: 5px;"><p class="nonoverflow">' + data['Chat'][i]['Text'] + '</p></div><div class="col-3"></div></div>';

                            }
                            $('.ChatsDiv').append(fieldHTML); //Add field html

                            var objDiv = document.getElementById("ChatsDiv");
                            objDiv.scrollTop = objDiv.scrollHeight;
                        }
                    }
                }
            });

        }


        function GetMesage() {
            const BoothID = {{$Booth->id}}
            const UserID = {{request()->UserID}};

            read_messages(BoothID,UserID )


            $.get('{{route('Exhibitor.InboxGet')}}', {
                    BoothID: BoothID,
                    UserID: UserID,
                },
                function (data) {
                    $(".ChatsDiv").empty();
                    if (data["Chat"].length <= 0){
                        var fieldhtml = '{{__('message.NoMessageAvailable')}}';
                        $('.ChatsDiv').append(fieldhtml); //Add field html

                    }else {
                        for (var i = 0; i < data["Chat"].length; i++) {
                            if (data["Chat"][i]["Sender"] === 'Exhibitor') {
                                var fieldHTML = '<div class="row"><div class="col-3"></div><div class="col-8 bg-success mt-2 ml-3 p-1" style="border-radius: 5px;"><p class="">' + data['Chat'][i]['Text'] + '</p></div></div>';
                            } else {
                                var fieldHTML = '<div class="row"><div class="col-8 bg-primary mt-2 ml-3 p-1" style="border-radius: 5px;"><p class="">' + data['Chat'][i]['Text'] + '</p></div><div class="col-3"></div></div>';
                            }
                            $('.ChatsDiv').append(fieldHTML); //Add field html
                            var objDiv = document.getElementById("ChatsDiv");
                            objDiv.scrollTop = objDiv.scrollHeight;
                        }
                    }
                });
        }

        @endif








    </script>
@endsection
