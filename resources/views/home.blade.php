 <!-- home.blade.php -->
@extends('layout')
@section('content')
    <!-- Your home page content here -->

 
 <!-- Slider
  ============================================= -->

  
        {{-- <section id="slider" class="slider-element dark min-vh-100 include-header"
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
									<a href="https://play.google.com/store/apps/details?id=com.crowdrob.app&pcampaignid=web_share&pli=1" class="ms-0 ms-lg-2 mt-2 btn text-dark bg-white rounded-3 px-4 py-3 text-transform-none ls-0 shadow-sm"><i class="fa-brands fa-google-play me-2"></i>Get it on Play Store</a>
								</div>
								
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
        </section> --}}


        
        
        <!-- #slider end -->

        <!-- Content



            <section id="slider" class="slider-element dark swiper_wrapper min-vh-60 min-vh-md-100 include-header block-slider-3" data-autoplay="5000" data-speed="450">
			<div class="slider-inner">

				<div class="swiper swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption" style="max-width: 450px">
									<div>
										<h2 class="text-transform-none" data-animate="fadeInUp">Welcome to Canvas</h2>
										<p class="d-none d-sm-block" style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem molestiae, cum ratione at temporibus aperiam repudiandae consectetur, illo nam maiores.</p>
										<a href="#" data-animate="fadeInUp" data-delay="400" class="btn btn-lg btn-light mt-4">Know More</a>
									</div>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background-image: url('images/blocks/preview/slider-2/2.jpg')"></div>
						</div>
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption" style="max-width: 450px">
									<div>
										<h2 class="text-transform-none" data-animate="fadeInUp">Welcome to Canvas</h2>
										<p class="d-none d-sm-block" style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">Seamlessly transition standardized channels whereas maintainable web services. Competently unleash exceptional portals through timely infomediaries.</p>
										<a href="#" data-animate="fadeInUp" data-delay="400" class="btn btn-lg btn-light mt-4">Know More</a>
									</div>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background-image: url('images/blocks/preview/hero-18/women.jpg')"></div>
						</div>
						<div class="swiper-slide dark">
							<div class="container">
								<div class="slider-caption" style="max-width: 450px">
									<div>
										<h2 class="text-transform-none" data-animate="fadeInUp">Welcome to Canvas</h2>
										<p class="d-none d-sm-block" style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">Competently embrace low-risk high-yield growth strategies rather than effective catalysts for change</p>
										<a href="#" data-animate="fadeInUp" data-delay="400" class="btn btn-lg btn-light mt-4">Know More</a>
									</div>
								</div>
							</div>
							<div class="swiper-slide-bg" style="background-image: url('images/blocks/preview/slider-1/3.jpg'); background-position: center 30%;"></div>
						</div>
					</div>
					<div class="swiper-navs">
						<div class="slider-arrow-left"><i class="bi-arrow-left"></i></div>
						<div class="slider-arrow-right"><i class="bi-arrow-right"></i></div>
					</div>
					<div class="swiper-scrollbar">
						<div class="swiper-scrollbar-drag">
						<div class="slide-number"><div class="slide-number-current"></div><span>/</span><div class="slide-number-total"></div></div></div>
					</div>
				</div>

				 Slider Bottom Content --->
				{{-- ============================================= --> --}}
				
                <section id="slider" class="slider-element dark swiper_wrapper min-vh-60 min-vh-md-100 include-header block-slider-3" data-autoplay="5000" data-speed="450">
                    <div class="slider-inner">
                        <div class="swiper swiper-parent">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide dark">
                                    <div class="container">
                                        <div class="slider-caption" style="max-width: 450px">
                                            <div>
                                                <h2 class="text-transform-none" data-animate="fadeInUp">Welcome to Crowdrob</h2>
                                                <p class="d-none d-sm-block" style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">At Crowdrob, we offer a seamless online shopping experience, empowering businesses to reach a global audience and providing shoppers with a wide variety of high-quality products.</p>
                                                <a href="#" data-animate="fadeInUp" data-delay="400" class="btn btn-lg btn-light mt-4">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide-bg" style="background-image: url('https://img.freepik.com/free-photo/young-asian-woman-with-shopping-bags-megaphone-blue_155003-44339.jpg?t=st=1720680003~exp=1720683603~hmac=91fe26b03a75252e62dc7c1518e1c4872ddfd87ee53cfb02c3e6cbbce4846a0d&w=996');"></div>
                                </div>
                                <div class="swiper-slide dark">
                                    <div class="container">
                                        <div class="slider-caption" style="max-width: 450px">
                                            <div>
                                                <h2 class="text-transform-none" data-animate="fadeInUp">
                                                    Sell Products Online
                                                </h2>
                                                <p class="d-none d-sm-block" style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">Seamlessly transition standardized channels whereas maintainable web services. Competently unleash exceptional portals through timely infomediaries.</p>
                                                <a href="#" data-animate="fadeInUp" data-delay="400" class="btn btn-lg btn-light mt-4">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide-bg" style="background-image: url('{{asset('/images/carousel/sell-products-bg.jpg')}}');"></div>
                                </div>
                                <div class="swiper-slide dark">
                                    <div class="container">
                                        <div class="slider-caption" style="max-width: 450px">
                                            <div>
                                                <h2 class="text-transform-none" data-animate="fadeInUp">Empowering Vendors Sell</h2>
                                                <p class="d-none d-sm-block" style="font-size: 17px;" data-animate="fadeInUp" data-delay="200">Welcome to CrowdRob, the ultimate multi-vendor mobile application designed to revolutionize online selling! Our platform provides vendors with a powerful and user-friendly solution to expand their businesses online.</p>
                                                <a href="#" data-animate="fadeInUp" data-delay="400" class="btn btn-lg btn-light mt-4">Know More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide-bg" style="background-image: url('{{asset('/images/carousel/online selling-vendor.jpg')}}');"></div>
                                </div>
                            </div>
                            <div class="swiper-navs">
                                <div class="slider-arrow-left"><i class="bi-arrow-left"></i></div>
                                <div class="slider-arrow-right"><i class="bi-arrow-right"></i></div>
                            </div>
                            <div class="swiper-scrollbar">
                                <div class="swiper-scrollbar-drag">
                                    <div class="slide-number">
                                        <div class="slide-number-current"></div><span>/</span>
                                        <div class="slide-number-total"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider-product-desc dark">
                            <div class="row m-0 d-none d-md-flex">
                                <div class="col-md-8 px-5 py-4 blurred-box">
                                    <div class="before-heading text-white-50 fw-normal text-uppercase ls-1 fw-normal mb-3" style="font-style: normal; font-family: 'Poppins', sans-serif; font-size: 12px;">Hurry up</div>
                                    <h3 class="mb-1" style="font-family: 'Poppins', sans-serif;">Join the CrowdRob community today</h3>
                                    <p class="mb-2 text-white-50">Join the CrowdRob community today and take your business to the next level. </p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=P3Huse9K6Xs" data-lightbox="iframe" class="col-md-4 image_fade" style="background: url('https://img.freepik.com/free-photo/young-asian-woman-with-shopping-bags-megaphone-blue_155003-44339.jpg?t=st=1720680003~exp=1720683603~hmac=91fe26b03a75252e62dc7c1518e1c4872ddfd87ee53cfb02c3e6cbbce4846a0d&w=996') center center / cover;">
                                    <i class="bi-play-fill"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                                {{--  Popular Category--}}

                                <section id="content">
                                    <div class="content-wrap">
                                        <div class="container">
                        
                                            <div class="row justify-content-center mb-5">
                                                <div class="col-xl-6 col-lg-8 text-center">
                                                    <h3 class="h1 fw-bold mb-4">Popular Categories</h3>
                                                    <p>Explore a wide range of high-quality products across categories like electronics, fashion, home & kitchen, beauty, sports, toys, and more at Crowdrob.</p>
                                                </div>
                                            </div>
                        
                                            <div class="row gallery-categories gutter-20">
                                                <div class="col-md-7">
                                                    <div style="background: url('{{asset('/images/hero/Headphone.jpg')}}') no-repeat center center; background-size: cover; height: 250px;">
                                                        <div class="vertical-middle p-4 dark">
                                                            <div class="heading-block m-0 border-0 w-50">
                                                                <h3 class="text-capitalize font-secondary text-transform-none fw-bold h1 mb-3">Headphones</h3>
                                                                <a href="#" class="more-link border-light text-light mb-0 stretched-link">Shop Now <i class="bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div style="background: url('{{asset('/images/hero/shoes-bg.jpg')}}') no-repeat center center; background-size: cover; height: 250px;">
                                                        <div class="vertical-middle p-4">
                                                            <div class="heading-block m-0 border-0 w-50">
                                                                <h3 class="text-capitalize font-secondary text-transform-none fw-bold h1 mb-3">Footwear</h3>
                                                                <a href="#" class="more-link border-dark text-dark mb-0 stretched-link">Shop Now <i class="bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="col-md-4">
                                                    <div style="background: url('{{asset('/images/hero/clothes-bg-image.jpg')}}') no-repeat 50% 40%; background-size: cover; height: 250px;">
                                                        <div class="vertical-middle p-4">
                                                            <div class="heading-block m-0 border-0 w-50">
                                                                <h3 class="text-capitalize font-secondary text-transform-none fw-bold h1 mb-3">Clothes</h3>
                                                                <a href="#" class="more-link border-dark text-dark mb-0 stretched-link">Shop Now <i class="bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="background: url('{{asset('/images/hero/stationary-bg-image.jpg')}}') no-repeat 100% 100%; background-size: cover; height: 250px;">
                                                        <div class="vertical-middle p-4">
                                                            <div class="heading-block m-0 border-0 w-50">
                                                                <h3 class="text-capitalize font-secondary text-transform-none fw-bold h1 mb-3">Stationary</h3>
                                                                <a href="#" class="more-link border-dark text-dark mb-0 stretched-link">Shop Now <i class="bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div style="background: url('{{asset('/images/hero/kitchen-bg-image.jpg')}}') no-repeat 20% 50%; background-size: cover; height: 250px;">
                                                        <div class="vertical-middle p-4">
                                                            <div class="heading-block m-0 border-0 w-50">
                                                                <h3 class="text-capitalize font-secondary text-transform-none fw-bold h1 mb-3">Home & Kitchens</h3>
                                                                <a href="#" class="more-link border-dark text-dark mb-0 stretched-link">Shop Now <i class="bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div style="background: url('{{asset('/images/hero/cosmetic-bg-image.jpg')}}') no-repeat 50% 80%; background-size: cover; height: 250px;">
                                                        <div class="vertical-middle p-4">
                                                            <div class="heading-block m-0 border-0 w-50">
                                                                <h3 class="text-capitalize font-secondary text-transform-none fw-bold h1 mb-3">Cosmetic</h3>
                                                                <a href="#" class="more-link border-dark text-dark mb-0 stretched-link">Shop Now <i class="bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                        
                                                <div class="col-md-7">
                                                    <div style="background: url('{{asset('/images/hero/electronic-bg.jpg')}}') no-repeat center center; background-size: cover; height: 250px;">
                                                        <div class="vertical-middle p-4">
                                                            <div class="heading-block m-0 border-0 w-50">
                                                                <h3 class="text-capitalize font-secondary text-transform-none fw-bold h1 mb-3">Electronics</h3>
                                                                <a href="#" class="more-link border-dark text-dark mb-0 stretched-link">Shop Now <i class="bi-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                        
                                        </div>
                        
                                    </div>
                                </section>

                                {{-- End Popular Category --}}

               
                {{-- <section id="content">
                    <div class="content-wrap py-0">
        
                    </div>
                </section> --}}
  {{-- ============================================= --> --}}

  <section id="content">

    <div class="content-wrap">

        <div class="section text-center text-white" style="background: #0a3883;">
           
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <p class="text-uppercase fw-bold mb-4">WHY YOU CHOOSE US?</p>
                        <h1 class="text-white fw-bold display-3" style="letter-spacing: -1px;">Choose Us & for a Better Shopping Experience </h1>
                        <p class="op-07 mw-sm mx-auto px-5 mb-5">Explore our multi-vendor shopping app for an easier and more enjoyable shopping journey. With our user-friendly features, you can browse, buy, and manage orders effortlessly. Elevate your online shopping experience today</p>
                        <a href="#" class="button button-xlarge rounded-pill button-light m-0 mt-2">Get Started</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

{{-- =============================================  --}}
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <div class="row justify-content-center col-mb-50 align-items-stretch">

                <div class="clear"></div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="d-flex flex-column p-4 rounded-3 shadow-lg bg-dark dark">
                        <div class="text-smaller px-1 bg-danger dark rounded-1 mb-3 d-inline-flex align-self-start">Support &amp; Help</div>
                        <h3 class="mb-3">Anywhere & Anytime</h3>
                        <p>Experience the freedom of shopping anytime, anywhere with our multi-vendor app. Whether at home, on the go, or anywhere in between, our platform brings the marketplace to your fingertips. Discover, browse, and buy from a wide range of vendors, all conveniently. Simplify your shopping today</p>
                        <img src="{{asset('/images/section/anytime.png')}}" alt="Feature Icon">
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="d-flex flex-column p-4 rounded-3 shadow-lg">
                        <div class="text-smaller px-1 bg-dark rounded-1 mb-3 d-inline-flex align-self-start">Badge</div>
                        <img src="{{asset('/images/section/transaction.png')}}" alt="Feature Icon" class="mb-5">
                        <h3 class="mb-3">Secure Transactions</h3>
                        <p class="text-muted mb-0">Enjoy peace of mind with secure transactions on our multi-vendor app. Your safety is our priority, and we employ advanced security measures to protect every purchase you make. Shop with confidence, knowing that your transactions are encrypted and your personal information is kept safe. Experience worry-free shopping today!</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-8 d-flex align-items-stretch">
                    <div class="d-flex flex-column bg-light p-4 rounded-3 shadow-lg">
                        <div class="d-flex align-items-center mb-3">
                            <span class="text-smaller px-1 fw-normal text-transform-none bg-success text-white rounded-1 me-2">Secure</span>
                            <h3 class="mb-0">100% Secured</h3>
                        </div>
                        <p class="text-smaller">Experience 100% secured and trustworthy transactions with our multi-vendor app. Our platform prioritizes your security and trust, ensuring every transaction is safeguarded and reliable. Shop confidently knowing your personal and financial information is protected. Join us today for a worry-free shopping experience!</p>

                        <img class="my-5" src="{{asset('/images/section/secured.png')}}" alt="Feature Icon">

                        <p class="mb-0">Shop confidently knowing your personal and financial information is protected. Join us today for a worry-free shopping experience!</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>




{{--  --}}
        <section id="content">
            <div class="content-wrap pb-0">

                {{-- <div class="container">
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
                </div> --}}
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
        <style>

            .block-slider-3 .swiper-horizontal>.swiper-scrollbar {
                top: 50%;
                bottom: auto;
                left: 50%;
                margin-left: 20%;
                width: 200px;
                height: 2px;
                transform: translateY(-50%);
                background-color: rgba(0,0,0,0.4);
                border-radius: 2px;
            }
        
            .block-slider-3 .swiper-scrollbar-drag { background: #000 }
        
            .block-slider-3 .slide-number {
                opacity: 1;
                bottom: 10px;
                text-align: left;
                right: auto;
            }
        
            .block-slider-3 .slide-number-current {
                top: auto;
                bottom: -2px;
                font-size: 34px;
                font-weight: 600;
            }
        
            .block-slider-3 .slide-number span {
                margin-left: 24px;
                font-size: 16px;
                opacity: .7;
            }
        
            .block-slider-3 .slide-number-total {
                font-size: 13px;
                line-height: 30px;
                left: 32px;
                opacity: .7;
            }
        
            .block-slider-3 .swiper-navs {
                position: absolute;
                display: block;
                left: 50%;
                top: 50%;
                margin-top: 60px;
                margin-left: 20%;
            }
        
            .block-slider-3 .slider-arrow-left,
            .block-slider-3 .slider-arrow-right {
                border-radius: 50%;
                background: transparent;
                border: 1px solid rgba(0,0,0,0.7);
                width: 36px;
                height: 36px;
            }
        
            .block-slider-3 .slider-arrow-right { left: 45px; }
        
            .block-slider-3 .slider-arrow-left i,
            .block-slider-3 .slider-arrow-right i {
                display: block;
                width: 36px;
                height: 36px;
                font-size: 16px;
                line-height: 34px;
                margin: 0 auto;
                color: #000;
            }
        
            .block-slider-3 .slider-arrow-right i { margin-left: -1px; }
        
            .block-slider-3 .swiper-button-disabled {
                opacity: .5;
                cursor: default;
            }
        
            .block-slider-3.dark .slider-arrow-left,
            .block-slider-3.dark .slider-arrow-right { border-color: rgba(255,255,255,0.7); }
        
            .block-slider-3.dark .swiper-horizontal > .swiper-scrollbar { background-color: rgba(255,255,255,0.4);  }
        
            .block-slider-3.dark .swiper-scrollbar-drag { background: #FFF }
        
            .block-slider-3.dark .slide-number,
            .block-slider-3.dark .slider-arrow-left i,
            .block-slider-3.dark .slider-arrow-right i { color: #FFF; }
        
            @media (min-width: 576px) and (max-width: 767px) {
                .block-slider-3 .swiper-horizontal>.swiper-scrollbar {
                    top: auto;
                    left: auto;
                    bottom: 70px;
                    right: 30px;
                    width: 100px;
                    height: 2px;
                    transform: translateY(0);
                }
        
                .block-slider-3 .swiper-navs {
                    left: auto;
                    top: auto;
                    bottom: 30px;
                    right: 115px;
                    margin: 0;
                }
            }
        
            .block-slider-3.slider-element .slider-product-desc {
                position: absolute;
                top: auto;
                bottom: 0;
                left: auto;
                right: 0;
                width: 65%;
                z-index: 2;
                overflow: hidden;
            }
        
            .block-slider-3.slider-element .slider-product-desc a .bi-play {
                position: absolute;
                left: 50%;
                top: 50%;
                z-index: 99;
                color: #000;
                font-size: 20px;
                width: 40px;
                height: 40px;
                line-height: 40px;
                background-color: #FFF;
                border-radius: 50%;
                text-align: center;
                padding-left: 4px;
                margin-top: -20px;
                margin-left: -20px;
                -webkit-transition: transform .3s ease;
                -o-transition: transform .3s ease;
                transition: transform .3s ease;
            }
        
            .block-slider-3.slider-element .slider-product-desc a:hover .bi-play {
                -webkit-transform: scale(1.1);
                -ms-transform: scale(1.1);
                -o-transform: scale(1.1);
                transform: scale(1.1);
            }
        
            .block-slider-3 .blurred-box:after{
                content: '';
                width: 130%;
                height: 130%;
                background: inherit;
                position: absolute;
                left: -25px;
                top: -25px;
                background-color: rgba(255,255,255,0.2);
                -webkit-filter: blur(20px);
                -o-filter: blur(20px);
                filter: blur(20px);
            }
        
            @media (max-width: 576px) {
                .block-slider-3 .swiper-horizontal>.swiper-scrollbar { display: none; }
                .block-slider-3 .swiper-navs { right: 0px; }
            }
        
            </style>