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

    {{-- @include('admin.sidebar') --}}
    <section style="background: rgb(242,242,242); ">
        <div class="main-panel container">
            <div class="content-wrapper">
                <div class="col-12 grid-margin">
                   
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Existing Customer Bookings</h3>
                                @role('superadmin')
                                <a href="{{ route('admin.index') }}"><button type="button" class="btn btn-secondary btn-fw">Back to
                                    Dashboard</button></a>
                                    @endrole
                            </div>
                                
                                     <p class="card-description">
                                Fill the details carefully. </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">First name</label>
                                            <input type="text" class="form-control"
                                                id="frst_name" data-parsley-required-message="Name Required"
                                                data-parsley-trigger="focusin focusout" required value="{{$customer->frst_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Last name</label>
                                            <input type="text" id="last_name" class="form-control"
                                            value="{{$customer->last_name}}" readonly data-parsley-required-message="Name Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Mobile No.</label>
                                            <input type="text" id="mobile_no" class="form-control"
                                            value="{{$customer->mobile_no}}" readonly
                                                data-parsley-required-message="Mobile Number Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" id="address" class="form-control" value="{{$customer->address}}" readonly
                                                data-parsley-required-message="Address Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                          {{-- <tr>
                                                    <td>Ba-025-Pa-2034</td>
                                                    <td>06/13/2022 10:30</td>
                                                    <td>Self</td>
                                                    <td>Blue NS 200CC</td>
                                                    <td>--</td>
                                                </tr> --}}
                                                <h5 class="text-justify">
                                                    To add new vehicles or update information of current vehicles, click <b>Update Details</b>.<br>
                                                    <a href="{{route('customer.edit',$customer->id) }}"> 
                                                    <button type="button" name="update" id="update" class="btn btn-primary" style="margin-bottom:5%;margin-top:1%;">Update Details</button></a></h5> 
                                                    
                                                <div class="container" style="border: 1px solid rgb(201, 183, 183);border-radius: 2%;">
                                                   
                                                    <div class="for_videos" style="margin-top:2%;">
                                                        @foreach ($customer_vehicle as $vehicle)
                                                        <form></form>
                                                        <form method="POST" class="form-sample" action="{{ route('customer.oldbook_store',$vehicle->id) }}"
                                                        id="content_form" data-parsley-validate="" autocomplete="off">
                                                        @csrf
                                                        <div class="video-1">
                                                            <label for=""><b>Vehicle No. {{ $vehicle->v_no }}</b></label><br>
                                                            {{-- <label for="">Vehicle No.</label> --}}
                                                            <input type="text" name="v_no" id="v_no" value="{{ $vehicle->v_no }}" class="form-control" required hidden>
                                        
                                                            <label for="">Choose Service Date</label>
                                                            <input type="datetime-local" name="date" id="date" class="form-control" required>
                                        
                                                            <label for="">Distance Covered (Kilometers)</label>
                                                            <input type="text" name="distance" id="distance" class="form-control" required>

                                                            <label for="">Delivery</label>
                                                            <select class="form-control" name="delivery" id="delivery" required>
                                                                <option>Select option</option>
                                                                <option value="self">Self</option>
                                                                <option value="pick/drop">Pick/Drop</option>
                                                            </select>
                                                            <label for="">Vehicle Remarks</label>
                                                            <input type="text" name="v_remarks" id="v_remarks" value="{{ $vehicle->v_remarks }}" class="form-control" required>
                                                        </div><br>
                                                        <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                                        value="Book Service" /><br>
                                                        </form><br>
                                                        @endforeach
                                                    </div>
                                                    {{-- <button type="button" name="add" id="add" class="btn btn-primary" style="margin-bottom:5%;margin-top:1%;">Add More Vehicle</button><br> --}}
                                                </div>


                                       
                                    </div>
                                </div><br>
                                {{-- <center>
                                    <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                        value="submit" />

                                </center> --}}
                            
                        </div>
                    </div>
             
        </div><br><br><br>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
    <script>
        // $(document).ready(function() {
        //     $('#add').prop('disabled', true);

        //     $('input[name^=v_remarks]').keyup(function() {
        //         if ($(this).val() != '') {
        //             $('#add').prop('disabled', false);
        //         }
        //     });


            $count = 1;
            $(this).on("click","#add",function(){
                var html = '<div class="video-1"';
                $count++;
                html += '<label for=""><b>Vehicle '+ $count +'</b></label><br>';
                html += '<label for="">Vehicle No</label><input type="text" name="v_no[]" id="v_no" placeholder="Enter Vehicle Number" class="form-control" required>';
                html +='<label for="">Service Date</label><input type="datetime-local" name="date[]" id="date" class="form-control" required>';
                html += '<label for="">Distance Covered (Kilometers)</label><input type="text" name="distance[]" id="distance" placeholder="Enter Distance Covered" class="form-control" required>';
                html += '<label for="">Delivery</label><select class="form-control" name="delivery[]" id="delivery"><option>Select option</option><option value="self">Self</option><option value="pick/drop">Pick/Drop</option></select><br>';
                html +='<label for="">Vehicle Service</label><input type="text" name="v_remarks[]" id="v_remarks" placeholder="Vehicle color/brand name" class="form-control" required>';
                html +='<br><button type="button" name="remove" id="" class="btn btn-danger remove" style="margin-bottom:2%;margin-top:2%;">Remove</button></div>';
                    $('.for_videos').append(html);
                
            });
            $(this).on("click",".remove",function(){
                $(this).closest("div.video-1").remove();
                $count--;
            });



            $('#content_form').on('submit', function(event) {
                // var v_no = $('input[name^=v_no]').map(function(idx, elem) {
                //     return $(elem).val();
                // }).get();
                // var date = $('input[name^=date]').map(function(idx, elem) {
                //     return $(elem).val();
                // }).get();
                // var delivery = $('select[name^=delivery]').map(function(idx, elem) {
                //     return $(elem).val();
                // }).get();
                // var v_remarks = $('input[name^=v_remarks]').map(function(idx, elem) {
                //     return $(elem).val();
                // }).get();
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
                        v_no: $('#v_no').val(),
                        date: $('#date').val(),
                        delivery: $('#delivery').val(),
                        v_remarks: $('#v_remarks').val(),
                        distance: $('#distance').val()
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