<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;


class CategoriesController extends Controller
{
    public function getAllCategory(){
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get('https://crowdrobapi.tech/api/Category/Category/GetAllCategory');
    
            if ($response->successful()) {
                $products = $response->json();
                //  dd($products);
                $username = session('username');
                // Iterate over each user and access the username
               return view('category', ['products' => $products], compact('username'));
            } else {
                return view('api.error');
            }
    
            return view('updatepricebycategories', ['users' => $users, 'products' => $products, 'totalProducts' => $totalProducts], compact('username'));
        } catch (RequestException $e) {
            return view('api.error');
        }
    }


// GET BY CATEGORYID
public function getCategoryById($id){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get("https://crowdrobapi.tech//api/Category/GetCategoryById?CategoryId={$id}");

        if ($response->successful()) {
            $product = $response->json();
            // $username = session('username');
            // dd($products);
            return view('updatecategory', ['product' => $product]);
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}

// UPDATE CATEGORY

public function updateCategory(Request $request, $id)
{
    try {
        // Prepare data for category update
        $data = [
            'categoryId' => $id,
            'categoryName' => $request->input('categoryName'),
            // 'categoryLink' => $request->input('categoryLink'),
        ];

        // Handle image upload only if a file is present
        if ($request->hasFile('categoryImage')) {
            $imageContent = base64_encode(file_get_contents($request->file('categoryImage')->getRealPath()));
            // $imageData = 'data:image/jpeg;base64,' . $imageContent;
            $imageData =  $imageContent;
            $data['categoryImage'] = $imageData;
        } else {
            // Include the existing image URL in the data array
            $data['categoryImage'] = $request->input('currentCategoryImage');
        }

        if ($request->hasFile('categoryBanner')) {
            $imageContent = base64_encode(file_get_contents($request->file('categoryBanner')->getRealPath()));
            // $imageData = 'data:image/jpeg;base64,' . $imageContent;
            $imageData =  $imageContent;
            $data['categoryBanner'] = $imageData;
        } else {
            // Include the existing image URL in the data array
            $data['categoryBanner'] = $request->input('currentCategoryImage');
        }


        //  dd($data);

        // Send request to update category with details and image
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/Category/UpdateCategoryById", $data);

        //    dd($response->json());

        if ($response->successful()) {

<<<<<<< HEAD
            return redirect('category')->with('success', 'Category updated successfully');
=======
           return response()->json(['success' => true, 'message' => 'Category updated successfully']);
>>>>>>> f963cae (first commit)

        } else {
           return response()->json(['success' => false, 'message' => 'Failed to update category'], 400);
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating category');
    }
}

// DELETE CATEGORY

public function deleteCategory($id)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->delete("https://crowdrobapi.tech/api/Category/DeleteCategoryById?CategoryId={$id}");

        if ($response->successful()) {
            return redirect('category')->with('success', 'Product Deleted successfully');;
        } else {
            return redirect()->back()->with('error', 'Failed to delete category');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting category');
    }


}


// Delete Subcategory

public function deleteSubCategory($id)
{
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->delete("https://crowdrobapi.tech/api/SubCategory/DeleteSubCategoryById?SubCategoryId={$id}");

        if ($response->successful()) {
            return redirect('subcategory')->with('success', 'subcategory Deleted successfully');;
        } else {
            return redirect()->back()->with('error', 'Failed to delete category');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error deleting category');
    }
}


public function storeCategory(Request $request)
{
    try {
        // Handle the file upload
        $data = [
            
            'categoryName' => $request->input('categoryName'),
            'categoryLink' => $request->input('categoryLink'),
        ];


        $categoryImage = '';
        if ($request->hasFile('categoryImage')) {
            /** @var UploadedFile $file */
            $file = $request->file('categoryImage');
            $imageData = base64_encode(file_get_contents($file));
            // $categoryImage = 'data:image/png;base64,' . $imageData;
            $categoryImage = $imageData;
        }
        $categoryBanner = '';
        if ($request->hasFile('categoryBanner')) {
            /** @var UploadedFile $file */
            $file = $request->file('categoryBanner');
            $imageData = base64_encode(file_get_contents($file));
            $categoryBanner = $imageData;
            // $categoryBanner = 'data:image/png;base64,' . $imageData;
            $validatedData[$field] = $imageData;
        }

       $data['categoryImage'] = $categoryImage;
       $data['categoryBanner'] = $categoryBanner;
        
        //  dd($data);

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post("https://crowdrobapi.tech/api/Category/AddCategory", [
                'categoryId' => '0',
                'categoryName' => $request->input('categoryName'),
                'categoryImage' => $categoryImage,
                'categoryBanner' => $categoryBanner,
                'categoryLink' => $request->input('categoryLink'),
            ]);


        //  dd($response->json());
        // Log the API response
        Log::info('API response:', $response->json());

        if ($response->successful()) {
            return redirect('/category')->with('success', 'Category Added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add category');
        }
    } catch (\Exception $e) {
        // Log the exception message
        Log::error('Error adding category:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Error adding category');
    }
}

// public function storeCategory(Request $request)
// {
//     // Validate the uploaded image and additional fields
//     $request->validate([
//         'categoryName' => 'required|string|max:255',
//         'categoryImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'CategoryBanner' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
//         'CategoryLink' => 'required|string',
//     ]);

//     // Get the uploaded file and other fields
//     $categoryName = $request->input('categoryName');
//     $CategoryLink = $request->input('CategoryLink');
//     $categoryImage = $request->file('categoryImage');
//     $CategoryBanner = $request->file('CategoryBanner');

//     // Debug: Check the uploaded files
//     dd('Uploaded Files:', [
//         'categoryImage' => $categoryImage,
//         'CategoryBanner' => $CategoryBanner
//     ]);

//     try {
//         // Prepare multipart data for the request
//         $multipartData = [
//             [
//                 'name'     => 'categoryName',
//                 'contents' => $categoryName,
//             ],
//             [
//                 'name'     => 'CategoryLink',
//                 'contents' => $CategoryLink,
//             ],
//             [
//                 'name'     => 'categoryImage',
//                 'contents' => fopen($categoryImage->getPathname(), 'r'),
//                 'filename' => $categoryImage->getClientOriginalName()
//             ],
//             [
//                 'name'     => 'CategoryBanner',
//                 'contents' => fopen($CategoryBanner->getPathname(), 'r'),
//                 'filename' => $CategoryBanner->getClientOriginalName()
//             ],
//         ];

//         // Debug: Check the API request URL and multipart data
//         $apiUrl = "https://crowdrobapi.tech/api/Category/AddCategory";
//         dd('API URL:', $apiUrl, 'Multipart Data:', $multipartData);

//         // Send the API request
//         $response = Http::withOptions(['verify' => base_path('cacert.pem')])
//             ->asMultipart()
//             ->post($apiUrl, $multipartData);

//         // Debug: Check API response
//         dd('API Response:', $response->json());

//         // Log the API response
//         Log::info('API response:', $response->json());

//         if ($response->successful()) {
//             return redirect('/category')->with('success', 'Category Added successfully');
//         } else {
//             return redirect()->back()->with('error', 'Failed to add category');
//         }
//     } catch (\Exception $e) {
//         // Log the exception message
//         Log::error('Error adding category:', ['error' => $e->getMessage()]);
//         return redirect()->back()->with('error', 'Error adding category');
//     }
// }







// PRODUCT IN APPROVAL


public function productInApproval(Request $request){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Product/GetAllProductInApproval');

        if ($response->successful()) {
<<<<<<< HEAD
            $products = $response->json();
            $username = session('username');
            return view('productinapproval', ['products' => $products], compact('username'));
        } elseif ($response->status() === 404) {
            // Handle 404 Not Found by passing an empty array and a message
            $products = [];
            $message = "Approval Product Is Not Available";
            $username = session('username');
            return view('productinapproval', compact('products', 'message', 'username'));
=======
            $productapproval = $response->json();
            
            
             //   

            $currentPage = LengthAwarePaginator::resolveCurrentPage();
            $itemCollection = collect($productapproval);
            $perPage = 10;
            $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
            $paginatedItems= new LengthAwarePaginator($currentPageItems , count($itemCollection), $perPage);
            $paginatedItems->setPath($request->url());

            // 
            
            $username = session('username');
            return view('productinapproval', ['productapproval' => $paginatedItems], compact('username'));
        } elseif ($response->status() === 404) {
            // Handle 404 Not Found by passing an empty array and a message
            $productapproval = [];
            $message = "Approval Product Is Not Available";
            $username = session('username');
            return view('productinapproval', compact('productapproval', 'message', 'username'));
>>>>>>> f963cae (first commit)
        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }
}


public function approveProduct($productId)
{
    $url = "https://crowdrobapi.tech/api/Product/ProductApprovalByProductId?ProductId=$productId";

    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get($url);

    if ($response->successful()) {
        return response()->json(['success' => true, 'message' => 'Product approved successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to approve product'], 500);
    }
}

public function CancelledApproval($productId)
{
    $url = "https://crowdrobapi.tech/api/Product/ProductCancelledApprovalByProductId?ProductId=$productId";

    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get($url);

<<<<<<< HEAD
    if ($response->successful()) {
        return redirect("productinapproval")->with('success', 'Product Approved Canceled successfully');
        
    } else {
        return view('api.error');
    }
}

=======
     if ($response->successful()) {
        return response()->json(['success' => true, 'message' => 'Product approval canceled successfully']);
    } else {
        return response()->json(['success' => false, 'message' => 'Failed to cancel product approval'], 500);
    }
}


// 

public function bulkApprove(Request $request)
{
    $ids = $request->input('ids');

    if (!$ids) {
        return response()->json(['success' => false, 'message' => 'No product IDs provided'], 400);
    }

    foreach ($ids as $productId) {
        $url = "https://crowdrobapi.tech/api/Product/ProductApprovalByProductId?ProductId=$productId";

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get($url);

        if (!$response->successful()) {
            \Log::error("Error approving product: {$productId}, API response: " . $response->body());
            return response()->json(['success' => false, 'message' => 'Failed to approve product: ' . $productId], 500);
        }
    }

    return response()->json(['success' => true, 'message' => 'Products approved successfully']);
}

public function bulkCancelApprove(Request $request)
{
    $ids = $request->input('ids');

    if (!$ids) {
        return response()->json(['success' => false, 'message' => 'No product IDs provided'], 400);
    }

    foreach ($ids as $productId) {
        $url = "https://crowdrobapi.tech/api/Product/ProductCancelledApprovalByProductId?ProductId=$productId";

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get($url);

        if (!$response->successful()) {
            \Log::error("Error canceling approval for product: {$productId}, API response: " . $response->body());
            return response()->json(['success' => false, 'message' => 'Failed to cancel approval for product: ' . $productId], 500);
        }
    }

    return response()->json(['success' => true, 'message' => 'Products approval canceled successfully']);
}

>>>>>>> f963cae (first commit)


// Add Careosel

public function storeCarousel(Request $request)
{
    try {
        // Handle the file upload
        $heroImage = '';
        if ($request->hasFile('heroImage')) {
            /** @var UploadedFile $file */
            $file = $request->file('heroImage');
            $imageData = base64_encode(file_get_contents($file));
            $heroImage = 'data:image/png;base64,' . $imageData;
        }

        $categoryID = $request->input('categoryID'); // Assuming categoryID is coming from the request

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post("https://crowdrobapi.tech/api/HomeSetting/AddHomeCarousel", [
                'heroImage' => $heroImage, // Send the processed heroImage
                'heroTitle' => $request->input('heroTitle'),
                'heroImageURL' => $request->input('heroImageURL'),
                'categoryID' => $categoryID,
            ]);

        // Log the API response
        Log::info('API response:', ['response' => $response->json()]);

        if ($response->successful()) {
            return redirect('/caraousel')->with('success', 'Carousel item added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add carousel item');
        }
    } catch (\Exception $e) {
        // Log the exception message
        Log::error('Error adding carousel item:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Error adding carousel item');
    }
}


public function storeadshome(Request $request)
{
    try {
        // Handle the file upload
        $adsImage = '';
        if ($request->hasFile('adsImage')) {
            /** @var UploadedFile $file */
            $file = $request->file('adsImage');
            $imageData = base64_encode(file_get_contents($file));
            $adsImage = 'data:image/png;base64,' . $imageData;
        }

        $categoryID = $request->input('categoryID'); // Assuming categoryID is coming from the request

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post("https://crowdrobapi.tech/api/HomeSetting/AddHomeAds", [
                'adsImage' => $adsImage, // Send the processed heroImage
                'adsImageTitle' => $request->input('adsImageTitle'),
                // 'heroImageURL' => $request->input('heroImageURL'),
                'categoryID' => $categoryID,
            ]);

        // Log the API response
        Log::info('API response:', ['response' => $response->json()]);

        if ($response->successful()) {
            return redirect('/homeads')->with('success', 'HomeAds item added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add carousel item');
        }
    } catch (\Exception $e) {
        // Log the exception message
        Log::error('Error adding carousel item:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Error adding carousel item');
    }
}


public function HomeadsByID($id){

    try {

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get("https://crowdrobapi.tech/api/HomeSetting/GetHomeAdsByID?homeAdsID={$id}");
        $homeads = $response->json();
        // dd($homeads);
        return view('updatehomeads', ['homeads' => $homeads]);

    }catch(\Exception $e){
        Log::error('HomeAdsByID:', ['error' => $e->getMessage()]);
    }

}


// UpdateHomead


public function updatehomeads(Request $request, $homeAdsID)
{
    try {
        // Prepare data for updating home ads
        $data = [
            'homeAdsID' => $homeAdsID,
            'adsImageTitle' => $request->input('adsImageTitle'),
            'categoryID' => $request->input('categoryID'),
        ];

        // Handle image upload only if a file is present
        // if ($request->hasFile('adsImage')) {
        //     $imageContent = base64_encode(file_get_contents($request->file('adsImage')->getRealPath()));
        //     $imageData = 'data:image/jpeg;base64,' . $imageContent;
        //     $data['adsImage'] = $imageData;
        // }

// 

if ($request->hasFile('adsImage')) {
    $imageContent = base64_encode(file_get_contents($request->file('adsImage')->getRealPath()));
    // $imageData = 'data:image/jpeg;base64,' . $imageContent;
    $imageData =  $imageContent;
    $data['adsImage'] = $imageData;
} else {
    // Include the existing image URL in the data array
    $data['adsImage'] = $request->input('currentCategoryImage');
}



// 



        // dd($data);

        // Send PUT request to update home ads
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/HomeSetting/UpdateHomeAds", $data);
           
            // dd($response->json());

        if ($response->successful()) {
            return redirect('/homeads')->with('success', 'Home ad updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update home ad');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating home ad');
    }
}



// Update Caraousel

public function updateCarousel(Request $request, $homeCarouselID)
{
    try {
        // Prepare data for carousel update
        $data = [
            'homeCarouselID' => $homeCarouselID,
            'heroTitle' => $request->input('heroTitle'),
            'heroImageURL' => $request->input('heroImageURL'),
        ];

        // Handle image upload only if a file is present
        if ($request->hasFile('heroImage')) {
            $imageContent = base64_encode(file_get_contents($request->file('heroImage')->getRealPath()));
            $imageData = 'data:image/jpeg;base64,' . $imageContent;
            $data['heroImage'] = $imageData;
        }

        // Send request to update carousel with details and image
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/HomeSetting/UpdateHomeCarousel", $data);

        if ($response->successful()) {
            return redirect('/category')->with('success', 'Carousel item updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update carousel item');
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error updating carousel item');
    }
}

public function getCareerPage() {
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get("https://crowdrobapi.tech/api/PageContent/GetAllPages");

    try {
        if ($response->successful()) {
            $data = $response->json();
            // Assuming $data is an array and you need a specific page content
            // Adjust the index '0' or the key to match the actual data structure
            $pageContent = $data[0]['pageContent'] ?? 'Default content if not found';
            // $pageName = $data[1]['pageName'] ?? 'Default content if not found';

            return view('carrerpage', compact('pageContent'));
          
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error');
    }
}

public function getCareerAdminPage() {
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get("https://crowdrobapi.tech/api/PageContent/GetAllPages");

    try {
        if ($response->successful()) {
            $data = $response->json();
            // Assuming $data is an array and you need a specific page content
            // Adjust the index '0' or the key to match the actual data structure
            $pageContent = $data[0]['pageContent'] ?? 'Default content if not found';
             $username = session('username');
           
            return view('admincareerpage', compact('pageContent', 'username'), ['data']);
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error');
    }
}

public function getCareerPageById() {
    $defaultId = 1;  // Hard-coded ID
    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
        ->get("https://crowdrobapi.tech/api/PageContent/GetPageById?PageContentId={$defaultId}");

    try {
        if ($response->successful()) {
            $data = $response->json();
            //  dd( $data);
            $pageContent = $data['pageContent'] ?? 'Default content if not found';
            $pageName = $data['pageName'] ?? 'Default content if not found';
            // dd( $pageContent);
            $username = session('username');
            return view('carreer', compact('pageContent', 'pageName',  'username'), ['data' => $data]);
        }
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error');
    }

}

public function updateCareerPage(Request $request, $id)
    {
        try {
            $pageName = $request->input('pageName');
            $pageContent = $request->input('pageContent');

            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->put("https://crowdrobapi.tech/api/PageContent/UpdatePage", [
                    'pageContentId' => $id,
                    'pageName' => $pageName,
                    'pageContent' => $pageContent,
                ]);

            if ($response->successful()) {
                return redirect('careerpage')->with('success', 'Page updated successfully');
            } else {
                return redirect()->back()->with('error', 'Failed to update page');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating page');
        }
    }

 public function GetAllColor(){
    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                   ->get("https://crowdrobapi.tech/api/Common/GetAllColourList");

          $Color = $response->json();
          $username = session('username');
        //   dd($Color);

            return view('getallcolor', ['Color' => $Color], compact('username'));

       }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error');
    }
 }

// AddColor

public function AddColor(Request $request){

    try{

        // $request->validate([
        //     'name' => 'required',
        // ]);

       $data = [
        'name' => $request->input('name')
       ];

       $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                  ->post("https://crowdrobapi.tech/api/Common/AddNewColour", $data);

        if($response->successful()){
            return redirect('getallcolor')->with('success', 'Color added successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to add color');
        }


    }catch(\Expection $e){
        return redirect()->back()->with('error', 'Error');
    }


}


public function DeleteColor($id){

try{

    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
              ->delete("https://crowdrobapi.tech/api/Common/DeleteColourById?ColourId={$id}");

    if($response->successful()){
        return redirect('getallcolor')->with('success', 'Color deleted successfully');
    }else{
        return redirect()->back()->with('error', 'Failed to Delete color');
    }


}catch(\Expection $e){

    return redirect()->back()->with('error', 'Error');

}

}


public function getColorById($id){
    try{

        $response =  Http::withOptions(['verify' => base_path('cacert.pem')])
                    ->get("https://crowdrobapi.tech/api/Common/GetColorByID?ColorId={$id}");

            $Color = $response->json();
            // dd($Color );
            
            return view('updatecolor', compact('Color'));

    }catch(\Expection $e){
    
        return redirect()->back()->with('error', 'Error');
    }
}

public function AddNewSize(Request $request){

try{

    $data = [
        'name' => $request->input('name')
    ];

    $response = Http::withOptions(['verify' => base_path('cacert.pem')])
    ->post("https://crowdrobapi.tech/api/Common/AddNewSize", $data);

    if($response->successful()){
        return redirect('getallsize')->with('success', 'Size added successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to add size');
        }
}catch(\Expection $e){
    return redirect()->back()->with('error', 'Error');
}

}


public function GetAllSize(){
    try{

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                   ->get("https://crowdrobapi.tech/api/Common/GetAllSizeList");

          $Color = $response->json();
          $username = session('username');
        //   dd($Color);

            return view('getallsize', ['Color' => $Color], compact('username'));

       }catch(\Exception $e){
        return redirect()->back()->with('error', 'Error');
    }
 }

 
public function DeleteSize($id){

    try{
    
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                  ->delete("https://crowdrobapi.tech//api/Common/DeleteSizeById?SizeId={$id}");
    
        if($response->successful()){
            return redirect('getallsize')->with('success', 'Size deleted successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to Delete Size');
        }
    
    
    }catch(\Expection $e){
    
        return redirect()->back()->with('error', 'Error');
    
    }
    
<<<<<<< HEAD
    }

=======
    
    
    }
    
    
     public function editSubcategory($id)
    {
        try {
            // Fetch subcategory data from the API with SSL verification
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->get("https://crowdrobapi.tech/api/SubCategory/GetSubCategoryById?subCategoryId={$id}");
    
            if ($response->successful()) {
                $subcategory = $response->json(); // Get the data from API response
                return view('subcategory-edit', compact('subcategory'));
            } else {
                return back()->with('error', 'Failed to fetch subcategory data.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred. Please try again later.');
        }
    }

    // Method to update subcategory data
    public function updateSubcategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'subCategoryName' => 'required|string',
            'categoryId' => 'required|integer',
            'subCategoryImage' => 'nullable|image|max:2048', // Validate image if provided
        ]);
    
        // Handle image upload and convert to base64 if provided
        if ($request->hasFile('subCategoryImage')) {
            $file = $request->file('subCategoryImage');
            $imageData = base64_encode(file_get_contents($file));
            $validatedData['subCategoryImage'] = 'data:image/jpeg;base64,' . $imageData;
        } else {
            $validatedData['subCategoryImage'] = $request->input('existingImage'); // Keep the existing image
        }
    
        try {
            $response = Http::withOptions(['verify' => base_path('cacert.pem')])
                ->put("https://crowdrobapi.tech/api/SubCategory/UpdateSubCategoryById", [
                    'subCategoryId' => $id,
                    'subCategoryName' => $validatedData['subCategoryName'],
                    'categoryId' => $validatedData['categoryId'],
                    'subCategoryImage' => $validatedData['subCategoryImage'],
                ]);
    
            if ($response->successful()) {
                // return redirect('/subcategory')->with('success', 'Subcategory updated successfully');
                 return response()->json(['success' => true, 'message' => 'Category updated successfully']);
            } else {
                // return back()->with('error', 'Failed to update subcategory. Please try again.');
                  return response()->json(['success' => false, 'message' => 'Failed to update category'], 400);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred. Please try again later.');
        }
    }
    
public function AddTask(Request $request){

    try {
        $data = [
            'taskText' => $request->input('taskText'),
            'taskToBeDone' =>  $request->input('taskToBeDone'),
        ];

        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post('https://cd1.crowdrob.com/api/TaskTable/AddTask', $data);

        if ($response->successful()) {
            return redirect()->back()->with('success', 'Task Added Successfully');

        } else {
            return view('api.error');
        }
    } catch (RequestException $e) {
        return view('api.error');
    }

   }
>>>>>>> f963cae (first commit)

}

