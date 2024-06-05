@extends('dashboardlayout')

<!-- Main content -->
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  All Store</h3> </div>
          </div>

          <div class="m-3">
            <a href="{{ url('/addstore') }}" class="btn btn-primary">Add Store</a>
        </div>
          </div>
        <table class="table">
            <thead>
                <tr>

                    <th>Store Id</th>
                    <th>Street</th>
                    <th>Store Name</th>
                    <th>Phone Number</th>
                    <th>Street 2</th>
                    <th>City</th> 
                    <th>State</th>
                    {{-- <th>Country</th> --}}
                    <th>Postal Code</th>
                    <th>Store EmailAddress</th>
                    <th>Delete</th>
                    <th>View</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stores as $store)
                    <tr>

                       
                     
                        <td>{{ $store['storeId'] }}</td>
                        <td>{{ $store['street'] }}</td>
                        <td>{{ $store['storeName'] }}</td>
                        <td>{{ $store['phoneNumber'] }}</td>
                        <td>{{ $store['street2'] }}</td>
                        <td>{{ $store['city'] }}</td>
                        <td>{{ $store['state'] }}</td>
                        {{-- <td>{{ $store['country'] }}</td> --}}
                        <td>{{ $store['postalCode'] }}</td>
                        <td>{{ $store['storeEmailAddress'] }}</td>
                       
                        <td>
                            <form action="{{ route('store.delete', $store['storeId']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this store?')">Delete</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ url('/store/' . $store['storeId']) }}" class="btn btn-info">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $stores->links('pagination::bootstrap-5') }} <!-- Display pagination links -->
        </div>
    </div>
@endsection
