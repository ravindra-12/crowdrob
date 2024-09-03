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
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  Order status </h3> </div>
          </div>
          </div>
        {{--  --}}
         {{-- <div class="m-3">
        <a href="{{ url('/add_category') }}" class="btn btn-primary">Add Category</a>
       
     </div> --}}

 
       
        {{--  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>orderID</th>
                    <th>userName</th>
                    <th>datePlaced</th>
                     <th>status</th>
                    {{-- <th>Action</th> --}}
                    {{-- <th>Delete</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($orderstatus as $orderstatus)
                    <tr>
                        <td>
                            <p class="card-text"> {{ $orderstatus['orderID'] }}</p>
                        </td>
                        <td> 
                            <p class="card-text"> {{ $orderstatus['userName'] }}</p>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $orderstatus['datePlaced'] }}</h5>
                        </td>
                       <td>
                            <p class="card-text"> {{ $orderstatus['status'] }}</p>
                        </td>
                        
                        {{-- <td>
                            <p class="card-text"> {{ $product['categoryId'] }}</p>
                        </td> --}}
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        {{-- <td>
                            <a href="{{ url('/updatecategory/' . $product['categoryId']) }}" class="btn btn-primary">Update</a> <!-- Link to the updateproduct route with productId -->
                        </td> --}}
                        {{-- <td>
                            <form action="{{ route('category.delete', ['id' => $product['categoryId']]) }}" method="POST">
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
