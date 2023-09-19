@extends('layouts.main')

@section('nav')
<a class="nav-item" href="{{url('/home')}}">Home</a>
<a class="nav-item" href="{{url('/profile')}}">Profile</a>
<div>
    <a class="nav-active nav-dropdown" href="#">Insights</a>
    <div class="dropdown-items">
        <li><a class="nav-active" href="{{url('/insights/blog')}}">Blog</a></li>
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
<a class="nav-item" href="{{url('/quotation')}}">Quotation</a>
@endsection

@section('content')
<style>
    .nav-pills {
        border-bottom: none;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        background-color: var(--purple);
    }

    .nav-link {
        color: var(--purple);
        box-shadow: 0px 0px 3px var(--purple);
        margin: 10px 0px;
    }

    .nav-link:hover {
        color: white;
        background: var(--purple);
    }

    .tab-content {
        margin: 20px 0px !important;
    }

</style>

<div class="container">
    <div class="partnership-header">
        <p class="text-center fw-semibold">Blog</p>
        <div class="col-ms-12 d-flex justify-content-end">
            <div class="search_insights mb-3 col-md-2">
                <input type="text" class="form-control" id="search_input" onChange="dataSearch()">
                <button href="" type="submit" style="border: none; background-color: white;" onClick="dataSearch()">
                    <img src="{{asset('custom/icon/ic_search.png')}}" alt="">
                </button>
            </div>
        </div>
        <ul class="nav nav-pills" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="filter-button btn-all pills-profile-tab" onClick="allData()"
                    data-bs-toggle="pill" role="tab" aria-controls="pills-profile" type="submit"
                    aria-selected="false">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" style="min-width: max-content;" id="network-tab" data-bs-toggle="pill"
                    data-bs-target="#network" type="button" role="tab" aria-controls="network"
                    aria-selected="false">Enterprise Network
                    Infrastructure</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button datacenter-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="datacenter" data-bs-target="#datacenter"
                    type="submit" aria-selected="false">Data center &
                    Cloud</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button cyber-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="cyber" data-bs-target="#cyber" type="submit"
                    aria-selected="false">Cyber Security</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button collaboration-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="collaboration" data-bs-target="#collaboration"
                    type="submit" aria-selected="false">Collaboration &
                    Facility</button>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="network" role="tabpanel" aria-labelledby="network-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category1 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name}}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="datacenter" role="tabpanel" aria-labelledby="datacenter-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category2 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name}}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="cyber" role="tabpanel" aria-labelledby="cyber-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category3 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name}}</button>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="collaboration" role="tabpanel" aria-labelledby="collaboration-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category4 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name}}</button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="d-flex flex-wrap" id="loop_data">
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(allData(), 1000);
    });

    function dataSearch() {
        const name = document.getElementById('search_input').value
        if (name != "") {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "/insights/search/" + name,
                success: function (response) {
                    var data = ""
                    if (response.length > 0) {
                        $.each(response, function (key, value) {
                            var createdAtDate = new Date(value.created_at);

                            // Mendapatkan tanggal, bulan, dan tahun dari objek Date
                            var day = createdAtDate.getDate();
                            var month = createdAtDate.toLocaleString('default', {
                                month: 'short'
                            });
                            var year = createdAtDate.getFullYear();

                            // Membuat tampilan tanggal dengan format "DD MMM YYYY"
                            var formattedDate = day + " " + month + " " + year;

                            data = data +
                                '<div class="mt-4 col-md-3 d-flex justify-content-center p-2">';
                            data = data +
                                '<a class="card shadow my-card" style="text-decoration: none;" href="/insights/' +
                                value.id + '">';
                            data = data +
                                '<div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">';
                            data = data +
                                '<img style="width: 100%; min-height: 100%; object-fit: cover;" src="/storage/images/' +
                                value.image + '" alt="Card image cap">';
                            data = data + '</div>';
                            data = data + '<p class="card-date mx-3 mb-0">' + formattedDate +
                                '</p>';
                            data = data + '<div class="card-body">';
                            data = data +
                                '<p class="card-title fw-semibold" style="  overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">' +
                                value.title + '</p>';
                            data = data +
                                '<p class="card-text mt-2 px-4 py-2 rounded shadow">See Detail --></p>';
                            data = data + '</div>';
                            data = data + '</a>';
                            data = data + '</div>';
                        });
                    } else {
                        data =
                            '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">Cannot find the news</p>';
                    }
                    $('#loop_data').html(data);
                }
            })
        } else {
            allData()
        }
    };

    function data(id) {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/insights/data/" + id,
            success: function (response) {
                var data = ""
                if (response.length > 0) {
                    $.each(response, function (key, value) {
                        var createdAtDate = new Date(value.created_at);

                        // Mendapatkan tanggal, bulan, dan tahun dari objek Date
                        var day = createdAtDate.getDate();
                        var month = createdAtDate.toLocaleString('default', {
                            month: 'short'
                        });
                        var year = createdAtDate.getFullYear();

                        // Membuat tampilan tanggal dengan format "DD MMM YYYY"
                        var formattedDate = day + " " + month + " " + year;
                        console.log('value');
                        data = data +
                            '<div class="mt-4 col-md-3 d-flex justify-content-center p-2">';
                        data = data +
                            '<a class="card shadow my-card" style="text-decoration: none;" href="/insights/' +
                            value.id + '">';
                        data = data +
                            '<div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">';
                        data = data +
                            '<img style="width: 100%; min-height: 100%; object-fit: cover;" src="/storage/images/' +
                            value.image + '" alt="Card image cap">';
                        data = data + '</div>';
                        data = data + '<p class="card-date mx-3 mb-0">' + formattedDate + '</p>';
                        data = data + '<div class="card-body">';
                        data = data +
                            '<p class="card-title fw-semibold" style="  overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">' +
                            value.title + '</p>';
                        data = data +
                            '<p class="card-text mt-2 px-4 py-2 rounded shadow">See Detail --></p>';
                        data = data + '</div>';
                        data = data + '</a>';
                        data = data + '</div>';
                    });
                } else {
                    data =
                        '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">Cannot find the blog</p>';
                }
                $('#loop_data').html(data);
            }
        })
    };

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/insights/data",
            success: function (response) {
                var data = ""
                if (response.length > 0) {
                    $.each(response, function (key, value) {
                        var createdAtDate = new Date(value.created_at);

                        // Mendapatkan tanggal, bulan, dan tahun dari objek Date
                        var day = createdAtDate.getDate();
                        var month = createdAtDate.toLocaleString('default', {
                            month: 'short'
                        });
                        var year = createdAtDate.getFullYear();

                        // Membuat tampilan tanggal dengan format "DD MMM YYYY"
                        var formattedDate = day + " " + month + " " + year;

                        data = data +
                            '<div class="mt-4 col-md-3 d-flex justify-content-center p-2">';
                        data = data +
                            '<a class="card shadow my-card" style="text-decoration: none;" href="/insights/' +
                            value.id + '">';
                        data = data +
                            '<div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">';
                        data = data +
                            '<img style="width: 100%; min-height: 100%; object-fit: cover;" src="/storage/images/' +
                            value.image + '" alt="Card image cap">';
                        data = data + '</div>';
                        data = data + '<p class="card-date mx-3 mb-0">' + formattedDate + '</p>';
                        data = data + '<div class="card-body">';
                        data = data +
                            '<p class="card-title fw-semibold" style="  overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">' +
                            value.title + '</p>';
                        data = data +
                            '<p class="card-text mt-2 px-4 py-2 rounded shadow">See Detail --></p>';
                        data = data + '</div>';
                        data = data + '</a>';
                        data = data + '</div>';
                    });
                } else {
                    data =
                        '<p class="rounded p-1 mt-5" style="background: var(--purple); color: white;">Cannot find the news</p>';
                }
                $('#loop_data').html(data);
            }
        })
    };

</script>
@endsection
