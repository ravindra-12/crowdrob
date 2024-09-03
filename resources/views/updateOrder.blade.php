<!-- resources/views/updateOrder.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h2>Update Order</h2>

        <form method="POST" action="{{ route('orders.update') }}">
            @csrf <!-- CSRF protection for Laravel forms -->
            @method('PUT') <!-- Use PUT method for Laravel -->

            <!-- OrderId input -->
            <div class="form-group">
                <label for="OrderId">Order ID:</label>
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
@endsection
