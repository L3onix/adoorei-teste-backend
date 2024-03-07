<?php

use App\Http\Controllers\ProductController;
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
Route::get('/product', [ProductController::class, 'index']);
// cadastrar nova venda
Route::post('/sale', function (Request $request) {
    return response();
});
// consultar vendas realizadas
Route::get('/sale', function (Request $request) {
    return response();
});
// consultar uma venda específica
Route::get('/sale/{id}', function (Request $request) {
    return response();
});
// cancelar uma venda
Route::delete('/sale/{id}', function (Request $request) {
    return response();
});
// cadastrar produtos a uma venda
Route::put('/sale/{id}', function (Request $request) {
    return response();
});