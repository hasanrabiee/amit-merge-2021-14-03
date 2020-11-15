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
                        <div class="text-left" style="background-color: transparent;height: 44px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="{{route('Visitor.index')}}" style="font-size: 20px;color: #ffffff;">{{__('message.Profile')}}</a></div>
                        <div class="text-left border rounded-0 user_active_menu" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);"><a class="text-left remove_underline" href="#" style="font-size: 20px;color: #000000;"> {{__('message.History')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="{{route('Visitor.Payment')}}" style="font-size: 20px;color: #ffffff;"> {{__('message.Payment')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"><a class="text-left remove_underline" href="{{route('Visitor.Contact')}}" style="font-size: 20px;color: #ffffff;">{{__('message.ContactSupportTeam')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"> <a href="/Exhabition/" class="" target="_blank">
                            <button class="btn btn-block" type="button"
                                    style="background-color: #149e5c;color: rgb(255,255,255);margin-right: 13px;font-size: 20px;" >
                                {{__('message.EnterExhabition')}}
                            </button>
                            </a></div>
                    </div>
                </div>
                <div class="border rounded d-block float-left border" style="width: 837px;height: 425px;background-color: #a8a8a892;padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                    <div class="float-left" style="background-color: #00000000;height: 406px;width: 278px;">
                        <div class="float-left" style="background-color: #00000000;height: 406px;width: 278px;">
                            <form onblur="is_typing = false" onfocus="is_typing = true" style="height: 7px;margin-bottom: 10px;" action="#search_company">
                                <div onblur="is_typing = false" onfocus="is_typing = true" class="form-group" style="width: 305px;"><input class="form-control float-left" type="search" placeholder="Search..." style="width: 240px;height: 33px;" name="search">
                                    <button onblur="is_typing = false" onfocus="is_typing = true" class="btn float-left shadow-none" type="submit" style="width: 1px;margin-right: 16px;margin-bottom: 31px;margin-top: -4px;"><i class="fa fa-search" style="font-size: 20px;margin-bottom: 16px;margin-right: 19px;"></i></button></div>
                            </form>
                            <div class="scroll_box" style="background-color: #00000000;height: 351px;margin-top: 18px;width: 276px;">
                                <div>
                                    @foreach($Booths as $booth)
                                    <div
                                        @if(request()->CompanyID == $booth->id)
                                        class="text-left border rounded active_company" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"
                                            @else
                                            class="text-left border rounded-0" style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"
                                            @endif
                                        >
                                        <a class="text-left remove_underline" href="?CompanyID={{$booth->id}}" style="font-size: 20px;color: #ffffff;">
                                            {{$booth->CompanyName}}
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    @if(isset($Booth))
                    <div class="float-left" style="background-color: #00000000;height: 406px;width: 532px;margin-left: 7px;">
                        <div class="float-left" style="background-color: #00000000;height: 405px;width: 257px;">
                            <p class="text-left" style="font-size: 19px;"><strong>{{__('message.CompanyInformation')}}</strong></p>
                            <div class="border rounded" style="background-color: #fffefe;height: 356px;"><img src="{{$Booth->Logo}}" style="width: 65px;">
                                <p class="text-left" style="margin-top: 23px;">{{__('message.Company')}} {{__('message.Name')}}: {{$Booth->CompanyName}}</p>
                                <p class="text-left d-inline" style="margin-right: 37px;">{{__('message.Hall')}}: {{$Booth->Hall}}</p>
                                <p class="d-inline" style="margin-bottom: 29px;">{{__('message.Booth')}} {{__('message.number')}}: {{$Booth->Position}}</p>
                                <p class="text-left" style="margin-top: 16px;">{{__('message.AboutCompany')}} :</p>
                                <div class="scroll_box" style="height: 98px;padding: 0px;width: 240px;">
                                    <p class="text-left scroll_box" style="margin-top: 14px;height: 73px;">{{$Booth->Description}}</p>
                                </div>
                                <p class="text-left" style="margin-top: 14px;height: 42px;">{{__('message.WebSite')}}: <a href="{{$Booth->WebSite}}">{{$Booth->WebSite}}</a></p>
                            </div>
                        </div>
                        <div class="float-left" style="background-color: #00000000;height: 402px;width: 257px;margin-left: 11px;">
                            <p class="text-left" style="font-size: 19px;"><strong>{{__('message.ChatHistory')}} </strong></p>
                            <div style="background-color: #00000000;height: 351px;">
                                <div class="scroll_box" style="height: 356px;padding: 0px;width: 261px;background-color: #ffffff;">
                                    @foreach(\App\Chat::where('UserID' , \Illuminate\Support\Facades\Auth::id())->where('BoothID' , $Booth->id)->get() as $Chat)
                                        <p @if($Chat->Sender == 'Visitor')
                                           class="text-right border rounded" style="padding: 9px;background-color: #36ca5c;color: rgb(255,255,255);"
                                            @else
                                            class="text-left border rounded" style="padding: 9px;background-color: #0c82fe;color: rgb(255,255,255);"
                                            @endif
                                            >
                                            {{$Chat->Text}}
                                        </p>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
@endsection
