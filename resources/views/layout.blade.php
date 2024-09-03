<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="SemiColonWeb">
    <meta name="description" content="At Crowdrob, we believe in the power of entrepreneurship to drive economic growth and create meaningful impact in communities. By providing a platform for local vendors to showcase their products and reach a wider audience, we're empowering them to thrive in today's digital age.">
    
    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&family=Roboto:wght@300;400;500;900&display=swap" rel="stylesheet">

    <!-- Core Style -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/crowdrob-logo.png') }}" type="image/png">

    <!-- Apple Touch Icon -->
    <link rel="apple-touch-icon" href="{{ asset('images/crowdrob-logo.png') }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Crowdrob - Empowering Local Vendors">
    <meta property="og:description" content="At Crowdrob, we believe in the power of entrepreneurship to drive economic growth and create meaningful impact in communities.">
    <meta property="og:image" content="{{ asset('images/crowdrob-logo.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">

    <!-- Structured Data -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Crowdrob",
      "url": "{{ url('/') }}",
      "logo": "{{ asset('images/crowdrob-logo.png') }}"
    }
    </script>

    <!-- Document Title -->
    <title>Download the app now and embark on a journey of discovery, convenience, and empowerment with Jharkhand's Top multivendor shopping platform – Crowdrob</title>
</head>
<body>


<body class="stretched">

    <!-- Document Wrapper
 ============================================= -->
    <div id="wrapper">

      @include('includes.header') 
      <!-- Include the header -->
@yield('content') <!-- This is where the page-specific content will go -->
       
        
        @include('includes.footer') <!-- Include the footer -->





    </div><!-- #wrapper end -->

    <!-- Go To Top
 ============================================= -->
    <div id="gotoTop" class="uil uil-angle-up"></div>

    <!-- JavaScripts
 ============================================= -->
    <script src="js/plugins.min.js"></script>
    <script src="js/functions.bundle.js"></script>

    <!-- Parallax Script
 ============================================= -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js"></script>
    <script>
        !SEMICOLON.Mobile.any() && skrollr.init({
            forceHeight: false
        });
    </script>

    <script>
        jQuery(window).on('load', function() {
            setTimeout(function() {
                jQuery('.owl-stage').after('<div class="owl-stage-outer-bg"></div>');
            }, 1000);
        });
    </script>

</body>
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
</html>
