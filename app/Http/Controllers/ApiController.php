<?php

// app/Http/Controllers/ApiController.php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;


class ApiController extends Controller
{
    public function getData(Request $request)
    {
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/User/GetAllVendor');

                if ($response->successful()) {
                    $data = $response->json();

                    // 
                    $currentPage = LengthAwarePaginator::resolveCurrentPage();
                    $itemCollection = collect($data);
                    $perPage = 10;
                    $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
                    $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
                    $paginatedItems->setPath($request->url());

                    // 
                    $username = session('username');
                return view('allvendor', ['data' => $paginatedItems], compact('username'));
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
        // Prepare data for product update
        $data = [
            'productId' => $id,
            'prodectTitle' => $request->input('prodectTitle'),
            'productVM' => $request->input('productVM', ''), // Default value is an empty string
            'productPrice' => $request->input('productPrice'),
            'productShortDescription' => $request->input('productShortDescription'),
            'productDescription' => $request->input('productDescription'),
            'productSKU' => $request->input('productSKU'),
            'subCategory' => $request->input('subCategory'),
            'vendorSubCategory' => $request->input('vendorSubCategory'),
            'productInStock' => $request->input('productInStock') ? 'true' : 'false', // Ensure this is a string
            'categoryId' => (int)$request->input('categoryId'),
            'productBrands' => $request->input('productBrands'),
            // 'modifiedDate' => now()->toISOString()
        ];

        // Handle image uploads only if the files are present
        $imageFields = ['prodectImage', 'prodectImage1', 'prodectImage2', 'prodectImage3', 'prodectImage4', 'prodectImage5', 'prodectImage6', 'prodectImage7'];

        foreach ($imageFields as $imageField) {
            if ($request->hasFile($imageField)) {
                $imageContent = base64_encode(file_get_contents($request->file($imageField)->getRealPath()));
                $imageData = 'data:image/jpeg;base64,' . $imageContent;
                $data[$imageField] = $imageData;
            } else {
                // Include the existing image URL in the data array
                $data[$imageField] = $request->input("current$imageField");
            }
        }

        // if ($request->input('productVM')) {
        //     $data['productVM'] = $request->input('productVM');
        // } else {
        //     $data['productVM'] = ''; // Default value
        // }


    //    dd($data);
        // Send request to update product with both details and images
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/Product/UpdateProductById", $data);

            // dd($response->json());
        if ($response->successful()) {
            return redirect('allproducts')->with('success', 'Product updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update product');
        }
    } catch (\Exception $e) {
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
    

public function getallusers(Request $request){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/User/GetAllUser');

        if ($response->successful()) {
            $users = $response->json();
           
            $totalUsers = count($users);
            // dd($users);

            // 

// Get current page form url e.g. &page=1
$currentPage = LengthAwarePaginator::resolveCurrentPage();

// Create a new Laravel collection from the array data
$itemCollection = collect($users);

// Define how many items we want to be visible in each page
$perPage = 10;

// Slice the collection to get the items to display in current page
$currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

// Create our paginator and pass it to the view
$paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);

// set url path for generated links
$paginatedItems->setPath($request->url());


            // 
            $username = session('username');
            // Iterate over each user and access the username
           return view('allusers', ['users' => $paginatedItems], compact('username'));
        } else {
            return view('api.error');
        }

        // return view('allusers', ['users' => $users, 'totalUsers' => $totalUsers]);
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
    try {
        $response = Http::withoptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/User/GetVendorById?registerVendorUserId={$id}");

        if ($response->successful()) {
            $vendor = $response->json();
        //   dd($vendor);
        } else {
            return view('Please Register as a vendor first');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }

    try {
        $response2 = Http::withoptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Store/GetStoreByVendorId?VendorId={$id}");

        if ($response2->successful()) {
            $store = $response2->json();
            //  dd($store);
        } else {
            return view('api.error');
        }
    } catch (\Exception $e) {
        return view('api.error');
    }

    try {
        $response3 = Http::withoptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech/api/Product/GetProductByVendorId?VendorId={$id}");
            // dd($response3);
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

    return view('vendordetails', ['vendor' => $vendor, 'store' => $store, 'product' => $product]);
}
   
    // }

    public function getallvendors()
    {
        try {
            // Get vendors data
            $vendorsResponse = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/User/GetAllVendor');
    
                // dd($vendorsResponse->json());
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
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');
             if ($response->successful()) {
                $products = $response->json();
                $allproducts = count($products);
                // dd($products);
                // 

   // Get current page form url e.g. &page=1
   $currentPage = LengthAwarePaginator::resolveCurrentPage();
   $itemCollection = collect($products);
   $perPage = 10;
   $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
   $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
   $paginatedItems->setPath($request->url());

                // 
                $username = session('username');
                return view('allproducts', ['products' =>  $paginatedItems, 'allproducts' => $allproducts],  compact('username'));
            } else {
                return view('api.error');
            }
        } catch (RequestException $e) {
            return view('api.error');
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


public function getAllCategoryforcaraousel(){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Category/Category/GetAllCategory');

        if ($response->successful()) {
            $products = $response->json();
            //  dd($products);
         
            // Iterate over each user and access the username
           return view('add_caraosel', ['products' => $products]);
            return view('api.error');
        }

        return view('updatepricebycategories', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
    } catch (RequestException $e) {
        return view('api.error');
    }
}

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
        'subCategoryId' => 'required|integer',
        'subCategoryName' => 'required|string',
        'categoryId' => 'required|integer',
    ]);

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->post("https://crowdrobapi.tech/api/SubCategory/AddSubCategory", [
            'subCategoryId' => $validatedData['subCategoryId'],
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

        if ($response->successful()) {
            $products = $response->json();
        //    dd($products);
           return view('add_product', ['products' => $products]);
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
            'productId' => 'required|string',
            // 'productVM' => 'nullable|string',
            'prodectTitle' => 'required|string',
            'prodectImage' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'prodectImage1' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'prodectImage2' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'ProdectImage3' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'ProdectImage4' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'ProdectImage5' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'ProdectImage6' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'ProdectImage7' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048', // Change to file validation
            'productPrice' => 'required|string',
            // 'productDiscount' => 'required|string',
            // 'productMRPPrice' => 'required|string',
            // 'productDiscountPrice' => 'required|string',
            
    

            'productShortDescription' => 'nullable|string',
            'productDescription' => 'required|string',
            'productSKU' => 'nullable|string',
            'productApproval' => 'required|string', // Change to boolean if needed
            'productInStock' => 'required|string', // Change to boolean if needed
            'categoryId' => 'required|string',
            'subCategory' => 'required|string',
            'vendorSubCategory' => 'required|string',
            'productBrands' => 'required|string',
            'registerVendorUserId' => 'required|string',
        ]);

        // Process image uploads
        $categoryImage = '';
        $imageFields = ['prodectImage', 'prodectImage1', 'prodectImage2', 'ProdectImage3', 'ProdectImage4', 'ProdectImage5', 'ProdectImage6', 'ProdectImage7'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $imageData = base64_encode(file_get_contents($file));
                $categoryImage = 'data:image/png;base64,' . $imageData;
                // Replace original file path with base64 encoded image data
                $validatedData[$field] = $categoryImage;
            }
        }

        $productApproval = filter_var($validatedData['productApproval'], FILTER_VALIDATE_BOOLEAN);
        $productInStock = $validatedData['productInStock'] === 'yes';
        // Prepare the data array to be sent in the API request

   


        // Set default value of 0 if productDiscount is empty or not provided
        $productMRPPrice = $request->input('productMRPPrice', 0);
        $productDiscountPrice = $request->input('productDiscountPrice', 0);
        $productDiscount = $request->input('productDiscount', 0);
        

        $postData = [
            'productApproval' => $productApproval,
            'productId' => $validatedData['productId'],
            // 'productDiscount' => $validatedData['productDiscount'],
            // 'productMRPPrice' => $validatedData['productMRPPrice'],
            // 'productDiscountPrice' => $validatedData['productDiscountPrice'],
            'prodectTitle' => $validatedData['prodectTitle'],
            'prodectImage' => $validatedData['prodectImage'],
            // 'prodectImage1' => $validatedData['prodectImage1'],
            'prodectImage1' => $request->input('prodectImage1'),
            // 'prodectImage2' => $validatedData['prodectImage2'],
            'prodectImage2' => $request->input('prodectImage2'),
            // 'ProdectImage3' => $validatedData['ProdectImage3'],
            'ProdectImage3' => $request->input('ProdectImage3'),
            // 'ProdectImage4' => $validatedData['ProdectImage4'],
            'ProdectImage4' => $request->input('ProdectImage4'),
            // 'ProdectImage5' => $validatedData['ProdectImage5'],
            'ProdectImage5' => $request->input('ProdectImage5'),
            // 'ProdectImage6' => $validatedData['ProdectImage6'],
            'ProdectImage6' => $request->input('ProdectImage6'),
            // 'ProdectImage7' => $validatedData['ProdectImage7'],
            'ProdectImage7' => $request->input('ProdectImage7'),
            'productPrice' => $validatedData['productPrice'],
            // 'productVM' => $validatedData['productVM'],
            'productShortDescription' => $validatedData['productShortDescription'],
            'productDescription' => $validatedData['productDescription'],
            'productSKU' => $validatedData['productSKU'],
            // 'productApproval' => $validatedData['productApproval'],
            // 'productInStock' => $validatedData['productInStock'],
            'productInStock' => $productInStock,
            'categoryId' => $validatedData['categoryId'],
            'subCategory' => $validatedData['subCategory'],
            'vendorSubCategory' => $validatedData['vendorSubCategory'],
            'productBrands' => $validatedData['productBrands'],
            'registerVendorUserId' => $validatedData['registerVendorUserId'],
            'isTopDeal' => false,
            'istopTrending' => false,
            'isTopFeatured' => false,
            'isTopRated' => false,
            'productMRPPrice' => $productMRPPrice,
            'productDiscountPrice' => $productDiscountPrice,
            'productDiscount' => $productDiscount,
            
        ];

        // if (isset($validatedData['productVM'])) {
        //     $postData['productVM'] = $validatedData['productVM'];
        // }

        if (isset($validatedData['productVM'])) {
            $postData['productVM'] = $validatedData['productVM'];
        } else {
            $postData['productVM'] = ''; // Default value
        }
// dd($postData);

        // Perform API request
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post('https://crowdrobapi.tech/api/Product/AddProduct', $postData);
        // dd($response->json());

        //    dd($response->json());
        if ($response->successful()) {
            // Product added successfully
            // dd($response->json());
            return redirect('allproducts')->with('success', 'Product added successfully');
        } else {
            // API request failed
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
        'storeId' => 'required|string',
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
            'storeId' => $validatedData['storeId'],
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



public function getinquirydetails(Request $request){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/User/GetFormInqueries');

        if ($response->successful()) {
          
            $enquiry = $response->json();
           $totalItems = count($enquiry);
        //  dd($enquiry);

        
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
        
        $launchSetting = $response->json();

        return view('launch-setting', compact('launchSetting'));
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
        /** @var UploadedFile $file */
        $file = $request->file('adsimage');
        $imageData = base64_encode(file_get_contents($file));
        $adsImage = 'data:image/png;base64,' . $imageData;
    } else {
        // Use the existing image URL from the request
        $adsImage = $request->input('currentAdsImage', '');
    }

    // Get the additional fields from the request
    $adsUrl = $request->input('adsUrl', '');
    $adsDescription = $request->input('description', '');

    // Prepare the payload for the API request
    $payload = [
        'launchSettingTemp' => $launchSettingTemp,
        'adsImage' => $adsImage,
        'adsUrl' => $adsUrl,
        'adsDescription' => $adsDescription,
    ];

    // Debugging: remove this in production
    // dd($payload);

    // Call your API to update the launch setting
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->put('https://crowdrobapi.tech/api/LaunchSetting/updateLaunchSetting', $payload);

    // Check the response and handle accordingly
    if ($response->successful()) {
        return redirect('/dashboard')->with('success', 'Launch setting updated successfully');
    } else {
        // Handle the error accordingly
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

        return view('updateproductprice', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
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
            return redirect()->to('/updatemrp')->with('toast_success', 'Product price updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update product price');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating product price');
    }
}


// UpdateAllProductDeals

public function UpdateAllProductDeals(){

    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Product/GetAllProduct');

        if ($response->successful()) {
            $products = $response->json();
            $totalProducts = count($products);
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
        ->post('https://crowdrobapi.tech/api/Product/UpdateAllProductDeals', $data);

        if ($response->successful()) {
            return redirect('UpdateAllProductDeals')->with('success', 'Update AllProduct Deals successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update product');
        }
    } catch (\Exception $e) {
        return response()->json(['message' => 'An error occurred while updating the product deals.', 'error' => $e->getMessage()], 500);
    }

}


}
