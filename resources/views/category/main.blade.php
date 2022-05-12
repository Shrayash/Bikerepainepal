@extends('layout.apps')

@section('content')
@php($i=0)
<div class="page-with-sidebar cateory-main-page">
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-box">
                <span class="breadcrumb-span"><a href="{{route('index')}}">Diseases</a></span>
                <span class="banner-breadcrumb-span"><i class="fa fa-angle-right"></i></span>
                <span class="breadcrumb-span">{{$category->category}}</span>
            </div>
        </div>
    </div>

    <div class="page-wrapper">

        <div class="sidebar">
            <h3 class="sidebar-header text-center">
                Categories
            </h3>
            @foreach ($categories as $cat)
            <div class="sidebar-categories-box">
                <div class="sidebar-category-box active">
                    <a href="{{route('category',$cat->id)}}">
                        <div>
                            <img src="{{ URL::to('assets/images/icons/').'/'.$cat->imgname}}" alt="">
                        </div>
                        <h5>{{$cat->category}}</h5>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <div class="main-page-body">
            <div class="category-page-main-body">
                <h1>{{$category->category}}</h1>
                <div id="accordion" class="category-elements">

                    @foreach ($videos as $video)
                    <div class="card">
                        @php($i++)

                        <div class="card-header" id="heading <?php echo $i; ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link <?php if($i>1) echo "collapsed"; ?>" type="button" data-toggle="collapse" data-target="#collapse<?php echo $i; ?>" aria-expanded="<?php echo ($i==1) ? 'true': 'false'; ?>" aria-controls="collapse<?php echo $i; ?>" >
                            {{$video['video_lecture']}}
                            </button>
                        </h5>
                        </div>

                        <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1) echo 'show'; ?>"  aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordion">
                        <div class="card-body">
                            <ul>
                                @foreach($contents=$video->video_contents as $content)
                                <li>
                                    <a href="{{route('video.show',$video['id'])}}">{{$content->name}}</a>
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
    </div>
</div>



@endsection
    