@extends('layout')
@section('content')

{{-- Hero Section --}}
<section id="slider" class="slider-element" style="position: relative; overflow: hidden;">

    <div class="background-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('https://img.freepik.com/free-photo/group-friends-with-smartphones-outdoors_23-2148270899.jpg?t=st=1720099267~exp=1720102867~hmac=43ad0c94ac9071b86bf8ecc63aee37f36b89a35e38459c8c8646be25dfdc69b8&w=740'); background-size: cover; background-position: center; filter: blur(4px);"></div>
    <div class="color-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(31, 53, 83, 0.7);"></div>

    <div class="dotted-bg"></div>

    <div class="vertical-middle min-vh-lg-100" style="position: relative;">
        <div class="container py-5 py-lg-0">
            <div class="row align-items-center gx-5">
                <div class="col-lg-7 dark py-5">
                    <h1 class="display-4 fw-bold">Showcase Your App in One Place</h1>
                    <p class="lead mb-5  text-light">Discover the ultimate platform to showcase your app and reach a wide audience. With our user-friendly interface and powerful features, you can easily present your app's capabilities, engage with potential users, and drive downloads.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="https://play.google.com/store/apps/details?id=com.crowdrob.app&pcampaignid=web_share&pli=1" class="btn btn-lg btn-outline-light btn-custom">
                            <i class="fab fa-google-play"></i>
                            <div>
                                <small>Get it on</small>
                                <strong>Google Play</strong>
                            </div>
                        </a>
                        <a href="#" class="btn btn-lg btn-outline-light btn-custom">
                            <i class="fab fa-apple"></i>
                            <div>
                                <small>Download on the</small>
                                <strong>App Store</strong>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 mt-5 mt-lg-0">
                    <img src="{{asset('images/single-welcome.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

</section>


{{-- End Hero Section --}}
{{-- About Section --}}
<section class="container my-3">
    <h3 class="h1 fw-bold my-5 text-center">Contact Us</h3>
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
Mobile No: 8818887040</p>
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
        <label for="location" class="form-label">location</label>
        <input type="text" class="form-control" id="location" name="location" aria-describedby="location">
     </div>
    <div class="mb-3">
        <label for="messages" class="form-label">messages</label>
        <textarea class="form-control" id="messages" name="messages" aria-describedby="messages"></textarea>
    </div>
    {{-- <div class="mb-3">
        <label for="location" class="form-label">location</label>
        <textarea class="form-control" id="messages" name="location" aria-describedby="location"></textarea>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</section>
{{-- Awsome Features --}}

<div class="container my-5">
    <div class="col-xl-6 col-lg-8 text-center mx-auto">
        <h3 class="h1 fw-bold mb-3">Awesome Features</h3>
        <p class="text-larger text-muted">
            Experience the best of app showcasing with our cutting-edge features:
            </p>
    </div>
</div>

<div class="container my-4">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="feature-box fbox-effect flex-column">
                <div class="fbox-icon mb-4">
                    <a href="#">
                        <img src="{{ asset('images/Icon/retailer.png') }}" alt="Feature Icon" class="bg-transparent rounded-0" height="20px;" width="20px;">
                    </a>
                </div>
                <div class="fbox-content">
                    <h3>Responsive Layout</h3>
                    <p>Automatically adapts to any screen size, from desktop to mobile Ensures your app's presentation looks great on all devices Provides an optimal viewing and interaction experience
                        </p>
                </div>
            </div>
            <div class="feature-box fbox-effect flex-column">
                <div class="fbox-icon mb-4">
                    <a href="#"><img src="{{ asset('images/Icon/retailer.png') }}" alt="Feature Icon" class="bg-transparent rounded-0"
                        height="20px" width="20px"></a>
                </div>
                <div class="fbox-content">
                    <h3>Retina-Ready Graphics </h3>
                    <p>Displays ultra-sharp, high-resolution visuals optimized for Retina displays Showcases your app's icons, fonts, and graphics in stunning detail Impresses your audience with the best possible visual quality.</p>
                </div>
            </div>
            <div class="feature-box fbox-effect flex-column">
                <div class="fbox-icon mb-4">
                    <a href="#"><img src="{{ asset('images/Icon/retailer.png') }}" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                </div>
                <div class="fbox-content">
                    <h3>Powerful Performance</h3>
                    <p>Delivers a fast, smooth, and responsive experience Optimized code ensures quick loading times and seamless interactions Allows you to customize the showcase to prioritize performance</p>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-12 mb-4">
            <img src="https://www.athenastudio.co/themes/naxos-wp/wp-content/uploads/2021/05/awesome-features.png" alt="Feature Image" class="img-fluid">
        </div>

        <div class="col-lg-4 col-md-6 mb-4">
            <div class="feature-box fbox-effect flex-column">
                <div class="fbox-icon mb-4">
                    <a href="#"><img src="{{ asset('images/Icon/retailer.png') }}" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                </div>
                <div class="fbox-content">
                    <h3>Interactive Demos</h3>
                    <p>Lets users try out your app directly within the showcase Provides an engaging, hands-on experience to showcase your app's features Helps users understand the app's functionality and value</p>
                </div>
            </div>
            <div class="feature-box fbox-effect flex-column">
                <div class="fbox-icon mb-4">
                    <a href="#"><img src="{{ asset('images/Icon/retailer.png') }}" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                </div>
                <div class="fbox-content">
                    <h3>Multimedia Support</h3>
                    <p>Integrates videos, images, and GIFs to create a dynamic and engaging showcase Allows you to showcase your app's design, features, and user interface Enhances the overall presentation and appeal of your app</p>
                </div>
            </div>
            <div class="feature-box fbox-effect flex-column">
                <div class="fbox-icon mb-4">
                    <a href="#"><img src="{{ asset('images/Icon/retailer.png') }}" alt="Feature Icon" class="bg-transparent rounded-0"></a>
                </div>
                <div class="fbox-content">
                    <h3>Social Sharing</h3>
                    <p>Enables users to easily share your app showcase on social media Helps to spread awareness and drive more traffic to your app Encourages users to engage with your app and share their experiences</p>
                </div>
            </div>
        </div>
    </div>
</div>



{{-- End Awsome Feature --}}


{{-- How To Work --}}
<section id="content">
    <div class="content-wrap">
       
            <div>
                <h3 class="h1 fw-bold mb-3 text-center">How It <span>Works</span>?</h3>
                <p class="text-larger text-center">Discover the simple steps to showcase your app:</p>
             </div>
            

            <div class="line border-double border-default my-6"></div>
            <div class="clear"></div>

            <div class="row feature-box-border-horizontal border-hover-animate col-mb-50 justify-content-center my-5">
                <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect">
                    <div class="fbox-icon bg-white mb-4">
                        <a href="#"><i>1</i></a>
                    </div>
                    <div class="fbox-content">
                        <h3 class="text-transform-none text-larger mb-4"> Sign Up</h3>
                        <p>Create an account and provide your app's details.</p>
                        <a href="#" class="button button-small button-dark button-rounded border-width-1 ms-0 mt-4">Get Started <i class="uil uil-angle-right-b me-0"></i></a>
                    </div>
                </div>

                <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect">
                    <div class="fbox-icon bg-white mb-4">
                        <a href="#"><i>2</i></a>
                    </div>
                    <div class="fbox-content">
                        <h3 class="text-transform-none text-larger mb-4">Customize</h3>
                        <p>Personalize your app's page with images, videos, and descriptions.</p>
                    </div>
                </div>

                <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect">
                    <div class="fbox-icon bg-white mb-4">
                        <a href="#"><i>3</i></a>
                    </div>
                    <div class="fbox-content">
                        <h3 class="text-transform-none text-larger mb-4">Publish</h3>
                        <p>Make your app live and start attracting potential users.</p>
                    </div>
                </div>

                <div class="col-md-3 feature-box fbox-light fbox-center fbox-effect noborder">
                    <div class="fbox-icon bg-white mb-4">
                        <a href="#"><i>4</i></a>
                    </div>
                    <div class="fbox-content">
                        <h3 class="text-transform-none text-larger mb-4">Engage</h3>
                        <p>Interact with your audience through comments and updates.
                        </p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


{{-- End How To Work --}}

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
 
</div>
<p class="my-3">Your feedback is invaluable to us as we strive to continuously improve our platform. If you have any suggestions, comments, or feedback, please don't hesitate to let us know. We appreciate your input and are committed to making Crowdrob the best online shopping destination for you.</p>
</section>



  @endsection
  