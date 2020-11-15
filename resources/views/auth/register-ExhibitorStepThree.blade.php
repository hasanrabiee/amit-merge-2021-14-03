@extends('layouts.Panel')
@section('content')
    <header class="d-flex masthead"
            style="background-image: url({{\App\Site::find(1)->SigninBackground}});padding: 45px;padding-top: 31px;padding-right: 0px;padding-left: 0px;">
        <style>
            .selectbooth {
                background-color: #06E4E8 !important;
            }
            .closebooth {
                background-color: #F900C9 !important;
            }
            .openbooth {
                background-color: #939393;
                cursor: pointer;;
            }
            .Submited {
                background-color: #1c7430 important;
            }
            .activetypes {
                background-color: #dfdfdf !important;
            }
        </style>

        <div class="container my-auto text-center" style="margin-top: -30px !important;">
            <h1 class="d-inline-block mb-1" style="color: #006d60;opacity: 1;font-size: 85px;width: 1110px;">
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
            </h1>
            <h3 class="mb-5"></h3>
            <div style="width: 354px;height: 45px;background-color: #525252;" class="rounded">
                <div class="d-inline float-left" style="background-color: transparent;height: 46px;width: 214px;">
                    <p style="width: 185px;height: 56px;padding: 8px;color: rgb(255,255,255);"
                       class="text-left">{{auth()->user()->UserName}} <i class="fa fa-language" style="cursor: pointer" onclick="$('#Lang_Modal').modal('show')"></i> </p>
                </div>
                <div class="modal fade" role="dialog" tabindex="-1" id="Lang_Modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                                                    <h4>{{__('message.ChangeLang')}}</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">

                                <div class="dropdown">

                                    <a style="text-decoration: none !important" class="" href="{{ url('locale/en') }}"><i class="fa fa-globe"></i>English</a><br>
                                    <a style="text-decoration: none !important" class="" href="{{ url('locale/de') }}"><i class="fa fa-globe"></i>Germany</a><br>
                                    <a style="text-decoration: none !important" class="" href="{{ url('locale/al') }}"><i class="fa fa-globe"></i>Albanian</a><br>


                                </div>
                            </div>
                            <div class="modal-footer"><button class="btn btn-light btn-block" data-dismiss="modal" type="button">Close</button></div>
                        </div>
                    </div>
                </div>

                <div class="d-inline float-right"
                     style="background-color: transparent;height: 45px;width: 140px; margin-top: 3px"><a
                        class="remove_underline" href="{{ route('logout') }}"
                        style="font-size: 15px;color: #c5c5c5;margin-bottom: 16px;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a><i
                        class="icon ion-log-out" style=";margin-left: 8px;color: #c5c5c5;"></i>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="amitiss_back d-block rounded"
                 style="width: 1117px;height: 492px;margin-right: 10px;padding: 27px;">
                <div class="d-inline-block float-left border rounded" style="height: 144px;width: 635px">
                    <h5 class="text-left text-light" style="margin-right: 350px;margin-top: 5px;margin-left: 10px;">{{__('message.Chooseyourboothtype')}}</h5>
                    <div class="d-inline float-left" id="booth_type_a" onclick="highlight_booth('A')"
                         style="height: 95px !important; cursor:pointer;"><img
                            class="rounded d-block float-left" src="{{asset('assets/img/booth-01.png')}}" width="130"
                            height="60"
                            style="padding-left: -77px;margin-right: 13px;margin-left: 6px;margin-top: 7px;" onclick="openImage('{{asset('assets/img/BoothA.png')}}')" />
                        <p class="text-center" style="color: rgb(255,255,255);">Type A</p>
                    </div>
                    <div class="d-inline float-left" id="booth_type_b" onclick="highlight_booth('B')"
                         style="height: 95px !important; cursor:pointer;"><img
                            class="rounded d-block float-left" src="{{asset('assets/img/booth-02.png')}}" width="130"
                            height="60"
                            style="padding-left: -77px;margin-right: 13px;margin-left: 6px;margin-top: 7px;" onclick="openImage('{{asset('assets/img/BoothB.png')}}')" />
                        <p class="text-center" style="color: rgb(255,255,255);">Type B</p>
                    </div>
                    <div class="d-inline float-left" id="booth_type_c" onclick="highlight_booth('C')"
                         style="height: 95px !important; cursor:pointer;"><img
                            class="rounded d-block float-left" src="{{asset('assets/img/booth-03.png')}}" width="130"
                            height="60"
                            style="padding-left: -77px;margin-right: 13px;margin-left: 6px;margin-top: 7px;" onclick="openImage('{{asset('assets/img/BoothC.png')}}')" />
                        <p class="text-center" style="color: rgb(255,255,255);">Type C</p>
                    </div>
                    <div class="d-inline float-left" id="booth_type_d" onclick="highlight_booth('D')"
                         style="height: 95px !important; cursor:pointer;"><img
                            class="rounded d-block float-left" src="{{asset('assets/img/booth-04.png')}}" width="130"
                            height="60"
                            style="padding-left: -77px;margin-right: 13px;margin-left: 6px;margin-top: 7px;" onclick="openImage('{{asset('assets/img/BoothD.png')}}')">
                        <p class="text-center" style="color: rgb(255,255,255);">Type D</p>
                    </div>
                </div>



                <div class="modal fade" role="dialog" tabindex="-1" id="BoothImagesModalNmidonmChiCHi">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Booth Type Image</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                            <div class="modal-body">
                                <img id="BoothIamgeHosein" style="max-height: 500px">
                             </div>
                            <div class="modal-footer"><button class="btn btn-light btn-block" data-dismiss="modal" type="button">Close</button></div>
                        </div>
                    </div>
                </div>



                <div class="d-inline-block rounded float-right" style="height: 410px;">
                    <div style="margin-bottom: 5px;margin-top: -14px;">
                        <button disabled="true" onclick="put_hall_id('a')" id="hall_a" class="btn" type="button"
                                style="background-color: #1fbeb0;color: rgb(255,255,255);margin-right: 7px;height: 36px;">
                            Hall A
                        </button>
                        <button id="hall_b" class="btn" type="button"
                                style="background-color: #1fbeb0;color: rgb(255,255,255);margin-right: 7px;height: 36px;"
                                disabled="true" onclick="put_hall_id('b')">Hall B
                        </button>
                        <button disabled="true" onclick="put_hall_id('c')" id="hall_c" class="btn" type="button"
                                style="background-color: #1fbeb0;color: rgb(255,255,255);margin-right: 7px;height: 36px;"
                                disabled="">Hall C
                        </button>
                        <button disabled="true" onclick="put_hall_id('d')" id="hall_d" class="btn" type="button"
                                style="background-color: #1fbeb0;color: rgb(255,255,255);margin-right: 7px;height: 36px;"
                                disabled="true">Hall D
                        </button>
                    </div>
                    <div style="background-color: #888686;height: 384px;width: 333px;padding: 14px;padding-top: 27px;">
                        <div class="float-left" style="margin-right: 22px;">
                            <div id="booth_17" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: 36px;padding-top: 0px;"></div>
                            <div id="booth_18" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_19" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                        </div>
                        <div class="float-left" style="margin-right: -17px;">
                            <div id="booth_25" class="openbooth"
                                 style="height: 22px;width: 60px;background-color: #939393; cursor: pointer;;margin-bottom: 30px;margin-top: -23px;padding-top: 0px;"></div>
                            <div id="booth_01" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: -23px;padding-top: 0px;"></div>
                            <div id="booth_12" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: 0px;padding-top: 0px;"></div>
                            <div id="booth_07" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_03" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_20" class="openbooth"
                                 style="height: 24px;width: 70px;background-color: #939393; cursor: pointer;;margin-bottom: 38px;padding-bottom: 15px;margin-top: -12px;"></div>
                        </div>
                        <div class="float-left" style="margin-right: 29px;">
                            <div id="booth_11" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: 6px;padding-top: 0px;"></div>
                            <div id="booth_02" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_13" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_08" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                        </div>
                        <div class="float-left" style="margin-right: -17px;margin-left: 10px;">
                            <div id="booth_24" class="openbooth"
                                 style="height: 22px;width: 60px;background-color: #939393; cursor: pointer;;margin-bottom: 30px;margin-top: -23px;padding-top: 0px;"></div>
                            <div id="booth_04" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: -23px;padding-top: 0px;"></div>
                            <div id="booth_15" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: 0px;padding-top: 0px;"></div>
                            <div id="booth_09" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_06" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_21" class="openbooth"
                                 style="height: 24px;width: 70px;background-color: #939393; cursor: pointer;;margin-bottom: 38px;padding-bottom: 15px;margin-top: -12px;"></div>
                        </div>
                        <div class="d-inline-block float-left" style="margin-right: 30px;">
                            <div id="booth_14" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: 6px;padding-top: 0px;"></div>
                            <div id="booth_05" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_10" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                            <div id="booth_16" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;"></div>
                        </div>
                        <div class="d-inline-block float-left" style="margin-right: 0px;">
                            <div id="booth_23" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: -76px;margin-top: 54px;"></div>
                            <div id="booth_22" class="openbooth"
                                 style="height: 59px;width: 26px;background-color: #939393; cursor: pointer;;margin-bottom: 24px;margin-top: 173px;"></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col" style="transform: rotate(270deg);margin-top: 30px;margin-left: 15px">
                                <p class="text-light">{{__('message.Entrance')}}</p>
                            </div>
                        </div>
                    </div>


                    <div class="border rounded" style="height: 50px">
                        <div class="col " style="margin-top: -30px; float: left ; color: white !important;">
                            <span
                                class="text-light"
                                style="height: 15px;width: 15px;background-color: #06E4E8;border-radius: 50%;display: inline-block;"></span> {{__('message.SelectedBooth')}}
                            <span
                                class="text-light"
                                style="height: 15px;width: 15px;background-color: #F900C9;border-radius: 50%;display: inline-block;"></span>{{__('message.OccupiedBooth')}}
                            <br>
                            <span
                                class="text-light"
                                style="height: 15px;width: 15px;background-color: #dfdfdf;border-radius: 50%;display: inline-block;"></span> {{__('message.VacentBooth')}}

                        </div>
                    </div>

                </div>
                <div class="border rounded float-left overlay"
                     style="background-color: transparent;width: 635px;">
                    <h5 class="text-left text-light" style="margin-top: 5px;margin-left: 10px;">
                        {{__('message.SBL')}} <i style="margin-left: 50px"
                                                 class="fa fa-arrow-right"></i><i
                            style="margin-left: 5px" class="fa fa-arrow-right"></i><i style="margin-left: 5px"
                                                                                      class="fa fa-arrow-right"></i>

                    </h5>

                </div>
                <div class="border rounded float-left overlay"
                     style="background-color: transparent;width: 635px;height: 235px;line-height: 26px;">
                    <div class="text-left d-inline float-left"
                         style="background-color: #303b3a;width: 302px;height: 230px;">
                        <h5 style="color: rgb(255,255,255);margin-left: 19px;padding-top: 13px;">{{__('message.BoothOptions')}}</h5>
                        <p class=" " style="color: rgb(255,255,255);margin-left: 5px;"><i
                                class="fa fa-star"
                                style="margin-right: 8px;color: rgb(215,173,25);"></i>{{__('message.Numberofposters')}}:
                            3</p>
                        <p class=" " style="color: rgb(255,255,255);margin-left: 5px;"><i
                                class="fa fa-star"
                                style="margin-right: 8px;color: rgb(215,173,25);"></i>{{__('message.Numberofinformationdesc')}}
                            : 1<br></p>
                        <p class=" " style="color: rgb(255,255,255);margin-left: 5px;"><i
                                class="fa fa-star"
                                style="margin-right: 8px;color: rgb(215,173,25);"></i>{{__('message.YoutubeVideoLink')}}
                            :
                            1<br>
                        </p>
                        <p class=" " style="color: rgb(255,255,255);margin-left: 5px;"><i
                                class="fa fa-star"
                                style="margin-right: 8px;color: rgb(215,173,25);"></i>{{__('message.Brochure')}}: 1<br>
                        </p>

                    </div>
                    <div class="text-left d-inline float-left"
                         style="background-color: transparent;width: 302px;height: 273px;">
                        <form onsubmit="event.preventDefault(); areyousure();" id="mysinsin_form"
                            style="margin-top: 17px;" method="post" enctype="multipart/form-data"
                            action="{{route('Exhibitor-Register-ThreePost')}}">
                            @method('PUT')
                            @csrf


                            <input type="hidden" id="boothid_value" name="Position"
                                   @if(isset($Booth->Position)) value="{{\App\booth::PositionConvertor($Booth->Position)}}" @endif>
                            <input type="hidden" id="hall_value" name="Hall"
                                   @if(isset($Booth->Position)) value="{{$Booth->Hall}}" @endif>


                            <div class="form-group" style="margin-bottom: 0.4rem">
                                <div class="col">
                                    <a class="btn  btn-block" role="button" data-toggle="modal"
                                       href="#job_vac_modal"
                                       style="width: 300px;background-color: #a8a8a8;">{{__('message.AdjustBoothColors')}}
                                        <i class="fa fa-plus"
                                           style="margin-left: 5px;"></i></a>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="job_vac_modal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4><strong>{{__('message.SelectBoothColor')}}</strong><br></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
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
                                                    <button class="btn btn-success btn-block" data-dismiss="modal"
                                                            type="button">{{__('message.Save')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin-bottom: 0.4rem">
                                <div class="col">
                                    <a class="btn  btn-block" role="button" data-toggle="modal"
                                       href="#BoothData"
                                       style="width: 300px;background-color: #a8a8a8;">{{__('message.AdjustBoothData')}}
                                        <i class="fa fa-plus"
                                           style="margin-left: 5px;"></i></a>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="BoothData">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4><strong>{{__('message.FillBoothData')}}</strong><br></h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <p class="text-left">{{__('message.BoothHeaderName')}}<br></p>
                                                        <input class="form-control" type="text" name="HeaderName" id="HeaderName"

                                                               value="{{$Booth->HeaderName}}"
                                                               placeholder="Max Characters 22" maxlength="22">

                                                    </div>

                                                    <div class="form-group">
                                                        <p class="text-left">{{__('message.AboutCompany')}}</p>


                                                        <textarea maxlength="300" name="Description"
                                                                  class="form-control" id="Description"
                                                                  placeholder="Max Characters 300">{{$Booth->Description ?? old('Description')}}</textarea>

                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-success btn-block" data-dismiss="modal"
                                                            type="button">{{__('message.Save')}}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group" style="margin-bottom: 0.4rem">
                                <div class="col">
                                    <a class="btn  btn-block" role="button" data-toggle="modal"
                                       href="#ImageModal"
                                       style="width: 300px;background-color: #a8a8a8;">{{__('message.BoothLogo')}} <i
                                            class="fa fa-plus"
                                            style="margin-left: 5px;"></i></a>
                                </div>
                            </div>


                            <div class="modal fade" role="dialog" tabindex="-1" id="ImageModal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4><strong>{{__('message.BoothImage')}} (512x512)</strong><br></h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="col">

                                                    <p class="d-inline"
                                                       style="color: rgb(255,255,255);margin-top: 13px;margin-left: 8px;">
                                                        {{__('message.UploadCompanyLogofortheBooth')}} </p>
                                                    <input type="file" style="margin-top: 13px;margin-left: 17px;"
                                                           name="Logo"
                                                           @if($Booth->Logo == null)  @endif accept="image/*">
                                                </div>

                                            </div>

                                            <div>
                                                <img src="{{$Booth->Logo}}" style="max-width: 400px">
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success btn-block" data-dismiss="modal"
                                                    type="button">{{__('message.Save')}}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-6" style="margin-bottom: 4px">
                                    <button id="my_jafar_01" onclick="document.getElementById('my_mode').value = 'Test'"
                                            class="btn  btn-block" style="display: none; width: 300px;background-color: #a8a8a8;"
                                            onmouseover="this.style.backgroundColor='#363636'"
                                            onmouseleave="this.style.backgroundColor='#a8a8a8'"
                                            type="submit">
                                        {{__('message.Save')}} & {{__('message.SeeBoothin3D')}}

                                        <i class="fa fa-check" style="margin-left: 6px;"></i>
                                    </button>
                                </div>
                                <div class="col-6" style="margin-bottom: 4px">
                                    <a onclick="$('#my_jafar_01').trigger('click')" class="btn  btn-block" target="_blank"
                                       href="/Showroom/" style="width: 300px;background-color: #a8a8a8;margin-top: 30px"
                                       onmouseover="this.style.backgroundColor='#363636'"
                                       onmouseleave="this.style.backgroundColor='#a8a8a8'">
                                        {{__('message.Save')}} & {{__('message.SeeBoothin3D')}}
                                        <i class="fa fa-eye" style="margin-left: 6px;"></i>
                                    </a>
                                </div>
                            </div>
                            <input type="hidden" name="Mode" id="my_mode">
                            <button onclick="document.getElementById('my_mode').value = 'Finish'"
                                    class="btn btn-success float-left" type="submit"
                                    style="width: 635px;margin-left: -300px;margin-top: 10px">
                                <i class="fa fa-flag-checkered" style="margin-right: 6px;"></i>
                                {{__('message.CompleteRegistration')}}
                                <i class="fa fa-flag-checkered" style="margin-left: 6px;"></i>
                            </button>


                        </form>

                    </div>
                </div>
            </div>
            <div></div>
        </div>


    </header>
@endsection

@section('js')
    <script>
        function openImage(ImageUrl){

            $("#BoothIamgeHosein").attr("src",ImageUrl);
            $('#BoothImagesModalNmidonmChiCHi').modal('show');

        }
    </script>
    <script>
        const url_boooooooth = "/api/v1/booth/occupied/"
        const url_hall = "/api/v1/hall/full/"
        const hall_ids = [1, 2, 3, 4];
        const hall_names = ['a', 'b', 'c', 'd']
        var number;

        function reserve_booths(hall_id) {
            for (var i = 1; i < 26; i++) {
                (function (i) {
                    $.ajax({
                        url: url_boooooooth + hall_id + "/booth_" + i,
                        type: 'GET',
                        async: false,
                        success: function (data) {
                            Data = JSON.parse(data);
                            if (Data === "Full") {
                                if (i.toString().length == 1) {
                                    i = '0' + i;
                                }
                                var element = document.getElementById("booth_" + i);
                                element.classList.remove("openbooth");
                                element.classList.add("closebooth");
                            }
                        }
                    });
                })(i);
            }


            /* $.get(url_boooooooth.replace("booth_id", i).replace("hall_id", hall_id), function (data) {
                 console.log(data)
                 if (data === "na") {
                     var element = document.getElementById("booth_" + i);
                     element.classList.remove("openbooth");
                     element.classList.add("closebooth");
                 }
             });*/
        }

        function show_halls() {
            let CanContinue = true;
            for (var i = 0; i < hall_ids.length; i++) {
                (function (i) {
                    if (CanContinue === true) {
                        $.ajax({
                            url: url_hall + hall_ids[i],
                            type: 'GET',
                            async: false,
                            success: function (data) {
                                Data = JSON.parse(data);
                                if (Data === "NotFull") {
                                    document.getElementById('hall_' + hall_names[i]).disabled = false;
                                    reserve_booths(hall_ids[i]);
                                    $('#hall_value').val(hall_names[i])

                                    CanContinue = false;
                                }
                            }
                        });
                    }

                })(i);
            }
        }

        show_halls()

        last_position = '0';

        $(".closebooth").click(function () {

            swal.fire("Booth is Occupied, Choose another booth")


        });
        $(".openbooth").click(function () {


            if($(this).hasClass('activetypes')){

                try{
                    $('#'+last_position).addClass('activetypes')

                }catch (e){
                    console.log(e)
                }

                $(".openbooth").each(function () {
                    $(this).removeClass("selectbooth");
                });
                $(this).removeClass("activetypes");
                $(this).addClass("selectbooth");
                last_position = $(this).attr("id")

                $('#boothid_value').val($(this).attr("id"))
            }else{
                swal.fire('{{__('message.BoothNot')}}')
            }


        })

        function highlight_booth(booth_type) {

            $('.selected_booth').each(function () {
                $(this).removeClass('selected_booth')
            })


            $('.selectbooth').each(function (){
                $(this).removeClass('selectbooth')
            })

            if (booth_type == 'A') {



                $('#booth_type_a').addClass("selected_booth")
                $('.activetypes').each(function () {
                    $(this).removeClass('activetypes')
                    $(this).addClass('unselectable')
                })

                if (document.getElementById("booth_01").classList.contains('closebooth') != true) {
                    $("#booth_01").addClass("activetypes");
                    $("#booth_01").removeClass('unselectable')

                }
                if (document.getElementById("booth_02").classList.contains('closebooth') != true) {
                    $("#booth_02").addClass("activetypes");
                    $("#booth_02").removeClass('unselectable')

                }
                if (document.getElementById("booth_03").classList.contains('closebooth') != true) {
                    $("#booth_03").addClass("activetypes");
                    $("#booth_03").removeClass('unselectable')

                }
                if (document.getElementById("booth_04").classList.contains('closebooth') != true) {
                    $("#booth_04").addClass("activetypes");
                    $("#booth_04").removeClass('unselectable')

                }
                if (document.getElementById("booth_05").classList.contains('closebooth') != true) {
                    $("#booth_05").addClass("activetypes");
                    $("#booth_05").removeClass('unselectable')

                }
                if (document.getElementById("booth_06").classList.contains('closebooth') != true) {
                    $("#booth_06").addClass("activetypes");
                    $("#booth_06").removeClass('unselectable')

                }

            } else if (booth_type == 'B') {

                $('#booth_type_b').addClass("selected_booth")
                $('.activetypes').each(function () {
                    $(this).removeClass('activetypes')
                    $(this).addClass('unselectable')
                })


                if (document.getElementById("booth_07").classList.contains('closebooth') != true) {
                    $("#booth_07").addClass("activetypes");
                    $("#booth_07").removeClass('unselectable')

                }
                if (document.getElementById("booth_08").classList.contains('closebooth') != true) {
                    $("#booth_08").addClass("activetypes");
                    $("#booth_08").removeClass('unselectable')
                }
                if (document.getElementById("booth_09").classList.contains('closebooth') != true) {
                    $("#booth_09").addClass("activetypes");
                    $("#booth_09").removeClass('unselectable')
                }
                if (document.getElementById("booth_10").classList.contains('closebooth') != true) {
                    $("#booth_10").addClass("activetypes");
                    $("#booth_10").removeClass('unselectable')
                }


            } else if (booth_type == 'C') {

                $('#booth_type_c').addClass("selected_booth")
                $('.activetypes').each(function () {
                    $(this).removeClass('activetypes')
                    $(this).addClass('unselectable')
                })


                if (document.getElementById("booth_11").classList.contains('closebooth') != true) {
                    $("#booth_11").addClass("activetypes");
                    $("#booth_11").removeClass('unselectable')
                }
                if (document.getElementById("booth_12").classList.contains('closebooth') != true) {
                    $("#booth_12").addClass("activetypes");
                    $("#booth_12").removeClass('unselectable')
                }
                if (document.getElementById("booth_13").classList.contains('closebooth') != true) {
                    $("#booth_13").addClass("activetypes");
                    $("#booth_13").removeClass('unselectable')

                }
                if (document.getElementById("booth_14").classList.contains('closebooth') != true) {
                    $("#booth_14").addClass("activetypes");
                    $("#booth_14").removeClass('unselectable')
                }
                if (document.getElementById("booth_15").classList.contains('closebooth') != true) {
                    $("#booth_15").addClass("activetypes");
                    $("#booth_15").removeClass('unselectable')
                }
                if (document.getElementById("booth_16").classList.contains('closebooth') != true) {
                    $("#booth_16").addClass("activetypes");
                    $("#booth_16").removeClass('unselectable')
                }


            } else if (booth_type == 'D') {

                $('#booth_type_d').addClass("selected_booth")
                $('.activetypes').each(function () {
                    $(this).removeClass('activetypes')
                    $(this).addClass('unselectable')
                })


                if (document.getElementById("booth_17").classList.contains('closebooth') != true) {
                    $("#booth_17").addClass("activetypes");
                    $("#booth_17").removeClass('unselectable')
                }
                if (document.getElementById("booth_18").classList.contains('closebooth') != true) {
                    $("#booth_18").addClass("activetypes");
                    $("#booth_18").removeClass('unselectable')
                }
                if (document.getElementById("booth_19").classList.contains('closebooth') != true) {
                    $("#booth_19").addClass("activetypes");
                    $("#booth_19").removeClass('unselectable')
                }
                if (document.getElementById("booth_20").classList.contains('closebooth') != true) {
                    $("#booth_20").addClass("activetypes");
                    $("#booth_20").removeClass('unselectable')
                }
                if (document.getElementById("booth_21").classList.contains('closebooth') != true) {
                    $("#booth_21").addClass("activetypes");
                    $("#booth_21").removeClass('unselectable')
                }
                if (document.getElementById("booth_22").classList.contains('closebooth') != true) {
                    $("#booth_22").addClass("activetypes");
                    $("#booth_22").removeClass('unselectable')
                }
                if (document.getElementById("booth_23").classList.contains('closebooth') != true) {
                    $("#booth_23").addClass("activetypes");
                    $("#booth_23").removeClass('unselectable')
                }
                if (document.getElementById("booth_24").classList.contains('closebooth') != true) {
                    $("#booth_24").addClass("activetypes");
                    $("#booth_24").removeClass('unselectable')
                }
                if (document.getElementById("booth_25").classList.contains('closebooth') != true) {
                    $("#booth_25").addClass("activetypes");
                    $("#booth_25").removeClass('unselectable')
                }

            } else {
                return 1;
            }


        }

        function put_hall_id(javad) {


            $('#hall_value').val(javad)
        }

        var inputids = [
            'Color1' , 'Color2' , 'WebSiteColor' , 'HeaderName' , 'Description'
        ];
        var isValid = true;


        function areyousure() {
            var a = document.getElementById('Color1').value;
            var b = document.getElementById('Color2').value;
            var c = document.getElementById('WebSiteColor').value;
            var d = document.getElementById('HeaderName').value;
            var e = document.getElementById('Description').value;

            if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "" , e == null || e == ""){
                Swal.fire({
                    icon: 'error',
                    title: '{{__('message.PleaseFillAllFields')}}',
                })
                return false;
            }else {
                if(document.getElementById('my_mode').value == 'Finish'){
                    Swal.fire({
                        title: '{{__('message.Step3Error')}}',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: `{{__('message.NExtPage')}}`,
                        denyButtonText: `{{__('message.StayinPage')}}`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            Swal.fire('Saved!', '', 'success')
                            confirmed_sinsin = true
                            $("#mysinsin_form").removeAttr('onsubmit').submit()
                            return true
                        } else if (result.isDenied) {
                            Swal.fire('{{__('message.cans')}}', '', 'info')
                            confirmed_sinsin = false
                            return false
                        }
                    })

                }else {
                    confirmed_sinsin = true
                    $("#mysinsin_form").removeAttr('onsubmit').submit()
                    return true;
                }

            }


        }

    </script>



@endsection
