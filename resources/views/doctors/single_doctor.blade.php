@extends('layout.apps')

@section('content')
    <div class="container">

        <div class="align-items-center content" style="margin-top: 10%">
            <center>
                <h3>Videos</h3>
                <div class="row pt-5">
                    @if (count($videos) > 0)


                        @foreach ($videos as $video)
                            @foreach ($contents = $video->video_contents as $content)
                                <div class="col pb-4">
                                    <div class="card">

                                        <iframe width="auto" height="auto" src={{ $content->link }}>
                                        </iframe>
                                        <div class="card-body">
                                            <h5 style="font-size: 90%;justify-content: center">{{ $content->name }}</h5>
                                        </div>
                                    </div>
                                </div><br>
                            @endforeach
                        @endforeach
                </div>
                {{-- @foreach ($videos as $video)
                            <div class="col pb-4">
                                <div class="card">

                                    <iframe width="auto" height="auto" src={{ $video->link }}>
                                    </iframe>
                                    <div class="card-body">
                                        <h5 style="font-size: 90%;justify-content: center">{{ $video->name }}</h5>
                                    </div>
                                </div>
                            </div><br>
                        @endforeach --}}
            @else
                <p>No Videos Available Now.</p><br>
                @endif
        </div>
        </center>
    </div>
    



@endsection
