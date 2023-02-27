@extends('layout.apps')

@section('content')
   
    <!-- partial -->
    @if ($errors->any())
    {{$error}}
   
@endif
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
       
        <div class="main-panel">
            <div class="content-wrapper">
                <br><br><br>
                
                <div class="col-12 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h3 class="font-weight-semibold">Add New Item Category</h3>
                                <a href="{{ route('admin.index') }}"><button type="button"
                                        class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                            <form method="POST" class="form-sample" action="{{ route('category.store') }}"
                                id="content_form"  autocomplete="off">
                                @csrf
                                <p class="card-description">Fill the details carefully. </p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <input type="text" name="category_name" id="category_name" class="form-control"
                                            placeholder="eg. spare parts" data-parsley-required-message="Item Name Required"
                                            data-parsley-trigger="focusin focusout" required>
                                            @error('category_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            
                                            <label for="exampleInputEmail1">Category Description</label>
                                            <input type="text" name="description" id="description" class="form-control" placeholder="eg. sidelight for yamaha bike."
                                                data-parsley-required-message="Description Required"
                                                data-parsley-trigger="focusin focusout" required>
                                        </div>
                                    </div>
                                </div>
                                <center>
                                    <input type="submit" class="btn btn-box btn-success" name="save" id="save"
                                        value="submit" />
                                </center>
                            </form>
                        </div>
                    </div>
                </div>

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
                                <h4 class="font-weight-semibold">Category Details</h4>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-hover" id="dynamicTable">
                                        <tr class="table-active">
                                            <th>S.No.</th>
                                            <!--  <th>Service Date</th> -->
                                            <th>Category Name</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        {{-- <tr>
                                            <th>Ba-023-Pa-2034</th>
                                           
                                            <th>Self</th>
                                            <th>Blue NS 200CC</th>
                                            <th>Example</th>
                                        </tr>
                                        --}}
                                        @php($count = 0)
                                        @foreach ($category as $item)
                                       
                                        <tr>
                                            @php($count++)
                                            <td>
                                                <p class="font-weight-medium">{{ $count }}</p>
                                            </td>
                                            <!-- <td><p class="font-weight-medium">2022-06-13 18:10</p></td> -->
                                            <td>
                                                <p class="font-weight-medium">{{$item->category_name}}</p>
                                            </td>
                                            <td>
                                                <p class="font-weight-medium">{{$item->description}}</p>
                                            </td>
                                            <td> 
                                                <a href="{{ route('category.edit', $item->id) }}"><button class="btn btn-secondary"><i
                                                    class="fa fa-pencil-square-o"></i></a>
                                                <a href="{{ route('category.delete', $item->id) }}"><button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')"><i
                                                    class="fa fa-trash-o"></i></button></a>   
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                          
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
        $('#vanish').fadeOut(15000);

    </script>
