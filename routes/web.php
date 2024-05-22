<?php

use App\Http\Controllers\HomebudgetController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homebudget.index');
});

Route::get('/',[HomebudgetController::class,'index'])->name('index');
Route::post('/post',[HomebudgetController::class,'store'])->name('store');
Route::get('/edit/{id}',[HomebudgetController::class,'edit'])->name('homebudget.edit');
Route::put('/update',[HomebudgetController::class,'update'])->name('homebudget.update');
Route::post('/destroy/{id}',[HomebudgetController::class,'destroy'])->name('homebudget.destroy');

Route::get('/category',[CategoryController::class, 'showIndex'])->name('category.showIndex');
Route::post('/create',[CategoryController::class, 'registrar'])->name('category.registrar');
Route::get('/categoryedit/{id}',[CategoryController::class, 'categoryEdit'])->name('category.edit');
Route::put('/categoryeUpdate',[CategoryController::class, 'categoryUpdate'])->name('category.update');
Route::post('/categoryDestroy/{id}',[CategoryController::class, 'categoryDestroy'])->name('category.destroy');