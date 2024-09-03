<!DOCTYPE html>
<html>
<head>
    <title>Active Delivery Cities</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Active Delivery Cities</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>City Name</th>
                <th>State Name</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($deliveryCities as $city)
                <tr>
                    <td>{{ $city['cityName'] }}</td>
                    <td>{{ $city['stateName'] }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="2">No cities available</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
