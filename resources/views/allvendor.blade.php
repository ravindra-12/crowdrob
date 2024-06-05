
@extends('dashboardlayout')

    <!-- Main content -->
    @section('content')
    <div class="container">
        <div class="container">
            <div class="card">
                <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  All Vendors</h3> </div>
              </div>
              </div>
        <table class="table">
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
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>View</th>
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
                        <td>
                            <a href="{{ url('/vendor/edit/' . $user['registerVendorUserId']) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('vendor.delete', ['id' => $user['userId']]) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ url('/vendordetails/' . $user['registerVendorUserId']) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
        </div>
    </div>
    @endsection
   
 