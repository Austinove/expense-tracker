<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo.jpg')}}">
    <title>Friends With a Purpose</title>
    <!-- Custom CSS -->
    <link href="{{asset('assets/libs/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-notify/0.2.0/css/bootstrap-notify.css">
    <link href="{{ asset('vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('assets/style.css')}}" rel="stylesheet">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-decoration-none">
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header id="header">
            <div class="container-fluid">

            <div id="logo" class="pull-left">
                {{-- <img src="{{ asset('assets/img/logo.JPG')}}" alt="logo" height="25px" style="margin-left: 60px;">
                <h1>
                    <a href="#" class="scrollto">Rise&Shine</a>
                </h1> --}}
                <a class="navbar-brand" href="index.html">
                    <b class="logo-icon">
                        <img height="60px" src="{{asset('images/logo.jpg')}}" alt="logo" />
                    </b>
                    <span class="font-14" style="color: white;">Friends With a Purpose</span>
                </a>
            </div>

            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <a class="nav-link text-white waves-effect waves-dark pro-pic font-12" href=""aria-expanded="false">About Us</a>
                    <a class="nav-link text-white waves-effect waves-dark pro-pic font-12" href=""aria-expanded="false">Accountability</a>
                </ul>
            </nav>
            </div>
        </header>
        {{-- <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar fixed-top navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <a class="navbar-brand" href="index.html">
                        <b class="logo-icon">
                            <img height="60px" src="{{asset('images/logo.jpg')}}" alt="logo" />
                        </b>
                        <span class="font-14">Friends With a Purpose</span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link text-white waves-effect waves-dark pro-pic" href=""aria-expanded="false">About Us</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header> --}}
            <section id="intro">
            <div class="intro-container">
            <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
                <ol class="carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="carousel-background"><img src="{{ asset('profiles/image6.jpeg')}}" alt=""></div>
                        <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>We are professional</h2>
                            <p>
                                Irrigation, Water pumps, Borehole services, Solar equipment, Generators, motors and engines, Water treatment services,
                                Swimming pool services, General construction services, Plumbing and electrical materials, Consultancy services
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="{{ asset('profiles/image7.jpeg')}}" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Get the latest Sprinklers at the cheapest price</h2>
                            <p>
                                Never underestimate the joy of plants when they receive water from the sprinkler.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="{{ asset('profiles/image3.jpeg')}}" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Solar Panels and Tanks For Irrigation</h2>
                            <p>
                                Farmers have always played a significant role in our society as they provide the world’s population with food,
                                having Irrigation solar systems as a helpers.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="{{ asset('profiles/image1.jpeg')}}" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Borehole Safe Water</h2>
                            <p>
                                We bring you safe water through drilling boreholes. This can also decrease on the water bills of any house hold
                            </p>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="carousel-background"><img src="{{ asset('profiles/image4.jpeg')}}" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Irrigation in a Big Agricultral Project</h2>
                            <p>
                                Of all the works of civilization that interfere with the natural water distribution system, 
                                irrigation has been by far the most pervasive and powerful.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-background"><img src="{{ asset('profiles/image2.jpeg')}}" alt=""></div>
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <h2>Irrigation in a Big Agricultral Project</h2>
                            <p>
                                Of all the works of civilization that interfere with the natural water distribution system, 
                                irrigation has been by far the most pervasive and powerful.
                            </p>
                        </div>
                    </div>
                </div>
                </div>

                <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>

            </div>
            </div>
        </section>
    </div>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('assets/libs/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    </body>
</html>