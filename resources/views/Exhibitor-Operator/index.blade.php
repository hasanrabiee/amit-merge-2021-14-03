@extends('layouts.Panel')

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
{{--    <header class="d-flex masthead"--}}
{{--            style="background-image: url({{\App\Site::ExhibitorBackground()}});padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">--}}
{{--        <div class="container my-auto text-center">--}}
{{--            <h3 class="mb-5"></h3>--}}
{{--            <div class="pull-right d-inline m-0">--}}


{{--                @if(\App\Site::find(1)->Logo1)--}}
{{--                    <img class="float-right" src="{{\App\Site::find(1)->Logo1}}"--}}
{{--                         style="width: 113px;margin-right: 34px;">--}}
{{--                @endif--}}
{{--                @if(\App\Site::find(1)->Logo2)--}}
{{--                    <img class="float-right" src="{{\App\Site::find(1)->Logo2}}"--}}
{{--                         style="width: 113px;margin-right: 34px;">--}}
{{--                @endif--}}
{{--                @if(\App\Site::find(1)->Logo3)--}}
{{--                    <img class="float-right" src="{{\App\Site::find(1)->Logo3}}"--}}
{{--                         style="width: 113px;margin-right: 34px;">--}}
{{--                @endif--}}

{{--            </div>--}}

{{--            <div style="width: 354px;height: 45px;background-color: #525252; margin-top: 70px" class="rounded">--}}

{{--                <div class="pull-right p-1">--}}
{{--                    <button type="button" data-toggle="tooltip" data-placement="top" title="Change Language" onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning">--}}
{{--                        <i class="fa fa-globe"></i>--}}
{{--                    </button>--}}
{{--                    <div class="modal fade" role="dialog" tabindex="-1" id="Lang_Modal">--}}
{{--                        <div class="modal-dialog" role="document">--}}
{{--                            <div class="modal-content">--}}
{{--                                <div class="modal-header">--}}
{{--                                                                        <h4>{{__('message.ChangeLang')}}</h4>--}}

{{--                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span--}}
{{--                                            aria-hidden="true">×</span></button>--}}
{{--                                </div>--}}
{{--                                <div class="modal-body">--}}

{{--                                    <div class="dropdown">--}}

{{--                                        <a style="text-decoration: none !important" class="" href="{{ url('locale/en') }}"><i--}}
{{--                                                class="fa fa-globe"></i>English</a><br>--}}
{{--                                        <a style="text-decoration: none !important" class="" href="{{ url('locale/de') }}"><i--}}
{{--                                                class="fa fa-globe"></i>German</a><br>--}}
{{--                                        <a style="text-decoration: none !important" class="" href="{{ url('locale/al') }}"><i--}}
{{--                                                class="fa fa-globe"></i>Shqip</a><br>--}}


{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="modal-footer">--}}
{{--                                    <button class="btn btn-light btn-block" data-dismiss="modal" type="button">Close--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="pull-right p-1 logout_section">--}}
{{--                    <button data-toggle="tooltip" data-placement="top" title="Logout" onclick="document.getElementById('logout-form').submit()" class="btn btn-danger">--}}
{{--                        <i class="fa fa-sign-out"></i>--}}
{{--                    </button>--}}

{{--                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                        @csrf--}}
{{--                    </form>--}}


{{--                </div>--}}





{{--                <div class="d-inline float-left"--}}
{{--                     style="background-color: transparent;height: 26px;width: 122px;margin-left: 2px;">--}}
{{--                    <h6 class="text-left"--}}
{{--                        style="width: 115px;height: 41px;padding: 7px;color: rgb(255,255,255);margin-left: 4px;">--}}
{{--                        {{\Illuminate\Support\Str::limit(\Illuminate\Support\Facades\Auth::user()->UserName , 18)}} </h6>--}}
{{--                </div>--}}



{{--            </div>--}}
{{--            <div class="d-inline-block float-left rounded amitiss_back"--}}
{{--                 style="width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">--}}
{{--                <div class="float-left border rounded"--}}
{{--                     style="width: 244px;height: 452px;background-color: transparent;"><a href="#avatar_modal"--}}
{{--                                                                                          data-toggle="modal">--}}
{{--                        <img class="rounded-circle border" src="{{\Illuminate\Support\Facades\Auth::user()->Image}}"--}}
{{--                             style="width: 76px;height: 74px;margin-top: 8px;">--}}
{{--                    </a>--}}
{{--                    <div><a class="btn btn-primary btn-lg make_hidden" role="button" data-toggle="modal"--}}
{{--                            href="#myModal">Launch Demo Modal</a>--}}
{{--                        <div class="modal fade" role="dialog" tabindex="-1" id="avatar_modal">--}}
{{--                            <div class="modal-dialog" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h4>Change Avatar Photo</h4>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                            <span aria-hidden="true">×</span></button>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-body">--}}
{{--                                        <form action="{{route('ExhibitorOperator.UpdateAvatar')}}" method="post"--}}
{{--                                              enctype="multipart/form-data">--}}
{{--                                            @csrf--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="file" name="Avatar">--}}
{{--                                            </div>--}}
{{--                                            <button class="btn btn-success btn-block" type="submit">Update Avatar<i--}}
{{--                                                    class="fa fa-save" style="margin-left: 9px;"></i></button>--}}
{{--                                        </form>--}}
{{--                                    </div>--}}
{{--                                    <div class="modal-footer">--}}
{{--                                        <button class="btn btn-light btn-block" data-dismiss="modal" type="button">--}}
{{--                                            Close--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <div class="text-left border rounded user_active_menu"--}}
{{--                             style="background-color: transparent;height: 35px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">--}}
{{--                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.index')}}"--}}
{{--                               style="font-size: 19px;color: #000000;">{{__('message.Profile')}}</a></div>--}}
{{--                        <div class="text-left"--}}
{{--                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">--}}
{{--                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.inbox')}}"--}}
{{--                               style="font-size: 20px;color: #ffffff;">{{__('message.Inbox')}}</a></div>--}}
{{--                        <div class="text-left"--}}
{{--                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">--}}
{{--                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.Statistics')}}"--}}
{{--                               style="font-size: 20px;color: #ffffff;">{{__('message.Statistics')}}</a></div>--}}
{{--                        <div class="text-left"--}}
{{--                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">--}}
{{--                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.History')}}"--}}
{{--                               style="font-size: 20px;color: #ffffff;">{{__('message.History')}}</a></div>--}}
{{--                        <div class="text-left"--}}
{{--                             style="background-color: #00000000;min-height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">--}}
{{--                            <a class="text-left remove_underline" href="{{route('ExhibitorOperator.ContactUs')}}"--}}
{{--                               style="font-size: 20px;color: #ffffff;">{{__('message.ContactUs')}}</a></div>--}}
{{--                        <div class="text-left"--}}
{{--                             style="background-color: #00000000;height: 20px;margin-top: -15px;padding: 24px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">--}}
{{--                            <a href="/Exhabition/" class="" target="_blank">--}}
{{--                                <button class="btn btn-block" type="button"--}}
{{--                                        style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 20px;">{{__('message.EnterExhabition')}}</button>--}}
{{--                            </a></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="border rounded d-block float-left border"--}}
{{--                     style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">--}}
{{--                    <h5 class="text-left" style="padding: 18px;padding-left: 42px;color: #ffffff;height: 45px;">Operator--}}
{{--                        Status<label class="border rounded"--}}
{{--                                     style="margin-left: 27px;background-color: @if(\Illuminate\Support\Facades\Auth::user()->AccountStatus == 'Active') #3cd442 @else red @endif;padding: 5px;margin-bottom: 1px;color: rgb(255,255,255);">@if(\Illuminate\Support\Facades\Auth::user()->AccountStatus == 'Active')--}}
{{--                                Active @else Suspended(You Cant Chat Any more) @endif</label></h5>--}}
{{--                    <div class="border rounded border-primary border"--}}
{{--                         style="background-color: #e8e8e8;height: 129px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: 18px;">--}}
{{--                        <div style="height: 91px;background-color: transparent;margin-top: -11px;">--}}
{{--                            <div class="float-left" style="margin-right: 150px;">--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">Company--}}
{{--                                    Name: {{$Booth->CompanyName}}</p>--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">Company--}}
{{--                                    Representative: {{$Booth->Representative}}</p>--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">Position: {{$Booth->Position}}</p>--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">WebSite: <a--}}
{{--                                        href="{{$Booth->WebSite}}">{{$Booth->WebSite}}</a></p>--}}
{{--                            </div>--}}
{{--                            <div class="float-left">--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">Tel: {{$Booth->User->PhoneNumber}}</p>--}}
{{--                                <p style="margin-bottom: 6px;">Email: {{$Booth->User->email}}<br></p><span></span>--}}
{{--                                <div><a class="btn btn-success btn-lg" role="button" data-toggle="modal"--}}
{{--                                        href="#job_modal">Job Vacancies<i class="fa fa-list-alt"--}}
{{--                                                                          style="margin-left: 5px;"></i></a>--}}
{{--                                    <div class="modal fade" role="dialog" tabindex="-1" id="job_modal">--}}
{{--                                        <div class="modal-dialog" role="document">--}}
{{--                                            <div class="modal-content">--}}
{{--                                                <div class="modal-header">--}}
{{--                                                    <h4>Job Vacancies&nbsp;</h4>--}}
{{--                                                    <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                            aria-label="Close"><span aria-hidden="true">×</span>--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-body">--}}
{{--                                                    <div class="col-md-12 search-table-col" style="margin-top: 13px;">--}}
{{--                                                        <div class="form-group pull-right col-lg-4"><input type="text"--}}
{{--                                                                                                           class="search form-control"--}}
{{--                                                                                                           placeholder="Search by typing here..">--}}
{{--                                                        </div>--}}
{{--                                                        <span class="counter pull-right"></span>--}}
{{--                                                        <div--}}
{{--                                                            class="table-responsive table-bordered table table-hover table-bordered results">--}}
{{--                                                            <table class="table">--}}
{{--                                                                <thead>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>{{__('message.Title')}}</th>--}}
{{--                                                                    <th>{{__('message.Description')}}</th>--}}
{{--                                                                    <th>{{__('message.number')}}</th>--}}
{{--                                                                    <th>{{__('message.Salary')}} €</th>--}}
{{--                                                                </tr>--}}
{{--                                                                </thead>--}}
{{--                                                                <tbody>--}}
{{--                                                                <tr class="warning no-result">--}}
{{--                                                                    <td colspan="12"><i class="fa fa-warning"></i>&nbsp;--}}
{{--                                                                        No Result !!!--}}
{{--                                                                    </td>--}}
{{--                                                                </tr>--}}
{{--                                                                @foreach(\App\Jobs::where('BoothID' , $Booth->id)->get() as $job)--}}
{{--                                                                    <tr>--}}
{{--                                                                        <td class="scroll_box">{{$job->Title}}</td>--}}
{{--                                                                        <td class="scroll_box">{{$job->Description}}</td>--}}
{{--                                                                        <td>{{$job->Number}}</td>--}}
{{--                                                                        <td>{{$job->Salary}} €</td>--}}
{{--                                                                    </tr>--}}
{{--                                                                @endforeach--}}
{{--                                                                </tbody>--}}
{{--                                                            </table>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="modal-footer">--}}
{{--                                                    <button class="btn btn-light btn-block" data-dismiss="modal"--}}
{{--                                                            type="button">Close--}}
{{--                                                    </button>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="border rounded border-primary float-left border"--}}
{{--                         style="background-color: #e8e8e8;height: 169px;width: 333px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: 18px;">--}}
{{--                        <div style="height: 91px;background-color: transparent;margin-top: -11px;">--}}
{{--                            <div class="float-left" style="margin-right: 150px;">--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">First--}}
{{--                                    Name: {{\Illuminate\Support\Facades\Auth::user()->FirstName}}</p>--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">Last--}}
{{--                                    Name: {{\Illuminate\Support\Facades\Auth::user()->LastName}}</p>--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">--}}
{{--                                    Email: {{\Illuminate\Support\Facades\Auth::user()->email}}</p>--}}
{{--                                <p class="text-left" style="margin-bottom: 6px;">--}}
{{--                                    Tel: {{\Illuminate\Support\Facades\Auth::user()->PhoneNumber}}<br></p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="text-left border rounded d-inline float-left"--}}
{{--                         style="background-color: #e8e8e8;height: 204px;width: 336px;margin-bottom: 0px;margin-left: 38px;margin-top: 13px;padding: 7px;">--}}
{{--                        <form style="width: 259px;" action="{{route('ExhibitorOperator.ChangePassword')}}"--}}
{{--                              method="post">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group">--}}
{{--                                <input class="form-control form-control-sm" type="password" placeholder="{{__('message.OldPass2')}} "--}}
{{--                                       name="OldPassword">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input class="form-control form-control-sm" type="password" placeholder="{{__('message.NewPass2')}} "--}}
{{--                                       name="password">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <input class="form-control form-control-sm" type="password"--}}
{{--                                       placeholder="{{__('message.passwordConfrimation')}}" name="password_confirmation">--}}
{{--                            </div>--}}

{{--                            <button class="btn btn-success text-center" type="submit"--}}
{{--                                    style="width: 230px;color: rgb(255,255,255);">{{__('message.btn-Update')}}--}}
{{--                            </button>--}}
{{--                            <i--}}
{{--                                class="fa fa-info-circle" style="color: black;margin-left: 5px"--}}
{{--                                data-toggle="tooltip"--}}
{{--                                onclick="show_info('{{__('message.passwordHint')}}')"></i>--}}
{{--                            <div class="btn-group" role="group"></div>--}}
{{--                        </form>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </header>--}}




{{--    Hasan start here !!!!!--}}

<div class="modal fade" role="dialog" tabindex="-1" id="view_jobs" style="height: 500px;overflow-y: auto">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4><strong>{{__('message.JobVacanciesDetails')}}</strong><br></h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-label="Close"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                @foreach(\App\Jobs::where('BoothID' , $Booth->id)->get() as $job)
                    <div class="main-modal" style="position:relative;">
                        <div style="background-color:#b2caeb;" class="p-3">
                            <h4 style="font-weight: bolder;">
                                {{$job->Title}}
                            </h4>
                        </div>

                        <div>
                            <p>
                                {{$job->Description}}
                            </p>
                        </div>

                        <div>
                            <h6 style="font-weight: bolder">Number Of Vacencies :</h6>
                            <p>
                                {{$job->Number}}
                            </p>
                        </div>

                        <div>
                            <h6 style="font-weight: bolder">Salary :</h6>
                            <p>
                                {{$job->Salary}} €
                            </p>
                        </div>
                    </div>
                @endforeach





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success btn-block" data-dismiss="modal"
                        aria-label="Close">
                    {{__('message.Close')}}
                </button>

            </div>

        </div>
    </div>
</div>


        @include("Sidebars.exhibitorOperator-sidebar")






            <!-- Main content -->

            <div class="content-wrapper" style="overflow-x: hidden">

                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Traffic sources -->

                            <div class="card" style="background-color:rgba(54,54,54,0.65);color: white">
                                <div class="card-header header-elements-inline">
                                    <h6 class="card-title">Profile Information</h6>

                                    @if(\Illuminate\Support\Facades\Auth::user()->AccountStatus == 'Active')
                                        <button class="btn btn-success ml-md-n5">{{__('message.AccountActive')}}</button>
                                    @else
                                        <button class="btn btn-danger ml-md-n5">{{__('message.AccountSuspended')}}</button>
                                    @endif


                                    <div class="header-elements">
                                    </div>
                                </div>
                                <div class="chart position-relative" id="traffic-sources"></div>
                            </div>

                            <div class="card p-3" style="background-color:rgba(54,54,54,0.65);color: white">
                                <div class="card-body py-0">
                                    <div class="row">
                                        <div class="col-md-6 col-12 font-size-lg">
                                            <p>{{__('message.Position')}}: {{\Illuminate\Support\Facades\Auth::user()->PositionUser}}</p>
                                            <p>{{__('message.WebSite')}}: <a href="{{$Booth->WebSite}}">{{$Booth->WebSite}}</a></p>
                                            <p>{{__('message.Company')}} {{__('message.Representative')}}: {{$Booth->Representative}}</p>
                                            <p>{{__('message.Company')}} {{__('message.email')}}: {{$Booth->User->email }}</p>
                                            <p>{{__('message.Company')}} {{__('message.Name')}}: {{$Booth->CompanyName}}</p>


                                            @if ($Booth->User->companyAddress != null)
                                                <p>
                                                    Company Address : {{$Booth->User->companyAddress}}
                                                </p>
                                            @endif

                                            @if ($Booth->User->zipCode != null)
                                                <p>
                                                    Zip Code : {{$Booth->User->zipCode}}
                                                </p>
                                            @endif

                                            @if ($Booth->User->mainCompany != null)
                                                <p>
                                                    Main Company : {{$Booth->User->mainCompany}}
                                                </p>
                                            @endif

                                            @if ($Booth->User->institutionEmail != null)
                                                <p>
                                                    Institution Email : {{$Booth->User->institutionEmail}}
                                                </p>
                                            @endif

                                            @if ($Booth->User->phone != null)
                                                <p>
                                                    phone : {{$Booth->User->phone }}
                                                </p>
                                            @endif

                                            @if ($Booth->User->fax != null)
                                                <p>
                                                    Fax : {{$Booth->User->fax}}
                                                </p>
                                            @endif

                                            @if ($Booth->User->institution != null)
                                                <p>
                                                    Institution : {{$Booth->User->institution}}
                                                </p>
                                            @endif


                                        </div>
                                        <div class="col-md-6 col-12 font-size-lg">
                                            <div class="btn-group w-50">

                                                <a  class="btn btn-info w-100" data-toggle="modal" href="#view_jobs">
                                                    {{__('message.ViewJobs')}}
                                                </a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart position-relative" id="traffic-sources"></div>
                            </div>
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="card p-3" style="background-color:rgba(54,54,54,0.65);color: white;height: 250px;">
                                        <div class="card-body py-0">
                                            <p>
                                                First Name: {{\Illuminate\Support\Facades\Auth::user()->FirstName}}
                                            </p>
                                            <p>
                                                Last Name: {{\Illuminate\Support\Facades\Auth::user()->LastName}}
                                            </p>
                                            <p>
                                                Email: {{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                            <p>
                                                Tel: {{\Illuminate\Support\Facades\Auth::user()->PhoneNumber}}
                                            </p>
                                        </div>
                                        <div class="chart position-relative" id="traffic-sources"></div>
                                    </div>
                                </div>



                                <div class="col-xl-6">
                                    <div class="card p-3" style="background-color:rgba(54,54,54,0.65);;color: white">
                                        <div class="card-body py-0">
                                            <div class="row">
                                                <form action="{{route('ExhibitorOperator.ChangePassword')}}" method="post" class="w-100">
                                                    @csrf
                                                    <div class="form-group col-12">
                                                        <input class="form-control" type="password" placeholder="{{__('message.Old')}} {{__('message.password')}}"
                                                               name="OldPassword">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <input class="form-control" type="password" placeholder="{{__('message.New')}} {{__('message.password')}}"
                                                               name="password">
                                                    </div>

                                                    <div class="form-group col-12">
                                                        <input class="form-control" type="password" placeholder="{{__('message.passwordConfrimation')}}" name="password_confirmation">                                                </div>

                                                    <div class="form-group text-center">
                                                        {{--                                                    <input type="submit" class="btn btn-success ml-2" value="Update Password">--}}
                                                        <button class="btn btn-success ml-2" type="submit">{{__('message.Update')}}</button> <i
                                                            class="fa fa-info-circle" style="color: black;margin-left: 5px"
                                                            data-toggle="tooltip"
                                                            onclick="show_info('{{__('message.passwordHint')}}')"></i>

                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="chart position-relative" id="traffic-sources"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->
                        </div>
                    </div>
                    <!-- /main charts -->
                </div>
                <!-- /content area -->
            </div>
            <!-- /main content -->
        </div>


    </div>
    </body>




@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function show_info(javad) {
            Swal.fire({
                text: javad,
            })
        }
    </script>
@endsection
