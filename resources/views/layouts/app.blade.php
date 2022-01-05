<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!--bootstrap css cdn-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--bootstrap css cdn-->
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
</head>

<body>
    <div class="hader" style="background-image: url('{{ asset($slider->photo) }}');">
        <header>
            <nav class="navbar navbar-expand-md  ">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span><i class="fas fa-bars nav-icon"></i></span>
                </button>
                <a class="navbar-brand" href="{{ URL::to('/') }}">
                    <img src="{{ asset('public/images/logo.png') }}" alt="logo" width="80px" height="80px" ;>
                </a>
                <div class="collapse navbar-collapse " id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto ">
                        <li class="nav-item dropdown nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About
                            </a>
                            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item " href="{{ route('about') }}">ABOUT US</a>
                                <a class="dropdown-item" href="{{ route('reports') }}">REPORTS</a>
                                <a class="dropdown-item" href="{{ route('contacts') }}">CONTACT US</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Activities
                            </a>
                            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('programs') }}">PROGRAMS</a>
                                <a class="dropdown-item" href="{{ route('projects') }}">PROJECTS</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-item">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Team
                            </a>
                            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item"
                                    href="{{ route('teams', ['category' => 'Management']) }}">Management</a>
                                <a class="dropdown-item"
                                    href="{{ route('teams', ['category' => 'Advisor']) }}">Advisor</a>
                                <a class="dropdown-item"
                                    href="{{ route('teams', ['category' => 'Field Staff']) }}">Field Staff</a>
                                <a class="dropdown-item" href="{{ route('about') }}">Greenvoice</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-item ">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                News
                            </a>
                            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('newsletters') }}">NEWSLETTER</a>
                                <a class="dropdown-item" href="{{ route('blogs') }}">BLOG</a>
                            </div>
                        </li>
                        <li class="nav-item pl-3" style="visibility: hidden">
                            <button class="btn btn-lg  mr-3 " onclick="window.open('https:youtube.com')"
                                class="request-callback">Subscribe</button>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- background image -->
            <section id="banner">
                <div class="banner-cointainer d-flex justify-content-center align-items-center">
                    <h2 style="background-color:rgba(0, 0, 0, 0.391);padding:8px; border-radius: 3px;
                            " class="font-weight-bold text-light mt-5 text-center">
                        @yield('bannertext')
                    </h2>
                </div>
            </section>
        </header>
    </div>
    <br>
    <br>


    @yield('content')

    <footer>
        <!-- footer start -->
        <section>
            <!-- Copyright -->
            <div class=" text-center  p-3 " style=" background-color: #EFEFEE; ">
                <h3 class="p-4">Greenvoice</h3>
                <p style="font-size:17px;">{!! $contact->address !!}<br>Phone (BD): {{ $contact->phone }}</p>
                General Information : <a href="mailto:{{ $contact->email }}"> {{ $contact->email }}</a>.
                {{-- <br> Volunteer
                Information: <a href="mailto:webmaster@example.com">volunteer@Greenvoice.org</a>.<br> Donation
                Information: <a href="mailto:webmaster@example.com"> donate@Greenvoice.org</a>.<br><br>
                <a href="mailto:webmaster@example.com"> Subscribe to Greenvoice Newsletter!</a>.<br><br> --}}
                <hr>
                <a class=" btn btn-link btn-floating btn-lg text-dark " href="{{ $contact->facebook }}"
                    role=" button " data-mdb-ripple-color=" dark "><i class=" fab fa-facebook-f "></i></a>
                <!-- Twitter -->
                <a class="btn btn-link btn-floating btn-lg text-dark " href="{{ $contact->twitter }}" role=" button "
                    data-mdb-ripple-color=" dark "><i class=" fab fa-twitter "></i></a>
                <!-- Instagram -->
                <a class=" btn btn-link btn-floating btn-lg text-dark " href="{{ $contact->instagram }}"
                    role=" button " data-mdb-ripple-color=" dark "><i class=" fab fa-instagram "></i></a>
                <!-- Linkedin -->
                <a class=" btn btn-link btn-floating btn-lg text-dark " href="{{ $contact->pinterest }}"
                    role=" button " data-mdb-ripple-color=" dark "><i class=" fab fa-pinterest "></i></a><br><br>
                Greenvoice is a
                non-profit organization | © 2021 Greenvoice
                <br><br><br>
            </div>
            <!-- Copyright -->
        </section>
    </footer>
    <!-- footer end -->
    <!-- bootdtrap js CDN -->
    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js "
        integrity=" sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN " crossorigin=" anonymous ">
    </script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "
        integrity=" sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q " crossorigin=" anonymous ">
    </script>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "
        integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl " crossorigin=" anonymous ">
    </script>
</body>

</html>
