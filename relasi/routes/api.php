<?php

use App\Http\Controllers\RelasiApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/relasi')->group(function(){ //prefix contoh pemanggilan "http://127.0.0.1:8000/api/relasi/barang"
    Route::get('/barang',[RelasiApiController::class,'barang']);
    Route::get('/user',[RelasiApiController::class,'user']);
    Route::get('/beli',[RelasiApiController::class,'beli']);
});