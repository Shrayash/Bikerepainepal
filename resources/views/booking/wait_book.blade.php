
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
 
    <div id="mu-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-page-header-area">
						<h1 class="mu-page-header-title">Booking Request Sent!</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Header area -->

	
	
	<!-- Start main content -->
	<main>
		
		<!-- Start Services -->
		<section id="mu-service">
      <div class="container">
        <div class="row">
            
          <div class="col-md-12">
            <div class="mu-service-area">

                
              <!-- Title -->
              <div class="row">
                <div class="col-md-12">
                  <div class="mu-title">
                    {{-- <h2>Thank you for</h2> --}}
                    <p>Your request has been sent. Please wait for our response as you will recieve a call or text from us soon. If any other queries, feel free to contact us. </p>
                    {{-- <a href="#" class="mu-primary-btn">Download APP (APK) <i class="fa fa-long-arrow-down"></i></a> --}}
                  </div>
                 
                </div>
              </div>
              <!-- Start Service Content -->
              {{-- <div class="row">
                <div class="col-md-12">
                  <div class="mu-service-content">
                    <div class="row">
                      <!-- Start single service -->
                      <div class="col-md-4">
                        <div class="mu-single-service">
                          <div class="mu-single-service-icon"><i class="fa fa-motorcycle" aria-hidden="true"></i></div>
                          <div class="mu-single-service-content">
                            <h3>Pick n Drop</h3>
                            <p>Get your bike/scooter serviced from your comfort zone.</p>
                          </div>
                        </div>
                      </div>
                      <!-- End single service -->
                      <!-- Start single service -->
                      <div class="col-md-4">
                        <div class="mu-single-service">
                          <div class="mu-single-service-icon"><i class="fa fa-wrench" aria-hidden="true"></i></div>
                          <div class="mu-single-service-content">
                            <h3>General Service</h3>
                            <p>General servicing of your bike/scooter in the most efficient manner.</p>
                          </div>
                        </div>
                      </div>
                      <!-- End single service -->
                      <!-- Start single service -->
                      <div class="col-md-4">
                        <div class="mu-single-service">
                          <div class="mu-single-service-icon"><i class="fa fa-rss" aria-hidden="true"></i></div>
                          <div class="mu-single-service-content">
                            <h3>Monitor Online</h3>
                            <p>Watch your vehicle serviced through our mobile app and online booking available too.</p>
                          </div>
                        </div>
                      </div>
                      <!-- End single service -->
                      <!-- Start single service -->
                      <div class="col-md-4">
                        <div class="mu-single-service">
                          <div class="mu-single-service-icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                          <div class="mu-single-service-content">
                            <h3>Service Warranty</h3>
                            <p>Each of our service comes with great warranty.</p>
                          </div>
                        </div>
                      </div>
                      <!-- End single service -->
                      <!-- Start single service -->
                      <div class="col-md-4">
                        <div class="mu-single-service">
                          <div class="mu-single-service-icon"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                          <div class="mu-single-service-content">
                            <h3>Express Service</h3>
                            <p>Get your bike/scooter serviced in the quickest time frame.</p>
                          </div>
                        </div>
                      </div>
                      <!-- End single service -->
                      <!-- Start single service -->
                      <div class="col-md-4">
                        <div class="mu-single-service">
                          <div class="mu-single-service-icon"><i class="fa fa-road" aria-hidden="true"></i></div>
                          <div class="mu-single-service-content">
                            <h3>Road Assistance</h3>
                            <p>Issue with your 2 wheeler at any part of the city. Call Us!</p>
                          </div>
                        </div>
                      </div>
                      <!-- End single service -->
                    </div>
                  </div>
                </div>
              </div> --}}
              <!-- End Service Content -->
            </div>
          </div>
        </div>
      </div>
    </section>
		<!-- End Services -->	





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
        
    </section> --}}
    
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection



