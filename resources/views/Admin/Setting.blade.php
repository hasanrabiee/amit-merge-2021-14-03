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
                        <h5 class="text-left"
                            style="color: rgb(255,255,255);">{{__('message.Manage')}} {{__('message.Event')}}</h5>
                        <div class="text-left"
                             style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;">
                            <a class="text-left" href="{{route('Admin.index')}}"
                               style="color: #b3b8b8;">{{__('message.Inbox')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #363636;">
                            <a class="text-left" href="{{route('Admin.History')}}"
                               style="color: #b3b8b8;">{{__('message.History')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #363636;">
                            <a class="text-left" href="{{route('Admin.Lounge')}}"
                               style="color: #b3b8b8;">{{__('message.Lounge')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;">
                            <a class="text-left" href="{{route('Admin.Statistics')}}"
                               style="color: #b3b8b8;">{{__('message.Statistics')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;">
                            <a class="text-left" href="{{route('Admin.RegisteredVisitor')}}" style="color: #b3b8b8;">{{__('message.Registered')}} {{__('message.Visitors')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;">
                            <a class="text-left" href="{{route('Admin.RegisteredExhibitor')}}"
                               style="color: #b3b8b8;">{{__('message.Registered')}} {{__('message.Exhibitors')}}<br></a>
                        </div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;">
                            <a class="text-left" href="{{route('Admin.Auditorium')}}"
                               style="color: #b3b8b8;">{{__('message.Auditorium')}} {{__('message.Schedule')}}<br></a>
                        </div>

                        <h5 class="text-left"
                            style="color: rgb(255,255,255);">{{__('message.Create')}} {{__('message.Event')}}</h5>
                        <div class="text-left border rounded active-page"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;">
                            <a class="text-left" href="#" style="color: #b3b8b8;">{{__('message.Setting')}}</a></div>

                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;">
                            <a class="text-left" href="{{route('Admin.Signin')}}"
                               style="color: #b3b8b8;">{{__('message.Signin')}} {{__('message.Page')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;">
                            <a class="text-left" href="{{route('Admin.VisitorSetting')}}"
                               style="color: #b3b8b8;">{{__('message.Visitor')}} {{__('message.Page')}}</a></div>
                        <div class="text-left"
                             style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;">
                            <a class="text-left" href="{{route('Admin.ExhibitorSetting')}}"
                               style="color: #b3b8b8;">{{__('message.Exhibitor')}} {{__('message.Page')}}</a></div>
                        <div class="text-left"
                             style="/*background-color: #00000000;*/height: 30px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;width: 216px;color: #b3b8b8;">
                            <a class="text-left" href="{{route('Admin.AppAdjustment')}}"
                               style="color: #b3b8b8;">{{__('message.App')}} {{__('message.Adjustment')}}<br></a></div>
                    </div>
                </div>

                <form class="form-inline" method="post" action="{{route('Admin.SettingPost')}}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="border rounded d-block float-left border"
                         style="width: 843px;height: 480px;background-color: rgba(168,168,168,0.84);padding: 7px;color: #363636;margin-left: 22px;">
                        <ul class="nav nav-tabs" id="myTab" role="tablist" style="width: 800px">
                            <li class="nav-item">
                                <a class="nav-link active" id="Setting-tab" data-toggle="tab" href="#Setting" role="tab"
                                   aria-controls="Setting"
                                   aria-selected="true">{{__('message.Setting')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Theme-tab" data-toggle="tab" href="#Theme" role="tab"
                                   aria-controls="Theme"
                                   aria-selected="true">{{__('message.Theme')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="AuditoriumSetting-tab" data-toggle="tab"
                                   href="#AuditoriumSetting" role="tab" aria-controls="Auditorium"
                                   aria-selected="false">{{__('message.Auditorium')}} {{__('message.Setting')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="BackUP-tab" data-toggle="tab" href="#BackUP" role="tab"
                                   aria-controls="BackUP"
                                   aria-selected="false">{{__('message.BackUp')}}</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent" style="max-height: 300px">
                            <div class="tab-pane fade show active" id="Setting" role="tabpanel"
                                 aria-labelledby="Setting-tab">
                                <div class="overflow-auto" style="max-height: 420px;max-width: 900px;">
                                    <h5 class="text-left"
                                        style="padding: 2px;padding-left: 42px;color: #000000;height: 45px;">{{__('message.UploadYourLogo')}}</h5>
                                    <div class="row">
                                        <div class="col">

                                            <div
                                                style="background-color: transparent;height: 57px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: -20px;">
                                                <div class="form-group text-left"><label
                                                        style="color: rgb(255,255,255);margin-right: 23px;">Opening
                                                        Date:</label>
                                                    <input id="my_date" type="date" name="StartDate"
                                                           value="{{$Site->StartDate}}"></div>
                                            </div>

                                            <div
                                                style="background-color: transparent;height: 57px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: -20px;">
                                                <div class="form-group text-left"><label
                                                        style="color: rgb(255,255,255);margin-right: 23px;">{{__('message.L1F')}}
                                                        :</label>
                                                    <input type="file" name="Logo1"></div>
                                            </div>


                                            <div
                                                style="background-color: transparent;height: 57px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: -20px;">
                                                <div class="form-group text-left"><label
                                                        style="color: rgb(255,255,255);margin-right: 23px;">{{__('message.L2F')}}
                                                        :<br></label>
                                                    <input type="file" name="Logo2"></div>
                                            </div>
                                            <div
                                                style="background-color: transparent;height: 57px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: -20px;">
                                                <div class="form-group text-left"><label
                                                        style="color: rgb(255,255,255);margin-right: 23px;">{{__('message.L3F')}}
                                                        :</label>
                                                    <input type="file" name="Logo3"></div>
                                            </div>
                                        </div>
                                        <div class="col">

                                            <div class="btn-group btn-block" role="group" aria-label="Basic example">
                                                <a href="{{route('Admin.BackUp')}}"
                                                   class="btn btn-primary btn-lg d-block" role="button"
                                                   style="margin-bottom: 10px;color: #ffffff">{{__('message.BackUp')}}:
                                                    <i class="fa fa-hdd-o"></i> </a>
                                                <a href="{{route('Admin.BackUp')}}"
                                                   class="btn btn-secondary btn-lg d-block" role="button"
                                                   style="margin-bottom: 10px;color: #ffffff">{{__('message.Restore')}}:
                                                    <i class="fa fa-upload"></i> </a>
                                            </div>


                                            <a href="{{route('Admin.Reset')}}" class="btn btn-danger btn-lg d-block"
                                               role="button"
                                               style="margin-bottom: 10px;background-color: #c82333;color: #ffffff"
                                               disabled="">{{__('message.Reset')}} <i class="fa fa-undo"></i></a>
                                            <a class="btn btn-dark btn-lg d-block" role="button" data-toggle="modal"
                                               href="#PassWordModal"
                                               style=";color: #ffffff">{{__('message.ChangePassword')}}<i
                                                    class="fa fa-key" style="margin-left: 7px;"></i></a>
                                        </div>
                                    </div>


                                    <h5 class="text-left"
                                        style="padding: 2px;padding-left: 42px;color: #000000;height: 29px;padding-top: 2px;">{{__('message.TAC')}}</h5>
                                    <textarea class="border rounded form-control float-left"
                                              style="width: 452px;margin-left: 61px;height: 86px;"
                                              name="Terms">{{$Site->Terms}}</textarea>
                                    <div class="form-group" style="margin-bottom: -60px;">
                                        <input class="form-control form-control-sm" type="text" name="SiteName"
                                               style="width: 227px;margin-left: 19px;margin-bottom: 1px;"
                                               value="{{$Site->Name}}">
                                        <input class="form-control form-control-sm" type="text" name="AdminTel"
                                               style="width: 227px;margin-left: 19px;margin-bottom: 1px;"
                                               placeholder="Admin Tel" value="{{$Site->AdminTel}}">
                                        <input class="form-control form-control-sm" type="text" name="AdminLocation"
                                               style="width: 227px;margin-left: 19px;margin-bottom: 1px;"
                                               placeholder="Admin Location" value="{{$Site->AdminLocation}}">
                                        <input class="form-control form-control-sm" type="email" name="AdminAddress"
                                               style="width: 227px;margin-left: 19px;margin-bottom: 1px;"
                                               placeholder="Admin Email Address" value="{{$Site->AdminAddress}}"></div>
                                    <h5 class="text-left"
                                        style="padding: 2px;padding-left: 42px;color: #000000;height: 29px;margin-top: 20px;">
                                        Operators Emails:</h5>
                                    <div
                                        style="background-color: transparent;height: 57px;width: 770px;margin-bottom: 0px;margin-left: 50px;padding: 25px;padding-top: 18px;margin-top: -20px;">
                                        <div><a class="btn btn-primary btn-sm border rounded float-left green-button"
                                                role="button" data-toggle="modal" href="#op_emails_modal2"
                                                style="width: 195px;background-color: transparent;color: #ffffff;">{{__('message.AddOperators')}}
                                                <i class="fa fa-plus" style="margin-left: 7px;"></i></a>
                                            <a class="btn btn-primary btn-sm border rounded float-left green-button"
                                               role="button" data-toggle="modal" href="#op_email_view"
                                               style=";background-color: transparent;color: #ffffff;">View<i
                                                    class="fa fa-eye" style="margin-left: 7px;"></i></a>
                                            <div class="modal fade" role="dialog" tabindex="-1" id="op_emails_modal2">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4>{{__('message.AddOperators')}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class=" float-left field_wrapper">
                                                                <div>
                                                                    <input type="text" name="OperatorEmails[]" value=""
                                                                           class="form-control"
                                                                           placeholder="Operator Email"/>
{{--                                                                    <a href="javascript:void(0);" class="add_button"--}}
{{--                                                                       title="Add field">--}}
{{--                                                                        <i style="font-size: 30px;color: #000000;margin-left: 8px"--}}
{{--                                                                           class="fa fa-plus-circle"></i>--}}
{{--                                                                    </a>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light btn-block green-button"
                                                                    data-dismiss="modal" type="button">Save&nbsp;<i
                                                                    class="fa fa-check"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" role="dialog" tabindex="-1" id="op_email_view">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4>List Operators Email</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <table class="table text-left">
                                                                <thead>
                                                                <tr>
                                                                    <th scope="col">{{__('message.Email')}}:</th>
                                                                    <th scope="col">{{__('message.Action')}}:</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                @foreach($Operators as $op)
                                                                    <tr>
                                                                        <td>{{$op->email}}</td>
                                                                        <td><a href="?DeleteOperator={{$op->id}}"
                                                                               class="btn btn-danger">Delete</a></td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-light btn-block green-button"
                                                                    data-dismiss="modal" type="button">
                                                                {{__('message.Close')}}&nbsp;<i class="fa fa-close"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <button class="btn btn-success btn-sm" type="submit"
                                                style="margin-top: -1px;margin-right: 250px;width: 150px">{{__('message.Save')}}</button>


                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="AuditoriumSetting" role="tabpanel"
                                 aria-labelledby="Auditorium-tab">
                                <div class="overflow-auto" style="max-height: 300px;max-width: 800px;">
                                    <h3>Auditorium Setting</h3>

                                    <div class="form-group">
                                        <label for="">Stream Key : </label>
                                        <input class="form-control" name="StreamKey" placeholder="Stream Key"
                                               value="{{$Site->StreamKey}}"
                                               style="width: 600px;margin-left: 22px;margin-bottom: 10px">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rtmp Address : </label>
                                        <input class="form-control" name="RtmpAddress" placeholder="Rtmp Address"
                                               value="{{$Site->RtmpAddress}}"
                                               style="width: 600px;margin-left: 5px;margin-bottom: 10px">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Playback Url : </label>
                                        <input class="form-control" name="PlaybackUrl" placeholder="Playback Url"
                                               value="{{$Site->PlaybackUrl}}" style="width: 600px;margin-left: 15px">
                                    </div>
                                    <button class="btn btn-success"
                                            style="width: 600px;margin-top: 20px;margin-left: 10px;">{{__('message.Save')}}</button>

                                </div>
                            </div>


                            <div class="tab-pane fade" id="Theme" role="tabpanel" aria-labelledby="Theme-tab">
                                <div class="overflow-auto" style="max-height: 420px;max-width: 900px;">

                                    <h3>{{__('message.AdminBackground')}}</h3>


                                    <div
                                        style="background-color: transparent;height: 57px;width: 770px;margin-bottom: 0px;padding: 25px;padding-top: 18px;">
                                        <div class="form-group text-left"><label
                                                style="color: rgb(255,255,255);margin-right: 23px;">{{__('message.AdminBackground')}}</label>
                                            <input type="file" name="AdminBackground"></div>
                                    </div>
                                    <button class="btn btn-success" style="width: 300px">{{__('message.Save')}}</button>
                                </div>

                            </div>


                            <div class="tab-pane fade" id="BackUP" role="tabpanel" aria-labelledby="BackUP-tab">
                                <div class="overflow-auto" style="max-height: 420px;max-width: 900px;">
                                    <div class="scroll_box" >
                                        <table class="table table-striped ">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{__('message.Time')}}</th>
                                                <th scope="col">{{__('message.Action')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Backups as $bu)

                                                <tr>
                                                    <td>{{\Carbon\Carbon::parse($bu->getATime())->format('Y-m-d H:i')}}</td>
                                                    <td>
                                                        <a class="btn btn-primary" role="button" style="margin-left: 5px;"
                                                           href="{{asset('BackUp/'.$bu->getrelativePathname())}}" download><i
                                                                class="fa fa-download" style="font-size: 15px;"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>

            </div>


        </div>
        <form action="{{route('Admin.ChangePassword')}}" method="post">
            @csrf
            <div class="modal fade" role="dialog" tabindex="-1" id="PassWordModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>{{__('message.ChangeYourPassword')}}</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body text-left">
                            <div class=" form-group ">
                                <div class="col">
                                    <div class="col ">
                                        <label>{{__('message.Old')}} {{__('message.password')}}</label>
                                        <input type="password" name="OldPassword" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label>{{__('message.New')}} {{__('message.password')}}</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label>{{__('message.New')}} {{__('message.password')}} {{__('message.passwordConfrimation')}}</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-light btn-block green-button" type="submit">{{__('message.Save')}}
                                &nbsp;<i class="fa fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        </div>
        </div>
    </header>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            var fieldHTML = '<div><input type="text" name="OperatorEmails[]" value="" class="form-control" placeholder="Operator Email" /><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="font-size: 30px;color: #ffffff;margin-left: 10px"></i></a></div>'; //New input field html

            //Once add button is clicked
            $('.add_button').click(function () {
                $('.field_wrapper').append(fieldHTML); //Add field html
            });

            //Once remove button is clicked
            $('.field_wrapper').on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });



    </script>
@endsection
