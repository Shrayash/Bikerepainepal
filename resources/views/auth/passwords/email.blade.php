@extends('layout.apps')

@section('content')

<div class="body-container login-page">
    <div class="login-page-container">
        <div class="login-image-box">
            <img src="{{ URL::to('assets') }}/images/login.svg" alt="">
        </div>
        <div class="login-main-section">
            <div class="login-main-box">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
                <h2>Forgot Password</h2>
                <p class="form-paragraph">Enter your mobile_no, so we can send a verification link to it to verify its you.
                </p>
                <br>
               

                <form method="POST" action="{{ route('') }}">

                @csrf
                    <label for="">
                        Your Mobile Number
                    </label>
                    <div class="input-box">
                        <span class="input-box-icon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input id="mobile_no" type="text" class=" @error('mobile_no') is-invalid @enderror" name="mobile_no"
                            value="{{ old('mobile_no') }}" required autofocus>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Send Verification Link') }}
                    </button>
                    {{-- <button type="submit" class="send-code-btn">
                        Send Verification Code
                    </button> --}}
                </form>


            </div>
        </div>
    </div>
</div>
@endsection