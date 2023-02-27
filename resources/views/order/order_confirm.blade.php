@extends('layout.apps')

@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
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
        <div class="main-panel">
            <div class="content-wrapper">
                <br><br>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="p-2">
                                    <h3 class="font-weight-semibold">Almost There!</h3>
                                    <p>Please check your info below and confirm your order request.</p>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">First name</label>
                                        <p style="font-weight: 600">{{ $customer->frst_name }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Last name</label>
                                        <p style="font-weight: 600">{{ $customer->last_name }}</p>
                                    </div>
                                </div>

                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mobile No.</label>
                                        <p style="font-weight: 600">{{ $customer->mobile_no }}</p>
                                    </div>
                                </div>
                                <div class="col-md-3 col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <p style="font-weight: 600">{{ $customer->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br><br>

                </div>
                <form method="POST" class="form-sample" action="{{ route('order.confirmed', $inventory[0]->slug) }}"
                id="content_form"  autocomplete="off">
                @csrf

                <div class="col-md-12 col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Your Order Request</h3>
                            </div><br>

                            <div class="row">
                                <div class="col-md-2 col-4">
                                 
                                    <div class="form-group">

                                        <img src="{{ $inventory[0]->file }}" alt="Bike Repairs"
                                            style="width: 100%!important;height: auto!important;">
                                    </div>
                                </div>
                                <div class="col-md-5 col-8">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1"
                                            style="font-weight: 600">{{ $inventory[0]->item_name }}</label>
                                            <input type="number" name="item_id"
                                     value="{{ $inventory[0]->id }}" hidden/>
                                        {{-- <p style="font-weight: 600">{{ $customer->frst_name }}</p> --}}
                                        <p><span class="badge badge-dark">{{ $inventory[0]->item_code }}</span></p>
                                        <h4>NRS {{ $inventory[0]->price }} <small><b>per item</b></small></h4>
                                    </div>
                                </div>
                                <div class="col-md-2 col-6">
                                    <label for="exampleInputEmail1" style="font-weight: 500;"> Quantity :</label>
                                    <h4 style="font-weight: 600;">{{ $quantity }}</h4>
                                    <input type="number" name="quantity"
                                     value="{{ $quantity }}" hidden/>
                                </div>
                                <div class="col-md-3 col-6">
                                    <label for="exampleInputEmail1" style="font-weight: 500;"> Grand Total :</label>
                                    <h4 style="font-weight: 600;">{{ $total_price }}</h4>
                                    <input type="number" name="total_price"
                                     value="{{ $total_price }}" hidden/>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>

                  {{-- Hereby confirming to place my order ! --}}

                <center>

                    <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                        value="Place Your Order" />
                </center>
              </form>
            </div><br><br>

        </div>

    </div>
   
@endsection
