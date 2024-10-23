<<<<<<< HEAD
<!-- resources/views/updateOrder.blade.php -->

=======
>>>>>>> f963cae (first commit)
@extends('layout')

@section('content')
    <div class="container">
        <h2>Update Order</h2>

<<<<<<< HEAD
        <form method="POST" action="{{ route('orders.update') }}">
=======
        <form id="updateOrderForm">
>>>>>>> f963cae (first commit)
            @csrf <!-- CSRF protection for Laravel forms -->
            @method('PUT') <!-- Use PUT method for Laravel -->

            <!-- OrderId input -->
            <div class="form-group">
                <label for="OrderId">Order ID:</label>
<<<<<<< HEAD
                <input type="text" class="form-control" id="OrderId" name="OrderId" value="{{$Order['orderId']}}" required>
            </div>
            <div class="form-group">
                <label for="OrderId">Order ID:</label>
                <input type="text" class="form-control" id="Status" name="Status" value="{{$Order['status']}}" required>
            </div>

            <!-- Status input -->
            {{-- <div class="form-group">
                <label for="Status">Status:</label>
                <select class="form-control" id="Status" name="Status" required>
                    <option value="true" {{ $Order['status'] == 'true' ? 'selected' : '' }}>True</option>
                    <option value="false" {{ $Order['status'] == 'false' ? 'selected' : '' }}>False</option>
                </select>
            </div> --}}

            <button type="submit" class="btn btn-primary">Update Order Status</button>
        </form>
    </div>
=======
                <input type="text" class="form-control" id="OrderId" name="OrderId" value="{{ $Order['orderId'] }}" required>
            </div>

            <!-- Order Status input -->
            <div class="form-group">
                <label for="OrderId">Order Status:</label>
                <select class="form-control" id="Status" name="Status" required>
                    <option value="Ordered" {{ $Order['status'] == 'Ordered' ? 'selected' : '' }}>Ordered</option>
                    <option value="Shipped" {{ $Order['status'] == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="OutforDelivery" {{ $Order['status'] == 'OutforDelivery' ? 'selected' : '' }}>Out for Delivery</option>
                    <option value="Delivered" {{ $Order['status'] == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="Pending" {{ $Order['status'] == 'Pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Order Status</button>
        </form>

        <!-- Message placeholder for success/error -->
        <div id="message" class="mt-3"></div>
    </div>

    <!-- Add JQuery and AJAX script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#updateOrderForm').on('submit', function(e) {
            e.preventDefault();

            let formData = {
                _token: '{{ csrf_token() }}',
                OrderId: $('#OrderId').val(),
                Status: $('#Status').val(),
            };

            $.ajax({
                url: '{{ route('orders.update') }}', // The Laravel route for the update
                type: 'PUT', // HTTP method
                data: formData,
                success: function(response) {
                    $('#message').html('<div class="alert alert-success">Order status updated successfully.</div>');
                    setTimeout(() => {
                        window.location.href = '/getallorder'; // Redirect to order list after success
                    }, 2000); // Delay for 2 seconds
                },
                error: function(xhr) {
                    $('#message').html('<div class="alert alert-danger">Failed to update order status.</div>');
                }
            });
        });
    </script>
>>>>>>> f963cae (first commit)
@endsection
