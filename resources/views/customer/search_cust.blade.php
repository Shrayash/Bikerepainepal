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
                <!-- Page Title Header Starts-->
                <div class="row page-title-header">
                    <div class="col-12">
                        <div class="page-header">
                            <!-- <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Search Customer</h3>
                                <a href="dashboard.html"><button type="button" class="btn btn-primary btn-fw">Back to Dashboard</button></a>
                              </div>
                        
                      </div> -->
                        </div>

                    </div>
                    <!-- Page Title Header Ends-->
                    <div class="col-12 stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex justify-content-between">
                                    <h3 class="font-weight-semibold">Search Customer</h3>
                                    <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-primary btn-fw">Back to
                                            Dashboard</button></a>
                                </div>
                                <form class="forms-sample" action="detail_customer.html">
                                    <div class="form-group row">
                                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Mobile
                                            Number</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="exampleInputEmail2"
                                                placeholder="Enter Mobile Number">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                      </div> -->
                                    <button type="submit" class="btn btn-success mr-2">Search</button>
                                    <button class="btn btn-light">Go Home</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>

    </div>
