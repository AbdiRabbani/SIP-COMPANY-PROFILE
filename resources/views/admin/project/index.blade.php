@extends('layouts.admin')

@section('content')
<style>
    .item {
        text-decoration: none;
        color: black;
        transition: 0.5s;
        background-color: white;
        border: 1px solid #414141;
    }

    .item:hover {
        transform: scale(1.1);
        color: white;
    }

    .item:nth-child(1):hover {
        background-color: #7650e5;
    }

    .item:nth-child(2):hover {
        background-color: #ffbc00;
    }

    .item:nth-child(3):hover {
        background-color: #cc70d8;
    }

    .item:nth-child(4):hover {
        background-color: #70d87a;
    }
</style>
<div class="container d-flex flex-wrap gap-3 justify-content-around" style="padding-top: 100px;">
    <a href="{{url('/admin/project-reference/1')}}" class="p-5 fs-5 rounded item col-md-4">Enterprise Network Infrastructure</a>
    <a href="{{url('/admin/project-reference/2')}}" class="p-5 fs-5 rounded item col-md-4">Data Center & Cloud</a>
    <a href="{{url('/admin/project-reference/3')}}" class="p-5 fs-5 rounded item col-md-4">Cyber Security</a>
    <a href="{{url('/admin/project-reference/4')}}" class="p-5 fs-5 rounded item col-md-4">Collaboration</a>
</div>
@endsection