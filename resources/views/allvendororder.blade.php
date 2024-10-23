@extends('dashboardlayout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;">
                <h3 class="text-center">All Vendor Orders</h3>
            </div>
        </div>
<<<<<<< HEAD

=======
        <div>
            <form action="{{ route('allvendororder') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search By Vendor ID, Vendor Name" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <a href="{{ route('allvendororder') }}" class="btn btn-secondary">Reset</a>
            </form>
        </div>
>>>>>>> f963cae (first commit)
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Vendor Product Order ID</th>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Order Status</th>
                    <th>Product and Vendor Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($VendorOrder as $order)
                    <tr>
                        <td>{{ $order['vendorProductOrderId'] }}</td>
                        <td>{{ $order['orderID'] }}</td>
                        <td>{{ $order['date'] }}</td>
                        <td>{{ $order['orderStatus'] }}</td>
                        <td>
                            @if (!empty($order['productAndVendorDetail']))
                                @foreach ($order['productAndVendorDetail'] as $detail)
                                    <div>
                                        <strong>Product Name:</strong> {{ $detail['productName'] }}<br>
                                        <strong>Quantity:</strong> {{ $detail['quantity'] }}<br>
                                        <strong>Product ID:</strong> {{ $detail['productId'] }}<br>
                                        <strong>Product Price:</strong> {{ $detail['productPrice'] }}<br>
                                        <strong>Vendor Name:</strong> {{ $detail['vendorName'] }}<br>
                                        <strong>Vendor Mobile:</strong> {{ $detail['vendorMobile'] }}<br>
                                        <strong>Vendor ID:</strong> {{ $detail['vendorId'] }}<br>
                                        <hr>
                                    </div>
                                @endforeach
                            @else
                                Data are not available
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
