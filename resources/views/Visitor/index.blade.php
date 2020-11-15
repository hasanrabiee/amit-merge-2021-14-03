@extends('layouts.Panel')
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
                        <img class="rounded-circle border" src="{{asset(\Illuminate\Support\Facades\Auth::user()->Image)}}" style="width: 76px;height: 74px;margin-top: 8px;">
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
                        <div class="text-left border rounded user_active_menu" style="background-color: transparent;height: 44px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="#" style="font-size: 20px;color: #000000;">{{__('message.Profile')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="{{route('Visitor.VisitHistory')}}" style="font-size: 20px;color: #ffffff;"> {{__('message.History')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="{{route('Visitor.Payment')}}" style="font-size: 20px;color: #ffffff;"> {{__('message.Payment')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="{{route('Visitor.Contact')}}" style="font-size: 20px;color: #ffffff;">{{__('message.ContactSupportTeam')}}<br></a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"> <a href="/Exhabition/" class="" target="_blank">
                            <button class="btn btn-block" type="button"
                                    style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 20px;" >
                                {{__('message.EnterExhabition')}}
                            </button>
                            </a></div>
                    </div>
                </div>
                <div class="border rounded d-block float-left border" style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                    <h5 class="text-left" style="padding: 18px;padding-left: 42px;color: #ffffff;height: 45px;"> {{__('message.ProfileInformation')}}
                    @if(\Illuminate\Support\Facades\Auth::user()->AccountStatus == 'Active')
                        <label class="border rounded" style="margin-left: 27px;background-color: #3cd442;padding: 5px;margin-bottom: 1px;color: rgb(255,255,255);">{{__('message.AccountActive')}}</label>
                        @else
                            <label class="border rounded" style="margin-left: 27px;background-color: rgb(209,28,28);padding: 5px;margin-bottom: 1px;color: rgb(255,255,255);">{{__('message.AccountSuspended')}}</label>
                        @endif

                    </h5>
                    <div class="border rounded border-primary border" style="background-color: #e8e8e8;height: 129px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: 18px;">
                        <div style="height: 91px;background-color: transparent;margin-top: -11px;">
                            <div class="float-left" style="margin-right: 150px;">
                                <p class="text-left" style="margin-bottom: 6px;">{{__('message.fn')}}  : {{\Illuminate\Support\Facades\Auth::user()->FirstName}}</p>
                                <p class="text-left" style="margin-bottom: 6px;">{{__('message.ln')}} : {{\Illuminate\Support\Facades\Auth::user()->LastName}}</p>
                                <p class="text-left" style="margin-bottom: 6px;">{{__('message.Profession')}}: {{\Illuminate\Support\Facades\Auth::user()->Profession}}</p>
                                <p class="text-left" style="margin-bottom: 6px;">{{__('message.City')}}: {{\Illuminate\Support\Facades\Auth::user()->City}}</p>
                            </div>
                            <div class="float-left">
                                <p class="text-left" style="margin-bottom: 6px;">{{__('message.Gender')}}: {{\Illuminate\Support\Facades\Auth::user()->Gender}}</p>
                                <p class="text-left" style="margin-bottom: 6px;">{{__('message.Country')}}: {{\Illuminate\Support\Facades\Auth::user()->Country}}<br></p>
                                <p class="text-left" style="margin-bottom: 6px;">{{__('message.BirthDate')}}: {{\Illuminate\Support\Facades\Auth::user()->BirthDate}}<br></p>
                                <p style="margin-bottom: 6px;">{{__('message.Email')}}: {{\Illuminate\Support\Facades\Auth::user()->email}}<br></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-left border rounded d-inline float-left" style="background-color: #e8e8e8;height: 204px;width: 336px;margin-bottom: 0px;margin-left: 38px;margin-top: 13px;padding: 7px;">
                        <form style="width: 259px;" action="{{route('Visitor.ChangePassword')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="password" placeholder="{{__('message.OldPass2')}} "
                                       name="OldPassword">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="password" placeholder="{{__('message.NewPass2')}} "
                                       name="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="password"
                                       placeholder="{{__('message.passwordConfrimation')}}" name="password_confirmation">
                            </div>

                            <button class="btn btn-success text-center" type="submit"
                                    style="width: 230px;color: rgb(255,255,255);">{{__('message.btn-Update')}}
                            </button>
                            <i
                                class="fa fa-info-circle" style="color: black;margin-left: 5px"
                                data-toggle="tooltip"
                                onclick="show_info('{{__('message.passwordHint')}}')"></i>
                            <div class="btn-group" role="group"></div>
                        </form>
                    </div>
                    <div class="border rounded d-inline float-left" style="background-color: #e8e8e8;height: 205px;width: 402px;margin-bottom: 0px;margin-left: 38px;margin-top: 13px;padding: 8px;">
                        <form method="post" action="{{route('Visitor.VisitExperience')}}">
                            @csrf
                            <textarea class="border rounded form-control float-left" style="width: 384px;height: 136px;" placeholder="{{__('message.VisitExp')}}" maxlength="120" name="VisitExperience">{!! \Illuminate\Support\Facades\Auth::user()->VisitExperience !!}</textarea>
                            <button class="btn btn-success float-left" type="submit" style="margin-top: 7px;width: 160px;color: rgb(255,255,255);">{{__('message.SendFeedBack')}} </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
