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
                                <h4 class="font-weight-semibold">Update Booking Date</h4>
                                {{-- https://www.codegrepper.com/code-examples/php/php+delete+file+from+server+after+24+hours --}}
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                            <br>
                            
        
                           
                            <form class="form-sample" method="POST" action="{{ route('book.noupdate',$vehicles->id) }}"  enctype="multipart/form-data">
                                @csrf
                                @foreach ($customers as $customer)
                                <div class="row" >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"><i>*click on calender to update*</i></label>
                                            <input type="datetime-local" name="book_date" id="book_date" class="form-control" value="{{$vehicles->book_date}}"
                                                            required />
                                        
                                        </div>
                                    </div>
                                    
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <h4><b>{{$customer->frst_name}}</b></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <h4><b>{{$customer->last_name}}</b></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile No.</label>
                                            <h4><b>{{$customer->mobile_no}}</b></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <h4><b>{{$customer->address}}</b></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vehicle No.</label>
                                            <h4><b>{{$vehicles->book_v_no}}</b></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Delivery</label>
                                            <h4><b>{{$vehicles->book_delivery}}</b></h4>
                                        </div>
                                    </div>
                                </div>
                              
                                
                                <center><button type="submit" class="btn btn-success mr-2">Book Date</button></center>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


