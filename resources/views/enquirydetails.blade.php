@extends('dashboardlayout')

<!-- Main content -->
@section('content')
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  Enquiry Details</h3> </div>
          
          </div>
          <div class="my-3">
            <a href="/export-inquiry-details" class="btn btn-primary">Export to Excel</a>
        </div>
          </div>
          <div>
            <form action="{{ route('getenquiry') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Enquiry Details" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <a href="{{ route('getenquiry') }}" class="btn btn-secondary">Reset</a>
            </form>
          </div>
        <table class="table">
            <thead>
                <tr>

                    <th>Name</th>
                    <th>Email Id</th>
                     <th>Mobile Number</th>
                     <th>Location</th>
                     <th>Date</th>
                     <th>Message</th>
                    {{-- <th>Delete</th>
                    <th>View</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($enquiry as $item)
                    <tr>
                       
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['emailID'] }}</td>
                        <td>{{ $item['mobileNo'] }}</td>
                        <td>{{ $item['location'] }}</td>
                        {{-- <td>{{ $item['dateTime'] }}</td> --}}
                        <td>{{ \Carbon\Carbon::parse($item['dateTime'])->format('d/m/y : H:i') }}</td>
                        <td>{{ $item['messages'] }}</td>
                        {{-- <td>
                            <a href="{{ url('/updateproduct/' . $product['productId']) }}" class="btn btn-primary">Edit</a> <!-- Link to the updateproduct route with productId --> --}}
                        </td>
                        {{-- <td>
                            <form action="{{ route('products.delete', ['id' => $product['productId']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td> --}}
                        {{-- <td> <!-- Add this column for the "View Details" button -->
                            <a href="{{ url('/productdetails/' . $product['productId']) }}" class="btn btn-info">View</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $enquiry->links('pagination::bootstrap-4') }} 
        </div>
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
