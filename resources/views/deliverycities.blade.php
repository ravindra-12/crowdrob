@extends('dashboardlayout')

<!-- Main content -->
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  All City</h3> </div>
          </div>

          <div class="m-3">
            <a href="{{ url('/add-city') }}" class="btn btn-primary">Add City</a>
        </div>
          </div>
{{-- 
          <div>
            <form action="{{ route('allstore') }}" method="GET" class="mb-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Store" class="form-control">
                <button type="submit" class="btn btn-primary mt-2">Search</button>
                <a href="{{ route('allstore') }}" class="btn btn-secondary">Reset</a>
            </form>
          </div> --}}
        <table class="table table-responsive">
            <thead>
                <tr>

                    <th>deliveryCityId</th>
                    <th>cityName</th>
                    <th>stateName</th>
                    {{-- <th>orderStatus</th> --}}
                    {{-- <th>productAndVendorDetail</th> --}}
                 
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($DeliveryCities as $DeliveryCities)
                    <tr>

                       
                     
                        <td>{{ $DeliveryCities['deliveryCityId'] }}</td>
                        <td>{{ $DeliveryCities['cityName'] }}</td>
                        <td>{{ $DeliveryCities['stateName'] }}</td>
                        {{-- <td>{{ $VendorOrder['orderStatus'] }}</td> --}}
                      {{-- <td>{{ $VendorOrder['productAndVendorDetail'] }}</td> --}}
                     
                        
                       
                        {{-- <td>
                            <form action="{{ route('store.delete', $store['storeId']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this store?')">Delete</button>
                            </form>
                        </td> --}}
                        {{-- <td>
                            <a href="{{ url('/store/' . $store['storeId']) }}" class="btn btn-info">View</a>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="d-flex justify-content-center">
            {{ $stores->links('pagination::bootstrap-5') }} <!-- Display pagination links -->
        </div> --}}
    </div>
@endsection
