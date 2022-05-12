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
                <div class="admin-page-right manage-site-page">
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
                    <h3>Site Settings</h3>

                    <div class="site-settings-section">
                        <form method="POST" action="{{ route('doctor_media.store') }}">
                            @csrf
                            <div class="site-settings-box">
                                <p class="social-media-heading">
                                    Social Media Links
                                </p>
                                <div class="blue-line"></div>
                    
                                <div class="social-media-box">
                                    <div class="input-section">
                                        <span class="social-media-title">Facebook: </span>
                                        <input class="edit-site" type="text" value="{{$data->facebook}}" name="facebook"
                                            placeholder="Facebook Page Link">
                                    </div>
                                    <img class="edit-site-pencil" src="{{ URL::to('assets') }}/images/icons/pencil.svg" alt="">
                                </div>
                                <div class="social-media-box">
                                    <div class="input-section">
                                        <span class="social-media-title">Twitter: </span>
                                        <input class="edit-site" type="text" value="{{$data->twitter}}" name="twitter"
                                            placeholder="Facebook Page Link">
                                    </div>
                                    <img class="edit-site-pencil" src="{{ URL::to('assets') }}/images/icons/pencil.svg" alt="">
                                </div>
                                <div class="social-media-box">
                                    <div class="input-section">
                                        <span class="social-media-title">YouTube: </span>
                                       <input class="edit-site" type="text" value="{{$data->youtube}}" name="youtube"
                                            placeholder="Facebook Page Link">
                                    </div>
                                    <img class="edit-site-pencil" src="{{ URL::to('assets') }}/images/icons/pencil.svg" alt="">
                                </div>
                                <div class="social-media-box">
                                    <div class="input-section">
                                        <span class="social-media-title">LinkedIn: </span>
                                        <input class="edit-site" type="text" value="{{$data->linkedin}}" name="linkedin"
                                            placeholder="Facebook Page Link">
                                    </div>
                                    <img class="edit-site-pencil" src="{{ URL::to('assets') }}/images/icons/pencil.svg" alt="">
                                </div>
                            </div>

                            <div class="submit-section">
                                <input type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            @endsection
