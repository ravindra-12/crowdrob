<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Home Ad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')

    @section('content')
    <div class="container">
        <h3 class="text-center my-4">Update Home Ad</h3>
        <form action="{{ route('homeads.update', $homeads['homeAdsID']) }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Text input for Ads Image Title -->
            <div class="mb-4">
                <div class="form-outline">
                    <input type="text" id="adsImageTitle" name="adsImageTitle" class="form-control" value="{{ $homeads['adsImageTitle'] }}" placeholder="Ads Image Title">
                    <label class="form-label" for="adsImageTitle">Ads Image Title</label>
                </div>
            </div>

            <!-- File input for Ads Image -->
            {{-- <div class="mb-4">
                <div class="form-outline">
                    <input type="file" id="adsImage" name="adsImage" class="form-control">
                    <label class="form-label" for="adsImage">Ads Image</label>
                </div>
                <!-- Display current image -->
                <img src="{{ $homeads['adsImage'] }}" alt="Ads Image" style="max-width: 100px;">
                <input type="hidden" name="currentAdsImage" value="{{ $homeads['adsImage'] }}">
            </div> --}}

            {{--  --}}

            <div class="mb-4">
                <div data-mdb-input-init class="form-outline">
                    <input type="file" id="adsImage" name="adsImage" class="form-control">
                    <label class="form-label" for="categoryImage">adsImage</label>
                </div>
                <!-- Display current image -->
                <img src="{{ $homeads['adsImage'] }}" alt="Category Image" style="max-width: 100px;">
                <input type="hidden" name="currentCategoryImage" value="{{ $homeads['adsImage'] }}">
            </div>

            {{--  --}}

            <!-- Text input for Category ID -->
            <div class="mb-4">
                <div class="form-outline">
                    <input type="text" id="categoryID" name="categoryID" class="form-control" value="{{ $homeads['categoryID'] }}" placeholder="Category ID">
                    <label class="form-label" for="categoryID">Category ID</label>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Update Home Ad</button>
        </form>
    </div>
    @endsection
</body>
</html>
