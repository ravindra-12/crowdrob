@extends('dashboardlayout')

    <!-- Main content -->
    @section('content')
    <div class="container">
        <div class="container">
            <div class="card">
                <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  Get All Users Orders</h3> </div>
              </div>
              </div>
        <table class=" table table-responsive">
            <thead>
                <tr>
                    {{-- <th>Username</th> --}}
                    <th>orderId</th>
                    <th>userName</th>
                    <th>location</th>
                    <th>productTilte</th>
                    <th>payStatus</th>
                    <th>quantity</th>
                    <th>orderStatus</th>
                     {{-- <th>Edit</th> --}}
                    {{-- <th>Delete</th> --}}
                    {{-- <th>View</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order['orderID'] }}</td>
                        <td>{{ $order['userName'] }}</td>
                        <td>{{ $order['location'] }}</td>
                        <td>{{ $order['productTilte'] }}</td>
                        <td>{{ $order['payStatus'] }}</td>
                        <td>{{ $order['quantity'] }}</td>
                        <td>{{ $order['orderStatus'] }}</td>
                     
                      
                        {{-- <td>{{ date('d/m/y h:i A', strtotime($user['createdDate'])) }}</td> --}}
                      

                        {{-- <td>
                            <a href="{{ url('/update-status') }}" class="btn btn-primary">Edit</a>
                        </td> --}}
                        {{-- <td>
                            <a href="{{ url('/vendor/edit/' . $user['registerVendorUserId']) }}" class="btn btn-primary">Edit</a>
                        </td> --}}
                        {{-- <td>
                            <form action="{{ route('vendor.delete', ['id' => $user['userId']]) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td> --}}
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center">
            {{ $orders->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
        </div> --}}
    </div>
    @endsection
   
 