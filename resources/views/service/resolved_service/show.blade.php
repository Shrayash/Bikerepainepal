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
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Resolved Services</h3>
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
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
                                                <th>Invoice No</th>
                                                <th>Name</th>
                                                <th>Vehicle No.</th>
                                                <th>Mobile No.</th>
                                                <th>Service Date</th>
                                                <th>Distance</th>
                                              </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($records as $rec )
                                            <tr>
                                                <td>{{$rec->invoice_no}}</td>
                                                <td>{{$rec->frst_name}}</td>
                                                <td>{{$rec->v_no}}</td>
                                                <td>{{$rec->mobile_no}}</td>
                                                <td>{{$rec->updated_at}}</td> 
                                               <td>{{$rec->distance}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation example" style="margin-top: 2%;">
                                    <ul class="pagination justify-content-center">
                                      {{-- <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                      </li> --}}
                                      {{ $records->links() }}
                                      {{-- <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                      </li> --}}
                                    </ul>
                                </nav>
                               

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
