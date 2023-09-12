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
    <a class="nav-active nav-dropdown" href="#">Solution</a>
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
<?php use App\Partnership ?>
<?php use App\ProjectReference ?>
<style>
    .nav-link {
        color: grey;
    }

    .nav-link:hover {
        color: grey;
    }

    .carousel-control-prev {
        justify-content: left;
    }

    .carousel-control-next {
        justify-content: right;
    }

    .active {
        color: black;
    }

</style>
<div class="solution-detail-header" style="background-color: #EAF1F6;">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">
        <img src="{{asset($image)}}" alt="">
        <p class="fw-semibold mb-0">{{$title}}</p>
    </div>
</div>
<div class="solution-detail-content container">
    <p>{{$desc}}</p>

    <ul class="nav nav-underline" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active fw-semibold" id="product-tab" data-bs-toggle="tab"
                data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane"
                aria-selected="true">Product</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold" id="customer-tab" data-bs-toggle="tab"
                data-bs-target="#customer-tab-pane" type="button" role="tab" aria-controls="customer-tab-pane"
                aria-selected="false ">Customer</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab"
            tabindex="0">
            <ul class="ps-3">
                @foreach($product as $row)
                <li>
                    <p class="solution-about" data-bs-toggle="collapse" data-bs-target="#collapse{{$row->id}}"
                        aria-expanded="false" aria-controls="collapse{{$row->id}}">{{$row->name}}</p>
                </li>
                <div class="collapse" id="collapse{{$row->id}}">
                    <p class="fs-6">Partnership</p>
                    <div class="card card-body gap-2" style="flex-direction: row;">
                        <?php $partnership = Partnership::where('id_category', $row->id)->get()->all() ?>
                        @foreach($partnership as $partner)
                            <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2" src="{{asset('storage/images/' .$partner->image)}}"
                                alt="">
                        @endforeach
                    </div>
                </div>
                @endforeach
            </ul>
        </div>
        <div class="tab-pane fade" id="customer-tab-pane" role="tabpanel" aria-labelledby="customer-tab" tabindex="0">
            <ul class="ps-3">
                <li>
                    <p class="solution-about" data-bs-toggle="collapse" data-bs-target="#collapsefsi"
                        aria-expanded="false" aria-controls="collapsefsi">FSI and Banking</p>
                </li>
                <div class="collapse" id="collapsefsi">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll;">
                        @foreach($fsi as $row)
                        <img style="height: 85px; width: 165px; object-fit: contain" class="shadow rounded p-2"
                            src="{{asset('storage/images/' .$row->image)}}" alt="">
                        @endforeach
                    </div>
                    <p class="mt-3">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        @if($project1)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project1->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px;">{{$project1->desc}}</p>
                        @endif
                    </div>
                </div>

                <li>
                    <p class="solution-about" data-bs-toggle="collapse" data-bs-target="#collapseGroverment"
                        aria-expanded="false" aria-controls="collapseGroverment">Government</p>
                </li>
                <div class="collapse" id="collapseGroverment">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll;">
                        @foreach($government as $row)
                            <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2" src="{{asset('storage/images/' .$row->image)}}"
                                alt="">
                        @endforeach
                    </div>
                    <p class="mt-3">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        @if($project2)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project2->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px;">{{$project2->desc}}</p>
                        @endif
                    </div>
                </div>

                <li>
                    <p class="solution-about" data-bs-toggle="collapse" data-bs-target="#collapseManufacturing"
                        aria-expanded="false" aria-controls="collapseManufacturing">Manufacturing</p>
                </li>
                <div class="collapse" id="collapseManufacturing">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll;">
                        @foreach($manufacturing as $row)
                            <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2" src="{{asset('storage/images/' .$row->image)}}"
                                alt="">
                        @endforeach
                    </div>
                    <p class="mt-3">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        @if($project3)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project3->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px;">{{$project3->desc}}</p>
                        @endif
                    </div>
                </div>

                <li>
                    <p class="solution-about" data-bs-toggle="collapse" data-bs-target="#collapseTelco"
                        aria-expanded="false" aria-controls="collapseTelco">Telco & Service</p>
                </li>
                <div class="collapse" id="collapseTelco">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll;">
                        @foreach($telco as $row)
                            <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2" src="{{asset('storage/images/' .$row->image)}}"
                                alt="">
                        @endforeach
                    </div>
                    <p class="mt-3">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        @if($project4)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project4->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px;">{{$project4->desc}}</p>
                        @endif
                    </div>
                </div>

                <li>
                    <p class="solution-about" data-bs-toggle="collapse" data-bs-target="#collapseRetail"
                        aria-expanded="false" aria-controls="collapseRetail">Retail</p>
                </li>
                <div class="collapse" id="collapseRetail">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll;">
                        @foreach($retail as $row)
                            <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2" src="{{asset('storage/images/' .$row->image)}}"
                                alt="">
                        @endforeach
                    </div>
                    <p class="mt-3">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        @if($project5)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project5->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px;">{{$project5->desc}}</p>
                        @endif
                    </div>
                </div>

                <li>
                    <p class="solution-about" data-bs-toggle="collapse" data-bs-target="#collapseEducation"
                        aria-expanded="false" aria-controls="collapseEducation">Education</p>
                </li>
                <div class="collapse" id="collapseEducation">
                    <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll;">
                        @foreach($education as $row)
                            <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2" src="{{asset('storage/images/' .$row->image)}}"
                                alt="">
                        @endforeach
                    </div>
                    <p class="mt-3">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        @if($project6)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project6->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px;">{{$project6->desc}}</p>
                        @endif
                    </div>
                </div>
            </ul>
        </div>
    </div>


    <div class="d-flex justify-content-between mt-5">
        <p class="fw-semibold fs-5">Blog</p>
        <a style="color: var(--purple); text-decoration: none" href="{{url('insights/blog')}}">see all</a>
    </div>

    <div class="d-flex flex-wrap">
        @foreach($insight as $row)
        <div class="mt-4 col-md-3 d-flex justify-content-center p-2">
            <a class="card shadow my-card" style="text-decoration: none;"
                href="{{url('insights', $row->insights->id)}}">
                <div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">
                    <img style="width: 100%; min-height: 100%; object-fit: cover;"
                        src="{{asset('storage/images/' .$row->insights->image)}}" alt="Card image cap">
                </div>
                <p class="card-date mx-3 mb-0">
                    {{Carbon\Carbon::parse($row->insights->created_at)->format('d M Y')}}
                </p>
                <div class="card-body">
                    <p class="card-title fw-semibold"
                        style="  overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">
                        {{$row->insights->title}}</p>
                    <p class="card-text mt-2 px-4 py-2 rounded shadow">See Detail --></p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<div class="reach-us my-5">
    <div class="container px-2">
        <p class="fs-6 fw-semibold ">Learn more about how we can help you</p>
        <a class="fs-6 fw-semibold" href="{{url('quotation')}}">REACH US</a>
    </div>
</div>
<div class="container">
    <div class="mt-5">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist" style="overflow: scroll; flex-wrap: nowrap;">
                <button style="min-width: max-content;" class="nav-link active" id="nav-consultant-tab"
                    data-bs-toggle="tab" data-bs-target="#nav-consultant" type="button" role="tab"
                    aria-controls="nav-consultant" aria-selected="true">Consultant</button>
                <button style="min-width: max-content;" class="nav-link" id="nav-delivery-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-delivery" type="button" role="tab" aria-controls="nav-delivery"
                    aria-selected="false">Delivery</button>
                <button style="min-width: max-content;" class="nav-link" id="nav-service-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-service" type="button" role="tab" aria-controls="nav-service"
                    aria-selected="false">Managed Service</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-consultant" role="tabpanel"
                aria-labelledby="nav-consultant-tab" tabindex="0">
                <div id="carousel1" class="carousel carousel-dark slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Solution as a Service</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Service</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Assesment</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel1"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel1"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="tab-pane fade" id="nav-delivery" role="tabpanel" aria-labelledby="nav-delivery-tab"
                tabindex="0">
                <div id="carousel2" class="carousel carousel-dark slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">System Integrator</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Service Expert</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Supply Only</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel2"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel2"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-service" role="tabpanel" aria-labelledby="nav-service-tab" tabindex="0">
                <div id="carousel3" class="carousel carousel-dark slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Maintenance</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Subscription</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex gap-3 align-items-center flex-wrap">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Circle-icons-tools.svg/2048px-Circle-icons-tools.svg.png"
                                    style="width: 80px;" class="col-md-9" alt="">
                                <div class="col-md-9">
                                    <p class="text-black mb-0 fw-semibold fs-5">Rental</p>
                                    <p class="text-black mb-0" style="text-align: justify;">We'll help you
                                        decide
                                        the
                                        best measure for securing your system by patching its
                                        vulnerabilities
                                        and
                                        which
                                        framework suitable for your new server.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel3"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel3"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        setTimeout(allDetailData(), 1000);
    });

</script>
@endsection
