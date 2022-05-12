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
                <p class="form-paragraph">Enter your email, so we can send a verification link to it to verify its you.
                </p>
                <br>
               

                <form method="POST" action="{{ route('password.email') }}">

                @csrf
                    <label for="">
                        Your Email Address
                    </label>
                    <div class="input-box">
                        <span class="input-box-icon">
                            <i class="fa fa-envelope"></i>
                        </span>
                        <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
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