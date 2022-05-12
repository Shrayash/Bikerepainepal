@extends('layout.apps')

@section('content')
   

    <div id='loader'>
    <img src="{{ URL::to('assets') }}/images/loader.gif"/>" alt="processing..." /></div>

    <div class="body-container login-page">
        <div class="login-page-container">
            <div class="login-image-box">
                <img src="{{ URL::to('assets') }}/images/login.svg" alt="">
            </div>
            <div class="login-main-section">
                <div class="login-main-box">
                    <h2>Sign Up</h2>
                    <form method="POST" action="{{ route('register')}}" id="register">
                        @csrf
                        <label for="">
                            Full name
                        </label>
                        <div class="input-box">
                            <span class="input-box-icon">
                                <i class="fa fa-user"></i>
                            </span>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required >
                        </div>

                        <label for="">
                            Email
                        </label>
                        <div class="input-box">
                            <span class="input-box-icon">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <input id="email" type="email" placeholder="email@service.com"
                                class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                                required autocomplete="email" data-parsley-type="email" data-parsley-trigger="keyup" >
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
                                name="password" required autocomplete="new-password">
                            <span class="input-box-icon input-password-toggler">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be aleast 8 characters long.
                          </small>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror<br>

                        <label for="">
                            Confirm Password
                        </label>
                        <div class="input-box">
                            <span class="input-box-icon">
                                <i class="fa fa-lock"></i>
                            </span>
                            <input id="password-confirm" type="password" class="input-type-password"
                                name="password_confirmation" required autocomplete="new-password">
                            <span class="input-box-icon input-password-toggler">
                                <i class="fa fa-eye"></i>
                            </span>
                        </div>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Your password must be aleast 8 characters long.
                          </small><br>

                        <input type="submit" id="start_call" value="Sign Up">
                        
                    </form>

                    <p class="already">
                        Already have an account? <a href="{{ route('login') }}">Log In</a>
                    </p>

                    {{-- <div class="or">
                        <div class="or-line"></div>
                        <span>OR</span>
                        <div class="or-line"></div>
                    </div>

                    <div class="facebook-signup">
                        <a href="{{ url('auth/facebook') }}" >
                            <div>
                                <img src="src/assets/images/icons/facebook.PNG" alt="">
                                <span>Sign Up with Facebook</span>
                            </div>
                        </a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    
{{-- <script>
  /*This makes the timeout variable global so all functions can access it.*/
var timeout;
function loaded() {
    $('#loading').html('');
}

function startLoad() {
                $('#loading').html('<img src="{{ URL::to('assets') }}/images/loader.gif"/>');
                $('#loading').addClass("loader_overlay");
                clearTimeout(timeout);
                timeout = setTimeout(loaded, 8000);
            }

            $('#start_call').click(startLoad);

          
  </script> --}}
  <script>

  $(document).ready(function(){
  $("#register").on("submit", function(){
    $("#loader").fadeIn();
  });
});
  </script>
@endsection
