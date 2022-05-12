@extends('layout.apps')

@section('content')
<div class="body-container publications-page publication-page">
    <div class="container">
        <div class="publications-page-heading">
            <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
            <h1>SMF Medical Publications</h1>
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
                                <a href="{{route('bio.show',$publication->user_id)}}"><span class="name">{{$publication->author_name}}</span></a>
                        </p>
                        <p class="published">
                                <span class="designation">Publication Link: </span>
                                <span class="name"><a style="word-wrap:break-word;" href="#">{{$publication->pub_link}}</a></span>
                        </p>

                        <div class="publication-download-section">
                        <a href="{{asset('storage/pdfs/'.$publication->file)}}" download>
                            <div class="download-button">
                                <span>Download</span>
                                {{-- <img src="{{ URL::to('storage') }}/pdfs/{{$publication->file}}" alt=""> --}}
                            </div>
                        </a>
                        </div>

                        <p class="details-title">Details:</p>
                        <p class="details">
                            {{$publication->description}}
                        </p>

                        <div class="publication-main-content-box">
                            <iframe src="{{asset('storage/pdfs/'.$publication->file)}}"  width="100%" height="600px" type="application/pdf" frameborder=0></iframe>
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