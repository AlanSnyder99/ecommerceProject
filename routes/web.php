<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorAdminHome;
use App\Http\Controllers\ControladorAdminPerfil;
use App\Http\Controllers\ControladorAdminProducto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(array('domain'=>'127.0.0.1'),function () {

    Route::get('/admin/home', [ControladorAdminHome::class, 'index']);

    Route::get('/admin/perfil', [ControladorAdminPerfil::class, 'index']);

    Route::get('/admin/productos', [ControladorAdminProducto::class, 'index']);
    Route::get('/admin/productos/cargarGrilla', [ControladorAdminProducto::class, 'cargarGrilla'])->name('productos.cargarGrilla');
  
  });
