@extends('layout.apps')

@section('content')
        <div class="page-with-both-sidebar video-content-page">
            <div class="breadcrumb-area">
                <div class="container video-breadcrumb-container" style="display: flex;justify-content:space-between;align-items:center;">
                    <div class="breadcrumb-box">
                        <!-- <span class="breadcrumb-span"><a href="allnames.php">Diseases</a></span>
                        <span class="banner-breadcrumb-span"><i class="fa fa-angle-right"></i></span> -->
                        <span class="breadcrumb-span"><a href="">{{ $videos['department'] }}</a></span>
                        <span class="banner-breadcrumb-span"><i class="fa fa-angle-right"></i></span>
                        <span class="breadcrumb-span">{{ $videos['video_lecture'] }}</span>
                    </div>
                    <div class="sidebar-menu-toggler">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>

            <div class="page-wrapper">

                <div class="left-sidebar">

                    <div class="videocontent-page-heading-box">
                        <div>
                            <img src="{{ URL::to('assets/images/icons/').'/'.$category->imgname}}" alt="">
                        </div>
                        <h5>{{$category->category}}</h5>
                    </div>
                
                    <div class="left-sidebar-nav">
                        <div id="left-nav-accordion" class="category-elements">
                            @foreach ($videos as $video)
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            {{$video['video_lecture']}}
                                        </button>
                                    </h5>
                                </div>
                
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#left-nav-accordion">
                                    <div class="card-body">
                                        <ul>
                                            @foreach($contents=$video->video_contents as $content)
                                            <li>
                                                <a href="{{route('individual_category',$video['id'],$category->id)}}">{{$content->name}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                @include('videocontent.rightsidebar')

                <div class="main-page-body">
                    <div class="category-page-main-body" >
                        <div id="section1"> 
                            <h1>{{ $videos['video_lecture'] }}</h1>
                            <p>{{ $videos['video_description'] }}</p>

                            
                        </div>

                        @foreach ($videocontent as $contents)
                                                        @php($content = get_object_vars($contents))
                                                        @php($name = $content['name'])
                                                        @php($description = $content['description'])
                                                        @php($link = $content['link'])

                            <div id="section2">
                                <div class="videocontent-page-line"></div>

                                <h4>{{ $name }}</h4>
                                <p>{{ $description }}</p>
                                <div class="video-box">
                                    <iframe width="100%" height="100%" src="{{ $link }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        @endforeach

                        <div class="videocontent-page-line"></div>

                        <div class="video-authors-box">
                            <div class="video-authors">
                                <p class="heading">Video Credits</p>
                                <p class="video-author">
                                    <span class="role">Content: </span>
                                    <span class="name">{{ $videos['contentby'] }}</span>
                                </p>
                                <p class="video-author">
                                    <span class="role">Speaker: </span>
                                    <span class="name">{{ $videos['speaker'] }}</span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="video-content-controllers">
                            <a href="#" class="left-right-box">
                                <div class="arrow-symbol">
                                    <img src="src/assets/images/icons/left.svg" alt="">
                                </div>
                                <div class="text text-right">
                                    <p class="state">
                                        Previous
                                    </p>
                                    <p class="chapter-name">
                                        Toothache
                                    </p>
                                </div>
                            </a>
                            <a href="#" class="left-right-box">
                                <div class="text">
                                    <p class="state">
                                        Next
                                    </p>
                                    <p class="chapter-name">
                                        Broken Teeth
                                    </p>
                                </div>
                                <div class="arrow-symbol">
                                <img src="src/assets/images/icons/right.svg" alt="">
                                </div>
                            </a>
                        </div>
                    </div>          
                </div>
            </div>
        </div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="src/assets/js/main.js"></script>
<script src="src/assets/js/rightnav.js"></script>
    