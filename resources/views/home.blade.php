

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
 
    <div id="mu-slider">
		<div class="mu-slide">
			<!-- Start single slide  -->
			<div class="mu-single-slide">
				<img src="assets/images/slider-img-1.jpg" alt="slider img">
				<div class="mu-single-slide-content-area">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="mu-single-slide-content">
									<h1>Welcome to Bike Repairs</h1>
									<p>Best two wheeler service center in town. Give us a try and we promise you will choose us everytime.</p>
									<a class="mu-primary-btn" href="{{ route('customer.newbook') }}">Book Now <span class="fa fa-long-arrow-right"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End single slide  -->

			<!-- Start single slide  -->
			<div class="mu-single-slide">
				<img src="assets/images/slider-img-2.jpg" alt="slider img">
				<div class="mu-single-slide-content-area">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="mu-single-slide-content">
									<h1>India's biggest Smart Garage Now in Nepal</h1>
									<p>Prompt service you can depend on. Service your bike at the most affordable price possible.</p>
									<a class="mu-primary-btn" href="{{ route('customer.newbook') }}">Book Now <span class="fa fa-long-arrow-right"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End single slide  -->

			<!-- Start single slide  -->
			<div class="mu-single-slide">
				<img src="assets/images/slider-img-3.jpg" alt="slider img">
				<div class="mu-single-slide-content-area">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="mu-single-slide-content">
									<h1>AMC 30% Supersaver Deal</h1>
									<p>We respect your decision and give your vehicle the best possible service always. </p>
									<a class="mu-primary-btn" href="{{ route('customer.newbook') }}">Book Now <span class="fa fa-long-arrow-right"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End single slide  -->
		</div>
	</div>
	<!-- End Slider area -->

	
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
                    <h2>Our exclusive services</h2>
                    <p>The quality you expect, the service you deserve! </p>
                  </div>
                </div>
              </div>
              <!-- Start Service Content -->
              <div class="row">
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
              </div>
              <!-- End Service Content -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Services -->
		

		<!-- Call to Action -->
		<div id="mu-call-to-action">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-call-to-action-area">
							<div class="mu-call-to-action-left">
								<h2>Download our Mobile APP.</h2>
								<p style="color:#fff!important;">Connect with us, wherever you are. Get all your details of servicing and booking with our app.</p>
							</div>
							<a href="{{ route('downloads') }}" class="mu-primary-btn mu-quote-btn">Download APP (APK) <i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
    <!-- Start About -->
    <section id="mu-about">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="mu-about-area">

              <div class="row">
                <div class="col-md-12">
                  <div class="mu-title">
                    <h3>Refined Service at just NRS 299*</h3>
                    <p> Service your bike/scooter from the most experienced mechanic hands powered by India's most innovative garage service, <b>Pikpart (ROSPL group company)</b>. First 2 wheeler multibrand service center and smart garage Franchise in Nepal.   
                    </p>
                    <p style="font-size: 5px;">*T&C Apply</p>

                  </div>
                </div>
              </div>
            
             <!--  <div class="row">
                <div class="col-md-6">
                  <div class="mu-about-left">
                    <img class="" src="assets/images/about-us.jpg" alt="img">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mu-about-right">
                    <ul>
                      <li>
                        <h3>Our Mission</h3>
                        <p>Offer a stable and efficient servicing to any two wheeler bike/scooter regardless of their brand with help of Indian Franchise Pikpart Smart Garage. It has made its mark in the Indian market and hopes to do the same in the Nepali market as well.</p>
                      </li>
                      <li>
                         <h3>Our Mission</h3>
                        <p> First 2 wheeler multibrand service center and smart garage powered by Pikpart (ROSPL group company). To have a nationwide presence by establising ourselves as your repairing and consulting partner over vehicles with genuine products that offer our customers real value. Reliable and affordable repairs always to gain trust of customer. </p>
                      </li>
                      <li>
                        <h3>Our Value</h3>
                        <p>Smart Garage is very different than the local and authorized service centers. We offer reliability and quality products. We hope to tackle the customer issues that they usually encounter in local workshops and authorized service centers.</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End About -->
		

		<!-- Start Video -->
		<div id="mu-video">
			<div class="row">
				<div class="col-md-6">
					<div class="mu-video-left">
						<!-- <a href="#" class="mu-video-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a> -->
						<iframe class="responsive-iframe" src="https://www.youtube.com/embed/6Ap7v1NuCYQ" title="Bike Repairs Nepal" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mu-video-right">
						<p>A genuine solution to your two wheeler problems with hands that understand Automobile very well. Maintain your valuable vehicle safely for a long time with Bike Repairs Nepal. </p>
					</div>
				</div>
			</div>

			<!-- Start Video Popup -->
			<div class="mu-video-popup">
				<div class="mu-video-iframe-area">
					<a class="mu-video-close-btn" href="#"><i class="fa fa-times" aria-hidden="true"></i></a>
					<iframe width="854" height="480" src="https://www.youtube.com/embed/n9AVEl9764s" allowfullscreen></iframe>
				</div>
			</div>
			<!-- End Video Popup -->

		</div>
		<!-- End Video -->

		<!-- Start Portfolio -->
		<section id="mu-portfolio">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-portfolio-area">
							<!-- Title -->
							<div class="row">
								<div class="col-md-12">
									<div class="mu-title">
										<h2>Sharing Pride to your Ride</h2>
									<!-- 	<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa cum sociis.</p> -->
									</div>
								</div>
							</div>

							<div class="row">
									

									<!-- Start Portfolio Content -->
									<div class="mu-portfolio-content">
										<div class="filtr-container">

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="4">
							                   <a class="mu-imglink" href="assets/images/portfolio/img-1.jpg" title="Bike Repairs Nepal">
								                   	<img class="img-responsive" src="assets/images/portfolio/img-1.jpg" alt="image">
								                   	
							                   </a>
							                </div>

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="5">
							                    <a class="mu-imglink" href="assets/images/portfolio/img-2.jpg" title="Bike Repairs Nepal">
							                    	<img class="img-responsive" src="assets/images/portfolio/img-2.jpg" alt="image">
								                    
							                    </a>
							                </div>

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="3">
							                    <a class="mu-imglink" href="assets/images/portfolio/img-3.jpg" title="Bike Repairs Nepal">
							                    	<img class="img-responsive" src="assets/images/portfolio/img-3.jpg" alt="image">
								                   
							                    </a>
							                </div>

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="1">
							                    <a class="mu-imglink" href="assets/images/portfolio/img-4.jpg" title="Bike Repairs Nepal">
							                    	<img class="img-responsive" src="assets/images/portfolio/img-4.jpg" alt="image">
								                    
							                    </a>
							                </div>

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="2">
							                    <a class="mu-imglink" href="assets/images/portfolio/img-5.jpg" title="Bike Repairs Nepal">
							                    	<img class="img-responsive" src="assets/images/portfolio/img-5.jpg" alt="image">
								                    
							                    </a>
							                </div>

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="5">
							                   <a class="mu-imglink" href="assets/images/portfolio/img-6.jpg" title="Bike Repairs Nepal">
								                   	<img class="img-responsive" src="assets/images/portfolio/img-6.jpg" alt="image">
								                    
								                </a>
							                </div>

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="3">
							                   <a class="mu-imglink" href="assets/images/portfolio/img-7.jpg" title="Bike Repairs Nepal">
								                   	<img class="img-responsive" src="assets/images/portfolio/img-7.jpg" alt="image">
								                    
							                   </a>
							                </div>

							                <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="4">
							                    <a class="mu-imglink" href="assets/images/portfolio/img-8.jpg" title="Bike Repairs Nepal">
							                    	<img class="img-responsive" src="assets/images/portfolio/img-8.jpg" alt="image">
								                    
							                    </a>
							                </div>

							                  <div class="col-xs-6 col-sm-6 col-md-4 filtr-item" data-category="1">
							                    <a class="mu-imglink" href="assets/images/portfolio/img-4.jpg" title="Bike Repairs Nepal">
							                    	<img class="img-responsive" src="assets/images/portfolio/img-4.jpg" alt="image">
								                    
							                    </a>
							                </div>

							            </div>
									</div>
									<!-- End Portfolio Content -->
								</div>
							
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Portfolio -->

		<!-- Start Counter -->
	

		<!-- Start Client Testimonials -->
		<section id="mu-testimonials">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-testimonials-area">
							<h2>Our Happy Customers</h2>

							<div class="mu-testimonials-block">
								<ul class="mu-testimonial-slide">

									<li>
										<img class="mu-rt-img" src="assets/images/traveler-1.jpg" alt="img">
										<p>Servicing is really great at affordable price. </p>
										<h5 class="mu-rt-name">Jubin KC</h5>
										<!-- <span class="mu-rt-title">Web Developer </span> -->
									</li>

									<li>
										<img class="mu-rt-img" src="assets/images/traveler-2.jpg" alt="img">
										<p>Perfect Pick up and Delivery service. Got my bike repaired while relaxing at home. Keep Up!</p>
										<h5 class="mu-rt-name">Prija Newa</h5>
										<!-- <span class="mu-rt-title">UI/UX Designer</span> -->
									</li>

									<li>
										<img class="mu-rt-img" src="assets/images/traveler-3.jpg" alt="img">
										<p>Friendly mechanics and admins. Loved the AMC plans. Need more of such at Kathmandu.</p>
										<h5 class="mu-rt-name">Hemant Lama</h5>
										<!-- <span class="mu-rt-title">Web Designer </span> -->
									</li>

								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Client Testimonials -->

		<!-- Start from blog -->
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
		<!-- End from blog -->

		<!-- Start Newsletter -->
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
		<!-- End Newsletter -->

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

