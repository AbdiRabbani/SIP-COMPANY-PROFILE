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
<a class="nav-active" href="{{url('/campaign')}}">Campaign</a>
<a class="nav-item" href="{{url('/partnership')}}">Partnership</a>
<a class="nav-item" href="{{url('/customer')}}">Customer</a>
<a class="nav-item" href="{{url('/career')}}">Career</a>
<a class="nav-item" href="{{url('/quotation')}}">Quotation</a>
@endsection

@section('content')
<div class="container" style="margin-top: 100px;">
    <p class="text-center fw-semibold" style="font-size: 48px">Campaign <span style="color: var(--red);">"<img
                src="{{asset('custom/icon/ic_campaign.png')}}" alt="">"</span></p>
    <div class="mt-5">
        <div>
            <p class="fs-5 fw-semibold">New <span style="color: var(--red);">*</span></p>
            <div class="campaign-card">
                @foreach($new_data as $row)
                <a class="card shadow my-card-2 mt-4" style="text-decoration: none; min-width: 400px; max-width: 400px;"
                    href="{{url('campaign', $row->id)}}">
                    <img class="card-img-top rounded" src="{{asset('storage/images/' .$row->image)}}"
                        alt="Card image cap">
                    <p class="card-date mx-3 mb-0">{{Carbon\Carbon::parse($row->created_at)->format('d M Y')}}</p>
                    <div class="card-body">
                        <p class="card-title fw-semibold"
                            style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;"
                            1>{{$row->title}}</p>
                        <p class="card-text mt-2 px-4 py-2 rounded shadow">See Detail --></p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        <div class="mt-5">
            <p class="fs-5 fw-semibold">Campaign</p>
            <div class="d-flex flex-wrap">
                @foreach($data as $row)
                <div class="mt-4 col-md-3 d-flex justify-content-center p-2">
                    <a class="card shadow my-card" style="text-decoration: none;" href="{{url('campaign', $row->id)}}">
                        <div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">
                            <img style="width: 100%; min-height: 100%; object-fit: cover;"
                                src="{{asset('storage/images/' .$row->image)}}" alt="Card image cap">
                        </div>
                        <p class="card-date mx-3 mb-0">{{Carbon\Carbon::parse($row->created_at)->format('d M Y')}}
                        </p>
                        <div class="card-body">
                            <p class="card-title fw-semibold"
                                style="overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">
                                {{$row->title}}</p>
                            <p class="card-text mt-2 px-4 py-2 rounded shadow">See Detail --></p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
