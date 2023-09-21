@extends('layouts.main')

@section('content')

<!-- <div class="insights-notification">
    <img src="{{asset('storage/images/' .$last_data->image)}}" style="object-fit: cover; border-radius: 10px 0px 0px 10px;" class="col-md-3" alt="">
    <p class="col-md-7 mb-0 ps-2 py-2">{{$last_data->title}}</p>
    <div class="col-md-2 d-flex align-items-center justify-content-center" style="background: var(--red); border-radius: 0px 10px 10px 0px;">
        <p class="mb-0 text-white" onClick="closeNews()">x</p>
    </div>
</div> -->

<div id="home-header" class="row gx-0">
    <div class="d-flex justify-content-center align-items-end fw-semibold">
        <p>Sinergy Informasi Pratama</p>
    </div>

    <div class="header-content">
        <div class="content c-a">
            <form action="{{url('solution/detail')}}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Enterprise Network Infrastructure">
                <input type="text" value="1" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Group 71.png')}}" alt="">
                </button>
            </form>
            <form action="{{url('solution/detail')}}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Collaboration & Facility">
                <input type="text" value="4" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Support.png')}}" alt="">
                </button>
            </form>
        </div>
        <div class="content c-b">
            <form action="{{url('solution/detail')}}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Data center & Cloud">
                <input type="text" value="2" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Group 80.png')}}" alt="">
                </button>
            </form>
            <form action="{{url('solution/detail')}}" data-bs-toggle="tooltip" data-bs-placement="top"
                data-bs-custom-class="custom-tooltip" data-bs-title="Cyber Security">
                <input type="text" value="3" name="t" hidden>
                <button class="btn">
                    <img src="{{asset('custom/icon/Group 76.png')}}" alt="">
                </button>
            </form>
        </div>
    </div>
</div>

<div id="home-service" class="container-fluid" data-aos="fade-up">

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

<div id="home-insights" class="container my-5" data-aos="fade-up">
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

<div class="container mt-2" data-aos="fade-up">
    <p class="fw-semibold fs-5">Executive Summary</p>
    <p style="text-align: justify;">For more than a decade, SIP has earned its reputation as an IT system integrator
        that helps companies maximize their investments in IT solutions. To ensure effectiveness an efficiency, costs
        are strategically targeted to the most essential element. Drawing from this experience, SIP has developed a
        framework that allows for paractical business concepts to be actualized into tangible outcomes.</p>
</div>

<div class="certificate-content" data-aos="fade-up">
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

    const service_modal_title = document.querySelector('.service-modal-title')
    const service_desc = document.querySelector('.service-desc')
    const service_img = document.querySelector('.img-service-modal')

    function getServiceValue(name) {
        service_modal_title.innerText = name

        if (name == "IT SERVICES BY PROJECT & SERVICE LEVEL AGREEMENT") {
            service_desc.innerText =
                "Infrastructure Development. Application Administration & Maintainance. Enterprise System Integration. Telecomunication System Integration & Managed Services. Outsourcing & Joint Development Services"
            service_img.setAttribute('src', '/custom/icon/Group 108.png')
        } else if (name == "HARDWARE INTEGRATION & IMPLEMENTATION") {
            service_desc.innerText =
                "Network Blue Printing & Architecture. Network Administration & Maintainance. Network & Infrastructure Deployment, Enterprise Network Solutions. Carrier Grade Network Management Services."
            service_img.setAttribute('src', '/custom/icon/Group 109.png')

        } else if (name == "24/7 SUPPORT") {
            service_desc.innerText =
                "Available Support Any Time. Operate Continuously At All Times With Complete Shoft Staff."
            service_img.setAttribute('src', '/custom/icon/Group 110.png')

        } else if (name == "CABLING SYSTEM INSTALLATION") {
            service_desc.innerText =
                "Network Cabling Termination. Fiber Optic Cabling Deployment. Electrical Cabling Solution"
            service_img.setAttribute('src', '/custom/icon/Group 111.png')

        } else if (name == "APLICATION & SERVICE IMPLEMENTATION") {
            service_desc.innerText =
                "Application Architectures Supporting Digital Business, Mobile, Cloud And APIs Include Services That Integrate Exiting Assets Or Implement New Capabilities"
            service_img.setAttribute('src', '/custom/icon/Group 112.png')

        } else {
            service_desc.innerText =
                "Physical Building Security Solution. Enterprise Specific Security Services. Integrated Security"
            service_img.setAttribute('src', '/custom/icon/Group 113.png')

        }
    }

    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    showNews()

    function showNews() {
        document.querySelector('.insights-notification').style.right = '50px'
    }

    function closeNews() {
        document.querySelector('.insights-notification').style.right = '-1000px'
    }
</script>
@endsection
