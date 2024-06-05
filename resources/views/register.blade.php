<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- font awesom --}}
    

</head>
<body>
  @extends('layout')

  @section('content')
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                    <img src="https://img.freepik.com/free-vector/personal-site-concept-illustration_114360-3417.jpg?t=st=1714560536~exp=1714564136~hmac=3ac93969a459f42939626cdd23c327d1bda1f3a4faa245635444c7bcaa6e12ff&w=740" alt="Sample photo" class="img-fluid" style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase">Register</h3>
                      <form method="POST" action="/register" class="mx-1 mx-md-4">
                        @csrf
      
                        <div class="row">
                          {{-- <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                              <input type="text" id="UserID" class="form-control form-control-lg" name="UserID" required>
                              <label class="form-label" for="username">UserID</label>
                            </div>
                          </div> --}}

                          {{--  --}}
                          <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                              <input type="text" id="username" class="form-control form-control-lg" name="username" required>
                              <label class="form-label" for="username">Username</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                              <input type="text" id="firstName" class="form-control form-control-lg" name="firstName" required>
                              <label class="form-label" for="firstName">First Name</label>
                            </div>
                          </div>
                        </div>
      
                        <div class="row">
                          <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                              <input type="text" id="lastName" class="form-control form-control-lg" name="lastName" required>
                              <label class="form-label" for="lastName">Last Name</label>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div data-mdb-input-init class="form-outline">
                              <input type="email" id="email" class="form-control form-control-lg" name="email" required>
                              <label class="form-label" for="email">Email</label>
                            </div>
                          </div>
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="text" id="phoneNumber" class="form-control form-control-lg" name="phoneNumber" required>
                          <label class="form-label" for="phoneNumber">Phone Number</label>
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          <input type="password" id="password" class="form-control form-control-lg" name="password" required>
                          <label class="form-label" for="password">Password</label>
                        </div>
      
                        <div data-mdb-input-init class="form-outline mb-4">
                          {{-- <input type="text" id="userRoles" class="form-control form-control-lg" name="userRoles" required> --}}
                          <select class="form-select form-control form-control-lg" id="userRoles" name="userRoles" required>
                            <option selected disabled value="">Choose...</option>
                            <option value="Admin">Admin</option>
                            <option value="SubAdmin">SubAdmin</option>
                            <option value="ProductAdmin">ProductAdmin</option>
                            <option value="VendorAdmin">VendorAdmin</option>
                            <option value="OrderAdmin">OrderAdmin</option>
                            <option value="User">User</option>
                            <option value="Customer">Customer</option>
                            
                          </select>
                          <label class="form-label" for="userRoles">User Roles</label>
                        </div>
      
                        <div class="d-flex justify-content-end pt-3">
                          <button type="reset" data-mdb-button-init data-mdb-ripple-init class="btn btn-light btn-lg me-2">Reset all</button>
                          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-warning btn-lg">Submit form</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      
    



        {{-- <form method="POST" action="/register">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName" required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="mb-3">
                <label for="userRoles" class="form-label">User Roles</label>
                <input type="text" class="form-control" id="userRoles" name="userRoles" required>
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form> --}}
        @endsection
</body>
</html>