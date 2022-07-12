@extends('layout.apps')

@section('content')
    {{-- <div class="admin-page">
        <div class="admin-page-wrapper">

            @include('admin.sidebar')

            <div class="admin-sidebar-menu-toggler">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="admin-page-main">
                <div class="admin-page-right create-content-page">
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                           {{session()->get('message')}}
                       <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                   @elseif(session()->has('error'))
                       <div class="alert alert-danger" role="alert">{{session()->get('error')}} </div>
                   @endif

                  

            <div class="admin-page-main">
                <div class="admin-page-right create-content-page">
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                           {{session()->get('message')}}
                       <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                   @elseif(session()->has('error'))
                       <div class="alert alert-danger" role="alert">{{session()->get('error')}} </div>
                   @endif
                    @role('admin') <h3>Create Content</h3> @endrole
                    <div class="create-content-action">
                        @role('admin')<a href="{{ route('video.create') }}">Create a Video Lecture</a>
                        @endrole
                        <div class="d-block d-sm-none">
                            <br>
                        </div>
                        @role('admin')<a class="hollow" href="{{ route('pub.create') }}">Add a Publication</a>
                        @endrole
                    </div>

                    <h3>All Contents</h3>

             


                </div>
            </div>
        </div>
    </div>  --}}

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        
        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
               {{session()->get('message')}}
           <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
       @elseif(session()->has('error'))
           <div class="alert alert-danger" role="alert">{{session()->get('error')}} </div>
       @endif
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Page Title Header Starts-->
            <br><br>
            <div class="row page-title-header">
              <div class="col-12">
                <div class="page-header">
                  <h4 class="page-title">Dashboard</h4>
                  <div class="quick-link-wrapper w-100 d-md-flex flex-md-wrap">
                
                  </div>
                </div>
              </div>
              
            </div>
            <!-- Page Title Header Ends-->
            <div class="row">
              <div class="col-md-12">
                <div class="row">
                 <div class="col-md-4 grid-margin stretch-card average-price-card">
                    <div class="card text-white" style="background-color:#DE6449" >
                      <div class="card-body">
                        <div class="d-flex justify-content-between pb-2 align-items-center">
                          <h3 class="font-weight-semibold mb-0">{{$ongoing_count}}</h3>
                          <div class="icon-holder" style="background-color:#FF7353" >
                            <i class="mdi mdi-wrench-outline"></i>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <p class="font-weight-bold mb-0 text-white">Ongoing Service</p>
                          <a href="ongoing_service.html"><p class="text-white mb-0" style="font-size: 14px;">View All</p></a>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="col-md-4 grid-margin stretch-card average-price-card">
                    <div class="card text-white" style="background-color:#407899" >
                      <div class="card-body">
                        <div class="d-flex justify-content-between pb-2 align-items-center">
                          <h3 class="font-weight-semibold mb-0">{{$resolved_count}}</h3>
                          <div class="icon-holder" style="background-color:#56A4D1">
                            <i class="mdi mdi-clipboard-check-outline"></i>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <p class="font-weight-bold mb-0 text-white">Resolved Service</p>
                          <a href="resolved_service.html"><p class="text-white mb-0" style="font-size: 14px;">View All</p></a>
                        </div>
                      </div>
                    </div>
                  </div>
                   <div class="col-md-4 grid-margin stretch-card average-price-card">
                    <div class="card text-white" >
                      <div class="card-body">
                        <div class="d-flex justify-content-between pb-2 align-items-center">
                          <h3 class="font-weight-semibold mb-0">{{$booking_count}}</h3>
                          <div class="icon-holder">
                            <i class="mdi mdi-information-outline"></i>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <p class="font-weight-bold mb-0 text-white">Bookings</p>
                          <a href="booked_record.html"><p class="text-white mb-0" style="font-size: 14px;">View All</p></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
             </div>
            </div>
                
                <div class="row">
                    <div class="col-md-8 grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <h4 class="font-weight-semibold">Latest Customer</h4>
                            
                            <a href="{{ route('customer.check') }}"><button type="button" class="btn btn-primary btn-fw">Show All</button></a>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                  <thead>
                                    <tr>
                                      <th>Name</th>
                                      <th>Mobile No.</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>Hiralal Mathema</td>
                                      <td>9860167234</td>
                                      {{-- <td><button type="button" class="btn btn-success btn-fw">Manage</button> --}}
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                             
                              </div>
                            
                          </div>
                          
                        </div>
                      </div>
                    </div>

                    

                  <div class="col-md-4 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <a href="{{ route('customer.register_cust') }}" style="text-decoration: none">
                        <div class="d-flex justify-content-between ">
                          <h5 class="font-weight-semibold">Register New Customer</h5>
                          
                          <span class="fa fa-fw fa-user-plus" style="font-size: 170%"></span>
                        </div>
                      </a>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card-body">
                        <a href="{{ route('customer.check') }}" style="text-decoration: none">
                          <div class="d-flex justify-content-between ">
                            <h5 class="font-weight-semibold">Search Existing Customer</h5>
                            <span class="fa fa-fw fa-street-view" style="font-size: 200%"></span>
                          </div>
                        </a>                    
                        
                      </div>
                    </div>
                  </div>

                </div>
              
            <div class="row">  
                   <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="font-weight-semibold">Manage Bookings</h4>
                          
                          <a href="book_service.html"><button type="button" class="btn btn-primary btn-fw">Show All</button></a>
                        </div>
                        <button type="button" class="btn btn-secondary btn-sm">Available Booking <b>10</b></button>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <!-- <th>Vehicle No.</th> -->
                                <th>Requested Date</th>
                                <th colspan="2">Respond</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($bookings as $book)
                              <tr>
                                <td>{{$book->frst_name}}</td>
                                <td>{{$book->mobile_no}}</td>
                               <!--  <td>Paid</td> -->
                                <td>{{$book->book_date}}</td>
                                <td> 
                                  <form></form>
                                  <form class="form-sample" action="{{ route('book.update',$book->id) }}" >
                                     @csrf
                                 <button name="yes" class="btn btn-box btn-success" type="submit">Yes</button>
                                 </form>
                              </td>
                              <td>
                                 <form class="form-sample" action="{{ route('book.edit',$book->id) }}" >
                                  @csrf
                                 <button name="no"  class="btn btn-box btn-danger" type="submit">No</button>
                                 </form>
                          </td>
                              </tr>
                              @endforeach
                              
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
               </div>                 
            </div>
            <div class="row">  
                       <div class="col-md-12 grid-margin">
                        <div class="card">
                          <div class="card-body">
                            <div class="d-flex justify-content-between">
                              <h4 class="font-weight-semibold">Ongoing Services</h4>
                              <a href="{{ route('service.ongoing') }}"><button type="button" class="btn btn-primary btn-fw">Show All</button></a>
                            </div>
                            <p>Check the availability and respond accordingly.</p>
                            <div class="table-responsive">
                              <table class="table table-striped table-hover">
                                <thead>
                                  <tr>
                                    <th>Name</th>
                                    <th>Vehicle No.</th>
                                    <th>Set to Resolve</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($ongoings as $on)
                                  <tr>
                                    <td>{{$on->frst_name}}$nbsp;{{$on->last_name}}</td>
                                      <td>{{$on->v_no}}</td>
                                    <td> <form></form>
                                      <form class="form-sample" action="{{ route('service.edit',$service->vehicle_id) }}" >
                                      @csrf
                                      <button name="work_status"  class="btn btn-box btn-warning" type="submit" value="resolve">Resolve</button>
                                  </form></td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
              </div>
                
            <div class="row">  
                   <div class="col-md-12 grid-margin">
                    <div class="card">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <h4 class="font-weight-semibold">Resolved Services</h4>
                          <a href="{{ route('service.resolved') }}"><button type="button" class="btn btn-primary btn-fw">Show All</button></a>
                        </div>
                        <p>Check the availability and respond accordingly.</p>
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Name</th>
                                <th>Vehicle No.</th>
                                <th>Mobile No.</th>
                                <!-- <th>Done By</th> -->
                                <th>Delivery Type</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($resolved as $off)
                              <tr>
                                <td>{{$off->frst_name}}</td>
                                <td>{{$off->v_no}}</td>
                                <td>{{$off->mobile_no}}</td>
                                <td>{{$off->delivery}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      
      <!-- page-body-wrapper ends -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(document).ready(function(){
      
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          console.log(CSRF_TOKEN);
      
       function customer_search(customer_query = '')
       {
          $('#result').html('');
              $.ajax({
              url:'{{ route('customer.search') }}',
              method:'GET',
              data:{customer_query:customer_query,_token:CSRF_TOKEN},
              dataType:'json',
              success:function(data)
              { 
                  
                  var result = data.data;
        
                  if(result.length > 0)
                  {
                      $('#result').html('');
                      for(var count = 0; count < result.length; count++)
                      {
                          var url = "{{route('customer.show', '')}}"+"/"+result[count].id;
                          $('#result').append('<a href="'+url+'"><li class="list-group-item link-class">'+result[count].mobile_no+'</li></a>'); 
                      }
                  }
              
                  else{
                      $('#result').html('');
                      $('#result').append('<li class="list-group-item link-class">No Data to Display</li>'); 
                  }
              },
              error:function(){
                  console.log('error')}
              
              });
              
       }
              
      $(document).on('keyup', '#customer_search', function(){
                  var query = $(this).val();
                  
                  if (query.length > 0 || event.keyCode !== 8 ){
                    customer_search(query);
                  }
                  
              });
              });
      </script>
    
