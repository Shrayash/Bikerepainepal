<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport" />

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
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style2style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/magnific-popup.css">

 


    <!-- FONTS -->
<!-- Google Fonts Raleway -->
{{-- <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet"> --}}
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
    
<body>


    <div class="container">
        <div class="row">
            {{-- <div class="col-md-12"> --}}

                @foreach ($qr_codes as $codes)
                    @foreach ($codes as $code)
                    <center>
                    <div class="card" style="margin: 5px;">
                     <br>
                        <center> <img src="{{ asset('assets') }}/images/logo_main.png" style="max-width: 140px!important; content-align: center !important;" ></center>
                        <br>
                        <h5 class="card-title">Your Discount Coupon is :</h5>
                       <center> {{ QrCode::size(100)->generate($code->qr_code) }}</center>
                        <div class="card-body">
                          <h5 class="card-title">Thank you for visiting us.</h5>
                          <p class="card-text">Nissan Mart, Naikap</p>
                         
                        </div>
                      </div>
                    </center>
                       
                    @endforeach
                @endforeach

            {{-- </div> --}}
        </div>
        <!-- End Portfolio Content -->
    </div>

</body>
</html>
