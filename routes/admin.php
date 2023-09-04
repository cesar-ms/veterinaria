<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SupplierController;


Route::get('',[HomeController::class,'index'])->middleware('can:admin.home')->name('admin.home');
Route::resource('users',UserController::class)->only(['index','edit','update','create','store','destroy'])->names('admin.users');
Route::resource('roles',RoleController::class)->names('admin.roles');
Route::get('ventas/statistics',[SaleController::class,'statistics'])->middleware('can:admin.ventas.statistics')->name('admin.ventas.statistics');
Route::get('services/statistics',[ServiceController::class,'statistics'])->middleware('can:admin.services.statistics')->name('admin.services.statistics');
Route::post('ventas/producto',[SaleController::class,'producto'])->name('admin.ventas.producto');
Route::resource('ventas',SaleController::class)->names('admin.ventas');
Route::resource('articles',ArticleController::class)->names('admin.articles');
Route::resource('patients',PatientController::class)->names('admin.patients');
Route::get('patients/{patient}/receta',[PatientController::class,'receta'])->middleware('can:admin.patients.receta')->name('admin.patients.receta');
Route::get('patients/{patient}/receta/cotizar',[PatientController::class,'cotizar'])->middleware('can:admin.patients.cotizar')->name('admin.patients.cotizar');
Route::resource('appointments',AppointmentController::class)->names('admin.appointments');
Route::resource('services',ServiceController::class)->names('admin.services');
Route::resource('suppliers',SupplierController::class)->names('admin.suppliers');