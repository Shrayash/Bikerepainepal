@extends('layout.apps')

@section('content')

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
       
        <div class="main-panel">
            <div class="content-wrapper">
                <br><br>
                {{-- @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger" role="alert">{{ session()->get('error') }} </div>
                @endif --}}
      
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Edit Customer Details</h3>
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                            <form method="POST" class="form-sample" action="{{ route('customer.update',$id) }}"
                                id="content_form" data-parsley-validate="">
                                @csrf
                                <p class="card-description">Edit the details carefully. </p>
                             
                               
                              
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <input type="text" class="form-control" placeholder="First Name"
                                                id="frst_name" data-parsley-required-message="Name Required"
                                                data-parsley-trigger="focusin focusout"
                                                value="{{ $customer['frst_name'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <input type="text" id="last_name" class="form-control"
                                                placeholder="Last Name" data-parsley-required-message="Name Required"
                                                data-parsley-trigger="focusin focusout"
                                                value="{{ $customer['last_name'] }}" required>
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
                                                data-parsley-trigger="focusin focusout"
                                                value="{{ $customer['mobile_no'] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" id="address" class="form-control" placeholder="Address"
                                                data-parsley-required-message="Address Required"
                                                data-parsley-trigger="focusin focusout" value="{{ $customer['address'] }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                        
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dynamicTable">
                                                <thead>
                                                    <tr>
                                                        <th>Vehicle No.</th>
                                                        <th>Distance(KM)</th>
                                                        <th>Delivery</th>
                                                        <th>Remarks</th>
                                                        <th>Status</th>
                                                        <th>Extra</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="body_table">
                                                   {{-- {{ dd($customer_vehicle)}} --}}
                                                    @foreach ($customer_vehicle as $vehicle)
                                                    {{-- {{dd($vehicle)}} --}}
                                                        {{-- @php($content = get_object_vars($vehicle)) --}}
                                                        <tr>
                                                            <td><input type="text" name="v_no[]"
                                                                    value="{{ $vehicle->v_no }}" id="v_no"
                                                                    placeholder="Enter Vehicle Number" class="form-control"
                                                                    required /></td>
                                                            <td><input type="text" name="distance[]"
                                                                    value="{{ $vehicle->distance }}" id="distance"
                                                                    placeholder="Enter Distance Covered "
                                                                    class="form-control" required /></td>
                                                            <td>
                                                                <select class="form-control" name="delivery[]"
                                                                    id="delivery">
                                                                    <option  value="">Select option</option>
                                                                    <option  {{ ($vehicle->delivery) == 'self' ? 'selected' : '' }}  value="self">Self</option>
                                                                    <option {{ ($vehicle->delivery) == 'pick/drop' ? 'selected' : '' }} value="pick/drop">Pick/Drop</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text"
                                                                    value="{{ $vehicle->v_remarks }}"
                                                                    name="v_remarks[]" id="v_remarks"
                                                                    placeholder="Vehicle color/brand name"
                                                                    class="form-control" required /></td>
                                                            <td>
                                                             
                                                                <select class="form-control" name="v_status[]"
                                                                id="status">
                                                               
                                                                <option  {{ ($vehicle->v_status) == 'inactive' ? 'selected' : '' }}  value="inactive">Not in Use</option>
                                                                <option {{ ($vehicle->v_status) == 'active' ? 'selected' : '' }} value="active">In Use</option>
                                                            </select>
                                                            </td>
                                                            <td>
                                                               -
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><br>
                                <button type="button" name="add" id="add"
                                class="btn btn-primary" >+ Add More Vehicle</button>
                                <center>
                                   
                                    <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                        value="Submit" />
                                </center>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- main-panel ends -->
    </div>
    {{-- https://www.tutorialrepublic.com/faq/how-to-check-if-an-input-field-is-empty-using-jquery.php --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
   
    <script>
        $(document).ready(function() {
            // $('#add').prop('disabled', true);
           
            // $('input[name^=v_remarks]').keyup(function() {
            //     if ($(this).val() != '') {
            //         $('#add').prop('disabled', false);
            //     }
            // });


            $count = 1;
            $iteration = 0;
            $(this).on("click", "#add", function() {
               
                var html = '<tr>';
                $count++;
                $iteration++;
                html +=
                    '<td><input type="text" name="v_no[]" placeholder="Enter Vehicle Number" class="form-control" required /></td>';
                html +=
                    '<td><input type="text" name="distance[]" placeholder="Enter Distance Covered " class="form-control" required /></td>';
                html +=
                    '<td><select class="form-control" name="delivery[]"><option>Select option</option><option value="self">Self</option><option value="pick/drop">Pick/Drop</option></select></td>';
                html +=
                    '<td><input type="text" name="v_remarks[]" placeholder="Vehicle color/brand name" class="form-control" required /></td>';
                html +=
                    '<td><select class="form-control" name="v_status[]" id="status"><option  {{ ($vehicle->v_status) == 'inactive' ? 'selected' : '' }}  value="inactive">Not in Use</option><option {{ ($vehicle->v_status) == 'active' ? 'selected' : '' }} value="active">In Use</option></select></td>';
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
                var distance = $('input[name^=distance]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var delivery = $('select[name^=delivery]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var v_remarks = $('input[name^=v_remarks]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                var v_status = $('input[name^=v_status]').map(function(idx, elem) {
                    return $(elem).val();
                }).get();
                event.preventDefault();
                $.ajax({
                    url: '{{ route('customer.update',$id) }}',
                    method: 'post',
                    data: {
                        _token: '{{ csrf_token() }}',
                        frst_name: $('#frst_name').val(),
                        last_name: $('#last_name').val(),
                        mobile_no: $('#mobile_no').val(),
                        address: $('#address').val(),
                        v_no: v_no,
                        distance: distance,
                        delivery: delivery,
                        v_remarks: v_remarks,
                        v_status: v_status
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
                            window.location.href = "/customer/show/"+data.id;
                            // window.location.href = "/admin/index";
                            // window.location.href = "/customer/show/".$id;
                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });



        });
    </script>
