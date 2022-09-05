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
                            <h3 class="font-weight-semibold">Ongoing Services</h3><br>

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
                                                <th>Name</th>
                                                <th>Vehicle No.</th>
                                                <th>Mobile No.</th>
                                                <th>Start Time</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $service)
                                            <tr>
                                                <td>{{$service->frst_name}} {{$service->last_name}}</td>
                                                <td>{{$service->v_no}}</td>
                                                <td>{{$service->mobile_no}}</td>
                                                <td>{{$service->updated_at}}</td>
                                                <td>
                                                    <form></form>
                                                    <form class="form-sample" action="{{ route('service.edit',$service->vehicle_id) }}" >
                                                    @csrf
                                                    <button name="work_status"  class="btn btn-box btn-warning" type="submit" value="resolve">Resolve</button>
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
@endsection
