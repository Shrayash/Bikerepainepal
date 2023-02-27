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
                    @if (session()->has('message'))
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
                    @if (session()->has('message'))
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
    </div> --}}

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
                <br><br>
                @role('superadmin')
                <div class="d-flex justify-content-between ">
                    <h4 class="font-weight-semibold">Dashboard</h4>
                    <a href="{{ route('order.showall') }}" style="text-decoration: none"><button type="button" class="btn btn-dark btn-fw"> <i class="mdi mdi-message-text-outline"></i> Order Requests</button></a>
                </div>
                    {{-- | <a href="{{ route('order.showall') }}">Order Details</a> --}}
                @endrole
                @role('admin')
                    Namaste,
                    <h4 class="page-title">{{ $users->frst_name }}</h4>
                @endrole
                <br>
                <!-- Page Title Header Ends-->
                @role('superadmin')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 grid-margin stretch-card average-price-card">
                                    <div class="card text-white" style="background-color:#DE6449">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <h3 class="font-weight-semibold mb-0">{{ $ongoing_count }}</h3>
                                                <a href="{{ route('service.ongoing') }}">
                                                    <div class="icon-holder" style="background-color:#FF7353">
                                                        <i class="mdi mdi-wrench-outline"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold mb-0 text-white">Ongoing Service</p>
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
                                                <h3 class="font-weight-semibold mb-0">{{ $resolved_count }}</h3>
                                                <a href="{{ route('service.resolved') }}">
                                                    <div class="icon-holder" style="background-color:#56A4D1">
                                                        <i class="mdi mdi-clipboard-check-outline"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold mb-0 text-white">Resolved Service</p>
                                                <a href="{{ route('service.resolved') }}">
                                                    <p class="text-white mb-0" style="font-size: 14px;">View All</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 grid-margin stretch-card average-price-card">
                                    <div class="card text-white">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between pb-2 align-items-center">
                                                <h3 class="font-weight-semibold mb-0">{{ $booking_count }}</h3>
                                                <a href="{{ route('book.request') }}">
                                                    <div class="icon-holder">
                                                        <i class="mdi mdi-information-outline"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <p class="font-weight-bold mb-0 text-white">Bookings</p>
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

                    <div class="row">
                        <div class="col-md-6 grid-margin">
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
                        </div>



                        <div class="col-md-6 grid-margin">

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

                                        <a href="book_service.html"><button type="button" class="btn btn-primary btn-fw">Show
                                                All</button></a>
                                    </div>
                                    {{-- <button type="button" class="btn btn-secondary btn-sm">Available Booking
                                        <b>10</b></button> --}}
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
                                                        <td>{{ $book->frst_name }}</td>
                                                        <td>{{ $book->mobile_no }}</td>
                                                        <!--  <td>Paid</td> -->
                                                        {{-- <td>{{ $book->book_date }}</td> --}}
                                                        @php($date_array = explode('T', $book->book_date))
                                                        <td>
                                                            {{ $date_array[0] }} &nbsp; {{ $date_array[1] }}</td>
                                                        <td>
                                                        <td>
                                                            <form></form>
                                                            <form class="form-sample"
                                                                action="{{ route('book.update', $book->id) }}">
                                                                @csrf
                                                                <button name="yes" class="btn btn-box btn-success"
                                                                    type="submit">Yes</button>
                                                            </form>
                                                        </td>
                                                        <td>
                                                            <form class="form-sample"
                                                                action="{{ route('book.edit', $book->id) }}">
                                                                @csrf
                                                                <button name="no" class="btn btn-box btn-danger"
                                                                    type="submit">No</button>
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
                                        <a href="{{ route('service.ongoing') }}"><button type="button"
                                                class="btn btn-primary btn-fw">Show All</button></a>
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
                                                        <td>{{ $on->frst_name }} {{ $on->last_name }}</td>
                                                        <td>{{ $on->v_no }}</td>
                                                        <td>
                                                            <form></form>
                                                            <form class="form-sample"
                                                                action="{{ route('service.edit', $on->vehicle_id) }}">
                                                                @csrf
                                                                <button name="work_status" class="btn btn-box btn-warning"
                                                                    type="submit" value="resolve">Resolve</button>
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
                                        <h4 class="font-weight-semibold">Resolved Services</h4>
                                        <a href="{{ route('service.resolved') }}"><button type="button"
                                                class="btn btn-primary btn-fw">Show All</button></a>
                                    </div>
                                    <p>Check the availability and respond accordingly.</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Invoice_no.</th>
                                                    <th>Vehicle No.</th>
                                                    <th>Mobile No.</th>
                                                    <!-- <th>Done By</th> -->
                                                    {{-- <th>Delivery Type</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($resolved as $off)
                                                    <tr>
                                                        <td>{{ $off->frst_name }}</td>
                                                        <td>{{ $off->invoice_no }}</td>
                                                        <td>{{ $off->v_no }}</td>
                                                        <td>{{ $off->mobile_no }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endrole
                @role('admin')

                    {{-- <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body"> --}}

                    {{-- <div class="row user_detail">
                        <div class="col-md-6 col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">First name</label>
                                <h4><b>{{ $users->frst_name }}</b></h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <h4><b>{{ $users->last_name }}</b></h4>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row user_detail">
                        <div class="col-md-6 col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile No.</label>
                                <h4><b>{{ $users->mobile_no }}</b></h4>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <h4><b>{{ $users->address }}</b></h4>
                            </div>
                        </div>
                    </div> --}}
                    {{-- </div>
                                </div>
                            </div>
                        </div> --}}


                    <div class="row mobile_blocks">
                        <div class="col-md-3 col-sm-3 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column justify-content-center">
                                        <center>
                                            <div class="p-2"><svg width="50" height="50" viewBox="0 0 91 91"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect opacity="0.8" width="91" height="91"
                                                        fill="url(#pattern0)" />
                                                    <defs>
                                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                            width="1" height="1">
                                                            <use xlink:href="#image0_29248_1562"
                                                                transform="scale(0.00195312)" />
                                                        </pattern>
                                                        <image id="image0_29248_1562" width="512" height="512"
                                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAtNQTFRFAAAA1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0Nq0st9wAAAPF0Uk5TAA5Zm8rq+ppYDSad9f+cJQmM+4oI08cZMeMuGNDMgfOW9FeZ6+n5+BZUf6fN3u6mflM1jv6NNHTW1RKAEQFe7W8CJMXEI1Hv8o8GpQW1tKGLVfAiwmRfEIJy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" />
                                                    </defs>
                                                </svg></div>
                                            <div class="p-2">
                                                <h4 class="font-mo-block">Booking</h4>
                                            </div>
                                        </center>


                                        {{-- <a href="{{ route('service.resolved') }}"><button type="button"
                                                    class="btn btn-primary btn-fw">Show All</button></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <center>
                                            <div class="p-2"><svg version="1.2" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 90 90" width="50" height="50">
                                                    <title>image</title>
                                                    <defs>
                                                        <image width="90" height="90" id="img1"
                                                            href="data:image/png;base64,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" />
                                                        <image width="90" height="90" id="img2"
                                                            href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAFoAAABaCAYAAAA4qEECAAAAAXNSR0IB2cksfwAACzBJREFUeJztXf+PXUUVvyp237szc1+3rTYWRagl4GrQaEQjGkHQgimmGr+gYL8gX6rYWmkBvwC2aEykqLGNBCn0SyQt2W4pi6WtqbDY0C+2m5a2++6XbsWYmugv/g31c+57K2/f3vfezNxz732veJKTfc32zZzzmTNnZs6cOes4XUqjc+a4vuetDITYFCj1x0DKV0IpD+LzUfAxX6nD+PcBfN4L3orfP3y2XH5P0XL3HAG8xwDeqCG/dFbKdxYte8/Q36dPn24Bcsyw9C8VLX/P0MlK5TJroKW8pWj5e4YiIT5kC3ToebcVLX/P0Ljr3mwLNHht0fL3DGEhXJcC6H3jjtNXtA5dT+Pl8rsD2sbZAz2KbeEnitaj66kqxC/SgEwcYV894jgXFa0LK513nGk4OKyAgjvBG05L+X7btvDdL6cFeYKrSt2eRq9QiBvRxmoszN+Cjm9N01Zq+lt/fwX71qebtlcjZ5W6xrQt+OUFdOLjAhptHaq67k2mchCoMJzvNLW33Xfdd5m2xUIn4UsB8vOJPlKpI1Upl406jtupHVIs8rwfYIAOs4HcIAcAv3PQcd6moxOdKvH/f53UVqjUC7kf8f1S6b3ofERD2T9BwPvhdz9chYuZ+D4pfqZUmhsIsRj/Zz83wAnWPYSf17by23V9lmOw/9KuHejy4imlrswFZHR2hSbIUwWlIBB9lwJDWYPbysKlfAa8FjPup/i53jccaOgwchwDkynINHXISosAqZuY1qHXyuWLMwGZFgOsxC8UrWS3MGb2LtoMsIK8BgsWRnF70cp1GwPsp/ZwnkJ97CWLVqpbmbaCbEBj8VpVtELdyjiFbuQDWoj5uVuKUnuwM1iDQV58RogbzlQqc2mfOz5jhhfOmqWOS/mO+hZxPtaOpXBtD2Lm7clbTvT7EBvQMdhS3pWp0LVT4XM4vNwDgAds5TzheZfj+yswpZ/NAeh9oevO4cS5djRV6pcZgfwk2r6GMxBEbUVCXF+/uM1kxoWl0mVc8k6iccfxAsvDSguAh+DjPpWJsA2Efj6J/oZZwRbim5kKDX94a1ohKa4xptSdeUbFKO4CK/w2x6kUbmkwe4GVmpVGWJpyget+VKcvDMRFtACewqI3jsWPY2AoVgFr3J3SUL6eVg4tQmfbLF3FMHhmu7ZhLdeBHw/oqD81bHoYA7UjoFhFCpdDg4Y2dlgbC3Y9tn0bESlqAfLmTskt/8Qg1AM/+gMHX3leMwzaSPVY+hZja1bqgD1yhoTO7jMUcFAnLpAin2MIW7oPmOrxuhCzA8NFkmLwdqhZEKbtjw2sbjdNVd22IynvsXRLRyHXElNd4mAZrRua/aCPYdM+rAlKbdJV3uYO0cehxdKyaUewwlgfLM6QVeuGJ8zLddBBQFcoukGx7YeuoCwt+9g4tqBZ9lctlS6x1UubqnTa0lN4mFJv0/RFd4m2YNP1mUlftHXEd4e0gBYi27Qz2tdiD/mcjjCncRrj6DNF5HAQ8r7FpC86peq0DQz+rHvha0Xwf8s0LWorZ79YIL9rBbYQ3zDti+Iumjqu5tTxf4RpvEj3RBhVKtdz9x9n/5uDPfzv2bOFST8U3NIE+sgZpRawKTjxxMHXTG6h8GRSFA7bqC9gyv0utFioJsjGjcBArjbpY6TmHnfptk+3T7b6xPQfCrB73m0hnb7MlFve3NY5xynjQPFqg3AP2MhEJ0DI81cTedDXfab9QNbvGeq8AYPzwY4NU/AaFrsQq+mt5IfxeWPQIZmkpWJ9fZdPEdzzPp4w9VadN4w/0xHdQqbtJn3E8ko5YNxP7QHTxqrr3o6zw7XVcvlqLK6z3mgUe0KA+7INqFNYiL1JgqPDxYnTWqkfmgDgVyofsZGrMUtKlwKmDCq43UfibS5A/gkLyLL1/RkGoKVvDQ3cCNzADTZy2bzUgoX+igsX6LiSGjSOYLVsUKmliQBJ+fO2A6TU/aOO8/ZOymPN+L6NXJSQaQF04iy0YqU2OSYBlY4sxOeThK4q9aOOgyTlzzoCjV2LlQFYXKBi9nyOCxcY0m7yRVaLXhLTTUgi0FLerTlQU3w2WTo9t4A134jf77ORyyZ161SlMpfNAKV8hWLLbHnJx1uEQwODV1YYlCfqORqUp7yNUmV19/CJ1izlS6YgE8W50lxAK3XQ4cyyb3XFU+3vv4TROkx5gw3QlKjDhgv2/g5nrjIJ10pw/H6wEKCVutkGaDIaRhmOEdCpnpo1crttVGgXq0jFdP8YWeYx45A1gxHoQ2RpbAkxrRZDon/Vbp75km902TLR5XSl8j7GAT9A25hUOQ6NTMmI7YT3GQ9HhmAvMQWa0h7Y+ldqL7mOzYwNtr26opAllC7qacZdJkD7lNXEh8sWSvFi852UZttJgTHX/Zj2nSM3G7gRy8IsiRyHJg7VQpjmCTHJI5cYVGomTMuvFgJ0DewlWkDzudT9k0IA57DKRrC2+N4MIx9JuT4SQj9rqM666QUBPUcu6BlckBAzb6RqX988y0HcB+t9hJ41w3i/AiwXagW0glLpUljfb0w6owQYHaCJ4LauwmL8YrdZdsIT5bYMf/4HugI7P29euodDdMmp3amUu0wSyk9VKv343sMFgT3FZ5PsBq8FDgPkO0wvMNqD7boLdBMQQ4tH9+THxpS6N9DIhcNgHqRInm8ZNm3iSbsR3bwVzMQj0POLbAA3UqR/OfqkbR9kHeNSDtTTd5fVrX0tBvmBMSlvoUE82eD36u/J2dyIdrqb4XbRiChphJJHdATJ48nEBGERX8jhRnQTaMBDmRdeoXQoLfch5Y48n05QvTsGN6IVIsDMui5zhV6bOfNiXcGpZkfmAjUQixvpxDhs2SS+W1G9HISWULrvVbiICgxmCTRV3MlNGQCdWHkm0YXQnWSHdyvclCnYhikSqSg0SJmqCzecd3HWzNxIVsmNiUrYXOgqtZm9vkUHii2b8WKDONIInLHQiRSVcEPPGzR5z8JBEc9u5A0fjVNjLoLDbXwt5dTbHeVVAKpOrG5EqaMUgMtc6JDjkhXCRkIsSvv0wkhupZZygZ0m9ViL6PTEOQ3rL2lZnmC0o6pSnw5SvJRN4JF2N/6piC5eWdPHJgO+lRIYOY+1FDOJs/eV+n0WMmM//ega7pMv5a6hcat0LKMp6XnPBp63nALvtrKS//drj0J3Zi0v+G5OnMkvP5iD0JNBp8IjQqyLXPeOMc+bT6V+KOWMElvi5BYcgv5Bs0zKz9KNBgB+zLRYIAsLMZ8NaEyTp3JXoFdYqVV8QBte7byZOOR83Ek1ov9v1QnsedvYQ8FxfQvTGMcFzFTmOLOa0pQwGBZQW67bGLN7T+a1pA1qRzeOPg3OeiolTHkP+PyMb5EzwsK1XJIR7Zh6sy5SvnxSqSsyBXmC6jWk2+bQ1YteLz9RKl2a1AY9mYhqN8557Hf3Y2AXkZE0HoqqAwPT6I/r0GMlX6NcMxmMn3Xt6GaK3ye2KHNMzyJ0489x/Q+qEplBPl5czl6pe3UWLCrXFtBbmxYzDW09fy6rmtGdKC6T05RsQltBmxILVc+7ifM9TfxkxOJRPB3bmx+40vUVhYdN22IlAjUOQyq1ml5OpWmLM8JGeW+2ckTTpl0JsH8Lo9lJdU5Za0R3A9HtMscDUww4bwXcC5EA1GdSuoxXM6u/fyER/UGxIEWkEAv0o0Xr0DOEo619YrzrWj13e1NSqJl21sKirypa/p6hNAkwr+d9oOhloq2ZLdCF73d7iehUCReglR48yW0ota5o2XuO4tIRUj6Ew9AWvxaUotjJIb924jsa1v6K5wg9SAXAT+PnyjzTF0zpv9oSYi5/i14DAAAAAElFTkSuQmCC" />
                                                    </defs>
                                                    <style>
                                                    </style>
                                                    <use id="Background" style="display: none" href="#img1" x="0"
                                                        y="0" />
                                                    <use id="Layer 1" href="#img2" x="0" y="0" />
                                                </svg>


                                            </div>
                                            <div class="p-2">
                                                <h4 class="font-mo-block">Services</h4>
                                            </div>
                                        </center>


                                        {{-- <a href="{{ route('service.resolved') }}"><button type="button"
                                                    class="btn btn-primary btn-fw">Show All</button></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <center>
                                            <div class="p-2">

                                                <img src="{{ asset('assets') }}/images/cctv_foot.png" width="auto"
                                                    height="50">

                                            </div>
                                            <div class="p-2">
                                                <h4 class="font-mo-block">CCTV</h4>
                                            </div>
                                        </center>


                                        {{-- <a href="{{ route('service.resolved') }}"><button type="button"
                                                    class="btn btn-primary btn-fw">Show All</button></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-column">
                                        <center>
                                            <div class="p-2"><svg width="50" height="50s" viewBox="0 0 114 112"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <rect y="9" width="93" height="93" fill="url(#pattern0)"
                                                        fill-opacity="0.35" />
                                                    <rect x="21" y="19" width="93" height="93"
                                                        fill="url(#pattern1)" />
                                                    <path
                                                        d="M77.8785 23.592H66.9305V34.88H54.1465V23.592H43.1305V11.556H54.1465V0.199998H66.9305V11.556H77.8785V23.592Z"
                                                        fill="#D70D0D" />
                                                    <defs>
                                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox"
                                                            width="1" height="1">
                                                            <use xlink:href="#image0_29257_1570"
                                                                transform="scale(0.00195312)" />
                                                        </pattern>
                                                        <pattern id="pattern1" patternContentUnits="objectBoundingBox"
                                                            width="1" height="1">
                                                            <use xlink:href="#image0_29257_1570"
                                                                transform="scale(0.00195312)" />
                                                        </pattern>
                                                        <image id="image0_29257_1570" width="512" height="512"
                                                            xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAgAAAAIACAMAAADDpiTIAAAAAXNSR0IB2cksfwAAAAlwSFlzAAAOxAAADsQBlSsOGwAAAwBQTFRFAAAA1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0N1w0Nq1pyXQAAAQB0Uk5TAAQGA1Gfzvj5yJFTEnbg/64PHJj22y4TjffrDH7xnAdv6v4jYeFkUtahuqwFeJo40n0Olf0lQ+TBi0kqz7trMBa1oEHpafuFvWop2E9yw4ZEj8kBTqhYsAi3Y+ICbZLzeUzUcNmyqYBFTe0m8KTQVxA5/L8ad6W4tApzMr7swjen8kbvmYjFXQ3mo4r1tpcUH0o9MSQYC8sRQGDThzyBIavGYtzuljbEZ2Yig7x7LYJWWTV6PyyxM2idnpCOiYR0X1tUSDonIB4XFQll9N/d+h0ZqsDl539Cyl5QzSjaGzSUS7nom+OiblpVO9WT3i/M11x8pkdsK6+Mda3Rsz5xxytoVSIAACG3SURBVHic7d15nE/V/wfwOzOWsX4aBl8kDBVZxjJ2SWL6hlJGlpB9X5I1QkhZE0KEJjGVtZItRPaMZWxpUaRCK9r3b9+ZMWY+n8+95973ufecez6fz7yef/x+30fucu45dz733rO835oGAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAG4KC1ddAlAmIkfOXLkj8+TNp7ogoEL+AgU9GW6IUl0YcFuhwtGeLEWKqi4PuKrYf4p7fJQoprpI4J6SN5by+LtJdaHALaXLlNU1v8cTU051ucAVEeVvNmj+VLeoLhm44dYKxs3v8VRUXTSQr9xtrOb3eCqpLhzIVrlKNLv9PVVVFw8ki61m0vweT3XV5QOpatSMM21/Ty3VJQSZatcxb35PXdUlBInC68VYtL+nvuoygjwNGlo1v+d21WUEeRqZvfxfE3eH6kKCLI3vtGx+j6eJ6lKCLHc1JbR/dCHVxQRJmsUT2t9zt+pighxhNSnN7ylbQ3VBQYr8/yW1v+ce1QUFKZoXobV/izDVJQUZ6uun/RhrqbqkIMO9Fn3/me5TXVKQoRWx+T2e+1UXFSR4gNz+rVUXFcRLKExuf08b1YUF4SKa0Nu/WoLq0oJoYQ/S29/TVnVpQbTwdhztXyRCdXFBsPYdONrf85Dq4oJg4bfztH/HyqrLC2J14nn+ezydVZcXBHuYq/27lFRdXhCrK1f7Y0lwqCnP1/6eWNUFBqG6kab/ZOmuusAgVIMunD8APVSXGESK6snZ/pEICxNKEnpxtr+nt+oig0h9eNvf01d1kUGgfpar//z1xzBACBkwkPsHYJDqMoM44YO529/ziOpCgzit+Ns/fojqQoMwjw7lvwGGXd95eP0RI/876rHCWCActEYTV4D4GKNp7R8v/8DYcZn/ZfwTqi8E7KGtAPRTdUIF/9+NibgDgtIkO+1v6Ek8BoLQEKv4TxwQKSYITRbX/ggZHYQep64BJHlK9eUAp4SnRbY/IgYHnSlC29/zoOrrAT5Tp4m9AaarviDgM0Ns+3tGqL4g4DIgUmz7z8yv+oqAyzNi298zS/UFAZdYwe0/+FnHRSo5+/G+c+Y+N2/+Aqw7l+8xse3//EKb5Riy6IUxrSZXGrZ4mtcjKaZUtUpLyi9tLPKCwccdQpu/zot2Esgm5nixXUHT4w6s22dRaeHXDqleEtb4XZYVbsk7RbD04y8/XJc4E6342OpLsRBZtOYiOoFjlt/QJ0c5zud1/tpjpi/mXIbkWZH0ipx6yLamO2z7Uq8mvfYo7/rgTkVX5mzBPQM5Q4UCw6XURPa0ysY8MC8vJHK/puefs3rNREcn9Qx9ppuMusiWqjprirVcJ+u0zsEfvq9cOfCBKEIxh52AE8l54hbWf/12h3/4vqq90UlmzWQTZZw2Q8P2hLNMnfOfhmL+8H1UeBO/Ak6Z5wGl6GDx3V960eqneV/1yYYNcKeaQtZ6AY3QYh3z8BGvdL3dOtmYE8XfQseAE7NENEJMrw0Gh07YWGYT/1JDftVkzEKvvHnL2zdU6j1h5PQmW2+aPKvmw9u213tnyY7X+1Rf27XAznvLdG60ZeUt5d+dsqvtG7tztOw3Z8+k2ndtWLo3dv3m54pubLCvVrn9BwoNf+9gsSE1SiaXrhy47yrJolro+ba+3bSrDk2g5BkTIu7hZNH18uaTgssYEx9Z/PDEgf1LNJ1Wp+ORo0VaVOheLc/0t1aJLjgvgTPBUhredE/ssRqpb2XHd71t3q0vXK79QmulhtO+MbKhJxRn2jsp/JJiugieXEIyTmSUikTeIDlOnFK6iKachE8zNeLETUK7431XS17qgLCS8zvt6qXKVUlQuNIPqEmyROkgpty2fOjytUrVXcgI0UfuP8E+FlFuWxqHzBMgXZFjjmuktMgFclR5BDSlPR8puFqZjiQ6rJDEM0rKbdSL4gq+mPBBoCN5ZMpQG9Ff/0R3CmpPXhEr1FyvRNOa26+OIW8rKza7L12qpcouWJ6mn9itjZaCV8fxULSSrpW6K5bnUztzkjXtoNLHYbyavgAbQQGDwGN2Rl52jbM+sEx5hTcuwVm11yzNau6aODdMdZkPq4i4LjgkQMCIycFXD6seDIDukBvltLGpbaovWpYuDThq4dm8KgavdEqMltbOTONVX7Q0n5LD1ya/5XbPP8shmU1tKEHoDN3AciftRbBGD4Gh8RxyP+3GAI+nSG/Vly3LDkIFfPIZb3IkmU5Jb3B/bT0zi2o7nS0LClgxViNsCec/D4BXP29iJzUR1PNMSf2/tUuovnA5vjDtD6rRw05cbLlmu9Tumf77Zfr/m3dB9ZXLUZN54REbkgLptz9DtOtLXIpkBHIK0Tsgbr3hVZfMd7G/6qIZGuxi06dLvOf6/wrRO+CMPlLF/JV35lZdLJbqrrZ+qlpZ9TMv9IaF01zyveAGXfME2GuftyJKo9/w54oLBqWOZ1xeRIOv6q1RPNpjZY/K9k/7IghFvTUt+YkthVvLXZwowsS2attfCxMbKzxQtNNlswlMDZ3NZBOhUID/Qoayng8FwvrmHqqrIbvK9XVgLB1Odnc9FFwzXvHLnxf8BLjvsW9Ut7oX/AS47tsHr5tepfYC1TcAfgLUmtZG9Q2QfFh1HWRz21XfAeKDRQCX84pvgCWqKyC7m6Y4Gn4b1RWQ7RmPYLvmoOrrz/ZeU3sDaMtVV0B296LiG2CQ6grI7vIpvgHyqq6A7M5pgBOnvlNdAdncJsXtr9VUXQPZ27j3VN8AW1VXQbb2/V7V7a+9qroOsrGCeQXFuXQCs4LkGb/omta6f6ma+l+/UREfQgcdQRL1y6jk+R39/yVyqdJW99JPRcVkE8sz531d1i1LK6H66++6iypqJpsok1XNbXSJWr+toazNvZV2I71LNjVxqldF79T98yjefMtS4AkgRrxBtpRtPjWtj0j6naI29/GYC5UT+oon7b+i+49x5XxqurJ+6s09jEZx0RMu1E7IK/XUe0YBeHv51XV+XXiKoZOUNLq3UW5UUGgruzYtOtlL+n+o7V/Z+3RhyQc6iHItxF43aiik3dw5PXndAf1yxO766r5fl0r16LPuNvi5PL4UhsoOCVdfyFjg947+34xCAG7RbTU+3NUboJYLlZJ9XMl3vaNntD7YRn/DtJb6OK05XWz+1K/+kIwJocYwr6SF+r9szxLDBoh4RrehuMx3FIETIzO4xWyK9arVhAq6DeIZuUFrdNcdijPKtTP3uVI9oW7ooI0+tTpJvwkzBuz+sv6bHn5OerNnQc+/c8Vn+Y/j6H/XPex5Hnt1IcvqCEl9SPOiGzUU0ia+M9+/Ugfo36yeN2mDH/RbC8+DzvSCG3UUwkr8aBCT/jP9dj+YNcIO3eYvuRYwdIMLlRS6Ol4ySvAQpV9g/b7p132CvtuQEudciNlu1FOIalHeOKzTGP2mFqlgkp/X7WH6kyFQRIr8igpNZ3YzwjpFHNFtm7uxRTMM132O53ZrdvBRV2or5Jxkj9vl0G9t3bv3+Ez/fcq6lDlgjRvVFWJiej3KrtBaV/Q7ED7sc+i+HLq7M0XsSxcqLLQMHcnO8RvR0igDSV1KQ1TR7faMK1PELrlQZaEkd+FVzLp8b+3NhvvcSmqJJrr9XEkkOlw3OxXYJs44zqzJpT8xUg8WpP0lh+u75ZuJamUzyvOlBo8S1ReyarHklmrM3XYSW+JZ3Qt5/P2CGtnMEwGRMjMIXCjDTOvZ4DuTxJOHyfkrG+im5D/5iZhGNvWazFoLGT1fZgXzDvva/Ec0id4UP+smki13Y7kgAsNZYgfzPtvHYhpdDM8f8S+63eu6EURev0gFvNX9mVVzH1TSTev0N4qrKfTjSFsdNy9B+eBIqaFIN0atRV26Sti7PldLRHyuO0AB5+1rrWVx8fUWMoz7ZC9PJkVVbsE5sBulm00W11JAA1vaECj50wOQwQ0QvouaXqkRb0us0mXxPfyriBa28lxTwdUWOnQ3wOxWunl8LAP5Q77M1X2X871G2DVPP4oJ6XxvgIQ9vTg6T2fYaAn9LK0PxDSxheGLBVZaKPG+AfLv5IikO/S3+21N7XrK/0BfCmpiCwtDM22gY1k3wPqcHC/LX6w+ZrMhEn7zO1QHMQ1sabTBdGa4fgMkl9dP3GIb39ZBD86CXL4HyyWmfa1VHim05kJE+g0w73eOfPNdkjZaVbW5Qr7di2+LaFyShIcFV14o2K9FtBnFsYiye6Op1jVt4ZxPpuOvBTQtVXXR1Rf8XulqPM/DUErvDULaYbfXHbfc1fChzTBDxA9HhdS5kT1hhNOYzDtgZlFRx6R5AxMEbFpza5jAdqifEbN3GmssQpq+SB1ow8C8oidvFJpRd+bh1n0UhI9+BfGieTU8JCXpa4SsNYJhB9Z3u2Xtw71Pthg3MNO0hqMqzhjzQ9/L89ddUF2hQSVykPog/3SjY5t9eUW3JN1XHEaH6QpWOai6TakSNo8ZWQEv+SLFdOjHmiwWaGrk24rU8IL1/72cdcVnSF61uXa+W3beXXPkia15d1Rp9NHHRd0LA6E13zk2RXVthZwPX2hPq/3GkwpMuGrwyxtTcFTeZh9EyW36VFHNculPDs4Uz0lK8Ru+p9UzFtOGh364pK/M34KlFaPNCwD8lo/JT6j65I+nE7Mv5B5W/bKU1o8aQ5m4Clzieu0hfJ5PbXuCr0Ot2k7hwcGmVteFowanyraaTaj6u36z+NI2EnfbFJHdSSW7coxgA83TuwjBnCMeuWL3+F22i/oZGP2HbnoxOHR4MuVBPbrz905OknuWkNgwbQxS1oAjVy9RPtgar3b8uxvfZJ/T5j/QTsQVE6QMbNqxSPczy4aN2nTnmvGtB1c4WqesLtxRKIj/kzQ1u/IIIVcfV9FRBumwP1wbz71qNP+h/dnLH7zRrPq2QZ8XSXGrIHJNe/Esqebn6kJ/2zWws/0AQQP+ElUKgp7m7ywRiX231LuhWnBPMBj/NW2Cb7GtIrMv5Iq1PqOhfu5mfizCiIPva37ttzZ94Wq5BKK9lCW8LHgWRcxNdoJDJPRxOwfIcvLyh/2PPLAsGMeZSTfAAAmZF6Yt4m7/qL/FF8PK0QMcBay8/pffgu2BQLkB2khZXT30R86x5l8/lVEMK0fYkfMMte9WNagGpq1vgIQXZf3ufs412WS3Lie5O8Zx/1QlPHG3sBdm6SxvgCiJ+XZP/UOu1E66RaWuid/CewekWvW/k8GRs8zqBpD7uzuUGi0yXMHjP0uSrRnx87YHw2iVxQ0g/Xf3dVJdhvkvKXbZWHsB7RasZEfYDBTmN0AZ+QWoSugU6jRBfjnMHbU7o2HDS5ah1tQyvQFcCbb9m+Xcs4StbpTDXGRXu72XZ1cHdIAisxugsztFGG8VbtYgT5UCy+bZvAO08EMB3E9ocgPoI3tKkocZpzhdPbfKYeGw/fjmU5fYmELjDvYN0Mi9Qjxj9pYdQGv6R5GGBgwl6pOnBYbl/2NMBLjHzVJUZM9DPB9In9OHb7Q/xfmfM6pLz9ClZnOD4v7gbr2/w6q22QE29e/CLttLWjuVD9Q+4pjbuvl3y192e7r9/4wrLby1y+WwlsckqZaFkncH7Hih35NgoesJ92LaGFZZQIZ1OnGH7VtgnZIBLRLvJ0GCxP5/lhVGE9LnuF8OklH8Y9kZatyguuxsWU+C0ypO/69+atKCwJ39+29Lu+8COwO5a/Dak6C+mlX2v+vqaoaSchC1GNPY3h3wT6C+C6ZLfRIkrlB07n5+NdUgRVFBiOJ/62drmPD4eNUlNxWj7MOrv9/0q16qCkL3fr0NNqLmhv2uutwByjdu9LOB/LDMMrFdM85ZY6luRQ4TQ/m8K+mQ06NFLv68yZLOu/cmHhsguSO2yGfdOFe+7tNlzwlyy09O+M/Or+7al/jN7ktLKt7WPcXWUS54V6OzQaBSEx7JylB+UP6KrsixIxY15rgDkh8InYBWKWt+0U2ejnqz90Qbh/JOQpLTfolOzfrZZ6GzW9kjx42fXKYvbaGVps3lSM8RwEr1/ooxnh++Z9Yp3qPFe+WQ0uecJ7rS1+8bfaGde9G+Uv9WqvrUHw/l2LDu18vnYufedT9j1f2CzwJpoMueU4dMQwok9L3CecC6WTtvtPcS+H1bXReNko4tLx8mMurng8Dt6SIptdZ8KkfaLdCWM6CAV2dAj7SnZMy/XPG9x5XR35FTVXVsZBqYT1eojKJNVl00ByK3PWvV/GnCy3CtK2zttWtigRErC33AsXNKK6PZDSM4L0yGz0ozqmdS0EYufon89RvVKoXjuH399uYYmCphuNBkdEBMyjzDmlIYFQBTXm0Yeona/Gn+4Qjpc9J31330F6XFxvPbeti4PAlKPcKqnfMWwRYDUf/aPO2vafs58jYu9dlzFnm/TcbJB0pzf4rIUpg1AX7hdNVF49WdHkY4Q8lN5IP7JJMtRp6atISx2HiLrSuU4i9mfKSPA3jiuIF2NjKHdaJ3xnivwnmLuE/MR4zzhgVS1uAuu1jVU6y36rJxOGUv0dNH1Kf5tqx9wqmPx66ss+qTFSv1NnNa8dfBFPpwWA47C6W6Eo/eNGuU/RHiLiNZ5+wUaJPwujdgFbVxAM8W0ytYgBJR2g81d+uczD2IP4ytmesL37R9hbLMfIFZP18F2Bx4c9Ffcj8J2hMneU+4vkM4rRO/DjOhYUIgZo2vyBw6Pq40DAK/k7dyPgmO1yEdN/r6QO4e2ubnmCfM4eTypLm6jlngd92Ng+fYzSP4Qieco33VvZyxeWHS1ivZ56Mtx3J9ZD76FmaJC41yuzAORd/EFTthJemgGXPDEkjfAIvZ0cbq066hkfvP3pHsL+lD7g5eC1B3N/1J0In0UJ55bUjvCdLpz7PP9jTpAJ9GuBAJRXdS9vKi2WvcL45DHbuSBgbTnCcdcG76tq0omw5jn4s4kFheq1yEtqVIudnhBhLuCbZwkx5P8a3UBXPDKIfrk74p5dcixiS/1VhS0QtWVvSyeKIGs+Sr6ko8b6Urco47/mvSMon1lA7B8WlbLqC8nPVmn2kvrdzpf4mv0rYVa/lmZtkTykhbn52UoO19UM6U+wtvUZ4ElM6dlLRP5VjKhibDUs+QCn0qfapGW9K2okV2Zpe+Fu0FhltS+oy5szvKSjl68ZzPWd4A5VIIB/o5dcPXCNu1Y59nM63IPdI3Lq1o2tgN7AhZnXbKiCaQdH3GZOkXJIUsefUNqycBJeXLDo02FYDdr6rRutbLZkxrVBWK7Mgr7CtoLj48RpL3jNlvest5EnS1uAEoA3R/pm63zHqzoexnzkba4GOVjM2fI20tQcq97JqK6Mo1I9Zakt+M6UJ3SxiDTGH2zGd4dqj1QbqnvgcRwtTWZZ+FFl10RWaHzGDS9jL0MhlXWyf0d9q//VO1L99Q5BnS/GTR/ppG+MaJjNBqEc7F/usZQOvfPZ25QyvS9lJ03Muuq7DTKcLOY9D+aeYKDmdrnQ/oXsJRymm7CVuxZybTFpZNXJi5QxvSDnLEFzCJN3KHqDxZjPZPdWyboFOk+dCy/bVVhMOcp8wGW8w8xX7aTb0ka4/GhM137pGlsUl1he8Q8hfKbn9NKyriBBl+sL4BKF1891ICxDzAPANtMvFM75wlhMhoJsMOUp37lnQ5pszaX9vg/PjXfUHIP6w9YH2cwlpV642YrwBnabF5fW6gQdbbM+d0ylb6HcKLsynT9hfZFf4i5XoILwEnKD2Gb7JO8EgKpay5h3MWqhGtuWSI7Um5Iibz9tcecnRwb5bfgOkIM/U6aISZERuYZzj2HaEbLclnl13WO6ylXJwkydsdzFuxaH9tp/1D+2FOz/VBeOS8qv1rvdEAk3PMr2c1ppriG5uSMP9MH8nOTfYjSli1v8Bv4CdIlzLA+kCDNUIUHfMFKsVWm0+w2+q7+Tnr891EujppFnxnL6KEZfsT594RtLY60zVTrY90VLNe09fF6jxRa02Wpg+t5btxonWhKtEuT5677Kxzsm5/6vR7a9TXZOte3rKadWCnT61PtGAMMy6n/9OKcFeuIV6ePDYiShDaX7ud+6jG3qd8A6axXq8TrVn3fgymnKr9Lx0Nd4751X9D6+u7j3h5Mk0yvhwmSvtropJD96FehfXIS7xmnXbxC9rJKt9i9Pb0p/9m+62vr4PR4d3GF1GC1P5aB55DskXOp16E9WroJzXrOz2OGqo34gf9G6Vu5sqj1hd4gnp9cp2nhzygtb92gnxAU4OoVxBm/UnbkfIVQA3Jp2kJu/1GPR/TbZLP+nxbDY6sAjmiBLH9NUFhakwmt/g6a32sChphOgx7TZiBbnm8d9WPWRLS5OXlOZ9UtIgS1PbX8lKOZikPufiET+7WGmF5hHGeGab7T2buafA+38r6fDv4zidTsQeti0tuf22H9cHGW99yX5FLTxh7X6MREka/xlttS6/3Lxt0IhNmEIzgPZ9MlhEl6O1PiaSXFP7Dh+ZbvE+PnE+Y7/ubdtF6I/JXR5Zz7dJ604y+5whjD/fwn0+ixn+aFpaj/SlZIv9K3Sx2ZIrJFqctT5Opj/X5LmqvW29kMimcbd2Dcemzzv0kEDK5zNHvppRZRAme9qdk54pLX8d0/EXmkyDyPfr5CBPDX6eMzkVbhqo1tM/olyPW+nQe7uBosh1nZlXhan+tHOHiJ13blPkkmE4/3WjCsqddlDdFz8c8V2nuKeuz5babQl4iRkQJvvbXIggTaLJmesT+lGLw7yaLNP19bH221C88Qt+8pwnXZZpqYX227uLOJs5Zo148zvbXtO7WV+/94WTwJPiX42xNCE07VSMMB3rGCfub3Ecok673ODDcoosowd3+mvn7ZLrDPpFYw6f4PQmYs7P0Igjhw09ptNXd7DlBnCghxVuJOplgB/y6TPjbnzQj5Be/fXyeBNM4sqdRpqCO1Wgze9nzgjkR5h953hV1MtESmnnPfnrARlLTdwmX31N3XK8nwY0cJyPMCfbM0mhpwy5QB6AtlKPMtdko5lwyrLrteiE7GnziWttIuHxPff1+4VOeT/8nnm/AcEqKhLQwWpRvk4zV3Y4ROlY9TcWcSpK9f6e+CkQvW8IOO2KKklRhlOGe6U+CixynIsXvT1/zdTNhw3FGOUK4kcKWTBBxJpmGN7f/TkxZSxvzifG+x19vyjEsF0XJIHMkfVPK14L36i77SIGL2MH9QsAtlBpIYu3Nkz+XFDb+2vTbjyibRhdyeu2kntBUrNxfIYEwJdbjibeO/2KpECn40bWPykKkdnE+S4MWvPB7x+cJaKTsboNtpMr2Q5t7kvFOSQrfF+f45bw8qUxfOj1NYPuSVAk2xl99bSStb7q+7JvywejxPM9MwkCTSAuT0tLptQe2lqRKSOEKDKyX/DzpNNdf7IiBeyY4KtNUWkj5cc5//QJaZVp6x1zUibjGaIF7PJlZNarRtv/RQZE6EdNZ1XR04UGgJq0eHE2L+5F2jjOZOxBXrcbksF8majIr68g3QS6WWBH+QwIcchDXNmb17h0nxkU4bPvRRJh2ko6wDC3YEdMrxZjEZjR3mRgDO96rX5m6ZKUgR1+0t1hqNM7qdq86eFQnVsXQr+0d/z1qrvQ7vXYiJ3363tbHYEtCLMJ0MSHdC3RNInXxeYqtWEkbyXnk23rtRRo5SjexH/PUTF3J6+172bnkYMOcYOivuI07oB85EYrvCO8l6m6eON5Z++2paew8HIuegtkr5OqImcH7UTyCHuDGNy95Mkfy9+nM9IFGjnOEYr6d83KDFEeYgDxcz8T2HOmxm/r161HmamWWah69TBtoKeyuETbzLLDxhAscyPEqOC+P9fEy+f+QT+WJ5J/y3UHDEug0p2cz9wRGYAhXcAWKmExMHnvwuxSOo67QBX4iLCPyMvFHwmKR4VX54i7u4a3IYEXL1JlZ10sIGWJG/8iXBk8/3LSQM6vftEMW82Km7rAOP+Rjmc3qDEKEHA3eDtdrbH68iEPU/O8Z+i/UH4SWbNJLz9PsjsGwu7bxZssZSk2IFgLu4A1JG72dMU8szeXT3PFNjdLAdrKROeXIAxsMfgcW3HrRRpLQbcKqNwjYCBx/JKmfQTrs1L80GzHtWhumgd1sK0jquJyNcsTOzuhUKFnrn7Zj/raVhWmazXm2wakG50/2NZFrxtR//GxG30D47Edv/cXOX5rHE8dIpEccqTQ0rtrnw3o6Scfb1rhMocpBAr2Ycd+O/XwxbV6BMdaY+xA5Se5IskkfUBZRQSNtKMtMokcdtBVvpllA6pA0gPMbSSCTQLO0FEAS2B78Dl6UtH5S5DQp1GjCAnYZKrpW7QGkopq67m7ahddcSUb1CgbfN6FvASFGp3iHm5uXaoqCMkUH8HpgmTZKS11uYopVqW5yv0wPuVHbgUhcDiEy62QcyZLyqbMx10KGviS36/ppwuqe/AKy5/H407BbMnvoRAgaJNK3pKHlY+QJgiKcLC27lgNZ6ZPWNSTOhWO0UjXgmRzi0F9CIk8EryhRKYsJVjSwLs81e117PT1CSoAYyo7bSVBlS7RJ9nR/c2wN6PG7UMu6LKGulktP3OJcIZjnWqcSEqAC8ZkU2g5cdaOuVyzlK9U6WwPWfJYRpzuGumI8s3ltqsPd2bafuIjRvr8dRpwIHQsEpRNju3qAv1QHr8gt01ZnMRBCSuVBcuv632J2SlVSWKZTA/EBlRdGuYTTDpKWW7poL+GDpm2R9jFw4Ruh9RcCFkl76Yp2MNZyh6QXgTtt/SSFtoOEbEp2tFjnpFRTf5JQpPgCNgJth76EKtZ5nPmNLGl9ZlMPCe8XvsrRI5W97BXeI7DiZeelOpiTHN+BYmYVQaHnQ1F4V6FTRWNyEhfxWvhG4IDFDTY+SLOT2Vzrqc39JexNO6JHKTFFWm6QDAF89RM0OlSqh8jsa+/9LmC26IXO2Xrsnyr5f/S89UyHf7cZ0I2p2Grj1Hlk36/Ew5+o9BaHvwIDV8v4zo5aSwv3bKjFR+j55RD2AveK7ywl1sqaZbNgC2dkgwzxvXJk44l/9nTK0ctet8CyLVJXWdRaTQ1EmenMJTEfI9nOwUtneOu64Gr5U2wSFm3leBR8P+NX6SUKYb/OIAf+TP3p37rIpS7WhKI9ehFeCS9cLD/bnQKFstnlLxImjT25qUxRdzvYI9aPeKkac7RwYOuKKzHfT5haKyu2Zv7FFf/rxB+bFb1jdUrcUyZp1LLFBcdFphUluunRwff12r5yw3w1xQlt8zes3N7rvsFHm6bP2Y4cV3DxslFJZfbsD5D36/BiQ0T2PIGJiCHF0KcCAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAQPJ/7Rt9mEGDK8sAAAAASUVORK5CYII=" />
                                                    </defs>
                                                </svg>
                                            </div>
                                            <div class="p-2">
                                                <h4 class="font-mo-block">Add_New</h4>
                                            </div>
                                        </center>


                                        {{-- <a href="{{ route('service.resolved') }}"><button type="button"
                                                    class="btn btn-primary btn-fw">Show All</button></a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <div class="w3-container">
                                        <h4>Services</h4>
                                        <div class="w3-bar w3-black">
                                            <button class="w3-bar-item w3-button tablink w3-red"
                                                onclick="openService(event,'ongoing')">Ongoing</button>
                                            <button class="w3-bar-item w3-button tablink"
                                                onclick="openService(event,'resolved')">Resolved</button>
                                            {{-- <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Tokyo')">Tokyo</button> --}}
                                        </div>

                                        <div id="ongoing" class="w3-container w3-border service">
                                            <br>


                                            <div class="card col-md-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <h5 class="font-weight-semibold " style="color: #E15517">
                                                                Ba-012-Pa-2034</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row user_detail">
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Vehicle
                                                                    Remarks</label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->frst_name }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Distance
                                                                    Covered</label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->last_name }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row user_detail">
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Service
                                                                    Started</label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->mobile_no }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Status</label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->address }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                        <div id="resolved" class="w3-container w3-border service" style="display:none">
                                            <br>
                                            <div class="card col-md-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <h5 class="font-weight-semibold " style="color: #E15517">
                                                                Ba-012-Pa-2034</h5>
                                                        </div>
                                                    </div>
                                                    <div class="row user_detail">
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Vehicle
                                                                    Remarks</label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->frst_name }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Distance
                                                                    Covered</label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->last_name }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row user_detail">
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Last Service
                                                                    </label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->mobile_no }}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-3">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1 card_title">Total Amount</label>
                                                                <h4 class="font-weight-semibold card_info">
                                                                    {{ $users->address }}</h4>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
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
                                        <h4 class="font-weight-semibold">Servicing Records</h4>
                                        <a href="{{ route('service.resolved') }}"><button type="button"
                                                class="btn btn-primary btn-fw">Show All</button></a>
                                    </div>
                                    <p>Check your last services.</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Vehicle No.</th>
                                                    <th>Invoice_no.</th>
                                                    <th>Amount</th>
                                                    <th>Service Date</th>
                                                    <!-- <th>Done By</th> -->
                                                    {{-- <th>Delivery Type</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($records as $off)
                                                    <tr>
                                                        <td>{{ $off->v_no }}</td>
                                                        <td>{{ $off->invoice_no }}</td>
                                                        <td>{{ $off->amount }}</td>
                                                        <td>{{ $off->updated_at }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                @endrole

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
        function openService(evt, serviceName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("service");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
            }
            document.getElementById(serviceName).style.display = "block";
            evt.currentTarget.className += " w3-red";
        }



        $(document).ready(function() {

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            console.log(CSRF_TOKEN);

            function customer_search(customer_query = '') {
                $('#result').html('');
                $.ajax({
                    url: '{{ route('customer.search') }}',
                    method: 'GET',
                    data: {
                        customer_query: customer_query,
                        _token: CSRF_TOKEN
                    },
                    dataType: 'json',
                    success: function(data) {

                        var result = data.data;

                        if (result.length > 0) {
                            $('#result').html('');
                            for (var count = 0; count < result.length; count++) {
                                var url = "{{ route('customer.show', '') }}" + "/" + result[count].id;
                                $('#result').append('<a href="' + url +
                                    '"><li class="list-group-item link-class">' + result[count]
                                    .mobile_no + '</li></a>');
                            }
                        } else {
                            $('#result').html('');
                            $('#result').append(
                                '<li class="list-group-item link-class">No Data to Display</li>');
                        }
                    },
                    error: function() {
                        console.log('error')
                    }

                });

            }

            $(document).on('keyup', '#customer_search', function() {
                var query = $(this).val();

                if (query.length > 0 || event.keyCode !== 8) {
                    customer_search(query);
                }

            });
        });
    </script>
    
    @endsection
