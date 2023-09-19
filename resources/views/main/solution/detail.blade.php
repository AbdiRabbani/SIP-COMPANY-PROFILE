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
<?php use App\Customer ?>
<?php use App\ProjectReference ?>
<style>
    .nav-link {
        color: grey;
    }

    .nav-pills {
        border-bottom: none;
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
        @foreach($product as $row)
        <li class="nav-item" role="presentation">
            <button class="nav-link fw-semibold" id="{{$row->id}}-tab" data-bs-toggle="tab"
                data-bs-target="#{{$row->id}}-tab-pane" type="button" role="tab" aria-controls="{{$row->id}}-tab-pane"
                aria-selected="true" onClick="blogData({{$row->id}})">{{$row->name}}</button>
        </li>
        @endforeach
    </ul>

    <div class="tab-content" id="myTabContent">
        @foreach($product as $row)
        <div class="tab-pane fade" id="{{$row->id}}-tab-pane" role="tabpanel" aria-labelledby="{{$row->id}}-tab"
            tabindex="0">
            <p class="fs-6">Partnership</p>
            <div class="card card-body gap-2" style="flex-direction: row; overflow: scroll;">
                <?php $partnership = Partnership::where('id_category', $row->id)->where('level', 'Expert')->get()->all() ?>
                @foreach($partnership as $partner)
                <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                    src="{{asset('storage/images/' .$partner->image)}}" alt="">
                @endforeach
            </div>

            <div class="card card-body gap-2 mt-2" style="flex-direction: row; overflow: scroll;">
                <?php $partnership = Partnership::where('id_category', $row->id)->where('level', '!=', 'Expert')->get()->all() ?>
                @foreach($partnership as $partner)
                <img style="height: 65px; width: 130px; object-fit: contain" class="rounded shadow p-2"
                    src="{{asset('storage/images/' .$partner->image)}}" alt="">
                @endforeach
            </div>

            <p class="fs-6 mt-4">Customer</p>
            <ul class="nav nav-underline" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="fsi{{$row->id}}-tab" data-bs-toggle="pill" data-bs-target="#fsi{{$row->id}}"
                        type="button" role="tab" aria-controls="fsi{{$row->id}}" aria-selected="true">FSI and Banking</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="goverment{{$row->id}}-tab" data-bs-toggle="pill" data-bs-target="#goverment{{$row->id}}"
                        type="button" role="tab" aria-controls="goverment{{$row->id}}" aria-selected="true">Government</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="manufacturing{{$row->id}}-tab" data-bs-toggle="pill"
                        data-bs-target="#manufacturing{{$row->id}}" type="button" role="tab" aria-controls="manufacturing{{$row->id}}"
                        aria-selected="true">Manufacturing</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="telco{{$row->id}}-tab" data-bs-toggle="pill" data-bs-target="#telco{{$row->id}}" type="button"
                        role="tab" aria-controls="telco{{$row->id}}" aria-selected="true">Telco & Service</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="retail{{$row->id}}-tab" data-bs-toggle="pill" data-bs-target="#retail{{$row->id}}"
                        type="button" role="tab" aria-controls="retail{{$row->id}}" aria-selected="true">Retail</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="education{{$row->id}}-tab" data-bs-toggle="pill" data-bs-target="#education{{$row->id}}"
                        type="button" role="tab" aria-controls="education{{$row->id}}" aria-selected="true">Education</button>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="fsi{{$row->id}}" role="tabpanel" aria-labelledby="fsi{{$row->id}}-tab" tabindex="0">
                    <p class="">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        <?php $project1 = ProjectReference::where('id_product', $row->id)->where('type', 1)->get()->first(); ?>
                        @if($project1)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project1->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project1->desc}}</p>
                        @endif
                    </div>
                    <div class="card card-body gap-2 mt-2" style="flex-direction: row; overflow: scroll;">
                        <?php $fsi = Customer::where('id_product', $row->id)->where('type', 1)->get()->all(); ?>
                        @foreach($fsi as $fsidata)
                        <img style="height: 85px; width: 165px; object-fit: contain" class="shadow rounded p-2"
                            src="{{asset('storage/images/' .$fsidata->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="goverment{{$row->id}}" role="tabpanel" aria-labelledby="goverment{{$row->id}}-tab" tabindex="0">
                    <p class="">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        <?php $project2 = ProjectReference::where('id_product', $row->id)->where('type', 2)->get()->first(); ?>
                        @if($project2)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project2->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project2->desc}}</p>
                        @endif
                    </div>
                    <div class="card card-body gap-2 mt-2" style="flex-direction: row; overflow: scroll;">
                        <?php $government = Customer::where('id_product', $row->id)->where('type', 2)->get()->all(); ?>
                        @foreach($government as $governmentdata)
                        <img style="height: 85px; width: 165px; object-fit: contain" class="shadow rounded p-2"
                            src="{{asset('storage/images/' .$governmentdata->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="manufacturing{{$row->id}}" role="tabpanel" aria-labelledby="manufacturing{{$row->id}}-tab"
                    tabindex="0">
                    <p class="">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        <?php $project3 = ProjectReference::where('id_product', $row->id)->where('type', 3)->get()->first(); ?>
                        @if($project3)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project3->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project3->desc}}</p>
                        @endif
                    </div>
                    <div class="card card-body gap-2 mt-2" style="flex-direction: row; overflow: scroll;">
                        <?php $manufacturing = Customer::where('id_product', $row->id)->where('type', 3)->get()->all(); ?>
                        @foreach($manufacturing as $manufacturingdata)
                        <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{asset('storage/images/' .$manufacturingdata->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="telco{{$row->id}}" role="tabpanel" aria-labelledby="telco{{$row->id}}-tab" tabindex="0">
                    <p class="">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        <?php $project4 = ProjectReference::where('id_product', $row->id)->where('type', 4)->get()->first(); ?>
                        @if($project4)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project4->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project4->desc}}</p>
                        @endif
                    </div>
                    <div class="card card-body gap-2 mt-2" style="flex-direction: row; overflow: scroll;">
                        <?php $telco = Customer::where('id_product', $row->id)->where('type', 4)->get()->all(); ?>
                        @foreach($telco as $telcodata)
                        <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{asset('storage/images/' .$telcodata->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="retail{{$row->id}}" role="tabpanel" aria-labelledby="retail{{$row->id}}-tab" tabindex="0">
                    <p class="">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        <?php $project5 = ProjectReference::where('id_product', $row->id)->where('type', 5)->get()->first(); ?>
                        @if($project5)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project5->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project5->desc}}</p>
                        @endif
                    </div>
                    <div class="card card-body gap-2 mt-2" style="flex-direction: row; overflow: scroll;">
                        <?php $retail = Customer::where('id_product', $row->id)->where('type', 5)->get()->all(); ?>
                        @foreach($retail as $retaildata)
                        <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{asset('storage/images/' .$retaildata->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="education{{$row->id}}" role="tabpanel" aria-labelledby="education{{$row->id}}-tab" tabindex="0">
                    <p class="">Project Reference</p>
                    <div class="card card-body d-flex justify-content-around flex-wrap">
                        <?php $project6 = ProjectReference::where('id_product', $row->id)->where('type', 6)->get()->first(); ?>
                        @if($project6)
                        <div class="img-partnership col-md-2 mt-3">
                            <img style="height: 85px; width: 165px; object-fit: contain"
                                src="{{asset('storage/images/' .$project6->image)}}" class="shadow rounded p-2" alt="">
                        </div>
                        <p style="text-align: justify; margin-top: 40px; font-size: 15px;">{{$project6->desc}}</p>
                        @endif
                    </div>
                    <div class="card card-body gap-2 mt-2" style="flex-direction: row; overflow: scroll;">
                        <?php $education = Customer::where('id_product', $row->id)->where('type', 6)->get()->all(); ?>
                        @foreach($education as $educationdata)
                        <img style="height: 85px; width: 165px; object-fit: contain" class="rounded shadow p-2"
                            src="{{asset('storage/images/' .$educationdata->image)}}" alt="">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-between mt-5">
        <p class="fw-semibold fs-5">Blog</p>
        <a style="color: var(--purple); text-decoration: none" href="{{url('insights/blog')}}">see all</a>
    </div>

    <div class="d-flex flex-wrap" id="blog-content">

    </div>

    <div class="d-flex flex-wrap" id="blog-all">
        @foreach($blog as $row)
        <div class="mt-4 col-md-3 d-flex justify-content-center p-2">
            <a class="card shadow my-card" style="text-decoration: none;" href="{{url('insights', $row->insights->id)}}">
                <div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">
                    <img style="width: 100%; min-height: 100%; object-fit: cover;"
                        src="{{asset('storage/images/' .$row->insights->image)}}" alt="Card image cap">
                </div>
                <p class="card-date mx-3 mb-0">{{Carbon\Carbon::parse($row->insights->created_at)->format('d M Y')}}</p>
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
    function blogData(id) {
        document.querySelector('#blog-all').setAttribute('style', 'display: none !important');
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/blog/" + id,
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
                            value.title + '</p>';;
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
                $('#blog-content').html(data);
            }
        })
    }
</script>
@endsection
