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

<<<<<<< HEAD
  @section('content')
<div class="container">
    <h3 class="text-center my-4">Edit Product</h3>
    <form action="/discountprice/discountupdate/{{ $product['productId'] }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded">
        @csrf
        @method('PUT')
    
        <!-- Text input for product MRP price -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="productId" name="productId" class="form-control" value="{{ $product['productId'] }}" hidden>
                {{-- <label class="form-label" for="productId">productId</label> --}}
            </div>
        </div>
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="productDiscount" name="productDiscount" class="form-control" value="{{ $product['productDiscount'] }}">
                <label class="form-label" for="productDiscount">Product Discount Price in %</label>
=======
    @section('content')
    <div class="container">
        <h3 class="text-center my-4">Edit Product</h3>
        <form id="updatedicountprice" class="border p-5 shadow-sm bg-body-tertiary rounded">
            @csrf
            @method('PUT')
        
            <!-- Text input for product MRP price -->
            <div class="mb-4">
                <div class="form-outline">
                    <input type="hidden" id="productId" name="productId" class="form-control" value="{{ $product['productId'] }}">
                </div>
            </div>
            <div class="mb-4">
                <div class="form-outline">
                    <input type="text" id="productDiscount" name="productDiscount" class="form-control" value="{{ $product['productDiscount'] }}">
                    <label class="form-label" for="productDiscount">Product Discount Price in %</label>
                </div>
>>>>>>> f963cae (first commit)
            </div>
        
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block">Update Product</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $('#updatedicountprice').on('submit', function(event){
            event.preventDefault();

            // Prepare the form data with the CSRF token included
            var formData = $(this).serialize();

            $.ajax({
                url : "/discountprice/discountupdate/" + $('#productId').val(), // Pass product ID dynamically
                method : "POST",
                data : formData,
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val() // Ensure CSRF token is included
                },
                success : function(data){
                    if (data.success) {
                        alert('Discount Price Updated Successfully');
                        window.location.href = "/updateproductdiscount";
                    } else {
                        alert('Failed to Update Discount Price');
                    }
                },
                error : function(xhr, status, error){
                    console.log(xhr.responseText);
                    alert('Error occurred while updating the discount price');
                }
            });
        });
    </script>
    @endsection

</body>
</html>
