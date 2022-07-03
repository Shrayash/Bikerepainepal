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
        @endif<br>
        <div class="main-panel">
            <div class="content-wrapper">
                <!-- Page Title Header Starts--><br>
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
                                        <div class="col-sm-12">
                                            <input type="text" name="search" id="search" class="form-control" placeholder="Search by Customer Mobile Number or Name" />
                                        </div>
                                    </div>
                                    <!-- <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                        </div>
                      </div> -->
                                    {{-- <button type="submit" class="btn btn-success mr-2">Search</button> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                    

                </div>
                <div class="table-responsive">
                {{-- <h5 align="center">Customers Filtered : <span id="total_records"></span></h5> --}}
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <!-- <th>Name</th> -->
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Mobile</th>
                                <th>Action</th>
                              
                            </tr>
                        </thead>
                        <tbody>
                        
                           
                        </tbody>
                    </table>
                </div>


            </div>

        </div>

    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('customer.search') }}",
           method:'GET',
           data:{query:query},
           dataType:'json',
           success:function(data)
           {
            $('tbody').html(data.table_data);
            $('#total_records').text(data.total_data);
           }
          })
         }
        
         $(document).on('keyup', '#search', function(){
          var query = $(this).val();
          fetch_customer_data(query);
         });
        });
        </script>
