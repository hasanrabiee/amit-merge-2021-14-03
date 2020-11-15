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



            </div>            <div class="amitiss_back d-inline-block float-left rounded"
                 style="width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">
                <div class="float-left border rounded" style="width: 244px;height: 452px;background-color: transparent;"><a
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
                                                <button class="btn btn-success btn-block" type="submit">{{__('message.UpdateAvatar')}} <i
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
                        <div class="text-left border rounded user_active_menu"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="#"
                               style="font-size: 20px;color: #000000;">{{__('message.Booth')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.Inbox')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.Inbox')}}</a></div>
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
                        <div class="text-left "
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.ContactUs')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.ContactUs')}}</a></div>
                        <div class="text-left"
                             style="background-color: #00000000;height: 20px;margin-top: -15px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">
                            <a href="/Exhabition/" class="" target="_blank">
                            <button class="btn btn-block" type="button"
                                    style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 18px;text-decoration: none !important" >
                               {{__('message.EnterExhabition')}}
                            </button>
                            </a>
                        </div>


                    </div>
                </div>
                <form action="{{route('Exhibitor.UpdateBooth')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="border rounded d-block float-left border"
                         style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                        <div class="text-left" style="margin-left: 44px;margin-top: 11px;"><label
                                style="margin-right: 11px;font-size: 22px;color: rgb(255,255,255);"></label>
                            <img
                                src="@if($Booth->Poster1) {{$Booth->Poster1}} @else {{asset('assets/img/noimg.jpg')}} @endif"
                                onclick="$('#Poster1').trigger('click');" width="120px" height="120px"  style="margin: 5px">
                            <input type="file" id="Poster1" name="Poster1" style="display:none"/>
                            <img
                                src="@if($Booth->Poster2) {{$Booth->Poster2}} @else {{asset('assets/img/noimg.jpg')}} @endif"
                                onclick="$('#Poster2').trigger('click');" width="120px" height="120px"  style="margin: 5px">
                            <input type="file" id="Poster2" name="Poster2" style="display:none"/>
                            <img
                                src="@if($Booth->Poster3) {{$Booth->Poster3}} @else {{asset('assets/img/noimg.jpg')}} @endif"
                                onclick="$('#Poster3').trigger('click');" width="120px" height="120px"  style="margin: 5px">
                            <input type="file" id="Poster3" name="Poster3" style="display:none"/>
                        </div>
                        <div class="text-left" style="margin-left: 44px;margin-top: 11px;">
                            @if($Booth->Type == 'A')
                            <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(1) Size Should be 630x700')" style="margin-left: 60px">{{__('message.Poster1')}} <i class="fa fa-info"></i></strong>
                            <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(2) Size Should be 640x1920')" style="margin-left: 60px">{{__('message.Poster2')}} <i class="fa fa-info"></i></strong>
                            <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(3) Size Should be 860x700')" style="margin-left: 60px">{{__('message.Poster3')}} <i class="fa fa-info"></i></strong>
                            @elseif($Booth->Type == 'B')
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(1) Size Should be 500x700')" style="margin-left: 60px">{{__('message.Poster1')}} <i class="fa fa-info"></i></strong>
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(2) Size Should be 590x990')" style="margin-left: 60px">{{__('message.Poster2')}} <i class="fa fa-info"></i></strong>
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(3) Size Should be 805x1920')" style="margin-left: 60px">{{__('message.Poster3')}} <i class="fa fa-info"></i></strong>
                            @elseif($Booth->Type == 'C')
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(1) Size Should be 700x700')" style="margin-left: 60px">{{__('message.Poster1')}} <i class="fa fa-info"></i></strong>
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(2) Size Should be 700x700')" style="margin-left: 60px">{{__('message.Poster2')}} <i class="fa fa-info"></i></strong>
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(3) Size Should be 700x700')" style="margin-left: 60px">{{__('message.Poster3')}} <i class="fa fa-info"></i></strong>
                            @elseif($Booth->Type == 'D')
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(1) Size Should be 630x700')">{{__('message.Poster1')}} <i class="fa fa-info"></i></strong>
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(2) Size Should be 870x1920')" style="margin-left: 60px">{{__('message.Poster2')}} <i class="fa fa-info"></i></strong>
                                <strong style="cursor:pointer;margin-left: 60px;" onclick="swal.fire('Poster(3) Size Should be 720x700')" style="margin-left: 60px">{{__('message.Poster3')}} <i class="fa fa-info"></i></strong>
                            @else
                                1
                            @endif
                        </div>

                        <div class="text-left"
                             style="margin-left: 44px;margin-top: 20px;margin-bottom: 26px;width: 545px;">
                            <label style="margin-right: 11px;font-size: 22px;color: rgb(255,255,255);"><small> {{__('message.Brochure')}} 20Mb</small><i class="fa fa-file-pdf-o"
                                                             style="font-size: 27px;margin-left: 6px;"></i></label>
                            <input type="file"  name="PdfFile" style="margin-left: 0px">
                        </div>
                        <div class="text-left"
                             style="margin-left: 59px;margin-top: 11px;margin-bottom: 26px;width: 545px;">
                            <div class="row">
                                <label style="margin-right: 11px;font-size: 22px;color: rgb(255,255,255);"><small>{{__('message.YoutubeVideoLink')}}</small>
                                    <i class="fa fa-video-camera"
                                       style="font-size: 27px;margin-left: 25px;"></i></label>
                                <input type="url" name="Video" style="width: 250px" class="form-control"
                                       value="{{$Booth->Video}}"></div>
                        </div>
                        <div class="col-lg-7">
                            <button class="btn btn-dark btn-block" type="button" onclick="$('#BoothColor').modal('show')" style="margin-top: -10px;">{{__('message.AdjustBoothColors')}}<i class="fa fa-paint-brush" style="margin-left: 5px;"></i></button>
                        </div>
                        <div class="col-lg-7">
                            <button class="btn btn-success btn-block" type="submit" style="margin-top: 10px;">{{__('message.Save')}}<i class="fa fa-save" style="margin-left: 5px;"></i></button>
                        </div>
                    </div>

                    <div class="border rounded float-right"
                         style="width: 304px;background-color: #a09e9e;height: 401px;margin: -338px;margin-top: 30px;margin-right: 7px;">
                        <div class="col">
                            <img src="{{asset('assets/img/Booth'.$Booth->Type.'.png')}}"
                                 style="width: 276px;margin-top: 0px;" onclick="$('#BoothImagesModalNmidonmChiCHi').modal('show');">
                            <div style="margin-left: 11px;margin-top: 22px;">
                                <p class="text-left" style="color: rgb(255,255,255);">
                                    <strong>{{__('message.Hall')}}: {{$Booth->Hall}}</strong></p>
                                <p class="text-left" style="color: rgb(255,255,255);"><strong>{{__('message.BoothType')}} : {{$Booth->Type}}</strong></p>
                                <a href="/Showroom/" class="remove_underline" target="_blank">
                                <button class="btn btn-dark" type="button">{{__('message.SeeBoothin3D')}}</button>
                                </a>
                            </div>
                            <div class="modal fade" role="dialog" tabindex="-1" id="BoothImagesModalNmidonmChiCHi">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4>Booth Type Image</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                        <div class="modal-body">
                                            <img src="{{asset('assets/img/Booth'.$Booth->Type.'.png')}}" style="max-height: 500px">
                                        </div>
                                        <div class="modal-footer"><button class="btn btn-light btn-block" data-dismiss="modal" type="button">{{__('message.Close')}}</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <div class="modal fade" role="dialog" tabindex="-1" id="BoothColor">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4>{{__('message.SelectBoothColor')}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <p class="text-left">{{__('message.BoothBodyColor')}}<br></p>
                                        <input class="form-control" type="color" name="Color2"
                                               value="{{$Booth->Color2}}" id="Color2">
                                    </div>
                                    <div class="form-group">
                                        <p class="text-left">{{__('message.BoothHeaderColor')}}<br></p>
                                        <input class="form-control" type="color" name="Color1"
                                               value="{{$Booth->Color1}}" id="Color1">
                                    </div>
                                    <div class="form-group">
                                        <p class="text-left">{{__('message.BoothTextColor')}}</p>
                                        <input class="form-control" type="color" name="WebSiteColor"
                                               value="{{$Booth->WebSiteColor}}" id="WebSiteColor">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-light btn-block" data-dismiss="modal" type="button">
                                        {{__('message.Close')}}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>




                </form>
        </div>
        </div>
    </header>




@endsection
