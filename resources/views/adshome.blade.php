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
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center"> HomeAds</h3> </div>
          </div>
          </div>
        {{--  --}}
         
       <div class="m-3">
        <a href="{{ url('adds_home') }}" class="btn btn-primary">Add adshome</a>
        
     </div>
        {{--  --}}
        <table class="table">
            <thead>
                <tr>
                    <th>adsImage</th>
                    <th>adsImageTitle </th>
                    <th>homeAdsID</th>
                    <th>categoryID</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                    <tr>
                        <td> 
                           <img src="{{ $data['adsImage'] }}" class="img-fluid" height="80px" width="120px" />
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['adsImageTitle'] }}</h5>
                        </td>
                       <td>
                            <p class="card-text"> {{ $data['homeAdsID'] }}</p>
                        </td>
                        <td>
                            <p class="card-text"> {{ $data['categoryID'] }}</p>
                        </td>
                        <td>
                            <a href="{{ url('/updatehomeads/' . $data['homeAdsID']) }}" class="btn btn-primary">Update</a> <!-- Link to the updateproduct route with productId -->
                        </td>
                       
                        <td>
                            <form action="{{ route('homeads.delete', ['id' => $data['homeAdsID']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
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
