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
  
        

    <div class="body-container home-page home-page-bg">
        <div class="container" style="position: relative;">
            <div class="alert alert-success alert-dismissible fade show message" id="vanish" role="alert">
                <strong style="font-size: large">{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" id="vanish" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <h1 class="text-center">
                SMF Health Portal
            </h1>
            
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Disease.svg')}}" width="60%" alt=""></span></p>
                            <p class="text-center division-name">Diseases</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span> <img src="{{ URL::to('assets/images/Symptoms.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Symptoms</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Medicine.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Medicine</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/Nutrition.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Nutrition</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('category.menu') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/lab Test.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name">Lab Test</p>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="division-box">
                        <a href="{{ route('pub') }}">
                            <div style="margin:5%">
                            <p class="text-center"><span><img src="{{ URL::to('assets/images/research.svg')}}" width="60%" alt=""></span></p>
                            </div>
                            <p class="text-center division-name"style="font-size:22px;">Research & Publications</p>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection
