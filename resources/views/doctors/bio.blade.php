@extends('layout.apps')

@section('content')
    @if ($errors->count() > 0)
        <div class="alert alert-danger">
            Validation Error:
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ ucfirst($error) }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('message'))
        <div class="alert alert-success">{{ session()->get('message') }}</div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger">{{ session()->get('error') }} </div>
    @endif
    @hasanyrole('admin|superadmin')
    <div class="admin-page">
        <div class="admin-page-wrapper">
         
            @include('admin.sidebar')
            {{-- @endhasanyrole --}}
            <div class="admin-page-main">
                <div class="admin-page-right create-content-page">
                    @foreach ($doctors as $doctor)
                        <div class="row">
                            <div class="col-md-3">
                                <div id="profile-image"><img
                                        src="{{ asset('storage/images/') . '/' . $doctor->profilepic }}"
                                        style="width: 100%"></div>
                            </div>
                            <div class="col-md-7">
                                <h3>Personal Information</h3>
                                <div class="create-content-action ">
                                    <div>
                                        <p> Name : Dr. {{ $doctor->user->name }}</p>
                                    </div>
                                    <div>
                                        <p> Designation : {{ $doctor->post }}</p>
                                    </div>
                                    <div>
                                        <p> Education : {{ $doctor->education }}</p>
                                    </div><br>
                                    <h3>Description</h3>
                                    <p class="details">
                                        {{ $doctor->description }}
                                    </p>
                                    @if (!empty($links))
                                        {{-- <h3>Connect With Dr. {{$doctor->user->name}}</h3> --}}
                                        @foreach ($links as $link)
                                            <a href="{{ $link->facebook }}" target="_blank" rel="noopener noreferrer"><i
                                                    class="fa fa-facebook" aria-hidden="true"
                                                    style="font-size:140%;color:#fff"
                                                    style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="{{ $link->youtube }}" target="_blank" rel="noopener noreferrer"><i
                                                    class="fa fa-youtube" aria-hidden="true"
                                                    style="font-size:140%;color:#fff"
                                                    style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="{{ $link->twitter }}" target="_blank" rel="noopener noreferrer"><i
                                                    class="fa fa-twitter" aria-hidden="true"
                                                    style="font-size:140%;color:#fff"
                                                    style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                            <a href="{{ $link->linkedin }}" target="_blank" rel="noopener noreferrer"><i
                                                    class="fa fa-linkedin" aria-hidden="true"
                                                    style="font-size:140%;color:#fff"
                                                    style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="row">
                        <div class="create-content-action">
                            <div class="d-block d-sm-none">
                                <br>
                            </div>
                        </div>
                        <div class="container">
                            <center>
                                <div>
                                    <h3>Videos</h3>
                                </div>
                                <div>
                                @foreach ($videos as $video)
                                    <a href="{{ route('allvideo.show', $video['id']) }}"><iframe
                                            src="{{ $video['link'] }}" style="border-style:none;margin:2%" height="auto"
                                            width="250"></iframe></a>
                                @endforeach
                                </div>
                                <a href="{{ route('allvideo.show', $doctor->user->id) }}">
                                    <button type="button" class="btn btn-primary">View More</button>
                                    </a>
                            </center>
                        </div>
                    </div>
                    <hr>
    
                    <div class="container">
                        <center>
                            <div>
                                <h3>Publications</h3>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    @foreach ($publications as $publication)
                                  <tr>
                                    <td>
                                        <div class="latest-publication-box">
                                            <div class="title-section">
                                                <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
                                                <div class="text">
                                                    <a href="{{ route('pub.show', $publication->id) }}">
                                                        <p class="publication-title">{{ $publication->pub_name }}</p>
                                                    </a>
                                                    <p class="authors">
                                                        <span class="designation">Author(s):</span>
                                                        <a href="{{ route('bio.show', $publication->user_id) }}"><span
                                                                class="name">{{ $publication->author_name }}</span></a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="download-section">
                                                <a href="src/assets/pdf/lorem.pdf" download>
                                                    <a href="{{ asset('storage/pdfs/' . $publication->file) }}" download>
                                                        <div class="download-button">
                                                            <span>Download</span>
                                                            <img src="{{ URL::to('assets') }}/images/icons/download.svg" alt="">
                                                        </div>
                                                    </a>
                                            </div>
                                        </div>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              <a href="{{ route('allpub.show', $doctor->user->id) }}">
                              <button type="button" class="btn btn-primary">View More</button>
                              </a>
                        </center><br>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @else
    <div class="container">
        <div class="admin-page-main" style="margin-top:17%;">
            <div class="admin-page-right create-content-page">
                @foreach ($doctors as $doctor)
                    <div class="row">
                        <div class="col-md-3">
                            <div id="profile-image"><img src="{{ asset('storage/images/') . '/' . $doctor->profilepic }}"
                                    style="width: 100%"></div>
                        </div>
                        <div class="col-md-7">
                            <h3>Personal Information</h3>
                            <div class="create-content-action ">
                                <div>
                                    <p> Name : Dr. {{ $doctor->user->name }}</p>
                                </div>
                                <div>
                                    <p> Designation : {{ $doctor->post }}</p>
                                </div>
                                <div>
                                    <p> Education : {{ $doctor->education }}</p>
                                </div><br>
                                <h3>Description</h3>
                                <p class="details">
                                    {{ $doctor->description }}
                                </p>
                                @if (!empty($links))
                                    {{-- <h3>Connect With Dr. {{$doctor->user->name}}</h3> --}}
                                    @foreach ($links as $link)
                                        <a href="{{ $link->facebook }}" target="_blank" rel="noopener noreferrer"><i
                                                class="fa fa-facebook" aria-hidden="true" style="font-size:140%;color:#fff"
                                                style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ $link->youtube }}" target="_blank" rel="noopener noreferrer"><i
                                                class="fa fa-youtube" aria-hidden="true" style="font-size:140%;color:#fff"
                                                style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ $link->twitter }}" target="_blank" rel="noopener noreferrer"><i
                                                class="fa fa-twitter" aria-hidden="true" style="font-size:140%;color:#fff"
                                                style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                        <a href="{{ $link->linkedin }}" target="_blank" rel="noopener noreferrer"><i
                                                class="fa fa-linkedin" aria-hidden="true" style="font-size:140%;color:#fff"
                                                style="margin-left: 30%"></i></a>&nbsp;&nbsp;&nbsp;
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="row">
                    <div class="create-content-action">
                        <div class="d-block d-sm-none">
                            <br>
                        </div>
                    </div>
                    <div class="container">
                        <center>
                            <div>
                                <h3>Videos</h3>
                            </div>
                            <div>
                                @foreach ($videos as $video)
                                    <a href="{{ route('allvideo.show', $video['id']) }}"><iframe
                                            src="{{ $video['link'] }}" style="border-style:none;margin:2%" height="auto"
                                            width="250"></iframe></a>
                                @endforeach
                                </div>
                            <a href="{{ route('allvideo.show', $doctor->user->id) }}">
                                <button type="button" class="btn btn-primary">View More</button>
                                </a>
                        </center>
                    </div>
                </div>
                <hr>

                <div class="container">
                    <center>
                        <div>
                            <h3>Publications</h3>
                        </div>
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($publications as $publication)
                              <tr>
                                <td>
                                    <div class="latest-publication-box">
                                        <div class="title-section">
                                            <img src="{{ URL::to('assets') }}/images/icons/publication.svg" alt="">
                                            <div class="text">
                                                <a href="{{ route('pub.show', $publication->id) }}">
                                                    <p class="publication-title">{{ $publication->pub_name }}</p>
                                                </a>
                                                <p class="authors">
                                                    <span class="designation">Author(s):</span>
                                                    <a href="{{ route('bio.show', $publication->user_id) }}"><span
                                                            class="name">{{ $publication->author_name }}</span></a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="download-section">
                                            <a href="src/assets/pdf/lorem.pdf" download>
                                                <a href="{{ asset('storage/pdfs/' . $publication->file) }}" download>
                                                    <div class="download-button">
                                                        <span>Download</span>
                                                        <img src="{{ URL::to('assets') }}/images/icons/download.svg" alt="">
                                                    </div>
                                                </a>
                                        </div>
                                    </div>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <a href="{{ route('allpub.show', $doctor->user->id) }}">
                          <button type="button" class="btn btn-primary">View More</button>
                          </a>
                    </center><br>
                </div>
            </div>
        </div>
    </div>
    @endhasanyrole
    




@endsection
