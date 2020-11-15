@extends('layouts.Panel')
@section('Head')
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="_token" content="{{csrf_token()}}"/>
@endsection
@section('content')
    <header class="d-flex masthead"
            style="background-image: url({{\App\Site::ExhibitorBackground()}});padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
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
                    <button type="button" data-toggle="tooltip" data-placement="top" title="Change Language"
                            onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning">
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

                </div>

                <div class="pull-right p-1 logout_section">
                    <button data-toggle="tooltip" data-placement="top" title="Logout"
                            onclick="document.getElementById('logout-form').submit()" class="btn btn-danger">
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
            <div class="d-inline-block float-left rounded"
                 style="background-color: rgb(54,54,54,65%);width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">
                <div class="float-left border rounded"
                     style="width: 244px;height: 452px;background-color: transparent;"><a
                        href="#avatar_modal" data-toggle="modal">
                        <img class="rounded-circle border" src="{{\Illuminate\Support\Facades\Auth::user()->Image}}"
                             style="width: 76px;height: 74px;margin-top: 8px;">
                    </a>
                    <div><a class="btn btn-primary btn-lg make_hidden" role="button" data-toggle="modal"
                            href="#myModal">Launch Demo Modal</a>
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
                    </div>
                    <div>
                        <div class="text-left"
                             style="background-color: transparent;height: 35px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">
                            <a class="remove_underline" href="{{route('Exhibitor.index')}}"
                               style="font-size: 19px;color: #ffffff;">{{__('message.Profile')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.MyBooth')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.Booth')}}</a></div>
                        <div class="text-left user_active_menu"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="#"
                               style="font-size: 20px;color: #000000;">{{__('message.Inbox')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.Statistics')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.Statistics')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.History')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.History')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.Payment')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.Payment')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.Confirmation')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.ConfirmationStatus')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.ContactUs')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.ContactUs')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 20px;margin-top: -15px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">
                            <a href="/Exhabition/" class="" target="_blank">
                                <button class="btn btn-block" type="button"
                                        style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 18px;text-decoration: none !important">
                                    {{__('message.EnterExhabition')}}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border rounded d-block float-left border"
                     style="width: 837px;height: 425px;background-color: #a8a8a892;padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                    <div class="float-left" style="background-color: #00000000;height: 406px;width: 278px;">
                        <div class="float-left" style="background-color: #00000000;height: 406px;width: 278px;">
                            <form onblur="is_typing = false" onfocus="is_typing = true"
                                  style="height: 7px;margin-bottom: 10px;" method="get"
                                  action="{{route('Exhibitor.Inbox')}}">
                                <div class="form-group" style="width: 305px;">
                                    <input class="form-control float-left" type="search"
                                           placeholder="{{__('message.Search')}}..."
                                           style="width: 240px;height: 33px;" name="SearchTerm">
                                    <button  class="btn float-left shadow-none" type="button"
                                             style="width: 1px;margin-right: 16px;margin-bottom: 31px;margin-top: -4px;"><i id="visiotr_refresh"
                                                                                                                            class="fa fa-cog text-dark"
                                                                                                                            style="font-size: 20px;margin-bottom: 16px;margin-right: 19px;"></i></button>
                                </div>
                            </form>
                                <div id="Users" class="scroll_box" style="height: 350px !important;" onscroll="scroll_status = true">
                                    @include("Exhibitor.user-list-data")
                                </div>
                        </div>
                    </div>
                    <div class="float-left"
                         style="background-color: #00000000;height: 406px;width: 532px;margin-left: 7px;">
                        <p class="text-left">
                            <strong>{{__('message.Messages')}}:
                                @if(request()->UserID)
                                    {{\App\User::find(request()->UserID)->UserName}}
                                @endif
                            </strong>
                        </p>
                        <div class="border rounded-0 float-left"
                             style="width: 407px;margin-right: 1px;margin-left: 63px;margin-bottom: 8px;height: 318px;margin-top: 0px;">

                            <div>
                                <div class="scroll_box ChatsDiv"
                                     style="height: 264px;margin-bottom: 11px;background-color: #edecec;" id="ChatsDiv">


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
                                <input class="border rounded border-dark form-control d-inline" type="text"
                                       style="margin-right: 17px;width: 208px;"
                                       id="myInput"
                                       name="Text" value="{{old('Text')}}">
                                <button class="btn btn-success d-inline" onclick="sendMessage()"
                                        style="height: 36px;width: 103px;">
                                    {{__('message.Send')}}
                                </button>
                            </div>
                        </div>
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
    </header>
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
                                var fieldHTML = '<div class="border rounded border-primary float-right nonoverflow scroll_box" style="height: 52px;width: 210px;margin-bottom: 17px;padding: 5px;background-color: #36ca5c;color: rgb(255,255,255);"><p class="nonoverflow">' + data['Chat'][i]['Text'] + '</p></div>';
                            } else {
                                var fieldHTML = '<div class="border rounded border-primary float-left nonoverflow scroll_box" style="height: 52px;width: 210px;margin-bottom: 9px;padding: 8px;background-color: #0c82fe;"><p class="nonoverflow" style="color: rgb(255,255,255);">' + data['Chat'][i]['Text'] + '</p></div>';

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
                                var fieldHTML = '<div class="border rounded border-primary float-right nonoverflow scroll_box" style="height: 52px;width: 210px;margin-bottom: 17px;padding: 5px;background-color: #36ca5c;color: rgb(255,255,255);"><p class="nonoverflow">' + data['Chat'][i]['Text'] + '</p></div>';
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

        @endif





    </script>
@endsection
