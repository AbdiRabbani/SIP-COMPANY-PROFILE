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
<a class="nav-item" href="{{url('/career')}}">Career</a>
<a class="nav-active" href="{{url('/Quotation')}}">Quotation</a>
@endsection

@section('content')
<style>
    .floating-button {
        display: none;
    }

</style>
<div class="container request-header">
    <p class="fw-semibold text-center  mb-0">Request Quotation</p>
    <p class="text-center">Tell us about your requirements and we’ll get back to you with a quote</p>

    <div class="form-request col-md-6">
        <form action="{{url('quotation/send')}}" method="post">
            @csrf
            <div class="mt-3 d-flex justify-content-between gap-1">
                <div class="col-md-5">
                    <label for="name">First Name</label>
                    <input required name="first_name" type="text" id="name" class="form-control">
                </div>
                <div class="col-md-5">
                    <label for="name">Last Name</label>
                    <input required name="last_name" type="text" id="name" class="form-control">
                </div>
            </div>
            <div class="mt-3">
                <label for="business">Business / Organization</label>
                <input required name="business" type="text" id="business" class="form-control">
            </div>
            <div class="mt-3">
                <label for="email"> Email</label>
                <input required name="email" type="mail" id="email" class="form-control">
            </div>
            <div class="mt-3">
                <label for="business">Phone</label>
                <input required name="phone" type="number" id="business" class="form-control">
            </div>
            <div class="my-3 d-flex row">
                <label for="request">Request</label>
                <textarea required name="request" id="request" rows="10" class="form-control"></textarea>
            </div>
            <div class="my-3 d-flex">
                <div class="me-1">
                    <input type="checkbox" class="quotate-check" onClick="privacy()">
                </div>
                <p for="">I agree to the <span data-bs-toggle="modal" data-bs-target="#regulation">Sinergy Informasi
                        Pratama Website Terms & Conditions of Use</span>.</p>
            </div>
            <div class="text-end">
                <button class="btn" style="color: white; background: var(--red);" id="btn-quote"
                    disabled>submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
