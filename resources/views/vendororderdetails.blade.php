<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crowdrob</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')
    @section('content')
    <section class="container">
        <div class="text-center">
            <h3>Vendor Order details </h3>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Total Orders</th>
                    <th scope="col">Completed Orders</th>
                    <th scope="col">Pending Orders</th>
                    <th scope="col">Processing Orders</th>
                    <th scope="col">Cancelled Orders</th>
                    <th scope="col">Refunded Orders</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $Order['totalOrders'] }}</td>
                    <td>{{ $Order['totalCompletedOrders'] }}</td>
                    <td>{{ $Order['totalPendingOrders'] }}</td>
                    <td>{{ $Order['totalProcessingOrders'] }}</td>
                    <td>{{ $Order['totalCancelledOrders'] }}</td>
                    <td>{{ $Order['totalRefendedOrders'] }}</td>
                </tr>
            </tbody>
        </table>
    </section>
    @endsection
</body>
</html>
