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
            <div class="card-body" style="background-color: #00ced1;"> 
                <h3 class="text-center">Get All Cuopon </h3> 
            </div>
          </div>
          </div>
       
         
       <div class="m-3">
        <a href="{{ url('addcoupon') }}" class="btn btn-primary">Add Coupon</a>
     </div> 
      
        <table class="table">
            <thead>
                <tr>
                    {{-- <th>Hero Image</th>
                    <th>Hero Title </th> --}}
                    <th>couponCode</th>
                    <th>couponName</th>
                    <th>couponValue</th>
                    <th>couponExpiry</th>
                    <th>couponCondition</th>
                    <th>createdDate</th>
                    <th>isActive</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($couponData as $couponData)
                    <tr>
                      
                        <td>
                            <p class="card-text"> {{ $couponData['couponCode'] }}</p>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $couponData['couponName'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $couponData['couponValue'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ \Carbon\Carbon::parse($couponData['couponExpiry'])->format('d/m/Y H:i') }}</h5>
                        </td>
                        
                        <td>
                            <h5 class="card-title">{{ $couponData['couponCondition'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ \Carbon\Carbon::parse($couponData['createdDate'])->format('d/m/Y H:i') }}</h5>
                        </td>
                        
                        <td>
                            <h5 class="card-title">{{ $couponData['isActive'] ? "Active" : "Deactive" }}</h5>
                        </td>
                     
                        <td>
                        <a href="{{ url('/updatecoupon/' . $couponData['couponCode']) }}" class="btn btn-primary">
                        Update
                         </a>
                        </td>
                        
                       
                       

 <td>
    <form action="{{route('coupone.delete', ['id' => $couponData['couponCode']])}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this color?')">Delete</button>
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
