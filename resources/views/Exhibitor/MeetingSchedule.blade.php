@extends('layouts.Panel')

@section("Head")


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset("css/bootstrap-limitless.css")}}" rel="stylesheet" type="text/css">
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



    {{--    Hasan start Here !!!!--}}




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
                        <div class="card pc-height-visitor-meeting"
                             style="background-color:rgba(54,54,54,0.65);color: white;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <h3 class="text-dark">Dates</h3>


                                        @foreach($Days as $day)


                                            @if (\request()->input('Day') && \request()->input('Day') == $day)

                                                <a href="?Day={{$day}}"
                                                   class="btn btn-primary text-white w-100 mb-2">{{$day}}</a>

                                            @else

                                                <a href="?Day={{$day}}"
                                                   class="btn btn-outline-dark text-white w-100 mb-2">{{$day}}</a>

                                            @endif





                                        @endforeach


                                    </div>

                                    @if (\request()->input('Day'))

                                        <div class="col-md-3 mt-3 mt-md-0"
                                             style="height: 690px;border: 2px solid white;border-radius: 5px;">
                                            <p class="mt-2 mb-2">
                                                please Select Your Available Time For Meeting
                                            </p>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">


                                                        @foreach($times as $time)


                                                            @php


                                                                $date = \Carbon\Carbon::parse(\request()->input('Day') . ' ' . $time)->format('Y-m-d H:i:s');
                                                                 $meeting_exists = \App\Meeting::where('owner_id', Auth::user()->id)->where('start_time', $date)->first();


                                                            @endphp


                                                            @if ($meeting_exists != null)

                                                                <div class="col-md-6 mt-2">
                                                                    <a href="{{route('Exhibitor.MeetingDeActivateTime', ['day' => \request()->input('Day'), 'time' => $time])}}"
                                                                       class="time btn btn-success w-100">{{$time}}</a>
                                                                </div>
                                                            @else



                                                                <div class="col-md-6 mt-2">
                                                                    <a href="{{route('Exhibitor.MeetingActivateTime', ['day' => \request()->input('Day'), 'time' => $time])}}"
                                                                       class="time btn btn-dark w-100">{{$time}}</a>
                                                                </div>
                                                            @endif








                                                        @endforeach


                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                            </div>

                                        </div>



                                        <div class="col-md-7">
                                            <h4 class="mt-2 mt-md-0">Requested Visitors For Meeting</h4>
                                            <div style="height: 350px;overflow-y: auto">
                                                <table
                                                    class="table table-bordered table-striped table-hover table-light text-center">
                                                    <thead>
                                                    <th>Visitor Name</th>
                                                    <th>Requested Time</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    </thead>
                                                    <tbody>

                                                    @foreach($meeting_requests as $meet_req)


                                                        @php

                                                            $user = \App\User::find($meet_req->user_id);

                                                        @endphp

                                                        <tr >
                                                            <td ><a href="{{\request()->fullUrlWithQuery(['visitor' => $user->id])}}">{{$user->UserName}}</a></td>
                                                            <td>{{$meet_req->request_time}}</td>
                                                            <td>{{$meet_req->status}}</td>


                                                            @if ($meet_req->status == "none")

                                                                <td>
                                                                    <div class="btn-group w-100">

                                                                        <a class="btn btn-success w-100" href="{{route('Exhibitor.MeetingAccept', $meet_req->id)}}">
                                                                            Accept
                                                                        </a>
                                                                        <a class="btn btn-danger w-100" href="{{route('Exhibitor.MeetingReject', $meet_req->id)}}">
                                                                            Reject
                                                                        </a>

                                                                    </div>
                                                                </td>

                                                                @elseif ($meet_req->status == "rejected")

                                                                <td>


                                                                        <a class="btn btn-danger w-100" href="#">
                                                                            Rejected
                                                                        </a>

                                                                </td>




                                                            @elseif ($meet_req->status == "accepted")

                                                                <td>
                                                                    <div class="btn-group w-100">

                                                                        <a  class="btn btn-primary w-100" href="{{route('Exhibitor.meeting.join', $meet_req->id )}}">
                                                                            Enter Meeting
                                                                        </a>
                                                                        <a class="btn btn-danger w-100" href="{{route('Exhibitor.MeetingReject',$meet_req->id )}}">
                                                                            Reject
                                                                        </a>

                                                                    </div>
                                                                </td>
                                                            @endif


                                                        </tr>


                                                    @endforeach
                                                    {{--                                                      <tr>--}}
                                                    {{--                                                          <td><a href="">Visitor2</a></td>--}}
                                                    {{--                                                          <td>11:00</td>--}}
                                                    {{--                                                          <td>Rejected</td>--}}
                                                    {{--                                                          <td><a href="" class="btn btn-success w-100">Accept</a></td>--}}
                                                    {{--                                                      </tr>--}}
                                                    {{--                                                      <tr>--}}
                                                    {{--                                                          <td><a href="">Visitor3</a></td>--}}
                                                    {{--                                                          <td>12:00</td>--}}
                                                    {{--                                                          <td>pending</td>--}}
                                                    {{--                                                          <td>--}}
                                                    {{--                                                              <div class="btn-group w-100">--}}

                                                    {{--                                                                  <a class="btn btn-success w-100" href="">--}}
                                                    {{--                                                                      Accept--}}
                                                    {{--                                                                  </a>--}}
                                                    {{--                                                                  <a  class="btn btn-danger w-100" href="">--}}
                                                    {{--                                                                      Reject--}}
                                                    {{--                                                                  </a>--}}

                                                    {{--                                                              </div>--}}
                                                    {{--                                                          </td>--}}
                                                    {{--                                                      </tr>--}}
                                                    {{--                                                      <tr>--}}
                                                    {{--                                                          <td><a href="">Visitor4</a></td>--}}
                                                    {{--                                                          <td>10:00</td>--}}
                                                    {{--                                                          <td>Accepted</td>--}}
                                                    {{--                                                          <td>--}}

                                                    {{--                                                              <div class="btn-group w-100">--}}

                                                    {{--                                                                  <a class="btn btn-info w-100" href="">--}}
                                                    {{--                                                                      Enter to Meeting--}}
                                                    {{--                                                                  </a>--}}
                                                    {{--                                                                  <a  class="btn btn-danger w-100" href="">--}}
                                                    {{--                                                                      Reject--}}
                                                    {{--                                                                  </a>--}}

                                                    {{--                                                              </div>--}}

                                                    {{--                                                          </td>--}}
                                                    {{--                                                      </tr>--}}
                                                    {{--                                                      <tr>--}}
                                                    {{--                                                          <td><a href="">Visitor5</a></td>--}}
                                                    {{--                                                          <td>10:00</td>--}}
                                                    {{--                                                          <td>Accepted</td>--}}
                                                    {{--                                                          <td>--}}

                                                    {{--                                                              <div class="btn-group w-100">--}}

                                                    {{--                                                                  <a class="btn btn-info w-100" href="">--}}
                                                    {{--                                                                      Enter to Meeting--}}
                                                    {{--                                                                  </a>--}}
                                                    {{--                                                                  <a  class="btn btn-danger w-100" href="">--}}
                                                    {{--                                                                      Reject--}}
                                                    {{--                                                                  </a>--}}

                                                    {{--                                                              </div>--}}

                                                    {{--                                                          </td>--}}
                                                    {{--                                                      </tr>--}}
                                                    {{--                                                      <tr>--}}
                                                    {{--                                                          <td><a href="">Visitor6</a></td>--}}
                                                    {{--                                                          <td>10:00</td>--}}
                                                    {{--                                                          <td>Accepted</td>--}}
                                                    {{--                                                          <td>--}}

                                                    {{--                                                              <div class="btn-group w-100">--}}

                                                    {{--                                                                  <a class="btn btn-info w-100" href="">--}}
                                                    {{--                                                                      Enter to Meeting--}}
                                                    {{--                                                                  </a>--}}
                                                    {{--                                                                  <a  class="btn btn-danger w-100" href="">--}}
                                                    {{--                                                                      Reject--}}
                                                    {{--                                                                  </a>--}}

                                                    {{--                                                              </div>--}}

                                                    {{--                                                          </td>--}}
                                                    {{--                                                      </tr>--}}
                                                    </tbody>
                                                </table>
                                            </div>


                                            @if (isset($visitor))


                                                <div class="mt-3"
                                                     style="border: 2px solid black;border-radius: 5px;height: 288px;overflow-y: auto;overflow-x: hidden">
                                                    <h3 class="mt-2 ml-2">Visitor Information</h3>

                                                    <div class="row">
                                                        <div class="col-md-5 ml-2 mt-2">
                                                            <p><span
                                                                    style="font-weight: bolder">Firstname: </span>{{$visitor->FirstName}}
                                                            </p>
                                                            <p><span
                                                                    style="font-weight: bolder">Lastname: </span>{{$visitor->Lastname}}
                                                            </p>
                                                            <p><span
                                                                    style="font-weight: bolder">Profession: </span>{{$visitor->Profession}}
                                                            </p>
                                                            <p><span
                                                                    style="font-weight: bolder">City: </span>{{$visitor->City}}
                                                            </p>
                                                        </div>
                                                        <div class="col-md-5 ml-2 mt-2">
                                                            <p><span
                                                                    style="font-weight: bolder">Gender: </span>{{$visitor->Gender}}
                                                            </p>
                                                            <p><span
                                                                    style="font-weight: bolder">Country: </span>{{$visitor->Country}}
                                                            </p>
                                                            <p><span
                                                                    style="font-weight: bolder">BirthDate: </span>{{$visitor->BirthDate}}
                                                            </p>
                                                            <p><span
                                                                    style="font-weight: bolder">Email: </span>{{$visitor->email}}
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>

                                            @endif


                                        </div>



                                    @endif


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


        <!--/Main Content  -->
    </div>


    </div>

    <script>


        $('a[href*="MeetingActivateTime"]').click(function (e) {
            e.preventDefault();
            var link = $(this).attr('href');


            Swal.fire({
                title: 'Do you want to Activate This Meeting?',
                showDenyButton: true,
                confirmButtonText: `Active`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = link
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'success')
                }
            })


        });


        $('a[href*="MeetingDeActivate"]').click(function (e) {
            e.preventDefault();
            var link = $(this).attr('href');


            Swal.fire({
                title: 'Do you want to Deactivate This Meeting?',
                showDenyButton: true,
                confirmButtonText: `Deactive`,
                denyButtonText: `Cancel`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href = link
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'success')
                }
            })


        });


    </script>

    </body>






@endsection
