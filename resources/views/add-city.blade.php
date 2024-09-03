<!DOCTYPE html>
<html>
<head>
    <title>Add Delivery City</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h2>Add Delivery City</h2>
    <form action="{{ route('cities.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="cityName">City Name:</label>
            <input type="text" class="form-control" id="cityName" name="cityName" required>
        </div>
        <div class="form-group">
            <label for="stateName">State Name:</label>
            <input type="text" class="form-control" id="stateName" name="stateName" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
