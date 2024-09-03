
@extends('dashboardlayout')

    <!-- Main content -->
    @section('content')
    <div class="container">
        <div class="container">
            <div class="card">
                <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  All Vendors Order data</h3> </div>
              </div>
              </div>
              <div>
                <form action="{{ route('allvendorr') }}" method="GET" class="mb-4">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Vendor" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Search</button>
                    <a href="{{ route('allvendorr') }}" class="btn btn-secondary">Reset</a>
                </form>
              </div>
        <table class="table table-responsive">
            <thead>
                <tr>
                    {{-- <th>Username</th> --}}
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Shop Name</th>
                    <th>Phone Number</th>
                    <th>Created Date</th>
                    {{-- <th>Active</th> --}}
                    {{-- <th>Edit</th>
                    <th>Delete</th> --}}
                    <th>View</th>
                    {{-- <th>Netsell</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                    <tr>
                        {{-- <td>{{ $user['username'] }}</td> --}}
                        <td>{{ $user['firstName'] }}</td>
                        <td>{{ $user['lastName'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['shopName'] }}</td>
                        <td>{{ $user['phoneNumber'] }}</td>
                        <td>{{ date('d/m/y h:i A', strtotime($user['createdDate'])) }}</td>
                        {{-- <td>{{ $user['isActive'] ? 'Yes' : 'No' }}</td> --}}
                        {{-- <td>
                            <a href="{{ url('/vendor/edit/' . $user['registerVendorUserId']) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('vendor.delete', ['id' => $user['userId']]) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td> --}}
                        <td>
                            <a href="{{ url('/getallvendororder/' . $user['registerVendorUserId']) }}" class="btn btn-info">View Order</a>
                        </td>
                        {{-- <td>
                            <a href="{{ url('/sellingdetails/' . $user['registerVendorUserId']) }}" class="btn btn-info">Netsell</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
        </div>
    </div>
    @endsection
   
 