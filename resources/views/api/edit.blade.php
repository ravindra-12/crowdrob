<!-- resources/views/api/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <h1>Edit Brand</h1>
    <form action="/api/update-brand/{{ $brand['productBrandsId'] }}" method="post">

        @csrf
        @method('PUT')
        <label for="productBrandsName">Brand Name:</label>
        <input type="text" id="productBrandsName" name="productBrandsName" value="{{ $brand['productBrandsName'] }}" required>
        <br>
        <label for="isActiveProductBrands">Active:</label>
        <input type="checkbox" id="isActiveProductBrands" name="isActiveProductBrands" {{ $brand['isActiveProductBrands'] ? 'checked' : '' }}>
        <br>
        <button type="submit">Update Brand</button>
    </form>
  
</body>
</html>
