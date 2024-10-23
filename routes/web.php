<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AuthCheck;
use App\Http\Controllers\ExportController;

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

Route::get('career', function () {
    return view('jobs');
});
// Route::get('careerpost', function () {
//     return view('carreer');
// });

<<<<<<< HEAD
=======
Route::get('diwalioffer', function(){
    return view('diwalioffer');
});

>>>>>>> f963cae (first commit)
Route::get('careerpost', [CategoriesController::class, 'getCareerPageById']);
Route::get('careerpage', [CategoriesController::class, 'getcareerPage']);
Route::put('/update-career-page/{id}', [CategoriesController::class, 'updateCareerPage'])->name('update.career.page');
Route::get('admincareerpage', [CategoriesController::class, 'getCareerAdminPage']);

Route::get('vendor', function () {
    return view('vendor');
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

Route::get('update-status', function () {
    return view('updateOrder');
});

// Order Routes

Route::get('/add-city', [OrderController::class, 'create'])->name('cities.create');
Route::post('/add-city', [OrderController::class, 'store'])->name('cities.store');
Route::get('/cities', [OrderController::class, 'getActiveDeliveryCities'])->name('cities.index');

Route::get('/getallvendororder', [ApiController::class, 'getvendororderdata'])->name('allvendorr');
Route::get('/getallvendororder/{id}', [OrderController::class, 'GetAllOrdersByVendorId']);



Route::get('deliverycities', [OrderController::class, 'GetActiveDeliveryCities']);
<<<<<<< HEAD
Route::get('allvendororder', [OrderController::class, 'GetAllVendorOrder']);
Route::get('allvendororder', [OrderController::class, 'GetAllVendorOrder']);
Route::get('orderprofitloss', [OrderController::class, 'GetAllOrderProfitAndLossList']);
Route::get('order', [OrderController::class, 'GetAllUserOrders']);
Route::get('getallorder', [OrderController::class, 'GetAllOrders']);
=======
Route::get('allvendororder', [OrderController::class, 'GetAllVendorOrder'])->name('allvendororder');
Route::get('allvendororder', [OrderController::class, 'GetAllVendorOrder'])->name('allvendororder');
Route::get('orderprofitloss', [OrderController::class, 'GetAllOrderProfitAndLossList']);
Route::get('order', [OrderController::class, 'GetAllUserOrders']);
Route::get('getallorder', [OrderController::class, 'GetAllOrders'])->name('getallorder');
>>>>>>> f963cae (first commit)
Route::get('oredrstatus', [OrderController::class, 'OrderPlaceStatus']);
Route::get('sellingdetails/{id}', [OrderController::class, 'GetallNetSellByVendorID']);

Route::put('/orders/update', [OrderController::class, 'update'])->name('orders.update');
Route::get('/updatestatus/{id}', [OrderController::class, 'GetOrdersById']);
// End Order Routes


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
Route::get('homeads', [ApiController::class, 'AdsHomeads']);

// 

Route::get('add_caraosel', function(){
    return view('add_caraosel');
});


Route::get('adds_home', function(){
    return view('add_adshome');
});



Route::get('updatehomeads/{id}', [CategoriesController::class, 'HomeadsByID']);
Route::put('updatehomeads/{id}', [CategoriesController::class, 'updatehomeads'])->name('homeads.update');
// Route::get('add_caraosel', [ApiController::class, 'getAllCategoryforcaraousel']);
Route::post('/adshome/store', [CategoriesController::class, 'storeadshome'])->name('adshome.store');
Route::post('/caraosel/store', [CategoriesController::class, 'storeCarousel'])->name('caraosel.store');
Route::delete('/caraousel/{id}', [ApiController::class, 'deleteCaraousel'])->name('caraousel.delete');
Route::delete('/homeads/{id}', [ApiController::class, 'deletehomeads'])->name('homeads.delete');


// EndCaraosel

// GColor

Route::get('addcolor', function(){
    return view('addcolor');
});

Route::get('addsize', function(){
    return view('addsize');
});

Route::get('addcoupon', function(){
    return view('addcoupon');
});

// Coupon

Route::get('getallcoupon', [OrderController::class, 'GetAllCoupon']);
Route::delete('getallcoupon/{id}', [OrderController::class, 'DeleteCoupon'])->name('coupone.delete');
Route::post('addcoupon', [OrderController::class, 'AddCoupon'])->name('add.coupon');
Route::get('updatecoupon/{id}', [OrderController::class, 'GetCouponById']);
Route::put('updatecoupon/{id}', [OrderController::class, 'UpdateCoupon'])->name('update.coupon');

// End Coupon


//Paymentwithdrwal

Route::get('getallpaymentwithdrawal', [OrderController::class, 'GetallPaymentWithdrawal']);
Route::get('getallaccountsetup', [OrderController::class, 'GetallGetAllAccountSetups']);
Route::get('getallpaymentwithdrawal/{id}', [OrderController::class, 'GetallPaymentWithdrawalById']);
Route::get('getallaccountsetup/{id}', [OrderController::class, 'GetallGetAllAccountSetupsById']);

Route::delete('getallpaymentwithdrawal/{id}', [OrderController::class, 'DeleteWithdrwalByPaymentId'])->name('delete.paymentwithdrawal');

Route::delete('getallaccountsetup/{id}', [OrderController::class, 'DeleteAccountSetups'])->name('delete.accountsetup');


// End paymentwithdrwal

Route::get('getallcolor', [CategoriesController::class, "GetAllColor"]);
Route::get('getallsize', [CategoriesController::class, "GetAllSize"]);

Route::post('addsize', [CategoriesController::class, 'AddNewSize'])->name('add.size');
Route::post('addcolor', [CategoriesController::class, 'AddColor'])->name('add.color');
Route::delete('color/{id}', [CategoriesController::class, 'DeleteColor'])->name('delete.color');
Route::get('updatecolor/{id}', [CategoriesController::class, 'getColorById'])->name('update.color');
// Route::get('updatesize/{id}', [CategoriesController::class, 'getColorById'])->name('update.size');


Route::delete('size/{id}', [CategoriesController::class, 'DeleteSize'])->name('delete.size');

// EndColor


// ResetPassword Form

Route::get('/ResetPassword', [ApiController::class, 'showResetPasswordForm'])->name('password.reset');

Route::post('/resetyourpassword', [ApiController::class, 'resetyourpassword'])->name('resetyourpassword');

// EndResetPassword Form

Route::get('/export-inquiry-details', [ApiController::class, 'exportInquiryDetailsToExcel']);
Route::post('/submit-form', [ApiController::class, 'submitForm'])->name('form.submit');
Route::get('enquirydetails', [ApiController::class, 'getinquirydetails'])->name('getenquiry');
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

Route::get('/subcategory/edit/{id}', [CategoriesController::class, 'editSubcategory'])->name('subcategory.edit');
Route::put('/subcategory/update/{id}', [CategoriesController::class, 'updateSubcategory'])->name('subcategory.update');


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
Route::delete('/user/{id}', [UserController::class, 'UserDeleteByEmail'])->name('user.delete');


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




Route::post('/mrpupdateinrbycategory/{categoryId}', [ApiController::class, 'updatePriceByCategoryIdInINR'])->name('mrpupdatebycategoryinInr');
Route::get('/mrpupdatebycategory/{categoryId}', [ApiController::class, 'UpdateMRIinINR'])->name('mrpupdatebycategoryinr');


// 


Route::get('/mrpupdate/{id}', [ApiController::class, 'GetMrpforupade']);
Route::put('/mrpinr/mrpupdate/{id}', [ApiController::class, 'updateProductPriceINR'])->name('mrpinr.update');



// 
Route::group(['middleware' => ['AuthCheck']], function () {
    Route::get('/productinapproval', [CategoriesController::class, 'productInApproval']);
    Route::get('/category', [CategoriesController::class, 'getAllCategory']);
    Route::get('/updatemrpbycat', [ApiController::class, 'getByCategorieId']);
    Route::get('/updatemrp', [ApiController::class, 'getallproductprice']);
<<<<<<< HEAD
    Route::get('/dashboard', [ApiController::class, 'getallvendors']);
=======
    Route::get('/dashboard', [ApiController::class, 'getallvendors'])->name('dashboard');
>>>>>>> f963cae (first commit)
    Route::get('/allvendor', [ApiController::class, 'getData'])->name('allvendor');
    Route::get('/allproducts', [ApiController::class, 'getAllProductData'])->name('allproduct');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    // Route::get('/logout', [AuthController::class, 'logout']);
    // Route::get('/allusers', [ApiController::class, 'getallusers']);
    Route::get('/allusers', [ApiController::class, 'getallusers'])->name('allusers');
    Route::get('/allstore', [ApiController::class, 'getallStore'])->name('allstore');
    Route::get('/allproducts/catid={catid}', [ApiController::class, 'getAllProductData'])->name('allproducts');
    
    Route::get('/allproducts/brandid={brandid}', [ApiController::class, 'getAllProductData'])->name('allproducts');
    Route::get('/allproducts/subcatid={subcatid}', [ApiController::class, 'getAllProductData'])->name('allproducts');

    
});

// Approval Routes

<<<<<<< HEAD
Route::get('/product/approve/{productId}', [CategoriesController::class, 'approveProduct'])->name('product.approve');
Route::get('/product/approvecancel/{productId}', [CategoriesController::class, 'CancelledApproval'])->name('product.cancelapprove');
=======
// Route::get('/product/approve/{productId}', [CategoriesController::class, 'approveProduct'])->name('product.approve');
// Route::get('/product/approvecancel/{productId}', [CategoriesController::class, 'CancelledApproval'])->name('product.cancelapprove');

Route::get('/product/approve/{productId}', [CategoriesController::class, 'approveProduct'])->name('product.approve');
Route::get('/product/cancel/{productId}', [CategoriesController::class, 'CancelledApproval'])->name('product.cancelapprove');
Route::post('/product/bulkapprove', [CategoriesController::class, 'bulkApprove'])->name('product.bulkapprove');
Route::post('/product/bulkcancelapprove', [CategoriesController::class, 'bulkCancelApprove'])->name('product.bulkcancelapprove');
>>>>>>> f963cae (first commit)
//  Updtate ProductDiscount

Route::get('/discountprice/{id}', [ApiController::class, 'updateproductdiscountprice']);
Route::get('updateproductdiscount', [ApiController::class, 'getproductforDiscount'])->name('updateproductdiscount');
Route::put('/discountprice/discountupdate/{id}', [ApiController::class, 'updateDiscountProductPrice'])->name('discount.update');

// End ProductDiscount


// UpdateAllProductDeals

Route::get('UpdateAllProductDeals', [ApiController::class, 'UpdateAllProductDeals'])->name('UpdateAllProductDeals');
Route::get('/UpdateAllProductDeals/{id}', [ApiController::class, 'updateAllProductDealsById']);
Route::put('/UpdateAllProductDeals/ProductDeals/{id}', [ApiController::class, 'updateProductallDeals'])->name('productsdeals.update');


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

<<<<<<< HEAD

=======
// 

Route::post('/api/add-task', [CategoriesController::class, 'AddTask']);
Route::get('addtask', function(){
    return view('addtask');
});
>>>>>>> f963cae (first commit)

// ExPoRt DaTa

Route::get('/export-alluser-details', [ApiController::class, 'exportAllUserDetailsToExcel']);


<<<<<<< HEAD
=======
// Delevery

Route::get('/deliveryorders', [OrderController::class, 'getAllShippedOrders'])->name('delivery.orders');
Route::post('/delivery/assign', [OrderController::class, 'assignOrderToAgent'])->name('delivery.assign');


// Route::get('/demo', [OrderController::class, 'GetBillingGenerate']);
Route::get('/generate-pdf/{orderId}', [OrderController::class, 'GetBillingGenerate'])->name('generate.pdf');
// End Delivery

>>>>>>> f963cae (first commit)



?>

