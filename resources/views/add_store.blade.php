<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @extends('layout')

    @section('content')
    
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Add New Store</div>

                    <div class="card-body">
                        <form action="{{ route('add.store') }}" method="POST">
                            @csrf
                            {{-- <div class="mb-3">
                                <label for="storeId" class="form-label">Store ID</label>
                                <input type="text" class="form-control" id="storeId" name="storeId" >
                            </div> --}}
                            <div class="mb-3">
                                <label for="registerVendorUserId" class="form-label">Register Vendor User ID</label>
                                <input type="text" class="form-control" id="registerVendorUserId" name="registerVendorUserId" required>
                            </div>
                            <div class="mb-3">
                                <label for="storeName" class="form-label">Store Name</label>
                                <input type="text" class="form-control" id="storeName" name="storeName" required>
                            </div>
                            <div class="mb-3">
                                <label for="street" class="form-label">Street</label>
                                <input type="text" class="form-control" id="street" name="street" required>
                            </div>
                            <div class="mb-3">
                                <label for="street2" class="form-label">Street 2</label>
                                <input type="text" class="form-control" id="street2" name="street2">
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                            <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <div class="mb-3">
                                <label for="postalCode" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postalCode" name="postalCode" required>
                            </div>
                            <div class="mb-3">
                                <label for="storeEmailAddress" class="form-label">Store Email Address</label>
                                <input type="email" class="form-control" id="storeEmailAddress" name="storeEmailAddress" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
