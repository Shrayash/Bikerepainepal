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
                                <h3 class="font-weight-semibold">Customer Detail</h3>
                                <a href="{{ route('customer.edit',$id) }}"><button type="button" 
                                    class="btn btn-danger" > Manage Settings </button>
                                 </a>
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                  
                            
                                @foreach ($customer as $cust)
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <h4><b>{{ $cust['frst_name'] }}</b></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <h4><b>{{ $cust['last_name'] }}</b></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile No.</label>
                                            <h4><b>{{$cust['mobile_no']}}</b></h4>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <h4><b>{{$cust['address']}}</b></h4>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-hover" id="dynamicTable">
                                            <tr class="table-active">
                                                <th>Vehicle No.</th>
                                                <!--  <th>Service Date</th> -->
                                                <th>Delivery</th>
                                                <th>Vehicle Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                           
                                            @foreach ($customer_vehicle as $vehicle)
                                           
                                            <tr>
                                                <td>
                                                    <p class="font-weight-medium">{{$vehicle->v_no}}</p>
                                                </td>
                                                <!-- <td><p class="font-weight-medium">2022-06-13 18:10</p></td> -->
                                                <td>
                                                    <p class="font-weight-medium">{{$vehicle->delivery}}</p>
                                                </td>
                                                <td>
                                                    <p class="font-weight-medium">{{$vehicle->v_remarks}}</p>
                                                </td>
                                                <td> <form method="POST" class="form-sample" action="{{ route('service.start',$vehicle->id) }}" >
                                                    @csrf
                                                         @if (($vehicle->work_status) == 'ongoing')
                                                        <button name="work_status"  class="btn btn-box btn-warning" type="submit" value="resolve">Resolve</button>
                                                        @else
                                                        <button name="work_status"  class="btn btn-box btn-primary" type="submit" value="ongoing">Start Service</button>
                                                        @endif
                                                    
                                                           {{-- <select class="form-control" name="work_status"
                                                                    id="delivery"  onchange="this.form.submit()" >
                                                                    <option  {{ ($vehicle->work_status) == 'none' ? 'selected' : '' }}  value="none">None</option>
                                                                    <option {{ ($vehicle->work_status) == 'ongoing' ? 'selected' : '' }} value="ongoing">Start Service</option>
                                                                    <option {{ ($vehicle->work_status) == 'resolved' ? 'selected' : '' }} value="resolved">End Service</option>
                                                                </select> --}}
                                                        </form>
                                                       
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                


                                <!-- <div class="row">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Vehicle No.</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Vehicle Color</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Vehicle Brand</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" />
                        </div>
                      </div>
                    </div>
                  </div> -->



                           
                        </div>
                    </div><br><br>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Customer Service Record</h3>

                            </div>
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-10"><input class="form-control" type="search"
                                            placeholder="Search by mobile no. / vehicle no." aria-label="Search"></div>
                                    <div class="col-md-2"><button class="btn btn-outline-success"
                                            type="submit">Search</button></div>
                                </div>
                            </form><br>

                            <form class="form-sample">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <!-- <th>Name</th> -->
                                                <th>Vehicle No.</th>
                                                <th>Vehicle Remarks</th>
                                                <!-- <th>Mobile No.</th> -->
                                                <th>Service Date</th>
                                                <th>Total Amount</th>
                                                <th>Delivery</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Ba-026-pa-2345</td>
                                                <td>Blue NS 200 CC</td>
                                                <td>08/12/2022 10:09</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Ba-026-pa-2345</td>
                                                <td>Blue NS 200 CC</td>
                                                <td>08/12/2022 10:09</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Ba-026-pa-2345</td>
                                                <td>Blue NS 200 CC</td>
                                                <td>08/12/2022 10:09</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Ba-026-pa-2345</td>
                                                <td>Blue NS 200 CC</td>
                                                <td>08/12/2022 10:09</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Ba-026-pa-2345</td>
                                                <td>Blue NS 200 CC</td>
                                                <td>08/12/2022 10:09</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>



                                        </tbody>
                                    </table>
                                </div>
                          
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
