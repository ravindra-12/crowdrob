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
            <div class="card-body" style="background-color: #00ced1;"> 
                <h3 class="text-center">All Users</h3> 
            </div>
        </div>
        <div class="p-4">
            <a href="/register">
                <button type="button" class="btn btn-primary" data-mdb-ripple-init>Add users</button>
            </a>
            <a href="/export-alluser-details" class="btn btn-primary">Export to Excel</a>
        </div>
    </div>
    
    <!-- Search Form -->
    <form action="{{ route('allusers') }}" method="GET" class="mb-4">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search users" class="form-control">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
        <a href="{{ route('allusers') }}" class="btn btn-secondary">Reset</a>
    </form>
    
    <table class="table table-responsive">
        <thead>
            <tr>
                <th>User Name:</th>
                <th>First Name:</th>
                <th>Last Name:</th>
                <th>Email:</th>
                <th>Phone Number:</th>
                <th>User Roles:</th>
                <th>Edit</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['username'] }}</td>
                    <td>{{ $user['firstName'] }}</td>
                    <td>{{ $user['lastName'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['phoneNumber'] }}</td>
                    <td>{{ $user['userRoles'] }}</td>
                    <td><a href="{{ url('/user/edit/' . $user['email']) }}" class="btn btn-primary">Update</a></td>
                    <td><a href="{{ url('/user/view/' . $user['email']) }}" class="btn btn-info">View</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-4') }} <!-- Display pagination links -->
    </div>
</div>
@endsection
