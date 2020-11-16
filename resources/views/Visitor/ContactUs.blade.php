@extends('layouts.Panel')
@section('Head')
    <meta name="_token" content="{{csrf_token()}}"/>

@endsection
@section('content')
    <header class="d-flex masthead" style="background-image: url({{\App\Site::VisitorBackground()}});padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
        <div class="container my-auto text-center">
            <h3 class="mb-5"></h3>
            <div class="pull-right d-inline m-0">


                @if(\App\Site::find(1)->Logo1)
                    <img class="float-right" src="{{\App\Site::find(1)->Logo1}}"
                         style="width: 113px;margin-right: 34px;">
                @endif
                @if(\App\Site::find(1)->Logo2)
                    <img class="float-right" src="{{\App\Site::find(1)->Logo2}}"
                         style="width: 113px;margin-right: 34px;">
                @endif
                @if(\App\Site::find(1)->Logo3)
                    <img class="float-right" src="{{\App\Site::find(1)->Logo3}}"
                         style="width: 113px;margin-right: 34px;">
                @endif

            </div>

            <div style="width: 354px;height: 45px;background-color: #525252; margin-top: 70px" class="rounded">

                <div class="pull-right p-1">
                    <button type="button" data-toggle="tooltip" data-placement="top" title="Change Language" onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning">
                        <i class="fa fa-globe"></i>
                    </button>
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

                </div>

                <div class="pull-right p-1 logout_section">
                    <button data-toggle="tooltip" data-placement="top" title="Logout" onclick="document.getElementById('logout-form').submit()" class="btn btn-danger">
                        <i class="fa fa-sign-out"></i>
                    </button>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>


                </div>





                <div class="d-inline float-left"
                     style="background-color: transparent;height: 26px;width: 122px;margin-left: 2px;">
                    <h6 class="text-left"
                        style="width: 115px;height: 41px;padding: 7px;color: rgb(255,255,255);margin-left: 4px;">
                        {{\Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Auth::user()->UserName , 18)}} </h6>
                </div>



            </div>
            <div class="d-inline-block float-left rounded amitiss_back"  style="width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">
                <div class="float-left border rounded" style="width: 244px;height: 452px;background-color: transparent;"><a href="#avatar_modal" data-toggle="modal">
                        <img class="rounded-circle border" src="{{\Illuminate\Support\Facades\Auth::user()->Image}}" style="width: 76px;height: 74px;margin-top: 8px;">
                    </a>
                    <div><a class="btn btn-primary btn-lg make_hidden" role="button" data-toggle="modal" href="#myModal">Launch Demo Modal</a>
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
                    <div>
                        <div class="text-left" style="background-color: transparent;height: 44px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="{{route('Visitor.index')}}" style="font-size: 20px;color: #ffffff;">{{__('message.Profile')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Visitor.VisitHistory')}}" style="font-size: 20px;color: #ffffff;"> {{__('message.History')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="{{route('Visitor.Payment')}}" style="font-size: 20px;color: #ffffff;"> {{__('message.Payment')}}</a></div>
                        <div class="text-left user_active_menu" style="background-color: #00000000;min-height: 60px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="#" style="font-size: 20px;color: #000000;">{{__('message.ContactSupportTeam')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"> <a href="/Exhabition/" class="" target="_blank">
                            <button class="btn btn-block" type="button"
                                    style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 20px;" >
                                {{__('message.EnterExhabition')}}
                            </button>
                            </a></div>
                    </div>
                </div>
                <div class="border rounded d-block float-left border" style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                    <div class="border rounded border-primary float-left border" style="background-color: #ffffff;height: 400px;width: 815px;margin-bottom: 0px;margin-left: 2px;padding: 2px;padding-top: -2px;margin-top: 6px;">
                        <div class="border rounded-0 float-left" style="width: 387px;margin-right: 1px;margin-left: 6px;margin-bottom: 8px;height: 318px;">
                            <div class="scroll_box ChatsDiv" id="ChatsDiv" style="height: 264px;margin-bottom: 11px;">

                                {{__('message.Loading')}}
                            </div>

                                <input class="border rounded border-dark form-control d-inline" type="text" style="margin-right: 17px;width: 208px;" id="myInput"  name="Text" value="{{old('Text')}}">
                                <button class="btn btn-success d-inline" style="height: 36px;width: 103px;" onclick="sendMessage()">
                                    {{__('message.Send')}}
                                </button>
                        </div>
                        <div class="float-right" style="width: 391px;height: 334px;padding: 16px;margin-right: 22px;">
                            <h2 class="text-left" style="margin-right: 85px;margin-bottom: 24px;color: #7abbb2;">{{__('message.ContactUs')}}</h2>
                            <h2 class="text-left float-left" style="margin-right: 500px;margin-bottom: 24px;font-size: 24px;color: #7abbb2;width: 224px;">{{\App\Site::find(1)->Name}}</h2>
                            <div class="text-left" >
                                <p><i class="fa fa-map-marker" style="width: 17px;font-size: 24px;margin-right: 11px;color: #7abbb2;"></i>{{\App\Site::find(1)->AdminLocation}}</p>
                                <p><i class="fa fa-phone" style="width: 17px;font-size: 24px;margin-right: 11px;color: #7abbb2;"></i>{{\App\Site::find(1)->AdminTel}}</p>
                                <p><i class="fa fa-envelope" style="width: 17px;font-size: 24px;margin-right: 15px;color: #7abbb2;"></i>{{\App\Site::find(1)->AdminAddress}}</p>






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
                                var fieldHTML = '<div class="border rounded border-primary float-right nonoverflow scroll_box" style="height: 52px;width: 190px;margin-bottom: 17px;padding: 5px;background-color: #36ca5c;color: rgb(255,255,255);"><p class="nonoverflow">' + data['Chat'][i]['Text'] + '</p></div>';
                            } else {
                                var fieldHTML = '<div class="border rounded border-primary float-left nonoverflow scroll_box" style="height: 52px;width: 210px;margin-bottom: 9px;padding: 8px;background-color: #0c82fe;"><p class="nonoverflow" style="color: rgb(255,255,255);">' + data['Chat'][i]['Text'] + '</p></div>';
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
                            var fieldHTML = '<div class="border rounded border-primary float-right nonoverflow scroll_box" style="height: 52px;width: 190px;margin-bottom: 17px;padding: 5px;background-color: #36ca5c;color: rgb(255,255,255);"><p class="nonoverflow">' + data['Chat'][i]['Text'] + '</p></div>';
                        } else {
                            var fieldHTML = '<div class="border rounded border-primary float-left nonoverflow scroll_box" style="height: 52px;width: 210px;margin-bottom: 9px;padding: 8px;background-color: #0c82fe;"><p class="nonoverflow" style="color: rgb(255,255,255);">' + data['Chat'][i]['Text'] + '</p></div>';
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
