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
   <!-- Add Brand Form -->
   <form action="/api/add-brand" method="post">
    @csrf <!-- CSRF protection -->
    <!-- No need for a hidden input field for productBrandsId -->
    <label for="productBrandsName">Brand Name:</label>
    <input type="text" id="productBrandsName" name="productBrandsName" required>
    <br>
    <label for="isActiveProductBrands">Active:</label>
    <input type="checkbox" id="isActiveProductBrands" name="isActiveProductBrands" value="1">
    <br>
    <button type="submit">Add Brand</button>
</form>



    

    <!-- Update Brand Form -->
</body>
</html>
