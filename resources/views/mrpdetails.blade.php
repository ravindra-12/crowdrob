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
    <form action="/mrp/mrpupdate/{{ $product['productId'] }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded">
        @csrf
        @method('PUT')
    
        <!-- Text input for product MRP price -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="price" name="price" class="form-control" value="{{ $product['productMRPPrice'] }}">
                <label class="form-label" for="price">Product MRP Price</label>
            </div>
        </div>
    
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Update Product</button>
    </form>
</div>
@endsection
</body>
</html>
