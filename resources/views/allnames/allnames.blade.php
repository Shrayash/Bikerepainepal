@extends('layout.apps')

@section('content')

<div class="body-container all-list-page">
    <div class="container">
        <h1 class="text-center">
            DISEASES
        </h1>
        <div class="search-box text-center">
               
                  
            <div class="searchbox">
             @csrf
                 <input type="text" name="video_search" id="video_search"  placeholder="Search for diseases" />
                 <button type="submit" class="search-icon-box" style="border:0%;" onclick="video_search()">
                   <i class="fa fa-search"></i>
                 </button>
                 <ul class="list-group" id="result"></ul>
                <br />
             </div>
            
                
         {{-- </form> --}}
     </div>
        <h3 class="text-center">
            All Diseases
        </h3>
        <div class="main-list-boxes">
            <div class="row">
                @foreach ($groups as $name=>$group)
                <div class="col-lg-4 col-md-6 col-12 all-alphabetical-box-wrapper">
                    <div class="all-alphabetical-box">  
                        <p><span>{{$name}}</span></p>                    
                        <ul>
                            @foreach($group as $videos)
                            <li><a href="{{ route('video.show', $videos['id']) }}">{{$videos['video_lecture']}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
    
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        console.log(CSRF_TOKEN);
    
     function video_search(search_query = '')
     {
         
      
        $('#result').html('');
            $.ajax({
            url:"{{ route('video.search') }}",
            method:'GET',
            data:{search_query:search_query,_token:CSRF_TOKEN},
            dataType:'json',
            success:function(data)
            {
                var result = data.data
                console.log('Result', result[0].id);
                // console.log('Result1', result.length);
                if(result.length > 0)
                {
                    $('#result').html('');
                    for(var count = 0; count < result.length; count++)
                    {
                        
                        $('#result').append('<a href="{{route("video.show",'+result[count].id+')}}"><li class="list-group-item link-class">'+result[count].video_lecture+'</li></a>'); 
                    }
                }
                else{
                    $('#result').html('');
                    $('#result').append('<li class="list-group-item link-class">No Data to Display</li>'); 
                }
            },
            error:function(){
                console.log('error')}
            
            });
            
     }
            
    $(document).on('keyup', '#video_search', function(){
                var query = $(this).val();
                if (query.length > 0){
                    video_search(query);
                }
                
            });
            });

            $('.carousel-main').owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    nav: true,
                    margin: 10,
                    dots: false,
                navText: ["<i class='fa fa-chevron-left offer-slider-button'></i>","<i class='fa fa-chevron-right offer-slider-button'></i>"],
                responsiveClass:true,
                    responsive:{
                        0:{
                            items:1,
                            nav:true
                        },
                        767:{
                            items:3,
                            nav:true
                        },
                        991:{
                            items:5,
                            nav:true
                        }
                    }
                });
    </script>
    
@endsection