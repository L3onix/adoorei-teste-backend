<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// lista de produtos disponiveis
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// cadastrar nova venda
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
// consultar vendas realizadas
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
// consultar uma venda específica
Route::get('/sales/{id}', [SaleController::class, 'show'])->name('sales.show');
// cancelar uma venda
Route::delete('/sale/{id}', function (Request $request) {
    return response();
});
// cadastrar produtos a uma venda
Route::put('/sale/{id}', function (Request $request) {
    return response();
});