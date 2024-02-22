<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/lessons/item/save',[\App\Http\Controllers\api\testController::class, 'store']);

Route::post('/lessons/list/get',[\App\Http\Controllers\api\testController::class, 'index']);

Route::post('/calendar/list/get',[\App\Http\Controllers\api\calendarController::class,'test']);

Route::post('/upload/image',[\App\Http\Controllers\productController::class,'upLoad']);
Route::post('/change/item',[\App\Http\Controllers\productController::class,'change'])->name('changeItem');
Route::post('/delete/item',[\App\Http\Controllers\productController::class,'deleteItem'])->name('delete');

Route::post('/product/item/save',[\App\Http\Controllers\productController::class, 'store']);

Route::post('/item/list/get',[\App\Http\Controllers\productController::class, 'index']);
Route::post('/send/order',[\App\Http\Controllers\orderController::class,'index']);
Route::post('/basket/get/totalprice', [\App\Http\Controllers\orderController::class, 'totalPrice']);
Route::post('/order/list/get', [\App\Http\Controllers\orderController::class, 'store']);
Route::post('/order/take', [\App\Http\Controllers\orderController::class, 'takeOrder']);
