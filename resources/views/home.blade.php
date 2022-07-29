{{-- @extends('layout.apps')

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
@endsection --}}

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
 
    <section class="banner" id="top">
        
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Best Service For Your Vehicle</h2>
                        <span>We care for you</span>
                        <div class="row">
                        <div class="col-md-2 blue-button">
                            <a href="{{ route('customer.newbook') }}">Book Now</a>
                        </div>
                        <!-- <div class="col-md-2 red-button">
                            <a href="book_for_customer.html">Old Customer</a>
                        </div> -->
                    </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </section>


        <section class="popular-places" id="popular">
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h3 >About Us</h3><br>
                        <p style="font-size: 20px;">We are the first multibrand two wheeler service center franchisee of Pikpart Smart Garage India  in Nepal. We provide all services related to two wheeler.</p>

                    </div>
                </div> 
            </div> 
        </div>
    </section>

    <section class="featured-places" style="padding-top: 0px!important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <hr>
                        <span></span>
                        <br><br>
                        <h3 >Our Services</h3><br>
                    </div>
                </div> 
            </div> 
            <div class="row">
                {{-- <div class="col-md-4 grid-margin stretch-card average-price-card">
                    <div class="card text-white" style="background-color:#DE6449" >
                      <div class="card-body">
                        <div class="d-flex justify-content-between pb-2 align-items-center">
                          <h4 class="font-weight-semibold mb-0">Pick n Drop</h4>
                          <div class="icon-holder" style="background-color:#FF7353;width:30%;height:100px;" >
                            <i class="mdi mdi-wrench-outline"></i>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <p class="font-weight-bold mb-0 text-white">Ongoing Service</p>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content">
                            <h4>Pick n Drop</h4>
                        
                            <p>Get your bike/scooter serviced from your comfort zone.</p><br>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content">
                            <h4>Express Service</h4>
                        
                            <p>Get your bike/scooter serviced in the quickest time frame.</p><br>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content">
                            <h4>General Service</h4>
                        
                            <p>General servicing of your bike/scooter in the most efficient manner.</p><br>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content">
                            <h4>Service Warranty</h4>
                        
                            <p>Each of our service comes with great warranty.</p><br>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content">
                            <h4>AMC</h4>
                        
                            <p>Save 30% on filling AMC.</p><br>
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="down-content">
                            <h4>Road Assistance</h4>
                        
                            <p>Get your bike/scooter service on any part of the city.</p><br>
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>



    <section class="featured-places" id="blog"  style="padding-top: 0px!important;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <hr>
                        <span></span>
                        <br><br>
                        <h3 >Franchise Glimspe</h3><br>
                    </div>
                </div> 
            </div> 
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                           <iframe width="100%" height="200%" src="https://www.youtube.com/embed/Nwhl1Mq0eGk"> </iframe>
                        </div>
                        <div class="down-content">
                            <h4>Two Wheeler Service Center</h4>
                            <span>Pikpart</span>
                            <p>Smart Garage is India's best Service center chain of Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). It is a smart  technology enabled futuristic multi revenue generating business model.</p><br>
                            <!-- <div class="row">
                                <div class="col-md-6 first-button">
                                    <div class="text-button">
                                        <a href="#">Add to favorites</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-button">
                                        <a href="#">Continue Reading</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                           <iframe width="100%" height="200%" src="https://www.youtube.com/embed/EVaqU59j8h8"> </iframe>
                        </div>
                        <div class="down-content">
                            <h4>Walkthrough of Smart Garage</h4>
                            <span>Pikpart</span>
                            <p>Smart Garage is India's best Service center chain of Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). It is a smart  technology enabled futuristic multi revenue generating business model.</p><br>
                            <!-- <div class="row">
                                <div class="col-md-6 first-button">
                                    <div class="text-button">
                                        <a href="#">Add to favorites</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-button">
                                        <a href="#">Continue Reading</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                           <iframe width="100%" src="https://www.youtube.com/embed/19EeB7ZcnUg"> </iframe>
                        </div>
                        <div class="down-content">
                            <h4>Smart Garage Inauguration</h4>
                            <span>Pikpart</span>
                            <p>Smart Garage is India's best Service center chain of Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). It is a smart  technology enabled futuristic multi revenue generating business model.</p><br>
                            <!-- <div class="row">
                                <div class="col-md-6 first-button">
                                    <div class="text-button">
                                        <a href="#">Add to favorites</a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-button">
                                        <a href="#">Continue Reading</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




 


    <section class="contact" id="contact" style="padding-top: 0px!important">
        <div id="map">
        			<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

           <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe> -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.984016467525!2d85.24908401537927!3d27.68688888280037!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb239844493f69%3A0xce8ea373ca0441ce!2zU2F0dW5nYWwgQ2hvd2sg4KS44KSk4KWB4KSZ4KWN4KSX4KSyIOCkmuCli-CklQ!5e0!3m2!1sen!2snp!4v1651315224683!5m2!1sen!2snp" width="100%" height="500px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        
    </section>
    
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection

