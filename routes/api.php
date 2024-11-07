<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoController;
use App\Http\Controllers\compraController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/listado_producto', [productoController::class, 'getAPIAll']);
//http://127.0.0.1:8000/api/listado_usuario

Route::get('/get_producto/{id}', [productoController::class, 'getAPIGetProductoByID']);

Route::delete('/delete_producto/{id}', [productoController::class, 'deleteAPI']);

Route::post('/add_producto', [productoController::class, 'postApiAddProducto']);

Route::put('/update_producto/{id}', [productoController::class, 'putApiUpdateProducto']);

Route::post('/search_producto', [productoController::class, 'getAPIAllFiltro']);


Route::get('/listado_compra', [compraController::class, 'getAPIAll']);
//http://127.0.0.1:8000/api/listado_usuario

Route::get('/get_compra/{id}', [compraController::class, 'getAPIGetCompraByID']);

Route::delete('/delete_compra/{id}', [compraController::class, 'deleteAPI']);

Route::post('/add_compra', [compraController::class, 'postApiAddCompra']);

Route::put('/update_compra/{id}', [compraController::class, 'putApiUpdateCompra']);

Route::post('/search_compra', [compraController::class, 'getAPIAllFiltro']);
