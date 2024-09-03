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
        <h3 class="text-center my-4">Update Product Deals</h3>
        <form action="{{ route('productsdeals.update', ['id' => $product['productId']]) }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded">
            @csrf
            @method('PUT')
    
            <input type="hidden" id="productId" name="productId" value="{{ $product['productId'] }}">
    
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
                <label class="form-check-label" for="isFestiveOffer_Home">Is Festive Offer Home</label>
            </div>
            <div class="form-check form-switch mb-4">
                <input class="form-check-input" type="checkbox" id="isDiscountOffer_Home" name="isDiscountOffer_Home" {{ $product['isDiscountOffer_Home'] ? 'checked' : '' }}>
                <label class="form-check-label" for="isDiscountOffer_Home">Is Discount Offer Home</label>
            </div>
    
            <button type="submit" class="btn btn-primary btn-block">Update Product</button>
        </form>
    </div>
    @endsection
</body>
</html>
