<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')

    @section('content')
    <div class="container">
        <h3 class="text-center my-4">Add Carousel</h3>
        <form action="{{ route('adshome.store') }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" enctype="multipart/form-data">
            @csrf

            <!-- Text input for Carousel Title -->
            <div class="mb-4">
                <div class="form-outline">
                    <input type="text" id="adsImageTitle" name="adsImageTitle" class="form-control" placeholder="adsImageTitle">
                    <label class="form-label" for="heroTitle">adsImageTitle</label>
                </div>
            </div>

            <!-- File input for Hero Image -->
            <div class="mb-4">
                <div class="form-outline">
                    <input type="file" id="adsImage" name="adsImage" class="form-control">
                    <label class="form-label" for="heroImage">adsImage</label>
                </div>
            </div>

            <!-- Text input for Category ID -->
            <div class="mb-4">
                <div class="form-outline">
                    <input type="text" id="categoryID" name="categoryID" class="form-control" placeholder="categoryID">
                    <label class="form-label" for="categoryID">Category ID</label>
                </div>
            </div>
            {{-- <div class="mb-4">
                <div class="form-outline">
                    <input type="text" id="categoryID" name="categoryID" class="form-control" placeholder="categoryID">
                    <label class="form-label" for="categoryID">Category ID</label>
                </div>
            </div> --}}

            {{-- <div class="mb-3">
               
                <select class="form-select" id="categoryId" name="categoryID" required>
                    <option value="">Select Category</option> <!-- Default option -->
                    @foreach($products as $products)
                        <option value="{{ $products['categoryId'] }}">{{ $products['categoryName'] }}</option>
                    @endforeach
                </select>
                <label for="categoryId" class="form-label">Category</label>
            </div> --}}

            <!-- Text input for Hero Image URL -->
            {{-- <div class="mb-4">
                <div class="form-outline">
                    <input type="number" id="categoryID" name="categoryID" class="form-control" placeholder="Category Id">
                    <label class="form-label" for="heroImageURL">Category Id</label>
                </div>
            </div> --}}


            {{-- <div class="mb-4">
                <div class="form-outline">
                    <input type="text" id="heroImageURL" name="heroImageURL" class="form-control" placeholder="Carousel Image URL">
                    <label class="form-label" for="heroImageURL">Carousel Image URL</label>
                </div>
            </div> --}}

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Add Homeads</button>
        </form>
    </div>
    @endsection
</body>
</html>
