@extends('layout.apps')

@section('content')
<div class="body-container login-page">
    <div class="login-page-container">
        <div class="login-image-box">
            <img src="{{ URL::to('assets') }}/images/login.svg" alt="">
        </div>
        <div class="login-main-section">
            <div class="login-main-box">
                {{-- <h2>Welcome To <br><strong>SMF Educational Portal!</strong></h2> --}}
                <p> There is no such videos or publications saved for current action.</p>
            </div>
        </div>
    </div>
</div>

@endsection