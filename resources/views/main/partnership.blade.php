@extends('layouts.main')

@section('content')
<style>
    .nav-pills {
        border-bottom: none;
    }

    .nav-pills .nav-link-custom.active,
    .nav-pills .show>.nav-link-custom {
        background-color: var(--purple);
    }

    .nav-link-custom {
        color: var(--purple);
        box-shadow: 0px 0px 3px var(--purple);
        margin: 10px 0px;
    }

    .nav-link-custom:hover {
        color: white;
        background: var(--purple);
    }

    .tab-content {
        margin-top: 15px;
    }

</style>
<div class="container">
    <div class="partnership-header">
        <p class="text-center fw-semibold" style="font-family: HemiHead;">Our Partnership</p>
        <ul class="nav nav-pills" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom active" id="filter-button btn-all pills-profile-tab" onClick="allData()"
                    data-bs-toggle="pill" role="tab" aria-controls="pills-profile" type="submit"
                    aria-selected="false">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" style="min-width: max-content;" id="network-tab" data-bs-toggle="pill"
                    data-bs-target="#network" type="button" role="tab" aria-controls="network"
                    aria-selected="false">Enterprise Network
                    Infrastructure</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="filter-button datacenter-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="datacenter" data-bs-target="#datacenter" type="submit"
                    aria-selected="false">Data center &
                    Cloud</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="filter-button cyber-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="cyber" data-bs-target="#cyber" type="submit"
                    aria-selected="false">Cyber Security</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link nav-link-custom" id="filter-button collaboration-tab" style="min-width: max-content;"
                    data-bs-toggle="pill" role="tab" aria-controls="collaboration" data-bs-target="#collaboration" type="submit"
                    aria-selected="false">Collaboration &
                    Facility</button>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade" id="network" role="tabpanel" aria-labelledby="network-tab" tabindex="0">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
                @foreach($category1 as $row)
                <li class="nav-item" role="presentation">
                    <button class="nav-link nav-link-custom" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
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
                    <button class="nav-link nav-link-custom" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
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
                    <button class="nav-link nav-link-custom" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
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
                    <button class="nav-link nav-link-custom" id="filter-button" onClick="data('{{$row->id}}')" data-bs-toggle="pill"
                        role="tab" type="submit" aria-selected="false"
                        style="min-width: max-content;">{{$row->name}}</button>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3" style="font-family: HemiHead;">Seasoned</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 px-4" id="data_loop_e">

            </div>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3" style="font-family: HemiHead;">Stalwart</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 px-4" id="data_loop_p">

            </div>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3" style="font-family: HemiHead;">Trending</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 px-4" id="data_loop_as">

            </div>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3" style="font-family: HemiHead;">Featuring</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 px-4" id="data_loop_au">

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
                    if (key === 'Seasoned') {
                        $.each(value, function (index, user) {
                            data_e +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image + '" alt="">';
                        });
                    } else if (key === 'Stalwart') {
                        $.each(value, function (index, user) {
                            data_p +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image + '" alt="">';
                        });
                    } else if (key === 'Trending') {
                        $.each(value, function (index, user) {
                            data_as +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image + '" alt="">';
                        });
                    } else if (key === 'Featuring') {
                        $.each(value, function (index, user) {
                            data_au +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image + '" alt="">';
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
                    if (key === 'Seasoned') {
                        $.each(value, function (index, user) {
                            data_e +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image +
                                '" alt="">';
                        });
                    } else if (key === 'Stalwart') {
                        $.each(value, function (index, user) {
                            data_p +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image +
                                '" alt="">';
                        });
                    } else if (key === 'Trending') {
                        $.each(value, function (index, user) {
                            data_as +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image +
                                '" alt="">';
                        });
                    } else if (key === 'Featuring') {
                        $.each(value, function (index, user) {
                            data_au +=
                                '<img class="shadow rounded py-1" style="height: 85px; width: 165px; object-fit: contain" data-aos="fade-up"main src="/storage/images/' +
                                user.image +
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
