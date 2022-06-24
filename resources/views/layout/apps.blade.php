    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- META DATA -->
        <meta name="title" content="SMF Health Education Portal">
        <meta name="description" content="SMF Health Education Portal">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.png">

        <!-- VENDOR CSS FILES -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ asset('assets') }}/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/vendors/iconfonts/ionicons/dist/css/ionicons.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/css/shared/style.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/css/demo_1/style.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/css/templatemo-style.css">


        <!-- FONTS -->

        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500;700&family=Sarabun:wght@600;700&display=swap"
            rel="stylesheet">
        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <!-- CSS -->
        {{-- <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css"> --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="{{ asset('assets') }}/js/parsley.min.js"></script>

        <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
{{-- 
            <style>
                .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgb(230, 230, 230);
            color: rgb(5, 5, 5);
            text-align: center;
            }
            </style> --}}

        <!-- SELECTIVE ASSETS -->

    </head>

    <header>
        {{-- <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                @hasanyrole('admin|superadmin')
                <a href="{{route("home")}}" class="navbar-brand">
                <img src="{{ asset('assets') }}/images/logo.png">
                </a>
                @else
                <a href="{{route("index")}}" class="navbar-brand">
                    <img src="{{ asset('assets') }}/images/logo.png">
                </a>
                @endhasanyrole
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            
                        </li>
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="header-login" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="header-signup" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @hasanyrole('admin|superadmin')
                                        <a class="dropdown-item" href="{{ route('doctor.bio') }}">Profile Settings</a>
                                        @endhasanyrole
                                        <a class="dropdown-item" href=""
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                        
                    </ul>
                </div>
            </div>
        </nav> --}}
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                @hasanyrole('admin|superadmin')
                    <a href="{{ route('home') }}" class="navbar-brand brand-logo">
                        <img src="{{ asset('assets') }}/images/logo_main.png">
                    </a>
                @else
                    <a href="{{ route('index') }}" class="navbar-brand brand-logo">
                        <img src="{{ asset('assets') }}/images/logo_main.png">
                    </a>
                @endhasanyrole
                
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">

                <ul class="navbar-nav ml-auto" style="margin-right: 30px!important;">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false">
                         Home </a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false">
                         About Us </a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false">
                         Service </a>
                     </li>

                      <li class="nav-item">
                        <a class="nav-link" href="#" aria-expanded="false">
                        Contact Us </a>
                     </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" aria-expanded="false">
                         <button type="button" class="btn btn-primary btn-fw" >Officer Portal</button> </a>
                     </li>
                        
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="count">7</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                                aria-labelledby="messageDropdown">
                                <a class="dropdown-item py-3" href="notifications.html">
                                    <p class="mb-0 font-weight-medium float-left">Notifications / Recent Activities </p>
                                    <span class="badge badge-pill badge-primary float-right">View all</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <!-- <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                                        </div> -->
                                    <div class="preview-item-content flex-grow py-2">
                                        <p class="preview-subject ellipsis font-weight-medium text-dark">Harilal Mathema
                                        </p>
                                        <p class="font-weight-light small-text"> Booked for 2022-08-12 </p>
                                    </div>
                                </a>
                                <a class="dropdown-item preview-item">
                                    <!-- <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                                        </div> -->
                                    <div class="preview-item-content flex-grow py-2">
                                        <p class="preview-subject ellipsis font-weight-medium text-dark">Bishnu Yadav </p>
                                        <p class="font-weight-light small-text"> Servicing Resolved. </p>
                                    </div>
                                </a>

                                <a class="dropdown-item preview-item">
                                    <!-- <div class="preview-thumbnail">
                                        <img src="assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                                        </div> -->
                                    <div class="preview-item-content flex-grow py-2">
                                        <p class="preview-subject ellipsis font-weight-medium text-dark">Sarah Nepal </p>
                                        <p class="font-weight-light small-text"> Booking Request for 2022-06-12 </p>
                                    </div>
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-account"></i> </a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                                <div class="dropdown-header text-center">
                                    <img width="auto" height="60px;" src="assets/images/franchise_logo.png"
                                        alt="Profile image">
                                    <p class="mb-1 mt-3 font-weight-semibold">Admin</p>
                                    <p class="font-weight-light text-muted mb-0">Bike Repairs Nepal</p>
                                </div>

                                <a class="dropdown-item">FAQ<i class="dropdown-item-icon ti-help-alt"></i></a>
                                {{-- <a class="dropdown-item">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a> --}}
                                <a class="dropdown-item" href=""
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                            </div>
                        </li>
                    @endguest
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
    
    </header>

    <body>
        @yield('content')
        <footer class="footer">
            <div class="container">
            @guest
            <div class="row">
                <div class="col-md-5">
                    <div class="about-veno">
                        <div class="logo">
                            <img src="{{ asset('assets') }}/images/franchise_logo.png" width="200%;">
                        </div>
                        <p>We are the First Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). We are bringing the 2 wheeler digital servicing to Nepal with aim to ease your bike/scooter services.</p>
                        <!-- <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul> -->
                    </div>
                </div>
             <!--    <div class="col-md-4">
                    <div class="useful-links">
                        <div class="footer-heading">
                            <h4>Useful Links</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <ul>
                                    <li><a href="https://youtu.be/hDUxbRADi8w"><i class="fa fa-stop"></i>Our Franchise Partner</a></li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li><a href="#"><i class="fa fa-stop"></i>Our Clients</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Partnerships</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Blog Entries</a></li>
                                    <li><a href="#"><i class="fa fa-stop"></i>Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                  
                <div class="col-md-3">
                    <div class="contact-info">
                        <div class="footer-heading">
                            <h4>Contact Information</h4>
                        </div>
<!--                         <p>Praesent iaculis gravida elementum. Proin fermentum neque facilisis semper pharetra. Sed vestibulum vehicula tincidunt.</p>
 -->                        <ul>
                            <li><span>Phone:</span><a href="#">9841605024, 9849257815</a></li>
                            <li><span>Email:</span><a href="#">info@bikerepairsnepal.com.np</a></li>
                            <li><span>Address:</span><a href="#">Satungal, Kathmandu</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="about-veno">
                       <!--  <div class="logo">
                            <img src="img/footer_logo.png" alt="Venue Logo">
                        </div>
                        <p>We are the First Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). We are bringing the 2 wheeler digital servicing to Nepal with aim to ease your bike/scooter services.</p> -->
                        <ul class="social-icons">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-rss"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @else
           
                <p class="text-center">
                    Copyright Bike Repairs Nepal <?php echo date('Y'); ?>. All Rights Reserved.
                </p>
           
            @endguest
            </div>
        </footer>
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
              
        <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.addons.js"></script>
           
        <script src="{{ asset('assets') }}/js/demo_1/dashboard.js"></script>
           
        <script src="{{ asset('assets') }}/js/shared/jquery.cookie.js" type="text/javascript"></script>
               
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
                integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
                integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>


    </body>

    </html>
