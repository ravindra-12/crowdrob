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
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  Update Price</h3> </div>
          </div>
          </div>
        {{--  --}}
         
       
        {{--  --}}
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>prodectImage</th>
                    <th>prodectTitle</th>
                    {{-- <th>ShortDescription</th> --}}
                    <th>productPrice</th>
                    <th>productInStock</th>
                    <th>selling price</th>
                    {{-- <th>Created Date</th> --}}
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
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
                            <h5 class="card-title">{{ $product['prodectTitle'] }}</h5>
                        </td>
                        {{-- <td>
                            <p class="card-text">{!! $product['productShortDescription'] !!}</p>
                        </td> --}}
                        <td>
                            <p class="card-text"><strong>Price:</strong> {{ $product['productPrice'] }}</p>
                        </td>
                        <td>{{ $product['productInStock'] ? 'Yes' : 'No' }}</td>
                        <td>
                            <p class="card-text"><strong> Price:</strong> {{ $product['productMRPPrice'] }}</p>
                        </td>
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        <td>
                            <a href="{{ url('/mrpdetails/' . $product['productId']) }}" class="btn btn-primary">Update MRP in %</a> <!-- Link to the updateproduct route with productId -->
                        </td>
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
