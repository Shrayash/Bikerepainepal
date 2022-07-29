@extends('layout.apps')

@section('content')

<div class="body-container login-page">
    <div class="login-page-container">
        <div class="login-image-box">
            <img src="{{ URL::to('assets') }}/images/login.svg" alt="">
        </div>
        <div class="login-main-section">
            <div class="login-main-box">
                <h2>Change Your Password</h2>
                <p class="form-paragraph">Enter Your New Password Below:</p>
                <form method="POST" action="{{ route('password.update') }}" data-parsley-validate="">
                    @csrf

                <input type="hidden" name="token" value="{{ $token }}">
                <label for="">
                    Username
                </label>
                <div class="input-box">
                    <span class="input-box-icon">
                        <i class="fa fa-lock"></i>
                    </span>
                    <input id="mobile_no" type="text" name="mobile_no" value="{{ $mobile_no ?? old('mobile_no') }}" required autocomplete="mobile_no" autofocus>
                    {{-- <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus> --}}
                </div>
                {{-- @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror --}}
                <label for="">
                        Password
                    </label>
                    <div class="input-box">
                        <span class="input-box-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password" type="password" class="input-type-password" name="password" required autocomplete="new-password">   
                        {{-- <input id="password" type="password" class="input-type-password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">    --}}
                        <span class="input-box-icon input-password-toggler">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Your password must be aleast 8 characters long.
                      </small><br>
                    {{-- @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}

                    <label for="">
                        Confirm Password
                    </label>
                    <div class="input-box">
                        <span class="input-box-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input id="password-confirm" type="password" class="input-type-password" name="password_confirmation" required autocomplete="new-password" data-parsley-equalto="#password">
                        <span class="input-box-icon input-password-toggler">
                            <i class="fa fa-eye"></i>
                        </span>
                    </div>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Your password must be aleast 8 characters long.
                      </small>

                    {{-- <button type="submit" class="btn btn-primary">
                        {{ __('Reset Password') }}
                    </button> --}}

                    <input class="send-code-btn" type="submit" value="Change Password">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
