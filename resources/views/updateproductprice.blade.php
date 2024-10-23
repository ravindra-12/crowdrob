@extends('dashboardlayout')

@section('content')
@if (session('toast_success'))
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
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
<<<<<<< HEAD
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  Update Price</h3> </div>
          </div>
          </div>
        {{--  --}}
         
       
        {{--  --}}
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>prodectImage</th>
                    <th>prodectTitle</th>
                    {{-- <th>ShortDescription</th> --}}
                    <th>productPrice</th>
                    <th>productInStock</th>
                    <th>selling price</th>
                    {{-- <th>Created Date</th> --}}
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            @if(is_array($product['prodectImage']) && count($product['prodectImage']) > 0)
                                @if($product['prodectImage'][0]) <!-- Ensure the first image is not null -->
                                    <img src="{{ $product['prodectImage'][0] }}" class="img-fluid" height="80px" width="80px" />
                                @endif
                            @else
                                <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" />
                            @endif
                        </td>
                        <td>
                            <h5 class="card-title">{{ $product['prodectTitle'] }}</h5>
                        </td>
                        {{-- <td>
                            <p class="card-text">{!! $product['productShortDescription'] !!}</p>
                        </td> --}}
                        <td>
                            <p class="card-text"><strong>Price:</strong> {{ $product['productPrice'] }}</p>
                        </td>
                        <td>{{ $product['productInStock'] ? 'Yes' : 'No' }}</td>
                        <td>
                            <p class="card-text"><strong> Price:</strong> {{ $product['productMRPPrice'] }}</p>
                        </td>
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        <td>
                            <a href="{{ url('/mrpdetails/' . $product['productId']) }}" class="btn btn-primary">Update MRP in %</a> <!-- Link to the updateproduct route with productId -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
=======

<div class="container">
    <div class="card">
        <div class="card-body" style="background-color: #00ced1;">
            <h3 class="text-center">Update Price</h3>
        </div>
>>>>>>> f963cae (first commit)
    </div>
</div>



<table class="table table-responsive">
    <thead>
        <tr>
            <th>Product Image</th>
            <th>Product Title</th>
            <th>Product Price</th>
            <th>Product In Stock</th>
            <th>Selling Price</th>
            <th>Update MRP (%)</th>
            <th>Update Price (INR)</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productmrp as $product)
            <tr>
                <td>
                    <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" />
                </td>
                <td>
                    <h5 class="card-title">{{ $product['prodectTitle'] }}</h5>
                </td>
                <td>
                    <p class="card-text"><strong>Price:</strong> {{ $product['productPrice'] }}</p>
                </td>
                <td>{{ $product['productInStock'] ? 'Yes' : 'No' }}</td>
                <td>
                    <p class="card-text"><strong>Price:</strong> {{ $product['productMRPPrice'] }}</p>
                </td>
                <td>
                    <a href="javascript:void(0);" class="btn btn-primary open-modal" data-product-id="{{ $product['productId'] }}" data-mrp="{{ $product['productMRPPrice'] }}">Update in %</a>
                </td>
                <td>
                    <a href="javascript:void(0);" class="btn btn-secondary open-inr-modal" data-product-id="{{ $product['productId'] }}" data-price="{{ $product['productMRPPrice'] }}">Update in INR</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Pagination -->
<div class="d-flex justify-content-center">
    {{ $productmrp->links('pagination::bootstrap-5') }}
</div>

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
                    <input type="hidden" id="productId" name="productId" value="">
                    <div class="form-group">
                        <label for="price">Enter New MRP %</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Enter percentage">
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
                    <input type="hidden" id="inrProductId" name="productId" value="">
                    <div class="form-group">
                        <label for="inrPrice">Enter New Price in INR</label>
                        <input type="number" name="price" id="inrPrice" class="form-control" placeholder="Enter price in INR">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Price</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Show toast if present
    $('.toast').toast('show');

    // Open modal for updating MRP
    $('.open-modal').click(function() {
        var productId = $(this).data('product-id');
        // Clear the previous values
        $('#productId').val(productId);
        $('#price').val('');  // Clear previous MRP value

        $('#updateMRPModal').modal('show');
    });

    // Open modal for updating price in INR
    $('.open-inr-modal').click(function() {
        var productId = $(this).data('product-id');
        // Clear the previous values
        $('#inrProductId').val(productId);
        $('#inrPrice').val('');  // Clear previous price value

        $('#updatePriceInRModal').modal('show');
    });

    // Handle MRP form submission with AJAX
    $('#updateMRPForm').submit(function(e) {
        e.preventDefault();

        var formData = $(this).serialize();
        var productId = $('#productId').val();

        $.ajax({
            type: 'PUT',
            url: '/mrp/mrpupdate/' + productId,
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
        var productId = $('#inrProductId').val();

        $.ajax({
            type: 'PUT',
            url: '/mrpinr/mrpupdate/' + productId,
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
