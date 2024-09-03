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
                <h3 class="text-center">Get All AccountSetup </h3> 
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
                   
                    <th>paySetupId</th>
                    <th>accountType</th>
                    <th>accountHolderName</th>
                    <th>bankName</th>
                    <th>branchName</th>
                    <th>accountNumber</th>
                    <th>View</th>
                     <th>Delete</th> 
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $data)
                    <tr>
                      
                        <td>
                            <p class="card-text"> {{ $data['paySetupId'] }}</p>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['accountType'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['accountHolderName'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['bankName'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['branchName'] }}</h5>
                        </td>
                        <td>
                            <h5 class="card-title">{{ $data['accountNumber'] }}</h5>
                        </td>
                      
                        <td>
                            <a href="{{ url('getallaccountsetup/'.$data['paySetupId']) }}" class=" btn btn-primary">

                             View
                        </a>
                        </td>
                        
                       
                     
                       
                        
    
                       
                        <td>
                            <form action="{{ route('delete.accountsetup', ['id' => $data['paySetupId']]) }}" method="POST">
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
