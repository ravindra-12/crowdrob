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
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  Product Aporove </h3> </div>
          </div>
          </div>
       
          @if(isset($message))
          <div class="mx-2 alert alert-info alert-dismissible fade show shadow-sm p-4 rounded mb-4 text-center" role="alert">
            <h4 class="alert-heading">Notice</h4>
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @else
          <table class="table">
              <thead>
                  <tr>
                      <th>Product Title</th>
                      <th>Product Image</th>
                      <th>Product Price</th>
                      <th>Product MRP Price</th>
                      <th>Product SKU</th>
                      <th>Vendor Name</th>
                      <th>Vendor Email & Mobile No</th>
                      <th>Approve</th>
                      <th>Cancel</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($products as $product)
                      <tr>
                          <td>{{ $product['prodectTitle'] }}</td>
                          <td>
                              <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" />
                          </td>
                          <td>{{ $product['productPrice'] }}</td>
                          <td>{{ $product['productMRPPrice'] }}</td>
                          <td>{{ $product['productSKU'] }}</td>
                          <td>{{ $product['vendorName'] }}</td>
                          <td>{{ $product['vendorEmailPlusMobileNo'] }}</td>
                          <td>
                              <a href="{{ route('product.approve', $product['productId']) }}" class="btn btn-primary">Approve</a>
                          </td>
                          <td>
                              <a href="{{ route('product.cancelapprove', $product['productId']) }}" class="btn btn-danger">Cancel</a>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @endif
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
