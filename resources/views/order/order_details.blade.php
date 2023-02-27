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
                <br>

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
                    <div class="p-2">
                        <h3 class="font-weight-semibold">Order Details</h3>
                       {{-- <small> Products > {{ $cat_info->category_name }}</small> --}}
                        {{-- <span class="badge badge-secondary">Products > {{ $cat_info->category_name }}</span> --}}
                    </div>
                    <div class="p-2">
                        @hasanyrole('admin|superadmin')
                            <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-dark btn-fw">Back to
                                    Dashboard</button></a>
                        @endhasanyrole
                    </div>
                </div><br>

                @foreach ($record as $order)

                <div class="row">
                    <div class="col-md-3 col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <p style="font-weight: 600">{{ $order->frst_name }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Last name</label>
                            <p style="font-weight: 600">{{ $order->last_name }}</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile No.</label>
                            <p style="font-weight: 600">{{ $order->mobile_no }}</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <p style="font-weight: 600">{{ $order->address }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    
                   
                        <div class="col-md-5"><img class="card-img-top" src="{{  $order->file }}"
                            alt="Bike Repairs" ><br></div>
                        <div class="col-md-7"><h5 class="mb-0"> {{ $order->item_name }}</h5>
                            <span class="badge badge-dark">{{ $order->item_code }}</span> 
                            <br><br>
                               <h2> <small><b>NRS</b></small> {{ $order->price }}
                                </h2><br>
                                <form method="POST" class="form-sample" action="{{ route('order.adminupdate',$order->id) }}" id="content_form"
                                    autocomplete="off">
                                    @csrf
                                 
                                    <input type="number" name="price" value="{{$order->price}}" hidden>
                                    <div class="form-group">
                                    Quantity
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-secondary btn-number" data-type="minus" data-field="">
                                    <b>-</b>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="col-md-2 col-sm-2 col-3 input-number" value="{{$order->quantity}}" placeholder="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-dark btn-number" data-type="plus" data-field="">
                                        <b>+</b>
                                    </button>
                                </span>
                                    </div>
                                <br><br>
                               
                                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Order Status</label>
                                        <select class="form-control" name="status_id" id="category">
                                            {{-- <option value="">Order Status</option> --}}
                                            @foreach ($order_status as $cat_info)
                                               
                                                    <option
                                                        {{ $order->status_id == $cat_info->id ? 'selected' : '' }}
                                                        value="{{ $cat_info->id }}">{{ $cat_info->status }}</option>
                                               
                                            @endforeach
                                        </select>


                                    </div>
                                <br><br>
                                <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                value="Make Changes" />
                                {{-- <button type="button" class="btn btn-success">Order Now</button> --}}
                            </form>
                                <hr>
                                <b class="mb-0">Product's Summary</b>
                                
                                <p>{{ $order->description }}</p>
                                               
                                       
                                           
                                       
                             

                        </div>
                    @endforeach
                
                  </div>


            </div>

        </div>
        <!-- main-panel ends -->
    </div>

    {{-- https://www.tutorialrepublic.com/faq/how-to-check-if-an-input-field-is-empty-using-jquery.php --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
    <script>
    $(document).ready(function(){

        var quantitiy=0;
           $('.quantity-right-plus').click(function(e){
                
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
                    
                    $('#quantity').val(quantity + 1);
        
                  
                    // Increment
                
            });
        
             $('.quantity-left-minus').click(function(e){
                // Stop acting like a button
                e.preventDefault();
                // Get the field name
                var quantity = parseInt($('#quantity').val());
                
                // If is not undefined
              
                    // Increment
                    if(quantity>1){
                    $('#quantity').val(quantity - 1);
                    }else{
                        $('#quantity').val(1);
                    }
            });
            
        });
        </script>
@endsection
