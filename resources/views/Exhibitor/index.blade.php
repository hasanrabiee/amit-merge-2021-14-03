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



            </div>            <div class="d-inline-block float-left rounded"
                 style="background-color: rgb(54,54,54,65%);width: 1117px;height: 452px;margin-right: 10px;padding: 1px;padding-top: 0px;padding-right: 3px;">
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
                        <div class="text-left border rounded user_active_menu"
                             style="background-color: transparent;height: 35px;margin-top: 8px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;">
                            <a class="text-left remove_underline" href="#" style="font-size: 19px;color: #000000;">{{__('message.Profile')}}</a>
                        </div>
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
                        <div class="text-left"
                             style="background-color: #00000000;height: 35px;margin-top: 1px;padding: 2px;padding-bottom: -1px;padding-top: -2px;padding-left: 13px;color: rgb(255,255,255);">
                            <a class="text-left remove_underline" href="{{route('Exhibitor.Payment')}}"
                               style="font-size: 20px;color: #ffffff;">{{__('message.Payment')}}</a></div>
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
                                        style="background-color: #149e5c;color: rgb(255,255,255);min-height: 54px;margin-right: 13px;font-size: 18px;text-decoration: none !important" >
                                    {{__('message.EnterExhabition')}}
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="border rounded d-block float-left border"
                     style="width: 837px;height: 425px;background-color: rgba(168,168,168,0.57);padding: 7px;color: #363636;margin-left: 22px;margin-top: 13px;">
                    <h5 class="text-left" style="padding: 18px;padding-left: 42px;color: #ffffff;height: 45px;">{{__('message.ProfileInformation')}}


                        @if(\Illuminate\Support\Facades\Auth::user()->AccountStatus == 'Active')
                            <label class="border rounded"
                                   style="margin-left: 27px;background-color: #3cd442;padding: 5px;margin-bottom: 1px;color: rgb(255,255,255);">{{__('message.AccountActive')}}</label>
                        @else
                            <label class="border rounded"
                                   style="margin-left: 27px;background-color: rgb(209,28,28);padding: 5px;margin-bottom: 1px;color: rgb(255,255,255);">{{__('message.AccountSuspended')}}</label>
                        @endif

                    </h5>
                    <div class="border rounded border-primary border"
                         style="background-color: #e8e8e8;height: 129px;width: 770px;margin-bottom: 0px;margin-left: 38px;padding: 25px;padding-top: 18px;margin-top: 18px;">
                        <div style="height: 91px;background-color: transparent;margin-top: -11px;">
                            <div class="float-left" style="margin-right: 150px;">
                                <p class="text-left" style="margin-bottom: 6px;font-size: 11px">{{__('message.Company')}} {{__('message.Name')}}: {{$Booth->CompanyName}}</p>
                                <p class="text-left" style="margin-bottom: 6px;font-size: 11px">{{__('message.Position')}}: {{\Illuminate\Support\Facades\Auth::user()->PositionUser}}</p>
                                <p class="text-left" style="margin-bottom: 6px;font-size: 11px">{{__('message.WebSite')}}: {{$Booth->WebSite}}</p>
                                <p class="text-left" style="margin-bottom: 6px;font-size: 11px">{{__('message.Company')}} {{__('message.Representative')}}: {{$Booth->Representative}}</p>
                                <p class="text-left" style="margin-bottom: 6px;font-size: 11px">{{__('message.Company')}} {{__('message.email')}}: {{$Booth->User->email }}</p>
                            </div>
                            <div class="float-left">




                                <a  data-toggle="modal" href="#view_jobs">
                                    <i class="fa fa-eye btn btn-primary"> {{__('message.ViewJobs')}}</i>
                                </a>

      <a  data-toggle="modal" href="#job_vac_modal">
                                    <i class="fa fa-plus-circle btn btn-success"> {{__('message.AddJobVacancies')}}</i>
                                </a>







                                <div >


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

                                </div>


                                {{--<div><a class="btn btn-success btn-lg" role="button" data-toggle="modal" href="#job_modal">Job Vacancies<i class="fa fa-list-alt" style="margin-left: 5px;"></i></a>
                                    <div class="modal fade" role="dialog" tabindex="-1" id="job_modal">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4>Job Vacancies&nbsp;</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
                                                <div class="modal-body">
                                                    <div class="col-md-12 search-table-col" style="margin-top: 13px;">
                                                        <div class="form-group pull-right col-lg-4"><input type="text" class="search form-control" placeholder="Search by typing here.."></div><span class="counter pull-right"></span>
                                                        <div class="table-responsive table-bordered table table-hover table-bordered results">
                                                            <table class="table table-bordered table-hover">
                                                                <thead class="bill-header cs">
                                                                <tr>
                                                                    <th id="trs-hd" class="col-lg-1">Title</th>
                                                                    <th id="trs-hd" class="col-lg-1">Description</th>
                                                                    <th id="trs-hd" class="col-lg-2">Count</th>
                                                                    <th id="trs-hd" class="col-lg-3">Salary</th>
                                                                    <th id="trs-hd" class="col-lg-2">Action</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>

                                                                <tr class="warning no-result">
                                                                    <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                                                                </tr>
                                                                @foreach(\App\Jobs::where('BoothID' , $Booth->id)->get() as $job)
                                                                <tr>
                                                                    <td  style="height: 63px;">{{$job->Title}}</td>
                                                                    <td class="scroll_box" style="height: 63px;">{{$job->Description}}</td>
                                                                    <td>{{$job->Number}}</td>
                                                                    <td>{{$job->Salary}}$</td>
                                                                    <td><a class="btn btn-danger" role="button" style="margin-left: 5px;" href="{{route('Exhibitor.DeleteJob' , $job->id)}}"><i class="fa fa-trash" style="font-size: 15px;"></i></a></td>
                                                                </tr>
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer"><button class="btn btn-light btn-block" data-dismiss="modal" type="button">{{__('message.Close')}}</button></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>--}}
                            </div>

                        </div>
                    </div>
                    <div class="text-left border rounded d-inline float-left"
                         style="background-color: #e8e8e8;height: 204px;width: 336px;margin-bottom: 0px;margin-left: 38px;margin-top: 13px;padding: 7px;">
                        <form style="width: 259px;" action="{{route('Exhibitor.ChangePassword')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="password" placeholder="{{__('message.OldPass2')}} "
                                       name="OldPassword">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="password" placeholder="{{__('message.NewPass2')}} "
                                       name="password">
                            </div>
                            <div class="form-group">
                                <input class="form-control form-control-sm" type="password"
                                       placeholder="{{__('message.passwordConfrimation')}}" name="password_confirmation">
                            </div>

                            <button class="btn btn-success text-center" type="submit"
                                    style="width: 230px;color: rgb(255,255,255);">{{__('message.btn-Update')}}
                            </button>
                            <i
                                class="fa fa-info-circle" style="color: black;margin-left: 5px"
                                data-toggle="tooltip"
                                onclick="show_info('{{__('message.passwordHint')}}')"></i>
                            <div class="btn-group" role="group"></div>
                        </form>
                    </div>
                    <div class="border rounded d-inline float-left"
                         style="background-color: #e8e8e8;height: 205px;width: 402px;margin-bottom: 0px;margin-left: 38px;margin-top: 13px;padding: 8px;">
                        <form method="post" action="{{route('Exhibitor.AboutCompany')}}">
                            @csrf
                            <textarea class="border rounded form-control float-left" style="width: 384px;height: 136px;"
                                      placeholder="Please tell us abour your company, this will pop-up in your company booth (120 character alimit)"
                                      maxlength="120" name="Description">{!! $Booth->Description !!}</textarea>
                            <button class="btn btn-success float-left" type="submit"
                                    style="margin-top: 7px;width: 160px;color: rgb(255,255,255);">{{__('message.Update')}}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>
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
