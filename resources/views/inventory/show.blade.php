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

                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4 grid-margin stretch-card average-price-card">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between pb-2 align-items-center">
                                            <h3 class="font-weight-semibold mb-0">asdas</h3>
                                            <a href="{{ route('service.ongoing') }}">
                                                <div class="icon-holder" style="background-color:#FF7353">
                                                    <i class="mdi mdi-wrench-outline"></i>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="font-weight-bold mb-0 text-white">Ongoing Service</p>
                                            <a href="{{ route('service.ongoing') }}">
                                                <p class="text-white mb-0" style="font-size: 14px;">View All</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div> --}}
                <div class="d-flex justify-content-between">
                    <h3 class="font-weight-semibold">BRN Shop</h3>
                    @hasanyrole('admin|superadmin')
                    <a href="{{ route('admin.index') }}"><button type="button"
                            class="btn btn-dark btn-fw">Back to
                            Dashboard</button></a>
                    @endhasanyrole
                </div><br>

                
         
               
                <form method="POST" class="form-sample" action="{{ route('inventory.search_cat') }}"
                    id="content_form"  autocomplete="off">
                    @csrf
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label"> Filter by Category</label>
                      <div class="col-md-4 col-sm-10">
                        <select  class="form-control" name="category" onchange="this.form.submit()" id="category">
                            <option value="all" >All Items</option>
                            @foreach ($category as $item)
                                @foreach ($item as $cat_info)
                                    <option value="{{ $cat_info->slug }}">{{ $cat_info->category_name }}</option>
                                @endforeach
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </form>
                        
                    
                <div class="row">
                    <div class="col-md-12 col-sm-3">
                        <div class="row">
                            @foreach ($inventory as $item)
                           
                                <div class="col-md-3 col-sm-3 grid-margin stretch-card">
                                    {{-- <a href="{{ route('inventory.item_details',$item->slug) }}"> --}}
                                    <div class="card">
                                        <a href="{{ route('inventory.item_details',$item->slug) }}">
                                        <img class="card-img-top" src="{{ $item->file}}"
                                            alt="Bike Repairs" width="300px" height="300px" ></a>
                                            <a href="{{ route('inventory.item_details',$item->slug) }}">
                                        <div class="card-body" style="padding: 0.75rem!important;">
                                            <span style="color:#b7b7b7" hidden >{{ $item->item_code }}</span>
                                           
                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <p class="item_title mb-0"> {{ $item->item_name }}</p>
                                               
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <h4 > <small><b>NRS</b></small> {{ $item->price }}
                                                </h4>
                                               
                                                   <img src="{{ asset('assets') }}/images/assured.png"
                                            alt="Bike Repairs" style="width: 40%!important;height: auto!important;">
                                             
                                            </div>
                                        </div></a>
                                    </div>
                                    {{-- </a> --}}
                                </div>
                           
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- main-panel ends -->
    </div>
    {{-- https://www.tutorialrepublic.com/faq/how-to-check-if-an-input-field-is-empty-using-jquery.php --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
    @endsection
