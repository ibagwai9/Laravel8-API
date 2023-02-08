<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\FileUploadController;
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

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login'])->name('login');
Route::middleware('auth:api')->get('user-info', [PassportAuthController::class, 'userInfo']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//     Route::get('list', function (){
    //         return response()->json([
    //        'success' => true,
    //        'data' => 'Books'
    //    ]);
//    });/

// Route::post('upload',[FileUploadController::class,'userInfo']);

Route::post('upload',[FileUploadController::class,'upload']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
