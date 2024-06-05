<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// routes/api.php

use App\Http\Controllers\AuthController;

// Route::get('/api/data', [ApiController::class, 'getData']);
// Route::get('/api/editbrand/{id}', [ApiController::class, 'editBrand']);
// Route::put('/api/update-brand/{id}', [ApiController::class, 'updateBrand']);

//Route::post('/login', 'AuthController@login');

Route::middleware(['api.token'])->group(function () {
    Route::get('/dashboard', [ApiController::class, 'getallvendors']);
    Route::get('/allvendor', [ApiController::class, 'getData']);
    Route::get('/allproducts', [ApiController::class, 'getAllProductData']);
});