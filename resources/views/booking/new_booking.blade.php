{{-- @extends('layout.apps')

@section('content')
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            Validation Error:
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ ucfirst($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
        

    <div class="body-container home-page home-page-bg">
        <div class="container" style="position: relative;">
            <div class="alert alert-success alert-dismissible fade show message" id="vanish" role="alert">
                <strong style="font-size: large">{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h1 class="text-center">
                SMF Health Portal
            </h1>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Disease.svg')}}" width="60%" alt=""></span></p>
                            <p class="text-center division-name">Diseases</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Symptoms.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Symptoms</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Medicine.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Medicine</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Nutrition.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Nutrition</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/lab Test.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Lab Test</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('pub') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/research.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name"style="font-size:22px;">Research & Publications</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection --}}

@extends('layout.apps')

@section('content')
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            Validation Error:
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ ucfirst($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section style="background: rgb(242,242,242); ">
        <div class="main-panel container">
            <div class="content-wrapper">
                <div class="col-12 grid-margin">
                   
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Book New Customer</h3>

                            </div>
                                <form method="POST" class="form-sample" action="{{ route('book.newstore') }}"
                                id="content_form" data-parsley-validate="">
                                @csrf
                                     <p class="card-description">
                                Fill the details carefully. </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <input type="text" class="form-control" placeholder="First Name"
                                                id="frst_name" data-parsley-required-message="Name Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <input type="text" id="last_name" class="form-control"
                                                placeholder="Last Name" data-parsley-required-message="Name Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile No.</label>
                                            <input type="text" id="mobile_no" class="form-control"
                                                placeholder="Mobile Number"
                                                data-parsley-required-message="Mobile Number Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" id="address" class="form-control" placeholder="Address"
                                                data-parsley-required-message="Address Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id="dynamicTable">
                                            <h4>
                                                Enter your vehicle/s details here. If you have more than 1 vehicle to
                                                service, click <b>"Add More"</b> and add details of other vehicles.</h4>
                                            <br>
                                            <thead>
                                                <tr>
                                                    <th>Vehicle No.</th>
                                                    <th>Service Date</th>
                                                    {{-- <th>Distance</th> --}}
                                                    <th>Delivery</th>
                                                    <th>Vehicle Remarks</th>
                                                    <th>Action</th>
                                                </tr>
                                                {{-- <tr>
                                                    <td>Ba-025-Pa-2034</td>
                                                    <td>06/13/2022 10:30</td>
                                                    <td>Self</td>
                                                    <td>Blue NS 200CC</td>
                                                    <td>--</td>
                                                </tr> --}}
                                            </thead>
                                            <tbody class="body_table">
                                                <tr>
                                                    <td><input type="text" name="v_no[]" id="v_no"
                                                            placeholder="Enter Vehicle Number" class="form-control"
                                                            required /></td>
                                                    <td><input type="datetime-local" name="date[]" id="date"
                                                            placeholder="Enter Distance Covered " class="form-control"
                                                            required /></td>
                                                    {{-- <td><input type="text" name="distance[]" id="distance"
                                                            placeholder="Enter Distance Covered " class="form-control"
                                                            hidden /></td> --}}
                                                    <td>
                                                        <select class="form-control" name="delivery[]" id="delivery">
                                                            <option>Select option</option>
                                                            <option value="self">Self</option>
                                                            <option value="pick/drop">Pick/Drop</option>
                                                        </select>
                                                    </td>
                                                    <td><input type="text" name="v_remarks[]" id="v_remarks"
                                                            placeholder="Vehicle color/brand name" class="form-control"
                                                            required /></td>
                                                    <td><button type="button" name="add" id="add"
                                                            class="btn btn-primary">Add More</button></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div><br>
                                <center>


                                    <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                        value="submit" />

                                </center>
                            </form>
                        </div>
                    </div>
             
        </div><br><br><br>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add').prop('disabled', true);

            $('input[name^=v_remarks]').keyup(function() {
                if ($(this).val() != '') {
                    $('#add').prop('disabled', false);
                }
            });

            $count = 1;
            $iteration = 0;
            $(this).on("click", "#add", function() {

                var html = '<tr>';
                $count++;
                $iteration++;
                html +=
                    '<td><input type="text" name="v_no[]" placeholder="Enter Vehicle Number" class="form-control" required /></td>';
                html +=
                    '<td><input type="datetime-local"  name="date[]" class="form-control" required /></td>';
                html +=
                    '<td><select class="form-control" name="delivery[]"><option>Select option</option><option value="self">Self</option><option value="pick/drop">Pick/Drop</option></select></td>';
                html +=
                    '<td><input type="text" name="v_remarks[]" placeholder="Vehicle color/brand name" class="form-control" required /></td>';
                html +=
                    '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
                $('.body_table').append(html);
            });



            $(this).on("click", ".remove", function() {
                $(this).closest("tr").remove();
            });



            $('#content_form').on('submit', function(event) {
                var v_no = $('input[name^=v_no]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var date = $('input[name^=date]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var delivery = $('select[name^=delivery]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var v_remarks = $('input[name^=v_remarks]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                event.preventDefault();
                $.ajax({
                    url: '{{ route('book.newstore') }}',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        frst_name: $('#frst_name').val(),
                        last_name: $('#last_name').val(),
                        mobile_no: $('#mobile_no').val(),
                        address: $('#address').val(),
                        v_no: v_no,
                        date: date,
                        delivery: delivery,
                        v_remarks: v_remarks
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#save').attr('disabled', 'disabled');
                    },
                    success: function(data) {
                        console.log(data);
                        if (data.error) {
                            var error_html = '';
                            for (var count = 0; count < data.error.length; count++) {
                                error_html += '<p>' + data.error[count] + '</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">' +
                                error_html + '</div>');
                        } else {
                            // window.location.href = "/customer/show/"+data.id;
                            window.location.href = "/customer/newbook/success";
                            // window.location.href = "/customer/show/".$id;
                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });



        });
    </script>
@endsection
