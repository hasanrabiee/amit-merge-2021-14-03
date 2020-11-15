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



            </div>            <div class="d-inline-block float-left rounded amitiss_back"
                 style="width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">
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
                                                    type="submit">{{__('message.UpdateAvatar')}} <i class="fa fa-save"
                                                                                                    style="margin-left: 9px;"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-light btn-block" data-dismiss="modal"
                                                type="button">{{__('message.Close')}}</button>
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
                        <div class="text-left user_active_menu"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="#"
                               style="font-size: 20px;color: #000000;">{{__('message.Payment')}}</a></div>
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
                            </a></div>
                    </div>
                </div>
                <div class="border rounded d-block float-left border"
                     style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">

                    @if(\Illuminate\Support\Facades\Auth::user()->Payment == 'UnPaid')
                    <div class="border rounded border-primary float-left border"
                         style="background-color: #ffffff;height: 400px;width: 815px;margin-bottom: 0px;margin-left: 2px;padding: 2px;padding-top: -2px;margin-top: 6px;">
                        <div style="background-color: #c23838;height: 37px;">
                            <p class="border rounded"
                               style="color: rgb(255,255,255);font-size: 24px;margin-bottom: 2px;background-color: #7abbb2;">
                                <strong>{{__('message.AttendFee')}} : <span id="price_id">{{\App\Site::find(1)->ExhibitorPayment}}</span>
                                    $</strong></p>
                        </div>
                        <p class="nonoverflow" style="margin-top: 24px;padding: 16px;">
                            {{\App\Site::find(1)->ExhibitorAboutPayment}}
                        </p><img src="{{asset('assets/img/PayPal-Logo.png')}}" style="width: 221px;height: 124px;">
                        <button id='paypal_btn' class="btn btn-primary btn-block" type="button"
                                style="margin-top: 16px;height: 61px;">
                            {{__('message.PayWithPayPal')}}<i class="fa fa-dollar" style="margin-left: 5px;"></i>
                        </button>
                    </div>
                    @else
                        <div class="border rounded border-primary float-left border"
                             style="background-color: #ffffff;height: 400px;width: 815px;margin-bottom: 0px;margin-left: 2px;padding: 2px;padding-top: -2px;margin-top: 6px;">
                            <div style="background-color: #c23838;height: 37px;">
                                <p class="border rounded"
                                   style="color: rgb(255,255,255);font-size: 24px;margin-bottom: 2px;background-color: greenyellow;">
                                    <strong>{{__('message.AFF')}}</strong></p>
                            </div>
                            <h3>Thank you ! Your Payment has been received</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
@endsection


@section("js")


    <script>

        my_price_var = document.getElementById('price_id').innerText

        if (my_price_var == '' || my_price_var == '0' || my_price_var == 0) {


            document.getElementById('price_id').innerText = 'Free'
            $('#paypal_btn').prop('disabled', true)
            $('#paypal_btn').text('{{__('message.ExFree')}}')

        }

    </script>




@stop
