 <!-- home.blade.php -->
@extends('layout')
@section('content')
    <!-- Your home page content here -->

 
 <!-- Slider
  ============================================= -->
        <section id="slider" class="slider-element dark min-vh-100 include-header"
            style="background-image: url('{{ asset('/images/hero/1.svg') }}');">
            <div class="slider-inner flex-column">

                <div class="vertical-middle">
					<div class="container">
						<div class="row align-items-lg-center g-0">

							<div class="col-lg-6 col-md-6">
								<h2 class="display-3 fw-bold text-white">Sell Your<br>Products Online.</h2>
								<p class="lead mb-4 fw-normal">Best Shoping App For Your Business </p>
								<div>
									<a href="#" class="btn mt-2 text-dark bg-white rounded-3 px-4 py-3 text-transform-none ls-0 shadow-sm"><i class="fa-brands fa-apple me-2"></i>Get it on the App Store</a>
									<a href="#" class="ms-0 ms-lg-2 mt-2 btn text-dark bg-white rounded-3 px-4 py-3 text-transform-none ls-0 shadow-sm"><i class="fa-brands fa-google-play me-2"></i>Get it on Play Store</a>
								</div>
								{{-- <p class="text-white-50 text-uppercase mt-2 ls-1 fw-medium"><small>Sign up &amp; Get 30 Days Free trail</small></p> --}}
							</div>

							<div class="col-lg-1 d-md-none d-lg-block"></div>

							<div class="col-lg-5 col-md-6 align-self-lg-end">
							<div class="slide-imgs">
									<img src="/images/hero/shop_now1.png" alt="Image" class="card-img">
									<img src="/images/hero/Crowdrob-shoping.png" alt="Image" class="iphone-img">
								</div>
							</div>

						</div>
					</div>
				</div>

                <div class="section-clients">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-md-7 d-flex align-items-lg-center flex-row">
                                <div class="col" style="text-align: center;">
                                    <div style="width: 80px; height: 80px; border-radius: 50%; background-color: #f37b35; display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset('images/sponcors/cosmetic.png') }}" alt="Clients" style="max-width: 100%; max-height: 100%; border-radius: 50%;">
                                    </div>
                                </div>
                                <div class="col" style="text-align: center;">
                                    <div style="width: 80px; height: 80px; border-radius: 50%; background-color: #f37b35; display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset('images/sponcors/cothes.png') }}" alt="Clients" style="max-width: 100%; max-height: 100%; border-radius: 50%;">
                                    </div>
                                </div>
                                <div class="col" style="text-align: center;">
                                    <div style="width: 80px; height: 80px; border-radius: 50%; background-color: #f37b35; display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset('/images/sponcors/stationary.png') }}" alt="Clients" style="max-width: 100%; max-height: 100%; border-radius: 50%;">
                                    </div>
                                </div>
                                <div class="col" style="text-align: center;">
                                    <div style="width: 80px; height: 80px; border-radius: 50%; background-color: #f37b35; display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset('/images/sponcors/footwear.png') }}" alt="Clients" style="max-width: 100%; max-height: 100%; border-radius: 50%;">
                                    </div>
                                </div>
                                <div class="col" style="text-align: center;">
                                    <div style="width: 80px; height: 80px; border-radius: 50%; background-color: #f37b35; display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset('/images/sponcors/ElectronicsAppliances.png') }}" alt="Clients" style="max-width: 100%; max-height: 100%; border-radius: 50%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- #slider end -->

        <!-- Content
  ============================================= -->
        <section id="content">
            <div class="content-wrap pb-0">

                <div class="container">
                    <div class="mx-auto text-center mt-4 mb-5 heading-block" style="max-width: 640px;">
                        <h5 class="text-uppercase ls-1 text-muted mb-3">Why You Choose Us?</h5>
                        <h2 class="text-transform-none mb-4">Choose Us &amp; for a Better Shopping Experience</h2>
                        <p class="lead fw-normal font-primary mb-5">Explore our multi-vendor shopping app for an easier
                            and more enjoyable shopping journey. With our user-friendly features, you can browse, buy,
                            and manage orders effortlessly. Elevate your online shopping experience today</p>
                    </div>

                    <div class="features-items mx-auto" style="max-width: 1000px;">
                        <div class="row justify-content-around col-mb-80 mb-0">
                            <div class="col-md-5">
                                <div class="feature-box media-box">
                                    <div class="fbox-icon">
                                        <i class="bi-geo-alt text-primary"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="h4 fw-bold mb-4">Anywhere &amp; Anytime</h2>
                                        <div class="lead fw-normal text-black-50">Experience the freedom of shopping
                                            anytime, anywhere with our multi-vendor app. Whether at home, on the go, or
                                            anywhere in between, our platform brings the marketplace to your fingertips.
                                            Discover, browse, and buy from a wide range of vendors, all conveniently.
                                            Simplify your shopping today</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="feature-box media-box">
                                    <div class="fbox-icon">
                                        <i class="bi-credit-card text-danger"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="h4 fw-bold mb-4">Secure Transactions</h2>
                                        <div class="lead fw-normal text-black-50"> Enjoy peace of mind with secure
                                            transactions on our multi-vendor app. Your safety is our priority, and we
                                            employ advanced security measures to protect every purchase you make. Shop
                                            with confidence, knowing that your transactions are encrypted and your
                                            personal information is kept safe. Experience worry-free shopping today!
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-around col-mb-80 mb-0">
                            <div class="col-md-5">
                                <div class="feature-box media-box">
                                    <div class="fbox-icon">
                                        <i class="bi-shield text-warning"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="h4 fw-bold mb-4">100% Secured &amp; Trustable</h2>
                                        <div class="lead fw-normal text-black-50">Experience 100% secured and
                                            trustworthy transactions with our multi-vendor app. Our platform prioritizes
                                            your security and trust, ensuring every transaction is safeguarded and
                                            reliable. Shop confidently knowing your personal and financial information
                                            is protected. Join us today for a worry-free shopping experience!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="feature-box media-box">
                                    <div class="fbox-icon">
                                        <i class="bi-journal text-info"></i>
                                    </div>
                                    <div class="fbox-content">
                                        <h2 class="h4 fw-bold mb-4">Extensive Vendor Selection</h2>
                                        <div class="lead fw-normal text-black-50">Choose us for access to an extensive
                                            selection of trusted vendors. Our multi-vendor shopping app brings together
                                            top-quality sellers, offering a diverse range of products to meet your every
                                            need. Explore our platform and discover an unparalleled variety of goods,
                                            all in one convenient location. Shop with confidence and satisfaction,
                                            knowing you have access to the best vendors in the market.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>

                <div class="row align-items-stretch align-content-stretch g-0 mt-5">

                    <div class="col-md-6 order-md-2"
                        style="background: url('{{ asset('/images/section/1.gif') }}') center center / cover; min-height: 300px;">
                    </div>

                    <div class="col-md-6 bg-color dark order-md-1">
                        <div class="section-features">
                            <h2 class="mb-3 h4 fw-semibold">Become a Seller: Start Your Business Today!</h2>
                            <p class="h6 fw-normal mb-5"> Ready to turn your passion into profit? With our multi-vendor
                                app, becoming a seller is easier than ever. Simply register, upload your products, and
                                start selling to customers worldwide. Join our platform and unleash your entrepreneurial
                                spirit today!</p>

                            <h2 class="mb-3 h4 fw-semibold">Unlock Your Potential: Seamless Selling Experience</h2>
                            <p class="h6 fw-normal">Ready to showcase your products to the world? Our multi-vendor app
                                offers a seamless selling experience, allowing you to manage your inventory, track
                                sales, and connect with customers effortlessly. Sign up today and unlock your full
                                potential as a seller!</p>


                            <h2 class="mb-3 h4 fw-semibold">Empower Your Business: Sell with Confidence</h2>
                            <p class="h6 fw-normal mb-0">Take control of your business and reach new heights with our
                                multi-vendor app. Gain access to a global audience, powerful tools, and reliable support
                                to grow your brand. Register now and embark on a journey to success with us!</p>
                        </div>
                    </div>
                </div>

               

                <div class="section m-0" style="padding: 100px 0; background-color: rgba(61,128,228,0.05)">

                    <div class="container">

                        <div class="heading-block mx-auto text-center" style="max-width: 500px">
                            <h5 class="text-uppercase ls-1 text-muted mb-2">Gallery</h5>
                            <h2 class="text-transform-none mb-3">App Screenshots</h2>
                            <p class="h6 fw-normal text-black-50">Best Shopping app for product category cloths, footware, medicine, cosmetics.. and more.</p>
                        </div>

                    </div>

<div class="owl-carousel owl-carousel-full image-carousel carousel-widget" 
     data-margin="40"
     data-center="true" 
     data-loop="true" 
     data-nav="false" 
     data-pagi="true" 
     data-items-xs="2"
     data-items-sm="3" 
     data-items-md="4" 
     data-items-lg="4" 
     data-items-xl="5">

    <div class="oc-item">
        <a href="{{ asset('/images/carousel/image3.jpeg') }}" data-lightbox="image">
            <img src="{{ asset('/images/carousel/image3.jpeg') }}" alt="Image 3">
        </a>
    </div>

    <div class="oc-item">
        <a href="{{ asset('/images/carousel/image2.jpeg') }}" data-lightbox="image">
            <img src="{{ asset('/images/carousel/image2.jpeg') }}" alt="Image 2">
        </a>
    </div>

    <div class="oc-item">
        <a href="{{ asset('/images/carousel/image4.jpeg') }}" data-lightbox="image">
            <img src="{{ asset('/images/carousel/image4.jpeg') }}" alt="Image 4">
        </a>
    </div>

    <div class="oc-item">
        <a href="{{ asset('/images/carousel/image5.jpeg') }}" data-lightbox="image">
            <img src="{{ asset('/images/carousel/image5.jpeg') }}" alt="Image 5">
        </a>
    </div>

    <div class="oc-item">
        <a href="{{ asset('/images/carousel/image9.jpeg') }}" data-lightbox="image">
            <img src="{{ asset('/images/carousel/image9.jpeg') }}" alt="Image 9">
        </a>
    </div>

    <div class="oc-item">
        <a href="{{ asset('/images/carousel/image7.jpeg') }}" data-lightbox="image">
            <img src="{{ asset('/images/carousel/image7.jpeg') }}" alt="Image 7">
        </a>
    </div>

    <div class="oc-item">
        <a href="{{ asset('/images/carousel/image8.jpeg') }}" data-lightbox="image">
            <img src="{{ asset('/images/carousel/image8.jpeg') }}" alt="Image 8">
        </a>
    </div>
</div>


                </div>


               

                <div class="section m-0 parallax" style="padding: 100px 0; background-color:rgb(61,128,228);"
                    data-0-top="background-color:rgb(61,128,228);" data-top-bottom="background-color:rgb(0,0,0);">
                    <div class="container">
                        {{-- <div class="row justify-content-between">
							<div class="col-xl-4 col-lg-5 col-md-6 dark dotted-bg">
								<div class="heading-block border-bottom-0 mb-4">
									<i class="bi-credit-card h1"></i>
									<h2 class="text-transform-none" style="font-size: 36px;">No Hidden Charges. <br>Choose Your Best Plan.</h2>
								</div>
								<div class="fw-normal lead">Credibly target highly efficient niche markets whereas end-to-end results.</div>

								<p class="text-white-50 mt-5">During Free trail you won't be charge and you can freely use this app without <a href="#" class="text-white"><u>Terms and Condtions</u></a>.</p>
							</div>
							<div class="col-lg-7 col-md-6">
								<div class="row">
									<div class="col-lg-6 pricing-table">
										<div class="card shadow"  style="background-image: url('{{ asset('/images/section/pricing-bg-light.svg') }}'); background-position: 0 100%; background-size: 100% 290px;">
											<h5 class="text-uppercase ls-1 mb-2">Startup</h5>
											<h2 class="ls-0 fw-bold mb-3">Free</h2>
											<p class="mb-5 text-black-50">Phosfluorescently negotiate alternative human capital with fully tested leadership skills. Quickly enable.</p>
											<ul class="iconlist">
												<li><i class="fa-solid fa-check-circle color"></i>7 Days Free Trail</li>
												<li><i class="fa-solid fa-check-circle color"></i>App-In-Purchase</li>
												<li><i class="fa-solid fa-check-circle color"></i>100% Safe &amp; Secure</li>
												<li><i class="fa-solid fa-check-circle color"></i>Liecenced Company</li>
												<li><i class="fa-solid fa-check-circle color"></i>No Hidden Charges</li>
											</ul>
											<a href="#" class="btn w-100 text-white bg-color rounded-3 p-3 fw-semibold text-uppercase">Download Free</a>
										</div>
									</div>

									<div class="col-lg-6 pricing-table mt-4 mt-lg-0">
										<div class="card shadow" style="background-image: url('{{ asset('/images/section/pricing-bg-light.svg') }}'); background-position: 0 100%; background-size: 100% 290px;">
											<h5 class="text-uppercase ls-1 text-white-50 mb-2">Pro</h5>
											<h2 class="ls-0 fw-bold mb-5 text-white">$29</h2>
											<p class="mt-2 text-black-50">Holisticly disintermediate viral results rather than next-generation action items vertical metrics rather than parallel growth strategies.</p>
											<ul class="iconlist">
												<li><i class="fa-solid fa-check-circle color"></i>One Time Purchase</li>
												<li><i class="fa-solid fa-check-circle color"></i>All Bundle Included</li>
												<li><i class="fa-solid fa-check-circle color"></i>100% Safe &amp; Secure</li>
												<li><i class="fa-solid fa-check-circle color"></i>Liecenced Company</li>
												<li><i class="fa-solid fa-check-circle color"></i>No Hidden Charges</li>
											</ul>
											<a href="#" class="btn w-100 text-white bg-color rounded-3 p-3 fw-semibold text-uppercase">Purchase Pro</a>
										</div>
									</div>
								</div>
							</div>
						</div> --}}
                        <div class="row justify-content-center dark mt-5">
                            <div class="col-md-7">
                                <h2 class="text-center text-white mb-5 mt-4 fw-semibold">Frequently Asked Questions
                                </h2>
                                <div class="toggle-wrap">
                                    <div class="toggle">
                                        <div class="toggle-header">
                                            <div class="toggle-icon">
                                                <i class="toggle-closed fa-solid fa-angle-right"></i>
                                                <i class="toggle-open fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="toggle-title">
                                                How do I register as a seller on your multi-vendor app?
                                            </div>
                                        </div>
                                        <div class="toggle-content">To register as a seller, simply navigate to the
                                            "Register" or "Sign Up" section of our app and select the option for
                                            sellers. Fill out the required information, including your contact details
                                            and store information, and submit your registration. Once approved, you can
                                            start listing your products for sale.</div>
                                    </div>

                                    <div class="toggle">
                                        <div class="toggle-header">
                                            <div class="toggle-icon">
                                                <i class="toggle-closed fa-solid fa-angle-right"></i>
                                                <i class="toggle-open fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="toggle-title">
                                                What fees are associated with selling on your platform?
                                            </div>
                                        </div>
                                        <div class="toggle-content">We charge a commission fee on each sale made
                                            through our platform. The commission percentage may vary depending on the
                                            product category and other factors. Additionally, there may be other fees
                                            associated with premium features or services, which will be clearly
                                            communicated to you before implementation.</div>
                                    </div>

                                    <div class="toggle">
                                        <div class="toggle-header">
                                            <div class="toggle-icon">
                                                <i class="toggle-closed fa-solid fa-angle-right"></i>
                                                <i class="toggle-open fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="toggle-title">
                                                How do I manage my products and orders as a seller?
                                            </div>
                                        </div>
                                        <div class="toggle-content"> As a seller, you will have access to a seller
                                            dashboard where you can manage your products, inventory, and orders. From
                                            this dashboard, you can add new products, update existing listings, track
                                            inventory levels, process orders, and communicate with customers. Our
                                            platform provides intuitive tools to streamline your selling process.</div>
                                    </div>

                                    <div class="toggle">
                                        <div class="toggle-header">
                                            <div class="toggle-icon">
                                                <i class="toggle-closed fa-solid fa-angle-right"></i>
                                                <i class="toggle-open fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="toggle-title">
                                                What measures are in place to ensure the security of transactions?
                                            </div>
                                        </div>
                                        <div class="toggle-content">We prioritize the security of all transactions on
                                            our platform. We employ industry-standard encryption protocols to protect
                                            sensitive information and ensure secure communication between buyers and
                                            sellers. Additionally, we continuously monitor our platform for any
                                            suspicious activity and take proactive steps to prevent fraud.</div>
                                    </div>

                                    <div class="toggle">
                                        <div class="toggle-header">
                                            <div class="toggle-icon">
                                                <i class="toggle-closed fa-solid fa-angle-right"></i>
                                                <i class="toggle-open fa-solid fa-angle-down"></i>
                                            </div>
                                            <div class="toggle-title">
                                                How do I handle returns and customer inquiries as a seller?
                                            </div>
                                        </div>
                                        <div class="toggle-content">Our platform provides a comprehensive system for
                                            handling returns and managing customer inquiries. If a customer requests a
                                            return or has a question about a product, you will receive a notification
                                            through your seller dashboard. From there, you can communicate with the
                                            customer, process returns, and resolve any issues in a timely manner. We
                                            provide guidance and support to help you navigate these situations
                                            effectively.</div>
                                    </div>
                                </div>
                                <h5 class="mt-4 text-center fw-normal text-white-50 mb-0">Didn't find what you were
                                    after? <a href="#" class="text-white"><u>Visit the FAQ Page</u></a></h5>
                            </div>
                        </div>
                    </div>
                </div>

               

                {{-- <div class="section m-0 bg-color" style="padding: 100px 0; background-image: linear-gradient(to bottom, #3D80E4 0%, #0a4bab 80%, #FFF 80%);">
					<div class="container dark dotted-bg mb-6">
						<div class="fslider testimonial testimonial-full text-center bg-transparent mx-auto" data-animation="fade" data-pagi="false">
							<div class="flexslider">
								<div class="slider-wrap mw-sm mx-auto">
									<div class="slide">
										<img src="{{asset('/images/clients/skype.svg')}}" alt="Customer Testimonials">
										<h3>Completely restore optimal human capital with economically sound infomediaries. Authoritatively extend end-to-end content with covalent relationships.</h3>
										<h5 class="mb-0 text-uppercase ls-1">- Steve Jobs</h5>
										<small class="op-07">Apple Inc.</small>
									</div>
									<div class="slide">
										<img src="{{ asset('/images/clients/netflix.svg')}}" alt="Customer Testimonials">
										<h3>Dynamically supply cross functional process improvements whereas enterprise-wide ROI. Distinctively streamline cost effective data and multifunctional functionalities.</h3>
										<h5 class="mb-0 text-uppercase ls-1">- Ta'eed</h4>
										<small class="op-07">Envato Inc.</small>
									</div>
									<div class="slide">
										<img src="{{ asset('/images/clients/nat-geo.svg')}}" alt="Customer Testimonials">
										<h3> Globally implement strategic resources via ethical markets. Interactively drive highly efficient potentialities before economically sound applications communicate solutions.</h3>
										<h5 class="mb-0 text-uppercase ls-1">- John Doe</h5>
										<small class="op-07">XYZ Inc.</small>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="container dark"><div class="line"></div></div>

					<div class="container">
						<div class="row mx-auto dotted-bg" style="max-width: 740px">
							<div class="col-md-12">
								<div class="text-center dark mb-5">
									<i class="fa-regular fa-life-ring h1 "></i>
									<h2 class="fw-bold mb-2">Need Help?</h2>
									<p class="fw-normal mb-2 lead">Enthusiastically morph unique web-readiness via impactful platforms.</p>
								</div>

								<div class="card bg-white shadow-lg border-0">
									<div class="card-body p-5">
										<div class="form-widget" data-loader="button" data-alert-type="inline">

											<div class="form-result"></div>

											<form class="row mb-0" id="landing-enquiry" action="include/form.php" method="post" enctype="multipart/form-data">
												<div class="form-process"></div>
												<div class="col-12 form-group mb-4">
													<label>Name:</label>
													<input type="text" name="landing-enquiry-name" id="landing-enquiry-name" class="form-control form-control-lg required" value="" placeholder="John Doe">
												</div>
												<div class="col-12 form-group mb-4">
													<label>Email:</label>
													<input type="email" name="landing-enquiry-email" id="landing-enquiry-email" class="form-control form-control-lg required" value="" placeholder="user@company.com">
												</div>
												<div class="col-12 form-group mb-4">
													<label>Phone:</label><br>
													<div class="input-group input-group-lg">
														<select class="form-select required pe-2" name="landing-enquiry-idd" id="landing-enquiry-idd" style="max-width: 90px;">
															<option value="+1">+1</option>
															<option value="+44">+44</option>
															<option value="+66">+66</option>
															<option value="+62">+62</option>
															<option value="+61">+61</option>
															<option value="+852">+852</option>
															<option value="+65">+61</option>
															<option value="+33">+61</option>
															<option value="+49">+49</option>
														</select>
														<input type="text" name="landing-enquiry-phone" id="landing-enquiry-phone" class="form-control form-control-lg required" value="" placeholder="02-232-2424">
													</div>
												</div>
												<div class="col-12 form-group mb-4">
													<label>Message:</label>
													<textarea name="landing-enquiry-additional-requirements" id="landing-enquiry-additional-requirements" class="form-control form-control-lg" cols="30" rows="5" placeholder="Please let us know how we can help you..."></textarea>
												</div>
												<div class="col-12 d-none">
													<input type="text" id="landing-enquiry-botcheck" name="landing-enquiry-botcheck" value="">
												</div>
												<div class="col-12">
													<button type="submit" name="landing-enquiry-submit" class="btn w-100 text-white bg-color rounded-3 py-3 fw-semibold text-uppercase mt-2">Contact Us</button>
												</div>

												<input type="hidden" name="prefix" value="landing-enquiry-">
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> --}}

            </div>

        </section><!-- #content end -->
        
        @endsection