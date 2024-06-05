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
       
        <table class="table">
            <thead>
                <tr>
                    <th>Prodect Title</th>
                    <th>Prodect Image</th>
                    <th>productPrice</th>
                    <th>productMRPPrice</th>
                    <th>productInStock</th>
                  
                    {{-- <th>Created Date</th> --}}
                    <th>Action</th>
                    {{-- <th>Delete</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <p class="card-text"> {{ $product['prodectTitle'] }}</p>
                        </td>
                        <td>
                            @if(is_array($product['prodectImage']) && count($product['prodectImage']) > 0)
                                @if($product['prodectImage'][0]) <!-- Ensure the first image is not null -->
                                    <img src="{{ $product['prodectImage'][0] }}" class="img-fluid" height="80px" width="80px" />
                                @endif
                            @else
                                <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="80px" />
                            @endif
                        </td>
                        <td>
                            <h5 class="card-title">{{ $product['productPrice'] }}</h5>
                        </td>
                       <td>
                            <p class="card-text"> {{ $product['productMRPPrice'] }}</p>
                        </td>
                        
                        <td>
                            <p class="card-text">{{ $product['productInStock'] ? 'Yes' : 'No' }}</p>
                        </td>
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        <td>
                            <a href="{{ route('product.approve', $product['productId']) }}" class="btn btn-primary">Approve</a> <!-- Link to the updateproduct route with productId -->
                        </td>
                        {{-- <td>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
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
