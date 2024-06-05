<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')

    @section('content')
<div class="container">
    <h3 class="text-center my-4">Update Category</h3>
    <form action="{{ route('category.update', ['id' =>  $product['categoryId']])  }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Text input for Category ID -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="categoryId" name="categoryId" class="form-control" value="{{ $product['categoryId'] }}" readonly>
                <label class="form-label" for="categoryId">Category ID</label>
            </div>
        </div>
        
<!-- File input for category image -->
<div class="mb-4">
    <div data-mdb-input-init class="form-outline">
        <input type="file" id="categoryImage" name="categoryImage" class="form-control">
        <label class="form-label" for="categoryImage">Category Image</label>
    </div>
    <!-- Display current image -->
    <img src="{{ $product['categoryImage'] }}" alt="Category Image" style="max-width: 100px;">
    <input type="hidden" name="currentCategoryImage" value="{{ $product['categoryImage'] }}">
</div>

        <!-- Text input for Category Name -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="categoryName" name="categoryName" class="form-control" value="{{ $product['categoryName'] }}">
                <label class="form-label" for="categoryName">Category Name</label>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Update Category</button>
    </form>
</div>
@endsection
</body>
</html>