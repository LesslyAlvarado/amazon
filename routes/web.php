<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productoController;
use App\Http\Controllers\compraController;

Route::get('/amazon', function () {
    return view('amazon');
});

Route::get('/amazon2', function () {
    return view('amazon2');
});

Route::get('/inicio', function () {
    return view('inicio');
});

Route::get('/historialCompras', function () {
    return view('historialCompras');
});

Route::get('/detalleProducto', function () {
    return view('detalleProducto');
});

Route::get('/detalleCompra', function () {
    return view('detalleCompra');
});

Route::get('/agregarProducto', function () {
    return view('agregarProducto');
});

Route::get('/inicio', [productoController::class, 'getAll']);

Route::get('/detalleProducto', [productoController::class, 'getForm']);

Route::get('/detalleProducto/{id}', [productoController::class, 'getForm']);

Route::get('/eliminar_producto/{id}', [productoController::class, 'getDelete']);

Route::post('guardar_producto', [productoController::class, 'saveData']);

Route::post('guardar_producto/{id}', [productoController::class, 'saveData']);

//
// Route::get('/inicio', [compraController::class, 'getAll']);

Route::get('/detalleCompra', [compraController::class, 'getForm']);

Route::get('/detalleCompra/{id}', [compraController::class, 'getForm']);

Route::get('/eliminar_compra/{id}', [compraController::class, 'getDelete']);

Route::post('guardar_compra', [compraController::class, 'saveData']);

Route::post('guardar_compra/{id}', [compraController::class, 'saveData']);