<!-- edit_brand.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit Brand</title>
</head>
<body>
    <h1>Edit Brand</h1>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form action="/api/update-brand/{{ $brand['productBrandsId'] }}" method="post">
        @csrf
        @method('PUT')

        <label for="productBrandsName">Brand Name:</label>
        <input type="text" id="productBrandsName" name="productBrandsName" value="{{ $brand['productBrandsName'] }}" required>
        <br>

        <label for="isActiveProductBrands">Active:</label>
        <input type="checkbox" id="isActiveProductBrands" name="isActiveProductBrands" value="1" {{ $brand['isActiveProductBrands'] ? 'checked' : '' }}>
        <br>

        <button type="submit">Update Brand</button>
    </form>
</body>
</html>
