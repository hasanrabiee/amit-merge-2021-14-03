@extends('layouts.Panel')
@section('content')
    <header class="d-flex masthead" style="background-image: url({{\App\Site::AdminBackground()}});padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
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
            <div class="d-inline-block float-left" style="background-color: rgba(0,0,0,0);width: 1126px;height: 452px;margin-right: 46px;padding: 2px;padding-top: 0px;padding-right: 3px;">
                <div class="border rounded d-block float-left border" style="width: 230px;height: 480px;background-color: rgba(54,54,54,0.77);padding: 7px;color: #363636;padding-top: 7px;">
                    <div>
                        <h5 class="text-left" style="color: rgb(255,255,255);">{{__('message.Manage')}} {{__('message.Event')}}</h5>
                        <div class="text-left" style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.index')}}" style="color: #b3b8b8;">{{__('message.Inbox')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #363636;"><a class="text-left" href="{{route('Admin.History')}}" style="color: #b3b8b8;">{{__('message.History')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #363636;"><a class="text-left" href="{{route('Admin.Lounge')}}" style="color: #b3b8b8;">{{__('message.Lounge')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.Statistics')}}" style="color: #b3b8b8;">{{__('message.Statistics')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.RegisteredVisitor')}}" style="color: #b3b8b8;">{{__('message.Registered')}} {{__('message.Visitors')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.RegisteredExhibitor')}}" style="color: #b3b8b8;">{{__('message.Registered')}} {{__('message.Exhibitors')}}<br></a></div>
                                                <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.Auditorium')}}" style="color: #b3b8b8;">{{__('message.Auditorium')}} {{__('message.Schedule')}}<br></a></div>

                        <h5 class="text-left" style="color: rgb(255,255,255);">{{__('message.Create')}} {{__('message.Event')}}</h5>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.Setting')}}" style="color: #b3b8b8;">{{__('message.Setting')}}</a></div>

                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.Signin')}}" style="color: #b3b8b8;">{{__('message.Signin')}} {{__('message.Page')}}</a></div>
                        <div class="text-left border rounded active-page" style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="#" style="color: #545454;">{{__('message.Visitor')}} {{__('message.Page')}}</a></div>
                        <div class="text-left" style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.ExhibitorSetting')}}" style="color: #b3b8b8;">{{__('message.Exhibitor')}} {{__('message.Page')}}</a></div>
                        <div class="text-left" style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.AppAdjustment')}}" style="color: #b3b8b8;">{{__('message.App')}} {{__('message.Adjustment')}}<br></a></div>
                    </div>
                </div>
                <form class="form-inline" method="post" action="{{route('Admin.VisitorSettingPost')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="border rounded d-block float-left border" style="width: 843px;height: 452px;background-color: rgba(168,168,168,0.84);padding: 7px;color: #363636;margin-left: 22px;">
                        <h5 class="text-left" style="padding: 2px;padding-left: 42px;color: #000000;height: 45px;">{{__('message.Theme')}}</h5>
                        <div style="background-color: transparent;height: 57px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: -20px;">
                            <div class="form-group text-left"><label style="color: rgb(255,255,255);margin-right: 23px;">{{__('message.BackgroundPicture')}}</label>
                                <input type="file" name="VisitorBackGround"></div>
                        </div>
                        <h5 class="text-left" style="padding: 2px;padding-left: 42px;color: #000000;height: 45px;">{{__('message.Info')}}</h5>
                        <div style="background-color: transparent;height: 367px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: -36px;">
                            <div class="form-group text-left" style="width: 578px;margin-bottom: 6px;">
                                <input class="border rounded form-control" type="text" style="width: 239px;padding: -3px;padding-left: 8px;" placeholder="Welcome" name="VisitorWelcome" value="{{$Site->VisitorWelcome}}"></div>
                            <div style="width: 716px;height: 79px;margin-top: 1px;margin-bottom: 2px;">
                                <textarea class="border rounded form-control form-control-lg float-left" style="width: 360px;height: 75px;margin-bottom: 0px;padding-bottom: -3px;" placeholder="About Visitors" name="VisitorAbout">{{$Site->VisitorAbout}}</textarea><label style="color: rgb(255,255,255);">{{__('message.Gender')}}:&nbsp;</label>

                                <input class="border rounded form-control" type="text" style="width: 237px;margin-left: 9px;" name="VisitorGender" value="{{$Site->VisitorGender}}" placeholder="Genders (Seperate with comma ,)"><label style="color: rgb(255,255,255);">{{__('message.Profession')}}:&nbsp;</label>
                                <input class="border rounded form-control" type="text" style="width: 237px;margin-left: 376px;" placeholder="(Seperate with comma ,)" name="VisitorProfession" value="{{$Site->VisitorProfession}}">
                                <div></div>
                                <div></div>
                            </div>
                            <textarea class="border rounded form-control form-control-lg float-left" style="width: 360px;height: 67px;margin-bottom: 15px;" placeholder="About Payment" name="VisitorAboutPayment">{{$Site->VisitorAboutPayment}}</textarea>
                            <div class="text-left float-left" style="padding-top: -5px;height: 32px;"></div>
                            <div class="text-left float-left" style="padding-top: 15px;height: 32px;">
                                <input class="border rounded form-control" type="text" style="width: 210px;padding: -3px;padding-left: 8px;margin-top: -21px;margin-bottom: 8px;margin-right: 7px;" placeholder="Entracne Fee" disabled="" readonly="">
                                <input class="border rounded form-control" type="text" style="width: 77px;padding: -3px;padding-left: 8px;margin-top: -21px;margin-bottom: 8px;margin-right: 7px;" placeholder="11" name="VisitorPayment" value="{{$Site->VisitorPayment}}">
                                <input class="border rounded form-control" type="text" style="width: 77px;padding: -3px;padding-left: 8px;margin-top: -21px;margin-bottom: 8px;margin-right: 7px;" value="{{$Site->MoneyType}}" name="MoneyType">

                            </div><button class="btn text-center float-right green-button" type="submit" style="width: 160px;/*background-color: #05c965;*/color: rgb(255,255,255);margin-top: 58px;">{{__('message.Save')}}</button></div>
                    </div>
                </form>
            </div>
        </div>
    </header>
@endsection
