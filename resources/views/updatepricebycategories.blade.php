@extends('dashboardlayout')

@section('content')
@if (session('toast_success'))
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="mr-auto">Success</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ session('toast_success') }}
    </div>
</div>
@endif

<div class="container">
    <div class="card">
        <div class="card-body" style="background-color: #00ced1;">
            <h3 class="text-center">Update Price By Categories</h3>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Category ID</th>
            <th>Category Name</th>
            <th>Update MRP By Category (%)</th>
            <th>Update Price By Category (INR)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>
                <img src="{{ $product['categoryImage'] }}" class="img-fluid" height="80px" width="120px" />
            </td>
            <td>
                <h5 class="card-title">{{ $product['categoryId'] }}</h5>
            </td>
            <td>
                <p class="card-text">{{ $product['categoryName'] }}</p>
            </td>
            <td>
                <button class="btn btn-primary open-mrp-modal" data-category-id="{{ $product['categoryId'] }}">Update in %</button>
            </td>
            <td>
                <button class="btn btn-secondary open-inr-modal" data-category-id="{{ $product['categoryId'] }}">Update in INR</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal for Updating MRP -->
<div class="modal fade" id="updateMRPModal" tabindex="-1" role="dialog" aria-labelledby="updateMRPModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateMRPModalLabel">Update MRP in %</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateMRPForm">
                    @csrf
                    <input type="hidden" id="mrpCategoryId" name="categoryId" value="">
                    <div class="form-group">
                        <label for="mrpPrice">Enter New MRP %</label>
                        <input type="number" name="price" id="mrpPrice" class="form-control" placeholder="Enter percentage" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update MRP</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Updating Price in INR -->
<div class="modal fade" id="updatePriceInRModal" tabindex="-1" role="dialog" aria-labelledby="updatePriceInRModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePriceInRModalLabel">Update Price in INR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updatePriceInRForm">
                    @csrf
                    <input type="hidden" id="inrCategoryId" name="categoryId" value="">
                    <div class="form-group">
                        <label for="inrPrice">Enter New Price in INR</label>
                        <input type="number" name="price" id="inrPrice" class="form-control" placeholder="Enter price in INR" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Price</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Show toast if present
    $('.toast').toast('show');

    // Open modal for updating MRP
    $('.open-mrp-modal').click(function() {
        var categoryId = $(this).data('category-id');
        $('#mrpCategoryId').val(categoryId);
        $('#updateMRPModal').modal('show');
    });

    // Open modal for updating price in INR
    $('.open-inr-modal').click(function() {
        var categoryId = $(this).data('category-id');
        $('#inrCategoryId').val(categoryId);
        $('#updatePriceInRModal').modal('show');
    });

    // Handle MRP form submission with AJAX
    $('#updateMRPForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var categoryId = $('#mrpCategoryId').val();

        $.ajax({
            type: 'POST',
            url: '/mrpcatdetails/' + categoryId,
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#updateMRPModal').modal('hide');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Failed to update MRP');
            }
        });
    });

    // Handle INR form submission with AJAX
    $('#updatePriceInRForm').submit(function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        var categoryId = $('#inrCategoryId').val();

        $.ajax({
            type: 'POST',
            url: '/mrpupdateinrbycategory/' + categoryId,
            data: formData,
            success: function(response) {
                if (response.success) {
                    alert(response.message);
                    $('#updatePriceInRModal').modal('hide');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                alert('Failed to update price in INR');
            }
        });
    });
});
</script>
@endsection
