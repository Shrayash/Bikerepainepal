<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookApiController;
use App\Http\Controllers\API\UserController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::get("data",[BaseController::class,'getData']);
Route::post("login",[AuthController::class,'login']);
Route::post("/customer/newbook",[BookApiController::class,'new_book_store']);
Route::post("/forget-password",[BookApiController::class,'submitForgetPasswordForm']);
Route::post("/reset-password",[BookApiController::class,'submitResetPasswordForm']);
Route::get("/inventory/category/all",[BookApiController::class,'show_category']);
Route::get("/inventory/category/{id}",[BookApiController::class,'category_items']);
Route::get("/inventory/category/details/{id}",[BookApiController::class,'items_details']);



Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::get("/user_info",[UserController::class,'info']);
    Route::post("logout",[AuthController::class,'logout']);
    //old customer data update
    Route::post("/customer/details/",[UserController::class,'update_user']);
    Route::post("/customer/details/vehicles/{id}",[UserController::class,'update_vehicle']);
    Route::post("/customer/add/vehicles/",[UserController::class,'new_vehicles_add']);
    Route::post("/customer/hide/vehicles/{id}",[UserController::class,'hide_vehicle']);
    //old customer vehicle id needs to be passed
    Route::post("/customer/oldbook/store/{id}",[UserController::class,'book_old_store']);
    Route::get("/customer/service/ongoings/",[UserController::class,'ongoing']);
    Route::get("/customer/service/resolved/",[UserController::class,'resolved']);
    Route::post("/product/order/pre-confirmation/{id}",[UserController::class,'order_index']);
    Route::post("/product/order/confirmed/{id}",[UserController::class,'order_store']);
    Route::get("/product/show",[UserController::class,'orders_show'])->name('order.show');

});

