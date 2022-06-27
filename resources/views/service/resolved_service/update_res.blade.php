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
                                https://www.codegrepper.com/code-examples/php/php+delete+file+from+server+after+24+hours
                                <a href="dashboard.html"><button type="button" class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                            <br>
                            <form class="form-sample" action="resolved_service.html">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <input class="form-control font-weight-semibold" placeholder="" id="grn_number"
                                                name="grn_number" type="text" value="Hiralal" readonly>
                                            <!-- <input class="form-control" placeholder="" id="grn_number" name="grn_number" type="text"
                                            value="{{ $grn }}" readonly> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <input class="form-control font-weight-semibold" placeholder="" id="grn_number"
                                                name="grn_number" type="text" value="Mathhema" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile No.</label>
                                            <input class="form-control font-weight-semibold" placeholder="" id="grn_number"
                                                name="grn_number" type="text" value="9876042343" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input class="form-control font-weight-semibold" placeholder="" id="grn_number"
                                                name="grn_number" type="text" value="Shantinagar, Kathmandu" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vehicle No.</label>
                                            <input class="form-control font-weight-semibold" placeholder="" id="grn_number"
                                                name="grn_number" type="text" value="Ba-023-Pa-2034" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Vehicle Remarks</label>
                                            <input class="form-control font-weight-semibold" placeholder="" id="grn_number"
                                                name="grn_number" type="text" value="Blue NS 200 CC" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Delivery</label>
                                            <input class="form-control font-weight-semibold" placeholder="" id="grn_number"
                                                name="grn_number" type="text" value="Self" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Total Bill Amount</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend bg-light">
                                                    <span class="input-group-text">NRS</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Amount"
                                                    aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">File Upload</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile"
                                                    name="filename">
                                                <label class="custom-file-label" for="customFile">Upload Bill
                                                    Image</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <center><a href="resolved_service.html"><button type="submit"
                                            class="btn btn-success mr-2">Save & Send SMS</button></a></center>

                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


