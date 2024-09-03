<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Subcategory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    @extends('layout')

    @section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="card">
                    <div class="card-header text-center">Add Subcategory</div>
                    <div class="card-body">
                        <form action="{{ route('subcategory.store') }}" method="POST"> <!-- Corrected method to POST -->
                            @csrf
                            {{-- <div class="mb-3">
                                <label for="subCategoryId" class="form-label">Subcategory ID</label>
                                <input type="number" class="form-control" id="subCategoryId" name="subCategoryId">
                            </div> --}}
                            <div class="mb-3">
                                <label for="subCategoryName" class="form-label">Subcategory Name</label>
                                <input type="text" class="form-control" id="subCategoryName" name="subCategoryName" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="categoryId" class="form-label">Category ID</label>
                                <input type="number" class="form-control" id="categoryId" name="categoryId" required>
                            </div> --}}

                            <div class="mb-3">
                                <label for="categoryId" class="form-label">Category</label>
                                <select class="form-select" id="categoryId" name="categoryId" required>
                                    <option value="">Select Category</option> <!-- Default option -->
                                    @foreach($products as $products)
                                        <option value="{{ $products['categoryId'] }}">{{ $products['categoryName'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Subcategory</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>
