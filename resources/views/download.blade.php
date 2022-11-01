

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
						<h1 class="mu-page-header-title">Our Mobile App</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Header area -->

	<!-- Start Breadcrumb -->
	<div id="mu-breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<nav aria-label="breadcrumb" role="navigation">
					  <ol class="breadcrumb mu-breadcrumb">
					    <li class="breadcrumb-item"><a href="#">Home</a></li>
					    <li class="breadcrumb-item active" aria-current="page">Downloads</li>
					  </ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumb -->
	
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
                    <h2>Monitor your service</h2>
                    <p>Get your bike/scooter service with all the servicing details on your phone! </p>
                    <a href="{{ asset('assets') }}/BikeRepairs.apk" class="mu-primary-btn" download>Download APP (APK) <i class="fa fa-long-arrow-down"></i></a>
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

		<div id="mu-call-to-action">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-call-to-action-area">
							<div class="mu-call-to-action-left">
								<h2>Invite and Earn Referral.</h2>
								<p style="color:#fff!important">Share the app with your family, friends and get awesome rewards. Qr codes, website links etc. any kind of shares would do the trick.</p>
							
                            </div>
                            <svg version="1.2" style="float:right;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300" width="150" height="150">
                                <title>frame</title>
                                <defs>
                                    <image  width="232" height="232" id="img1" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOgAAADoBAMAAAAXh7VLAAAAAXNSR0IB2cksfwAAABJQTFRF////////////////////////uuV0AgAAAAZ0Uk5T/wB0sLNxQ4vZVwAABQBJREFUeJztnF3S8jAIhTvOuICMLoAtsP/NfZ+a2AMc0vr6ewE3NoTwpDiY5qcuy0RaF1lVh14+NBAh+pnfqTAHo4xQpi9oQX8DKqDT1s79c8h52P63O+6GNiJEf3LNRm5SHzO/j0BD71FX0IL+NPTsmEdwctzRPkLZHQxDgTrt+argRK3dAdtnkdmEbtV5u4IW9HegMq87erunoXLLuxOrQ0G7p6G+PoNutStoQb8OveakJOOnwjPwy6Da8rnprP1TUBbaPe0LWtDvQOWWk3QOimVZmx93Q72gXpwdAHD9KDwPZ353Qb3dLJSsfUEL+j2oODtZmWZ8FbeONIVm0h2Z51lxOSlurVfI+PqQsNA98lnQgn4XKi4HL3ptcZztelOeOt4SifstYa33EZ+7oOhoIaCCFvS3oWqh9xxd7LrvPqjc7PyccwiOjfdrBRvsjMK463wZ/7R3vtf+2uu8nvkqaEFfD5Wu1FVn9l8uCrHXdD9GIHfBV0ita9sW90WHEeZcyD/vCAGLzcsT6v7bHNJR3oeKQR0z/VXyPgta0JdB/b7oVbSFPRdcPwr52G2GmLUmhF784I/D7BzDwTn1NiMvzVoSg5qIsDDT0CQ2e8Je0IK+FiqgEOsP13HxOdeI2py9z09BzPPxFdrIuKm+q80Mxif8zO7e3QA+Kx92hYeFOQt3Vke/y4IW9Gmo5OPmEJNrQuakW1BtkEYCz6ju+iJmHFVy90ry1tctq6+1zELLes1CzsKdfQUhxAUt6FNQSXJUbnZmb9Qx7+OokHUlSfZVL3oc+2Zn7P2+DNtDXaATYX6qGKEsLLMQpmHb8FHQgr4XKmQeinqJz8BpjiJUZ9DeyEhzMuqVlMXluY/K4teREiP688fsWSiZv4IW9OXQcE53iDonYvVntBPy3Oz8He9QXQ3MmhBIOHtExJ95GDp7VsmHhIWNhS+Bbj6+FLSg74NKnq/mPKCrQ5uzs4lnlTwUgCYfNUbCzEt1bbcwfyjTny4fohAmFrqCFvSjUOFj4Gyf1FxLMq9NoULmpXh98aCkofB5bCj3TsQzheMCQeza9NbpszKG2+gKWtCXQNXup2zts1xFkvP4CNVm89Z35N4bWaJ0/TSfva43DeeQKJQwQ2iykGZhLWhB3w7167NeT8/aq2WG871YLzhG66qk67SSrAV3v+EMhLubMM6aEMzCkdWzkLGyb1PQgr4eqmAgZI0XqnGN15yB0Fg2PgMUhK0JLdD47hCu07MP6HMGjY8YxHYWZiYFLejroLJj3UjZmSJwImsdPbMUfLYNwRba4ntraCtg1yWsNcnYl9kLnYV7pgvtClrQr0CF7JcOkQSqbh92mQmDonNdy2YvB3Ws/Z+grDwNZ0EL+m1oGHf1VjRn8kc7mbzvZgooHjqcSr5/av6/DP2oy9/d0EzPIpP5Me0KWtC3Q8XazN4DZ++1+bOFdn466THmGLUfEFlSyfdlsjB5G2afhZz5LGhBPw+VW3U6TkrOjPsye6EoDNrsuYh4rvdN0PAV+LqCFvTzUHVQWc3ZHPXofTQ/Fu+BgqR7ppLsl2In/wqloSZ3Rn0UtKAfhdL/1wYJz7ZDhMxpDTTr/TDW5HwgCH2PpuvCf/tOoXtDnkXM+ypoQb8H1V4vkRnOSXTTkMesw7TncB3O6Y+OgIQ5LbT7E5T+tG1FirUraEHfC5Xbpf9vh8bKKJK8f3qRfyjsjZCFIK5OAAAAAElFTkSuQmCC"/>
                                </defs>
                                <style>
                                </style>
                                <use id="Background" href="#img1" x="34" y="34"/>
                            </svg>
						</div>
					</div>
				</div>
			</div>
		</div>

	
		<section id="mu-pricing">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-pricing-area">
							<div class="row">
								<div class="col-md-12">
						<div class="mu-from-blog-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>More Oncoming</h2>
										<p>Pikpart Smart Garage Is India’s Leading Two-Wheeler Multi Brand Workshop Chain.</p>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mu-from-blog-content">
										<div class="row">
											<div class="col-md-6">
												<article class="mu-blog-item">
													<a href="#"><img src="assets/images/blog-img-1.jpg" alt="blgo image"></a>
													<div class="mu-blog-item-content">
														
														<h2 class="mu-blog-item-title"><a href="#">Quality Service</a></h2>
														<ul >
															<li>45 Checkpoint inspection</li>
															<li>Service warranty for 10 days on Smart Garage</li>
															<li>Quick Service booking from Smart Garage Application</li>
															<li> Professionally trained mechanics support</li>
														</ul>
														
													</div>
												</article>
											</div>
											<div class="col-md-6">
												<article class="mu-blog-item">
													<a href="#"><img src="assets/images/blog-img-2.jpg" alt="blgo image"></a>
													<div class="mu-blog-item-content">
														
														<h2 class="mu-blog-item-title"><a href="#">Quality Products</a></h2>
														<ul>
															<li>Best quality products on affordable prices</li>
															<li>Assured warranty on Pikpart Spare Parts</li>
															<li>Quick Service booking from Smart Garage Application</li>
															<li>Claim Online-warranty from Smart Garage Application</li>
														</ul>
													
													</div>
												</article>
											</div>
											<!-- <div class="col-md-4">
												<article class="mu-blog-item">
													<a href="#"><img src="assets/images/blog-img-3.jpg" alt="blgo image"></a>
													<div class="mu-blog-item-content">
														
														<h2 class="mu-blog-item-title"><a href="#">Smart Garage Inauguration</a></h2>
														<p>Smart Garage is India's best Service center chain of Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). It is a smart technology enabled futuristic multi revenue generating business model. </p>
														<a class="mu-blg-readmore-btn" href="blog-single.html">View Clip <i class="fa fa-long-arrow-right"></i></a>
													</div>
												</article>
											</div> -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
								
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Pricing Table -->



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

