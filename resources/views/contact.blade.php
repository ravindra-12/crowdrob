@extends('layout')
@section('content')





        <!-- Slider
  ============================================= -->
<section class="container my-3 ">
 <h1 class="text-center">Have a Question or Feedback? Get in Touch!</h1>
 <div class="row">
     <div class="col-md-6">
 <div class="shadow p-4 mb-5 bg-body-tertiary rounded">
    <h3>Customer Support</h3>
    <p>For any inquiries or assistance regarding your orders, account, or general questions about our platform, our customer support team is here to help. You can reach us via email at contacus@crowdrob.com or by filling out the contact form below.
</p>
</div >
</div>

  <div class="col-md-6">
<div class="shadow p-4 mb-5 bg-body-tertiary rounded">
<h3>Business Inquiries</h3>
<p>If you're interested in becoming a vendor on Crowdrob or have any business-related inquiries, we'd love to hear from you! Please email us at contactus@crowdrob.com and our team will get back to you as soon as possible.
</p>
</div>
</div>

<!--  -->
 <div class="row">

<div class="col-md-6">
    <h3>Address</h3>
 <p>2nd Floor,Near Shaurya workshop, beside nidan seva sadan, hospital, <br> Boreya Ormanjhi Road
 </p>
<p>Pincode: 834006</br>
Post Office: Boreya</br>
District: Ranchi</br>
City: Ranchi</br>
State: Jharkhand</p>
<p>MailId: contactus@crowdrob.com
<br>
Mobile No: 8986680104</p>
 <h3>Social Media</h3>
 <p>Stay updated with the latest news, promotions, and product launches by following us on social media:</p>

<!---->
<div class="row align-items-center my-3">
                              

                                <div class="col-md-4 mt-3 mt-md-0">
                                    <a href="https://www.facebook.com/Crowdrob" class="social-icon si-small text-white bg-facebook"
                                        title="Facebook">
                                        <i class="fa-brands fa-facebook-f"></i>
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>

                                    <a href="https://www.instagram.com/crowdrob" class="social-icon si-small text-white bg-instagram"
                                        title="Instagram">
                                        <i class="bi-instagram"></i>
                                        <i class="bi-instagram"></i>
                                    </a>

                                    <a href="https://twitter.com/crowdrob" class="social-icon si-small text-white bg-x-twitter"
                                        title="Twitter">
                                        <i class="fa-brands fa-x-twitter"></i>
                                        <i class="fa-brands fa-x-twitter"></i>
                                    </a>

                                    <!--<a href="#" class="social-icon si-small text-white bg-appstore"-->
                                    <!--    title="Apple">-->
                                    <!--    <i class="fa-brands fa-apple"></i>-->
                                    <!--    <i class="fa-brands fa-apple"></i>-->
                                    <!--</a>-->

                                  

                                </div>
                            </div>


<!---->
</div>
<div class="col-md-6 shadow p-4 mb-5 bg-body-tertiary rounded">

  <form method="POST" action="{{ route('form.submit') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" aria-describedby="name">
    </div>
    <div class="mb-3">
        <label for="emailID" class="form-label">Email address</label>
        <input type="email" class="form-control" id="emailID" name="emailID" aria-describedby="emailID">
    </div>
    <div class="mb-3">
        <label for="mobileNo" class="form-label">mobileNo</label>
        <input type="tel" class="form-control" id="mobileNo" name="mobileNo" aria-describedby="mobileNo">
    </div>
    <div class="mb-3">
        <label for="messages" class="form-label">messages</label>
        <textarea class="form-control" id="messages" name="messages" aria-describedby="messages"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
<p class="my-3">Your feedback is invaluable to us as we strive to continuously improve our platform. If you have any suggestions, comments, or feedback, please don't hesitate to let us know. We appreciate your input and are committed to making Crowdrob the best online shopping destination for you.</p>
</section>



  @endsection
    <!-- #footer end -->

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
