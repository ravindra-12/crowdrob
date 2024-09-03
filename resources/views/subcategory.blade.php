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
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center"> SubCategory </h3> </div>
          </div>
          </div>
        {{--  --}}
         <div class="m-3">
        {{-- <a href="{{ url('/add_category') }}" class="btn btn-primary">Add Category</a> --}}
        <a href="{{ url('/add_subcategory') }}" class="btn btn-primary">Add SubCategory</a>
     </div>


        

       
       
        {{--  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>subCategoryId</th>
                    <th>subCategoryName</th>
                    <th>categoryId</th>
                    {{-- <th>category</th> --}}
                  
                  
                    {{-- <th>Created Date</th> --}}
                    {{-- <th>Action</th> --}}
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            <p class="card-text"> {{ $product['subCategoryId'] }}</p>
                        </td>
                       
                        <td>
                            <h5 class="card-title">{{ $product['subCategoryName'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $product['categoryId'] }}</h5>
                        </td>
                        
                        {{-- <td>
                            <p class="card-text"> {{ $product['category'] }}</p>
                        </td> --}}
                        {{-- <td>{{ $product['createdDate'] }}</td> --}}
                        {{-- <td>
                            <a href="{{ url('/updatecategory/' . $product['categoryId']) }}" class="btn btn-primary">Update</a> <!-- Link to the updateproduct route with productId -->
                        </td> --}}
                        <td>
                            <form action="{{ route('subcategory.delete', ['id' => $product['subCategoryId']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
