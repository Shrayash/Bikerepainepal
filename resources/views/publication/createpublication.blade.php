@extends('layout.apps')

@section('content')
    <div class="createcontent-page">
        <div class="container">
   
            <h1>Publish Your Publication</h1>
            <div class="row">
                <div class="col-md-7">
                    <div class="create-content-section">
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
                        <form method="POST" action="{{ route('pub.store') }}" enctype="multipart/form-data" data-parsley-validate>
                            @csrf
                            <label for="">Choose the Category</label>
                            <select class="select-publication-category" name="category" id="cat" required>
                                <option value="">~Choose One~</option>
                                <option value="docs">Document File</option>
                                <option value="video">Video Publication</option>
                            </select>

                            <div class="publication-file-upload" id="pdf">
                            <label for="">Publication Link</label>
                            <input type="text" name="pub_link" id="" placeholder="Publication Link">
                            </div>

                            <label for="">Name of Publication</label>
                            <input type="text" name="pub_name" id="" placeholder="Publication Name" required>
{{-- 
                            <label for="">Author Name</label>
                            <input type="text" name="author_name" id="" placeholder="Author Name"> --}}

                            <label for="">Description</label>
                            <textarea name="description" id="" placeholder="Video Description" required></textarea>

                            <div class="publication-file-upload" id="pdf">
                                <label for="">File Upload  <small style="font-size:15px;">
                           only PDF accepted
                          </small></label>
                                <label for="" class="custom-file-upload">
                                    <i class="fa fa-upload"></i>
                                    &nbsp;
                                    Upload
                                </label>
                                <input type="file" name="file" id="file-uploader" accept="image/*">
                                <div id="file-upload-filename"></div>
                            </div>

                            <div class="publication-video-link" id="video">
                                <label for="">Video Link</label>
                                <input type="text" name="video_link" id="" placeholder="Video Link...">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Only embed links are valid.
                                   </small>
                            </div>
                            
                            <label for="">Choose the Speciality</label>
                            <select class="" name="type" id="" required>
                                <option value="">~Choose One~</option>
                                @foreach ($speciality as $spec)
                                    
                                        <option value="{{ $spec->id }}">{{ $spec->speciality }}</option>
                                
                                @endforeach
                            </select>

                            <input type="submit" value="Publish">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var input = document.getElementById( 'file-uploader' );
        var infoArea = document.getElementById( 'file-upload-filename' );

        input.addEventListener( 'change', showFileName );

        function showFileName( event ) {
  
        // the change event gives us the input it occurred in 
        var input = event.srcElement;
        
        // the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
        var fileName = input.files[0].name;
        
        // use fileName however fits your app best, i.e. add it into a div
        infoArea.textContent = 'File name: ' + fileName;
        }
    </script>
@endsection
