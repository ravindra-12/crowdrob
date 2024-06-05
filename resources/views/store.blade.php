<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crowdrob</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@extends('layout')
@section('content')
<body>
<div class="container-fluid" style="background-color: #20b2aa">
    <section class="h-100 gradient-custom-2">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-80">
            <div class="col col-lg-12 ">
              <div class="card">
                <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
                  <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                    <img src="https://img.freepik.com/free-vector/shop-with-sign-we-are-open_52683-38687.jpg?t=st=1714650754~exp=1714654354~hmac=1c547ec8c0bd57bb11f2353a18d83e0ccea0d7770b99361cdca0a35a9a3683b6&w=740"
                      alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                      style="width: 150px; z-index: 1">
                    {{-- <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-dark" data-mdb-ripple-color="dark"
                      style="z-index: 1;">
                      Edit profile
                    </button> --}}
                  </div>
                  <div class="ms-3" style="margin-top: 130px;">
                    <h5 class="text-white"> Store Name : {{ $store['storeName'] }} </h5>
                     {{-- <p>{{ $store['storeName'] }}</p> --}}
                  </div>
                </div>
                <div class="p-4 text-black" style="background-color: #f8f9fa;">
                  <div class="d-flex justify-content-end text-center py-1">
                    <div>
                      <p class="mb-1 h5">{{ $store['storeId'] }}</p>
                      <p class="small text-muted mb-0">Store Id</p>
                    </div>
                    <div class="px-3">
                      <p class="mb-1 h5">{{ $store['registerVendorUserId'] }}</p>
                      <p class="small text-muted mb-0">Register VendorUserId</p>
                    </div>
                    {{-- <div>
                      <p class="mb-1 h5">{{ $store['{{ $store['registerVendorUserId'] }}'] }}</p>
                      <p class="small text-muted mb-0">phoneNumber</p>
                    </div> --}}
                  </div>
                </div>
                <div class="card-body p-4 text-black">
                  <div class="mb-3">
                    <p class="lead fw-normal mb-1">Street</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                      <p class="font-italic mb-1"><b> street:</b> {{ $store['street'] }}</p>
                      <p class="font-italic mb-1"> <b> street2:</b> {{ $store['street2'] }}</p>
                      {{-- <p class="font-italic mb-0">Photographer</p> --}}
                    </div>
                  </div>
                  <div class="mb-3">
                    <p class="lead fw-normal mb-1">Contact Info</p>
                    <div class="p-4" style="background-color: #f8f9fa;">
                      <p class="font-italic mb-1"><b> Mobile Number:</b> {{ $store['phoneNumber'] }}</p>
                      <p class="font-italic mb-1"> <b> storeEmailAddress :</b> {{ $store['storeEmailAddress'] }}</p>
                      {{-- <p class="font-italic mb-0">Photographer</p> --}}
                    </div>
                  </div>
                  <div class="card-body p-4 text-black">
                    <div class="mb-5">
                      <p class="lead fw-normal mb-1">Address</p>
                      <div class="p-4" style="background-color: #f8f9fa;">
                        <p class="font-italic mb-1"><b>city:</b> {{ $store['city'] }}</p>
                        <p class="font-italic mb-1"> <b> state:</b> {{ $store['state'] }}</p>
                        <p class="font-italic mb-1"> <b> country:</b> {{ $store['country'] }}</p>
                        <p class="font-italic mb-1"> <b> postalCode:</b> {{ $store['postalCode'] }}</p>
                        {{-- <p class="font-italic mb-0">Photographer</p> --}}
                      </div>
                    </div>
                
                  
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    @endsection
</body>
</html>