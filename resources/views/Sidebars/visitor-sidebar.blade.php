


    <div class="sidebar-content">
        <div class="card card-sidebar-mobile">

            <!-- Header -->
        {{--                    <div class="card-header header-elements-inline">--}}
        {{--                    </div>--}}

        <!-- User menu -->
            <div class="sidebar-user">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <a title="logout" class="btn btn-dark btn-sm " href="{{ route('logout') }}" style="font-size:12px;color: #c5c5c5;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i></a>

                            <a title="language" type="button" data-toggle="tooltip" data-placement="top" title="Change Language" onclick="$('#Lang_Modal').modal('show')" class="btn btn-warning btn-sm text-dark"><i class="fa fa-globe" style="font-size: 15px;"></i></a>

                        </div>
                    </div>
                    <div class="media">

                        <div class="mr-3">

                            {{--                                    <a href="#"><img src="Chrysanthemum.jpg" width="38" height="38" class="rounded-circle" alt=""></a>--}}
                            <a data-toggle="modal" href="#avatar_modal" role="button"><img class="rounded-circle" width="38" height="38" src="{{asset(\Illuminate\Support\Facades\Auth::user()->Image)}}"></a>
                        </div>

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
                <ul class="nav nav-sidebar" data-nav-type="accordion" style="height: 435px !important ;">
                    <!-- Main -->
                    <li class="nav-item">
                        <a href="{{route('Visitor.index')}}" class="nav-link @if(Request::is('index*')) active @endif">
                            <i class="fa fa-home"></i>
                            <span>
										Profile
                                </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Visitor.VisitHistory')}}" class="nav-link @if(Request::is('*History*')) active @endif"><i class="fa fas fa-history"></i> <span>{{__('message.Visit')}} {{__('message.History')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Visitor.Payment')}}" class="nav-link @if(Request::is('*Payment*')) active @endif"><i class="fa fab fa-paypal"></i> <span>{{__('message.Entrance')}} {{__('message.Payment')}}</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Visitor.Contact')}}" class="nav-link @if(Request::is('*Contact*')) active @endif   "><i class="fa fa-phone"></i> <span>{{__('message.ContactSupportTeam')}}</span></a>
                    </li>

                    <li class="nav-item text-center mt-md-5">
                        <a href="/Exhibition/" class="" target="_blank"><span class="btn btn-success btn-lg">Enter Exhibition</span></a>
                    </li>
                    <!-- /main -->
                </ul>
            </div>
            <!-- /main navigation -->

        </div>
    </div>







