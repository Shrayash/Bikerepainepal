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
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Edit Product Details</h3>
                                <a href="{{ route('admin.index') }}"><button type="button"
                                        class="btn btn-dark btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                            <form method="POST" class="form-sample" action="{{ route('inventory.update', $id) }}"
                                id="content_form" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <p class="card-description">Fill the details carefully. </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Item Code (Auto-Generated)</label>
                                            <input type="text" class="form-control" name="item_code"
                                                value="{{ $inventory->item_code }}" id="item_code" readonly required>
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select class="form-control" name="category" id="category">
                                                <option value="">Select Category</option>
                                                @foreach ($category as $item)
                                                    @foreach ($item as $cat_info)
                                                        <option
                                                            {{ $inventory->category_id == $cat_info->id ? 'selected' : '' }}
                                                            value="{{ $cat_info->id }}">{{ $cat_info->category_name }}</option>
                                                    @endforeach
                                                @endforeach
                                            </select>


                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Item Name</label>
                                            <input type="text" id="item_name" name="item_name" class="form-control"
                                                placeholder="eg. yamalube"
                                                data-parsley-required-message="Item Name Required"
                                                data-parsley-trigger="focusin focusout" value="{{ $inventory->item_name }}"
                                                required>
                                            @error('mobile_no')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="exampleInputEmail1">Unit (pcs or ltr)</label>
                                            <input type="text" id="unit" name="unit" class="form-control"
                                                placeholder="eg. 1 ltr or 20 pcs"
                                                data-parsley-required-message="Address Required"
                                                data-parsley-trigger="focusin focusout" value="{{ $inventory->unit }}"
                                                required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="customFile">File Upload</label>
                                            <div class="custom-file">
                                                <input type="file" value="{{ $inventory->file }}" class="custom-file-input" name="image"
                                                    accept="image/*,application/pdf" 
                                                    required onchange="loadFile(event)">
                                                <label class="custom-file-label" for="customFile" >{{ $inventory->file }}</label>
                                                <img id="output"/>
                                            </div>
                                            @error('mobile_no')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Price</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend bg-light">
                                                    <span class="input-group-text">NRS</span>
                                                </div>
                                                <input type="number" name="price" class="form-control"
                                                    placeholder="price" aria-label="Username"
                                                    aria-describedby="basic-addon1" value="{{ $inventory->price }}"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Description </label>
                                            <div class="input-group">
                                                <textarea class="form-control" name="description" required></textarea>
                                               
                                                {{-- <input type="number" name="price" class="form-control" placeholder="00"
                                                    aria-label="Username" aria-describedby="basic-addon1" required> --}}
                                            </div>
                                       
                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dynamicTable">
                                                <thead>
                                                    <tr>
                                                        <th>Vehicle No.</th>
                                                        <th>Distance Covered (KM)</th>
                                                        <th>Delivery</th>
                                                        <th>Vehicle Remarks</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Ba-023-Pa-2034</th>
                                                        <th>12000</th>
                                                        <th>Self</th>
                                                        <th>Blue NS 200CC</th>
                                                        <th>Example</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="body_table">
                                                    <tr>
                                                        <td><input type="text" name="v_no[]" id="v_no"
                                                                placeholder="Enter Vehicle Number" class="form-control"
                                                                required /></td>
                                                        <td><input type="text" name="distance[]" id="distance"
                                                                placeholder="Enter Distance Covered " class="form-control"
                                                                required /></td>
                                                        <td>
                                                            <select class="form-control" name="delivery[]" id="delivery">
                                                                <option>Select option</option>
                                                                <option value="self">Self</option>
                                                                <option value="pick/drop">Pick/Drop</option>
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="v_remarks[]" id="v_remarks"
                                                                placeholder="Vehicle color/brand name"
                                                                class="form-control" required /></td>
                                                        <td><button type="button" name="add" id="add"
                                                                class="btn btn-primary">Add More</button></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div><br> --}}
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
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>