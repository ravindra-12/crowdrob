<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Account Setup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
@extends('layout')

@section('content')
<body style="background-color: #eee;">
    <section style="background-color: #eee;">
        <div class="container py-5">
  
            <div class="card my-3">
                <div class="card-body bg-warning">
                    <h3 class="text-center">Account Setup Details</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center py-5">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3 text-dark">{{ $data['accountHolderName'] }}</h5>
                            <p class="text-muted mb-1 text-dark">Bank: {{ $data['bankName'] }}</p>
                            <p class="text-muted mb-4 text-dark">Branch: {{ $data['branchName'] }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body py-5">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Account Type:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountType'] }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Account Number:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountNumber'] }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">IFSC Code:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['ifscCode'] }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Branch Address:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['brankAddress'] }}</p>
                                </div>
                            </div>
                            <hr>
                            @if($data['paytmNumber'] || $data['googlePayNumber'] || $data['phonePeNumber'])
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Payment Numbers:</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0 text-dark">Paytm: {{ $data['paytmNumber'] ?: 'N/A' }}</p>
                                        <p class="text-muted mb-0 text-dark">Google Pay: {{ $data['googlePayNumber'] ?: 'N/A' }}</p>
                                        <p class="text-muted mb-0 text-dark">PhonePe: {{ $data['phonePeNumber'] ?: 'N/A' }}</p>
                                    </div>
                                </div>
                                <hr>
                            @endif
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">UPI ID:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['upiId'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <!-- Additional Account Holder Details -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Holder Address:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderAddress'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">City:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderCity'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">State:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderState'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Country:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderCountry'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">ZIP Code:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderZipCode'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Mobile Number:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderMobileNumber'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderEmail'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">PAN Number:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderPanNumber'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Aadhar Number:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderAadharNumber'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">GST Number:</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0 text-dark">{{ $data['accountHolderGSTNumber'] ?: 'N/A' }}</p>
                                </div>
                            </div>
                            <hr>
                            <!-- Account Documents Section -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">PAN Card:</p>
                                </div>
                                <div class="col-sm-9">
                                    @if($data['accountHolderPANCard'])
                                        <a href="{{ $data['accountHolderPANCard'] }}" class="text-dark" target="_blank">View Document</a>
                                    @else
                                        <p class="text-muted mb-0 text-dark">N/A</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Aadhar Card:</p>
                                </div>
                                <div class="col-sm-9">
                                    @if($data['accountHolderAadharCard'])
                                        <a href="{{ $data['accountHolderAadharCard'] }}" class="text-dark" target="_blank">View Document</a>
                                    @else
                                        <p class="text-muted mb-0 text-dark">N/A</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">GST Certificate:</p>
                                </div>
                                <div class="col-sm-9">
                                    @if($data['accountHolderGSTCertificate'])
                                        <a href="{{ $data['accountHolderGSTCertificate'] }}" class="text-dark" target="_blank">View Document</a>
                                    @else
                                        <p class="text-muted mb-0 text-dark">N/A</p>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Cancelled Cheque:</p>
                                </div>
                                <div class="col-sm-9">
                                    @if($data['accountHolderCancelledCheque'])
                                        <a href="{{ $data['accountHolderCancelledCheque'] }}" class="text-dark" target="_blank">View Document</a>
                                    @else
                                        <p class="text-muted mb-0 text-dark">N/A</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
    </section>
</body>
</html>
@endsection
