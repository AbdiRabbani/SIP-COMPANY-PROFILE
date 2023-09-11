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
<a class="nav-active" href="{{url('/customer')}}">Customer</a>
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
    }

</style>
<div class="container">
    <div class="partnership-header">
        <p class="text-center fw-semibold">Our Customer</p>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="flex-wrap: nowrap; overflow: scroll;">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="filter-button btn-all pills-profile-tab" onClick="allData()"
                    data-bs-toggle="pill" role="tab" aria-controls="pills-profile" type="submit"
                    aria-selected="false">All</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button pills-profile-tab" onClick="data(1)" style="min-width: max-content;" data-bs-toggle="pill"
                    role="tab" aria-controls="pills-profile" type="submit" aria-selected="false">Enterprise Network
                    Infrastructure</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button pills-profile-tab" onClick="data(2)" style="min-width: max-content;" data-bs-toggle="pill"
                    role="tab" aria-controls="pills-profile" type="submit" aria-selected="false">Data center &
                    Cloud</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button pills-profile-tab" onClick="data(3)" style="min-width: max-content;" data-bs-toggle="pill"
                    role="tab" aria-controls="pills-profile" type="submit" aria-selected="false">Cyber Security</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="filter-button pills-profile-tab" onClick="data(4)" style="min-width: max-content;" data-bs-toggle="pill"
                    role="tab" aria-controls="pills-profile" type="submit" aria-selected="false">Collaboration &
                    Facility</button>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">~ FSI and Banking</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2 px-4" id="data_loop_1">

            </div>
            <p id="title-project1" class="fw-semibold"></p>
            <img style="height: 90px; width: auto;" class="rounded shadow my-3" id="img-project1" alt="">
            <p style="text-align: justify;" id="text-project1"></p>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">~ Government</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2 px-4" id="data_loop_2">

            </div>
            <p id="title-project2" class="fw-semibold"></p>
            <img style="height: 90px; width: auto;" class="rounded shadow my-3" id="img-project2" alt="">
            <p style="text-align: justify;" id="text-project2"></p>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">~ Manufacturing</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2 px-4" id="data_loop_3">

            </div>
            <p id="title-project3" class="fw-semibold"></p>
            <img style="height: 90px; width: auto;" class="rounded shadow my-3" id="img-project3" alt="">
            <p style="text-align: justify;" id="text-project3"></p>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">~ Telco & Service Provider</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2 px-4" id="data_loop_4">

            </div>
            <p id="title-project4" class="fw-semibold"></p>
            <img style="height: 90px; width: auto;" class="rounded shadow my-3" id="img-project4" alt="">
            <p style="text-align: justify;" id="text-project4"></p>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">~ Retail</p>
            <div class="d-flex row col-md-12 flex-wrap gap-2 my-2" id="data_loop_5">

            </div>
            <p id="title-project5" class="fw-semibold"></p>
            <img style="height: 90px; width: auto;" class="rounded shadow my-3" id="img-project5" alt="">
            <p style="text-align: justify;" id="text-project5"></p>
        </div>
        <div class="mt-4">
            <p class="fs-5 fw-semibold px-3">~ Education</p>
            <div class=" d-flex row col-md-12 flex-wrap gap-2 my-2 px-4" id="data_loop_6">

            </div>
            <p id="title-project6" class="fw-semibold"></p>
            <img style="height: 90px; width: auto;" class="rounded shadow my-3" id="img-project6" alt="">
            <p style="text-align: justify;" id="text-project6"></p>
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
            url: "/customer/data/" + id,
            success: function (response) {
                var data_1 = "";
                var data_2 = "";
                var data_3 = "";
                var data_4 = "";
                var data_5 = "";
                var data_6 = "";

                $.each(response, function (key, value) {
                    if (key == 1) {
                        $.each(value, function (index, user) {
                            data_1 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 2) {
                        $.each(value, function (index, user) {
                            data_2 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 3) {
                        $.each(value, function (index, user) {
                            data_3 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 4) {
                        $.each(value, function (index, user) {
                            data_4 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 5) {
                        $.each(value, function (index, user) {
                            data_5 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 6) {
                        $.each(value, function (index, user) {
                            data_6 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    }
                });
                $('#data_loop_1').html(data_1);
                $('#data_loop_2').html(data_2);
                $('#data_loop_3').html(data_3);
                $('#data_loop_4').html(data_4);
                $('#data_loop_5').html(data_5);
                $('#data_loop_6').html(data_6);

                if (response.p1) {
                    document.querySelector('#title-project1').innerText = "Project Reference"
                    document.querySelector('#text-project1').innerText = response.p1.desc
                    document.querySelector('#img-project1').src = "storage/images/" + response.p1.image
                } else {
                    document.querySelector('#title-project1').innerText = ""
                    document.querySelector('#text-project1').innerText = ""
                    document.querySelector('#img-project1').src = ""
                }

                if (response.p2) {
                    document.querySelector('#title-project2').innerText = "Project Reference"
                    document.querySelector('#text-project2').innerText = response.p2.desc
                    document.querySelector('#img-project2').src = "storage/images/" + response.p2.image
                } else {
                    document.querySelector('#title-project2').innerText = ""
                    document.querySelector('#text-project2').innerText = ""
                    document.querySelector('#img-project2').src = ""
                }

                if (response.p3) {
                    document.querySelector('#title-project3').innerText = "Project Reference"
                    document.querySelector('#text-project3').innerText = response.p3.desc
                    document.querySelector('#img-project3').src = "storage/images/" + response.p3.image
                } else {
                    document.querySelector('#title-project3').innerText = ""
                    document.querySelector('#text-project3').innerText = ""
                    document.querySelector('#img-project3').src = ""
                }

                if (response.p4) {
                    document.querySelector('#title-project4').innerText = "Project Reference"
                    document.querySelector('#text-project4').innerText = response.p4.desc
                    document.querySelector('#img-project4').src = "storage/images/" + response.p4.image
                } else {
                    document.querySelector('#title-project4').innerText = ""
                    document.querySelector('#text-project4').innerText = ""
                    document.querySelector('#img-project4').src = ""
                }

                if (response.p5) {
                    document.querySelector('#title-project5').innerText = "Project Reference"
                    document.querySelector('#text-project5').innerText = response.p5.desc
                    document.querySelector('#img-project5').src = "storage/images/" + response.p5.image
                } else {
                    document.querySelector('#title-project5').innerText = ""
                    document.querySelector('#text-project5').innerText = ""
                    document.querySelector('#img-project5').src = ""
                }

                if (response.p6) {
                    document.querySelector('#title-project6').innerText = "Project Reference"
                    document.querySelector('#text-project6').innerText = response.p6.desc
                    document.querySelector('#img-project6').src = "storage/images/" + response.p6.image
                } else {
                    document.querySelector('#title-project6').innerText = ""
                    document.querySelector('#text-project6').innerText = ""
                    document.querySelector('#img-project6').src = ""
                }
            }
        });
    };

    function allData() {
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/customer/alldata",
            success: function (response) {
                var data_1 = "";
                var data_2 = "";
                var data_3 = "";
                var data_4 = "";
                var data_5 = "";
                var data_6 = "";

                $.each(response, function (key, value) {
                    if (key == 1) {
                        $.each(value, function (index, user) {
                            data_1 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 2) {
                        $.each(value, function (index, user) {
                            data_2 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 3) {
                        $.each(value, function (index, user) {
                            data_3 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 4) {
                        $.each(value, function (index, user) {
                            data_4 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 5) {
                        $.each(value, function (index, user) {
                            data_5 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    } else if (key == 6) {
                        $.each(value, function (index, user) {
                            data_6 += '<img src="/storage/images/' + user.image +
                                '" alt="" class="shadow rounded" style="height: 90px; width: auto;">';
                        });
                    }

                });
                $('#data_loop_1').html(data_1);
                $('#data_loop_2').html(data_2);
                $('#data_loop_3').html(data_3);
                $('#data_loop_4').html(data_4);
                $('#data_loop_5').html(data_5);
                $('#data_loop_6').html(data_6);

                document.querySelector('#title-project1').innerText = ""
                document.querySelector('#text-project1').innerText = ""
                document.querySelector('#img-project1').src = ""

                document.querySelector('#title-project2').innerText = ""
                document.querySelector('#text-project2').innerText = ""
                document.querySelector('#img-project2').src = ""

                document.querySelector('#title-project3').innerText = ""
                document.querySelector('#text-project3').innerText = ""
                document.querySelector('#img-project3').src = ""

                document.querySelector('#title-project4').innerText = ""
                document.querySelector('#text-project4').innerText = ""
                document.querySelector('#img-project4').src = ""

                document.querySelector('#title-project5').innerText = ""
                document.querySelector('#text-project5').innerText = ""
                document.querySelector('#img-project5').src = ""

                document.querySelector('#title-project6').innerText = ""
                document.querySelector('#text-project6').innerText = ""
                document.querySelector('#img-project6').src = ""
            }
        })
    };

</script>
@endsection
