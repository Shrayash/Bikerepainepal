<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\BookApiController;
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

Route::group(['middleware'=>['auth:sanctum']],function(){
    Route::post("logout",[AuthController::class,'logout']);

    //old customer vehicle id needs to be passed
    Route::post("/customer/oldbook/store/{id}",[BookApiController::class,'book_old_store']);
});

