@extends('layouts.main')


@section('nav')
<a class="nav-item" href="{{url('/home')}}">Home</a>
<a class="nav-item" href="{{url('/profile')}}">Profile</a>
<div>
    <a class="nav-item nav-dropdown" href="#">Insights</a>
    <div class="dropdown-items">
        <li><a class="nav-item" href="{{url('/insights/blog')}}">Blog</a></li>
        <li><a class="nav-item" href="{{url('/insights/news')}}">News</a></li>
    </div>
</div>
<div>
    <a class="nav-item nav-dropdown" href="#">Solution</a>
    <div class="dropdown-items">
        <p>Offering a wide range of services, it provides high quality, cost savings, and lightning-fast project
            delivery times that meet the specialize needs of its clients.</p>
        <div>
            <li>
                <form action="{{url('solution/detail')}}">
                    <input type="text" name="t" value="1" hidden>
                    <button class="nav-item">~ Enterprise Network Infrastructure</button>
                </form>
            </li>
            <li>
                <form action="{{url('solution/detail')}}">
                    <input type="text" name="t" value="2" hidden>
                    <button class="nav-item">~ Data center & Cloud</button>
                </form>
            </li>
            <li>
                <form action="{{url('solution/detail')}}">
                    <input type="text" name="t" value="3" hidden>
                    <button class="nav-item">~ Cyber Security</button>
                </form>
            </li>
            <li>
                <form action="{{url('solution/detail')}}">
                    <input type="text" name="t" value="4" hidden>
                    <button class="nav-item">~ Collaboration & Facility</button>
                </form>
            </li>
        </div>
    </div>
</div>
<a class="nav-item" href="{{url('/campaign')}}">Campaign</a>
<a class="nav-item" href="{{url('/partnership')}}">Partnership</a>
<a class="nav-item" href="{{url('/customer')}}">Customer</a>
<a class="nav-active" href="{{url('/career')}}">Career</a>
<a class="nav-item" href="{{url('/Quotation')}}">Quotation</a>
@endsection

@section('content')
<style>
    .floating-button {
        display: none;
    }

</style>
<div class="container request-header">
    <p class="fw-semibold text-center  mb-0">Join Our Company</p>
    <p class="text-center">Tell everyone that you can do it!!</p>

    <div class="form-request col-md-6">
        <form action="{{url('join/send')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name</label>
            <input required type="text" name="name" class="form-control">

            <label for="">Email</label>
            <input required type="email" name="email" class="form-control">

            <label for="">Your CV</label>
            <input required type="file" name="cv" class="form-control">

            <label for="">Job</label>
            <input type="text" value="{{$data->position}}" disabled class="form-control">
            <input type="number" name="id_job" value="{{$data->id}}" hidden>

            <div class="mt-3 text-end">
                <button class="btn btn-success">Send</button>
            </div>
        </form>
    </div>
</div>
@endsection
