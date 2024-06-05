
@extends('dashboardlayout')

    <!-- Main content -->
    @section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="container">
            <div class="card">
                <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  All Users</h3> </div>
              </div>
              <div class="p-4">
                <a href="/register">
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>Add users</button>
            </a>
              </div>
              </div>
              
        <table class="table">
            <thead>
                <tr>
                    {{-- <th>Username</th> --}}
                    <th>User Name:</th>
                    <th>First Name:</th>
                    <th>Last Name:</th>
                    <th>email:</th>
                    <th>Phone Number:</th>
                    <th>userRoles:</th>
                    {{-- <th>Active</th> --}}
                    <th>Edit</th>
                    {{-- <th>Delete</th> --}}
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        {{-- <td>{{ $user['username'] }}</td> --}}
                        <td>{{ $user['username'] }}</td>
                        <td>{{ $user['firstName'] }}</td>
                        <td>{{ $user['lastName'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['phoneNumber'] }}</td>
                        <td>{{ $user['userRoles'] }}</td>
                        {{-- <td>{{ $user['isActive'] ? 'Yes' : 'No' }}</td> --}}
                        <td><a href="{{ url('/user/edit/' . $user['email']) }}" class="btn btn-primary">Update</a> </td>
                        {{-- <a href="{{ url('/user/edit/' . $user['email']) }}" class="btn btn-primary">Update</a> --}}
                        {{-- <td>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td> --}}
                        <td>
                            <a href="{{ url('/user/view/' . $user['email']) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
        </div>

    </div>
    @endsection
   
 