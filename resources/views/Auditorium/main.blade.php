@extends('layouts.Panel')
@section('content')
    <header class="d-flex masthead"
            style="background-image: url({{\App\Site::VisitorBackground()}});padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
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
                        {{\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->UserName}} </h6>
                </div>



            </div>






            <div class="d-inline-block float-left rounded"
                 style="background-color: rgb(54,54,54,65%);width: 900px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">
                <div class="border rounded d-block float-left border"
                     style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                    <h5 class="text-left" style="padding: 18px;padding-left: 42px;color: #ffffff;height: 45px;">Profile
                        Information


                    </h5>
                    <div class="border rounded border-primary border"
                         style="background-color: #e8e8e8;height: 129px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: 18px;">
                        <div style="height: 91px;background-color: transparent;margin-top: -11px;">
                            <div class="float-left" style="margin-right: 150px;">
                                <p class="text-left" style="margin-bottom: 6px;">Speaker
                                    Name: {{\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Name}}</p>
                                <p class="text-left" style="margin-bottom: 6px;">Speaker
                                    UserName: {{\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->UserName}}</p>
                                <p class="text-left" style="margin-bottom: 6px;">
                                    SpeechTitle: {{\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->SpeechTitle}}</p>
                                @if(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->BoothID)
                                    <p class="text-left" style="margin-bottom: 6px;">Company
                                        Name: {{\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Booth->CompanyName}}</p>
                                @endif
                            </div>
                            @if(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak != null)
                                <div class="float-left">
                                    <p class="text-left" style="margin-bottom: 6px;">Conference
                                        Date: {{\Illuminate\Support\Facades\Session::get('Speaker')->Speak->Day}}</p>
                                    <p class="text-left" style="margin-bottom: 6px;">Start
                                        Time: {{\Carbon\Carbon::parse(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak->Start)->format('H:i')}}
                                        <br></p>
                                    <p class="text-left" style="margin-bottom: 6px;">End
                                        Time: {{\Carbon\Carbon::parse(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak->End)->format('H:i')}}
                                        <br></p>
                                    <p class="text-left" style="margin-bottom: 6px;">Confrence
                                        Time: {{\Carbon\Carbon::parse(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak->Start)->diffInMinutes(\Carbon\Carbon::parse(\Illuminate\Support\Facades\Session::get('Speaker')->Speak->End))}}
                                        Minutes<br></p>
                                </div>
                                @php
                                    $Date =\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak->Day . ' ' .  \Carbon\Carbon::parse(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak->Start)->format('H:i');
                                    $Diff = \Carbon\Carbon::parse($Date)->diffInSeconds(\Carbon\Carbon::now());
                                @endphp
                            @endif

                        </div>
                    </div>
                    <div class="text-left border rounded d-inline float-left"
                         style="background-color: #e8e8e8;height: 204px;width: 336px;margin-bottom: 0px;margin-left: 38px;margin-top: 13px;padding: 7px;">
                        <form style="width: 259px;" action="{{route('Auditorium.ChangePassword')}}" method="post">
                            @csrf
                            <div class="form-group"><input class="form-control form-control-sm" type="password"
                                                           placeholder="Old Password" name="OldPassword"></div>
                            <div class="form-group"><input class="form-control form-control-sm" type="password"
                                                           placeholder="New Password" name="password"></div>
                            <div class="form-group"><input class="form-control form-control-sm" type="password"
                                                           placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <button class="btn btn-success text-center" type="submit"
                                    style="width: 160px;color: rgb(255,255,255);">Update Password
                            </button>
                            <div class="btn-group" role="group"></div>
                        </form>
                    </div>
                    <div class="text-left border rounded d-inline float-left"
                         style="background-color: #e8e8e8;height: 204px;width: 336px;margin-bottom: 0px;margin-left: 38px;margin-top: 13px;padding: 7px;">
                        <a href="#"><h3>How to Start Video Conference</h3></a>
                         @if(true)
                            <div style="margin-top: 30px">
                             @if(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->HaveStreamKey == 'No')
                                    @if(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak != null)

                                    <form method="post" action="{{route('Auditorium.StreamKey')}}">
                                    @csrf
                                    <input type="hidden" value="{{\Illuminate\Support\Facades\Session::get('Speaker')->id}}" name="SpeakerID">
                                    <button class="btn btn-success" type="submit">Show Stream Key</button>
                                </form>
                                    @else
                                        You Haven't Speak yet
                                        @endif
                            @else

                               <button onclick="ShowStreamKey()" class="btn btn-primary">Streaming Setting</button>
                               <a  class="btn btn-secondary" href="{{route('Auditorium.Chats' , \Illuminate\Support\Facades\Session::get('Speaker')->id)}}" >Show Chats</a>
                                @endif


                            </div>
                        @else
                            <span id="countdown" class="timer"></span>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </header>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    @if(\App\Speaker::find(\Illuminate\Support\Facades\Session::get('Speaker')->id)->Speak != null)
    <script>
        var upgradeTime = {{$Diff}};
        var seconds = upgradeTime;

        function timer() {
            var days = Math.floor(seconds / 24 / 60 / 60);
            var hoursLeft = Math.floor((seconds) - (days * 86400));
            var hours = Math.floor(hoursLeft / 3600);
            var minutesLeft = Math.floor((hoursLeft) - (hours * 3600));
            var minutes = Math.floor(minutesLeft / 60);
            var remainingSeconds = seconds % 60;

            function pad(n) {
                return (n < 10 ? "0" + n : n);
            }

            document.getElementById('countdown').innerHTML = pad(days) + ":" + pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);
            if (seconds == 0) {
                clearInterval(countdownTimer);
                document.getElementById('countdown').innerHTML = "Your Conference Started";
            } else {
                seconds--;
            }
        }

        var countdownTimer = setInterval('timer()', 1000);

        function ShowStreamKey(){
            Swal.fire({
                title: '<p>Your Streaming Setting</p>',
                icon: 'info',
                html:
                    'RTMP Address => {{\App\Site::find(1)->RtmpAddress}}' +
                    '<br>' +
                    ' Stream Key => {{ \App\Site::find(1)->StreamKey}}',
                showCloseButton: true
            })
        }
    </script>
    @endif
@endsection
