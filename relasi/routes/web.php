<?php

use App\Http\Controllers\RelasiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/barang',[RelasiController::class,'barang']);
Route::get('/user',[RelasiController::class,'user']);
Route::get('/beli',[RelasiController::class,'beli']);
