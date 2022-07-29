<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
 
  

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
 

	</head>

<body>
    <nav class="navbar navbar-light bg-light justify-content-between">
       <a class="navbar-brand"> <img src="{{ asset('assets') }}/images/logo_main.png" width="60%" class="d-inline-block align-top" alt=""></a>
       
      </nav>
      <div class="container">
    @foreach ($records as $record)
        <img src="{{ asset('storage/images/' . $record->file) }}" class="img-fluid" alt="Responsive image" alt="">
    @endforeach

    <p class="text-center" style="font-size:18px;color:rgb(95, 95, 95)">
        <i>If any issue or queries feel free to contact us at 01-5918488</i><br>
       

    </p>
      </div>
</body>

</html
