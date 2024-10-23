
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
       
<<<<<<< HEAD
=======
       
>>>>>>> f963cae (first commit)
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
<<<<<<< HEAD
                  @foreach ($products as $product)
                      <tr>
                          <td>{{ $product['prodectTitle'] }}</td>
                          <td>
                              <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" />
                          </td>
=======
                  @foreach ($productapproval as $product)
                      <tr>
                          <td>{{ $product['prodectTitle'] }}</td>
                            <td>
                            @php
                                $images = [
                                    $product['prodectImage'], 
                                    $product['prodectImage1'], 
                                    $product['prodectImage2'], 
                                    $product['prodectImage3'], 
                                    $product['prodectImage4'], 
                                    $product['prodectImage5'], 
                                    $product['prodectImage6'], 
                                    $product['prodectImage7']
                                ];
                                // Filter out empty images
                                $validImages = array_filter($images);
                                // Generate a unique ID for the carousel
                                $carouselId = 'carousel_' . $product['productId']; // Assuming each product has a unique 'id'
                            @endphp
                        
                            @if(count($validImages) > 0) <!-- Check if there are valid images -->
                                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                                    <div id="{{ $carouselId }}" class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            @foreach ($validImages as $index => $image)
                                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                                    <div class="d-flex justify-content-center" style="height: 80px; width:100%">
                                                        <img class="d-block" src="{{ $image }}" alt="Slide {{ $index + 1 }}" 
                                                             height="80" width="80" style="object-fit: cover; width: 80px; height: 80px;">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a class="carousel-control-prev" href="#{{ $carouselId }}" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon custom-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#{{ $carouselId }}" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon custom-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </td>
>>>>>>> f963cae (first commit)
                          <td>{{ $product['productPrice'] }}</td>
                          <td>{{ $product['productMRPPrice'] }}</td>
                          <td>{{ $product['productSKU'] }}</td>
                          <td>{{ $product['vendorName'] }}</td>
                          <td>{{ $product['vendorEmailPlusMobileNo'] }}</td>
<<<<<<< HEAD
                          <td>
                              <a href="{{ route('product.approve', $product['productId']) }}" class="btn btn-primary">Approve</a>
                          </td>
                          <td>
                              <a href="{{ route('product.cancelapprove', $product['productId']) }}" class="btn btn-danger">Cancel</a>
                          </td>
=======
                          <!--<td>-->
                          <!--    <a href="{{ route('product.approve', $product['productId']) }}" class="btn btn-primary">Approve</a>-->
                          <!--</td>-->
                          <!--<td>-->
                          <!--    <a href="{{ route('product.cancelapprove', $product['productId']) }}" class="btn btn-danger">Cancel</a>-->
                          <!--</td>-->
                          <td>
    <button class="btn btn-primary approve-btn" data-id="{{ $product['productId'] }}">Approve</button>
</td>
<td>
    <button class="btn btn-danger cancel-btn" data-id="{{ $product['productId'] }}">Cancel</button>
</td>
>>>>>>> f963cae (first commit)
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @endif
<<<<<<< HEAD
=======
    
      @if($productapproval)
    <div class="d-flex justify-content-center">
        {{ $productapproval->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
    </div>
     @endif
>>>>>>> f963cae (first commit)
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
<script>
    $(document).ready(function() {
        // Handle product approval
        $('.approve-btn').on('click', function() {
            var productId = $(this).data('id');
            var button = $(this); // Save reference to the button

            $.ajax({
                url: "{{ route('product.approve', '') }}/" + productId, // Send request to approve route
                method: 'GET',
                success: function(response) {
                    alert('Product approved successfully');
                    button.closest('tr').remove(); // Remove the row from the table
                },
                error: function(xhr) {
                    alert('Error approving product. Please try again.');
                }
            });
        });

        // Handle cancel approval
        $('.cancel-btn').on('click', function() {
            var productId = $(this).data('id');
            var button = $(this); // Save reference to the button

            $.ajax({
                url: "{{ route('product.cancelapprove', '') }}/" + productId, // Send request to cancel route
                method: 'GET',
                success: function(response) {
                    alert('Product approval canceled successfully');
                    button.closest('tr').remove(); // Remove the row from the table
                },
                error: function(xhr) {
                    alert('Error canceling approval. Please try again.');
                }
            });
        });
    });
</script>

<style>
    /* Style for the previous button */
.carousel-control-prev-icon {
    background-color: rgba(0, 123, 255, 0.5); /* Example: Blue background */
    border-radius: 50%; /* Make it circular */
}

/* Style for the next button */
.carousel-control-next-icon {
    background-color: rgba(255, 0, 123, 0.5); /* Example: Pink background */
  
}

/* Optional: Adjust icon size */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 50px; /* Increase width */
    height: 50px; /* Increase height */
}

/* Optional: Add hover effect */
.carousel-control-prev-icon:hover,
.carousel-control-next-icon:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Darken on hover */
}
</style>

@endsection
