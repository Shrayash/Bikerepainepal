@extends('layout.apps')

@section('content')


    <div class="createcontent-page">
        <div class="container">
            <div class="container">
            <h1>Publish Your Video Content</h1>
            <div class="row">
                <div class="col-md-7">
                    <div class="create-content-section">
                        <form method="POST" action="{{ route('video.store') }}" id="content_form" data-parsley-validate>
                            @csrf
                            <span id="result"></span><br>
                            <label for="group">Choose the Group</label>
                            <select class="" name="group" id="" required>
                                <option value="">~Choose One~</option>
                                @foreach ($groups as $group)
                                    
                                        <option value="{{ $group->id }}">{{ $group->group }}</option>
                                
                                @endforeach
                            </select>
                            <label for="department">Choose the Department</label>
                            <select class="" name="department" id="" required>
                                <option value="">~Choose One~</option>
                                @foreach ($categories as $cat)
                                    
                                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                                
                                @endforeach
                            </select>
                            <label for="video_lecture">Name of Video Lecture</label>
                            <input type="text" name="video_lecture" id="" placeholder="Video Lecture Name" required>

                            <label for="description">Description</label>
                            <textarea name="video_description" id="" placeholder="Video Description" required></textarea>

                            {{-- <label for="video_quantity">Number of Videos</label>
                            <input type="number" id="video_quantity" name="video_quantity" class="required" value="" /> --}}
                            <table class="table table-bordered" id="dynamicTable">  
                                <tr>
                                    <th>Name</th>
                                    <th>description</th>
                                    <th>link</th>
                                    <th>Action</th>
                                </tr>
                                <tr>  
                                    <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control" /></td>  
                                    <td><input type="text" name="contentdescription[]" placeholder="Enter your Qty" class="form-control" /></td>  
                                    <td><input type="text" name="link[]" placeholder="Enter your Price" class="form-control" /></td>  
                                    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                </tr>  
                            </table> 
                        
                            {{-- <button type="submit" class="btn btn-success">Save</button> --}}
                            {{-- <div class="container" style="border: 1px solid rgb(201, 183, 183);border-radius: 2%;">
                                <div class="for_videos" style="margin-top:2%;">
                                    <div class="video-1">
                                        <label for="">Video 1</label>
                                        <label for="">Name</label>
                                        <input type="text" name="name[]" id="" placeholder="Video Name..." required>
                    
                                        <label for="">Description</label>
                                        <textarea name="contentdescription[]" id="" placeholder="Video Description..." required></textarea>
                    
                                        <label for="">Link</label>
                                        <input type="text" name="link[]" id="" placeholder="Video Link..." required>
                                        <small class="form-text text-muted">
                                           *Only embed links are valid.
                                          </small>
                                    </div><br>
                                </div>
                                <button type="button" name="add" id="add" class="btn btn-success" style="margin-bottom:5%;margin-top:2%;">Add</button><br>
                            </div> --}}
                          

                            {{-- <label for="">Author Details</label>
                            <input type="text" name="contentby" id="" placeholder="content.">
                            <input type="text" name="speaker" id="" placeholder="speaker."> --}}
                            {{-- <textarea name="" id=""
                                placeholder="Details"></textarea>--}}

                            <input type="submit"  name="save" id="save" value="Publish">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>



    <script>
        $(document).ready(function() {
            $count = 1;
            // $(this).on("click","#add",function(){
            //     // var html = '<div class="video-1 style="background-color: rgb(235, 223, 223)">';
            //     // $count++;
            //     // html += '<label for="">Video '+ $count +'</label>';
            //     // html += '<label for="">Name</label><input type="text" name="name[]" id="" placeholder="Video Name..." >';
            //     // html +='<label for="">Description</label><textarea name="contentdescription[]" id="" placeholder="Video Description..."></textarea>';
            //     // html += '<label for="">Link</label><input type="text" name="link[]" id="" placeholder="Video Link..." ><small id="passwordHelpBlock" class="form-text text-muted">*Only embed links are valid.</small><br>';
            //     // html +='<button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></div>';
            //     var html = '<tr">';
            //     // $count++;
            //     // html += '<label for="">Video '+ $count +'</label>';
            //     html += '<td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control" /></td>';
            //     html +='<td><input type="text" name="contentdescription[]" placeholder="Enter your Qty" class="form-control" /></td>';
            //     html += '<td><input type="text" name="link[]" placeholder="Enter your Price" class="form-control" /></td>';
            //     html +='<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
            //         $('#dynamicTable').append(html);
                
            // });
            // $(this).on("click",".remove",function(){
            //     // $(this).closest("div.video-1").remove();
            //     $(this).closest("tr").remove();
            // });

            var i = 0;
            
            $("#add").click(function(){
        
                ++i;
        
                $("#dynamicTable").append('<tr><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="contentdescription[]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="link[]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
            });
        
            $(document).on('click', '.remove-tr', function(){  
                $(this).parents('tr').remove();
            });  

            console.log('here');

            $('#content_form').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: '{{ route('video.store') }}',
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
