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
                            
                                <h4 class="page-title">Order Dashboard</h4>
                          
                        </div>
                    </div>

                </div>
               
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 grid-margin stretch-card average-price-card">
                                    <div class="card text-white" >
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <h3 class="font-weight-semibold mb-0">{{$pending_count}}</h3>
                                                <a href="{{ route('service.ongoing') }}">
                                                    <div class="icon-holder" >
                                                        <i class="mdi mdi-information-outline"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold mb-0 text-white">Pending</p>
                                                <a href="{{ route('service.ongoing') }}">
                                                    <p class="text-white mb-0" style="font-size: 14px;">View All</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card average-price-card">
                                    <div class="card text-white" style="background-color:#407899">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <h3 class="font-weight-semibold mb-0">{{$completed_count}}</h3>
                                                <a href="{{ route('service.resolved') }}">
                                                    <div class="icon-holder" style="background-color:#56A4D1">
                                                        <i class="mdi mdi-clipboard-check-outline"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold mb-0 text-white">Completed</p>
                                                <a href="{{ route('service.resolved') }}">
                                                    <p class="text-white mb-0" style="font-size: 14px;">View All</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card average-price-card">
                                    <div class="card text-white" style="background-color:#DE6449">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <h3 class="font-weight-semibold mb-0">{{$cancelled_count}}</h3>
                                                <a href="{{ route('book.request') }}">
                                                    <div class="icon-holder" style="background-color:#FF7353">
                                                        <i class="mdi mdi-close-circle-outline"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold mb-0 text-white">Cancelled</p>
                                                <a href="{{ route('book.request') }}">
                                                    <p class="text-white mb-0" style="font-size: 14px;">View All</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <form class="form-sample">
                        <div class="table-responsive">
                            <table class="table table-hover" style="background-color:white;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Item Code</th>
                                        <th>Item Name</th>
                                        <th>Customer</th>
                                        <th>Ordered At</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($record as $order)
                                    
                                    <tr>
                                        <td>{{$order->item_code}}</td>
                                        <td style="overflow: hidden;
                                        white-space: nowrap;
                                        text-overflow: ellipsis;
                                        max-width:23ch;">{{$order->item_name}}</td>
                                        <td>{{$order->frst_name}}</td>
                                        @php($date_array = explode(" ", $order->created_at)) 
                                        <td>{{$date_array[0]}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td> @if (($order->status_id) == '1')
                                            <span class="badge badge-warning">Pending</span> 
                                           @elseif (($order->status_id)== '2')
                                           <span class="badge badge-primary">Completed</span>
                                           @else
                                           <span class="badge badge-danger">Cancelled</span>
                                           @endif
                                        </td>
                                        <td>
                                            <form></form>
                                            <form class="form-sample" action="{{ route('orderadmin.edit', $order->id) }}" >
                                                @csrf
                                            <button name="edit"  class="btn btn-box btn-secondary" type="submit" value="submit"> <i class="fa fa-pencil-square-o"></i> Edit </button>
                                            </form>
                                            {{-- <form class="form-sample" action="" >
                                                @csrf
                                                <button
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this category?')"><i
                                                    class="fa fa-trash-o"></i></button>
                                            </form> --}}
                                            {{-- <a></a>
                                        <a href="{{ route('orderadmin.edit', $order->id) }}">
                                                <button
                                                class="btn btn-secondary"> 
                                                <i class="fa fa-pencil-square-o"></i></a> 
                                                    
                                        <a href=""><button
                                                class="btn btn-danger"
                                                onclick="return confirm('Are you sure you want to delete this category?')"><i
                                                    class="fa fa-trash-o"></i></button></a> --}}
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
@endsection
