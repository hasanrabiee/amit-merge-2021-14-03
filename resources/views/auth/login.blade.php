@extends('layouts.app')

@section("Head")


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <link href="{{asset("css/bootstrap-limitless.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/layout.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/components.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/colors.min.css")}}" rel="stylesheet" type="text/css">
    <link href="{{asset("css/hasan-custom.css")}}" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="{{asset("js/jquery.min.js")}}"></script>
    <script src="{{asset("js/bootstrap.bundler.js")}}"></script>
    <script src="{{asset("js/blockui.min.js")}}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{asset("js/d3.min.js")}}"></script>
    <script src="{{asset("js/d3tooltip.js")}}"></script>
    <script src="{{asset("js/switchery.min.js")}}"></script>
    <script src="{{asset("js/momment.min.js")}}"></script>
    <script src="{{asset("js/app2.js")}}"></script>
    <script src="{{asset("js/dashboard.js")}}"></script>
    <script src="https://use.fontawesome.com/fd423b8d2f.js"></script>
    <!-- /theme JS files -->


@endsection

@section('content')




{{--     Modals start here   --}}






    <div class="modal fade" role="dialog" tabindex="-1" id="Lang_Modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Change Language</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body text-center">

                    <div class="dropdown">

                        <a style="text-decoration: none !important" class="" href="{{ url('locale/en') }}"><i
                                class="fa fa-globe"></i>English</a><br>
                        <a style="text-decoration: none !important" class="" href="{{ url('locale/de') }}"><i
                                class="fa fa-globe"></i>Germany</a><br>
                        <a style="text-decoration: none !important" class="" href="{{ url('locale/al') }}"><i
                                class="fa fa-globe"></i>Albanian</a><br>


                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light btn-block" data-dismiss="modal" type="button">Close
                    </button>
                </div>
            </div>
        </div>
    </div>






{{--  Modals end here --}}





    {{--    Hassan start HEre --}}







    <div class="h-100 w-100 overflow" style="width:100% !important ; height:100% !important;background-size: cover;background-repeat:no-repeat;background-image: url(@if(\App\Site::find(1)->SigninBackground != null) {{asset(\App\Site::find(1)->SigninBackground)}}   @else {{asset('assets/img/poster.jpg')}}@endif">
        <div class="row mt-md-3">
            <div class="col-7 col-md-10">
            </div>
            <div class="col-5 col-md-2">
                <a class="" href="{{ url('locale/en') }}"><i
                        class="ml-2"></i>En</a>
                <a class="" href="{{ url('locale/de') }}"><i
                        class="ml-2"></i>Ge</a>
                <a class="" href="{{ url('locale/al') }}"><i
                        class="ml-2"></i>Al</a>
            </div>
        </div>


        <div class="mt-md-n5">
            <div class="container-fluid h-100 mt-md-n5">
                <div class="row">
                </div>
                <div class="row h-100 justify-content-center align-items-center">

                    <div class="col-md-4">


                        <div class="ml-md-5">

                            @if(\App\Site::find(1)->Logo1)
                                <img class="w-50 ml-md-5 mt-md-5" src="{{\App\Site::find(1)->Logo1}}">
                            @endif

                        </div>

                    </div>
                    <div class="col-md-3"></div>
                    <div class="col-md-5 margin-right-text mt-md-5 text-title" style="">
                        <p class="mt-md-5">
                        <p class="mt-md-5 text-title">
                            {{\App\Site::find(1)->ExhabitionTitle}} <br>
                            {{--                        <img src="{{asset("assets/img/date.png")}}" alt="" width="100">--}}
                            @if(\App\Site::find(1)->Logo2)
                                <img class="" width="100" src="{{\App\Site::find(1)->Logo2}}">
                            @endif
                        </p>
                        </p>
                    </div>
                    <form class="col-sm-12 col-md-4" method="POST" action="{{ route('login') }}">
                        @csrf
                        <p class="text-left text-black">{{__('message.LoginText')}}</p>
                        <div class="form-group">
                            <input class="form-control @error('email') border border-danger @enderror"
                                   type="text" placeholder="{{__('message.EOU')}}" autofocus=""
                                   required="" value="{{ old('UserName') ?: old('email') }}"
                                   name="login">
                            @error('email')
                            <span class="text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">


                            <input class="form-control @error('password') border border-danger @enderror"
                                   type="password" placeholder="{{__('message.password')}}"
                                   required="" name="password"
                                   autocomplete="current-password">
                            @error('password')
                            <span class="text text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2 text-left text-dark">
                            <div class="row">
                                <div class="col-5">
                                    @if (Route::has('password.request'))
                                        <a class="text-dark"  id="link-forgot"
                                           href="{{ route('password.request') }}">{{__('message.ForgotPassword')}}</a>

                                    @endif
                                </div>
                                <div class="col-7">
                                    <div class="w-100 ml-md-5">
                                        <span class="ml-md-5">{{__('message.Rememberme')}}</span>
                                        <input type="checkbox">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success w-100
               " type="submit" style="background-color: rgb(84,37,204)">{{__('message.Login')}}
                            </button>
                        </div>
                        <div class="form-group w-100">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <p onclick="window.open('{{route('Exhibitor-Register')}}', '_self')"
                                       class="text " style="color: darkblue;cursor: pointer"><i class="fa fa-id-card" style="margin: 5px"></i>{{__('message.signupasexhibitor')}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p onclick="window.open('{{route('register')}}', '_self')"
                                       class="text text-danger" style="cursor: pointer"><i class="fa fa-user" style="margin: 5px"></i>{{__('message.signupasvisitor')}}</p>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
