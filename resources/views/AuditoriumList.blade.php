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
                        <th>Date</th>
                        <th>Speaker Name</th>
                        <th>Title</th>
                        <th>Time</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($List as $item)
                        <tr>
                            <td>{{$item->Day}}</td>
                            <td>{{\App\Speaker::find($item->SpeakerID)->Name}}</td>
                            <td>{{\App\Speaker::find($item->SpeakerID)->SpeechTitle}}</td>
                            <td>{{\Carbon\Carbon::parse($item->Start)->format('H:i')}} - {{\Carbon\Carbon::parse($item->End)->format('H:i')}}</td>

                            <td>




                                @if(\Carbon\Carbon::now()->format('Y-m-d') == $item->Day && \Carbon\Carbon::now()->format('H:i') >=  \Carbon\Carbon::parse($item->Start)->format('H:i')  &&  \Carbon\Carbon::parse($item->End)->format('H:i') >= \Carbon\Carbon::now()->format('H:i') )
                                    <a class="btn btn-success btn-block" role="button"
                                       href="{{route('AuditoriumPlay',$item->id)  }}">Join</a>
                                @else
                                    <a class="btn btn-dark btn-block" role="button" disabled="">No Action</a>
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
