<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags and Bootstrap CSS -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS for additional styling -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .orders-table th, .orders-table td {
            vertical-align: middle;
        }
        .assign-section {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .assign-btn {
            width: 100%;
        }
    </style>
</head>
<body>

@extends('dashboardlayout')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4 text-center">Assign Orders to Delivery Agents</h2>

    <div class="row gy-4">
        <!-- Orders List -->
        <div class="col-md-7">
            <div class="assign-section">
                <h4 class="mb-3">Select Orders</h4>
                <table class="table table-striped table-hover table-bordered orders-table">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 50px;">Select</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="orderId" 
                                        value="{{ $order['orderDataInfo']['orderId'] }}" 
                                        data-order-id="{{ $order['orderDataInfo']['orderId'] }}" 
                                        data-user-id="{{ $order['userId'] }}" 
                                        data-address-id="{{ $order['deliveryAddressInfo']['addressId'] }}">
                                </td>
                                <td>{{ $order['orderDataInfo']['orderId'] }}</td>
                                <td>{{ $order['customerName'] }}</td>
                                <td>{{ $order['orderedProductInfo']['productName'] }}</td>
                                <td>Rs.{{ number_format($order['orderDataInfo']['orderAmount'], 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Agents List and Assign Button -->
        <div class="col-md-5">
            <div class="assign-section">
                <h4 class="mb-3">Select Delivery Agent</h4>
                <select id="agentSelect" class="form-select mb-4">
                    <option value="">Select an Agent</option>
                    @foreach($agents as $agent)
                        <option value="{{ $agent['deliveryAgentId'] }}" 
                                data-name="{{ $agent['deliveryAgentname'] }}" 
                                data-phone="{{ $agent['deliveryAgentMobileNo'] }}">
                            {{ $agent['deliveryAgentname'] }} ({{ $agent['deliveryAgentMobileNo'] }})
                        </option>
                    @endforeach
                </select>
                <button type="button" id="assignBtn" class="btn btn-primary btn-lg assign-btn">Assign Selected Orders</button>
            </div>
        </div>
    </div>
</div>

@endsection

<!-- JavaScript and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        // Assign Button Click
        $('#assignBtn').on('click', function (e) {
            e.preventDefault();
            
            let selectedAgent = $('#agentSelect').find(':selected');
            if (!selectedAgent.val()) {
                alert('Please select a delivery agent.');
                return;
            }

            let agentData = {
                id: selectedAgent.val(),
                name: selectedAgent.data('name'),
                phone: selectedAgent.data('phone')
            };

            let selectedOrders = [];
            $('input[name="orderId"]:checked').each(function () {
                let orderId = $(this).data('order-id');
                let userId = $(this).data('user-id');
                let addressId = $(this).data('address-id');
                
                let data = {
                    deliveryOrderID: orderId,
                    customerID: userId,
                    dilveryStatus: 'assigned',
                    addressId: addressId,
                    dilveryDate: new Date().toISOString(),
                    assignmentDate: new Date().toISOString(),
                    tblOrderID: orderId
                };

                selectedOrders.push(data);
            });

            if (selectedOrders.length === 0) {
                alert('Please select at least one order.');
                return;
            }

            selectedOrders = selectedOrders.map(order => {
                return {
                    ...order,
                    deliveryAgentId: agentData.id,
                    deliveryAgentName: agentData.name,
                    agentMobileNo: agentData.phone,
                    orderStaus: 'assigned'
                };
            });

            $.ajax({
                url: "{{ route('delivery.assign') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    orders: selectedOrders
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.success);
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        }
                    } else {
                        alert('Unexpected response format.');
                    }
                },
                error: function (xhr) {
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        alert(xhr.responseJSON.error);
                    } else {
                        alert('An unexpected error occurred.');
                    }
                }
            });
        });
    });
</script>

</body>
</html>
