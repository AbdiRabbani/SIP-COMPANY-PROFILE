@extends('layouts.main')


@section('nav')
<a class="nav-active" href="{{url('/home')}}">Home</a>
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
<a class="nav-item" href="{{url('/quotation')}}">Quotation</a>
@endsection

@section('content')
<div id="home-header" class="row gx-0">
    <div class="text-white d-flex justify-content-center align-items-end fw-semibold">
        <p>Sinergy Informasi Pratama</p>
    </div>

    <div class="header-content">
        <div class="content c-a">
            <form action="{{url('solution/detail')}}">
                <input type="text" value="1" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Group 71.png')}}" alt="">
                </button>
            </form>
            <form action="{{url('solution/detail')}}">
                <input type="text" value="4" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Support.png')}}" alt="">
                </button>
            </form>
        </div>
        <div class="content c-b">
            <form action="{{url('solution/detail')}}">
                <input type="text" value="2" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Group 80.png')}}" alt="">
                </button>
            </form>
            <form action="{{url('solution/detail')}}">
                <input type="text" value="3" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Group 76.png')}}" alt="">
                </button>
            </form>
        </div>
    </div>
</div>

<div id="home-service" class="container-fluid">

    <p class="fs-5 fw-semibold">Best service you can get in SIP</p>

    <div class="col-md-10 d-flex gap-5 flex-wrap justify-content-center my-4">
        <button type="button" onclick="getServiceValue('IT SERVICES BY PROJECT & SERVICE LEVEL AGREEMENT')"
            class="btn btn-service col-md-3 service-item d-flex align-items-center p-0" data-bs-toggle="modal"
            data-bs-target="#serviceModal">
            <img src="{{asset('custom/icon/Group 108.png')}}" alt="">
            <p class="mb-0">IT SERVICES BY PROJECT & SERVICE LEVEL AGREEMENT</p>
        </button>

        <button type="button" onclick="getServiceValue('HARDWARE INTEGRATION & IMPLEMENTATION')"
            class="btn btn-service col-md-3 service-item d-flex align-items-center p-0" data-bs-toggle="modal"
            data-bs-target="#serviceModal">
            <img src="{{asset('custom/icon/Group 109.png')}}" alt="">
            <p class="mb-0">HARDWARE INTEGRATION & IMPLEMENTATION</p>
        </button>
        <button type="button" onclick="getServiceValue('24/7 SUPPORT')"
            class="btn btn-service col-md-3 service-item d-flex align-items-center p-0" data-bs-toggle="modal"
            data-bs-target="#serviceModal">
            <img src="{{asset('custom/icon/Group 110.png')}}" alt="">
            <p class="mb-0">24/7 SUPPORT</p>
        </button>
        <button type="button" onclick="getServiceValue('CABLING SYSTEM INSTALLATION')"
            class="btn btn-service col-md-3 service-item d-flex align-items-center p-0" data-bs-toggle="modal"
            data-bs-target="#serviceModal">
            <img src="{{asset('custom/icon/Group 111.png')}}" alt="">
            <p class="mb-0">CABLING SYSTEM INSTALLATION</p>
        </button>
        <button type="button" onclick="getServiceValue('APLICATION & SERVICE IMPLEMENTATION')"
            class="btn btn-service col-md-3 service-item d-flex align-items-center p-0" data-bs-toggle="modal"
            data-bs-target="#serviceModal">
            <img src="{{asset('custom/icon/Group 112.png')}}" alt="">
            <p class="mb-0">APLICATION & SERVICE IMPLEMENTATION</p>
        </button>
        <button type="button" onclick="getServiceValue('NETWORK SECURITY')"
            class="btn btn-service col-md-3 service-item d-flex align-items-center p-0" data-bs-toggle="modal"
            data-bs-target="#serviceModal">
            <img src="{{asset('custom/icon/Group 113.png')}}" alt="">
            <p class="mb-0">NETWORK SECURITY</p>
        </button>
    </div>
</div>

<!-- Service modal -->
<div class="modal fade" id="serviceModal" tabindex="-1" aria-labelledby="serviceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="text-center">
                <img src="{{asset('custom/icon/sales account.png')}}" alt=""
                    class="img-service-modal img-fluid p-2 my-3 rounded" style="width: 90px;">
                <h1 class="service-modal-title fs-5" id="serviceModalLabel">Modal title</h1>
            </div>
            <div class="d-flex justify-content-center my-3">
                <p class="service-desc col-md-10">The goal of our Sales Account Manager Team is to always be aware
                    of the specific needs of our costumers with respect to the current technical field. Our Sales
                    Department proudly consist of experienced professionals dedicated to creating anf advertising
                    services that are personalized to each client. As part of our strategy, we focus on finding the
                    most beneficial balance between const and benefit</p>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-red" style="background-color: var(--purple); color: white;"
                    data-bs-dismiss="modal">back</button>
            </div>
        </div>
    </div>
</div>

<div id="home-team" class="py-5">
    <div class="container d-flex justify-content-center">
        <p class="team-header fs-5 py-2">Our Team</p>
        <div class="team-content col-md-9">
            <button type="button" onclick="getValue('Sales Account Manager')" class="btn btn-team"
                data-bs-toggle="modal" data-bs-target="#teamModal">
                <div class="team-item text-center text-white fw-semibold">
                    <img src="{{asset('custom/icon/sales account.png')}}" alt="">
                    <p>Sales Account Manager</p>
                </div>
            </button>
            <button type="button" onclick="getValue('Project Manager')" class="btn btn-team" data-bs-toggle="modal"
                data-bs-target="#teamModal">
                <div class="team-item text-center text-white fw-semibold">
                    <img src="{{asset('custom/icon/project manager.png')}}" alt="">
                    <p>Project Manager</p>
                </div>
            </button>

            <button type="button" onclick="getValue('Professional Service')" class="btn btn-team" data-bs-toggle="modal"
                data-bs-target="#teamModal">
                <div class="team-item text-center text-white fw-semibold">
                    <img src="{{asset('custom/icon/professional service.png')}}" alt="">
                    <p>Professional Service</p>
                </div>
            </button>

            <button type="button" onclick="getValue('Maintenance and Managed Service')" class="btn btn-team"
                data-bs-toggle="modal" data-bs-target="#teamModal">
                <div class="team-item text-center text-white fw-semibold">
                    <img src="{{asset('custom/icon/maintenance and managed service.png')}}" alt="">
                    <p>Maintenance and Managed Service</p>
                </div>
            </button>

            <button type="button" onclick="getValue('Business Development')" class="btn btn-team" data-bs-toggle="modal"
                data-bs-target="#teamModal">
                <div class="team-item text-center text-white fw-semibold">
                    <img src="{{asset('custom/icon/business development.png')}}" alt="">
                    <p>Business Development</p>
                </div>
            </button>

            <button type="button" onclick="getValue('Application Service')" class="btn btn-team" data-bs-toggle="modal"
                data-bs-target="#teamModal">
                <div class="team-item text-center text-white fw-semibold">
                    <img src="{{asset('custom/icon/applicaition service.png')}}" alt="">
                    <p>Application Service</p>
                </div>
            </button>
        </div>
    </div>

</div>

<!-- Team modal -->
<div class="modal fade" id="teamModal" tabindex="-1" aria-labelledby="teamModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-2">
            <div class="text-center">
                <img src="{{asset('custom/icon/sales account.png')}}" alt=""
                    class="img-team-modal img-fluid p-3 my-3 rounded"
                    style="background-color: var(--red); width: 90px;">
                <h1 class="modal-title fs-5" id="teamModalLabel">Modal title</h1>
            </div>
            <div class="d-flex justify-content-center my-3">
                <p class="team-desc col-md-10">The goal of our Sales Account Manager Team is to always be aware of
                    the specific needs of our costumers with respect to the current technical field. Our Sales
                    Department proudly consist of experienced professionals dedicated to creating anf advertising
                    services that are personalized to each client. As part of our strategy, we focus on finding the
                    most beneficial balance between const and benefit</p>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-red" style="background-color: var(--red); color: white;"
                    data-bs-dismiss="modal">back</button>
            </div>
        </div>
    </div>
</div>

<div id="home-insights" class="container mb-5">
    <div class="d-flex justify-content-between">
        <p class="fs-5 fw-semibold">Lastest News</p>
        <a href="{{url('insights/news')}}" class="fs-5 see-insight" style="text-decoration: none;">see all</a>
    </div>
    <div class="d-flex flex-wrap">
        @foreach($new_data as $row)
        <div class="mt-4 col-md-3 d-flex justify-content-center p-2">
            <a class="card shadow my-card" style="text-decoration: none;" href="{{url('insights', $row->id)}}">
                <div class="card-img-top rounded d-flex align-items-center" style="overflow: hidden;">
                    <img style="width: 100%; min-height: 100%; object-fit: cover;"
                        src="{{asset('storage/images/' .$row->image)}}" alt="Card image cap">
                </div>
                <p class="card-date mx-3 mb-0">{{Carbon\Carbon::parse($row->created_at)->format('d M Y')}}</p>
                <div class="card-body">
                    <p class="card-title fw-semibold"
                        style="  overflow: hidden;display: -webkit-box;-webkit-line-clamp: 2;line-clamp: 2;-webkit-box-orient: vertical;">
                        {{$row->title}}</p>
                    <p class="card-text mt-2 px-4 py-2 rounded shadow">See Detail --></p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-2">
    <p class="fw-semibold fs-5">Executive Summary</p>
    <p style="text-align: justify;">For more than a decade, SIP has earned its reputation as an IT system integrator
        that helps companies maximize their investments in IT solutions. To ensure effectiveness an efficiency, costs
        are strategically targeted to the most essential element. Drawing from this experience, SIP has developed a
        framework that allows for paractical business concepts to be actualized into tangible outcomes.</p>
</div>

<div class="certificate-content">
    <div class="certificate-icon d-flex justify-content-center align-items-center">
        <img src="{{asset('custom/icon/certificate.png')}}" style="width: 50px;" alt="">
    </div>
    <div class="container py-5 d-flex flex-wrap">
        <div class="col-md-9 d-flex gap-3" style="overflow: scroll; border-radius: 10px;">
            <div class="certificate-item">
            </div>
            <div class="certificate-item">
            </div>
            <div class="certificate-item">
            </div>
            <div class="certificate-item">
            </div>
            <div class="certificate-item">
            </div>
            <div class="certificate-item">
            </div>
        </div>
        <div class="col-md-3 p-3">
            <p class="fw-semibold text-white fs-3">Company Certifications</p>
            <p class="text-white" style="text-align: justify;">SIP places a high emphasis on providing services that are
                reliable, secure, and of high quality. Among its international standards that it complies with are ISO
                45001 :2018 ISO 37001:2015 27001:2013 and ISO 9001:2015.</p>
        </div>
    </div>
</div>

<div id="home-maps" class="container">
    <p class="fs-5 fw-semibold">Find Us</p>
    <iframe src="https://www.google.com/maps/d/embed?mid=1ozZiTj6s8xekvy1tDcdVuXj1OaXnURI&ehbc=2E312F&noprof=1"
        width="100%"></iframe>
    <div class="mt-3">
        <p class="map-desc">(Utama) Jalan Puri Indah Raya Kav, BLOK A3/2, No.33-35, KEMBANGAN, JAKARTA BARAT, INDONESIA.
        </p>
        <p class="map-desc">(Ruko) JL. PURI KENCANA, BLOK K6 NO. 2L-2M, KEMBANGAN, JAKARTA BARAT, INDONESIA.</p>
    </div>
</div>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqBfhDcz_JK2iTWGVZRbdQGRWutM_r_6M&callback=initMap">
</script>

<script>
    const content1 = document.querySelector('.c-a')
    const content2 = document.querySelector('.c-b')
    const content3 = document.querySelector('.c-c')
    const content4 = document.querySelector('.c-d')


    window.addEventListener('scroll', e => {
        if (window.scrollY > 100) {
            content1.style.margin = '-1000px 0px 0px 0px';
            content2.style.margin = '-1000px 0px 0px 0px';
        } else {
            content1.style.margin = '0px 0px 0px 0px';
            content2.style.margin = '0px 0px 0px 0px';
        };
    });

</script>
@endsection
