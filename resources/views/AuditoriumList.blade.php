@extends('layouts.app')
@section('content')
    <header class="d-flex masthead"
            style="background-image: url('{{asset('assets/img/Auditorium.png')}}');padding: 45px;padding-top: 0px;padding-right: 0px;padding-left: 0px;">
        <div class="container my-auto text-center">
            <div class="table-responsive table-bordered text-dark scroll_box"
                 style="background-color: rgba(168,168,168,0.84);height: 567px;">
                <table class="table table-bordered">
                    <thead style="background-color: rgba(168,168,168,0.84);">
                    <tr style="background-color: rgba(168,168,168,0.84);">
                        <th>Hall</th>
                        <th>Date</th>
                        <th>Speaker Name</th>
                        <th>Title</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($List as $item)
                        <tr class="@if($item->hall == 'A') bg-primary @endif" >

                            <td style="vertical-align: middle !important">
                                <h3>{{$item->hall}}</h3>
                            </td>
                            <td style="vertical-align: middle !important">{{$item->start_date}}</td>
                            <td style="vertical-align: middle !important">

                                @foreach(\App\Speaker::where('cid', $item->crid)->get() as $sp)

                                    {{$sp->Name}},


                                    @endforeach


                            </td>
                            <td style="vertical-align: middle !important">{{$item->title}}</td>
                            <td style="vertical-align: middle !important">{{\Carbon\Carbon::parse($item->start_time)->format('H:i')}} - {{\Carbon\Carbon::parse($item->end_time)->format('H:i')}}</td>

                            <td style="vertical-align: middle !important">




                                @if(\Carbon\Carbon::now()->format('Y-m-d') >= \Carbon\Carbon::parse($item->start_date)->format('Y-m-d')  && \Carbon\Carbon::now()->format('H:i') >=  \Carbon\Carbon::parse($item->start_time)->format('H:i')  &&  \Carbon\Carbon::parse($item->end_time)->format('H:i') >= \Carbon\Carbon::now()->format('H:i') )



                                    <a class="btn btn-success btn-block" role="button"
                                       href="{{route('AuditoriumPlay',$item->id)  }}">Join</a>



                                @else
                                    <a href="{{route('AuditoriumPlay',$item->id)  }}" class="btn btn-dark btn-block" role="button" disabled="">Not started yet
                                    <i class="fa fa-hourglass"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </header>
@endsection
