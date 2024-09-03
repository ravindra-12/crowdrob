<?php

// app/Http/Controllers/ApiController.php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ApiController extends Controller
{
    public function getData(Request $request)
    {
        try {
            // Fetch all vendors from API
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/User/GetAllVendor');
    
            if ($response->successful()) {
                $data = $response->json();
                
                // Retrieve search query from request
                $search = $request->input('search');
        
                // Filter vendors based on search criteria
                if ($search) {
                    $data = array_filter($data, function ($vendor) use ($search) {
                        return stripos($vendor['firstName'], $search) !== false ||
                               stripos($vendor['lastName'], $search) !== false ||
                               stripos($vendor['email'], $search) !== false ||
                               stripos($vendor['phoneNumber'], $search) !== false ||
                               stripos($vendor['shopName'], $search) !== false;
                    });
                }
    
                // Paginate filtered data
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $itemCollection = collect($data);
                $perPage = 10;
                $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
                $paginatedItems = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
                $paginatedItems->setPath($request->url());
    
                // Retrieve username from session (if needed)
                $username = session('username');
    
                // Render view with paginated data
                return view('allvendor', ['data' => $paginatedItems, 'username' => $username]);
            } else {
                return view('api.error');
            }
        } catch (RequestException $e) {
            return view('api.error');
        }
    }


    public function getvendororderdata(Request $request)
    {
        try {
            // Fetch all vendors from API
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/User/GetAllVendor');
    
            if ($response->successful()) {
                $data = $response->json();
                
                // Retrieve search query from request
                $search = $request->input('search');
        
                // Filter vendors based on search criteria
                if ($search) {
                    $data = array_filter($data, function ($vendor) use ($search) {
                        return stripos($vendor['firstName'], $search) !== false ||
                               stripos($vendor['lastName'], $search) !== false ||
                               stripos($vendor['email'], $search) !== false ||
                               stripos($vendor['phoneNumber'], $search) !== false ||
                               stripos($vendor['shopName'], $search) !== false;
                    });
                }
    
                // Paginate filtered data
                $currentPage = LengthAwarePaginator::resolveCurrentPage();
                $itemCollection = collect($data);
                $perPage = 10;
                $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
                $paginatedItems = new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
                $paginatedItems->setPath($request->url());
    
                // Retrieve username from session (if needed)
                $username = session('username');
    
                // Render view with paginated data
                return view('vendororder', ['data' => $paginatedItems, 'username' => $username]);
            } else {
                return view('api.error');
            }
        } catch (RequestException $e) {
            return view('api.error');
        }
    }




    public function getvendorbyid($id){
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/User/GetVendorById?registerVendorUserId={$id}");
    
            if ($response->successful()) {
                $vendor = $response->json();
            //  dd($vendor);
                return view('editvendor', ['vendor' => $vendor]);
            } else {
                return view('api.error');
            }
        } catch (\Exception $e) {
            return view('api.error');
        }
    }

    public function updateVendor(Request $request, $email)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/User/EditVendorByEmailId", [ // Change to put
                'userID' => $request->input('userID'),
                'registerVendorUserId' => $request->input('registerVendorUserId'),
                'username' => $request->input('username'),
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'shopName' => $request->input('shopName'),
                'phoneNumber' => $request->input('phoneNumber'),
                'password' => $request->input('password'),
                'userRoles' => $request->input('userRoles')
            ]);

            // dd($response->json());
        if ($response->successful()) {

            return redirect('/allvendor')->with('success', 'Vendor updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update user');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating user');
    }
}

public function DeleteVendor($id)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/User/DeleteVendorByID?UserId={$id}");

            // dd($response->json());
        if ($response->successful()) {
            return redirect()->back()->with('success', 'Vendor deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete vendor');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting vendor');
    }
}


public function getallStore(Request $request){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Store/GetAllStore');

        if ($response->successful()) {
            $stores = $response->json();
            $totalStores = count($stores);

            $search = $request->input('search');
            if ($search) {
                $stores = array_filter($stores, function ($store) use ($search) {
                    return stripos($store['street'], $search) !== false ||
                         stripos($store['street2'], $search) !== false ||
                           stripos($store['storeName'], $search) !== false ||
                           stripos($store['phoneNumber'], $search) !== false ||
                           stripos($store['city'], $search) !== false ||
                           stripos($store['state'], $search) !== false;
                });
            }
            // 
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $itemCollection = collect($stores);
            $perPage = 10;
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
            $paginatedItems->setPath($request->url());


            // 
            // dd($stores);
            $username = session('username');
            // Iterate over each user and access the username
           return view('allstore', ['stores' => $paginatedItems], compact('username'));
        } else {
            return view('api.error');
        }

        return view('allstore', ['users' => $users, 'stores' => $paginatedItems, 'totalStores' => $totalStores], compact('username'));
    } catch (RequestException $e) {
        return view('api.error');
    }
    
}

public function viewStore($id)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Store/GetStoreSetupById?StoreId={$id}");

        if ($response->successful()) {
            $storeData = $response->json();
            // dd($storeData);
            return view('store', ['store' => $storeData]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}

public function deleteStoreById($id)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->delete("https://crowdrobapi.tech/api/Store/DeleteStoreSetupById?StoreId={$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Store deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete store');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting store');
    }
}

public function editProduct($id)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Product/GetProductById?ProductId={$id}");

            // dd($response->json());
        if ($response->successful()) {
            $productData = $response->json();
            return view('updateproduct', ['product' => $productData]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}

public function updateProduct(Request $request, $id)
{
    try {
        // Validate the request inputs
        $request->validate([
            'prodectTitle' => 'required|string|max:255',
            'productPrice' => 'required|numeric',
            'productShortDescription' => 'required|string',
            'productDescription' => 'required|string',
            'categoryId' => 'required|integer',
            'prodectImage' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodectImage1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodectImage2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodectImage3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodectImage4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodectImage5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodectImage6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'prodectImage7' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Prepare data for product update
        $data = [
            'productId' => $id,
            'prodectTitle' => $request->input('prodectTitle', ''),
            'productVM' => $request->input('productVM', ''),
            'productPrice' => $request->input('productPrice', ''),
            'productShortDescription' => $request->input('productShortDescription', ''),
            'productDescription' => $request->input('productDescription', ''),
            'productSKU' => $request->input('productSKU', ''),
            'subCategory' => $request->input('subCategory', ''),
            'vendorSubCategory' => $request->input('vendorSubCategory', ''),
            'productInStock' => $request->has('productInStock') ? 'true' : 'false',
            'categoryId' => (int) $request->input('categoryId', 0),
            'productBrands' => $request->input('productBrands', ''),
        ];

        // Handle image uploads
        $imageFields = [
            'prodectImage', 'prodectImage1', 'prodectImage2',
            'prodectImage3', 'prodectImage4', 'prodectImage5',
            'prodectImage6', 'prodectImage7'
        ];

        // foreach ($imageFields as $imageField) {
        //     if ($request->hasFile($imageField)) {
        //         $imageContent = base64_encode(file_get_contents($request->file($imageField)->getRealPath()));
        //         $imageData = 'data:image/jpeg;base64,' . $imageContent;
        //         $data[$imageField] = $imageData;
        //     } else {
        //         $data[$imageField] = $request->input("current$imageField", '');
        //     }
        // }
        foreach ($imageFields as $imageField) {
            if ($request->hasFile($imageField)) {
                // Process the file upload
                $imageContent = base64_encode(file_get_contents($request->file($imageField)->getRealPath()));
                // $imageData = 'data:image/jpeg;base64,' . $imageContent;
                $imageData =  $imageContent;
                $data[$imageField] = $imageData;

            } elseif ($request->filled("current$imageField")) {
                // Use the current image data if no new image is uploaded
                $data[$imageField] = $request->input("current$imageField");
            } else {
                // Ensure the field is set to an empty string or null if necessary
                $data[$imageField] = ''; // or null depending on your API requirements
            }
        }


        //  dd($data);

        // Send request to update product with both details and images
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/Product/UpdateProductById", $data);

            //  dd($response->json());

        if ($response->successful()) {
            return redirect('allproducts')->with('success', 'Product updated successfully');
        } else {
            Log::error('API request failed: ' . $response->status() . ' - ' . $response->body());
            return redirect()->back()->with('error', 'Failed to update product');
        }
    } catch (\Exception $e) {
        Log::error('Exception occurred: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Error updating product');
    }
}



    public function getByCategorieId(){
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/Category/Category/GetAllCategory');
    
            if ($response->successful()) {
                $products = $response->json();
                // dd($products);
                $username = session('username');
                // Iterate over each user and access the username
               return view('updatepricebycategories', ['products' => $products], compact('username'));
            } else {
                return view('api.error');
            }
    
            return view('updatepricebycategories', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
        } catch (RequestException $e) {
            return view('api.error');
        }
    }


    public function getallproductprice(){
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');
    
            if ($response->successful()) {
                $products = $response->json();
                $totalProducts = count($products);
                // dd($products);
                $username = session('username');
                // Iterate over each user and access the username
               return view('updateproductprice', ['products' => $products], compact('username'));
            } else {
                return view('api.error');
            }
    
            return view('updateproductprice', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
        } catch (RequestException $e) {
            return view('api.error');
        }
    }
 

    public function viewMrp($id){
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/Product/GetProductById?productId={$id}");
    
            if ($response->successful()) {
                $productData = $response->json();
            //  dd($productData);
                return view('mrpdetails', ['product' => $productData]);
            } else {
                return view('api.error');
            }
        } catch (\Exception $e) {
            return view('api.error');
        }
    }
    
    public function viewMrpByCat($id){
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/Product/getallproductbycategoryId?categoryId={$id}");
    
            if ($response->successful()) {
                $productData = $response->json();
        // dd($productData);
        return view('mrpdetailsbycat', ['products' => $productData]);
            } else {
                return view('api.error');
            }
        } catch (\Exception $e) {
            return view('api.error');
        }
    }


    public function updateProductPrice(Request $request, $id)
    {
        try {
            $price = $request->input('price');
    
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->put("https://crowdrobapi.tech/api/Product/UpdateProductMPRPriceByProductId?ProductId={$id}&price={$price}");
    
            if ($response->successful()) {
                return redirect()->to('/updatemrp')->with('toast_success', 'Product price updated successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to update product price');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating product price');
        }
    }
    
    public function updtaePriceBycategorie(Request $request, $id)
    {
        try {
            $price = $request->input('price');
    
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->put("https://crowdrobapi.tech//api/Product/UpdateAllProductMPRPriceByCategoryId?CategoryId={$id}&price={$price}");
    
            if ($response->successful()) {
                return redirect()->to('/updatemrpbycat')->with('toast_success', 'Product price updated successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to update product price');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating product price');
        }
    }
    


public function getallusers(Request $request)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/User/GetAllUser');

        if ($response->successful()) {
            $users = $response->json();

            // Ensure the users array is not empty
            if (!empty($users)) {
                // Sort users by registration time in descending order
                usort($users, function ($a, $b) {
                    $aCreatedAt = isset($a['createdAt']) ? strtotime($a['createdAt']) : 0;
                    $bCreatedAt = isset($b['createdAt']) ? strtotime($b['createdAt']) : 0;

                    // Log the createdAt values for debugging
                    Log::debug("Sorting Users", ['aCreatedAt' => $aCreatedAt, 'bCreatedAt' => $bCreatedAt]);

                    return $bCreatedAt - $aCreatedAt;
                });
            }

            // Get the search query
            $search = $request->input('search');

            // Filter users if a search query is provided
            if ($search) {
                $users = array_filter($users, function ($user) use ($search) {
                    return stripos($user['username'], $search) !== false ||
                           stripos($user['firstName'], $search) !== false ||
                           stripos($user['lastName'], $search) !== false ||
                           stripos($user['email'], $search) !== false ||
                           stripos($user['phoneNumber'], $search) !== false;
                });
            }

            // Pagination
            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $itemCollection = collect($users);
            $perPage = 10;
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
            $paginatedItems->setPath($request->url());

            // View
            $username = session('username');
            return view('allusers', ['users' => $paginatedItems], compact('username'));
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}




public function getUserByEmail($email){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/User/GetUserById?Email={$email}");

        if ($response->successful()) {
            $user = $response->json();
            // dd($user);
            return view('edituser', ['user' => $user]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}

public function ViewUserByEmail($email){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/User/GetUserById?Email={$email}");

        if ($response->successful()) {
            $user = $response->json();
            // dd($user);
            return view('viewuser', ['user' => $user]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}


public function update(Request $request, $email)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/User/EditUserByEmail", [ // Change to put
                'userID' => $request->input('userID'),
                'username' => $request->input('username'),
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'phoneNumber' => $request->input('phoneNumber'),
                'password' => $request->input('password'),
                'userRoles' => $request->input('userRoles')
            ]);

            // dd($response->json());
        if ($response->successful()) {

            return redirect('/allusers')->with('success', 'User updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update user');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating user');
    }
}






    public function getallproducts()
    {
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');

            if ($response->successful()) {
                $products = $response->json();
                $totalProducts = count($products);
              
            } else {
                return view('api.error');
            }
           
            return view('allproducts', ['products' => $products, 'totalProducts' => $totalProducts]);
        } catch (RequestException $e) {
            return view('api.error');
        }
}


public function viewvendor($id)
{
    $vendor = [];
    $store = [];
    $product = [];
    $cancelapproval = [];

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/User/GetVendorById?registerVendorUserId={$id}");

        if ($response->successful()) {
            $vendor = $response->json();
        } else {
            return view('Please Register as a vendor first');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }

    try {
        $response2 = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Store/GetStoreByVendorId?VendorId={$id}");

        if ($response2->successful()) {
            $store = $response2->json();
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }

    try {
        // Get Cancel Approval Products
        $response4 = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Product/GetAllNotApprovedProductByVendorId?VendorId={$id}");
            if ( isset($response4['title'])) {
                $cancelapproval = $response4->json();
                //   dd($product);
            }else if ($response4->successful())
            {
                $cancelapproval = $response4->json();
                // dd($product);
            }
    } catch (\Exception $e) {
        // Handle exception
        return view('api.error', ['error' => $e->getMessage()]);
    }

    try {
        $response3 = Http::withoptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Product/GetProductByVendorId?VendorId={$id}");
            $product = $response3->json();
        if ( isset($response3['title'])) {
            $product = $response3->json();
            //   dd($product);
        }else if ($response3->successful())
        {
            $product = $response3->json();
            // dd($product);
        }
        
        else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }

    return view('vendordetails', [
        'vendor' => $vendor,
        'store' => $store,
        'product' => $product,
        'cancelapproval' => $cancelapproval
    ]);
}
   
    // }

    public function getallvendors()
    {
        try {
            // Get vendors data
            $vendorsResponse = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/User/GetAllVendor');
    
                //  dd($vendorsResponse->json());
            if ($vendorsResponse->successful()) {
                $vendores = $vendorsResponse->json();
                $totalVendors = count($vendores);
            } else {
                // Handle API error for vendors
                return view('api.error');
            }
    
            // Get products data
            $productsResponse = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');

                
    
            if ($productsResponse->successful()) {
                $products = $productsResponse->json();
                $totalProducts = count($products);
            } else {
                // Handle API error for products
                return view('api.error');
            }

           // Get all users
$usersresponse = Http::withOptions(['verify' => base_path('cacert.pem')])
->get('https://crowdrobapi.tech/api/User/User/GetAllUser');

if ($usersresponse->successful()) {
$users = $usersresponse->json();
$totalUsers = count($users);

// Iterate over each user and access the username
foreach ($users as $user) {
    $username = $user['username']; // Access the username of the current user
    //dd($username); // Dump the username for debugging
}



} else {
return view('api.error');
}

// GETALLSTORE
$response = Http::withOptions(['verify' => base_path('cacert.pem')])
->get('https://crowdrobapi.tech/api/Store/GetAllStore');

if ($response->successful()) {
$stores = $response->json();
$totalStores = count($stores);
// dd($stores);
//$username = session('username');
// Iterate over each user and access the username

} else {
return view('api.error');
}


    // Access the username from the session
    $username = session('username');
    // Pass the username to the dashboard view
  

    
            // Return the dashboard view with all necessary data
            return view('dashboard', [
                'vendores' => $vendores,
                'totalVendors' => $totalVendors,
                'totalProducts' => $totalProducts,
                'totalUsers' => $totalUsers,
                'users' => $users,
                'username' => $username,
                'totalStores' => $totalStores
            ], compact('username'));
        } catch (RequestException $e) {
            // Handle other exceptions
            return view('api.error');
        }
    }

    
    public function getAllProductData(Request $request)

    {

            try {
                $searchQuery = $request->input('search'); // Get the search query
        
                if ($searchQuery) {
                    // Call the search API with the search query
                    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                        ->get('https://crowdrobapi.tech/api/Product/SearchProduct', [
                            'Product' => $searchQuery
                        ]);
                } else {
                    // Call the API to get all products if no search query is present
                    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                        ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');
                }
        
                if ($response->successful()) {
                    $products = $response->json();
                    $allproducts = count($products);
                    $username = session('username');
                    // Pagination setup
                    $currentPage = LengthAwarePaginator::resolveCurrentPage();
                    $itemCollection = collect($products);
                    $perPage = 10;
                    $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
                    $paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);
                    $paginatedItems->setPath($request->url());
        
                    return view('allproducts', ['products' => $paginatedItems, 'allproducts' => $allproducts], compact('username'));
                } else {
                    return view('api.error')->withErrors('Failed to fetch products.');
                }
            } catch (\Exception $e) {
                return view('api.error')->withErrors('An error occurred: ' . $e->getMessage());
            }
    }

//  public function getAllProductData(Request $request)
// {
//     // Get filter parameters from the request
//     $catid = $request->input('catid');
//     $brandid = $request->input('brandid');
//     $subcatid = $request->input('subcatid');

//     // Initialize variable to store products
//     $products = [];

//     // Fetch products based on filter parameters
//     if ($catid != null) {
//         $response = Http::withOptions(['verify' => base_path('cacert.pem')])
//             ->get("https://crowdrobapi.tech/api/Product/getallproductbycategoryId?categoryId={$catid}");

//         if ($response->successful()) {
//             $products = $response->json();
//         }
//     } elseif ($brandid != null) {
//         $response = Http::withOptions(['verify' => base_path('cacert.pem')])
//             ->get("https://crowdrobapi.tech/api/Product/getallproductbyBrandId?ProductBrandsId={$brandid}");

//         if ($response->successful()) {
//             $products = $response->json();
//         }
//     } elseif ($subcatid != null) {
//         $response = Http::withOptions(['verify' => base_path('cacert.pem')])
//             ->get("https://crowdrobapi.tech/api/Product/getallproductbySubcategoryId?SubCategoryId={$subcatid}");

//         if ($response->successful()) {
//             $products = $response->json();
//         }
//     } else {
//         // Fetch all products
//         $response = Http::withOptions(['verify' => base_path('cacert.pem')])
//             ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');

//         if ($response->successful()) {
//             $products = $response->json();
//         }
//     }

//     // Fetch other data needed for the view
//     $response2 = Http::withOptions(['verify' => base_path('cacert.pem')])
//         ->get('https://crowdrobapi.tech/api/Category/Category/GetAllCategory');

//     $response3 = Http::withOptions(['verify' => base_path('cacert.pem')])
//         ->get('https://crowdrobapi.tech/api/Brand/GetAllBrand');

//     $response4 = Http::withOptions(['verify' => base_path('cacert.pem')])
//         ->get('https://crowdrobapi.tech/api/SubCategory/GetAllSubCategory');

//     // Check if all requests are successful before rendering the view
//     if ($response->successful() && $response2->successful() && $response3->successful() && $response4->successful()) {
//         $allproducts = count($products);
//         $username = session('username');
//         $categories = $response2->json();
//         $brands = $response3->json();
//         $subcategories = $response4->json();

//         return view('allproducts', [
//             'products' => $products,
//             'allproducts' => $allproducts,
//             'categories' => $categories,
//             'brands' => $brands,
//             'subcategories' => $subcategories,
//             'username' => $username,
//         ]);
//     } else {
//         return view('api.error');
//     }
// }




    public function viewProduct($id){
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/Product/GetProductById?productId={$id}");
    
            if ($response->successful()) {
                $productData = $response->json();
                //    dd($productData);
                return view('productdetails', ['product' => $productData]);
            } else {
                return view('api.error');
            }
        } catch (\Exception $e) {
            return view('api.error');
        }
    }

public function deleteProductById($id){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->delete("https://crowdrobapi.tech/api/Product/DeleteProductById?productId={$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Product deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete product');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting product');
    }
}


    public function addNewBrand(Request $request)
    {
        try {
            $data = [
                'productBrandsName' => $request->input('productBrandsName'),
                'isActiveProductBrands' => $request->has('isActiveProductBrands') ? true : false
            ];

            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->post('https://crowdrobapi.tech/api/Brand/AddNewBrand', $data);

            if ($response->successful()) {
                return $response->json();
            } else {
                return view('api.error');
            }
        } catch (RequestException $e) {
            return view('api.error');
        }
    }
    // public function editBrand($id)
    // {
    //     try {
    //         $response = Http::get(`https://crowdrobapi.tech/api/Brand/GetBrandById?ProductBrandsId=${1}`);
    //         $response = file_get_contents($url);

    //         // Output the response
    //         echo $response;
    //         if ($response->successful()) {
    //             $brandData = $response->json();
    //             return view('api.edit', ['brand' => $brandData]);
    //         } else {
    //             return view('api.error');
    //         }
    //     } catch (\Exception $e) {
    //         return view('api.error');
    //     }
    // }

    public function editBrand($id)
{
    try {
       
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Brand/GetBrandById?ProductBrandsId={$id}");
           
        if ($response->successful()) {
            $brandData = $response->json();
            return view('api.edit', ['brand' => $brandData]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}




// public function updateBrand(Request $request, $id)
// {
//     try {
//         $data = $request->all();
//         $response = Http::withOptions(['verify' => 'C:\Users\SS\Downloads\cacert.pem'])
//             ->put('https://crowdrobapi.tech/api/Brand/UpdateBrandByIdProductBrandsId={$id}');

//         if ($response->successful()) {
//             return redirect()->back()->with('success', 'Data updated successfully');
//         } else {
//             return redirect()->back()->with('error', 'Failed to update data');
//         }
//     } catch (\Exception $e) {
//         return redirect()->back()->with('error', 'Error updating data');
//     }
// }


public function updateBrand(Request $request, $id)
{
    try {
        $data = [

            'productId' => $id,
            'prodectTitle' => $request->input('prodectTitle'),
            'prodectImage' => $request->input('prodectImage'),
            'prodectImage1' => $request->input('prodectImage1'),
            'prodectImage2' => $request->input('prodectImage2'),
            'productPrice' => $request->input('productPrice'),
            'productShortDescription' => $request->input('productShortDescription'),
            'productDescription' => $request->input('productDescription'),
            'productInStock' => $request->input('productInStock'),
            'productSKU' => $request->input('productSKU'),
            'categoryId' => $request->input('categoryId'),
            'subCategory' => $request->input('subCategory'),
            'productBrands' => $request->input('productBrands'),
            'registerVendorUserId' => $request->input('registerVendorUserId')
        ];

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/Product/UpdateProductById?ProductId={$id}", $data);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Product updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update product');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating product');
    }
}
public function deleteBrandById($id)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->delete("https://crowdrobapi.tech/api/Brand/DeleteBrandById?ProductBrandsId={$id}");

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Brand deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to delete brand');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting brand');
    }
}

public function getAllUserData()
{
    try {
        // Get all users
        $usersresponse = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/User/GetAllUser');

        if ($usersresponse->successful()) {
            $users = $usersresponse->json();
            $totalUsers = count($users);

            // Initialize an empty array to store usernames
            $usernames = [];

            // Iterate over each user and access the username
            foreach ($users as $user) {
                $username = $user['username']; // Access the username of the current user
                $usernames[] = $username; // Add username to the array
            }

            // Return the dashboard view with all necessary data
            return view('dashboardlayout', [
                'usernames' => $usernames // Pass the array of usernames to the view
            ]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}
// 

public function updatePriceByCategoryId(Request $request, $categoryId)
{
    $price = $request->price;
    $url = "https://crowdrobapi.tech/api/Product/UpdateAllProductMPRPriceByCategoryId?CategoryId=$categoryId&price=$price";

    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->put($url);

    if ($response->successful()) {
        return redirect('/allproducts')->with('toast_success', 'Price updated successfully');
    } else {
        return view('api.error');
    }
}

public function showUpdateForm($categoryId)
{
    return view('updatepriceform', ['categoryId' => $categoryId]);
}



// SubCategory Add
public function getAllCategory(){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Category/Category/GetAllCategory');

        if ($response->successful()) {
            $products = $response->json();
            //  dd($products);
         
            // Iterate over each user and access the username
           return view('add_subcategory', ['products' => $products]);
            return view('api.error');
        }

        return view('updatepricebycategories', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
    } catch (RequestException $e) {
        return view('api.error');
    }
}


// addcareousel


// public function getAllCategoryforcaraousel(){
//     try {
//         $response = Http::withOptions(['verify' => base_path('cacert.pem')])
//             ->get('https://crowdrobapi.tech/api/Category/Category/GetAllCategory');

//         if ($response->successful()) {
//             $products = $response->json();
//             //  dd($products);
         
//             // Iterate over each user and access the username
//            return view('add_caraosel', ['products' => $products]);
//             return view('api.error');
//         }

//         return view('updatepricebycategories', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
//     } catch (RequestException $e) {
//         return view('api.error');
//     }
// }

// GetCareousel

 public function GetCaraousel(){

    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get('https://crowdrobapi.tech/api/HomeSetting/GetHomeCarousel');

        if($response->successful()){
            $data = $response->json();
            $username = session('username');
            // dd($data);
            return view('caraousel', ['data' => $data], compact('username'));
        }

    }catch(\Exception $e){
        return view('api.error');
    }

 }




//  

public function AdsHomeads(){

    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get('https://crowdrobapi.tech//api/HomeSetting/GetHomeAds');

        if($response->successful()){
            $data = $response->json();
            $username = session('username');
            // dd($data);
            return view('adshome', ['data' => $data], compact('username'));
        }

    }catch(\Exception $e){
        return view('api.error');
    }

 }


//  DeleteCaraousel

public function deleteCaraousel($id){

try{

$response = Http::withOptions(['verify' => base_path('cacert.pem')])
->delete("https://crowdrobapi.tech/api/HomeSetting/DeleteHomeCarousel?homeCarouselID={$id}");

if($response->successful()){
    return redirect('/caraousel')->with('success', 'Caraousel Deleted successfully');
}
}catch(\Exception $e){
    return view('api.error');
}
}


// DeleteHomeAds


public function deletehomeads($id){

    try{
    
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
    ->delete("https://crowdrobapi.tech/api/HomeSetting/DeleteHomeAds?homeAdsID={$id}");
    
    if($response->successful()){
        return redirect('/homeads')->with('success', 'Caraousel Deleted successfully');
    }
    }catch(\Exception $e){
        return view('api.error');
    }
    }
    




// GetSuCategory

public function getsubCategory(){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/SubCategory/GetAllSubCategory');

        if ($response->successful()) {
            $products = $response->json();
            //  dd($products);
            $username = session('username');
            // Iterate over each user and access the username
           return view('subcategory', ['products' => $products], compact('username'));
        } else {
            return view('api.error');
        }

        return view('subcategory', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
    } catch (RequestException $e) {
        return view('api.error');
    }
}



public function addSubcategory(Request $request)
{
    $validatedData = $request->validate([
        // 'subCategoryId' => 'required|integer',
        'subCategoryName' => 'required|string',
        'categoryId' => 'required|integer',
    ]);

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->post("https://crowdrobapi.tech/api/SubCategory/AddSubCategory", [
            // 'subCategoryId' => $validatedData['subCategoryId'],
            'subCategoryName' => $validatedData['subCategoryName'],
            'categoryId' => $validatedData['categoryId'],
        ]);

        // dd($response->json());
        if ($response->successful()) {
            return redirect('/subcategory')->with('success', 'Subcategory Added successfully');
           
        } else {
            return back()->with('error', 'Failed to add subcategory. Please try again.');
        }
    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred. Please try again later.');
    }
}


// AddProduct


public function getCategoryforadd(){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Category/Category/GetAllCategory');

            $response2 = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/SubCategory/GetAllSubCategory');

            $subactegory = $response2->json();

        if ($response->successful()) {
            $products = $response->json();
        //    dd($products);
           return view('add_product', ['products' => $products, 'subactegory' => $subactegory]);
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}


public function addProduct(Request $request)
{
    try {
        // Validate request data
        $validatedData = $request->validate([
            'prodectTitle' => 'required|string',
            'prodectImage' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'prodectImage1' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'prodectImage2' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ProdectImage3' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ProdectImage4' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ProdectImage5' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ProdectImage6' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'ProdectImage7' => 'nullable|file|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'productPrice' => 'required|string',
            'productShortDescription' => 'nullable|string',
            'productDescription' => 'required|string',
            'productSKU' => 'nullable|string',
          'productInStock' => 'required|boolean', // Updated to boolean
            'categoryId' => 'required|integer', // Updated to integer
            'subCategory' => 'nullable|string',
            'vendorSubCategory' => 'nullable|string',
            'productBrands' => 'required|string',
            'registerVendorUserId' => 'required|integer', // Updated to integer
        ]);

        // Process image uploads
        $imageFields = ['prodectImage', 'prodectImage1', 'prodectImage2', 'ProdectImage3', 'ProdectImage4', 'ProdectImage5', 'ProdectImage6', 'ProdectImage7'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $imageData = base64_encode(file_get_contents($file));
                // $validatedData[$field] = 'data:image/png;base64,' . $imageData;
                $validatedData[$field] = $imageData;
            }
        }

        $categoryId = (int)$validatedData['categoryId'];
        $registerVendorUserId = (int)$validatedData['registerVendorUserId'];
        Log::info('registerVendorUserId:', ['registerVendorUserId' => $registerVendorUserId]);
        // Prepare the data array to be sent in the API request
        $postData = [
            'productId' => 0,
            'prodectTitle' => $validatedData['prodectTitle'],
            'prodectImage' => $validatedData['prodectImage'] ?? '',
            'prodectImage1' => $validatedData['prodectImage1'] ?? '',
            'prodectImage2' => $validatedData['prodectImage2'] ?? '',
            'ProdectImage3' => $validatedData['ProdectImage3'] ?? '',
            'ProdectImage4' => $validatedData['ProdectImage4'] ?? '',
            'ProdectImage5' => $validatedData['ProdectImage5'] ?? '',
            'ProdectImage6' => $validatedData['ProdectImage6'] ?? '',
            'ProdectImage7' => $validatedData['ProdectImage7'] ?? '',
            'productPrice' => $validatedData['productPrice'],
            'productShortDescription' => $validatedData['productShortDescription'] ?? '',
            'productDescription' => $validatedData['productDescription'],
            'productSKU' => $validatedData['productSKU'] ?? '',
            'subCategory' => $validatedData['subCategory'] ?? '',
            'vendorSubCategory' => $validatedData['vendorSubCategory'] ?? '',
           'productInStock' => $request->input('productInStock') === '1' ? true : false,
            // 'categoryId' => $validatedData['categoryId'],
            'categoryId' => $categoryId, 
          
          
            'productBrands' => $validatedData['productBrands'],
           
            'productColor' => 'No Color',
            'registerVendorUserId' => $registerVendorUserId, 
        ];

        //  dd(  $postData);
        // Perform API request
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post('https://crowdrobapi.tech/api/Product/AddProduct', $postData);

        // Check response from API
        //  dd($response->json());

        if ($response->successful()) {
            return redirect('allproducts')->with('success', 'Product added successfully');
        } else {
            // Log the response for debugging
            Log::error('API request failed: ' . $response->status() . ' - ' . $response->body());
            return redirect()->back()->with('error', 'Failed to add product. Please try again.');
        }
    } catch (\Exception $e) {
        // Exception occurred
        Log::error('Exception occurred: ' . $e->getMessage());
        return redirect()->back()->with('error', 'An error occurred while adding the product.');
    }
}






// Store Add
public function addStore(Request $request)
{
    $validatedData = $request->validate([
        // 'storeId' => 'required|string',
        'registerVendorUserId' => 'required|string',
        'storeName' => 'required|string',
        'street' => 'required|string',
        'street2' => 'nullable|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'country' => 'required|string',
        'postalCode' => 'required|string',
        'storeEmailAddress' => 'required|email',
    ]);

    try {
        $response = $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->post('https://crowdrobapi.tech/api/Store/AddNewStore', [
            // 'storeId' => $validatedData['storeId'],
            'registerVendorUserId' => $validatedData['registerVendorUserId'],
            'storeName' => $validatedData['storeName'],
            'street' => $validatedData['street'],
            'street2' => $validatedData['street2'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'country' => $validatedData['country'],
            'postalCode' => $validatedData['postalCode'],
            'storeEmailAddress' => $validatedData['storeEmailAddress'],
        ]);
       
        
        if ($response->successful()) {
            // dd($response->json());
            // Store added successfully
            // ->with('success', 'Store added successfully');
            
            return redirect('/allstore');
        } else {
            // API request failed
            return redirect()->back()->with('error', 'Failed to add store. Please try again.');
        }
    } catch (\Exception $e) {
        // Exception occurred
        return redirect()->back()->with('error', 'An error occurred while adding the store.');
    }
}



// Enquiry Form

public function submitForm(Request $request)
{
    $response = $response = Http::withOptions(['verify' => base_path('cacert.pem')])
    ->post('https://crowdrobapi.tech/api/User/FormInquery', [
        'name' => $request->input('name'),
        'emailID' => $request->input('emailID'),
        'mobileNo' => $request->input('mobileNo'),
        'messages' => $request->input('messages'),
        'location' => $request->input('location'),
    ]);

    // dd($response->json());
    // Handle the response from the API
    if ($response->successful()) {
        return redirect('/')->with('success', 'Form submitted successfully');

        // Redirect or show a success message
    } else {
        return redirect()->back()->with('error', 'Failed to submit form');
    }
}




// 


public function exportInquiryDetailsToExcel()
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/GetFormInqueries');

        if ($response->successful()) {
            $enquiry = $response->json();

            // Validate and clean data
            foreach ($enquiry as &$item) {
                $item['name'] = $item['name'] ?? '';
                $item['emailID'] = $item['emailID'] ?? '';
                $item['mobileNo'] = $item['mobileNo'] ?? '';
                $item['location'] = $item['location'] ?? '';
                $item['dateTime'] = isset($item['dateTime']) ? date('Y-m-d H:i:s', strtotime($item['dateTime'])) : '';
                $item['messages'] = $item['messages'] ?? '';
            }

            // Create a new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set the header row
            $headers = ['Name', 'Email', 'Mobile No', 'Location', 'Date', 'Message'];
            $columnIndex = 'A';

            foreach ($headers as $header) {
                $sheet->setCellValue($columnIndex . '1', $header);
                $sheet->getColumnDimension($columnIndex)->setAutoSize(true); // Auto-size columns
                $columnIndex++;
            }

            // Populate the data
            $rowNumber = 2;
            foreach ($enquiry as $item) {
                $sheet->setCellValue('A' . $rowNumber, $item['name']);
                $sheet->setCellValue('B' . $rowNumber, $item['emailID']);
                $sheet->setCellValue('C' . $rowNumber, $item['mobileNo']);
                $sheet->setCellValue('D' . $rowNumber, $item['location']);
                $sheet->setCellValue('E' . $rowNumber, $item['dateTime']);
                $sheet->setCellValue('F' . $rowNumber, $item['messages']);
                $rowNumber++;
            }

            // Write the spreadsheet to a file
            $writer = new Xlsx($spreadsheet);
            $fileName = 'inquiry_details.xlsx';
            $filePath = storage_path('app/public/' . $fileName);
            $writer->save($filePath);

            // Clear memory
            $spreadsheet->disconnectWorksheets();
            unset($spreadsheet);

            return response()->download($filePath)->deleteFileAfterSend(true);
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    } catch (\Exception $e) {
        return view('api.error')->with('message', $e->getMessage());
    }
}

// 

public function getinquirydetails(Request $request){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/GetFormInqueries');

        if ($response->successful()) {
          
            $enquiry = $response->json();
           $totalItems = count($enquiry);
        //  dd($enquiry);

        $search = $request->input('search');

        if ($search) {
            $enquiry = array_filter($enquiry, function ($enquiry) use ($search) {
                return stripos($enquiry['name'], $search) !== false ||
                     stripos($enquiry['emailID'], $search) !== false ||
                       stripos($enquiry['mobileNo'], $search) !== false ||
                       stripos($enquiry['location'], $search) !== false;
                     
            });
        }
        
// Get current page form url e.g. &page=1
$currentPage = LengthAwarePaginator::resolveCurrentPage();

// Create a new Laravel collection from the array data
$itemCollection = collect($enquiry);

// Define how many items we want to be visible in each page
$perPage = 10;

// Slice the collection to get the items to display in current page
$currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

// Create our paginator and pass it to the view
$paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

// set url path for generated links
$paginatedItems->setPath($request->url());
// dd($paginatedItems);
        $username = session('username');
           return view('enquirydetails', ['enquiry' => $paginatedItems] ,compact('username'));
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}


// Laounch Setting

public function getLaunchSetting()
{
    // Call your API to get the launch setting
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get('https://crowdrobapi.tech/api/LaunchSetting/GetLaunchSetting');
    
    if ($response->successful()) {
        $launchSetting = $response->json();
        return view('launch-setting', compact('launchSetting'));
    } else {
        // Handle error appropriately
        return redirect()->route('launch-setting.show')->with('error', 'Failed to fetch launch setting');
    }
}



//     public function updateLaunchSetting(Request $request)
// {
//     // Check if the checkbox is set in the request
//     $launchSetting = $request->has('launchSetting') ? 'true' : 'false';

//     // Call your API to update the launch setting
//     $response = Http::withOptions(['verify' => base_path('cacert.pem')])
//     ->put('https://crowdrobapi.tech/api/LaunchSetting/updateLaunchSetting/?launchSetting=' . $launchSetting);

//     return redirect('/launch-setting')->with('success', 'Launch setting updated successfully');
// }

public function updateLaunchSetting(Request $request)
{
    // Check if the checkbox is set in the request
    $launchSettingTemp = $request->has('launchSetting') ? true : false;

    // Initialize the adsImage variable
    $adsImage = '';

    // Check if a new image is uploaded
    if ($request->hasFile('adsimage')) {
        $file = $request->file('adsimage');
        $imageData = base64_encode(file_get_contents($file));
        $adsImage = $imageData;
    } else {
        // Use the existing image URL from the request
        $currentAdsImage = $request->input('currentAdsImage', '');

        // Check if the currentAdsImage is a URL and convert it to Base64
        if (filter_var($currentAdsImage, FILTER_VALIDATE_URL)) {
            $imageData = file_get_contents($currentAdsImage);
            $adsImage = base64_encode($imageData);
        } else {
            // If it's already Base64, use it as is
            $adsImage = $currentAdsImage;
        }
    }

    \Log::debug('Ads Image:', ['adsImage' => $adsImage]);

    // Get the additional fields from the request
    $adsUrl = $request->input('adsUrl', '');
    $adsDescription = $request->input('description', '');

    // Prepare the payload for the API request
    $payload = [
        'launchSettingTemp' => $launchSettingTemp,
        'adsImage' => $adsImage,
        'adsUrl' => $adsUrl ?: null, // Handle empty strings
        'adsDescription' => $adsDescription ?: null, // Handle empty strings
    ];

    \Log::debug('Payload:', $payload);

    // Call your API to update the launch setting
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->withHeaders(['Content-Type' => 'application/json'])
        ->put('https://crowdrobapi.tech/api/LaunchSetting/UpdateLaunchSetting', $payload);

    \Log::debug('API Response:', ['response' => $response->json(), 'status' => $response->status(), 'body' => $response->body()]);

    // Check the response and handle accordingly
    if ($response->successful()) {
        return redirect('/dashboard')->with('success', 'Launch setting updated successfully');
    } else {
        // Log the error response
        \Log::error('API Update Error:', ['status' => $response->status(), 'body' => $response->body()]);
        return redirect()->route('launch-setting.show')->with('error', 'Failed to update launch setting');
    }
}








// RESETPASSWORD FORM

public function resetyourpassword(Request $request)
{

//    dd($request->all());

$password = $request->input('password');
$ConfirmPassword = $request->input('ConfirmPassword');

if($password != $ConfirmPassword){
    return redirect()->back()->with('error', 'Password does not match');
}
   
  $response = Http::withOptions(['verify' => base_path('cacert.pem')])
  ->post('https://crowdrobapi.tech/api/User/ResetPassword', [
      'email' => $request->input('email'),
      'token' => $request->input('token'), // Changed from '_token' to 'token'
      'password' => $request->input('password'),
      'ConfirmPassword' => $request->input('ConfirmPassword'),
  ]);

 
    //    dd($response->json());
    if ($response->successful()) {
        return redirect('/')->with('success', 'Password reset  successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to send password reset link');
    }

}


public function showResetPasswordForm(Request $request)
{
   
    $data = [
        'token' =>  $request->query('token'),
        'email' => $request->input('email'),
       
      
    ];

    return view('resetpassword', ['data' => $data]);


}

public function getproductforDiscount(){

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');

        if ($response->successful()) {
            $products = $response->json();
            $totalProducts = count($products);
            // dd($products);
            $username = session('username');
            // Iterate over each user and access the username
           return view('updatediscountprice', ['products' => $products], compact('username'));
        } else {
            return view('api.error');
        }

        // return view('updateproductprice', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
    } catch (RequestException $e) {
        return view('api.error');
    }

}


public function updateproductdiscountprice($id){

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Product/GetProductById?productId={$id}");

        if ($response->successful()) {
            $productData = $response->json();
        //  dd($productData);
            return view('updateproductdiscountprice', ['product' => $productData]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}

public function updateDiscountProductPrice(Request $request, $id)
{
    try {
        $productDiscount = $request->input('productDiscount');
// dd($productDiscount);
        // Ensure productDiscount is a valid number
        if (!is_numeric($productDiscount)) {
            return redirect()->back()->with('error', 'Invalid product discount value');
        }

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/Product/UpdateProductDiscountByProductId", [
                'productId' => $id,
                'productDiscount' => $productDiscount
            ]);

        if ($response->successful()) {
            return redirect()->to('/updateproductdiscount')->with('success', 'Product discount price updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update product price');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating product price');
    }
}



// UpdateAllProductDeals

public function UpdateAllProductDeals(Request $request){

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');

        if ($response->successful()) {
            $products = $response->json();
            $totalProducts = count($products);
             // 
             $search = $request->input('search');

             if ($search) {
                 $products = array_filter($products, function ($product) use ($search) {
                     return stripos($product['prodectTitle'], $search) !== false;
                          
                 });
             }

             // 
            // dd($products);
            $username = session('username');
            // Iterate over each user and access the username
           return view('UpdateAllProductDeals', ['products' => $products], compact('username'));
        } else {
            return view('api.error');
        }

        return view('updateproductprice', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
    } catch (RequestException $e) {
        return view('api.error');
    }

}

public function updateAllProductDealsById($id){

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Product/GetProductById?productId={$id}");

        //  dd($response->json());

        if ($response->successful()) {
            $productData = $response->json();
            //  dd($productData);
                return view('updateAllProductDealsById', ['product' => $productData]);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }
}


public function updateProductallDeals(Request $request, $id){
    try {
        // Prepare data for updating product deals
        $data = [
            'productId' => $id,
            'isTopDeal' => $request->input('isTopDeal') ? true : false,
            'istopTrending' => $request->input('istopTrending') ? true : false,
            'isTopFeatured' => $request->input('isTopFeatured') ? true : false,
            'isTopRated' => $request->input('isTopRated') ? true : false,
            'isTopSelling' => $request->input('isTopSelling') ? true : false,
            'isTopDeal_Home' => $request->input('isTopDeal_Home') ? true : false,
            'istopTrending_Home' => $request->input('istopTrending_Home') ? true : false,
            'isTopFeatured_Home' => $request->input('isTopFeatured_Home') ? true : false,
            'isTopRated_Home' => $request->input('isTopRated_Home') ? true : false,
            'isFestiveOffer_Home' => $request->input('isFestiveOffer_Home') ? true : false,
            'isDiscountOffer_Home' => $request->input('isDiscountOffer_Home') ? true : false
        ];

        // dd($data);
        // Make the API request to update the product deals
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->put('https://crowdrobapi.tech/api/Product/UpdateAllProductDeals', $data);

        if ($response->successful()) {
            return redirect('UpdateAllProductDeals')->with('success', 'Update AllProduct Deals successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update product');
        }
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while updating the product deals.', 'error' => $e->getMessage()], 500);
    }

}


// ExportData

public function exportAllUserDetailsToExcel()
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/User/GetAllUser');

        if ($response->successful()) {
            $users = $response->json();

            // Create a new Spreadsheet object
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set the header row
            $sheet->setCellValue('A1', 'UserName');
            $sheet->setCellValue('B1', 'FirstName');
            $sheet->setCellValue('C1', 'LastName');
            $sheet->setCellValue('D1', 'Email');
            $sheet->setCellValue('E1', 'PhoneNumber');
            $sheet->setCellValue('F1', 'userRoles');
            // Add more headers as needed

            // Populate the data
            $rowNumber = 2;
            foreach ($users as $users) {
                $sheet->setCellValue('A' . $rowNumber, $users['username'] ?? '');
                $sheet->setCellValue('B' . $rowNumber, $users['firstName'] ?? '');
                $sheet->setCellValue('C' . $rowNumber, $users['lastName'] ?? '');
                $sheet->setCellValue('D' . $rowNumber, $users['email'] ?? '');
                $sheet->setCellValue('E' . $rowNumber, $users['phoneNumbe'] ?? '');
                $sheet->setCellValue('F' . $rowNumber, $users['userRoles'] ?? '');
                // Add more columns as needed

                $rowNumber++;
            }

            // Write the spreadsheet to a file
            $writer = new Xlsx($spreadsheet);
            $fileName = 'allusers_details.xlsx';
            $filePath = storage_path('app/public/' . $fileName);
            $writer->save($filePath);

            return response()->download($filePath)->deleteFileAfterSend(true);
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}

// Career Editable

public function showcareer(){
    $username = session('username');
    return view('carreer', compact('username'));
}



public function search(Request $request)
    {
        $query = $request->input('query');

        // Validate the input
        $request->validate([
            'query' => 'required|string|max:255',
        ]);

        try {
            // Call the search API
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                            ->get("https://crowdrobapi.tech/api/Product/SearchProduct", [
                                'Product' => $query
                            ]);

            if ($response->successful()) {
                $products = $response->json();
                Log::debug('Search API response:', $products);
                return view('search', ['products' => $products]);
            } else {
                Log::error('Search API request failed: ' . $response->status() . ' - ' . $response->body());
                return redirect()->back()->with('error', 'Failed to retrieve search results');
            }
        } catch (\Exception $e) {
            Log::error('Exception occurred: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while searching for products');
        }
    }



}
