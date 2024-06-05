<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    @extends('layout')
    @section('content')
<div class="container my-4">
    <h1 class="text-center">Product Details</h1>
    <div class="my-3">
        <a href="javascript:history.back()" class="btn btn-primary mt-3"><-Back</a>.
    </div>
</div>

<div class="container">
  
    {{-- <div class="row">
        <div class="col-md-6 mb-4">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ $product['prodectImage1'] }}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $product['prodectImage2'] }}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $product['prodectImage3'] }}" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $product['prodectImage4'] }}" alt="Fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $product['prodectImage5'] }}" alt="Fifth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $product['prodectImage6'] }}" alt="Sixth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ $product['prodectImage7'] }}" alt="Seventh slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon custom-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon custom-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <p class="card-text"><strong>Product ID:</strong> {{ $product['productId'] }}</p>
            <p class="card-text"><strong>Product Title:</strong> {{ $product['prodectTitle'] }}</p>
            <p class="card-text"><strong>Price:</strong> {{ $product['productPrice'] }}</p>
            <p class="card-text"><strong>In Stock:</strong> {{ $product['productInStock'] ? 'Yes' : 'No' }}</p>
            <p class="card-text"><strong>Brand:</strong> {{ $product['productBrands'] }}</p>
            <p class="card-text"><strong>Short Description:</strong> {!! $product['productShortDescription'] !!}</p>
            <p class="card-text">
                <b style="display: inline;">Description:</b>
                <span style="display: inline;">{!! $product['productDescription'] !!}</span>
            </p>
            <p class="card-text"><strong>SKU:</strong> {{ $product['productSKU'] }}</p>
            <p class="card-text"><strong>MRP Price:</strong> {{ $product['productMRPPrice'] }}</p>
            <p class="card-text"><strong>Discount Price:</strong> {{ $product['productDiscountPrice'] }}</p>
            <p class="card-text"><strong>Discount:</strong> {{ $product['productDiscount'] }}</p>
            <p class="card-text"><strong>Subcategory:</strong> {{ $product['subCategory'] }}</p>
            <p class="card-text"><strong>Vendor Subcategory:</strong> {{ $product['vendorSubCategory'] }}</p>
            {{-- <p class="card-text"><strong>Vendor Product Brands:</strong> {{ $product['vendorProductBrands'] }}</p> --}}
            {{-- <p class="card-text"><strong>Registered Vendor User ID:</strong> {{ $product['registerVendorUserId'] }}</p>
            <p class="card-text"><strong>Category ID:</strong> {{ $product['categoryId'] }}</p>
        </div>
    </div>
</div> --}}
{{--  --}}

<section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100 uniform-image" src="{{ $product['prodectImage1'] }}" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 uniform-image" src="{{ $product['prodectImage2'] }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 uniform-image" src="{{ $product['prodectImage3'] }}" alt="Third slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 uniform-image" src="{{ $product['prodectImage4'] }}" alt="Fourth slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 uniform-image" src="{{ $product['prodectImage5'] }}" alt="Fifth slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 uniform-image" src="{{ $product['prodectImage6'] }}" alt="Sixth slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100 uniform-image" src="{{ $product['prodectImage7'] }}" alt="Seventh slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon custom-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon custom-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          {{-- <div class="d-flex justify-content-center mb-3">
            <a data-fslightbox="mygallery" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp">
              <img width="60" height="60" class="rounded-2 uniform-thumb" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
            </a>
            <a data-fslightbox="mygallery" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp">
              <img width="60" height="60" class="rounded-2 uniform-thumb" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
            </a>
            <a data-fslightbox="mygallery" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp">
              <img width="60" height="60" class="rounded-2 uniform-thumb" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
            </a>
            <a data-fslightbox="mygallery" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp">
              <img width="60" height="60" class="rounded-2 uniform-thumb" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
            </a>
            <a data-fslightbox="mygallery" class="border mx-1 rounded-2" target="_blank" data-type="image" href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp">
              <img width="60" height="60" class="rounded-2 uniform-thumb" src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
            </a>
          </div> --}}
        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h4 class="title text-dark">
              {{ $product['prodectTitle'] }}
            </h4>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span class="ms-1">
                  4.5
                </span>
              </div>
              <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>In Stock:</span>
              <span class="text-success ms-2"> <p class="card-text"> {{ $product['productInStock'] ? 'Yes' : 'No' }}</p></span>
            </div>
            <div class="mb-3">
              <span class="h5"><strong>Price:</strong> {{ $product['productPrice'] }}</p></span>
             
            </div>
            <p>
              {!! $product['productDescription'] !!}
            </p>
            <div class="row">
              <dt class="col-3">ProductId:</dt>
              <dd class="col-9">{{ $product['productId'] }}</dd>
              <dt class="col-3">Product SKU</dt>
              <dd class="col-9">{{ $product['productSKU'] }}</dd>
              <dt class="col-3">MRPPrice</dt>
              <dd class="col-9"> {{ $product['productMRPPrice'] }}</dd>
              {{-- <dt class="col-3">DiscountPrice</dt>
              <dd class="col-9"> {{ $product['productDiscountPrice'] }}</dd> --}}
              <dt class="col-3">Brand</dt>
              <dd class="col-9">{{ $product['productBrands'] }}</dd>
              <dt class="col-3">CategoryId</dt>
              <dd class="col-9">{{ $product['categoryId'] }}</dd>
            </div>
            <hr />
          </div>
        </main>
      </div>
    </div>
    </section>
{{--  --}}
<style>
    .custom-control-prev-icon,
    .custom-control-next-icon {
        background-color: #000; /* Change this to your desired color */
        border-radius: 50%;
        width: 40px;
        height: 40px;

.icon-hover:hover {
  border-color: #3b71ca !important;
  background-color: white !important;
  color: #3b71ca !important;
}

.icon-hover:hover i {
  color: #3b71ca !important;
}
    }

    .uniform-image {
    width: 100%;
    height: 500px; /* Set the height you need */
    object-fit: cover; /* Ensure the image covers the area without stretching */
  }

  .uniform-thumb {
    width: 60px;
    height: 60px;
    object-fit: cover;
  }
</style>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection
</body>

</html>
