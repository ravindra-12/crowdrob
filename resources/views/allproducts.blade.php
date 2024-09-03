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
          {{-- <div>
            <form action="{{ route('allproduct') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Products By Product Name" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <a href="{{ route('allproduct') }}" class="btn btn-secondary">Reset</a>
            </form>
          </div> --}}

          <div>
            <form action="{{ route('allproduct') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Products By Product Name" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <a href="{{ route('allproduct') }}" class="btn btn-secondary mt-2">Reset</a>
            </form>
        </div>
       
        <table class="table table-responsive">
            <thead>
                <tr>

                    <th>prodectImage</th>
                    <th>prodectTitle</th>
                    {{-- <th>ShortDescription</th> --}}
                    <th>productPrice</th>
                    <th>productInStock</th>
                    {{-- <th>Created Date</th> --}}
                    <th>productMRPPrice</th>
                      <th>vendorName</th>
                      <th>Email & MobileNo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" />
                        </td>

                        {{-- <td> <img src="{{data:image/png;base64, $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" /></td> --}}
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
                         <td>{{ $product['vendorName'] }}</td>
                         <td>{{ $product['vendorEmailPlusMobileNo'] }}</td>
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
