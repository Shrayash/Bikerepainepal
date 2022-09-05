@extends('layout.apps')

@section('content')


    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <br><br>
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <h4 class="page-title">Set to Resolve and Send SMS</h4>

                        </div>
                    </div>

                </div>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h4 class="font-weight-semibold">Resolving : Ba-023-Pa-2093</h4>
                                {{-- https://www.codegrepper.com/code-examples/php/php+delete+file+from+server+after+24+hours --}}
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                            <br>
                            
                            
                          
                           
                            <form class="form-sample" method="POST" action="{{ route('service.resolve',$records->id) }}" enctype="multipart/form-data">
                                @csrf
                                @foreach ($customers as $customer)
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <input class="form-control font-weight-semibold" placeholder="" 
                                                name="frst_name" type="text" value="{{$customer->frst_name}}" readonly>
                                          
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <input class="form-control font-weight-semibold" placeholder="" 
                                                name="last_name" type="text" value="{{$customer->last_name}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile No.</label>
                                            <input class="form-control font-weight-semibold" placeholder="" 
                                                name="mobile_no" type="text" value="{{$customer->mobile_no}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input class="form-control font-weight-semibold" placeholder="" 
                                                name="address" type="text" value="{{$customer->address}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vehicle No.</label>
                                            <input class="form-control font-weight-semibold" placeholder="" 
                                                name="v_no" type="text" value="{{$records->v_no}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Delivery</label>
                                            <input class="form-control font-weight-semibold" placeholder="" 
                                                name="v_remarks" type="text" value="{{$records->delivery}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Invoice No.</label>
                                            <input class="form-control font-weight-semibold" placeholder="" 
                                                name="invoice_no" type="text" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Total Bill Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend bg-light">
                                                    <span class="input-group-text">NRS</span>
                                                </div>
                                                <input type="text" name="amount" class="form-control" placeholder="amount"
                                                    aria-label="Username" aria-describedby="basic-addon1" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">File Upload</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" 
                                                    name="image" accept="image/*,application/pdf" required>
                                                <label class="custom-file-label" for="customFile">Upload Bill
                                                    File</label>
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <input type="file" name="image" placeholder="Choose image" id="image">
                                        </div> --}}

                                    </div>
                                </div>
                                <center><button type="submit" class="btn btn-success mr-2">Save & Send SMS</button></center>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


