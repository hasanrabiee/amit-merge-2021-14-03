@extends('layouts.Panel')
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



            </div><div class="d-inline-block float-left rounded"
                 style="background-color: rgb(54,54,54,65%);width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">
                <div class="float-left border rounded"
                     style="width: 244px;height: 452px;background-color: transparent;"><a href="#avatar_modal"
                                                                                          data-toggle="modal">
                        <img class="rounded-circle border" src="{{\Illuminate\Support\Facades\Auth::user()->Image}}"
                             style="width: 76px;height: 74px;margin-top: 8px;">
                    </a>
                    <div><a class="btn btn-primary btn-lg make_hidden" role="button" data-toggle="modal"
                            href="#myModal">Launch Demo Modal</a>
                        <div class="modal fade" role="dialog" tabindex="-1" id="avatar_modal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4>Change Avatar Photo</h4>
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
                                            <button class="btn btn-success btn-block" type="submit">Update Avatar<i
                                                    class="fa fa-save" style="margin-left: 9px;"></i></button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light btn-block" data-dismiss="modal" type="button">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="text-left"
                             style="background-color: transparent;height: 35px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">
                            <a class="remove_underline" href="{{route('ExhibitorOperator.index')}}"
                               style="font-size: 19px;color: #ffffff;">{{__('message.Profile')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.inbox')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.Inbox')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.Statistics')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.Statistics')}}</a></div>
                        <div class="text-left user_active_menu"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="#"
                               style="font-size: 20px;color: #000000;">{{__('message.History')}}</a>
                        </div>
                        <div class="text-left"
                             style="background-color: #00000000;min-height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.ContactUs')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.ContactUs')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 20px;margin-top: -15px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">
                            <a href="/Exhabition/" class="" target="_blank">
                                <button class="btn btn-block" type="button"
                                        style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 20px;">{{__('message.EnterExhabition')}}</button>
                            </a></div>
                    </div>
                </div>
                <div class="border rounded d-block float-left border"
                     style="width: 837px;height: 425px;background-color: #a8a8a892;padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                    <div class="float-left" style="background-color: #00000000;height: 406px;width: 278px;">
                        <div class="float-left" style="background-color: #00000000;height: 406px;width: 278px;"
                             onblur="is_typing = false" onfocus="is_typing = true">
                            <form style="height: 7px;margin-bottom: 10px;" method="get"
                                  action="{{route('Exhibitor.History')}}">
                                <div class="form-group" style="width: 305px;"><input class="form-control float-left"
                                                                                     type="search"
                                                                                     placeholder="Search..."
                                                                                     style="width: 240px;height: 33px;"
                                                                                     name="SearchTerm">
                                    <button onblur="is_typing = false" onfocus="is_typing = true"
                                            class="btn float-left shadow-none" type="submit"
                                            style="width: 1px;margin-right: 16px;margin-bottom: 31px;margin-top: -4px;">
                                        <i class="fa fa-search"
                                           style="font-size: 20px;margin-bottom: 16px;margin-right: 19px;"></i></button>
                                </div>
                            </form>
                            <div class="scroll_box"
                                 style="background-color: #00000000;height: 351px;margin-top: 18px;width: 276px;">
                                <div>
                                    @foreach($Users as $user)
                                        <div
                                            @if(request()->UserID == $user->id)
                                            class="text-left border rounded active_company"
                                            style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"
                                            @else
                                            class="text-left border rounded-0"
                                            style="background-color: #00000000;height: 44px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;"
                                            @endif
                                        >
                                            <a class="text-left remove_underline" href="?UserID={{$user->id}}"
                                               style="font-size: 26px;color: #ffffff;">{{$user->UserName}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-left"
                         style="background-color: #00000000;height: 406px;width: 532px;margin-left: 7px;">
                        @if(isset($User))
                            <div class="float-left" style="background-color: #00000000;height: 405px;width: 257px;">
                                <p class="text-left" style="font-size: 19px;"><strong>Visitor Information</strong></p>
                                <div class="border rounded"
                                     style="background-color: #84484800;height: 356px;padding: 8px;"><img
                                        src="{{$User->Image}}" style="width: 65px;">
                                    <p class="text-left" style="margin-top: 15px;">UserName: {{$User->UserName}}</p>
                                    <p class="text-left">First Name: {{$User->FirstName}}</p>
                                    <p class="text-left">Last Name: {{$User->LastName}}</p>
                                    <p class="text-left">Profession: {{$User->Profession}}</p>
                                    <p class="text-left">Gender: {{$User->Gender}}</p>
                                    <p class="text-left">{{__('message.Resume')}}: <a href="{{$User->resume}}">Download</a></p>

                                </div>
                            </div>
                            <div class="float-left"
                                 style="background-color: #00000000;height: 402px;width: 257px;margin-left: 11px;">
                                <p class="text-left" style="font-size: 19px;"><strong>Chat History</strong></p>
                                <div style="background-color: #00000000;height: 351px;">
                                    <div class="scroll_box"
                                         style="height: 356px;padding: 0px;width: 261px;background-color: #ffffff;">
                                        @if(\App\Chat::where('UserID' , $User->id)->where('BoothID' , $Booth->id)->count() <= 0)
                                            No Chat Available

                                        @else
                                            @foreach(\App\Chat::where('UserID' , $User->id)->where('BoothID' , $Booth->id)->get() as $chat)

                                                <p @if($chat->Sender == 'Exhibitor')
                                                   class="text-right border rounded"
                                                   style="padding: 9px;background-color: #36ca5c;color: rgb(255,255,255);"
                                                   @else
                                                   class="text-left border rounded"
                                                   style="padding: 9px;background-color: #0c82fe;color: rgb(255,255,255);"
                                                    @endif
                                                >{{$chat->Text}}
                                                </p>

                                            @endforeach
                                        @endif

                                    </div>
                                </div>


                            </div>

                        @else
                            Please Select User
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection
