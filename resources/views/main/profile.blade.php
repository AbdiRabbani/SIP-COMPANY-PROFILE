@extends('layouts.main')

@section('content')
<div id="profile-content" class="container mt-5">

    <div id="profile-header" class="text-center">
        <p class="fw-semibold" style="font-family: HemiHead;">Sinergy Informasi Pratama</p>
        <p>“Your IT Business Solution”</p>
    </div>

    <div id="profile-higtlights" class="my-5">
        <p class="fs-5 fw-semibold" style="font-family: HemiHead;">Company Hightlights</p>
        <p>
            PT. Sinergy Informasi Pratama (SIP) is one of the company's IT system integrator in Indonesia, which
            focuses on providing an integrated network infrastructure solutions. This includes the provision of
            applications both in hardware and software to meet the needs of a company's business development. <br>
            <br> In a business environment that is constantly dependent on technological change, on the one hand, a
            company must have a strategy in controlling their every investment. While on the other hand, the drive
            to meet the needs of growing competitive. It can be in Balance efficiently and with the right tools,
            benefits to a solution will be effective and optimal.
        </p>
    </div>

    <div id="profile-vision">
        <div class="vision-content">
            <div style="transform: skew(-10deg);" data-aos="fade-left">
                <p class="fw-semibold" style="font-family: HemiHead; transform: skew(10deg)">Vision</p>
                <p style="transform: skew(10deg);">The Primary Information Communication Technology (ICT) Enabler with Effective and Efficient
                    Infrastructure platform.</p>
            </div>
            <div style="transform: skew(-10deg);" data-aos="fade-right">
                <p class="fw-semibold" style="font-family: HemiHead; transform: skew(10deg)">Mission</p>
                <p style="transform: skew(10deg);">Establish A benchmark for excellence by providing renowned global certifications that enable
                    continuous competency. We not only strive to incorporate the latest technology, but also provide
                    our costumers with reliable solutions.</p>
            </div>
        </div>
        <img src="{{asset('custom/images/img-profile.png')}}"
            alt="" class="img-vision rounded">
    </div>

    <div id="profile-reason">
        <p class="fs-5 fw-semibold" style="font-family: HemiHead;">
            Why Choose Us?
        </p>
        <div>
            <div class="d-flex">
                <div class="p-2">
                    <div class="reason-dots" style="background-color: #7650E5;"></div>
                </div>
                <p>SIP as an IT system integrator will help integrate investments in IT solutions with an effective
                    and efficient manner. So that the objective cost can be allocated only on critical parts.</p>
            </div>
            <div class="d-flex">
                <div class="p-2">
                    <div class="reason-dots" style="background-color: #CC70D8;"></div>
                </div>
                <p>Historically SIP as a provider of IT solutions has been proven over the years through relentless
                    hard work. SIP experience has translated into a framework that is always used as a reference in
                    delivering practical business concepts into a comprehensive form.</p>
            </div>
        </div>
    </div>

    <div id="profile-ethics">
        <p class="fs-5 fw-semibold ethics-title" style="font-family: HemiHead;">Our Work Ethics <span>[</span> <span> WISE</span> <span>]</span>
        </p>
        <div class="d-flex mt-5 flex-wrap justify-content-between gap-3">
            <div class="d-flex col-md-5" data-aos="fade-left">
                <div class="ethics-icon">
                    <p class="fs-5 fw-semibold">W</p>
                </div>
                <div class="d-flex row ethics-item ms-1">
                    <p class="fs-5 fw-semibold">Wise</p>
                    <p class="mt-2">We are people within organization with superior capabilities ern the admiration of
                        all our stakeholder</p>
                </div>
            </div>
            <div class="d-flex col-md-5" data-aos="fade-right">
                <div class="ethics-icon">
                    <p class="fs-5 fw-semibold">I</p>
                </div>
                <div class="d-flex row ethics-item ms-1">
                    <p class="fs-5 fw-semibold">Integrity</p>
                    <p class="mt-2">We are honest with other and ourselves, truth respect and support each other with
                        highly ethics behavior</p>
                </div>
            </div>
            <div class="d-flex col-md-5" data-aos="fade-right">
                <div class="ethics-icon">
                    <p class="fs-5 fw-semibold">S</p>
                </div>
                <div class="d-flex row ethics-item ms-1">
                    <p class="fs-5 fw-semibold">Sinergy</p>
                    <p class="mt-2">We have an unwavering commitment to being a partner of choice <br><br><br></p>
                </div>
            </div>
            <div class="d-flex col-md-5" data-aos="fade-left">
                <div class="ethics-icon">
                    <p class="fs-5 fw-semibold">E</p>
                </div>
                <div class="d-flex row ethics-item ms-1">
                    <p class="fs-5 fw-semibold">Exellent</p>
                    <p class="mt-2">We are committed to excellence in everything we do, and we strive to continually
                        improvement seeking innovation with effective and efficient manner</p>
                </div>
            </div>
        </div>
    </div>

    <div id="profile-key">
        <p class="fw-semibold fs-5" style="font-family: HemiHead;">Key Bussiness</p>
        <div class="d-flex flex-wrap justify-content-evenly gap-4 mt-5">
            <div class="key-item" onClick="showKeyDesc(1)">
                <div class="key-button-content">
                    <button class="key-button">Detail</button>
                </div>
                <img src="{{asset('custom/icon/itservicebyproject.png')}}" alt="">
                <p>IT Service by Project & Service Level Agreement (SLA)</p>
            </div>
            <div class="key-item" onClick="showKeyDesc(2)">
                <div class="key-button-content">
                    <button class="key-button">Detail</button>
                </div>
                <img src="{{asset('custom/icon/hardwareintegration.png')}}" alt="">
                <p>Hardware Integration & Implementation</p>
            </div>
            <div class="key-item" onClick="showKeyDesc(3)">
                <div class="key-button-content">
                    <button class="key-button">Detail</button>
                </div>
                <img src="{{asset('custom/icon/cablingsystem.png')}}" alt="">
                <p>Cabling System Installation</p>
            </div>
            <div class="key-item" onClick="showKeyDesc(4)">
                <div class="key-button-content">
                    <button class="key-button">Detail</button>
                </div>
                <img src="{{asset('custom/icon/applicationandcloud.png')}}" alt="">
                <p>Application & Cloud Implementation</p>
            </div>
        </div>
        <div>
            <div class="col-md-12 d-flex" style="color: var(--purple);">
                <div class="col-md-3 text-center">
                    <p id="arrow1">^</p>
                </div>
                <div class="col-md-3 text-center">
                    <p id="arrow2">^</p>
                </div>
                <div class="col-md-3 text-center">
                    <p id="arrow3">^</p>
                </div>
                <div class="col-md-3 text-center">
                    <p id="arrow4">^</p>
                </div>
            </div>
            <div class="key-desc col-md-12 rounded">
                <p class="fw-semibold key-title-value"></p>
                <p class="key-desc-value">Click First the key</p>
            </div>
        </div>
    </div>

    <div id="profile-organization">
        <p class="fs-5 fw-semibold" style="font-family: HemiHead;">Organization</p>
        <img src="{{asset('custom/images/structure.png')}}" alt="" width="100%" data-bs-toggle="modal"
            data-bs-target="#exampleModal">
        <p class="text-center mt-3" style="font-size: 10px;">*click the image for zooming in mobile</p>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SIP Organization Structure</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow: scroll;">
                <img src="{{asset('custom/images/structure.png')}}" alt="" width="300%" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
            </div>
        </div>
    </div>
</div>

<script>
    const key_desc = document.querySelector('.key-desc')
    key_desc.style.display = 'none'

    const key_desc_value = document.querySelector('.key-desc-value')
    const key_title = document.querySelector('.key-title-value')
    const arrow1 = document.querySelector('#arrow1')
    const arrow2 = document.querySelector('#arrow2')
    const arrow3 = document.querySelector('#arrow3')
    const arrow4 = document.querySelector('#arrow4')

    function showKeyDesc(index) {
        console.log(index);
        if (index == 1) {
            key_desc.style.display = 'block'
            key_desc_value.innerText =
                "Infrastructure deployment, Aplication administration & maintenance, Enterprise system integration, Telecomunication system integration, Information & technology, operation & managed services, Outsourcing & joint development services"
            key_title.innerText = "IT Service by Project & Service Level Agreement (SLA)"
            arrow1.style.display = 'block'
            arrow2.style.display = 'none'
            arrow3.style.display = 'none'
            arrow4.style.display = 'none'
        } else if (index == 2) {
            key_desc.style.display = 'block'
            key_desc_value.innerText =
                "Network Blueprinting & Architecture, Network Administration & Maintenance, Network & Infrastructure Deployment, Enterprise Network Solutions,  Carrier Grade Network Management Service, Physical Building Security Solution, Enterprise Specific Security Services, Integrated Security Audit"
            key_title.innerText = "Hardware Integration & Implementation"
            arrow1.style.display = 'none'
            arrow2.style.display = 'block'
            arrow3.style.display = 'none'
            arrow4.style.display = 'none'
        } else if (index == 3) {
            key_desc.style.display = 'block'
            key_desc_value.innerText =
                "Network Cabling Termination, Fiber Optic, Cabling Deployment, Electrical Cabling Solution, Fire Alarm Solution"
            key_title.innerText = "Cabling System Installation"
            arrow1.style.display = 'none'
            arrow2.style.display = 'none'
            arrow3.style.display = 'block'
            arrow4.style.display = 'none'
        } else if (index == 4) {
            key_desc.style.display = 'block'
            key_desc_value.innerText =
                "Application architectures supporting digital business, mobile, cloud and APIs include services that integrate exiting assets or implement new capabilities"
            key_title.innerText = "Application & Cloud Implementation"
            arrow1.style.display = 'none'
            arrow2.style.display = 'none'
            arrow3.style.display = 'none'
            arrow4.style.display = 'block'
        }
    }

</script>
@endsection
