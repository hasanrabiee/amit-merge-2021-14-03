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
                                        <form action="{{route('ExhibitorOperator.UpdateAvatar')}}" method="post"
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
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


{{--    Hasan start here !!!--}}





    <body style="background: url('{{\App\Site::ExhibitorBackground()}}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        height: 100%;
        ;">




    @include("Sidebars.exhibitor-sidebar")







    <!-- Main content -->







        <!-- Main content -->
        <div class="content-wrapper" style="overflow-x: hidden">

            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-xl-12">
                        <!-- Traffic sources -->
                        <div class="card p-3" style="background-color:rgba(54,54,54,0.65);color: white">
                            <div class="card-body py-0">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-hover table-light text-center">
                                            <thead>
                                            <th>
                                                Number of Booth Visits
                                            </th>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>{{\App\Statistics::where('BoothID' , $Booth->id)->count()}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6 mt-2 mt-md-5">


                                        <p>{{__('message.NumberofBoothVisitsByProfession')}}</p>
                                        <div class="bg-white">
                                            <div class="chartjs-size-monitor">
                                                <div class="chartjs-size-monitor-expand">
                                                    <div class=""></div>
                                                </div>
                                                <div class="chartjs-size-monitor-shrink">
                                                    <div class=""></div>
                                                </div>
                                            </div>
                                            <canvas id="chart-area-Profession" width="440" height="220" class="chartjs-render-monitor"
                                                    style="display: block; width: 440px; height: 220px;"></canvas>
                                        </div>



                                    </div>
                                    <div class="col-md-6 mt-2 mt-md-5">
                                            <p>{{__('message.NumberofBoothVisitsPerDay')}}</p>
                                            <div style="margin-bottom: 28px;margin-top: -10px;" class="bg-white">
                                                <div class="chartjs-size-monitor">
                                                    <div class="chartjs-size-monitor-expand">
                                                        <div class=""></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink">
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                                <canvas id="chart-area" width="440" height="220" class="chartjs-render-monitor"
                                                        style="display: block; width: 440px; height: 220px;"></canvas>
                                            </div>
                                    </div>
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
    <!-- /page content -->
    </body>



@endsection


@section('js')
    <script>


        var barChartData = {
            labels: [
                @foreach($Profession as $profession)
                    '{{$profession->Profession}}',
                @endforeach
            ],
            datasets: [{
                label: '{{__('message.Profession')}}',
                backgroundColor: [
                    '#4dc9f6',
                    '#f67019',
                    '#f53794',
                    '#537bc4',
                    '#acc236',
                    '#166a8f',
                    '#00a950',
                    '#58595b',
                    '#8549ba'],
                borderColor: '#ff0000',
                borderWidth: 1,
                data: [
                    @foreach($Profession as $profession)
                        '{{$profession->views}}',
                    @endforeach
                ]
            }]
        };


        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        @foreach($Statistic as $item)
                        {{$item->views}},
                        @endforeach
                    ],
                    backgroundColor: [
                        '#4dc9f6',
                        '#f67019',
                        '#f53794',
                        '#537bc4',
                        '#acc236',
                        '#166a8f',
                        '#00a950',
                        '#58595b',
                        '#8549ba'
                    ],
                    label: 'Visit Per Day'
                }],
                labels: [
                    @foreach($Statistic as $item)
                        '{{\Carbon\Carbon::parse($item->date)->format('M-d')}}',
                    @endforeach
                ]
            },
            options: {
                responsive: true
            }
        };
        window.onload = function () {
            var ctx = document.getElementById('chart-area').getContext('2d');
            window.myPie = new Chart(ctx, config);
            var ctxx = document.getElementById('chart-area-Profession').getContext('2d');
            window.myBar = new Chart(ctxx, {
                type: 'bar',
                data: barChartData,
                options: {
                    responsive: true,
                    legend: {
                        position: 'top',
                    }
                }
            });
        };


    </script>
@endsection
