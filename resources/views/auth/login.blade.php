@extends('layout.apps')

@section('content')

    <div class="body-container login-page">
        <div class="login-page-container">
            <div class="login-image-box">
                <img src="{{ URL::to('assets') }}/images/login.svg" alt="">
            </div>
            <div class="login-main-section">

                <div class="login-main-box">
                    @if ($errors->count() > 0)
                        <div class="alert alert-danger alert-dismissible fade show" id="vanish" role="alert">
                            <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>Validation Error:</strong>
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)

                                    <li>{{ ucfirst($error) }}</li>

                                @endforeach
                            </ul>
                        </div>

                    @endif

                    <h2>Welcome Back</h2>


                    <!--Wrong Password-->
                    <!-- <div class="wrong-pw">
                                <p>
                                Wrong Password. Please try again or click Forgot Password to reset it.
                                </p>
                            </div> -->

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <label for="">
                            Email
                        </label>
                        <div class="input-box">
                            <span class="input-box-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" placeholder="email@service.com"
                                autofocus>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="">
                            Password
                        </label>
                        <div class="input-box">
                            <span class="input-box-icon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input id="password" type="password" class="input-type-password @error('password') is-invalid @enderror"
                                name="password" required  autocomplete="current-password">
                            <span class="input-box-icon input-password-toggler">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        {{-- <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be aleast 8 characters long.
                          </small> --}}
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    

                        <div class="remember-password-box">
                            <div class="remember-me">
                                <input class="form-check-input tick-box" type="checkbox" name="remember" id="remember-me"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember-me">
                                    Remember Me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="forget-password">
                                    <a href="{{ route('password.request') }}">Forgot Password</a>
                                </div>
                            @endif
                        </div>

                        <input type="submit" value="Log In">

                    </form>


                    <p class="already">
                        Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                    </p>

                    {{-- <div class="or">
                            <div class="or-line"></div>
                            <span>OR</span>
                            <div class="or-line"></div>
                        </div>

                        <div class="facebook-signup">
                            <a href="#">
                                <div>
                                    <img src="src/assets/images/icons/facebook.PNG" alt="">
                                    <span>Login with Facebook</span>
                                </div>
                            </a>
                        </div> --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#vanish').fadeOut(8000);
        </script>
@endsection
