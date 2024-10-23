@extends('dashboardlayout')

<!-- Main content -->
@section('content')
@if (session('toast_success'))
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
        <strong class="mr-auto">Success</strong>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{ session('toast_success') }}
    </div>
</div>
@endif
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  Update Discount Price</h3> </div>
          </div>
          <div>
            <form action="{{ route('updateproductdiscount') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search By Vendor Name" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <a href="{{ route('updateproductdiscount') }}" class="btn btn-secondary">Reset</a>
            </form>
        </div>
          </div>
        {{--  --}}
        <div class="container">
            <form action="{{ route('updateproductdiscount') }}" method="GET" class="mb-4" id="filterForm">
                <select name="category" id="category" class="form-control mb-2">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category['categoryId'] }}" {{ request('category') == $category['categoryId'] ? 'selected' : '' }}>
                            {{ $category['categoryName'] }}
                        </option>
                    @endforeach
                </select>
    
               
    
                <button type="submit" class="btn btn-primary mt-2">Filter</button>
                <a href="{{ route('updateproductdiscount') }}" class="btn btn-secondary mt-2">Reset</a>
            </form>
        </div>
       
        {{--  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>prodectTitle</th>
                    <th>vendorName</th>
                    <th>prodectImage</th>
                    <th>productPrice</th>
                    <th>productMRPPrice</th>
                    <th>productDiscountPrice</th>
                  
                    {{-- <th>Created Date</th> --}}
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productsdiscount as $product)
                    <tr>
                        <td>
                            <p class="card-text"> {{ $product['prodectTitle'] }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['vendorName'] }}</p>
                        </td>
                        
                        <td> 
                           <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="60px" width="100px" />
                        </td>
                        <td>
                            <h5 class="card-title">{{ $product['productPrice'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $product['productMRPPrice'] }}</h5>
                        </td>
                       <td>
                            <p class="card-text"> {{ $product['productDiscountPrice'] }}</p>
                        </td>
                       
                       
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        <td>
                            <a href="{{ url('/discountprice/' . $product['productId']) }}" class="btn btn-primary">Update Discount Price</a> <!-- Link to the updateproduct route with productId -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         <div class="d-flex justify-content-center">
            {{-- {{ $productsdiscount->links('pagination::bootstrap-5') }}  --}}
            {{ $productsdiscount->appends(request()->query())->links('pagination::bootstrap-4') }}
            <!-- Display pagination links -->
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
