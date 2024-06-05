<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@extends('layout')

  @section('content')
<body  style="background-color: #eee;">
    <section style="background-color: #eee;">
        <div class="container py-5">
  

    <div class="card my-3">
        <div class="card-body bg-warning"> <h3 class="text-center"> User Details</h3> </div>
      </div>

    <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center py-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3 text-dark"> {{ $user['username'] }}</h5>
              <p class="text-muted mb-1 text-dark">{{ $user['firstName'] }} {{ $user['lastName'] }}</p>
              <p class="text-muted mb-4 text-dark">{{ $user['email'] }}</p>
              {{-- <div class="d-flex justify-content-center mb-2">
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button>
                <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
              </div> --}}
            </div>
          </div>
          
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body py-5">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">First Name:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 text-dark">{{ $user['firstName'] }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Last Name:</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 text-dark">{{ $user['lastName'] }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 text-dark">{{ $user['email'] }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Phone</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 text-dark">{{ $user['phoneNumber'] }}</p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">UserRole</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 text-dark">{{ $user['userRoles'] }}</p>
                </div>
              </div>
              <hr>
             
            </div>
          </div>
          
        </div>
      </div>

    </div>
</section>
@endsection
</body>
</html>