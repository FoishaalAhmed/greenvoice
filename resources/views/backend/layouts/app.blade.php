<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Responsive Laravel Admin Dashboard Template based on Bootstrap 5">
    <meta name="author" content="ictbd">
    <meta name="keywords"
        content="ictbd, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, laravel, theme, front-end, ui kit, web">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap"
        rel="stylesheet">
    <!-- End fonts -->

    <link rel="shortcut icon" href="{{ asset('public/backend/assets/images/favicon.ico') }}">

    <!-- plugin css -->
    <link href="{{ asset('public/backend/assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <!-- end plugin css -->

    <link href="{{ asset('public/backend/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/plugins/datatables-net/dataTables.bootstrap4.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- common css -->
    <link href="{{ asset('public/backend/assets/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/assets/css/style.css') }}" rel="stylesheet" />
    <!-- end common css -->

</head>

<body>

    <script src="{{ asset('public/backend/assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="{{ URL::to('/') }}" class="sidebar-brand">
                    ICT<span>BD</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            @include('backend.layouts.sidebar')
        </nav>
        <div class="page-wrapper">
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">

                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="wd-30 ht-30 rounded-circle" src="{{ asset(auth()->user()->photo) }}"
                                    alt="{{ auth()->user()->name }}">
                            </a>
                            <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                                <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                    <div class="mb-3">
                                        <img class="wd-80 ht-80 rounded-circle"
                                            src="{{ asset(auth()->user()->photo) }}" alt="">
                                    </div>
                                    <div class="text-center">
                                        <p class="tx-16 fw-bolder">{{ auth()->user()->name }}</p>
                                        <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <ul class="list-unstyled p-1">
                                    <li class="dropdown-item py-2">
                                        <a href="{{ route('profile') }}" class="text-body ms-0">
                                            <i class="me-2 icon-md" data-feather="user"></i>
                                            <span>{{ __('Profile') }}</span>
                                        </a>
                                    </li>
                                    <li class="dropdown-item py-2">
                                        <a href="javascript:;" class="text-body ms-0"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="me-2 icon-md" data-feather="log-out"></i>
                                            <span>{{ __('Log Out') }}</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            @section('content')

            @show
            <footer
                class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
                <p class="text-muted mb-1 mb-md-0">{{ __('Copyright ©') }} {{ date('Y') }} <a
                        href="https://www.ictbanglabd.com/" target="_blank">{{ __('ictbd') }}</a>.</p>
                <p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm"
                        data-feather="heart"></i></p>
            </footer>
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('public/backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/feather-icons/feather.min.js') }}"></script>
    {{-- <script src="{{ asset('public/backend/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> --}}
    <!-- end base js -->

    <!-- plugin js -->
    <script src="{{ asset('public/backend/assets/plugins/chartjs/chart.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}">
    </script>
    <script src="{{ asset('public/backend/assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{ asset('public/backend/assets/js/sweet-alert.js') }}"></script> --}}
    <script src="{{ asset('public/backend/assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('public/backend/assets/plugins/select2/select2.min.js') }}"></script>

    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('public/backend/assets/js/template.js') }}"></script>
    <!-- end common js -->

    <script src="{{ asset('public/backend/assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/data-table.js') }}"></script>
    <script src="{{ asset('public/backend/assets/js/select2.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/full/ckeditor.js"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        @if (session()->has('success') || session()->has('error'))
            @if (session()->has('error'))
                Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}'
                })
            @else
                Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
                })
            @endif
        @endif
    </script>

    @section('footer')

    @show

</body>


</html>
