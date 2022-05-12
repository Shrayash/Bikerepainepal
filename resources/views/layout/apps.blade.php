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

    
    <!-- FONTS -->
    
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto:wght@400;500;700&family=Sarabun:wght@600;700&display=swap"
        rel="stylesheet">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
     
        <script src="{{ asset('assets') }}/js/owl.carousel.min.js"></script>
        <link rel="stylesheet" href="{{ asset('assets') }}/css/owl.carousel.min.css">
   


    <!-- SELECTIVE ASSETS -->

</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
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
                        {{-- <span class="header-search-bar-wrapper">
                            <div class="search-border"></div>
                            <span class="header-search-bar">
                                <form action="" class="no-toggle-search">
                                    <input class='no-toggle-search' type="text" name="video_search" id="video_search" placeholder="Search...">
                                    <span class="search-from-header-icon-toggler no-toggle-search">
                                        <i class="fa fa-search no-toggle-search"></i>
                                    </span>
                                    <button class="search-from-header-icon-button no-toggle-search"  onclick="video_search()">
                                        <i class="fa fa-search no-toggle-search"></i>
                                    </button>
                                    <ul class="list-group" id="result"></ul>
                                </form>
                            </span>
                        </span> --}}
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
                    {{-- <li class="nav-item">
                        <a href="login.php" class="header-login">Login</a>
                    </li>
                    <li class="nav-item>
                            <a href=" signup.php" class="header-signup">Sign Up</a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <p class="text-center">
                Copyright Abhiyantrik Technology <?php echo date("Y"); ?>. All Rights Reserved.
            </p>
        </div>
    </footer>
        <script src="{{ asset('assets') }}/js/main.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    
    
</body>

</html>
