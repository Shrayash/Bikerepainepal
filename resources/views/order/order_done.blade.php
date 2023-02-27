@extends('layout.apps')

@section('content')
    <!-- partial -->
    @if ($errors->any())
        {{ $error }}
    @endif
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

        @include('admin.sidebar')

        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">
                <br><br>

                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger" role="alert">{{ session()->get('error') }} </div>
                @endif

              
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-semibold">My Order</h3>
                    @hasanyrole('admin|superadmin')
                        <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-dark btn-fw">Shop More</button></a>
                    @endhasanyrole
                </div><br>


                <div class="w3-bar w3-black">
                    <button class="w3-bar-item w3-button tablink status_buttons w3-red" style="padding:5px!important"
                        onclick="openService(event,'pending')">Pending</button>
                    <button class="w3-bar-item w3-button tablink status_buttons" style="padding:5px!important"
                        onclick="openService(event,'completed')">Recieved</button>
                    <button class="w3-bar-item w3-button tablink status_buttons" style="padding:5px!important"
                        onclick="openService(event,'cancelled')">Cancelled</button>
                </div><hr>
              
                
                <div id="pending" class="w3-container w3-border service" >
                    <div class="row">
                        @foreach ($pending as $item)
                            <div class="col-md-6 col-sm-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body" style="padding: 0.9rem!important">
                                        <div class="row">
                                            <div class="col-md-3 col-4">

                                                <div class="form-group">

                                                    <img src="{{$item->file }}" alt="Bike Repairs"
                                                        style="width: 100%!important;height: auto!important;">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        style="font-weight: 600">{{ $item->item_name }}</label>

                                                    {{-- <p style="font-weight: 600">{{ $customer->frst_name }}</p> --}}
                                                    <p><span class="badge badge-dark">{{ $item->item_code }}</span> <span
                                                            class="badge badge-secondary">Qty {{ $item->quantity }}</span> <span
                                                            class="badge badge-secondary">Nrs {{ $item->total_price }}</span>
                                                    </p>
                                                    <p> <small>Ordered Date : {{ $item->created_at }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="completed" class="w3-container w3-border service" style="display:none">
                    <div class="row">
                        @foreach ($completed as $item)
                            <div class="col-md-6 col-sm-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body" style="padding: 0.9rem!important">
                                        <div class="row">
                                            <div class="col-md-3 col-4">

                                                <div class="form-group">

                                                    <img src="{{ $item->file  }}" alt="Bike Repairs"
                                                        style="width: 100%!important;height: auto!important;">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        style="font-weight: 600">{{ $item->item_name }}</label>

                                                    {{-- <p style="font-weight: 600">{{ $customer->frst_name }}</p> --}}
                                                    <p><span class="badge badge-dark">{{ $item->item_code }}</span> <span
                                                            class="badge badge-secondary">Qty {{ $item->quantity }}</span> <span
                                                            class="badge badge-secondary">Nrs {{ $item->total_price }}</span>
                                                    </p>
                                                    <p> <small>Ordered Date : {{ $item->created_at }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div id="cancelled" class="w3-container w3-border service" style="display:none">
                    <div class="row">
                        @foreach ($cancelled as $item)
                            <div class="col-md-6 col-sm-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body" style="padding: 0.9rem!important">
                                        <div class="row">
                                            <div class="col-md-3 col-4">

                                                <div class="form-group">

                                                    <img src="{{ $item->file  }}" alt="Bike Repairs"
                                                        style="width: 100%!important;height: auto!important;">
                                                </div>
                                            </div>
                                            <div class="col-md-9 col-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1"
                                                        style="font-weight: 600">{{ $item->item_name }}</label>

                                                    {{-- <p style="font-weight: 600">{{ $customer->frst_name }}</p> --}}
                                                    <p><span class="badge badge-dark">{{ $item->item_code }}</span> <span
                                                            class="badge badge-secondary">Qty {{ $item->quantity }}</span> <span
                                                            class="badge badge-secondary">Nrs {{ $item->total_price }}</span>
                                                    </p>
                                                    <p> <small>Ordered Date : {{ $item->created_at }}</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                
            </div>
        </div>
    </div>
  
    {{-- https://www.tutorialrepublic.com/faq/how-to-check-if-an-input-field-is-empty-using-jquery.php --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>

    <script>
        function openService(evt, serviceName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("service");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(serviceName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }
    </script>
@endsection
