<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
</head>
<body>
    @extends('layout')

  @section('content')
<div class="container">
    <h3 class="text-center my-4">Edit User</h3>
    <form id="updateUserForm" method="POST" class="shadow-sm p-5 mb-5 bg-body-tertiary rounded">
        @csrf
        @method('PUT')
    
        <!-- userID -->
        <div class="mb-3">
            {{-- <label for="userID" class="form-label">userID</label> --}}
            <input type="hidden" class="form-control" id="userID" name="userID" value="{{ $user['userID'] }}">
        </div>
    
        <!-- username -->
        <div class="mb-3">
            {{-- <label for="username" class="form-label">username</label> --}}
            <input type="hidden" class="form-control" id="username" name="username" value="{{ $user['username'] }}"> <!-- Change name to "username" -->
        </div>
    
        <!-- First Name -->
        <div class="mb-3">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $user['firstName'] }}">
        </div>
    
        <!-- Last Name -->
        <div class="mb-3">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $user['lastName'] }}">
        </div>
    
        <!-- email -->
        <div class="mb-3">
            {{-- <label for="email" class="form-label">email</label> --}}
            <input type="hidden" class="form-control" id="email" name="email" value="{{ $user['email'] }}"> <!-- Change id and name to "email" -->
        </div>
    
        <!-- Phone Number -->
        <div class="mb-3">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="{{ $user['phoneNumber'] }}">
        </div>
    
        <!-- password -->
        <div class="mb-3">
            {{-- <label for="password" class="form-label">password</label> --}}
            <input type="hidden" class="form-control" id="password" name="password" value="{{ $user['password'] }}"> <!-- Change name to "password" -->
        </div>
    
        <!-- userRoles -->
        <div class="mb-3">
            {{-- <label for="userRoles" class="form-label">userRoles</label> --}}
            <input type="hidden" class="form-control" id="userRoles" name="userRoles" value="{{ $user['userRoles'] }}"> <!-- Change name to "userRoles" -->
        </div>
    
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
 <script>
        $('#updateUserForm').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            $.ajax({
                url: "{{ route('user.update', $user['email']) }}", // Laravel route for updating the user
                method: "PUT", // HTTP method
                data: $(this).serialize(), // Serialize form data
                success: function(response) {
                    alert('User updated successfully!');
                    // Optionally redirect or update the UI here without page reload
                     window.location.href = "/allusers";
                },
                error: function(xhr) {
                    alert('Failed to update user. Please try again.');
                }
            });
        });
    </script>
@endsection

</body>
</html>
