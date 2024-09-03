@extends('dashboardlayout')

@section('content')
<div class="container">
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;">
                <h3 class="text-center">Get All Orders</h3>
            </div>
        </div>
    </div>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                <th>Order Status</th>
                <th>Order Amount</th>
                <th>Customer Username</th>
                <th>User Delivery Address</th>
                {{-- <th>Vendor Name</th> --}}
                <th>Ordered Product Details</th>
                <th>deliveryType</th>
                <th>deliveryTime</th>
                <th>deliverySlot</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order['orderID'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($order['orderDate'])->format('d/m/y H:i') }}</td>
                    <td>{{ $order['orderStatus'] }}</td>
                    <td>{{ $order['orderAmount'] }}</td>
                    <td>{{ $order['customerUserName'] }}</td>
                    <td>{{ $order['userDeliveryAddress'] }}</td>
                    {{-- <td>{{ $order['vendorName'] }}</td> --}}
                    {{-- <td>{{ $order['vendorName'] }}</td> --}}

                    {{-- <td>
                        @if(!empty($order['vendorName']))
                            {{ $order['vendorName'] }}
                        @else
                            No data
                        @endif
                    </td> --}}
                    {{-- <td>
                        Product ID: {{ $order['orderedProductDetails']['productId'] }}<br>
                        Name: {{ $order['orderedProductDetails']['productName'] }}<br>
                        Price: {{ $order['orderedProductDetails']['productPrice'] }}<br>
                        Quantity: {{ $order['orderedProductDetails']['productQuantity'] }}
                    </td> --}}

                    <td>
                        @if(!empty($order['orderedProductDetails']))
                            @foreach($order['orderedProductDetails'] as $product)
                                @if(!empty($product['productId']) && !empty($product['productName']) && !empty($product['productPrice']) && !empty($product['productQuantity']))
                                    Product ID: {{ $product['productId'] }}<br>
                                    Name: {{ $product['productName'] }}<br>
                                    Price: {{ $product['productPrice'] }}<br>
                                    Quantity: {{ $product['productQuantity'] }}<br>
                                    vendorName: {{ $product['vendorName'] }}<br>
                                    vendorId: {{ $product['vendorId'] }}<br>
                                @else
                                    No product details available<br>
                                @endif
                            @endforeach
                        @else
                            No product details available
                        @endif
                    </td>
                    <td>{{ $order['deliveryType'] }}</td>
                    <td>{{ $order['deliveryTime'] }}</td>
                    <td>{{ $order['deliverySlot'] }}</td>
                    {{-- <td>
                     <a href="{{ url('/update-status') }}" class="btn btn-primary">Edit</a>
                    </td> --}}
                    <td>
                        <a href="{{ url('/updatestatus/' . $order['orderID']) }}" class="btn btn-primary">Update</a> <!-- Link to the updateproduct route with productId -->
                    </td>
                    {{-- <td>
                        <a href="{{ url('/update-status/' . $order['orderID']) }}" class="btn btn-primary">Edit</a> <!-- Link to the updateproduct route with productId -->
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $orders->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
    </div>
</div>
@endsection
