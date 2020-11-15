@extends('layouts.Panel')
@section('content')
    <header class="d-flex masthead"
            style="background-image: url({{\App\Site::AdminBackground()}});padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
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
            <div class="d-inline-block float-left"
                 style="background-color: rgba(0,0,0,0);width: 1126px;height: 452px;margin-right: 46px;padding: 2px;padding-top: 0px;padding-right: 3px;">
                <div class="border rounded d-block float-left border"
                     style="width: 230px;height: 480px;background-color: rgba(54,54,54,0.77);padding: 7px;color: #363636;padding-top: 7px;">
                    <div>



                        <h5 class="text-left" style="color: rgb(255,255,255);">{{__('message.Manage')}} {{__('message.Event')}}</h5>
                        <div class="text-left" style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.index')}}" style="color: #b3b8b8;">{{__('message.Inbox')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #363636;"><a class="text-left" href="{{route('Admin.History')}}" style="color: #b3b8b8;">{{__('message.History')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #363636;"><a class="text-left" href="{{route('Admin.Lounge')}}" style="color: #b3b8b8;">{{__('message.Lounge')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.Statistics')}}" style="color: #b3b8b8;">{{__('message.Statistics')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.RegisteredVisitor')}}" style="color: #b3b8b8;">{{__('message.Registered')}} {{__('message.Visitors')}}<br></a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.RegisteredExhibitor')}}" style="color: #b3b8b8;">{{__('message.Registered')}} {{__('message.Exhibitors')}}<br></a></div>
                                                <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.Auditorium')}}" style="color: #b3b8b8;">{{__('message.Auditorium')}} {{__('message.Schedule')}}<br></a></div>

                        <h5 class="text-left" style="color: rgb(255,255,255);">{{__('message.Create')}} {{__('message.Event')}}</h5>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.Setting')}}" style="color: #b3b8b8;">{{__('message.Setting')}}</a></div>

                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="{{route('Admin.Signin')}}" style="color: #b3b8b8;">{{__('message.Signin')}} {{__('message.Page')}}</a></div>
                        <div class="text-left" style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.VisitorSetting')}}" style="color: #b3b8b8;">{{__('message.Visitor')}} {{__('message.Page')}}</a></div>
                        <div class="text-left" style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;"><a class="text-left" href="{{route('Admin.ExhibitorSetting')}}" style="color: #b3b8b8;">{{__('message.Exhibitor')}} {{__('message.Page')}}</a></div>
                        <div class="text-left active-page" style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;"><a class="text-left" href="#" style="color: #b3b8b8;">{{__('message.App')}} {{__('message.Adjustment')}}<br></a></div>

                    </div>
                </div>
                <div class="border rounded d-block float-left border"
                     style="width: 843px;height: 452px;background-color: rgba(168,168,168,0.84);padding: 7px;color: #363636;margin-left: 22px;">
                    <form method="post" action="{{route('Admin.AppAdjustmentPost')}}" enctype="multipart/form-data"
                          id="Form1">
                        @csrf
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 800px">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                                   aria-selected="true">{{__('message.Entrance')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                                   aria-selected="false">{{__('message.Lobby')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="hall-tab" data-toggle="tab" href="#hall" role="tab" aria-controls="hall"
                                   aria-selected="false">{{__('message.Hall')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="lounge-group-tab" data-toggle="tab" href="#lounge-group" role="tab" aria-controls="lounge"
                                   aria-selected="false">{{__('message.Lounge')}} {{__('message.Group')}}</a>

                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="max-height: 300px">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="overflow-auto" style="max-height: 300px;">

                                <p class="text-left">{{__('message.Upload')}} {{__('message.Your')}} {{__('message.Images')}}:</p>
                                <div class="form-group">
                                    <label>A (1200x1200)</label>
                                    <input type="file" name="Main1">
                                </div>
                                <div class="form-group">
                                    <label>B (408x652)</label>
                                    <input type="file" name="Main2">
                                </div>
                                <div class="form-group">
                                    <label>C (200x760)</label>
                                    <input type="file" name="Main3">
                                </div>
                                <div class="form-group">
                                    <label>D (200x760)</label>
                                    <input type="file" name="Main4">
                                </div>
                                <div class="form-group">
                                    <label>E (200x760)</label>
                                    <input type="file" name="Main5">
                                </div>
                                <div class="form-group">
                                    <label>F (200x760)</label>
                                    <input type="file" name="Main6">
                                </div>
                                <img src="{{asset('assets/img/aaa.png')}}" style="width: 418px;">

                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="overflow-auto" style="max-height: 300px;">
                                    <p class="text-left">{{__('message.Upload')}} {{__('message.Your')}} {{__('message.Images')}}:</p>
                                    <div class="form-group"><label style="margin-right: 19px;">A (1212x507)</label><input type="file" name="Loby1"></div>
                                    <div class="form-group"><label style="margin-right: 19px;">B (664x1200)</label><input type="file" name="Loby2"></div>
                                    <div class="form-group"><label style="margin-right: 19px;">C (664x1200)</label><input type="file" name="Loby3"></div>
                                    <div class="form-group"><label style="margin-right: 19px;">D (664x1200)</label><input type="file" name="Loby4"></div><img src="{{asset('assets/img/pic-04.png')}}" style="width: 418px;">

                                </div>
                            </div>

                            <div class="tab-pane fade" id="hall" role="tabpanel" aria-labelledby="hall-tab">
                                <div class="overflow-auto" style="max-height: 300px;max-width: 800px;">
                                    <p class="text-left">{{__('message.Upload')}} {{__('message.Your')}} {{__('message.Images')}}:</p>
                                    <h6 class="float-left">Wall Poster (1490x700)</h6><br>

                                    <div style="margin-bottom: 10px">

                                        <div class="form-group"><label class="float-left"><strong><mark>A1</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter1"></label><label class="float-left"
                                                                                      style="margin-right: 10px;padding: -6px;"><strong><mark>A2</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter2"></label></div>
                                        <div class="form-group"><label class="float-left"><strong><mark>B1</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter3"></label><label class="float-left"
                                                                                      style="margin-right: 10px;padding: -6px;"><strong><mark>B2</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter4"></label></div>
                                        <div class="form-group"><label class="float-left"><strong><mark>C1</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter5"></label><label class="float-left"
                                                                                      style="margin-right: 10px;padding: -6px;"><strong><mark>C2</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter6"></label></div>
                                        <div class="form-group"><label class="float-left"><strong><mark>D1</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter7"></label><label class="float-left"
                                                                                      style="margin-right: 10px;padding: -6px;"><strong><mark>D2</mark></strong><input
                                                    type="file" style="width: 134px;margin-left: 10px;"
                                                    name="Wallposter8"></label></div>
                                        <img class="float-left" src="{{asset('assets/img/pic-01.png')}}"
                                             style="width: 250px;">
                                        <img class="float-left" src="{{asset('assets/img/01.png')}}"
                                             style="width: 326px;height: 327px;margin-bottom: 120px;">
                                        <br><br>
                                    </div>

                                    <h6 class="float-left">Grounded Billboard (1920x1200)</h6><br>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>A</mark></strong><input
                                                type="file" style="width: 134px;margin-left: 10px;"
                                                name="Stand1"></label><label class="float-left"
                                                                             style="margin-right: 10px;padding: -6px;"><strong><mark>B</mark></strong><input
                                                type="file" style="width: 134px;margin-left: 10px;"
                                                name="Stand2"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>C</mark></strong><input
                                                type="file" style="width: 134px;margin-left: 10px;"
                                                name="Stand3"></label><label class="float-left"
                                                                             style="margin-right: 10px;padding: -6px;"><strong><mark>D</mark></strong><input
                                                type="file" style="width: 134px;margin-left: 10px;"
                                                name="Stand4"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>E</mark></strong><input
                                                type="file" style="width: 134px;margin-left: 10px;"
                                                name="Stand5"></label><label class="float-left"
                                                                             style="margin-right: 10px;padding: -6px;"><strong><mark>F</mark></strong><input
                                                type="file" style="width: 134px;margin-left: 10px;"
                                                name="Stand6"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>G</mark></strong><input
                                                type="file" style="width: 134px;margin-left: 10px;"
                                                name="Stand7"></label></div>
                                    <div class="form-group"><br>
                                    </div>
                                    <img class="float-left" src="{{asset('assets/img/pic-02.png')}}"
                                         style="width: 397px;">
                                    <img class="float-left" src="{{asset('assets/img/02.png')}}"
                                         style="width: 333px;margin-bottom: 173px;">
                                    <h6 class="float-left">Hanging Bilboard (1920x1200)</h6>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>A</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Panposter1"></label><label class="float-left"
                                                                                    style="margin-right: 10px;padding: -6px;"><strong><mark>B</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Panposter2"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>C</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Panposter3"></label></div>
                                    <div class="form-group">
                                    </div>
                                    <img class="float-left" src="{{asset('assets/img/pic-08.png')}}"
                                         style="width: 397px;">
                                    <img class="float-left" src="{{asset('assets/img/04.png')}}"
                                         style="width: 326px;margin-bottom: 160px;">
                                    <h6 class="float-left">Hanging Bilboard Type 2 (1920x1200)</h6>

                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>A1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter1"></label><label class="float-left"
                                                                                         style="margin-right: 10px;padding: -6px;"><strong><mark>A2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter2"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>A3</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter3"></label><label class="float-left"
                                                                                         style="margin-right: 10px;padding: -6px;"><strong><mark>A4</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter4"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>B1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter5"></label><label class="float-left"
                                                                                         style="margin-right: 10px;padding: -6px;"><strong><mark>B2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter6"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>B3</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter7"></label>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>B4</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter8"></label><label class="float-left"
                                                                                         style="margin-right: 10px;padding: -6px;"><strong><mark>C1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter9"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>C2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter10"></label><label class="float-left"
                                                                                          style="margin-right: 10px;padding: -6px;"><strong><mark>C3</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter11"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>C4</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter12"></label><label class="float-left"
                                                                                          style="margin-right: 10px;padding: -6px;"><strong><mark>D1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter13"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>D2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter14"></label><label class="float-left"
                                                                                          style="margin-right: 10px;padding: -6px;"><strong><mark>D3</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter15"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>D4</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter16"></label><label class="float-left"
                                                                                          style="margin-right: 10px;padding: -6px;"><strong><mark>E1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter17"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>E2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter18"></label><label class="float-left"
                                                                                          style="margin-right: 10px;padding: -6px;"><strong><mark>E3</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter19"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>E4</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter20"></label><label class="float-left"
                                                                                          style="margin-right: 10px;padding: -6px;"><strong><mark>F1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter21"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>F2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter22"></label><label class="float-left"
                                                                                          style="margin-right: 10px;padding: -6px;"><strong><mark>F3</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter23"></label>
                                        <label class="float-left"
                                               style="margin-right: 10px;padding: -6px;"><strong><mark>F4</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Rotationposter24"></label>
                                    </div>
                                    <img class="float-left" src="{{asset('assets/img/pic-07.png')}}"
                                         style="width: 460px;"><img class="float-left"
                                                                    src="{{asset('assets/img/05.png')}}"
                                                                    style="width: 320px;margin-bottom: 216px;">
                                    <h6 class="float-left">Grounded Poster (1920x1200)</h6>

                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>A1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Billboard1"></label><label class="float-left"
                                                                                    style="margin-right: 10px;padding: -6px;"><strong><mark>A2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Billboard2"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>B1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Billboard3"></label><label class="float-left"
                                                                                    style="margin-right: 10px;padding: -6px;"><strong><mark>B2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Billboard4"></label></div>
                                    <div class="form-group" style="margin-bottom: 24px;"><label class="float-left"
                                                                                                style="margin-right: 10px;padding: -6px;"><strong><mark>C1</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Billboard5"></label><label class="float-left"
                                                                                    style="margin-right: 10px;padding: -6px;"><strong><mark>C2</mark></strong>
                                            <input type="file" style="width: 134px;margin-left: 10px;"
                                                   name="Billboard6"></label></div>
                                    <img class="float-left" src="{{asset('assets/img/pic-09.png')}}"
                                         style="width: 250px;"><img class="float-left"
                                                                    src="{{asset('assets/img/03.png')}}"
                                                                    style="width: 170px;">


                                </div>
                            </div>



                    </form>

                            <div class="tab-pane fade" id="lounge-group" role="tabpanel" aria-labelledby="lounge-group-tab">
                               <div class="scroll_box" >
                                <table class="table table-striped ">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{__('message.Name')}}</th>
                                        <th scope="col">{{__('message.Member')}} {{__('message.Count')}}</th>
                                        <th scope="col">{{__('message.Create')}} {{__('message.Date')}}</th>
                                        <th scope="col">{{__('message.Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach(\App\Lounge::all() as $lounge)

                                    <tr>
                                        <td>{{$lounge->Name}}</td>
                                        <td>{{count(json_decode($lounge->Members))}}</td>
                                        <td>{{\Carbon\Carbon::instance($lounge->created_at)->format('Y-m-d')}}</td>
                                        <td>
                                            <a class="btn btn-danger" role="button" style="margin-left: 5px;"
                                               href="{{route('Admin.RemoveLoungeWithUrl' , $lounge->id)}}"><i
                                                    class="fa fa-trash" style="font-size: 15px;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                                    </tbody>
                                </table>
                               </div>
                                <form method="post" action="{{route('Admin.CreateLounge')}}">
                                    @csrf
                                    <div class="form-row"><label style="margin-right: 19px;">{{__('message.Group')}} {{__('message.Name')}}</label>
                                        <input type="text"  name="Name">
                                        <button type="submit" class="btn btn-success">{{__('message.Create')}}</button>

                            </div>


                        </form>
                    </div>

                </div>
                {{-- <div style="margin-top: 50px">
                     <a class="btn btn-primary btn-lg d-block" role="button" data-toggle="modal" href="#entrance_modal" style="margin-bottom: 10px;">Entrance Settings</a>
                     <a class="btn btn-primary btn-lg d-block" role="button" data-toggle="modal" href="#hall_modal" style="margin-bottom: 10px;">Hall Settings</a>
                     <a class="btn btn-primary btn-lg d-block" role="button" data-toggle="modal" href="#audio_modal" style="margin-bottom: 10px;">Auditorium Settings</a>
                     <a class="btn btn-primary btn-lg d-block" role="button" data-toggle="modal" href="#lobby_modal" style="margin-bottom: 10px;">Lobby Settings</a>
                     <div class="row">
                         <div class="col">
                             <a class="btn btn-primary btn-lg d-block" role="button" data-toggle="modal" href="#lounge_modal" style="margin-bottom: 10px;">Lounge Settings</a>
                         </div>
                         <div class="col">
                             <a class="btn btn-primary btn-lg d-block" role="button" data-toggle="modal" href="#lounge_modalGroup" style="margin-bottom: 10px;width: 180px">Create Group</a>
                         </div>
                     </div>


                    <div class="modal fade" role="dialog" tabindex="-1" id="entrance_modal">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4>Entrance Images</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                 <div class="modal-body">
                                     <p class="text-left">Upload Your Images:</p>
                                     <div class="form-group"><label style="margin-right: 19px;">A</label>
                                         <input type="file" name="Main1"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">B</label>
                                         <input type="file" name="Main2"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">C</label>
                                         <input type="file" name="Main3"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">D</label>
                                         <input type="file" name="Main4"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">E</label>
                                         <input type="file" name="Main5"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">F</label>
                                         <input type="file" name="Main6">
                                     </div>
                                     <img src="{{asset('assets/img/aaa.png')}}" style="width: 418px;"></div>
                                 <div class="modal-footer"><button class="btn btn-success btn-block" data-dismiss="modal" type="button">Close</button></div>
                             </div>
                         </div>
                     </div>
                     <div class="modal fade" role="dialog" tabindex="-1" id="audio_modal">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4>Audiotorium</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                 <div class="modal-body">
                                     <p class="text-left">Upload Your Images:</p>
                                     <div class="form-group"><label style="margin-right: 19px;">A</label>
                                         <input type="file" name="Auditorium1">
                                     </div>
                                     <div class="form-group"><label style="margin-right: 19px;">B</label>
                                         <input type="file" name="Auditorium2">
                                     </div>
                                     <img src="{{asset('assets/img/pic-05.png')}}" style="width: 418px;"></div>
                                 <div class="modal-footer"><button class="btn btn-success btn-block" data-dismiss="modal" type="button">Close</button></div>
                             </div>
                         </div>
                     </div>
                     <div class="modal fade" role="dialog" tabindex="-1" id="lounge_modal">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4>&nbsp;Lounge Images</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                 <div class="modal-body"
                                 >
                                     <p class="text-left">Upload Your Images:</p>
                                     <div class="form-group"><label style="margin-right: 19px;">A</label>
                                         <input type="file" name="Lounge1">
                                     </div>
                                     <div class="form-group"><label style="margin-right: 19px;">B</label>
                                         <input type="file" name="Lounge2">
                                     </div>
                                     <img src="{{asset('assets/img/pic-06.png')}}" style="width: 418px;">
                                 </div>


                                 <div class="modal-footer"><button class="btn btn-success btn-block" data-dismiss="modal" type="button">Close</button></div>
                             </div>
                         </div>
                     </div>
                     <div class="modal fade" role="dialog" tabindex="-1" id="lobby_modal">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4>&nbsp;Lobby Images</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                 <div class="modal-body">
                                     <p class="text-left">Upload Your Images:</p>
                                     <div class="form-group"><label style="margin-right: 19px;">A</label><input type="file" name="Loby1"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">B</label><input type="file" name="Loby2"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">C</label><input type="file" name="Loby3"></div>
                                     <div class="form-group"><label style="margin-right: 19px;">D</label><input type="file" name="Loby4"></div><img src="{{asset('assets/img/pic-04.png')}}" style="width: 418px;"></div>
                                 <div class="modal-footer"><button class="btn btn-success btn-block" data-dismiss="modal" type="button">Close</button></div>
                             </div>
                         </div>
                     </div>
                     <div class="modal fade" role="dialog" tabindex="-1" id="hall_modal">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h4>Hall Images</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                 <div class="modal-body scroll_box">
                                     <p class="text-left">Upload Your Images:</p>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A1</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter1"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A2</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter2"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B1</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter3"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B2</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter4"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C1</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter5"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C2</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter6"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>D1</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter7"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>D2</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Wallposter8"></label></div>
                                     <img class="float-left" src="{{asset('assets/img/pic-01.png')}}" style="width: 397px;"><img class="float-left" src="{{asset('assets/img/01.png')}}" style="width: 326px;height: 327px;margin-bottom: 120px;">
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Stand1"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Stand2"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Stand3"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>D</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Stand4"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>E</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Stand5"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>F</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Stand6"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>G</mark></strong><input type="file" style="width: 134px;margin-left: 10px;" name="Stand7"></label></div><img class="float-left" src="{{asset('assets/img/pic-02.png')}}" style="width: 397px;">
                                     <img class="float-left" src="{{asset('assets/img/02.png')}}" style="width: 333px;margin-bottom: 173px;">
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Panposter1"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Panposter2"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Panposter3"></label></div><img class="float-left" src="{{asset('assets/img/pic-08.png')}}" style="width: 397px;">
                                     <img class="float-left" src="{{asset('assets/img/04.png')}}" style="width: 326px;margin-bottom: 160px;">
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter1"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter2"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A3</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter3"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A4</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter4"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter5"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter6"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B3</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter7"></label>
                                     </div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B4</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter8"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter9"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter10"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C3</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter11"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C4</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter12"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>D1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter13"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>D2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter14"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>D3</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter15"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>D4</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter16"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>E1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter17"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>E2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter18"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>E3</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter19"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>E4</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter20"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>F1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter21"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>F2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter22"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>F3</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter23"></label>
                                         <label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>F4</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Rotationposter24"></label>
                                     </div><img class="float-left" src="{{asset('assets/img/pic-07.png')}}" style="width: 460px;"><img class="float-left" src="{{asset('assets/img/05.png')}}" style="width: 344px;margin-bottom: 216px;">
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Billboard1"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>A2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Billboard2"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Billboard3"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>B2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Billboard4"></label></div>
                                     <div class="form-group" style="margin-bottom: 24px;"><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C1</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Billboard5"></label><label class="float-left" style="margin-right: 10px;padding: -6px;"><strong><mark>C2</mark></strong>
                                             <input type="file" style="width: 134px;margin-left: 10px;" name="Billboard6"></label></div><img class="float-left" src="{{asset('assets/img/pic-09.png')}}" style="width: 397px;"><img class="float-left" src="{{asset('assets/img/03.png')}}" style="width: 271px;"></div>
                                 <div class="modal-footer"><button class="btn btn-success btn-block" data-dismiss="modal" type="button">Close</button></div>
                             </div>
                         </div>
                     </div>
                     <button class="btn btn-success  " type="submit" style="font-size: 25px;">Deploy Updates&nbsp;<i class="fa fa-save"></i></button>
                 </div>--}}

                <div class="pull-left">
                    <span class="text-white text-white font-weight-bold">Please Upload 2 pictures, each time</span>
                </div>

                <button id="Submit1" style="" class="btn btn-block btn-success mt-4 ">{{__('message.SYC')}}</button>

                </div>


        </div>
    </header>

@endsection

@section('js')
    <script>
        var form = document.getElementById("Form1");

        document.getElementById("Submit1").addEventListener("click", function () {
            form.submit();
        });
    </script>
@endsection
