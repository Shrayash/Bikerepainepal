

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
 
   <!-- Start Page Header area -->
	<div id="mu-page-header">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-page-header-area">
						<h1 class="mu-page-header-title">About us</h1>
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
					    <li class="breadcrumb-item active" aria-current="page">About Us</li>
					  </ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumb -->

	
	<!-- Start main content -->
	<main>
		<!-- Start About -->
		<section id="mu-about">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-about-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Better Rides with Refined Service</h2>
									</div>
								</div>
							</div>
							<!-- Start Feature Content -->
							<div class="row">
								<div class="col-md-6">
									<div class="mu-about-left">
										<img class="" src="assets/images/about-us.jpg" alt="img">
									</div>
								</div>
								<div class="col-md-6">
									<div class="mu-about-right">
										<ul>
											<li>
                        <h3>Always there for your service.</h3>
                        <p>Offer a stable and efficient servicing to any two wheeler bike/scooter regardless of their brand with experience of Indian Franchise Pikpart Smart Garage. It has made its mark in the Indian market and hopes to do the same in the Nepali market as well.<br><br>
                      	First 2 wheeler multibrand service center and smart garage powered by Pikpart (ROSPL group company). To have a nationwide presence by establising ourselves as your repairing and consulting partner over vehicles with genuine products that offer our customers real value. Reliable and affordable repairs always to gain trust of customer. </p>
                      </li>
                      
										</ul>
									</div>
								</div>
							</div>
							<!-- End Feature Content -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End About -->

	<section id="mu-newsletter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-newsletter-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Join the Franchise</h2>
										<p>Pikpart Smart Garage Is India’s Leading Two-Wheeler Multi Brand Workshop Chain. Contact Us for more info.</p>
										<a class="mu-primary-btn" href="https://www.mysmartgarage.in/">Learn More <span class="fa fa-long-arrow-right"></span></a>
										<!-- <button type="button" class="btn btn-light">Visit Website</button> -->
									</div>
								</div>
	
								<!-- <div class="col-md-12">
									<div class="mu-newsletter-content">
										<form class="mu-subscribe-form">
											<input type="email" placeholder="Write your e-mail here">
											<button class="mu-subscribe-btn">Subscribe</button>
										</form>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

				<section id="mu-from-blog">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-from-blog-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Our Franchise Glimspe</h2>
										<p>Pikpart Smart Garage Is India’s Leading Two-Wheeler Multi Brand Workshop Chain.</p>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mu-from-blog-content">
										<div class="row">
											<div class="col-md-4">
												<article class="mu-blog-item">
													<a href="#"><img src="assets/images/blog-img-1.jpg" alt="blgo image"></a>
													<div class="mu-blog-item-content">
														
														<h2 class="mu-blog-item-title"><a href="#">Two Wheeler Service Center</a></h2>
														<p>Smart Garage is India's best Service center chain of Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). It is a smart technology enabled futuristic multi revenue generating business model. </p>
														<a class="mu-blg-readmore-btn" href="blog-single.html">View Clip<i class="fa fa-long-arrow-right"></i></a>
													</div>
												</article>
											</div>
											<div class="col-md-4">
												<article class="mu-blog-item">
													<a href="#"><img src="assets/images/blog-img-2.jpg" alt="blgo image"></a>
													<div class="mu-blog-item-content">
														
														<h2 class="mu-blog-item-title"><a href="#">Walkthrough of Smart Garage</a></h2>
														<p>Smart Garage is India's best Service center chain of Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). It is a smart technology enabled futuristic multi revenue generating business model. </p>
														<a class="mu-blg-readmore-btn" href="blog-single.html">View Clip <i class="fa fa-long-arrow-right"></i></a>
													</div>
												</article>
											</div>
											<div class="col-md-4">
												<article class="mu-blog-item">
													<a href="#"><img src="assets/images/blog-img-3.jpg" alt="blgo image"></a>
													<div class="mu-blog-item-content">
														
														<h2 class="mu-blog-item-title"><a href="#">Smart Garage Inauguration</a></h2>
														<p>Smart Garage is India's best Service center chain of Multibrand two wheeler franchisee powered by Pikpart (ROSPL group company). It is a smart technology enabled futuristic multi revenue generating business model. </p>
														<a class="mu-blg-readmore-btn" href="blog-single.html">View Clip <i class="fa fa-long-arrow-right"></i></a>
													</div>
												</article>
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

		<!-- Start Team -->
<!-- 		<section id="mu-team">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-team-area">
					
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Creative team</h2>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa cum sociis.</p>
									</div>
								</div>
							</div>
						
							<div class="row">
								<div class="col-md-12">
									<div class="mu-team-content">
										<div class="row">
											
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="assets/images/team-member.jpg" alt="img">
													</div>
													<div class="mu-single-team-content">
														<h3>Hannah Torres</h3>
														<span>Founder</span>
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
														<ul class="mu-team-social">
															<li><a href="#"><i class="fa fa-facebook"></i></a></li>
															<li><a href="#"><i class="fa fa-twitter"></i></a></li>
															<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
															<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
									
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="assets/images/team-member.jpg" alt="img">
													</div>
													<div class="mu-single-team-content">
														<h3>Hannah Torres</h3>
														<span>Founder</span>
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
														<ul class="mu-team-social">
															<li><a href="#"><i class="fa fa-facebook"></i></a></li>
															<li><a href="#"><i class="fa fa-twitter"></i></a></li>
															<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
															<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
										
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="assets/images/team-member.jpg" alt="img">
													</div>
													<div class="mu-single-team-content">
														<h3>Hannah Torres</h3>
														<span>Founder</span>
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
														<ul class="mu-team-social">
															<li><a href="#"><i class="fa fa-facebook"></i></a></li>
															<li><a href="#"><i class="fa fa-twitter"></i></a></li>
															<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
															<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
														</ul>
													</div>
												</div>
											</div>
									
											<div class="col-md-6">
												<div class="mu-single-team">
													<div class="mu-single-team-img">
														<img src="assets/images/team-member.jpg" alt="img">
													</div>
													<div class="mu-single-team-content">
														<h3>Hannah Torres</h3>
														<span>Founder</span>
														<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
														<ul class="mu-team-social">
															<li><a href="#"><i class="fa fa-facebook"></i></a></li>
															<li><a href="#"><i class="fa fa-twitter"></i></a></li>
															<li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
															<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
														</ul>
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
		</section> -->
		<!-- End Team -->

    <section class="contact" id="contact" style="padding-top: 0px!important">
        <div id="map">
        			<!-- How to change your own map point
                           1. Go to Google Maps
                           2. Click on your location point
                           3. Click "Share" and choose "Embed map" tab
                           4. Copy only URL and paste it within the src="" field below
                    -->

           <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1197183.8373802372!2d-1.9415093691103689!3d6.781986417238027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdb96f349e85efd%3A0xb8d1e0b88af1f0f5!2sKumasi+Central+Market!5e0!3m2!1sen!2sth!4v1532967884907" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe> -->
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d262.5905710092918!2d85.25186868730503!3d27.686904305555917!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb239afeed8da1%3A0xb50c5b533450da7a!2sBike%20Repairs%20Nepal!5e0!3m2!1sen!2snp!4v1662810608627!5m2!1sen!2snp" width="100%" height="500px"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
           
        </div>
        
    </section>
	

	</main>
	
	<!-- End main content -->	


    {{-- <section class="banner" id="top">
        
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
        
    </section> --}}
    
    <script>
        $('#vanish').fadeOut(15000);

    </script>
@endsection

