<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\ProductsController;
use App\Http\Controllers\API\UsersController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::controller(AuthenticationController::class)->group(function(){
    Route::post('login', 'login')->name('api.login');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::apiResources([
        'product' => ProductsController::class,
        'user' => UsersController::class,
    ]);

    Route::post('logout', [AuthenticationController::class, 'logout'])->name('api.logout');
});
