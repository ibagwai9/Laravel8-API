<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Auth::routes();

Route::get('downloads/{url}', function($url){
    $file= public_path().'/upload/'.$url;
    $headers = [
        'Content-Type' => 'application/pdf',
     ];
    return response()->download($file, 'filename.pdf', $headers);
});
