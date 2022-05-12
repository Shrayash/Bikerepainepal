@extends('layout.apps')

@section('content')
    <div class="createcontent-page">
        <div class="container">
            <h1>Edit Your Publication</h1>
            <div class="row">
                <div class="col-md-7">
                    <div class="create-content-section">
                        <form method="POST" action="{{ route('pub.update',$publication->id) }}" enctype="multipart/form-data">
                            @csrf
                            <label for="">Choose the Category</label>
                            <select class="select-publication-category" name="category" value="{{ $publication->category }}" id="cat">

                                @if (($publication->category)=='docs')
                                    <option value="docs" >Document File</option>
                                @else
                                    <option value="video" >Video Publication</option>
                                    @endif
                            </select>

                            <label for="">Publication Link</label>
                            <input type="text" name="pub_link" value="{{ $publication->pub_link }}" id="" placeholder="Publication Link">

                            <label for="">Name of Publication</label>
                            <input type="text" name="pub_name" id="" value="{{ $publication->pub_name }}" placeholder="Publication Name">

                            <label for="">Author Name</label>
                            <input type="text" name="author_name" id="" value="{{ $publication->author_name }}" placeholder="Author Name">
                            
                            <label for="">Description</label>
                            <textarea value="" name="description" id="" placeholder="Video Description...">{{ old('description', $publication->description) }}</textarea>

                

                            @if(($publication->category)=='docs')
                            <div class="publication-file-upload-edit" id="pdf">
                                <label for="">File Upload</label>
                                <label for="" class="custom-file-upload">
                                    <i class="fa fa-upload"></i>
                                    &nbsp;
                                    Upload
                                </label>
                                <input type="file" value="{{ $publication->file }}" name="file" id="file-uploader">{{ $publication->file }}
                                 <div id="file-upload-filename"></div>
                            </div>
                            @else

                            <div class="publication-video-link-edit" id="video">
                                <label for="">Video Link</label>
                                <input type="text" name="video_link" value="{{ $publication->file }}" id="" placeholder="Video Link...">
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                    Only embed links are valid.
                                   </small>
                            </div>
                            @endif

                            <label for="">Choose the Speciality</label>
                            <select class=""  name="speciality" id="">
                                @foreach ($speciality as $spec)
                                 <option value="{{ $spec->id }}" {{$publication->speciality == $spec->id  ? 'selected' : ''}}>{{ $spec->speciality}}</option>
                                @endforeach
                            </select>

                            <input type="submit" value="Update">
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
        infoArea.textContent = 'New file: ' + fileName;
        }
    </script>
@endsection

