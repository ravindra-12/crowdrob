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
    <form action="{{ route('products.update', ['id' => $product['productId']]) }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="prodectTitle" name="prodectTitle" class="form-control" value="{{ $product['prodectTitle'] ?? '' }}" required>
                <label class="form-label" for="prodectTitle">Product Title</label>
            </div>
        </div>

        <!-- Image inputs -->
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage" name="prodectImage" class="form-control">
                <label class="form-label" for="prodectImage">Product Image</label>
            </div>
            @if(!empty($product['prodectImage']))
                <img src="{{ $product['prodectImage'] }}" alt="Product Image" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage" value="{{ $product['prodectImage'] ?? '' }}">
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage1" name="prodectImage1" class="form-control">
                <label class="form-label" for="prodectImage1">Product Image 1</label>
            </div>
            @if(!empty($product['prodectImage1']))
                <img src="{{ $product['prodectImage1'] }}" alt="Product Image 1" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage1" value="{{ $product['prodectImage1'] ?? '' }}">
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage2" name="prodectImage2" class="form-control">
                <label class="form-label" for="prodectImage2">Product Image 2</label>
            </div>
            @if(!empty($product['prodectImage2']))
                <img src="{{ $product['prodectImage2'] }}" alt="Product Image 2" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage2" value="{{ $product['prodectImage2'] ?? '' }}">
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage3" name="prodectImage3" class="form-control">
                <label class="form-label" for="prodectImage3">Product Image 3</label>
            </div>
            @if(!empty($product['prodectImage3']))
                <img src="{{ $product['prodectImage3'] }}" alt="Product Image 3" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage3" value="{{ $product['prodectImage3'] ?? '' }}">
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage4" name="prodectImage4" class="form-control">
                <label class="form-label" for="prodectImage4">Product Image 4</label>
            </div>
            @if(!empty($product['prodectImage4']))
                <img src="{{ $product['prodectImage4'] }}" alt="Product Image 4" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage4" value="{{ $product['prodectImage4'] ?? '' }}">
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage5" name="prodectImage5" class="form-control">
                <label class="form-label" for="prodectImage5">Product Image 5</label>
            </div>
            @if(!empty($product['prodectImage5']))
                <img src="{{ $product['prodectImage5'] }}" alt="Product Image 5" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage5" value="{{ $product['prodectImage5'] ?? '' }}">
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage6" name="prodectImage6" class="form-control">
                <label class="form-label" for="prodectImage6">Product Image 6</label>
            </div>
            @if(!empty($product['prodectImage6']))
                <img src="{{ $product['prodectImage6'] }}" alt="Product Image 6" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage6" value="{{ $product['prodectImage6'] ?? '' }}">
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="file" id="prodectImage7" name="prodectImage7" class="form-control">
                <label class="form-label" for="prodectImage7">Product Image 7</label>
            </div>
            @if(!empty($product['prodectImage7']))
                <img src="{{ $product['prodectImage7'] }}" alt="Product Image 7" style="max-width: 100px;">
            @endif
            <input type="hidden" name="currentprodectImage7" value="{{ $product['prodectImage7'] ?? '' }}">
        </div>

        <!-- Additional fields go here -->

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="productPrice" name="productPrice" class="form-control" value="{{ $product['productPrice'] ?? '' }}" required>
                <label class="form-label" for="productPrice">Product Price</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <textarea id="productShortDescription" name="productShortDescription" class="form-control" required>{{ $product['productShortDescription'] ?? '' }}</textarea>
                <label class="form-label" for="productShortDescription">Product Short Description</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <textarea id="productDescription" name="productDescription" class="form-control" required>{{ $product['productDescription'] ?? '' }}</textarea>
                <label class="form-label" for="productDescription">Product Description</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="productSKU" name="productSKU" class="form-control" value="{{ $product['productSKU'] ?? '' }}">
                <label class="form-label" for="productSKU">Product SKU</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="subCategory" name="subCategory" class="form-control" value="{{ $product['subCategory'] ?? '' }}">
                <label class="form-label" for="subCategory">Sub Category</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="vendorSubCategory" name="vendorSubCategory" class="form-control" value="{{ $product['vendorSubCategory'] ?? '' }}">
                <label class="form-label" for="vendorSubCategory">Vendor Sub Category</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="productBrands" name="productBrands" class="form-control" value="{{ $product['productBrands'] ?? '' }}">
                <label class="form-label" for="productBrands">Product Brands</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="productInStock" name="productInStock" {{ isset($product['productInStock']) && $product['productInStock'] == 'true' ? 'checked' : '' }}>
                <label class="form-check-label" for="productInStock">Product In Stock</label>
            </div>
        </div>

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="number" id="categoryId" name="categoryId" class="form-control" value="{{ $product['categoryId'] ?? '' }}" required>
                <label class="form-label" for="categoryId">Category ID</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-OERcA2HjQzY2nuLZWb8+GHlbX3YV10KXcwXWfQt/rzYJQDAa8C9oL5XnKTpBuaLx" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-QNBmFFtxpGmRaGga1EsIU5FkWnKj97e/nxLJ5OXW3YswxTsejEY3z7AFLZCGkt8S" crossorigin="anonymous"></script>
@endsection
</body>
</html>
