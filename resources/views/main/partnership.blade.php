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
<a class="nav-active" href="{{url('/partnership')}}">Partnership</a>
<a class="nav-item" href="{{url('/customer')}}">Customer</a>
<a class="nav-item" href="{{url('/career')}}">Career</a>
<a class="nav-item" href="{{url('/quotation')}}">Quotation</a>
@endsection

@section('content')
<style>
    .nav-pills {
        border-bottom: none;
    }
    
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        background-color: var(--purple);
    }
    .nav-link {
        color: var(--purple);
    }
</style>
<div class="container">
    <div class="partnership-header">
        <p class="text-center fw-semibold">Our Partnership</p>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="filter-button btn-all pills-profile-tab" onClick="allData()"
                    data-bs-toggle="pill" role="tab" aria-controls="pills-profile" type="submit"
                    aria-selected="false">All</button>
            </li>
            @foreach($category as $row)
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button pills-profile-tab" onClick="data('{{$row->id}}')"
                    data-bs-toggle="pill" role="tab" aria-controls="pills-profile" type="submit"
                    aria-selected="false" style="min-width: max-content;">{{$row->name}}</button>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="tab-content">

        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">Expert</p>
            <div class=" d-flex row col-md-12 flex-wrap px-4" id="data_loop_e">

            </div>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">Professional</p>
            <div class=" d-flex row col-md-12 flex-wrap px-4" id="data_loop_p">

            </div>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">Associate</p>
            <div class=" d-flex row col-md-12 flex-wrap px-4" id="data_loop_as">

            </div>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">Authorized</p>
            <div class=" d-flex row col-md-12 flex-wrap px-4" id="data_loop_au">

            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(allData(), 1000);
    });

    function data(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/partnership/data/" + id,
            success: function (response) {
                var data_e = "";
                var data_p = "";
                var data_as = "";
                var data_au = "";

                $.each(response, function (key, value) {
                    if (key === 'Expert') {
                        $.each(value, function (index, user) {
                            data_e += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image + '" alt="">';
                        });
                    } else if (key === 'Professional') {
                        $.each(value, function (index, user) {
                            data_p += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image + '" alt="">';
                        });
                    } else if (key === 'Associate') {
                        $.each(value, function (index, user) {
                            data_as += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image + '" alt="">';   
                        });
                    } else if (key === 'Authorized') {
                        $.each(value, function (index, user) {
                            data_au += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image + '" alt="">';
                        });
                    }
                    
                });
                $('#data_loop_e').html(data_e);
                $('#data_loop_p').html(data_p);
                $('#data_loop_as').html(data_as);
                $('#data_loop_au').html(data_au);
            }
        });
    };

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/partnership/alldata",
            success: function (response) {
                var data_e = "";
                var data_p = "";
                var data_as = "";
                var data_au = "";

                $.each(response, function (key, value) {
                    if (key === 'Expert') {
                        $.each(value, function (index, user) {
                            data_e += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image +
                                '" alt="">';
                        });
                    } else if (key === 'Professional') {
                        $.each(value, function (index, user) {
                            data_p += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image +
                                '" alt="">';
                        });
                    } else if (key === 'Associate') {
                        $.each(value, function (index, user) {
                            data_as += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image +
                                '" alt="">';
                        });
                    } else if (key === 'Authorized') {
                        $.each(value, function (index, user) {
                            data_au += '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" src="/storage/images/' + user.image +
                                '" alt="">';
                        });
                    }
                });
                $('#data_loop_e').html(data_e);
                $('#data_loop_p').html(data_p);
                $('#data_loop_as').html(data_as);
                $('#data_loop_au').html(data_au);
            }
        })
    };

</script>
@endsection
