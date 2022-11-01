<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- META DATA -->
    <meta name="title" content="Bike Repairs Nepal">
    <meta name="description" content="New Two wheeler service center in town. Service your bike or scooter once and we promise you will choose us everytime.">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.jpg">

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
    {{-- <link rel="stylesheet" href="{{ asset('assets') }}/css/templatemo-style.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style2style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/magnific-popup.css">
 


    <!-- FONTS -->
<!-- Google Fonts Raleway -->
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
<!-- Google Fonts Open sans -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500;700&family=Sarabun:wght@600;700&display=swap"
        rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
   
    <style>

    </style>


</head>

<header id="mu-hero">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top justify-content-between" style="background-color:white; box-shadow: 0 2px 4px 0 rgba(0,0,0,.2);">
        <div class="container">
            @hasanyrole('admin|superadmin')
            <a href="{{route("home")}}" class="navbar-brand" id="nav_brand" style="width: 20%;">
            <img src="{{ asset('assets') }}/images/logo_main.png" class="img-fluid" width="100%">
            </a>
            @else
            <a href="{{route("index")}}" class="navbar-brand" id="nav_brand" style="width: 20%;">
                <img src="{{ asset('assets') }}/images/logo_main.png" width="100%">
            </a>
            @endhasanyrole
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        
                    </li> --}}
                    <ul class="navbar-nav mx-auto" style="font-weight: 600" >
                        <!-- Authentication Links -->
                        @guest
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('index') }}">Home</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About Us</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('service') }}">Service</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact Us</a>
                        </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                       
                            <li class="nav-item">
                                <a class="header-login" href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-fw" >Officer Portal</button></a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="header-signup" href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->frst_name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    {{-- @hasanyrole('admin|superadmin')
                                    <a class="dropdown-item" href="{{ route('doctor.bio') }}">Profile Settings</a>
                                    @endhasanyrole --}}
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
                    
                {{-- </ul> --}}
            </div>
        </div>
    </nav>
    
   

</header>

<body>
    @yield('content')
    
    <footer id="mu-footer" style="background: rgb(214,214,214);
    background: linear-gradient(9deg, rgba(214,214,214,1) 0%, rgba(255,255,255,1) 100%);">
            <br>
            @guest
            <div class="mu-footer-top">
                <div class="container">
                   
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mu-single-footer">
                                
                                <img class="mu-footer-logo" src="assets/images/franchise_logo.png" alt="logo">
                                <p class="text-justify">We are the First Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). We are bringing the Two wheeler digital servicing to Nepal with aim to ease your bike/scooter services. </p>
                                
                            </div>
                        </div>
                    <div class="col-md-1"></div>
                        
                        <div class="col-md-4">
                            <div class="mu-single-footer">
                                <h5>Contact Information</h5><br>
                                <ul class="list-unstyled">
                                  <li class="media">
                                   <!--  <span class="fa fa-home"></span> -->
                                   <i class="fa fa-map-marker" style=" font: normal normal normal 21px/1.5 FontAwesome !important;" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="media-body">
                                        <p>Satungal 11, Kathmandu</p>
                                    </div>
                                  </li>
                                  <li class="media">
                                   <i class="fa fa-phone" style=" font: normal normal normal 21px/1.5 FontAwesome !important;" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="media-body">
                                       <p>01-5918488, 9802350866</p>
                                         
                                    </div>
                                  </li>
                                  <li class="media">
                                     <i class="fa fa-envelope" style=" font: normal normal normal 20px/1.5 FontAwesome !important;" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="media-body">
                                     <p>info@bikerepairsnepal.com.np</p>
                                    </div>
                                  </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mu-single-footer">
                                <h5>Useful link</h5>
                  <br>
                                <div class="mu-social-media">
                                    <a href="https://www.facebook.com/Bike-Repairs-Nepal-Pikpart-108074821853751/"><i class="fa fa-facebook"></i></a>
                                    <a class="mu-twitter" href="https://www.instagram.com/invites/contact/?i=cqm6ibn6qdo2&utm_content=pax661v"><i class="fa fa-instagram"></i></a>
                                    <a class="mu-google-plus" href="#"><i class="fa fa-whatsapp"></i></a>
                                    <a class="mu-youtube" href="https://www.tiktok.com/@smartgaragenepal11?_t=8VYnluJzqqH&_r=1">Tik</a>
                                    <!-- <a class="mu-youtube" href="#"><i class="fa fa-youtube"></i></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="mu-footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-footer-bottom-area">
                                <p class="mu-copy-right">&copy; Copyright <a rel="nofollow" href="http://shrayashshrestha.com.np/">Bike Repairs Nepal</a>. All right reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endguest
    
        </footer>

 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
          
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
    <script src="{{ asset('assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('assets') }}/js/jquery.filterizr.min.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>   
      
</body>

</html>
