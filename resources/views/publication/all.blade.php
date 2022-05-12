@extends('layout.apps')

@section('content')   
   <div class="body-container publications-page">
        <div class="container">
            <div class="publications-page-heading">
                <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
                <h1>SMF Medical Publications</h1>
            </div>
            <div class="publications-page-line blue"></div>

            <div class="about-smf-pubications">
                <h5>About SMF Medical Publications</h5>
                <p>SMF Medical Publications are the publications from the doctors and health professionals. from SMF foundations. All the publications are result of years of research and dedication in different field within the medical research.</p>
            </div>

        
            <div class="latest-publications">
                <h5>Latest Publications</h5>
                <div class="latest-boxes">
                    @foreach ($publications as $publication)
                    <div class="latest-publication-box">
                        <div class="title-section">
                            <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
                            <div class="text">
                                <a href="{{route('pub.show',$publication->id)}}">
                                    <p class="publication-title">{{$publication->pub_name}}</p>
                                </a>
                                <p class="authors">
                                    <span class="designation">Author(s):</span>
                                    <a href="{{route('bio.show',$publication->user_id)}}"><span class="name">{{$publication->author_name}}</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="download-section">
                            <a href="src/assets/pdf/lorem.pdf" download>
                                <a href="{{asset('storage/pdfs/'.$publication->file)}}" download>
                                <div class="download-button">
                                    <span>Download</span>
                                    <img src="{{ URL::to('assets') }}/images/icons/download.svg" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <nav aria-label="Page navigation example" style="margin-top: 2%;">
                        <ul class="pagination justify-content-center">
                            {{ $publications->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
            
            <div class="latest-publications">
                <h5>Latest Video Publications</h5>
                <div class="latest-boxes">
                   

                    @foreach ($videos as $video)
                    <div class="latest-publication-box">
                        <div class="title-section">
                            <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
                            <div class="text">
                                <a href="{{route('pub.show',$video->id)}}">
                                    <p class="publication-title">{{$video->pub_name}}</p>
                                </a>
                                <p class="authors">
                                    <span class="designation">Author(s):</span>
                                    <a href="{{route('bio.show',$video->user_id)}}"><span class="name">{{$video->author_name}}</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="download-section">
                            <a href="{{$video->file}}">
                                <div class="download-button text-center" style="width: 143px;">
                                    <span>Watch</span>
                                    <img src="{{asset('storage/pdfs/'.$video->file)}}" alt="">
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <nav aria-label="Page navigation example" style="margin-top: 2%;">
                        <ul class="pagination justify-content-center">
                           {{ $videos->links() }}
                        </ul>
                    </nav>
                                    
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