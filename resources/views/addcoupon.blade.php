<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')
    @section('content')
    <div class="container">
    <h3 class="text-center my-4">Add Coupon</h3>
    <form action="{{ route('add.coupon') }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" >
        @csrf


        <!-- Text input for Category Name -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="couponName" name="couponName" class="form-control" placeholder="couponName">
                <label class="form-label" for="couponName">couponName</label>
            </div>
        </div>

        

        <!-- Text input for Category Link -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="couponValue" name="couponValue" class="form-control" placeholder="couponValue">
                <label class="form-label" for="couponValue">couponValue</label>
            </div>
        </div>
        <div class="mb-4">
    <div class="form-outline">
        <input type="date" id="couponExpiry" name="couponExpiry" class="form-control" placeholder="couponExpiry">
        <label class="form-label" for="couponExpiry">Coupon Expiry Date</label>
    </div>
</div>
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="couponCondition" name="couponCondition" class="form-control" placeholder="couponCondition">
                <label class="form-label" for="couponExpiry">couponCondition</label>
            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Add Coupon</button>
    </form>
</div>
@endsection
</body>
</html>
