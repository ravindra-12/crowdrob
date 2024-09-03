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
    <h3 class="text-center my-4">Update Coupon</h3>
    <form action="{{ route('update.coupon', ['id' => $coupondata['couponCode']]) }}" method="POST" class="border p-5 shadow-sm bg-body-tertiary rounded" >
        @csrf
        @method('PUT')
       
                <input type="hidden" id="isActive" name="couponCode" class="form-control" value="{{$coupondata['couponCode']}}">
                
        <!-- Text input for Category Name -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="couponName" name="couponName" class="form-control" value="{{$coupondata['couponName']}}">
                <label class="form-label" for="couponName">couponName</label>
            </div>
        </div>

        

        <!-- Text input for Category Link -->
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="couponValue" name="couponValue" class="form-control" value="{{$coupondata['couponValue']}}">
                <label class="form-label" for="couponValue">couponValue</label>
            </div>
        </div>
        <div class="mb-4">
            <div class="form-outline">
                <input type="date" id="couponExpiry" name="couponExpiry" class="form-control" 
                       value="{{ isset($coupondata['couponExpiry']) ? \Carbon\Carbon::parse($coupondata['couponExpiry'])->format('Y-m-d') : '' }}">
                <label class="form-label" for="couponExpiry">Coupon Expiry Date</label>
            </div>
        </div>
        
        
        <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="couponCondition" name="couponCondition" class="form-control" value="{{$coupondata['couponCondition']}}">
                <label class="form-label" for="couponExpiry">couponCondition</label>
            </div>
        </div>

        {{-- <div class="mb-4">
            <div class="form-outline">
                <input type="text" id="isActive" name="isActive" class="form-control" value="{{$coupondata['isActive'] ? "Active" : "Deactive"}}">
                <label class="form-label" for="couponExpiry">isActive</label>
            </div>
        </div> --}}

        <div class="mb-3">
            <label for="isActive" class="form-label">isActive</label>
            <select class="form-select" id="isActive" name="isActive" required>
                <option value="{{$coupondata['isActive'] ? 1 : 0}}">
                    {{$coupondata['isActive'] ? "Active" : "Deactive"}}
                </option>
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Update Coupon</button>
    </form>
</div>
@endsection
</body>
</html>
