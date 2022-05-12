@extends('layout.apps')

@section('content')


    @if (session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }} </div>
    @endif
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
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger">
                            <strong>Validation Error:</strong>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)

                                    <li>{{ ucfirst($error) }}</li>

                                @endforeach
                            </ul>
                        </div>

                    @endif
                    <form method="POST" action="{{ route('bio.store') }}" enctype="multipart/form-data" data-parsley-validate="">
                        @csrf

                        <div class="row">
                            <div class="col-md-3">
                                <div>
                                    <label>Select an image of yourself</label>
                                    <input type='file' id="profile-image-upload" name="file" type="file" required
                                        onchange="readURL(this);" />
                                    <br><br>
                                    <div id="profile-image"><img id="doc" src="" width="100%" /></div>
                                </div>
                    </form>
                </div>
                <div class="col-md-7">
                    <h3>Personal Information</h3>

                    <div class="create-content-action ">
                        <div> Name :</div>
                        <input class="doctor_info" type="text" name="name" id="" value="{{ Auth::user()->name }}"
                            placeholder="Doctor Name" required>
                        <div> Designation : </div><input type="text" class="doctor_info" name="designation" id=""
                            placeholder="Doctor Designation" required>
                        <div> Education : </div><input type="text" class="doctor_info" name="education" id=""
                            placeholder="Doctor Education" required>
                    </div>

                    <h3>Description</h3>
                    <p class="details">
                        <textarea name="description" class="doctor_info" id="" placeholder="Doctor Description" required></textarea>
                    </p>
                    <div class="submit-section">
                        <input type="submit" value="Save">
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#doc')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>



@endsection
