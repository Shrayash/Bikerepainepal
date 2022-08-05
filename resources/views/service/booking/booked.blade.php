@extends('layout.apps')

@section('content')
  

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <div class="main-panel">
            <div class="content-wrapper">
                <br><br>
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="font-weight-semibold">Booked Services</h3><br>

                            {{-- <form class="forms-sample" action="detail_customer.html">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" name="search" id="search" class="form-control" placeholder="Search by Customer Mobile Number or Name" />
                                    </div>
                                </div>
                            </form><br> --}}

                            <form class="form-sample">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Name</th>
                                                <th>Vehicle No.</th>
                                                <th>Mobile No.</th>
                                                <th>Booked Date</th>
                                                <th>Time</th>
                                                <th colspan="2">Service Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{$services}} --}}
                                            @foreach ($data as $service)
                                            <tr>
                                                <td>{{$service->frst_name}}{{$service->last_name}}</td>
                                                <td>{{$service->v_no}}</td>
                                                <td>{{$service->mobile_no}}</td>
                                                @php($date_array = explode("T", $service->booked_at))
                                                <td>
                                                   {{$date_array[0]}}</td>
                                                   <td>
                                                    {{$date_array[1]}}</td>
                                                <td>
                                                    <form></form>
                                                    <form method="POST" class="form-sample" action="{{ route('service.start',$service->id) }}" >
                                                        @csrf
                                                    <button name="work_status"  class="btn btn-box btn-primary" type="submit" value="ongoing">Start</button>
                                                    </form>
                                            </td>
                                            <td>
                                                <form></form>
                                                <form  method="POST" class="form-sample" action="{{ route('book.cancel',$service->id) }}" >
                                                @csrf
                                                <button name="preinfo"  class="btn btn-box btn-danger" onclick="return confirm('Are you sure you want to cancel this booking?')" type="submit" value="idle">Cancel</button>
                                            </form>
                                        </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- <nav aria-label="...">
                                    <ul class="pagination">
                                      <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item active">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li>
                                    </ul>
                                  </nav> -->

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    {{-- <script>
        $(document).ready(function(){
        
         fetch_customer_data();
        
         function fetch_customer_data(query = '')
         {
          $.ajax({
           url:"{{ route('book.search') }}",
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
        </script> --}}
@endsection
