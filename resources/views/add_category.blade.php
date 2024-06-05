<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')

    @section('content')
<div class="container">
    <h3 class="text-center my-4">Add Category</h3>
    <form action="{{ route('category.store') }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" enctype="multipart/form-data">
        @csrf

        <!-- Text input for Category Name -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="categoryName" name="categoryName" class="form-control" placeholder="Category Name">
                <label class="form-label" for="categoryName">Category Name</label>
            </div>
        </div>

        <!-- Text input for Category Image -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="file" id="categoryImage" name="categoryImage" class="form-control">
                <label class="form-label" for="categoryImage">Category Image</label>
            </div>
        </div>

        <!-- Text input for Category Link -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="categoryLink" name="categoryLink" class="form-control" placeholder="Category Link URL">
                <label class="form-label" for="categoryLink">Category Link</label>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Add Category</button>
    </form>
</div>
@endsection
</body>
</html>
