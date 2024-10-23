<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function GetAllUserOrders(Request $request){
        try {
            $response =  Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Orders/GetAllUserOrders');

            //  dd($response->json());
            if( $response->successful()){
                // dd($response->json());
                $orders = $response->json();
                $username = session('username');

                return view('orders', ['orders' => $orders], compact('username'));

            }else{
                return redirect()->route('home')->with('error', 'Something went wrong');
            }
              
              
            
           
            // dd($orders );
            
          
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }



    // GETALLORDERS
    
    public function GetAllOrders(Request $request)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Orders/GetAllOrderForAdmin');

        if ($response->successful()) {
            $orders = $response->json();
<<<<<<< HEAD
=======
            // dd($orders);
             // Retrieve search query from request
           
 

             $search = $request->input('search');
        
             // Filter vendors based on search criteria
             if ($search) {
                 $orders = array_filter($orders, function ($orders) use ($search) {
                     return stripos($orders['orderID'], $search) !== false ||
                           stripos($orders['customerUserName'], $search) !== false;
                 });
             }
>>>>>>> f963cae (first commit)

            // Ensure the orders array is not empty
            if (!empty($orders)) {
                // Sort orders by order date in descending order
                usort($orders, function ($a, $b) {
                    $aOrderDate = isset($a['orderDate']) ? strtotime($a['orderDate']) : 0;
                    $bOrderDate = isset($b['orderDate']) ? strtotime($b['orderDate']) : 0;
                    return $bOrderDate - $aOrderDate;
                });
            }

            // Pagination
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $itemCollection = collect($orders);
            $perPage = 10;
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
            $paginatedItems->setPath($request->url());

            // View
            $username = session('username');
            return view('getallorder', ['orders' => $paginatedItems, 'username' => $username]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}




    // public function GetAllOrders(Request $request){
    //     try {
    //         $response =  Http::withOptions(['verify' => base_path('cacert.pem')])
    //                     ->get('https://crowdrobapi.tech/api/Orders/GetAllOrderForAdmin');
    //                     //  dd($response->json());
    //                     $orders = $response->json();
    //                 //  dd($orders );
    //                $currentPage = LengthAwarePaginator::resolveCurrentPage();
    //                 $itemCollection = collect($orders);
    //                 $perPage = 10;
    //                 $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
    //                 $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
    //                 $paginatedItems->setPath($request->url());

    //                     $username = session('username');
    //                     return view('getallorder', ['orders' => $paginatedItems, 'username' => $username   ]);
    //     }
    //     catch (\Exception $e) {
    //         return response()->json(['message' => $e->getMessage()], 500);

    //     }

    // }


// GetByID

public function GetOrdersById($id){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Orders/GetOrdersById?OrderId={$id}");

        if ($response->successful()) {
            $Order = $response->json();
            // $username = session('username');
            //  dd($Order);
            return view('updateOrder', ['Order' => $Order]);
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}

public function GetAllOrdersByVendorId($id){
    $Order = [];
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Orders/GetAllOrdersByVendorId?VendorId={$id}");

        if ($response->successful()) {
            $Order = $response->json();
            // $username = session('username');
            //  dd($Order);
            return view('vendororderdetails', ['Order' => $Order]);
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}

public function OrderPlaceStatus(){
    try {
        $response =  Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get('https://crowdrobapi.tech/api/Orders/GetAllOrderPlacedStatus');
        //  dd($response->json());
         $orderstatus = $response->json();
         $username = session('username');
        return view('orderstatus', ['orderstatus' => $orderstatus], compact('username'));
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
}


public function update(Request $request)
<<<<<<< HEAD
    {
        try {
            $orderId = $request->input('OrderId');
            $status = $request->input('Status');

            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->put("https://crowdrobapi.tech/api/Orders/UpdateOrdersById?OrderId={$orderId}&Status={$status}");

            if ($response->successful()) {
                return redirect('oredrstatus')->with('toast_success', 'Order status updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to update order status.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating order status: ' . $e->getMessage());
        }
    }
=======
{
    try {
        $orderId = $request->input('OrderId');
        $status = $request->input('Status');

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/Orders/UpdateOrdersById?OrderId={$orderId}&Status={$status}");

        if ($response->successful()) {
            return response()->json(['success' => true, 'message' => 'Order status updated successfully.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to update order status.'], 500);
        }
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Error updating order status: ' . $e->getMessage()], 500);
    }
}
>>>>>>> f963cae (first commit)


public function GetallNetSellByVendorID($id){
    try {
        $response =  Http::withOptions(['verify'=> base_path('cacert.pem')])
        ->get('https://crowdrobapi.tech/api/Orders/GetAllNetSaleByVendorId?VendorId={$id}');

      // dd($response->json());

        $netSell = $response->json();

        // dd($netSell);

         return view('sellingdetails', [ ' $netSell' => $netSell] );
    }
    catch(\Exception $e){
        return redirect()->back()->with('error', 'Error updating order status: ' . $e->getMessage());
    }
}


// GetAllOrderProfitAndLossList

         

public function GetAllOrderProfitAndLossList()
    {
        try {
          

            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/AdminOderMonitor/GetAllOrderProfitAndLossListForAdmin");
                if( $response->successful()){
                    // dd($response->json());
                    $OrderProfit = $response->json();
                    $username = session('username');
                // dd($OrderProfit );
                    return view('calculationorderprofit', ['OrderProfit' => $OrderProfit], compact('username'));
    
                }else{
                    return redirect()->route('home')->with('error', 'Something went wrong');
                }
             
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating order status: ' . $e->getMessage());
        }
    }


    // 

<<<<<<< HEAD
    public function GetAllVendorOrder()
    {
        try {
          

            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/VendorOrder/getAllVendorOrder");
                if( $response->successful()){
                    // dd($response->json());
                    $VendorOrder = $response->json();
                    $username = session('username');
                //  dd($VendorOrder );
                    return view('allvendororder', ['VendorOrder' => $VendorOrder], compact('username'));
    
                }else{
                    return redirect()->route('home')->with('error', 'Something went wrong');
                }
             
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating order status: ' . $e->getMessage());
        }
    }
=======
    // public function GetAllVendorOrder()
    // {
    //     try {
          

    //         $response = Http::withOptions(['verify' => base_path('cacert.pem')])
    //             ->get("https://crowdrobapi.tech/api/VendorOrder/getAllVendorOrder");
    //             if( $response->successful()){
                    
    //                 $VendorOrder = $response->json();
    //                 dd($VendorOrder);
                
    //             $search = $request->input('search');
        
    //             // Filter vendors based on search criteria
    //             if ($search) {
    //                 $VendorOrder = array_filter($VendorOrder, function ($VendorOrder) use ($search) {
    //                     return stripos($VendorOrder['firstName'], $search) !== false ||
    //                             stripos($VendorOrder['shopName'], $search) !== false;
    //                 });
    //             }


    //                 $username = session('username');
             
    //                 return view('allvendororder', ['VendorOrder' => $VendorOrder], compact('username'));
    
    //             }else{
    //                 return redirect()->route('home')->with('error', 'Something went wrong');
    //             }
             
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Error updating order status: ' . $e->getMessage());
    //     }
    // }

    public function GetAllVendorOrder(Request $request)
    {
        try {
            // Make the API call
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/VendorOrder/getAllVendorOrder");
    
            // Check if the response is successful
            if ($response->successful()) {
                // Get the response data
                $VendorOrder = $response->json();
    
                // Retrieve search query from request
                $search = $request->input('search');
    
                // Filter vendors based on search criteria (vendorName and vendorId)
                if ($search) {
                    $VendorOrder = array_filter($VendorOrder, function ($order) use ($search) {
                        // Check within the 'productAndVendorDetail' array for each order
                        foreach ($order['productAndVendorDetail'] as $vendorDetail) {
                            if (stripos($vendorDetail['vendorName'], $search) !== false ||
                                stripos($vendorDetail['vendorId'], $search) !== false) {
                                return true; // Match found, include this order
                            }
                        }
                        return false; // No match found, exclude this order
                    });
                }
    
                // Get the username from the session
                $username = session('username');
    
                // Return the view with the filtered results
                return view('allvendororder', ['VendorOrder' => $VendorOrder], compact('username'));
            } else {
                // If the API call fails, redirect with an error
                return redirect()->route('home')->with('error', 'Something went wrong');
            }
    
        } catch (\Exception $e) {
            // Handle any exceptions
            return redirect()->back()->with('error', 'Error retrieving vendor orders: ' . $e->getMessage());
        }
    }
    


>>>>>>> f963cae (first commit)

    public function GetActiveDeliveryCities()
    {
        try {
          

            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/Addresses/GetActiveDeliveryCities");
                if( $response->successful()){
                    // dd($response->json());
                    $DeliveryCities = $response->json();
                    $username = session('username');
              
                    return view('deliverycities', ['DeliveryCities' => $DeliveryCities], compact('username'));
    
                }else{
                    return redirect()->route('home')->with('error', 'Something went wrong');
                }
             
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating order status: ' . $e->getMessage());
        }
    }
    
    // 

    public function create()
    {
        return view('add-city');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cityName' => 'required|string|max:255',
            'stateName' => 'required|string|max:255',
        ]);

        // API request to add a city
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                        ->post('https://crowdrobapi.tech/api/Addresses/ActiveDeliveryCity', [
                            'cityName' => $validatedData['cityName'],
                            'stateName' => $validatedData['stateName'],
                        ]);

        if ($response->successful()) {
            return redirect()->route('cities.index')->with('success', 'City added successfully');
        } else {
            return back()->with('error', 'Failed to add city');
        }
    }

    public function getDeliveryCities()
    {
        try {
            // API request to get cities
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                            ->get("https://crowdrobapi.tech/api/Addresses/GetActiveDeliveryCities");

            if ($response->successful()) {
                $deliveryCities = $response->json();
                $username = session('username');

                return view('cities', ['deliveryCities' => $deliveryCities], compact('username'));
            } else {
                return redirect()->route('home')->with('error', 'Something went wrong');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error fetching delivery cities: ' . $e->getMessage());
        }
    }


// Coupon method

public function GetAllCoupon(){

    try {
      
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                 ->get("https://crowdrobapi.tech/api/Coupon/GetAllCoupon");

        $couponData = $response->json();

        // dd($couponData);
        $username = session('username');
        return view('getallcoupon', ['couponData' => $couponData], compact('username'));


    }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error fetching delivery cities: ' . $e->getMessage());
    }

}


public function DeleteCoupon($id){

    try {

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->delete("https://crowdrobapi.tech/api/Coupon/DeleteCouponById?CouponCode=$id");

                    if($response->successful()){
                        return redirect('getallcoupon')->with('success', 'Coupon deleted successfully');
                        
                    }
      
                }catch(\Expection $e){
        return redirect()->back()->with('error', 'Error deleting coupon: ' . $e->getMessage());
    }

}


public function AddCoupon(Request $request){
    try {
        $data = [
            'couponName' => $request->input('couponName'),
            'couponValue' => $request->input('couponValue'),
            'couponExpiry' => \Carbon\Carbon::parse($request->input('couponExpiry'))->format('Y-m-d'), // Adjust the date format
            'couponCondition' => $request->input('couponCondition'),
            'couponVM1' => $request->input('couponVM1') ?? '', // Send default or empty value if not provided
        ];

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post('https://crowdrobapi.tech/api/Coupon/AddNewCoupon', $data);

        $coupondata = $response->json();
        // dd($coupondata);

        if($response->successful()){
            return redirect('getallcoupon')->with('success', 'Coupon added successfully');
        } else {
            return redirect()->back()->with('error', 'Error adding coupon: ' . $coupondata['title']);
        }
    } catch(\Exception $e) {
        return redirect()->back()->with('error', 'Error adding coupon: ' . $e->getMessage());
    }
}

public function GetCouponById($id){
    try{
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])

        ->get("https://crowdrobapi.tech/api/Coupon/GetCouponById?CouponCode={$id}");
        $coupondata = $response->json();

    //   dd($coupondata);

       return view('updatecoupon', compact('coupondata'));
        

    }catch(\Expection $e){
        return redirect()->back()->with('error', 'Error getting coupon: ' . $e->getMessage());
    }
}

<<<<<<< HEAD
public function UpdateCoupon(Request $request){

    try {
=======

public function UpdateCoupon(Request $request) {
    try {
        // Validate request data
        $request->validate([
            'couponCode' => 'required|integer',
            'couponName' => 'required|string|max:255',
            'couponValue' => 'required|numeric',
            'couponExpiry' => 'required|date',
            'couponCondition' => 'required|numeric',
            'couponVM1' => 'nullable|string',
            'isActive' => 'required|boolean', // Ensure isActive is validated as boolean
        ]);

        // Prepare data for the API request
>>>>>>> f963cae (first commit)
        $data = [
            'couponCode' => $request->input('couponCode'),
            'couponName' => $request->input('couponName'),
            'couponValue' => $request->input('couponValue'),
<<<<<<< HEAD
            'couponExpiry' => \Carbon\Carbon::parse($request->input('couponExpiry'))->format('Y-m-d'), // Adjust the date format
            'couponCondition' => $request->input('couponCondition'),
            'couponVM1' => $request->input('couponVM1') ?? '', // Send default or empty value if not provided
        ];

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->put("https://crowdrobapi.tech/api/Coupon/UpdateCouponById", $data);
            
        //    dd($response->json());

        if($response->successful()){
            return redirect('getallcoupon')->with('success', 'Coupon updated successfully');
        }


    }catch(\Expection $e){
        return redirect()->back()->with('error', 'Error updating coupon: ' . $e->getMessage());
    }

=======
            'couponExpiry' => \Carbon\Carbon::parse($request->input('couponExpiry'))->format('Y-m-d'),
            'couponCondition' => $request->input('couponCondition'),
            'couponVM1' => $request->input('couponVM1') ?? '',
            'isActive' => $request->input('isActive') === '1' ? true : false, // Convert to boolean
        ];

        // Send the API request
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->put("https://crowdrobapi.tech/api/Coupon/UpdateCouponById", $data);

        // Check response
        if ($response->successful()) {
            return redirect('getallcoupon')->with('success', 'Coupon updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update coupon. Please try again.');
        }

    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating coupon: ' . $e->getMessage());
    }
>>>>>>> f963cae (first commit)
}

// GetAllPaymentWithdrawal


public function GetallPaymentWithdrawal(){
    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->get("https://crowdrobapi.tech/api/PaymentWithdraw/GetAllPaymentWithdraw");
        $data = $response->json();
        $username = session('username');
        //  dd($data);
        return view('getallpaymentwithdrawal', ['data' => $data], compact('username'));

    }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error getting payment withdrawal: ' . $e->getMessage());
    }
}

public function GetallPaymentWithdrawalById($id){
    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->get("https://crowdrobapi.tech/api/PaymentWithdraw/GetPaymentWithdrawById?widthdrawId=7");
        
        $data = $response->json();
        $username = session('username');
         dd($data);
        return view('getallpaymentwithdrawalbyid', ['data' => $data], compact('username'));

    }catch(\Expection $e){
        return redirect()->back()->with('error', 'Error getting payment withdrawal by id: ' . $e->getMessage());
    }
}


public function DeleteWithdrwalByPaymentId($id){

$response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->delete("https://crowdrobapi.tech/api/PaymentWithdraw/DeletePaymentWithdraw?widthdrawId={$id}");

            // dd($response);

if($response->successful()){
    return redirect()->back()->with('success', 'Withdrawal deleted successfully');
}else{
    return redirect()->back()->with('warning', 'Withdrawal Not deleted successfully');
}
    
}


public function GetallGetAllAccountSetups(){
    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->get("https://crowdrobapi.tech/api/VendorAccountSetup/GetAllAccountSetups");
        $data = $response->json();
        $username = session('username');
        //  dd($data);
        return view('getallaccountsetups', ['data' => $data], compact('username'));

    }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error getting payment withdrawal: ' . $e->getMessage());
    }
}


public function GetallGetAllAccountSetupsById($id){
    
    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->get("https://crowdrobapi.tech/api/VendorAccountSetup/GetAccountSetupById?PaysetupId={$id}");
        
        $data = $response->json();
        $username = session('username');
        //  dd($data);
        return view('getallaccountsetupsbyid', ['data' => $data], compact('username'));

    }catch(\Expection $e){
        return redirect()->back()->with('error', 'Error getting payment withdrawal by id: ' . $e->getMessage());
    }
}



public function DeleteAccountSetups($id){

    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->delete("https://crowdrobapi.tech/api/VendorAccountSetup/DeleteAccountSetup?PaysetupId={$id}");
    
                // dd($response);
    
    if($response->successful()){
        return redirect()->back()->with('success', 'AccountSetups deleted successfully');
    }else{
        return redirect()->back()->with('warning', 'AccountSetups Not deleted successfully');
    }
        
    }
<<<<<<< HEAD

=======
    
    
    // Delivery

public function getAllShippedOrders()
{
    // Fetching all orders from the new API
    $orders = Http::withOptions(['verify' => base_path('cacert.pem')])
                  ->get('https://crowdrobapi.tech/api/Delivery/GetAllOrderDeliveryAssignment')
                  ->json();
    
    // Fetching available delivery agents from the new API
    $agents = Http::withOptions(['verify' => base_path('cacert.pem')])
                  ->get('https://crowdrobapi.tech/api/Delivery/GetAllAvailableDeliveryAgent')
                  ->json();

    $username = session('username');            

    return view('delivery.orders', compact('orders', 'agents', 'username'));
}



public function assignOrderToAgent(Request $request)
{
    $orders = $request->input('orders');

    foreach ($orders as $order) {
        $data = [
            'deliveryOrderID' => $order['deliveryOrderID'],
            'orderStaus' => 'assigned',
            'customerID' => $order['customerID'],
            'dilveryStatus' => 'assigned',
            'addressId' => $order['addressId'],
            'dilveryDate' => $order['dilveryDate'],
            'assignmentDate' => $order['assignmentDate'],
            'deliveryAgentId' => $order['deliveryAgentId'],
            'deliveryAgentName' => $order['deliveryAgentName'],
            'agentMobileNo' => $order['agentMobileNo'],
            'tblOrderID' => $order['tblOrderID']
        ];

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                        ->post('https://crowdrobapi.tech/api/Delivery/AssignOrdersToAgent', $data);

        if (!$response->successful()) {
            return response()->json(['error' => 'Failed to assign order with ID ' . $order['deliveryOrderID']], 500);
        }
    }

    // Return JSON response with success message and redirect URL
    return response()->json([
        'success' => 'Orders assigned successfully',
        'redirect' => route('dashboard') // Ensure this route is defined correctly
    ]);
}

public function GetBillingGenerate($orderId)
{
    // Make the HTTP request to get the PDF URL
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get('https://crowdrobapi.tech/api/AdminOderMonitor/InvoicePDF', [
            'OrderId' => $orderId
        ]);

    // Get the URL from the response body
    $pdfUrl = $response->body();  // The URL is returned as plain text

    // Check if the response contains a valid URL
    if (filter_var($pdfUrl, FILTER_VALIDATE_URL)) {
        // Redirect the user to the PDF URL (this will open the PDF)
        return redirect()->away($pdfUrl);
    }

    // Handle the case where no valid URL is returned
    return response('Unable to generate PDF. Please try again.', 500);
}
>>>>>>> f963cae (first commit)


}
