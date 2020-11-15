@extends('layouts.app')
@section('content')
    <header class="d-flex masthead"
            style="background-image: url({{\App\Site::find(1)->SigninBackground}});padding: 45px;padding-top: 31px;padding-right: 0px;padding-left: 0px;">
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

            <div style="width: 354px;height: 45px;background-color: #525252; margin-top: 69px" class="rounded">

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

            <div class="d-inline-block float-left rounded"
                 style="background-color: rgb(54,54,54,65%);width: 1117px;height: 452px;margin-right: 10px;padding: 27px;padding-top: 27px;">

                <form onsubmit="event.preventDefault(); areyousure();" id="mysinsin_form" class="form-inline" method="post" action="{{route('Exhibitor-Register-Two')}}">
                    @csrf
                    <input type="hidden" name="UserID" value="{{$UserID}}">
                    <input type="hidden" name="BoothID" value="{{$BoothID}}">


                    <div class="d-inline float-left border rounded scroll_box"
                         style="height: 350px;width: 360px;background-color: transparent;margin-right: 14px;padding-left: 9px;margin-bottom: 50px">
                        <p class="text-left" style="color: rgb(255,255,255);font-size: 20px;">{{__('message.Pleaseaddyourstaffinformation')}} <i
                                onclick="show_info('{{__('message.ModalStepTwoNum1')}}')"
                                class="fa fa-info-circle" style="color: white;margin-left: 20px"
                                data-toggle="tooltip"></i></p>
                        <div class="form-group float-left">
                            <div class=" float-left field_wrapper">
                                <div onclick="$('#op_email').removeAttr('disabled'); $('#op_email').focus()">

                                    <a href="javascript:void(0);" class="btn btn-dark add_button btn-block" title="Add field" >
                                       <p style="font-size: 20px">{{__('message.AddOperators')}} <i style=";color: #000000;margin-left: 8px"
                                                          class="fa fa-plus-circle"></i></p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="float-left"
                         style="height: 147px;width: 320px;background-color: transparent;margin-bottom: 220px;">
                        <div class="form-group">
                            <div class="custom-control custom-switch float-left" style="width: 207px;">
                                <input class="custom-control-input" onclick="ShowLiveConf()" type="checkbox"
                                       id="formCheck-2" name="need_live_conf">

                                <label class="custom-control-label" for="formCheck-2"
                                       style="color: rgb(255,255,255);font-size: 14px;">{{__('message.NeedLiveCOnf')}} </label>
                            </div>
                            <i onclick="show_info('{{__('message.ModalStepTwoNum2')}}')"
                               class="fa fa-info-circle" style="color: white;font-size: 20px;margin-left: 10px;"
                               data-toggle="tooltip"></i>
                        </div>


                        <div style="display: none !important;" id="Live1">
                            <div class="form-group float-left" style="margin-top: 14px;"><input id="#javad_1"
                                                                                                class="form-control form-control-sm"
                                                                                                type="text"
                                                                                                placeholder="Speaker Name * "
                                                                                                style="width: 280px;"
                                                                                                name="SpeakerName" value="{{old('SpeakerName')}}">
                            </div>

                            <div class="form-group float-left" style="margin-top: 14px;"><input id="#javad_2"
                                                                                                class="form-control form-control-sm"
                                                                                                type="text"
                                                                                                placeholder="Username * "
                                                                                                style="width: 280px;"
                                                                                                name="SpeakerUserName" value="{{old('SpeakerUserName')}}">

                            </div>
                            <div class="form-group float-left" style="margin-top: 14px;"><input id="#javad_11"
                                                                                                class="form-control form-control-sm"
                                                                                                type="text"
                                                                                                placeholder="Speaker Email *"
                                                                                                style="width: 280px;"
                                                                                                name="email" value="{{old('email')}}">
                            </div>
                            <div class="form-group float-left" style="margin-top: 14px;"><input id="#javad_3"
                                                                                                class="form-control form-control-sm"
                                                                                                type="password"
                                                                                                placeholder="Password * "
                                                                                                style="width: 280px;"
                                                                                                name="password"><i
                                    class="fa fa-info-circle" style="color: white;margin-left: 5px"
                                    data-toggle="tooltip"
                                    onclick="show_info('{{__('message.passwordHint')}}')"></i>
                            </div>
                            <div class="form-group d-inline float-left" style="margin-top: 14px;"><input id="#javad_4"
                                                                                                         class="form-control form-control-sm"
                                                                                                         type="password"
                                                                                                         placeholder="Confirm Password * "
                                                                                                         style="width: 280px;"
                                                                                                         name="password_confirmation">
                            </div>
                            <div class="form-group float-left" style="margin-top: 14px;"><input id="#javad_5"
                                                                                                class="form-control form-control-sm"
                                                                                                type="text"
                                                                                                placeholder="speech title * "
                                                                                                style="width: 280px;"
                                                                                                name="SpeechTitle" value="{{old('SpeechTitle')}}">
                            </div>
                        </div>
                    </div>


                    <div id="Live2" style="display: none !important;">

                        <div class="d-inline float-left"
                             style="height: 147px;width: 320px;background-color: transparent;margin-right: 14px;margin-top: -10px;">
                            <p style="color: #ffffff" class="text-left">{{__('message.OpeningDate')}}: <span>{{\Carbon\Carbon::parse(\App\Site::find(1)->StartDate)->format('m-d-Y')}}</span></p>
                            <div class="form-group float-left" style="margin-top: 14px;"><input id="sinsin_date_01"
                                                                                                placeholder="Prefered Date 1"
                                                                                                onfocus="(this.type='date')"
                                                                                                title="Prefered Date 1 *"
                                                                                                class="form-control form-control-sm"
                                                                                                type="text"
                                                                                                style="height: 36px;"
                                                                                                name="PreferredDate1" value="{{old('PreferredDate1')}}">
                            </div>
                            <div class="form-group float-left" style="margin-top: 14px;"><input id="sinsin_date_02"

                                                                                                placeholder="Prefered Date 2"
                                                                                                onfocus="(this.type='date')"
                                                                                                title="Prefered Date 2 *"
                                                                                                class="form-control form-control-sm"
                                                                                                type="text"
                                                                                                style="height: 36px;"
                                                                                                name="PreferredDate2" value="{{old('PreferredDate2')}}">
                            </div>
                            <div class="form-group float-left" style="margin-top: 14px;"><input id="sinsin_date_03"
                                                                                                placeholder="Prefered Date 3"
                                                                                                onfocus="(this.type='date')"
                                                                                                title="Prefered Date 3 *"
                                                                                                class="form-control form-control-sm"
                                                                                                type="text"
                                                                                                style="height: 36px;"
                                                                                                name="PreferredDate3" value="{{old('PreferredDate3')}}">
                            </div>


                        </div>
                    </div>

                    <button class="btn btn-success btn-block" type="submit" style="margin-top: -20px;padding-top: 8px;">
                        <strong>{{__('message.Save')}}</strong><i class="fa fa-check" style="margin-left: 5px;"></i><br></button>


                    {{-- <div class="float-left" style="height: 147px;width: 320px;background-color: transparent;">
                         <div id="LiveConf" >
                         </div>
                         <button class="btn btn-success btn-block" type="submit" style="margin-top: 240px;margin-bottom: -50px;padding-top: 8px;"><strong>Submit</strong><i class="fa fa-check" style="margin-left: 5px;"></i><br></button>
                     </div>--}}
                </form>

                <input id="hidden_val" type="hidden" value="{{\App\Site::find(1)->ExhibitorMaximumOperator}}">
            </div>
        </div>
    </header>
@endsection
@section('js')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            var maxField = $("#hidden_val").val(); //Input fields increment limitation
            var fieldHTML = '<div><input type="email" name="OperatorEmails[]" value="" class="form-control" placeholder="Operator Email" /><a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle" style="font-size: 30px;color: #ffffff;margin-left: 10px"></i></a></div>'; //New input field html
            var x = 0; //Initial field counter is 1
            //Once add button is clicked
            $('.add_button').click(function () {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter

                    $('.field_wrapper').append(fieldHTML); //Add field html
                }
            });
            //Once remove button is clicked
            $('.field_wrapper').on('click', '.remove_button', function (e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });

        function show_info(javad) {
            Swal.fire({
                text: javad,
                icon: 'info'
            })
        }


        function areyousure() {
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
                    Swal.fire('Changes are not saved', '', 'info')
                    confirmed_sinsin = false
                    return false
                }
            })
        };

    </script>

    <script>

        document.getElementById("sinsin_date_01").min = "{{\Carbon\Carbon::parse(\App\Site::find(1)->StartDate)->format('Y-m-d')}}";
        document.getElementById("sinsin_date_01").max = "{{\Carbon\Carbon::parse(\App\Site::find(1)->StartDate)->addDays(9)->format('Y-m-d')}}";
        document.getElementById("sinsin_date_02").min = "{{\Carbon\Carbon::parse(\App\Site::find(1)->StartDate)->format('Y-m-d')}}";
        document.getElementById("sinsin_date_02").max = "{{\Carbon\Carbon::parse(\App\Site::find(1)->StartDate)->addDays(9)->format('Y-m-d')}}";
        document.getElementById("sinsin_date_03").min = "{{\Carbon\Carbon::parse(\App\Site::find(1)->StartDate)->format('Y-m-d')}}";
        document.getElementById("sinsin_date_03").max = "{{\Carbon\Carbon::parse(\App\Site::find(1)->StartDate)->addDays(9)->format('Y-m-d')}}";

        function ShowLiveConf() {
            var css = $('#Live1').css('display');
            var css2 = $('#Live2').css('display');
            if (css === 'none' && css2 === 'none') {
                $('#Live1').show(300);
                $('#Live2').show(400);
                $("#sinsin_date_01").prop('required', true);
                $("[name='SpeakerName']").prop('required', true);
                $("[name='SpeakerUserName']").prop('required', true);
                $("[name='password']").prop('required', true);
                $("[name='password_confirmation']").prop('required', true);
                $("[name='SpeechTitle']").prop('required', true);







            } else {
                $('#Live1').hide(400);
                $('#Live2').hide(300);
                $("#sinsin_date_01").removeAttr('required');
                $("[name='SpeakerName']").removeAttr('required');
                $("[name='SpeakerUserName']").removeAttr('required');
                $("[name='password']").removeAttr('required');
                $("[name='password_confirmation']").removeAttr('required');
                $("[name='SpeechTitle']").removeAttr('required');
            }
        }

    </script>


@endsection
