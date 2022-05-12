@extends('layout.apps')

@section('content')
    <div class="admin-page">
        <div class="admin-page-wrapper">

            @include('admin.sidebar')

            <div class="admin-sidebar-menu-toggler">
                <span></span>
                <span></span>
                <span></span>
            </div>
         
            <div class="admin-page-main">
                <div class="admin-page-right create-content-page">
   
                    @if(session()->has('message'))
                     <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                            {{session()->get('message')}}
                        <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @elseif(session()->has('error'))
                        <div class="alert alert-danger" role="alert">{{session()->get('error')}} </div>
                    @endif
                        <div class="row">
                            <div class="col-md-3">
                                <form method="POST" action="{{ route('bio.updateimage') }}" enctype="multipart/form-data">
                                    @csrf
                                <input id="profile-image-upload" class="hidden" name="file" type="file" onchange="this.form.submit()">
                                <div id="profile-image" style=""><img src="{{asset('storage/images/'.$data->profilepic)}}" width="100%"><center>Click on the above image to change your picture.</center></div>
                                {{-- <p><center>Please provide image of square dimension (eg. width=600px, height=600px)</center></p> --}}
                            </form>
                            </div>
                    
                    
                            <div class="col-md-7">
                                <form method="POST" action="{{ route('bio.update') }}">
                                    @csrf
                                <h3>Personal Information</h3>
                                <div class="create-content-action ">
                                    <div> Name :</div>
                                    <input class="doctor_info" type="text" name="name" id="" value="{{ Auth::user()->name }}" placeholder="Doctor Name">
                                    <div> Designation : </div><input type="text" value="{{ $data->post }}" class="doctor_info" name="designation"
                                        id="" placeholder="Doctor Designation">
                                        <div> Education : </div><input type="text" value="{{ $data->education }}" class="doctor_info" name="education"
                                        id="" placeholder="Doctor Designation">
                                </div>

                                <h3>Description</h3>
                                <p class="details">
                                    <textarea name="description" class="doctor_info" id=""
                                        placeholder="Doctor Description">{{ old('description', $data->description) }}</textarea>
                                </p>
                                <div class="submit-section">
                                    <input type="submit" value="Save">
                                </div>
                            </form>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#vanish').fadeOut(8000);
        </script>


    @endsection
