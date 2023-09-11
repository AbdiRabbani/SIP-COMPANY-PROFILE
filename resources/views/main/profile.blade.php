@extends('layouts.main')


@section('nav')
<a class="nav-item" href="{{url('/home')}}">Home</a>
<a class="nav-active" href="{{url('/profile')}}">Profile</a>
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
<div id="profile-content" class="container mt-5">

    <div id="profile-header" class="text-center">
        <p class="fw-semibold">Sinergy Informasi Pratama</p>
        <p>“Your IT Business Solution”</p>
    </div>

    <div id="profile-higtlights" class="my-5">
        <p class="fs-5 fw-semibold">Company Hightlights</p>
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
            <div>
                <p class="fw-semibold">Vision</p>
                <p>The Primary Information Communication Technology (ICT) Enabler with Effective and Efficient
                    Infrastructure platform.</p>
            </div>
            <div>
                <p class="fw-semibold">Mission</p>
                <p>Establish A benchmark for excellence by providing renowned global certifications that enable
                    continuous competency. We not only strive to incorporate the latest technology, but also provide
                    our costumers with reliable solutions.</p>
            </div>
        </div>
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc2cMy6XpGFArSI4X7FDeQdNILPmJsbCBm7dGIsM2MHw&s"
            alt="" class="img-vision rounded">
    </div>

    <div id="profile-reason">
        <p class="fs-5 fw-semibold">
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
        <p class="fs-5 fw-semibold ethics-title">Our Work Ethics <span>[</span> <span> WISE</span> <span>]</span>
        </p>
        <div class="d-flex mt-5 flex-wrap justify-content-between gap-3">
            <div class="d-flex col-md-5">
                <div class="ethics-icon">
                    <p class="fs-5 fw-semibold">W</p>
                </div>
                <div class="d-flex row ethics-item ms-1">
                    <p class="fs-5 fw-semibold">Wise</p>
                    <p class="mt-2">We are people within organization with superior capabilities ern the admiration of
                        all our stakeholder</p>
                </div>
            </div>
            <div class="d-flex col-md-5">
                <div class="ethics-icon">
                    <p class="fs-5 fw-semibold">I</p>
                </div>
                <div class="d-flex row ethics-item ms-1">
                    <p class="fs-5 fw-semibold">Integrity</p>
                    <p class="mt-2">We are honest with other and ourselves, truth respect and support each other with
                        highly ethics behavior</p>
                </div>
            </div>
            <div class="d-flex col-md-5">
                <div class="ethics-icon">
                    <p class="fs-5 fw-semibold">S</p>
                </div>
                <div class="d-flex row ethics-item ms-1">
                    <p class="fs-5 fw-semibold">Sinergy</p>
                    <p class="mt-2">We have an unwavering commitment to being a partner of choice <br><br><br></p>
                </div>
            </div>
            <div class="d-flex col-md-5">
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
        <p class="fw-semibold fs-5">Key Bussiness</p>
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
        <p class="fs-5 fw-semibold">Organization</p>
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
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="overflow: scroll;">
                <img src="{{asset('custom/images/structure.png')}}" alt="" width="300%" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
            </div>
        </div>
    </div>
</div>
@endsection
