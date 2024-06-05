<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
            'categoryLink' => $request->input('categoryLink'),
        ];

        // Handle image upload only if a file is present
        if ($request->hasFile('categoryImage')) {
            $imageContent = base64_encode(file_get_contents($request->file('categoryImage')->getRealPath()));
            $imageData = 'data:image/jpeg;base64,' . $imageContent;
            $data['categoryImage'] = $imageData;
        } else {
            // Include the existing image URL in the data array
            $data['categoryImage'] = $request->input('currentCategoryImage');
        }

        // Send request to update category with details and image
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->put("https://crowdrobapi.tech/api/Category/UpdateCategoryById", $data);

        if ($response->successful()) {
            return redirect('category')->with('success', 'Category updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update category');
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
        $categoryImage = '';
        if ($request->hasFile('categoryImage')) {
            /** @var UploadedFile $file */
            $file = $request->file('categoryImage');
            $imageData = base64_encode(file_get_contents($file));
            $categoryImage = 'data:image/png;base64,' . $imageData;
        }
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->post("https://crowdrobapi.tech/api/Category/AddCategory", [
                'categoryId' => '0',
                'categoryName' => $request->input('categoryName'),
                'categoryImage' => $categoryImage,
                'categoryLink' => $request->input('categoryLink'),
            ]);


            // dd($response->json());
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

// PRODUCT IN APPROVAL


public function productInApproval(){
    try {
        $response = Http::withOptions(['verify' => base_path('cacert.pem')])
            ->get('https://crowdrobapi.tech/api/Product/GetAllProductInApproval');

        if ($response->successful()) {
            $products = $response->json();
        //   dd($products);
        $username = session('username');
            return view('productinapproval', ['products' => $products], compact('username'));
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
        return redirect("allproducts")->with('success', 'Product Approved successfully');
        
    } else {
        return view('api.error');
    }
}



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




}
