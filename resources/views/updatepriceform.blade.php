<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Price Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layout')

    @section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Price</div>
                    <div class="card-body">
                        <form action="{{ route('updatePrice', ['categoryId' => $categoryId]) }}" method="POST">
                            @csrf
                        
                            <div class="mb-3">
                                <label for="price" class="form-label">New Price</label>
                                <input type="number" id="price" name="price" class="form-control" placeholder="Enter new price" required>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Update Price</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
