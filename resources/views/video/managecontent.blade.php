@extends('layout.apps')

@section('content')
    <div class="admin-page">
        <div class="admin-page-wrapper">

            @include('admin.sidebar')

            <div class="admin-sidebar-menu-toggler">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="admin-page-main">
                <div class="admin-page-right create-content-page">
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" id="vanish" role="alert">
                           {{session()->get('message')}}
                       <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                       </button>
                     </div>
                   @elseif(session()->has('error'))
                       <div class="alert alert-danger" role="alert">{{session()->get('error')}} </div>
                   @endif
                    @role('admin') <h3>Create Content</h3> @endrole
                    <div class="create-content-action">
                        @role('admin')<a href="{{ route('video.create') }}">Create a Video Lecture</a>
                        @endrole
                        <div class="d-block d-sm-none">
                            <br>
                        </div>
                        @role('admin')<a class="hollow" href="{{ route('pub.create') }}">Add a Publication</a>
                        @endrole
                    </div>

                    <h3>All Contents</h3>

                    <div class="admin-content-box">
                        <div class="content-heading">
                            <h5>Videos</h5>
                        </div>
                        <div class="content-items">
                            @role('admin')
                            @foreach ($videos as $video)
                                <div class="item-box">
                                    <div class="content-title">
                                        <a href="{{ route('video.show', $video['id']) }}">{{ $video['video_lecture'] }}</a>
                                    </div>
                                    <div class="action-btn">
                                        <span class="edit"><a href="{{ route('video.edit', $video['id']) }}">Edit</a></span>
                                        <span class="delete"><a onclick="return confirm('Are you sure you want to delete this video content?')"
                                                href="{{ route('video.delete', $video['id']) }}">Delete</a></span>
                                    </div>
                                </div>
                            @endforeach
                            

                            
                            <nav aria-label="Page navigation example" style="margin-top: 2%;">
                                <ul class="pagination justify-content-center">
                                  
                                  {{ $videos->links() }}
                               
                                </ul>
                            </nav>
                            @endrole

                            @role('superadmin')
                            @foreach ($video_user as $user)
                                <div class="item-box">
                                    <div class="content-title">
                                        <a>{{ $user->name }}</a>
                                    </div>
                                    <div class="action-btn">
                                        <span class="edit"><a href="{{ route('video.publish', $user->id) }}">View
                                                Videos</a></span>
                                    </div>
                                </div>
                            @endforeach
                            <nav aria-label="Page navigation example" style="margin-top: 2%;">
                                <ul class="pagination justify-content-center">
                                  {{-- <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                  </li> --}}
                                  {{ $video_user->links() }}
                                  {{-- <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                  </li> --}}
                                </ul>
                            </nav>
                            @endrole
                        </div>
                        
                    </div>
                    <div class="admin-content-box">
                        <div class="content-heading">
                            <h5>Publications</h5>
                        </div>
                        <div class="content-items">
                            @role('superadmin')
                            @foreach ($publication_user as $pub)
                                <div class="item-box">
                                    <div class="content-title">
                                        <a>{{ $pub->name }}</a>
                                    </div>
                                    <div class="action-btn">
                                        <span class="edit"><a href="{{ route('pub.publish', $pub->id) }}">View
                                                Publication</a></span>
                                    </div>
                                </div>
                            @endforeach
                            <nav aria-label="Page navigation example" style="margin-top: 2%;">
                                <ul class="pagination justify-content-center">
                                  {{-- <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                  </li> --}}
                                  {{ $publication_user->links() }}
                                  {{-- <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                  </li> --}}
                                </ul>
                            </nav>
                            
                            @endrole

                            @role('admin')
                            @foreach ($publication as $pub)
                                <div class="item-box">
                                    <div class="content-title">
                                        <a href="{{ route('pub.show', $pub->id) }}">{{ $pub->pub_name }}</a>
                                    </div>
                                    <div class="action-btn">
                                        <span class="edit"><a href="{{ route('pub.edit', $pub->id) }}">Edit</a></span>
                                        <span class="delete"><a onclick="return confirm('Are you sure you want to delete this publication?')" href="{{ route('pub.delete', $pub->id) }}">Delete</a></span>
                                    </div>
                                </div>
                            @endforeach
                            <nav aria-label="Page navigation example" style="margin-top: 2%;">
                                <ul class="pagination justify-content-center">
                                  {{-- <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                  </li> --}}
                                  {{ $publication->links() }}
                                  {{-- <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                  </li> --}}
                                </ul>
                            </nav>
                            
                            @endrole
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    
