<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//import
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//Auth Routes
Route::post('register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class, 'login']);

//wajib login
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    //dibawah ini akan di isi oleh route lainnya
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
});