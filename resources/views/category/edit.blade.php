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
                @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                <b>{{ session()->get('message') }}</b>
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
                                <h3 class="font-weight-semibold">Add New Item Category</h3>
                                <a href="{{ route('admin.index') }}"><button type="button"
                                        class="btn btn-primary btn-fw">Back to
                                        Dashboard</button></a>
                            </div>
                            <form method="POST" class="form-sample" action="{{ route('category.update',$category->id) }}"
                                id="content_form"  autocomplete="off">
                                @csrf
                                <p class="card-description">Fill the details carefully. </p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1"></label>
                                            <input type="text" name="category_name" id="category_name"  value="{{ $category->category_name }}" class="form-control"
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
                                            <input type="text" name="description" id="description" class="form-control" value="{{ $category->description }}" placeholder="eg. sidelight for yamaha bike."
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

            </div>

        </div>
        <!-- main-panel ends -->
    </div>
    {{-- https://www.tutorialrepublic.com/faq/how-to-check-if-an-input-field-is-empty-using-jquery.php --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/js/parsley.min.js"></script>
    <script>
        $('#vanish').fadeOut(25000);

    </script>
 
