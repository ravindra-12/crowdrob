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
                <h3 class="text-center">Get All Paymentwithdrawal </h3> 
            </div>
          </div>
          </div>
       
{{--          
       <div class="m-3">
        <a href="{{ url('addcoupon') }}" class="btn btn-primary">Add Coupon</a>
     </div>  --}}
      
        <table class="table">
            <thead>
                <tr>
                   
                    <th>widthrawId</th>
                    <th>vendorId</th>
                    <th>widthrawAmount</th>
                    <th>mobileNumber</th>
                    <th>bankDetails</th>
                    <th>createdDate</th>
                    <th>Delete</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                    <tr>
                      
                        <td>
                            <p class="card-text"> {{ $data['widthrawId'] }}</p>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['vendorId'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['widthrawAmount'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['mobileNumber'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['bankDetails'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{  \Carbon\Carbon::parse($data['createdDate'])->format('d/m/Y H:i') }}</h5>
                        </td>
                        
                        
                       
                     
                       
                        
                       
                       

                        <td>
                            <form action="{{ route('delete.paymentwithdrawal', ['id' => $data['widthrawId']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</button>
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
