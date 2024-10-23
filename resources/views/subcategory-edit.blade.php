<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Subcategory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @extends('layout')

    @section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card">
                    <div class="card-header text-center">Edit Subcategory</div>
                
                    <div class="card-body">
                        <form id="updatesubcategory"   enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updating -->
                
                            <!-- Subcategory Name -->
                            <div class="mb-3">
                                <label for="subCategoryName" class="form-label">Subcategory Name</label>
                                <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" value="{{ $subcategory['subCategoryName'] }}" required>
                            </div>
                
                            <!-- Category ID as Input Field -->
                            <div class="mb-3">
                                <label for="categoryId" class="form-label">Category ID</label>
                                <input type="number" class="form-control" id="categoryId" name="categoryId" value="{{ $subcategory['categoryId'] }}" required>
                            </div>
                
                            <!-- Subcategory Image -->
                            <div class="mb-3">
                                <label for="subCategoryImage" class="form-label">Subcategory Image</label>
                                <input type="file" class="form-control" id="subCategoryImage" name="subCategoryImage">
                                
                                @if(!empty($subcategory['subCategoryImage']))
                                    <img src="{{ $subcategory['subCategoryImage'] }}" alt="Subcategory Image" width="100px">
                                    <!-- Keep the existing image if no new image is uploaded -->
                                    <input type="hidden" name="existingImage" value="{{ $subcategory['subCategoryImage'] }}">
                                @endif
                            </div>
                
                            <button type="submit" class="btn btn-primary">Update Subcategory</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#updatesubcategory').on('submit', function(e) {
            e.preventDefault();
    
            var formData = new FormData(this); // Create a FormData object
            $.ajax({
                url: "{{ route('subcategory.update', $subcategory['subCategoryId']) }}", // Replace with the route to your update method
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from automatically processing the data
                contentType: false, // Prevent jQuery from setting contentType
                success: function(response) {
                    if (response.success) {
                        alert('SubCategory updated successfully.');
                        window.location.href = "/subcategory";
                    } else {
                        alert('Failed to update product.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('Error updating SubCategory: ' + xhr.responseText);
                }
            });
        });
    });
    </script>
    
    @endsection
</body>
</html>
