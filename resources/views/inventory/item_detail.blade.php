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
                        {{-- <h3 class="font-weight-semibold">BRN Shop</h3> --}}
                       {{-- <small> Products > {{ $cat_info->category_name }}</small> --}}
                        <span class="badge badge-secondary">Products > {{ $cat_info->category_name }}</span>
                    </div>
                    <div class="p-2">
                        @hasanyrole('admin|superadmin')
                            <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-dark btn-fw">Back to
                                    Dashboard</button></a>
                        @endhasanyrole
                    </div>
                </div><br>



                {{-- <form method="POST" class="form-sample" action="{{ route('inventory.search_cat') }}" id="content_form"
                    autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label"> Filter by Category</label>
                        <div class="col-md-4 col-sm-10">
                            <select class="form-control" name="category" onchange="this.form.submit()" id="category">
                                <option value="all">All Items</option>
                                @foreach ($category as $item)
                                    @foreach ($item as $cat_info)
                                        <option value="{{ $cat_info->slug }}">{{ $cat_info->category_name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </form> --}}


                {{-- <div class="row">
                    <div class="col-md-12 col-sm-3">
                        <div class="row">
                            @foreach ($inventory as $item)
                                <div class="col-md-3 col-sm-3 grid-margin stretch-card">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('storage/images/' . $item->file) }}"
                                            alt="Bike Repairs" style="width: 100%!important;height: auto!important;">
                                        <div class="card-body" style="padding: 0.75rem!important;">
                                            <span class="badge badge-dark">{{ $item->item_code }}</span>

                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <p class="item_title mb-0"> {{ $item->item_name }}</p>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h4> <small><b>NRS</b></small> {{ $item->price }}
                                                </h4>

                                                <img src="{{ asset('assets') }}/images/assured.png" alt="Bike Repairs"
                                                    style="width: 40%!important;height: auto!important;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            @endforeach
                        </div>
                    </div>
                </div> --}}

                
                <div class="row">
                    @foreach ($inventory as $item)
                   
                        <div class="col-md-5"><img class="card-img-top" src="{{  $item->file }}"
                            alt="Bike Repairs" ><br></div>
                        <div class="col-md-7"><h5 class="mb-0"> {{ $item->item_name }}</h5>
                            <span class="badge badge-dark">{{ $item->item_code }}</span> 
                            <br><br>
                               <h2> <small><b>NRS</b></small> {{ $item->price }}
                                </h2><br>
                                <form class="form-sample" action="{{ route('order.confirm',$item->slug) }}" id="content_form"
                                    autocomplete="off">
                                    @csrf
                                Quantity:
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-left-minus btn btn-secondary btn-number"  data-type="minus" data-field="">
                                    <b>-</b>
                                    </button>
                                </span>
                                <input type="text" id="quantity" name="quantity" class="col-md-2 col-sm-2 col-3 input-number" value="1" placeholder="1" min="1" max="100">
                                <span class="input-group-btn">
                                    <button type="button" class="quantity-right-plus btn btn-dark btn-number" data-type="plus" data-field="">
                                        <b>+</b>
                                    </button>
                                </span> <br><br>
                                <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                value="Order Now" />
                                {{-- <button type="button" class="btn btn-success">Order Now</button> --}}
                            </form>
                                <hr>
                                <b class="mb-0">Product's Summary</b>
                                
                                <p>{{ $item->description }}</p>
                                               
                                       
                                           
                                       
                             

                        </div>
                    @endforeach
                
                  </div>

          

                {{-- <div class="row">
                    <div class="col-md-12 col-sm-3">
                      
                            @foreach ($inventory as $item)
                                <div class="col-md-3 col-sm-3 grid-margin stretch-card">
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('storage/images/' . $item->file) }}"
                                            alt="Bike Repairs" style="width: 100%!important;height: auto!important;">
                                        <div class="card-body" style="padding: 0.75rem!important;">
                                            <span class="badge badge-dark">{{ $item->item_code }}</span>

                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <p class="item_title mb-0"> {{ $item->item_name }}</p>

                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h4> <small><b>NRS</b></small> {{ $item->price }}
                                                </h4>

                                                <img src="{{ asset('assets') }}/images/assured.png" alt="Bike Repairs"
                                                    style="width: 40%!important;height: auto!important;">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                    <div class="card">
                                        <div class="col-md-5 w3-red">
                                            <img class="card-img-top" src="{{ asset('storage/images/' . $item->file) }}"
                                            alt="Bike Repairs" >
                                        </div>
                                        <div class="col-md-7 w3-red">
                                            <span class="badge badge-dark">{{ $item->item_code }}</span>

                                           
                                        </div>
                                    </div>
                            
                            @endforeach
                     
                    </div>
                </div> --}}


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
