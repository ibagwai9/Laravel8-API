<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\JournalsController;

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
Route::middleware('auth:api')->get('login', [PassportAuthController::class, 'user']);

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:api')->get('/user', function (Request $request) {
    $user = $request->user();
    return response()->json(['user' => $user,'success'=>true], 200); 
});

Route::resource('journals',JournalsController::class)->middleware('auth:api');
Route::get('downloads/{url}', function($url){
    $file= public_path().'/upload/'.$url;
    $headers = [
        'Content-Type' => 'application/pdf',
     ];
    return response()->download($file, 'filename.pdf', $headers);
});