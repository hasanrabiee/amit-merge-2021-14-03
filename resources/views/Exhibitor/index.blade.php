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


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
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

                                        <div class="modal fade" role="dialog" tabindex="-1" id="EditJob">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{route('Exhibitor.UpdateJob')}}">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4><strong>{{__('message.UpdateJob')}}</strong><br></h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="ID" id="JobID">
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.Title')}}<br></p>
                                                                <input class="form-control" type="text" id="Title1"
                                                                       name="Title">
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.Description')}}<br></p>
                                                                <textarea class="form-control" id="Description1" name="Description" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.NumberofVacancies')}}<br></p>
                                                                <input class="form-control" type="number" id="Number1"
                                                                       name="Number" min="1">
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.Salary')}} €<br></p>
                                                                <input class="form-control" type="text" id="Salary1" placeholder="Salary €"
                                                                       name="Salary">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success btn-block" type="submit">
                                                                {{__('message.Update')}}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="job_vac_modal">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form method="post" action="{{route('Exhibitor.AddJob')}}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h4><strong>{{__('message.JobVacanciesDetails')}}</strong><br></h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.Title')}}<br></p>
                                                                <input class="form-control" type="text" id="Title"
                                                                       name="Title">
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.Description')}}<br></p>
                                                                <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.NumberofVacancies')}}</p>
                                                                <input class="form-control" type="number" id="Number"
                                                                       name="Number" min="1">
                                                            </div>
                                                            <div class="form-group">
                                                                <p class="text-left">{{__('message.Salary')}} €<br></p>
                                                                <input class="form-control" type="text" id="Salary"
                                                                       name="Salary" placeholder="Salary: €">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success btn-block" type="submit">
                                                                {{__('message.Save')}}
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" role="dialog" tabindex="-1" id="view_jobs">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4><strong>{{__('message.JobVacanciesDetails')}}</strong><br></h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" >

                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <th>{{__('message.Title')}}</th>
                                                                    <th>{{__('message.Description')}}</th>
                                                                    <th>{{__('message.number')}}</th>
                                                                    <th>{{__('message.Salary')}} €</th>
                                                                    <th>{{__('message.Action')}}</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach(\App\Jobs::where('BoothID' , $Booth->id)->get() as $job)
                                                                    <tr>
                                                                        <td class="scroll_box" style="max-width: 110px">{{$job->Title}}</td>
                                                                        <td class="scroll_box" style="max-width: 110px;height: 63px;">{{$job->Description}}</td>
                                                                        <td>{{$job->Number}}</td>
                                                                        <td>{{$job->Salary}} €</td>
                                                                        <td>



                                                                            <a class="btn btn-light" role="button" style="margin-left: 5px;" onclick="EditJob({{$job->id}})"><i
                                                                                    class="fa fa-pencil" style="font-size: 15px;"></i></a>


                                                                            <a class="btn btn-danger" role="button" style="margin-left: 5px;"  href="{{route('Exhibitor.DeleteJob' , $job->id)}}"><i
                                                                                    class="fa fa-trash" style="font-size: 15px;"></i></a>


                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>





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






    {{--    Hassan start here !!!!--}}




    <body style="background: url('{{\App\Site::ExhibitorBackground()}}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
        ;">
    <div>


    @include("Sidebars.exhibitor-sidebar")





    <!-- Main content -->

            <div class="content-wrapper" style="overflow-x: hidden">


            <!-- Content area -->
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
                                            <p>{{__('message.WebSite')}}: {{$Booth->WebSite}}</p>
                                            <p>{{__('message.Company')}} {{__('message.Representative')}}: {{$Booth->Representative}}</p>
                                            <p>{{__('message.Company')}} {{__('message.email')}}: {{$Booth->User->email }}</p>
                                            <p>{{__('message.Company')}} {{__('message.Name')}}: {{$Booth->CompanyName}}</p>
                                        </div>
                                        <div class="col-md-6 col-12 font-size-lg">
                                            <div class="btn-group w-100">

                                                <a class="btn btn-dark w-100"  data-toggle="modal" href="#job_vac_modal">
                                                    {{__('message.AddJobVacancies')}}
                                                </a>
                                                <a  class="btn btn-info w-100" data-toggle="modal" href="#view_jobs">
                                                    {{__('message.ViewJobs')}}
                                                </a>






                                                {{--                                                <a class="btn btn-dark w-100">Add Jobs</a>--}}
                                                {{--                                                <button type="button" class="btn btn-info w-100">View Jobs</button>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chart position-relative" id="traffic-sources"></div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="card p-3" style="background-color:rgba(54,54,54,0.65);;color: white">
                                        <div class="card-body py-0">
                                            <div class="row">
                                                <form action="{{route('Exhibitor.ChangePassword')}}" method="post" class="w-100">
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

                                <div class="col-xl-6">
                                    <div class="card p-3" style="background-color:rgba(54,54,54,0.65);color: white">
                                        <div class="card-body py-0">
                                            <div class="row">





                                                {{--                                                <form method="post" action="{{route('Exhibitor.AboutCompany')}}">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <textarea class="border rounded form-control float-left" style="width: 384px;height: 136px;"--}}
                                                {{--                                                              placeholder="Please tell us abour your company, this will pop-up in your company booth (120 character alimit)"--}}
                                                {{--                                                              maxlength="120" name="Description">{!! $Booth->Description !!}</textarea>--}}
                                                {{--                                                    <button class="btn btn-success float-left" type="submit"--}}
                                                {{--                                                            style="margin-top: 7px;width: 160px;color: rgb(255,255,255);">{{__('message.Update')}}--}}
                                                {{--                                                    </button>--}}
                                                {{--                                                </form>--}}





                                                <form method="post" action="{{route('Exhibitor.AboutCompany')}}" class="w-100">
                                                    @csrf
                                                    <div class="form-group col-12">
                                                        <textarea type="text" class="form-control" rows="5" style="padding-bottom: 19px;" placeholder="Please Tell Us About Your Visit Experience" maxlength="120" name="Description">{!! $Booth->Description !!}</textarea>
                                                    </div>
                                                    <div class="form-group text-center">
                                                        <button class="btn btn-success ml-2" type="submit">{{__('message.Update')}}</button>
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
    <script>
        function EditJob(id){

            $.ajax({
                url: "/api/v1/JobDetails/"+id,
                type: 'get',
                success: function(response){

                    var Data = JSON.parse(response);

                    document.getElementById('JobID').value = Data['id'];
                    document.getElementById('Title1').value = Data['Title'];
                    document.getElementById('Description1').value = Data['Description'];
                    document.getElementById('Number1').value = Data['Number'];
                    document.getElementById('Salary1').value = Data['Salary'];

                    // Display Modal
                    $('#view_jobs').modal('hide');

                    $('#EditJob').modal('show');
                }
            });


        }
    </script>
@endsection
