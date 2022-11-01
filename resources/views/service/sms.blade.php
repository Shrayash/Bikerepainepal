<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="title" content="Bike Repairs Nepal">
    <meta name="description" content="Bike Repairs Nepal">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Bike Repairs Nepal - Bill</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
  	<!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Google Fonts Raleway -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
	<!-- Google Fonts Open sans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">
 
  <style>
    .container {
      position: relative;
      width: 100%;
      overflow: hidden;
      padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }
    
    .responsive-iframe {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      right: 0;
      width: 100%;
      height: 100%;
      border: none;
    }
</style>
    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
 

	</head>

<body>
  {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><b>Bike Repairs Nepal</b></a>
    
    <a href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <button type="button" class="btn btn-primary">Logout</button>
  </a>

  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
  </form>
  </nav> --}}
    <nav class="navbar navbar-light bg-light justify-content-between">

      <a class="navbar-brand"> <img src="{{ asset('assets') }}/images/logo_main.png" width="60%" class="d-inline-block align-top" alt=""></a>
      <a class="navbar-brand" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <button type="button" class="btn btn-primary">Logout</button>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
      </nav>
      <div class="container" style="padding-top: 4%!important;">
     
     
    @foreach ($records as $record)
    {{-- {{$record->file}} --}}
    @php($extension = pathinfo(asset('storage/images/' . $record->file), PATHINFO_EXTENSION))
    @if($extension == 'pdf')
        <iframe class="responsive-iframe"  src="{{asset('storage/images/' . $record->file)}}"  type="application/pdf" frameborder=0></iframe>
    @else
        <img src="{{ asset('storage/images/' . $record->file) }}" class="img-fluid" alt="Responsive image" alt="">
    @endif
    @endforeach

    <p class="text-center" style="font-size:18px;color:rgb(95, 95, 95)">
        <i>If any issue or queries feel free to contact us at 01-5918488</i><br>
       

    </p>
      </div>
</body>

</html>
