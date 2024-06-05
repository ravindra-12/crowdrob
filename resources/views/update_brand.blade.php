<!-- resources/views/update_brand.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Brand</title>
</head>
<body>
    <h1>Update Brand</h1>
    <form method="POST" action="{{ route('update-brand', ['id' => $brand['productBrandsId']]) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="productBrandsName">Brand Name:</label>
            <input type="text" id="productBrandsName" name="productBrandsName" value="{{ $brand['productBrandsName'] }}" required>
        </div>

        <div>
            <label for="isActiveProductBrands">Active:</label>
            <input type="checkbox" id="isActiveProductBrands" name="isActiveProductBrands" value="1" {{ $brand['isActiveProductBrands'] ? 'checked' : '' }}>
        </div>

        <button type="submit">Update Brand</button>
    </form>
</body>
</html>
