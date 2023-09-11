@extends('layouts.admin')

@section('content')
<div class="container pt-5 d-flex justify-content-center">
    <div class="table table-responsive bg-white p-4 rounded shadow col-md-8">
        <p>From : {{$data->first_name}} {{$data->last_name}}</p>
        <p>Company : {{$data->business}}</p>
        <p>Email : {{$data->email}}</p>
        <p>Phone : +62 {{$data->phone}}</p>
        <p style="text-align: justify;">Request : {{$data->request}}</p>
    </div>
</div>
@endsection
