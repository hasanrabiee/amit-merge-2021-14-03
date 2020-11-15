@extends('layouts.app')

@section('content')


    <header class="d-flex masthead"
            style="background-image: url(@if(\App\Site::find(1)->SigninBackground != null) {{asset(\App\Site::find(1)->SigninBackground)}}   @else {{asset('assets/img/Signin-Background-IMG.png')}}  @endif);padding: 45px;">

        <div class="pull-left">
            <button  type="button" data-toggle="tooltip" data-placement="top" title="Change Language" onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning">
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
                        <div class="modal-body text-center">

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

        <div class="container my-auto text-center">
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


            <h1 class="mb-1"
                style="color: #525252;opacity: 1;font-size: 85px;!important ;-webkit-text-stroke: 1px #ffffffff !important;">{{\App\Site::find(1)->ExhabitionTitle}}</h1>


            <h3 class="mb-5"></h3>
            <div>
                <form style="width: 311px;" method="POST" action="{{ route('login') }}">
                    @csrf

                    <p class="text-left text-black">{{__('message.LoginText')}}</p>

                    <div class="form-group">
                        <input class="form-control form-control-lg @error('email') border border-danger @enderror"
                               type="text" placeholder="{{__('message.EOU')}}" autofocus=""
                               required="" value="{{ old('UserName') ?: old('email') }}"
                               style="background-color: rgb(255,255,255);"
                               name="login">
                        @error('email')
                        <span class="text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <input class="form-control form-control-lg @error('password') border border-danger @enderror"
                               type="password" placeholder="{{__('message.password')}}"
                               required="" style="background-color: rgb(255,255,255);" name="password"
                               autocomplete="current-password">
                        @error('password')
                        <span class="text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        @if (Route::has('password.request'))
                            <a class="float-left" style="color: black !important;" id="link-forgot"
                               href="{{ route('password.request') }}">{{__('message.ForgotPassword')}}</a>

                        @endif

                        <p class="float-right text-black" style="color: black !important;">{{__('message.Rememberme')}}
                            <input type="checkbox" style="margin-left: 8px;">
                        </p>
                    </div>

                    <div class="form-group">

                        <button class="btn btn-block btn-lg
               " type="submit" style="background-color: rgb(84,37,204);color: white">{{__('message.Login')}}
                        </button>

                    </div>


                </form>





                <div class="form-group">

                    <div class="btn-group">




                        <p onclick="window.open('{{route('Exhibitor-Register')}}', '_self')"
                                class="text " style="color: darkblue;margin-right: 15px;cursor: pointer"><i class="fa fa-id-card" style="margin: 5px"></i>{{__('message.signupasexhibitor')}}</p>

                        <p onclick="window.open('{{route('register')}}', '_self')"
                                 class="text text-danger" style="cursor: pointer"><i class="fa fa-user" style="margin: 5px"></i>{{__('message.signupasvisitor')}}</p>





                    </div>

                </div>


            </div>
            <div class="overlay"></div>



@endsection
