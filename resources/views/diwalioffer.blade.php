@extends('layout')
@section('content')

{{-- Hero Section --}}
<div class="container-fluid">
  <div class="row">
    <img src="{{asset('images/Diwali-offer-banner.jpg')}}" 
         class="img-fluid" 
         style="width: 100%; object-fit: cover; height: 100%;" 
         alt="Diwali Sale Banner">
  </div>
</div>




{{--  --}}
{{--  --}}
<div class="container py-3 my-4 promo promo-dark">
    <div class="row text-center mt-2">
      <!-- Delivery in 3hr -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="d-flex flex-column align-items-center">
          <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
            <i class="fas fa-truck fa-2x"></i>
          </div>
          <p class="mt-2 text-white">Delivery in 3hr</p>
        </div>
      </div>
  
      <!-- Cash On Delivery -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="d-flex flex-column align-items-center">
          <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
            <i class="fas fa-money-bill-wave fa-2x"></i>
          </div>
          <p class="mt-2 text-white">Cash On Delivery</p>
        </div>
      </div>
  
      <!-- Diwali Dhamaka Sale -->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="d-flex flex-column align-items-center">
          <div class="rounded-circle bg-light d-flex justify-content-center align-items-center" style="width: 60px; height: 60px;">
            <i class="fa-solid fa-burst"></i>
          </div>
          <p class="mt-2 text-white">Diwali Dhamaka Sale</p>
        </div>
      </div>
    </div>
  </div>

{{--  --}}
<div class="container my-5"> 
    <h3 class="text-center mb-4">Diwali Offer</h3>
    
    <!-- First Row -->
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <img src="{{ asset('images/banner_001.jpg') }}" alt="Product 1" class="img-fluid rounded product-image">
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <img src="{{ asset('images/banner_005.jpg') }}" alt="Product 4" class="img-fluid rounded product-image">
        </div>
        
    </div>
    <!-- Second Row -->
    <div class="row g-4 mt-3">
       
        <div class="col-sm-12 col-md-6 col-lg-6">
            <img src="{{ asset('images/banner_004.jpg') }}" alt="Product 2" class="img-fluid rounded product-image">
        </div>
   
       
        <div class="col-sm-12 col-md-6 col-lg-6">
            <img src="{{ asset('images/banner_002.jpg') }}" alt="Product 3" class="img-fluid rounded product-image">
        </div>
    </div>
</div>

{{--  --}}
<div class="container my-5">
    <div class="promo promo-dark promo-uppercase p-4 p-md-5 mb-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg">
                <h3>Unlock Diwali deals! <span class="text-warning"> Download our app </span> for special offers today!</h3>
            </div>
            <div class="col-12 col-lg-auto mt-4 mt-lg-0">
                <a href="https://play.google.com/store/apps/details?id=com.crowdrob.app&pcampaignid=web_share&pli=1"
                class="btn color bg-white rounded mx-2 px-3 py-2 text-transform-none ls-0 shadow-sm ms-2"><i
                    class="fa-brands fa-google-play me-2"></i>Play Store</a>
                    <a href=""
                    class="btn color bg-white rounded mx-2 px-3 py-2 text-transform-none ls-0 shadow-sm"><i
                        class="fa-brands fa-apple me-2"></i>App Store</a>
            </div>
        </div>
    </div>
</div>

<style>

	.reveal-content img {
		display: block;
	}

	.reveal-content .reveal-content-hover {
		position: absolute;
		top: auto;
		display: block;
		left: 1rem;
		bottom: 0;
		padding: 1rem;
		background: rgba(255,255,255,0.95);
		margin-bottom: 1px;
		z-index: 2;
	}

	@media (min-width: 992px) {
		.reveal-content .reveal-content-hover {
			top: 0;
			bottom: auto;
			left: 0;
			display: none;
			margin-top: 1.5rem;
			margin-left: -1rem;
			border-radius: 3px;
		}
		.reveal-content img:hover + .reveal-content-hover,
		.reveal-content-hover:hover {
			display: block;
		}
	}
</style>
<style>
  /* Small screens (up to 576px) */
  @media (max-width: 576px) {
    img {
      height: 300px;
    }
  }

  /* Medium screens (576px to 768px) */
  @media (min-width: 576px) and (max-width: 768px) {
    img {
      height: 400px;
    }
  }

  /* Large screens (768px to 992px) */
  @media (min-width: 768px) and (max-width: 992px) {
    img {
      height: 500px;
    }
  }

  /* Extra large screens (992px and above) */
  @media (min-width: 992px) {
    img {
      height: 500px;
    }
  }
</style>
{{-- End Hero Section --}}
<style>
    /* Default height for images on larger screens */
    .product-image {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }

    /* For small devices (mobile), reduce the height */
    @media (max-width: 768px) {
        .product-image {
            height: 250px;
        }
    }
</style>
@endsection
