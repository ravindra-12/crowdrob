<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add or Update Brand</title>
</head>
<body>
    <h1>Add or Update Brand</h1>

    <!-- Add Brand Form -->
    {{-- <form action="/api/add-brand" method="post">
        @csrf <!-- CSRF protection -->
        <label for="productBrandsName">Brand Name:</label>
        <input type="text" id="productBrandsName" name="productBrandsName" required>
        <br>
        <label for="isActiveProductBrands">Active:</label>
        <input type="checkbox" id="isActiveProductBrands" name="isActiveProductBrands" value="1">
        <br>
        <button type="submit">Add Brand</button>
    </form> --}}

    <!-- Update Brand Form -->
    <form action="/api/update-brand/{id}" method="post">
        @csrf <!-- CSRF protection -->


        @method('PUT') <!-- Use PUT method for update -->
        <input type="hidden" name="productBrandsId" value="{{ $brandId }}">
        <label for="productBrandsName">Brand Name:</label>
        <input type="text" id="productBrandsName" name="productBrandsName" value="{{ $brandName }}" required>
        <br>
        <label for="isActiveProductBrands">Active:</label>
        <input type="checkbox" id="isActiveProductBrands" name="isActiveProductBrands" value="1" {{ $isActive ? 'checked' : '' }}>
        <br>
        <button type="submit">Update Brand</button>
    </form>
</body>
</html>
