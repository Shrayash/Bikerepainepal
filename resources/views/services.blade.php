

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
						<h1 class="mu-page-header-title">Our exclusive services</h1>
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
					    <li class="breadcrumb-item active" aria-current="page">Services</li>
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

		<div id="mu-call-to-action">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-call-to-action-area">
							<div class="mu-call-to-action-left">
								<h2>Download our Mobile APP.</h2>
								<p style="color:#fff!important">Connect with us, wherever you are. Get all your details of servicing and booking with our app.</p>
							</div>
						<a href="https://play.google.com/store/apps/details?id=com.bikeRepariNepal.myapp" class=" mu-quote-btn"><svg id="svg51" width="180" height="53.333" version="1.1" viewBox="0 0 180 53.333" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"><metadata id="metadata9"><rdf:RDF><cc:Work rdf:about=""><dc:format>image/svg+xml</dc:format><dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/></cc:Work></rdf:RDF></metadata><path id="path11" d="m173.33 53.333h-166.66c-3.6666 0-6.6665-2.9999-6.6665-6.6665v-39.999c0-3.6666 2.9999-6.6665 6.6665-6.6665h166.66c3.6666 0 6.6665 2.9999 6.6665 6.6665v39.999c0 3.6666-2.9999 6.6665-6.6665 6.6665" fill="#100f0d" stroke-width=".13333"/><path id="path13" d="m173.33 1e-3h-166.66c-3.6666 0-6.6665 2.9999-6.6665 6.6665v39.999c0 3.6666 2.9999 6.6665 6.6665 6.6665h166.66c3.6666 0 6.6665-2.9999 6.6665-6.6665v-39.999c0-3.6666-2.9999-6.6665-6.6665-6.6665zm0 1.0661c3.0879 0 5.5999 2.5125 5.5999 5.6004v39.999c0 3.0879-2.5119 5.6004-5.5999 5.6004h-166.66c-3.0879 0-5.5993-2.5125-5.5993-5.6004v-39.999c0-3.0879 2.5114-5.6004 5.5993-5.6004h166.66" fill="#a2a2a1" stroke-width=".13333"/><path id="path35" d="m142.58 40h2.4879v-16.669h-2.4879zm22.409-10.664-2.8519 7.2264h-0.0853l-2.9599-7.2264h-2.6799l4.4399 10.1-2.5319 5.6185h2.5946l6.8412-15.718zm-14.11 8.7706c-0.81331 0-1.9506-0.40786-1.9506-1.4156 0-1.2865 1.416-1.7797 2.6373-1.7797 1.0933 0 1.6093 0.23546 2.2733 0.55732-0.19333 1.5442-1.5226 2.6379-2.9599 2.6379zm0.30133-9.1352c-1.8013 0-3.6666 0.79371-4.4386 2.5521l2.208 0.92184c0.47198-0.92184 1.3506-1.2218 2.2733-1.2218 1.2866 0 2.5946 0.77131 2.6159 2.1442v0.17133c-0.45066-0.25733-1.416-0.64318-2.5946-0.64318-2.3813 0-4.8039 1.3077-4.8039 3.7524 0 2.2302 1.952 3.6671 4.1386 3.6671 1.672 0 2.5959-0.75054 3.1732-1.6301h0.0867v1.2874h2.4026v-6.391c0-2.9593-2.2106-4.6103-5.0612-4.6103zm-15.376 2.3937h-3.5386v-5.7133h3.5386c1.86 0 2.9159 1.5396 2.9159 2.8566 0 1.2917-1.056 2.8567-2.9159 2.8567zm-0.064-8.0337h-5.9614v16.669h2.4869v-6.3149h3.4746c2.7573 0 5.4679-1.9958 5.4679-5.1765 0-3.1801-2.7106-5.1769-5.4679-5.1769zm-32.507 14.778c-1.7188 0-3.1573-1.4396-3.1573-3.415 0-1.9984 1.4385-3.4583 3.1573-3.4583 1.6969 0 3.0286 1.46 3.0286 3.4583 0 1.9754-1.3317 3.415-3.0286 3.415zm2.8567-7.8403h-0.086c-0.55826-0.66572-1.6328-1.2672-2.9853-1.2672-2.8359 0-5.4348 2.4921-5.4348 5.6925 0 3.1786 2.5989 5.6488 5.4348 5.6488 1.3525 0 2.427-0.6016 2.9853-1.2885h0.086v0.81558c0 2.1703-1.1598 3.3296-3.0286 3.3296-1.5245 0-2.4697-1.0953-2.8567-2.0188l-2.1691 0.90206c0.62238 1.503 2.2759 3.351 5.0259 3.351 2.9218 0 5.392-1.7188 5.392-5.9077v-10.181h-2.3634zm4.0822 9.7304h2.4906v-16.669h-2.4906zm6.164-5.4988c-0.0641-2.1911 1.6978-3.3078 2.9645-3.3078 0.98851 0 1.8254 0.49425 2.1057 1.2026zm7.7326-1.8906c-0.47238-1.2666-1.9114-3.6082-4.8541-3.6082-2.9218 0-5.3488 2.2983-5.3488 5.6707 0 3.1791 2.4062 5.6707 5.6275 5.6707 2.5989 0 4.1031-1.589 4.7264-2.513l-1.9333-1.289c-0.64465 0.94531-1.5249 1.5682-2.7931 1.5682-1.2666 0-2.1692-0.58012-2.7483-1.7186l7.5815-3.1359zm-60.409-1.8682v2.4057h5.7565c-0.17186 1.3532-0.62292 2.3411-1.3104 3.0286-0.83798 0.83745-2.1483 1.7614-4.4462 1.7614-3.5443 0-6.315-2.8567-6.315-6.4009s2.7707-6.4013 6.315-6.4013c1.9118 0 3.3077 0.75198 4.3388 1.7186l1.6974-1.6973c-1.4396-1.3745-3.351-2.427-6.0362-2.427-4.8552 0-8.9363 3.9524-8.9363 8.807 0 4.8541 4.0811 8.8066 8.9363 8.8066 2.6202 0 4.5967-0.85932 6.143-2.4702 1.5896-1.5896 2.0838-3.8234 2.0838-5.628 0-0.55785-0.04333-1.0734-0.1292-1.5032zm14.772 7.3675c-1.7188 0-3.201-1.4177-3.201-3.4368 0-2.0406 1.4822-3.4364 3.201-3.4364 1.7181 0 3.2003 1.3958 3.2003 3.4364 0 2.0191-1.4822 3.4368-3.2003 3.4368zm0-9.1075c-3.137 0-5.6927 2.3842-5.6927 5.6707 0 3.265 2.5557 5.6707 5.6927 5.6707 3.1358 0 5.692-2.4057 5.692-5.6707 0-3.2865-2.5562-5.6707-5.692-5.6707zm12.417 9.1075c-1.7176 0-3.2003-1.4177-3.2003-3.4368 0-2.0406 1.4828-3.4364 3.2003-3.4364 1.7188 0 3.2005 1.3958 3.2005 3.4364 0 2.0191-1.4817 3.4368-3.2005 3.4368zm0-9.1075c-3.1358 0-5.6915 2.3842-5.6915 5.6707 0 3.265 2.5557 5.6707 5.6915 5.6707 3.137 0 5.6927-2.4057 5.6927-5.6707 0-3.2865-2.5557-5.6707-5.6927-5.6707" fill="#fff" stroke-width=".13333"/><path id="path37" d="m27.622 25.899-14.194 15.066c5.34e-4 0.0031 0.0016 0.0057 0.0021 0.0089 0.43532 1.636 1.9296 2.8406 3.703 2.8406 0.70892 0 1.3745-0.19166 1.9453-0.52812l0.04533-0.02656 15.978-9.22-7.479-8.141" fill="#eb3131" stroke-width=".13333"/><path id="path39" d="m41.983 23.334-0.0136-0.0093-6.8982-3.999-7.7717 6.9156 7.7987 7.7977 6.8618-3.9592c1.203-0.64945 2.0197-1.9177 2.0197-3.3802 0-1.452-0.80571-2.7139-1.9968-3.3655" fill="#f6b60b" stroke-width=".13333"/><path id="path41" d="m13.426 12.37c-0.08533 0.31466-0.13018 0.64425-0.13018 0.98651v26.623c0 0.34162 0.04432 0.67233 0.13072 0.98587l14.684-14.681-14.684-13.914" fill="#5778c5" stroke-width=".13333"/><path id="path43" d="m27.727 26.668 7.3473-7.3451-15.96-9.2534c-0.58012-0.34746-1.2572-0.54799-1.9817-0.54799-1.7734 0-3.2697 1.2068-3.7051 2.8447-5.34e-4 0.0016-5.34e-4 0.0027-5.34e-4 0.0041l14.3 14.298" fill="#3bad49" stroke-width=".13333"/><path id="path33" d="m63.193 13.042h-3.8895v0.96251h2.9146c-0.0792 0.78545-0.39172 1.4021-0.91878 1.85-0.52705 0.44799-1.2 0.67292-1.9958 0.67292-0.87291 0-1.6125-0.30413-2.2186-0.90824-0.59385-0.61665-0.89584-1.3792-0.89584-2.2979 0-0.91864 0.30199-1.6812 0.89584-2.2978 0.60612-0.60412 1.3457-0.90624 2.2186-0.90624 0.44799 0 0.87504 0.07707 1.2666 0.24586 0.39172 0.16866 0.70625 0.40412 0.95211 0.70625l0.73958-0.73958c-0.33546-0.38132-0.76038-0.67292-1.2876-0.88544-0.52705-0.21253-1.077-0.31453-1.6708-0.31453-1.1645 0-2.1519 0.40412-2.9582 1.2104-0.80625 0.80825-1.2104 1.8041-1.2104 2.9811 0 1.177 0.40412 2.175 1.2104 2.9813 0.80625 0.80611 1.7937 1.2104 2.9582 1.2104 1.2229 0 2.1979-0.39172 2.9479-1.1876 0.66038-0.66238 0.99784-1.5582 0.99784-2.679 0-0.1896-0.02293-0.39172-0.05627-0.60425zm1.5068-3.7332v8.0249h4.6852v-0.98544h-3.654v-2.5457h3.2958v-0.96251h-3.2958v-2.5437h3.654v-0.98758zm11.255 0.98758v-0.98758h-5.5145v0.98758h2.2417v7.0373h1.0312v-7.0373zm4.9925-0.98758h-1.0312v8.0249h1.0312zm6.8066 0.98758v-0.98758h-5.5144v0.98758h2.2415v7.0373h1.0312v-7.0373zm10.406 0.05626c-0.79585-0.81877-1.7708-1.2229-2.9354-1.2229-1.1666 0-2.1415 0.40412-2.9374 1.2104-0.79585 0.79585-1.1874 1.7937-1.1874 2.9811s0.39159 2.1854 1.1874 2.9813c0.79585 0.80611 1.7708 1.2104 2.9374 1.2104 1.1541 0 2.1395-0.40426 2.9354-1.2104 0.79585-0.79585 1.1874-1.7938 1.1874-2.9813 0-1.177-0.39159-2.1729-1.1874-2.9686zm-5.1332 0.67078c0.59372-0.60412 1.3229-0.90624 2.1978-0.90624 0.87291 0 1.6021 0.30213 2.1854 0.90624 0.59372 0.59372 0.88531 1.3686 0.88531 2.2978 0 0.93131-0.29159 1.7041-0.88531 2.2979-0.58332 0.60412-1.3125 0.90824-2.1854 0.90824-0.87491 0-1.6041-0.30413-2.1978-0.90824-0.58132-0.60625-0.87291-1.3666-0.87291-2.2979 0-0.92918 0.29159-1.6916 0.87291-2.2978zm8.7706 1.3125-0.0437-1.548h0.0437l4.0791 6.5457h1.077v-8.0249h-1.0312v4.6957l0.0437 1.548h-0.0437l-3.8999-6.2437h-1.2562v8.0249h1.0312z" fill="#fff" stroke="#fff" stroke-miterlimit="10" stroke-width=".26666"/></svg></a>
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
										<h2>Better Rides with Refined Service</h2>
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

