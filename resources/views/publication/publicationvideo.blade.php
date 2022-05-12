@extends('layout.apps')

@section('content')
<div class="body-container publications-page publication-page">
    <div class="container">
        <div class="publications-page-heading">
            <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
            <h1>SMF Medical Video Publications</h1>
        </div>
        <div class="publications-page-line blue"></div>

        <div class="publication-page-middle-box">
        <div class="row">
                <div class="col-lg-8">
                    <div class="publication-main-box">
                        <h2>{{$publication->pub_name}}</h2>
                        <div class="publication-page-line"></div>

                        <p class="authors">
                                <span class="designation">Author(s):</span>
                                <span class="name">{{$publication->author_name}}</span>
                        </p>

                        <p class="details-title">Details:</p>
                        <p class="details">
                            {{$publication->description}}
                        </p>

                        <div class="publication-main-content-box">
                            <div class="publication-video-box">
                                <iframe width="100%" height="100%" src="{{$publication->file}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                <div class="popular-publications related-publications">
                        <h5>
                        Related Publications
                        </h5>
                        <div class="publications-page-line red"></div>
                        <ul>
                            @foreach ($related as $rel)
                            <li>
                                <a href="{{route('pub.show',$rel->id)}}"> {{$rel->pub_name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom-box">
            <div class="row">
                <div class="col-xl-8">
                    <div class="popular-publications">
                        <h5>
                            Popular Publications
                        </h5>
                        <div class="publications-page-line red"></div>
                        <ul>
                            @foreach ($latest as $pub)
                            <li>
                                <a href="{{route('pub.show',$pub->id)}}"> {{$pub->pub_name}}</a>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="specialities-box">
                        <h5 class="text-center">Specialities</h5>
                        <div class="row">
                            @foreach ($speciality as $spec)
                            <div class="col-md-6">
                                <a href="{{route('pub.speciality',$spec->id)}}" class="green">{{ $spec->speciality }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection