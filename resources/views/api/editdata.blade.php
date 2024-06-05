<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add or Update Brand</title>
</head>
<body>
    <h1>Add or Update Brand</h1>

    <!-- The form sends a POST request to the 'updateBrand' route -->
    <form method="POST" action="{{ route('updateBrand', ['id' => $data['productBrandsId']]) }}">
        <!-- CSRF token for security -->
        @csrf
        <!-- Spoofing a PUT request -->
        @method('PUT')
        <!-- Field for the brand's name -->
        <label for="productBrandsName">Brand Name:</label><br>
        <input type="text" id="productBrandsName" name="productBrandsName" value="{{ $data['productBrandsName'] }}"><br>
        <!-- Checkbox for whether the brand is active -->
        <label for="isActiveProductBrands">Is Active:</label><br>
        <input type="checkbox" id="isActiveProductBrands" name="isActiveProductBrands" {{ $data['isActiveProductBrands'] ? 'checked' : '' }}><br>
        <!-- Submit button -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>