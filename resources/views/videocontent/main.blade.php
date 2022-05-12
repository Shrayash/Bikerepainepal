@extends('layout.apps')

@section('content')

        <div class="page-with-both-sidebar video-content-page">
            <div class="breadcrumb-area">
                @php($i=0)
                <div class="container video-breadcrumb-container" style="display: flex;justify-content:space-between;align-items:center;">
                    <div class="breadcrumb-box">
                         <span class="breadcrumb-span"><a href="{{route('index')}}">Diseases</a></span>
                        <span class="banner-breadcrumb-span"><i class="fa fa-angle-right"></i></span>
                        @foreach ($category as $cat)
                        <span class="breadcrumb-span"><a href="{{route('category',$cat->id)}}">{{ $cat->category }}</a></span>
                        @endforeach
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
                    @foreach ($category as $cat)
                    <div class="videocontent-page-heading-box">
                        <div>
                            <img src="{{ URL::to('assets/images/icons/').'/'.$cat->imgname}}" alt="">
                        </div>
                        <h5>{{$cat->category}}</h5>
                    </div>
                    @endforeach
                    
                    <div class="left-sidebar-nav">
                        <div id="left-nav-accordion" class="category-elements">
                            @foreach ($similar_video as $same)
                            @php($i++)
                            <div class="card">
                                <div class="card-header" id="heading <?php echo $i; ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link <?php if($i>1) echo "collapsed"; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i==1) ? 'true': 'false'; ?>" aria-controls="collapse<?php echo $i; ?>" >
                                        {{$same['video_lecture']}}
                                    </button>
                                </h5>
                                </div>
        
                                <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1) echo 'show'; ?>"  aria-labelledby="heading<?php echo $i; ?>" data-parent="#left-nav-accordion">
                                <div class="card-body">
                                    <ul>
                                        @foreach($contents=$same->video_contents as $content)
                                        <li>
                                            <a href="{{route('video.show',$same['id'])}}">{{$content->name}}</a>
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
                <div class="right-sidebar">
                    <div class="right-navbar">
                        <div class="right-navbar-heading">
                            <img src="{{ URL::to('assets') }}/images/icons/contents.svg" alt="">
                            <span>CONTENTS</span>
                        </div>
                        <nav class="right-side-navbar">
                            <div>
                                <ul class="">
                                @foreach ($videocontent as $contents)
                                                        @php($content = get_object_vars($contents))
                                                        @php($name = $content['name'])
                                                        @php($description = $content['description'])
                                                        @php($link = $content['link'])
                                <li class="right-sidebar-nav-item active"><a href="#section1">{{$name}}</a></li>
                                @endforeach
                            </div>
                        </nav>
                    </div>
                </div>

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
                                    <span class="name"><a href="{{route('bio.show',$videos['user_id'])}}">{{ $videos['speaker'] }}</a></span>
                                </p>
                            </div>
                        </div>
                        
                        <div class="video-content-controllers">
                            <a href="{{ URL::to( 'video/show/' . $previous ) }}" class="left-right-box">
                                <div class="arrow-symbol">
                                    <img src="src/assets/images/icons/left.svg" alt="">
                                </div>
                                <div class="text text-right">
                                    <p class="state">
                                     Previous
                                    </p>
                                    <p class="chapter-name">
                                    @foreach ($previous_name as $video)
                                        {{$video->video_lecture}}
                                     @endforeach
                                    </p>
                                </div>
                            </a>
                            <a href="{{ URL::to( 'video/show/' . $next ) }}" class="left-right-box">
                                <div class="text">
                                    <p class="state">
                                        Next
                                    </p>
                                    <p class="chapter-name">
                                     @foreach ($next_name as $video)
                                        {{$video->video_lecture}}
                                     @endforeach
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
    @endsection