@extends('layouts.main')

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
                <div class="mt-4 col-md-3 d-flex justify-content-center p-2" data-aos="fade-up">
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
