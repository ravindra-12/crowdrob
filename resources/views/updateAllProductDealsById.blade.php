<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')

  @section('content')
<div class="container">
    <h3 class="text-center my-4">Edit Product</h3>
    <form action="/UpdateAllProductDeals/ProductDeals/{{ $product['productId'] }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded">
        @csrf
        @method('POST')
    
        <!-- Text input for product MRP price -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="productId" name="productId" class="form-control" value="{{ $product['productId'] }}">
                <label class="form-label" for="productId">productId</label>
            </div>
        </div>
      
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isTopDeal" name="isTopDeal" {{ $product['isTopDeal'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isTopDeal">Is Top Deal</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="istopTrending" name="istopTrending" {{ $product['istopTrending'] ? 'checked' : '' }}>
            <label class="form-check-label" for="istopTrending">Is Top Trending</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isTopFeatured" name="isTopFeatured" {{ $product['isTopFeatured'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isTopFeatured">Is Top Featured</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isTopRated" name="isTopRated" {{ $product['isTopRated'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isTopRated">Is Top Rated</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isTopSelling" name="isTopSelling" {{ $product['isTopSelling'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isTopSelling">Is Top Selling</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isTopDeal_Home" name="isTopDeal_Home" {{ $product['isTopDeal_Home'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isTopDeal_Home">Is Top Deal Home</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="istopTrending_Home" name="istopTrending_Home" {{ $product['istopTrending_Home'] ? 'checked' : '' }}>
            <label class="form-check-label" for="istopTrending_Home">Is Top Trending Home</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isTopFeatured_Home" name="isTopFeatured_Home" {{ $product['isTopFeatured_Home'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isTopFeatured_Home">Is Top Featured Home</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isTopRated_Home" name="isTopRated_Home" {{ $product['isTopRated_Home'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isTopRated_Home">Is Top Rated Home</label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isFestiveOffer_Home" name="isFestiveOffer_Home" {{ $product['isFestiveOffer_Home'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isFestiveOffer_Home">Is Festive Offer Home </label>
        </div>
        <div class="form-check form-switch mb-4">
            <input class="form-check-input" type="checkbox" id="isDiscountOffer_Home" name="isDiscountOffer_Home" {{ $product['isDiscountOffer_Home'] ? 'checked' : '' }}>
            <label class="form-check-label" for="isDiscountOffer_Home">Is Discount Offer Home</label>
        </div>
    
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Update Product</button>
    </form>
</div>
@endsection
</body>

{{-- <script>
    function toggleField(field) {
        const button = document.getElementById('toggle_' + field);
        const hiddenInput = document.getElementById(field);
        if (hiddenInput.value === 'true') {
            hiddenInput.value = 'false';
            button.innerText = 'False';
        } else {
            hiddenInput.value = 'true';
            button.innerText = 'True';
        }
    }
    
    function populateForm(data) {
        document.getElementById('productId').value = data.productId;
        setField('isTopDeal', data.isTopDeal);
        setField('istopTrending', data.istopTrending);
        setField('isTopFeatured', data.isTopFeatured);
        setField('isTopRated', data.isTopRated);
        setField('isTopSelling', data.isTopSelling);
        setField('isTopDeal_Home', data.isTopDeal_Home);
        setField('istopTrending_Home', data.istopTrending_Home);
        setField('isTopFeatured_Home', data.isTopFeatured_Home);
        setField('isTopRated_Home', data.isTopRated_Home);
        setField('isFestiveOffer_Home', data.isFestiveOffer_Home);
        setField('isDiscountOffer_Home', data.isDiscountOffer_Home);
    }
    
    function setField(field, value) {
        const hiddenInput = document.getElementById(field);
        const button = document.getElementById('toggle_' + field);
        hiddenInput.value = value;
        button.innerText = value ? 'True' : 'False';
    }
    
    // Example of fetching data from an API and populating the form
    fetch('https://api.example.com/product/4')
        .then(response => response.json())
        .then(data => populateForm(data))
        .catch(error => console.error('Error fetching data:', error));
    </script> --}}
</html>
