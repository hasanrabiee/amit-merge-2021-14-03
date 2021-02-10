
<!-- Main sidebar -->
<div class="sidebar sidebar-light sidebar-main sidebar-expand-md align-self-start">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="fa fas fa-chevron-left"></i>
        </a>
        <span class="font-weight-semibold">Main sidebar</span>
        <a href="#" class="sidebar-mobile-expand">
            <i class="fa fas fa-expand"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">
        <div class="card card-sidebar-mobile">

            <!-- Header -->
            <div class="card-header header-elements-inline">
            </div>

            <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-6">
                                    <a title="logout" class="btn btn-dark btn-sm " href="{{ route('logout') }}" style="font-size:12px;color: #c5c5c5;" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i></a>
                                </div>
                                <div class="col-6">
                                    <a title="language" type="button" data-toggle="tooltip" data-placement="top" title="Change Language" onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning btn-sm text-dark"><i class="fa fa-globe" style="font-size: 15px;"></i></a>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="media">


                        <div class="media-body">
                            <div class="media-title font-weight-semibold mt-md-2">{{\Illuminate\Support\Facades\Auth::user()->UserName}}     </div>

                            {{--                                    <span class="btn btn-danger btn-sm">Logout</span>--}}

                        </div>

                    </div>
                </div>
            </div>
            <!-- /user menu -->



            <!-- Main navigation -->


            <div class="card-body p-0">
                <ul class="nav nav-sidebar" data-nav-type="accordion" style="height: 900px !important ;">
                    <!-- Main -->
                    <li class="nav-item ml-md-3 mb-md-2">
                        {{__('message.Manage')}} {{__('message.Event')}}
                    </li>

                    <li class="nav-item">
                            <a href="{{route('Admin.History')}}" class="nav-link @if( Request::is("*History*")) active @endif "><span>{{__('message.History')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.Lounge')}}" class="nav-link @if( Request::is("*lounge*")) active @endif "> <span>{{__('message.Lounge')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.Statistics')}}" class="nav-link @if( Request::is("*statistic*")) active @endif "> <span>{{__('message.Statistics')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.RegisteredVisitor')}}" class="nav-link @if( Request::is("*RegisteredVi*")) active @endif "><span>{{__('message.Registered')}}{{__("message.Visitor")}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.RegisteredExhibitor')}}" class="nav-link @if( Request::is("*RegisteredEx*")) active @endif "><span>{{__('message.Registered')}}{{__("message.Exhibitor")}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.Auditorium')}}" class="nav-link @if( Request::is("*Auditorium*")) active @endif "><span>{{__('message.Auditorium')}} {{__('message.Schedule')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.conference-create')}}" class="nav-link @if( Request::is("*conference/create*")) active @endif "><span>Create Conference</span></a>
                    </li>
                    <li class="nav-item ml-md-3 mb-md-2">
                        {{__('message.Create')}} {{__('message.Event')}}
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.Setting')}}" class="nav-link @if( Request::is("Setting*")) active @endif "><span>{{__('message.Setting')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.Signin')}}" class="nav-link @if( Request::is("*Signin*")) active @endif "><span>{{__('message.Signin')}} {{__('message.Page')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.VisitorSetting')}}" class="nav-link @if( Request::is("*VisitorSetting*")) active @endif "><span>{{__('message.Visitor')}} {{__('message.Page')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.ExhibitorSetting')}}" class="nav-link @if( Request::is("*ExhibitorSetting*")) active @endif "><span> {{__('message.Exhibitor')}} {{__('message.Page')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Admin.AppAdjustment')}}"class="nav-link @if( Request::is("*AppAdjustment*")) active @endif "><span> {{__('message.Adjustment')}}</span></a>
                    </li>


                    <li class="nav-item">


                        @if (\App\Conference::where('booth', '0')->first() != null)

                            @php
                                $conference = \App\Conference::where('booth', '0')->first();
                            @endphp




                            @if (\Carbon\Carbon::today() == \Carbon\Carbon::parse($conference->start_date) and  \Carbon\Carbon::now()->lt(Carbon\Carbon::parse($conference->start_time))  )

                                <a href="{{route('AuditoriumPlay',$conference->id)  }}" class="btn btn-dark btn-block"
                                   role="button" disabled="">Not started yet
                                    <i class="fa fa-hourglass"></i>
                                </a>

                            @elseif (\Carbon\Carbon::today() == \Carbon\Carbon::parse($conference->start_date) and  \Carbon\Carbon::now()->gte(Carbon\Carbon::parse($conference->start_time)) and \Carbon\Carbon::now()->lt(Carbon\Carbon::parse($conference->end_time)) )


                                @if ($conference->started )

                                    <a href="{{route('join-webinar',$conference->id)  }}" class="btn btn-success btn-block"
                                       role="button" disabled="">Click to Re-Join the conference
                                        <i class="fa fa-plus"></i>
                                    </a>

                                @else



                                    <a href="{{route('Admin.create-webinar',$conference->id)  }}" class="btn btn-success btn-block"
                                       role="button" disabled="">Click to Start the conference
                                        <i class="fa fa-plus"></i>
                                    </a>


                                @endif









                            @elseif (\Carbon\Carbon::today() > \Carbon\Carbon::parse($conference->start_date) or ( \Carbon\Carbon::today() == \Carbon\Carbon::parse($conference->start_date) and  \Carbon\Carbon::now()->gte(Carbon\Carbon::parse($conference->end_time))  ))


                                @if($conference->recorded_video)



                                    <a href="{{$conference->recorded_video}}" class="btn btn-danger btn-block"
                                       role="button" disabled="">Recorded video
                                        <i class="fa fa-film"></i>
                                    </a>




                                @endif

                                <a href="{{route('AuditoriumPlay',$conference->id)  }}"
                                   class="btn btn-outline-dark btn-block"
                                   role="button" disabled="">Conference is over
                                    <i class="fa fa-cancel"></i>
                                </a>


                            @else


                                <a href="{{route('AuditoriumPlay',$conference->id)  }}"
                                   class="btn btn-outline-dark btn-block"
                                   role="button" disabled="">No action
                                    <i class="fa fa-cancel"></i>
                                </a>



                            @endif



















                        @endif







                    </li>



                </ul>
            </div>
            <!-- /main navigation -->
        </div>
    </div>
    <!-- /sidebar content -->
</div>
<!-- /main sidebar -->







{{--modals--}}


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
