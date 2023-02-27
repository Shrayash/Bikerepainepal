@extends('layout.apps')

@section('content')
    <div class="container-scroller">

        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf


                                <div class="form-group">
                                    
                                    <label class="label">User ID</label>
                                    <div class="input-group">
                                        <input id="mobile_no" type="text"
                                            class=" @error('mobile_no') is-invalid @enderror" name="mobile_no"
                                            value="{{ old('mobile_no') }}" required autocomplete="mobile_no" autofocus
                                            style="width: 100%; background-color: rgb(243, 243, 2438); border-style: none;">
                                        {{-- <div class="input-group-append">
        <span class="input-group-text">
            <i class="mdi mdi-check-circle-outline"></i>
        </span>
        </div> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="label">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password"
                                            class="input-type-password @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password"
                                            style="width: 100%;background-color: rgb(243, 243, 2438);border-style: none;">
                                        <span toggle="#password" class="fa fa-fw fa-eye  toggle-password"
                                            style=" position: absolute;cursor: pointer;top: 28%;
                                            right: 4%; color: rgb(86, 86, 86);"></span>
                                        {{-- <div class="input-group-append"> --}}

                                        {{-- </div> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    {{-- <div class="row justify-content-between"> --}}
                                    {{-- <div class="remember-password-box">
                                        <div class="remember-me">
                                           
                                            <label for="remember-me">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div> --}}

                                    <div class="forget-password">
                                        <a href="{{ route('forget.password.get') }}">Forgot Password ?</a>
                                    </div>
                                    {{-- </div> --}}


                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn  submit-btn btn-block"
                                        style="background-color: #ff6600;color:white;" value="Log In">
                                    {{-- <button class="btn btn-primary submit-btn btn-block"  type="submit" value="Log In">Login</button> --}}
                                </div>
                                
                               
                                <center><div class="justify-content-center ">
                                    <label for="remember-me">
                                        Not Registered? <a href="{{ route('signup') }}"><b>Sign Up Now!</b></a>
                                    </label>
                                </div></center>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
