@extends('layout.apps')

@section('content')
    <div class="createcontent-page">
        <div class="container">
            <div class="container">
                {{-- <h1>Edit Your Video Content</h1> --}}
                <div class="row">
                    <div class="col-md-7">
                        <div class="create-content-section">

                                    <form method="POST" id="content_form">
                                        @csrf
                                        <span id="result"></span><br>
                                        <label for="group">Choose the Group</label>
                                        <select class=""  name="group" id="">
                                            @foreach ($groups as $group)
                                             <option value="{{ $group->id }}" {{$videos['group'] == $group->id  ? 'selected' : ''}}>{{ $group->group}}</option>
                                            @endforeach
                                        </select>
                                       
                                        <label for="department">Choose the Department</label>
                                        <select class=""  name="department" id="">
                                            @foreach ($categories as $cat)
                                             <option value="{{ $cat->id }}" {{$videos['department'] == $cat->id  ? 'selected' : ''}}>{{ $cat->category}}</option>
                                            @endforeach
                                        </select>
                                
                                        <label for="video_lecture">Name of Video Lecture</label>
                                        <input type="text" value="{{ $videos['video_lecture'] }}" name="video_lecture" id=""
                                            placeholder="Video Lecture Name">

                                        <label for="description">Description</label>
                                        <textarea name="video_description" id=""
                                            >{{ old('video_description', $videos['video_description']) }}</textarea>

                                        {{-- <label for="video_quantity">Number of Videos</label>
                                        <input type="number" id="video_quantity" value="{{ $videos['videos_quantity'] }}"
                                            name="video_quantity" class="required" value="" /> --}}



                                        <div class="container" style="border: 1px solid rgb(201, 183, 183);border-radius: 2%;">
                                            <div class="for_videos" style="margin-top:2%;">
                                                @php($count = 1)
                                                    @foreach ($videocontent as $contents)
                                                        @php($content = get_object_vars($contents))
                                                            @php($name = $content['name'])
                                                                @php($description = $content['description'])
                                                                    @php($link = $content['link'])
                                                                           <div class="video-1">
                                                                               <div class="row">
                                                                                   <div class="col-md-9"><label for="">Video {{ $count }}</label></div>
                                                                                   <div class="col-md-3"><label for=""><span class="delete"><a onclick="return confirm('Are you sure you want to delete this video content?')"
                                                                                    href="{{ route('video_content.delete', $contents->id) }}"><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></a></span></label></div>
                                                                               </div>

                                                                            <label for="">Name</label>
                                                                            <input type="text" value="{{ $name }}" name="name[]" id=""
                                                                                placeholder="Video Name...">

                                                                            <label for="">Description</label>
                                                                            <textarea value="{{ $description }}" name="contentdescription[]" id=""
                                                                                placeholder="Video Description...">{{ old('contentdescription[]', $description) }}</textarea>

                                                                            <label for="">Link</label>
                                                                            <input type="text" value="{{ $link }}" name="link[]" id=""
                                                                                placeholder="Video Link...">
                                                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                                                    Only embed links are valid.
                                                                                   </small>
                                                                        </div>
                                                                        @php($count++)
                                                                        @endforeach
                                                                    </div>
                                                                    <button type="button" name="add" id="add" class="btn btn-success"
                                                                        style="margin-bottom:5%;margin-top:2%;">Add</button>
                                                                </div>


                                                                <label for="">Author Details</label>
                                                                <input type="text" value="{{ $videos['contentby'] }}" name="contentby" id=""
                                                                    placeholder="content.">
                                                                <input type="text" value="{{ $videos['speaker'] }}" name="speaker" id=""
                                                                    placeholder="speaker.">
                                                                {{-- <textarea name="" id=""
                                                                    placeholder="Details"></textarea> --}}

                                                                <input type="submit" name="save" id="save" value="Publish">
                                                            </form>




                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                            <script>
                                $(document).ready(function() {

                                    $(this).on("click", "#add", function() {
                                        var html = '<div class="video-1">';
                                        // html += '<label for="">Video '+ New Video +'</label>';
                                        html +=
                                            '<br><label for="">Name</label><input type="text" name="name[]" class="form-control" />';
                                        html +=
                                            '<label for="">Description</label><input type="text" name="contentdescription[]" class="form-control" />';
                                        html +=
                                            '<label for="">Link</label><input type="text" name="link[]" class="form-control" /><small id="passwordHelpBlock" class="form-text text-muted">Only embed links are valid.</small>';
                                        html +=
                                            '<button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></div>';
                                        $('.for_videos').append(html);

                                    });
                                    $(this).on("click", ".remove", function() {
                                        $(this).closest("div.video-1").remove();
                                    });

                                    $('#content_form').on('submit', function(event) {
                                        event.preventDefault();
                                        $.ajax({
                                            url: '{{ route('video.update',$videos['id']) }}',
                                            method: 'post',
                                            data: $(this).serialize(),
                                            dataType: 'json',
                                            beforeSend: function() {
                                                $('#save').attr('disabled', 'disabled');
                                            },
                                            success: function(data) {
                                                if (data.error) {
                                                    var error_html = '';
                                                    for (var count = 0; count < data.error.length; count++) {
                                                        error_html += '<p>' + data.error[count] + '</p>';
                                                    }
                                                    alert(error_html);
                                                    $('#result').html('<div class="alert alert-danger">' +
                                                        error_html + '</div>');
                                                } else {
                                                    window.location.href = "/admin/index";
                                                }
                                                $('#save').attr('disabled', false);
                                            }
                                        })
                                    });


                                });

                            </script>

@endsection