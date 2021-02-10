@extends('layouts.app')
@section('content')

    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-md-4">
               <h3>Conference Abstract</h3>
                <p>
{{$conference->abstract}}
                </p>
            </div>
            <div class="col-md-8 p-2" style="background-color:#d0d0d0;height: 768px !important;">
                <div class="row">
                    <div class="col-md-6">
                        <h3>About Speakers</h3>


                        @foreach(\App\Speaker::where('cid', $conference->crid)->get() as $speaker)

                            <h5>

                            <img src="{{$speaker->avatar}}" alt="" style="width: 40px;height: 40px;border-radius: 50%;margin-right: 10px;">{{$speaker->Name}}

                                <a href="{{$speaker->pdf}}">

                                    <i class="fa fa-file-pdf-o text-danger"></i>

                                </a>

                        </h5>





                        <p>
{{$speaker->abstract}}
                        </p>

                            <hr>

                        @endforeach








                    </div>
                    <div class="col-md-6">

                        <div class="row">
                            <div style="position: absolute;bottom: 0px;right: 0px;" class="w-100">


                                @if(\Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($conference->start_date)->format('Y-m-d')  &&  \Carbon\Carbon::now()->format('H:i') >=  \Carbon\Carbon::parse($conference->start_time)->format('H:i')  &&  \Carbon\Carbon::parse($conference->end_time)->format('H:i') >= \Carbon\Carbon::now()->format('H:i') )

                                    <div class="col-md-12 text-center">



                                        <a href="{{route('join-webinar', $conference->id)}}" class="btn btn-success w-75">
                                            Join
                                            <i class="fa fa-bullhorn"></i>
                                        </a>


                                    </div>

                                @elseif ($conference->recorded_video != null)

                                    <div class="col-md-12 text-center">
                                        <a href="{{$conference->recorded_video}}" class="btn btn-primary w-75 mb-md-2">
                                            Recorded Video
                                            <i class="fa fa-film"></i>
                                        </a>
                                    </div>


                                @else



                                    <div class="col-md-12 text-center">



                                        <a href="" class="btn btn-dark w-75">
                                            No started yet
                                            <i class="fa fa-hourglass"></i>

                                        </a>

                                    </div>






                                @endif






                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
