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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    {{-- <style>
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

                <li class="nav-item">
                    <a class="nav-link" href="#" aria-expanded="false">
                        Home </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="messageDropdown" href="#" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="mdi mdi-help-rhombus"></i>
                        {{-- <span class="count">7</span> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0"
                        aria-labelledby="messageDropdown">
                        <a class="dropdown-item py-3">
                            <p class="mb-0 font-weight-medium float-left">Only Employees Allowed ! </p>

                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <!-- <div class="preview-thumbnail">
                                <img src="assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                                </div> -->
                            <div class="preview-item-content flex-grow py-2">
                                <p class="preview-subject ellipsis font-weight-medium text-dark"> Enter passcode and
                                    manage your workshop mechanism.
                                </p>

                            </div>
                        </a>

                    </div>
                </li>


            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
                <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>

</header>

<body>



    {{-- <div class="body-container login-page">
        <div class="login-page-container">
            <div class="login-image-box">
                <img src="{{ URL::to('assets') }}/images/login.svg" alt="">
            </div>
            <div class="login-main-section">

                <div class="login-main-box">
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible fade show" id="vanish" role="alert">
                            <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Validation Error:</strong>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)

                                    <li>{{ ucfirst($error) }}</li>

                                @endforeach
                            </ul>
                        </div>

                    @endif

                    <h2>Welcome Back</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label for="">
                            Email
                        </label>
                        <div class="input-box">
                            <span class="input-box-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="email@service.com"
                                autofocus>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="">
                            Password
                        </label>
                        <div class="input-box">
                            <span class="input-box-icon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input id="password" type="password" class="input-type-password @error('password') is-invalid @enderror"
                                name="password" required  autocomplete="current-password">
                            <span class="input-box-icon input-password-toggler">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                     
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    

                        <div class="remember-password-box">
                            <div class="remember-me">
                                <input class="form-check-input tick-box" type="checkbox" name="remember" id="remember-me"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember-me">
                                    Remember Me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="forget-password">
                                    <a href="{{ route('password.request') }}">Forgot Password</a>
                                </div>
                            @endif
                        </div>

                        <input type="submit" value="Log In">

                    </form>


                    <p class="already">
                        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                    </p>

                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-scroller">
        {{-- @if ($errors->count() > 0)
            <div class="alert alert-danger alert-dismissible fade show" id="vanish" role="alert">
                <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Validation Error:</strong>
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ ucfirst($error) }}</li>
                    @endforeach
                </ul>
            </div>

        @endif --}}
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
{{-- 
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label for="">
                                    Email
                                </label>
                                <div class="input-box">
                                    <span class="input-box-icon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="email@service.com" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="">
                                    Password
                                </label>
                                <div class="input-box">
                                    <span class="input-box-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input id="password" type="password"
                                        class="input-type-password @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    <span class="input-box-icon input-password-toggler">
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror





                                <input type="submit" value="Log In">

                            </form> --}}
                            
                            {{-- <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label for="">
                                   Username
                                </label>
                                <div class="input-box">
                                    <span class="input-box-icon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input id="email" type="email" class=" @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="email@service.com" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="">
                                    Password
                                </label>
                                <div class="input-box">
                                    <span class="input-box-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input id="password" type="password"
                                        class="input-type-password @error('password') is-invalid @enderror"
                                        name="password" required autocomplete="current-password">
                                    <span toggle="#password" class="fa fa-fw fa-eye  toggle-password" style="margin:10px;">
                                       
                                    </span>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror





                                <input type="submit" class="btn btn-primary submit-btn btn-block" value="Log In">

                            </form> --}}
                            @if ($errors->count() > 0)
                            <div class="alert alert-danger alert-dismissible fade show" id="vanish" role="alert" style="position: relative">
                                <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Validation Error:</strong>
                                <ul class="list-unstyled">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ ucfirst($error) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                          <form method="POST" action="{{ route('login') }}" >
                            @csrf
                            <div class="form-group">
                            <label class="label">User ID</label>
                            <div class="input-group">
                                <input id="mobile_no" type="text" class=" @error('mobile_no') is-invalid @enderror"
                                name="mobile_no" value="{{ old('mobile_no') }}" required autocomplete="mobile_no"
                                autofocus style="width: 100%;">
                                {{-- <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                </span>
                                </div> --}}
                            </div>
                            </div>
                            <div class="form-group">
                            <label class="label">Password</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                class="input-type-password @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" style="width: 90%;">&nbsp;
                                <span toggle="#password" class="fa fa-fw fa-eye  toggle-password" style="margin-top:3%;" ></span>
                                {{-- <div class="input-group-append"> --}}
                               
                                {{-- </div> --}}
                            </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary submit-btn btn-block" value="Log In">
                            {{-- <button class="btn btn-primary submit-btn btn-block"  type="submit" value="Log In">Login</button> --}}
                        </div>
                        </form>  
                    </div>
                    <br>
                    <center>
                        <p class="text-white">
                            <i class="mdi mdi-check-circle-outline"></i>
                            This page is only for Workshop Members and officials.
                        </p>
                    </center>


                </div>
            </div>
        </div>

    </div>

    </div>


    <footer class="footer">
        <div class="container">

            <p class="text-center">
                Copyright Bike Repairs Nepal <?php echo date('Y'); ?>. All Rights Reserved.
            </p>

        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $('#vanish').fadeOut(8000);
    </script>

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
