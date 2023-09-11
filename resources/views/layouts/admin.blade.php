<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIP | Sinergy Informasi Pratama</title>

    <link rel="stylesheet" href="{{asset('template/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('template/plugins/ekko-lightbox/ekko-lightbox.css')}}"> -->
    <link rel="stylesheet" href="{{asset('template/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"
        integrity="sha512-t4GWSVZO1eC8BM339Xd7Uphw5s17a86tIZIj8qRxhnKub6WoyhnrxeCIMeAqBPgdZGlCcG2PrZjMc+Wr78+5Xg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js"
        integrity="sha512-3dZ9wIrMMij8rOH7X3kLfXAzwtcHpuYpEgQg1OA4QAob1e81H8ntUQmQm3pBudqIoySO5j0tHN4ENzA6+n2r4w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <style>
        .paginate_button {
            text-decoration: none;
            color: black;
            border: 1px solid #808080;
            padding: 6px 12px;
        }

        .dataTables_paginate {
            padding-top: 100px;
            display: flex;
            justify-content: end;
        }

        .dataTables_paginate span a {
            background-color: #6255F4;
            color: white;
            border: 1px solid #6255F4;
            margin-right: 1px;
        }

        .previous {
            border-radius: 10px 0px 0px 10px;
            border-right: none;
        }

        .next {
            border-radius: 0px 10px 10px 0px;
            border-left: none;
        }

        div#myTable_filter {
            display: flex;
            justify-content: end;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            border-radius: 5px;
            border: 1px solid #808080;
            padding: 3px 5px;
            max-width: 100px;
        }

        div.dataTables_wrapper div.dataTables_info {
            display: none;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height: 100vh; position: fixed;">
            <a href="template/index3.html" class="brand-link" style="text-decoration: none;">
                <img src="{{asset('template/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SIP</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="text-decoration: none;">Alexander Pierce</a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{url('/admin/quotation')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quotation
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/insights')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Insight
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/campaign')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Campaign
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/partnership')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Partnership
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/category')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Partnership Category
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/customer')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Customer
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/admin/career')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Career
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{asset('template/plugins/jquery/jquery.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('template/dist/js/adminlte.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
