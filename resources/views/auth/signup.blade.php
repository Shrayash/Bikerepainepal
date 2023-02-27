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
    @if ($errors->any())
    {{$error}}
    {{-- <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div> --}}
@endif
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
       
        <div class="main-panel">
            <div class="content-wrapper">
                <br><br>
                
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Register New Customer</h3>
                                {{-- <a href="{{ route('/') }}"><button type="button"
                                        class="btn btn-primary btn-fw">Back Home</button></a> --}}
                            </div>
                            <form method="POST" class="form-sample" action="{{ route('signup.store') }}"
                                id="content_form"  autocomplete="off">
                                @csrf
                                <p class="card-description">Fill the details carefully. </p>
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
                                            <input type="text" id="mobile_no" class="form-control @error('mobile_no') is-invalid @enderror"
                                                placeholder="Mobile Number"
                                                data-parsley-required-message="Mobile Number Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        
                                            @error('mobile_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dynamicTable">
                                                <thead>
                                                    <tr>
                                                        <th>Vehicle No.</th>
                                                        {{-- <th>Distance Covered (KM)</th>
                                                        <th>Delivery</th> --}}
                                                        <th>Vehicle Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Ex. Ba-023-Pa-2034</th>
                                                        {{-- <th>12000</th>
                                                        <th>Self</th> --}}
                                                        <th>Ex. Blue NS 200CC</th>
                                                        <th>Example</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="body_table">
                                                    <tr>
                                                        <td><input type="text" name="v_no[]" id="v_no"
                                                                placeholder="Enter Vehicle Number" class="form-control"
                                                                required /></td>
                                                        {{-- <td><input type="text" name="distance[]" id="distance"
                                                                placeholder="Enter Distance Covered " class="form-control"
                                                                required /></td>
                                                        <td>
                                                            <select class="form-control" name="delivery[]" id="delivery">
                                                                <option>Select option</option>
                                                                <option value="self">Self</option>
                                                                <option value="pick/drop">Pick/Drop</option>
                                                            </select>
                                                        </td> --}}
                                                        <td><input type="text" name="v_remarks[]" id="v_remarks"
                                                                placeholder="Vehicle color/brand name"
                                                                class="form-control" required /></td>
                                                        <td><button type="button" name="add" id="add"
                                                                class="btn btn-primary">Add More Vehicle</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><br>
                                <center>

                                    <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                        value="submit" />
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
        // $(document).ready(function() {
        //     var i = 0;
        //     $("#add").click(function() {
        //         ++i;
        //         $("#dynamicTable").append('<tr><td><input type="text" name="addmore[' + i +
        //             '][name]" placeholder="Enter Vehicle Number" class="form-control" /></td> <td><input type="text" name="addmore[0][name]" placeholder="Enter Distance Covered " class="form-control" /></td><td><select class="form-control" name="product_id"><option>Select option</option><option>Self</option><option>Pick Up/Drop</option></select></td><td><input type="text" name="addmore[' +
        //             i +
        //             '][price]" placeholder="Vehicle color/brand name" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
        //             );
        //     });

        //     $(document).on('click', '.remove-tr', function() {
        //         $(this).parents('tr').remove();
        //     });

        // });


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
                    '<td><input type="text" name="distance[]" placeholder="Enter Distance Covered " class="form-control" required /></td>';
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
                var distance = $('input[name^=distance]').map(function(idx, elem) {
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
                    url: '{{ route('signup.store') }}',
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
                            // window.location.href = "/customer/show/" + data.id;
                            window.location.href = "/inventory/category/all";
                            // window.location.href = "/customer/show/".$id;
                        }
                        $('#save').attr('disabled', false);
                    }
                })
            });



        });
    </script>
