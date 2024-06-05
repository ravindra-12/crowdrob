<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthCheck;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('download', function () {
    return view('download');
});


Route::get('privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('refund-returns-policy', function () {
    return view('refund-returns-policy');
});

Route::get('term-conditions', function () {
    return view('term-conditions');
});
Route::get('agreement', function () {
    return view('agreement');
});

Route::get('shipping-method', function () {
    return view('shipping_method');
});

Route::get('/', function () {
    return view('home');
});
Route::get('add', function () {
    return view('add_brand');
});

Route::get('edit', function () {
    return view('api/edit');
});
// Route::get('updateproduct', function () {
//     return view('updateproduct');
// });
Route::get('add_category', function () {
    return view('add_category');
});
// form

// ForgotPassword Form


Route::get('/forgot-password', [UserController::class, 'showForgotPasswordForm'])->name('forgot-password.form');

// POST request to submit forgot password form
Route::post('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgot-password.submit');



// Caraosel

// Route::get('add_caraosel', function () {
//     return view('add_caraosel');
// });

Route::get('caraousel', [ApiController::class, 'GetCaraousel']);


Route::get('add_caraosel', [ApiController::class, 'getAllCategoryforcaraousel']);

Route::post('/caraosel/store', [CategoriesController::class, 'storeCarousel'])->name('caraosel.store');
Route::delete('/caraousel/{id}', [ApiController::class, 'deleteCaraousel'])->name('caraousel.delete');


// EndCaraosel

// ResetPassword Form

Route::get('/ResetPassword', [ApiController::class, 'showResetPasswordForm'])->name('password.reset');

Route::post('/resetyourpassword', [ApiController::class, 'resetyourpassword'])->name('resetyourpassword');

// EndResetPassword Form


Route::post('/submit-form', [ApiController::class, 'submitForm'])->name('form.submit');
Route::get('enquirydetails', [ApiController::class, 'getinquirydetails']);
// SUBCATEGORY ROUTES

// Lounchsetting///

Route::get('/launch-setting', [ApiController::class, 'getLaunchSetting'])->name('launch-setting.show');
Route::put('/launch-setting/update', [ApiController::class, 'updateLaunchSetting'])->name('launch-setting.update');

Route::get('add_subcategory', function () {
    return view('add_subcategory');
});
Route::get('subcategory', [ApiController::class, 'getsubCategory']);
Route::get('add_subcategory', [ApiController::class, 'getAllCategory']);
Route::post('/subcategory/add', [ApiController::class, 'addSubcategory'])->name('subcategory.store');
Route::delete('/subcategory/{id}', [CategoriesController::class, 'deleteSubCategory'])->name('subcategory.delete');

// ADDPRODUCT ROUTES
// Route::get('add_Product', function () {
//     return view('add_product');
// });
Route::get('add_Product', [ApiController::class, 'getCategoryforadd']);
Route::post('/add/product', [ApiController::class, 'addProduct'])->name('add.product');


// STORE ROUTES
Route::get('addstore', function () {
    return view('add_store');
});
Route::post('/add/store', [ApiController::class, 'addStore'])->name('add.store');
// UserRoutes

Route::get('/user/edit/{email}', [ApiController::class, 'getUserByEmail']);
Route::put('/user/{email}', [ApiController::class, 'update'])->name('user.update'); // Change method to PUT
Route::get('/user/view/{email}', [ApiController::class, 'ViewUserByEmail']);

// VENDOR ROUTE
Route::get('/vendor/edit/{id}', [ApiController::class, 'getvendorbyid']);
Route::put('/vendor/edit/{id}', [ApiController::class, 'updateVendor'])->name('vendor.update');
Route::put('/vendor/{id}', [ApiController::class, 'DeleteVendor'])->name('vendor.delete');

Route::get('/updatecategory/{id}', [CategoriesController::class, 'getCategoryById']);
Route::put('/update-category/{id}', [CategoriesController::class, 'updateCategory'])->name('category.update');
Route::delete('/category/{id}', [CategoriesController::class, 'deleteCategory'])->name('category.delete');
Route::post('/category/store', [CategoriesController::class, 'storeCategory'])->name('category.store');
// 
Route::get('/mrpcatdetails/{categoryId}', [ApiController::class, 'showUpdateForm'])->name('mrpcatdetails');
Route::post('/mrpcatdetails/{categoryId}', [ApiController::class, 'updatePriceByCategoryId'])->name('updatePrice');


// 
Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/productinapproval', [CategoriesController::class, 'productInApproval']);
    Route::get('/category', [CategoriesController::class, 'getAllCategory']);
    Route::get('/updatemrpbycat', [ApiController::class, 'getByCategorieId']);
    Route::get('/updatemrp', [ApiController::class, 'getallproductprice']);
    Route::get('/dashboard', [ApiController::class, 'getallvendors']);
    Route::get('/allvendor', [ApiController::class, 'getData']);
    Route::get('/allproducts', [ApiController::class, 'getAllProductData'])->name('allproducts');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Route::get('/logout', [AuthController::class, 'logout']);
    // Route::get('/allusers', [ApiController::class, 'getallusers']);
    Route::get('/allusers', [ApiController::class, 'getallusers'])->name('allusers');
    Route::get('/allstore', [ApiController::class, 'getallStore']);
    Route::get('/allproducts/catid={catid}', [ApiController::class, 'getAllProductData'])->name('allproducts');
    
    Route::get('/allproducts/brandid={brandid}', [ApiController::class, 'getAllProductData'])->name('allproducts');
    Route::get('/allproducts/subcatid={subcatid}', [ApiController::class, 'getAllProductData'])->name('allproducts');

    
});

// Approval Routes

Route::get('/product/approve/{productId}', [CategoriesController::class, 'approveProduct'])->name('product.approve');

//  Updtate ProductDiscount

Route::get('/discountprice/{id}', [ApiController::class, 'updateproductdiscountprice']);
Route::get('updateproductdiscount', [ApiController::class, 'getproductforDiscount']);
Route::put('/discountprice/discountupdate/{id}', [ApiController::class, 'updateDiscountProductPrice'])->name('discount.update');

// End ProductDiscount


// UpdateAllProductDeals

Route::get('UpdateAllProductDeals', [ApiController::class, 'UpdateAllProductDeals']);
Route::get('/UpdateAllProductDeals/{id}', [ApiController::class, 'updateAllProductDealsById']);
Route::post('/UpdateAllProductDeals/ProductDeals/{id}', [ApiController::class, 'updateProductallDeals'])->name('ProductDeals.update');


// End AllProductDeals


Route::get('/mrpcatdetails/{id}', [ApiController::class, 'viewMrpByCat']);
Route::get('/mrpdetails/{id}', [ApiController::class, 'viewMrp']);
Route::get('updateproduct/{id}', [ApiController::class, 'editProduct']);
Route::get('/productdetails/{id}', [ApiController::class, 'viewProduct']);
Route::get('/vendordetails/{id}' , [ApiController::class, 'viewvendor']);
Route::get('/store/{id}', [ApiController::class, 'viewStore']);
Route::delete('/store/{id}', [ApiController::class, 'deleteStoreById'])->name('store.delete');
Route::delete('/products/{id}', [ApiController::class, 'deleteProductById'])->name('products.delete');
Route::get('/dashboardlayout', [ApiController::class, 'getAllUserData']);

    


Route::get('/register', [UserController::class, 'register']);
// Route to handle login form submission
// Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
// Add a new brand
Route::post('/api/add-brand', [ApiController::class, 'addNewBrand']);

//Dashboard
Route::put('/products/update/{id}', [ApiController::class, 'updateProduct'])->name('products.update');

 //Route::get('/dashboard', [ApiController::class, 'getallvendors']);

// Delete a brand by ID
//Route::get('/allvendor', [ApiController::class, 'getData']); // Route to fetch data
//Route::get('/allproducts', [ApiController::class, 'getAllProductData']);
Route::delete('/api/delete-brand/{id}', [ApiController::class, 'deleteBrandById']);
Route::get('/api/data', [ApiController::class, 'getData']); // Route to fetch data
// Route::get('updateproduct/{id}', [ApiController::class, 'editBrand']);
Route::get('updateproduct/{id}', [ApiController::class, 'editProduct']); // Update product route

// Route::put('/api/update-brand/{id}', [ApiController::class, 'updateBrand']);
// Route::put('/products/update/{id}', [ApiController::class, 'updateProduct'])->name('products.update');

Route::put('/mrp/mrpupdate/{id}', [ApiController::class, 'updateProductPrice'])->name('mrp.update');
Route::put('/mrp/mrpupdatebycat/{id}', [ApiController::class, 'updtaePriceBycategorie'])->name('mrp.mrpupdatebycat');

// 

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
?>