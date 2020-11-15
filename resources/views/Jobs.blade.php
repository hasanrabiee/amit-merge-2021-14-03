@extends('layouts.app')
@section('content')
<h3 class="text-center">Company Name : {{\App\booth::find(request()->segment(2))->CompanyName}}</h3>
<h5 class="text-center">Website : <a class="remove_underline" href="{{\App\booth::find(request()->segment(2))->WebSite}}">{{\App\booth::find(request()->segment(2))->WebSite}}</a></h5>
<table class="table">
    <thead class="thead-light">
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Number</th>
        <th scope="col">Salary €</th>
    </tr>
    </thead>
    <tbody>
    @foreach($Jobs as $job)

        <tr>
            <th>{{$job->Title}}</th>
            <td>{{$job->Description}}</td>
            <td>{{$job->Number}}</td>
            <td>{{$job->Salary}} €</td>
        </tr>

    @endforeach
    </tbody>
</table>

@endsection


