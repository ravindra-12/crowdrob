@extends('dashboardlayout')

<!-- Main content -->
@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  All Products</h3> </div>
          </div>

          <div class="m-3">
            <a href="{{ url('/add_Product') }}" class="btn btn-primary">Add Product</a>
           
         </div>
    
          </div>
        {{--  --}}
         
        {{-- <div class="container">
      
            <div class="row m-3">
                <div class="col-md-4">
                    <!-- Your dropdown goes here -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Product By Category
                        </button>
                        <div class="dropdown-menu"  aria-labelledby="dropdownMenuButton">
                            @foreach($categories as $category)
                            <a class="dropdown-item" href="/allproducts/catid={{ $category['categoryId'] }}">
                                {{ $category['categoryName'] }}
                            </a>
                        @endforeach
                           
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Product By Brand
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach($brands as $brands)
                            <a class="dropdown-item" href="/allproducts/brandid={{ $brands['productBrandsId'] }}">
                                {{ $brands['productBrandsName'] }}
                            </a>
                        @endforeach
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Product By SubCategory
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach($subcategories as $subcategories)
                            <a class="dropdown-item" href="/allproducts/subcatid={{ $subcategories['subCategoryId'] }}">
                                {{ $subcategories['subCategoryName'] }}
                            </a>
                        @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
    
        </div> --}}

        {{-- <form method="GET" action="{{ route('allproducts') }}">
            <div class="form-group">
                <label for="catid">Filter by Category:</label>
                <select class="form-control" id="catid" name="catid">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category['categoryId'] }}">{{ $category['categoryName'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brandid">Filter by Brand:</label>
                <select class="form-control" id="brandid" name="brandid">
                    <option value="">Select Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand['productBrandsId'] }}">{{ $brand['productBrandsName'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subcatid">Filter by Subcategory:</label>
                <select class="form-control" id="subcatid" name="subcatid">
                    <option value="">Select Subcategory</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory['subCategoryId'] }}">{{ $subcategory['subCategoryName'] }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Apply Filters</button>
        </form> --}}




        {{--  --}}
        <table class="table">
            <thead>
                <tr>

                    <th>prodectImage</th>
                    <th>prodectTitle</th>
                    {{-- <th>ShortDescription</th> --}}
                    <th>productPrice</th>
                    <th>productInStock</th>
                    {{-- <th>Created Date</th> --}}
                    <th>productMRPPrice</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>

                        <td> <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" /></td>
                        <td>
                            <h5 class="card-title">{{ $product['prodectTitle'] }}</h5>
                        </td>
                        {{-- <td>
                            <p class="card-text">{!! $product['productShortDescription'] !!}</p>
                        </td> --}}
                        <td>
                            <p class="card-text"><strong>Price:</strong> {{ $product['productPrice'] }}</p>
                        </td>
                        <td>{{ $product['productInStock'] ? 'Yes' : 'No' }}</td>
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        <td>{{ $product['productMRPPrice'] }}</td>
                        <td>
                            <a href="{{ url('/updateproduct/' . $product['productId']) }}" class="btn btn-primary">Edit</a> <!-- Link to the updateproduct route with productId -->
                        </td>
                        <td>
                            <form action="{{ route('products.delete', ['id' => $product['productId']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                        <td> <!-- Add this column for the "View Details" button -->
                            <a href="{{ url('/productdetails/' . $product['productId']) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown-menu a").click(function(){
        $("#dropdownMenuButton").text($(this).text());
        // e.preventDefault();
    });
   
});

</script>
@endsection
