<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crowdrob</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  @extends('layout')

  @section('content')
    <section style="background-color: #eee;" class="mb-5">
        <div class="container py-5">
            {{-- <h2 class="text-center mb-5">Vendor Details</h2> --}}
          
            <div class="card my-3">
                <div class="card-body bg-warning"> <h3 class="text-center"> Vendors Details</h3> </div>
            </div>
            @if(!empty($vendor)) 
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center py-5">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{$vendor["username"]}}</h5>
                            <p class="text-muted mb-1">{{$vendor["firstName"]}} {{$vendor["lastName"]}}</p>
                            <p class="text-muted mb-4">{{$vendor["shopName"]}}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button>
                                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">First Name:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$vendor["firstName"]}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Last Name:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$vendor["lastName"]}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$vendor["email"]}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$vendor["phoneNumber"]}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Shop Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{$vendor["shopName"]}}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Created Date</p>
                                </div>
                                {{-- <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($vendor["createdDate"])->format('d/m/y H:i') }}</p>
                                </div> --}}
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Modify Date</p>
                                </div>
                                {{-- <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ \Carbon\Carbon::parse($vendor["modifiedDate"])->format('d/m/y H:i') }}</p>
                                </div> --}}
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="text-center">
                <p>No vendor data available. Please create a vendor profile.</p>
                <!-- Display a button to create a vendor profile -->
                <!-- Example: <a href="{{ route('create.vendor') }}" class="btn btn-primary">Create Vendor Profile</a> -->
            </div>
            @endif
        </div>
    </section>
   
    <!-- Store Details -->
       
    <section class="container">
      <div class="text-center">
        <h3>Store Details</h3>
      </div>
    @if(!empty($store))
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Store ID</th>
                <th scope="col">Store Name</th>
                <th scope="col">Street</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
                <th scope="col">Country</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Email Address</th>
                <!-- Add more headers as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($store as $storeItem)
            <tr>
                <td>{{$storeItem['storeId']}}</td>
                <td>{{$storeItem['storeName']}}</td>
                <td>{{$storeItem['street']}}</td>
                <td>{{$storeItem['city']}}</td>
                <td>{{$storeItem['state']}}</td>
                <td>{{$storeItem['country']}}</td>
                <td>{{$storeItem['postalCode']}}</td>
                <td>{{$storeItem['storeEmailAddress']}}</td>
                <!-- Populate other store details -->
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <!-- Display a message if no store data is available -->
    <div class="container bg-primary mb-3 p-lg-5">
        <div class="mb-4 float-end">
            <a href="/addstore" class="btn btn-success btn-md">Create Store</a> 
        </div>
        <div>
            <p class="text-center">No store data available. Please create a store.</p>
            <!-- Display a button to create a store -->
            <!-- Example: 
                {{-- <a href="{{ route('create.store') }}" class="btn btn-primary">Create Store</a> --}}
            -->
        </div>
    </div>
    @endif
{{-- </section> --}}

@if (!isset($product['title']))
<!-- Product Details -->
<div class="text-center my-3">
  <h3>Products Details</h3>
</div>
<table class="table">
    <thead>
        <tr>
            <th scope="col">Product ID</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Price</th>
            <th scope="col">Short Description</th>
            <th scope="col">In Stock</th>
            <th scope="col">SKU</th>
            {{-- <th scope="col">Created Date</th> --}}
            {{-- <th scope="col">Modified Date</th> --}}
            <th scope="col">Category ID</th>
            <th scope="col">Subcategory</th>
            <th scope="col">Product Brands</th>
            <!-- Add more headers as needed -->
        </tr>
    </thead>
    <tbody>
        @foreach ($product as $product)
        <tr>
            <td>{{ $product['productId'] }}</td>
            <td>{{ $product['prodectTitle'] }}</td>
            <td>
                @if(is_array($product['prodectImage']) && count($product['prodectImage']) > 0)
                    @if($product['prodectImage'][0]) <!-- Ensure the first image is not null -->
                        <img src="{{ $product['prodectImage'][0] }}" class="img-fluid" height="80px" width="80px" />
                    @endif
                @else
                    <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" />
                @endif
            </td>
            <td>{{ $product['productPrice'] }}</td>
            <td>{!! $product['productShortDescription'] !!}</td>
            <td>{{ $product['productInStock'] ? 'Yes' : 'No' }}</td>
            <td>{{ $product['productSKU'] }}</td>
            {{-- <td>{{ \Carbon\Carbon::parse($product['createdDate'])->format('d/m/y H:i') }}</td> --}}
            {{-- <td>{{ \Carbon\Carbon::parse($product['modifiedDate'])->format('d/m/y H:i') }}</td> --}}
            <td>{{ $product['categoryId'] }}</td>
            <td>{{ $product['subCategory'] }}</td>
            <td>{{ $product['productBrands'] }}</td>
            <!-- Populate other product details -->
        </tr>
        @endforeach
    </tbody>
</table>
@else
<!-- Display a message if no product data is available -->
<div class="container bg-primary mb-3 p-lg-5" >
    <div class="mb-4 float-end">
        <a href="/add_Product" class="btn btn-success btn-md">Add Product</a> 
    </div>
    <div>
        <p class="text-center">No Product data available. Please add Product.</p>
        <!-- Display a button to create a store -->
        <!-- Example: 
            {{-- <a href="{{ route('create.store') }}" class="btn btn-primary">Create Store</a> --}}
        -->
    </div>
</div>
@endif
</section>
   <!-- Vendor Cancel Details -->

<section class="container">
    <div class="text-center">
        <h3>Cancel Product</h3>
    </div>

   @if (!isset($cancelapproval['title']))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Price</th>
                    <!-- Add more headers as needed -->
                </tr>
            </thead>
            <tbody>
                @foreach($cancelapproval as $item)
                <tr>
                    <td>{{ $item['productId'] }}</td>
                    <td>{{ $item['prodectTitle'] }}</td>
                    <td>
                        @if(is_array($item['prodectImage']) && count($item['prodectImage']) > 0)
                            @if($item['prodectImage'][0]) <!-- Ensure the first image is not null -->
                                <img src="{{ $item['prodectImage'][0] }}" alt="Product Image" height="80px" width="80px">
                            @endif
                        @else
                            <img src="{{ $item['prodectImage'] }}" alt="Product Image" height="80px" width="80px">
                        @endif
                    </td>
                    <td>{{ $item['productPrice'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <!-- Display a message if no product data is available -->
        <div class="container bg-primary mb-3 p-lg-5" >
            <div class="mb-4 float-end">
                <a href="/add_Product" class="btn btn-success btn-md">Add Product</a> 
            </div>
            <div>
                <p class="text-center">No Product data available. Please add Product.</p>
                <!-- Display a button to create a store -->
                <!-- Example: 
                    {{-- <a href="{{ route('create.store') }}" class="btn btn-primary">Create Store</a> --}}
                -->
            </div>
        </div>
        @endif
</section>

    
    
    </div>

    @endsection
</body>
</html>
