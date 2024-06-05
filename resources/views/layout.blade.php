<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="author" content="SemiColonWeb">
    <meta name="description"
        content="At Crowdrob, we believe in the power of entrepreneurship to drive economic growth and create meaningful impact in communities. By providing a platform for local vendors to showcase their products and reach a wider audience, we're empowering them to thrive in today's digital age.">

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600;700&family=Roboto:wght@300;400;500;900&display=swap"
        rel="stylesheet">

    <!-- Core Style -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Font Icons -->

    <link rel="stylesheet" href="{{ asset('css/font-icons.css') }}">
    <!-- Niche Demos -->

    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Document Title
 ============================================= -->
    <title>Download the app now and embark on a journey of discovery, convenience, and empowerment with Jharkhand's Top multivendor shopping platform – Crowdrob</title>


</head>

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

</html>
