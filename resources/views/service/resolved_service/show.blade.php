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
                                <a href="dashboard.html"><button type="button" class="btn btn-primary btn-fw">Back to
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
                                                <th>Name</th>
                                                <th>Vehicle No.</th>
                                                <th>Mobile No.</th>
                                                <th>Total Amount</th>
                                                <th>Delivery</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>
                                            <tr>
                                                <td>Waiba Lung Sherpa</td>
                                                <td>Ba-026-pa-2345</td>
                                                <td>9841203456</td>
                                                <td>Nrs 1200</td>
                                                <td>Self</td>
                                            </tr>


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
