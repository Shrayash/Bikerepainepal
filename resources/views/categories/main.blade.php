@extends('layout.apps')

@section('content')

    <div class="body-container categories-page">
        <div class="container">
            <h1 class="text-center">
                DISEASES
            </h1>
            <div class="search-box text-center">
               
                  
                   <div class="searchbox">
                    @csrf
                        <input type="text" name="video_search" id="video_search"  placeholder="Search for diseases or doctors" />
                        <button type="submit" class="search-icon-box" style="border:0%;" onclick="video_search()">
                          <i class="fa fa-search"></i>
                        </button>
                        <ul class="list-group" id="result"></ul>
                       <br />
                    </div>
                   
                       
                {{-- </form> --}}
            </div>
            <h3 class="text-center">
                Popular Diseases
            </h3>
            <div class="category-slider-box slider-box">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="owl-carousel carousel-main">
                            
                            @foreach ($groups as $name=>$group)
                                @foreach($group as $videos)
                                <div class="slider-content-box">
                                    <a href="{{ route("video.show", $videos['id']) }}">
                                        <div>
                                            <span>{{$name}}</span>
                                        
                                            <p><a href="{{ route("video.show", $videos['id']) }}">{{$videos['video_lecture']}}</a></p> 
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                          @endforeach            
                        </div>
                    </div>
                </div>
            </div>
            
            
            <h3 class="text-center">
                Category
            </h3>
            <div class="category-list-box">
                <div class="row">
                    @foreach ($category as $cat)
                    <div class="col-lg-4 col-md-6 col-12 category-box-wrapper">
                        <div class="category-box">
                            <a href="{{route('category',$cat->id)}}">
                                <h5>{{$cat->category}}</h5>
                                <div>
                                    <img src="{{ URL::to('assets/images/icons/').'/'.$cat->imgname}}" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center">
                <a href="{{route('allname')}}" class="blue-button show-all-list">See All Diseases</a>
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
                success:function(data,doc)
                { 
                    
                    var result = data.data;
                    var result_doc = data.doc;
                    // console.log('Result', result[0].id);
                    // console.log('Result1', result.length);
                    if(result.length > 0)
                    {
                        $('#result').html('');
                        for(var count = 0; count < result.length; count++)
                        {
                            var url = "{{route('video.show', '')}}"+"/"+result[count].id;
                            $('#result').append('<a href="'+url+'"><li class="list-group-item link-class">'+result[count].video_lecture+'</li></a>'); 
                        }
                    }
                    else if(result_doc.length > 0){
                        $('#result').html('');
                        for(var count = 0; count < result_doc.length; count++)
                        {
                            var urls = "{{route('bio.show', '')}}"+"/"+result_doc[count].id;
                            $('#result').append('<a href="'+urls+'"><li class="list-group-item link-class">'+result_doc[count].name+'</li></a>'); 
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
                    
                    if (query.length > 0 || event.keyCode !== 8 ){
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



