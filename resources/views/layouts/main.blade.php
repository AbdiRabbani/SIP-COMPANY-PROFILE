<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIP | Sinergy Informasi Pratama</title>

    <!-- css -->
    <link rel="stylesheet" href="{{asset('custom/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/responsive.css')}}">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="nav-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="">=</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    @yield('nav')
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    @if(session()->has('message'))
    <div class="message-floating">
        {{ session()->get('message') }}

        <p onClick="closeQuotation()">x</p>
    </div>
    @endif

    <div class="floating-button" onClick="showQuotation()">
        <img src="{{asset('custom/icon/quote.png')}}" alt="">
    </div>

    <div class="quotation-form d-flex row justify-content-end">
        <p onClick="hideQuotation()">x</p>
        <form action="{{url('quotation/send')}}" method="post">
            @csrf
            <p class="fw-semibold fs-5">Request Quotation</p>
            <div class="mt-3 d-flex justify-content-between gap-1">
                <div class="col-md-5">
                    <label for="name">First Name</label>
                    <input required name="first_name" type="text" id="name" class="form-control">
                </div>
                <div class="col-md-5">
                    <label for="name">Last Name</label>
                    <input required name="last_name" type="text" id="name" class="form-control">
                </div>
            </div>
            <div class="mt-3">
                <label for="business">Business / Organization</label>
                <input required name="business" type="text" id="business" class="form-control">
            </div>
            <div class="mt-3">
                <label for="email"> Email</label>
                <input required name="email" type="mail" id="email" class="form-control">
            </div>
            <div class="mt-3">
                <label for="business">Phone</label>
                <input required name="phone" type="number" id="business" class="form-control">
            </div>
            <div class="my-3 d-flex row">
                <label for="reques">Request</label>
                <textarea required name="request" id="request" rows="5" class="form-control"></textarea>
            </div>
            <div class="my-3 d-flex">
                <div class="me-1">
                    <input type="checkbox" class="quotate-check" onClick="privacy()" style="margin-top: -8px;">
                </div>
                <p style="font-size: 10px;">I agree to the <span data-bs-toggle="modal" data-bs-target="#regulation">Sinergy Informasi
                        Pratama Website Terms & Conditions of Use</span>.</p>
            </div>
            <div class="text-end">
                <button class="btn" style="color: white; background: var(--red);" id="btn-quote" disabled>submit</button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="regulation" tabindex="-1" aria-labelledby="regulationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <p class="fs-5 mt-2 fw-semibold">Ownership of Site; Agreement to Terms of Use</p>
            <p>These Terms and Conditions of Use (the "Terms of Use") apply to the Sinergy web site located at
                www.sinergy.co.id, and all associated sites linked to www.sinergy.co.id by Sinergy, its subsidiaries and
                affiliates, including Sinergy sites around the world (collectively, the "Site"). The Site is the
                property of Sinergy. BY USING THE SITE, YOU AGREE TO THESE TERMS OF USE; IF YOU DO NOT AGREE, DO NOT USE
                THE SITE.</p>
            <p class="fs-5 fw-semibold">Content</p>
            <p>All text, graphics, user interfaces, visual interfaces, photographs, trademarks, logos, sounds, music,
                artwork and computer code (collectively, "Content"), including but not limited to the design, structure,
                selection, coordination, expression, "look and feel" and arrangement of such Content, contained on the
                Site is owned, controlled or licensed by or to Sinergy, and is protected by trade dress, copyright,
                patent and trademark laws, and various other intellectual property rights and unfair competition laws.
            </p>
            <p class="fs-5 fw-semibold">Privacy</p>
            <p>Sinergy's Privacy Policy applies to use of this Site, and its terms are made a part of these Terms of Use
                by this reference. To view Sinergy's Privacy Policy, click here. Additionally, by using the Site, you
                acknowledge and agree that Internet transmissions are never completely private or secure. You understand
                that any message or information you send to the Site may be read or intercepted by others, even if there
                is a special notice that a particular transmission (for example, credit card information) is encrypted.
            </p>
        </div>
    </div>
</div>

    <div id="footer" class="mt-5">
        <div class="line"></div>
        <div class="d-flex gap-3 mt-4">
            <a href="https://wa.me/02158355599" target="_blank">
                <img src="{{asset('custom/icon/ic_phone.png')}}" alt="">
            </a>
            <a href="mailto:info@sinergy.co.id" target="_blank">
                <img src="{{asset('custom/icon/ic_mail.png')}}" alt="">
            </a>
            <a href="https://www.instagram.com/sinergyinformasipratama" target="_blank">
                <img src="{{asset('custom/icon/ic_instagram.png')}}" alt="">
            </a>
            <a href="https://www.linkedin.com/company/ptsip" target="_blank">
                <img src="{{asset('custom/icon/ic_linkedin.png')}}" alt="">
            </a>
            <a href="https://www.facebook.com/sinergyip/" target="_blank">
                <img src="{{asset('custom/icon/ic_facebook.png')}}" alt="">
            </a>
        </div>
        <ul class="d-flex flex-wrap justify-content-center px-0">
            <li>
                <a href="{{url('home')}}">Home</a>
            </li>
            <li>
                <a href="{{url('profile')}}">Profile</a>
            </li>
            <li>
                <a href="{{url('insights/blog')}}">Insights</a>
            </li>
            <li>
                <a href="{{url('solution')}}">Solution</a>
            </li>
            <li>
                <a href="{{url('campaign')}}">Campaign</a>
            </li>
            <li>
                <a href="{{url('partnership')}}">Partnership</a>
            </li>
            <li>
                <a href="{{url('customer')}}">Costumer</a>
            </li>
            <li>
                <a href="{{url('career')}}">Career</a>
            </li>
            <li>
                <a href="{{url('quotation')}}">Quotation</a>
            </li>
        </ul>
        <p class="text-center text-copyright">copyright © 2023 PT Sinergy Informasi Pratama</p>
    </div>
</body>

<script src="{{asset('custom/javascript/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
    integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</html>
