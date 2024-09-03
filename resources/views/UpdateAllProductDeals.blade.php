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
    <div class="container ">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center"> Update All ProductDeals</h3> </div>
          </div>
          </div>
        {{--  --}}
        <div>
            <form action="{{ route('UpdateAllProductDeals') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Store" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <a href="{{ route('UpdateAllProductDeals') }}" class="btn btn-secondary">Reset</a>
            </form>
          </div>
       
        {{--  --}}
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>prodectTitle</th>
                    <th>prodectImage</th>
                    <th>isTopDeal</th>
                    <th>istopTrending</th>
                    <th>isTopFeatured</th>
                    <th>isTopRated</th>
                    <th>isTopSelling</th>
                    <th>isTopDeal_Home</th>
                    <th>istopTrending_Home</th>
                    <th>isTopFeatured_Home</th>
                    <th>isTopRated_Home</th>
                    <th>isFestiveOffer_Home</th>
                    <th>isDiscountOffer_Home</th>
              
                   <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <p class="card-text"> {{ $product['prodectTitle'] }}</p>
                        </td>
                        
                        <td> 
                           <img src="{{ $product['prodectImage'] }}" class="img-fluid" height="80px" width="120px" />
                        </td>
                        <td>
                            <h5 class="card-title">{{ $product['isTopDeal'] ? 'Yes' : 'No'  }}</h5>
                        </td>
                       <td>
                            <p class="card-text"> {{ $product['istopTrending'] ? 'Yes' : "No" }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['isTopFeatured'] ? 'Yes' : 'No' }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['isTopRated'] ? 'Yes' : 'No' }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['isTopSelling'] ? 'Yes' : 'No' }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['isTopDeal_Home'] ? 'yes' : 'No' }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['istopTrending_Home'] ? 'yes' : 'No' }}</p>
                        </td>
                        {{-- <td>
                            <p class="card-text"> {{ $product['isTopSelling'] ? 'yes' : 'No'  }}</p>
                        </td> --}}
                        <td>
                            <p class="card-text"> {{ $product['isTopFeatured_Home'] ? 'Yes' : 'No' }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['isTopRated_Home'] ? 'Yes' : 'No' }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['isFestiveOffer_Home'] ? 'Yes' : " No" }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $product['isDiscountOffer_Home'] ? 'Yes' : 'No'}}</p>
                        </td>
                       
                       
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        <td>
                            <a href="{{ url('/UpdateAllProductDeals/' . $product['productId']) }}" class="btn btn-primary">Update</a> <!-- Link to the updateproduct route with productId -->
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
