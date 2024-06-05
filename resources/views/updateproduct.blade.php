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
    <form action="{{ route('products.update', ['id' =>  $product['productId']]) }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="prodectTitle" name="prodectTitle" class="form-control" value="{{ $product['prodectTitle'] }}" required>
                <label class="form-label" for="prodectTitle">Product Title</label>
            </div>
        </div>

        <!-- Image inputs -->
        @foreach (['prodectImage', 'prodectImage1', 'prodectImage2', 'prodectImage3', 'prodectImage4', 'prodectImage5', 'prodectImage6', 'prodectImage7'] as $imageField)
            <div class="mb-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="file" id="{{ $imageField }}" name="{{ $imageField }}" class="form-control">
                    <label class="form-label" for="{{ $imageField }}">Product Image {{ substr($imageField, -1) }}</label>
                </div>
                <img src="{{ $product[$imageField] }}" alt="Product Image {{ substr($imageField, -1) }}" style="max-width: 100px;">
                <input type="hidden" name="current{{ $imageField }}" value="{{ $product[$imageField] }}">
            </div>
        @endforeach

        <!-- Other inputs -->
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="number" id="productPrice" name="productPrice" class="form-control" value="{{ $product['productPrice'] }}" required>
                <label class="form-label" for="productPrice">Product Price</label>
            </div>
        </div>
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <textarea id="productShortDescription" name="productShortDescription" class="form-control" required>{{ $product['productShortDescription'] }}</textarea>
                <label class="form-label" for="productShortDescription">Product Short Description</label>
            </div>
        </div>
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <textarea id="productDescription" name="productDescription" class="form-control" required>{{ $product['productDescription'] }}</textarea>
                <label class="form-label" for="productDescription">Product Description</label>
            </div>
        </div>
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="productSKU" name="productSKU" class="form-control" value="{{ $product['productSKU'] }}">
                <label class="form-label" for="productSKU">Product SKU</label>
            </div>
        </div>
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="number" id="categoryId" name="categoryId" class="form-control" value="{{ $product['categoryId'] }}" required>
                <label class="form-label" for="categoryId">Category ID</label>
            </div>
        </div>
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="subCategory" name="subCategory" class="form-control" value="{{ $product['subCategory'] }}">
                <label class="form-label" for="subCategory">Subcategory</label>
            </div>
        </div>
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="vendorSubCategory" name="vendorSubCategory" class="form-control" value="{{ $product['vendorSubCategory'] }}">
                <label class="form-label" for="vendorSubCategory">Vendor Subcategory</label>
            </div>
        </div>
        <div class="mb-4">
            <div data-mdb-input-init class="form-outline">
                <input type="text" id="productBrands" name="productBrands" class="form-control" value="{{ $product['productBrands'] }}">
                <label class="form-label" for="productBrands">Product Brands</label>
            </div>
        </div>

        <div class="mb-4 form-check d-flex justify-content-center bg-warning py-3">
            <input class="form-check-input me-2" type="checkbox" id="productInStock" name="productInStock" {{ $product['productInStock'] ? 'checked' : '' }}>
            <label class="form-check-label" for="productInStock">Product In Stock</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Update Product</button>
    </form>
</div>
@endsection
</body>
</html>
