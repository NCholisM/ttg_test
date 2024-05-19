<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StatusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;

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

// routes/api.php
// Route::resource('/produk', ProdukController::class);
Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id_produk}', [ProdukController::class, 'show']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::put('/produk/{produk}', [ProdukController::class, 'update']);
Route::delete('/produk/{id_produk}', [ProdukController::class, 'destroy']);

Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id_kategori}', [KategoriController::class, 'show']);

Route::get('/status', [StatusController::class, 'index']);
Route::get('/status/{id_status}', [StatusController::class, 'show']);
