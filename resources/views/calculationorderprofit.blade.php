@extends('dashboardlayout')

<!-- Main content -->
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color: #00ced1;"> <h3 class="text-center">  All Order Calculation</h3> </div>
          </div>

          {{-- <div class="m-3">
            <a href="{{ url('/addstore') }}" class="btn btn-primary">Add Store</a>
        </div> --}}
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

                    <th>orderId</th>
                    <th>orderDate</th>
                    <th>orderStatus</th>
                    <th>orderAmount</th>
                    <th>totalQunatity</th>
                    <th>productPrice</th> 
                  <th>totalOrderProfitWithTax</th>
                    <th>totalOrderProfitWithouttax</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($OrderProfit as $OrderProfit)
                    <tr>

                       
                     
                        <td>{{ $OrderProfit['orderId'] }}</td>
                        <td>{{ $OrderProfit['orderDate'] }}</td>
                        <td>{{ $OrderProfit['orderStatus'] }}</td>
                        <td>{{ $OrderProfit['orderAmount'] }}</td>
                        <td>{{ $OrderProfit['totalQunatity'] }}</td>
                        <td>{{ $OrderProfit['productPrice'] }}</td>
                        <td>{{ $OrderProfit['totalOrderProfitWithTax'] }}</td>
                        <td>{{ $OrderProfit['totalOrderProfitWithouttax'] }}</td>
                        
                       
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
