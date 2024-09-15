<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('add/product', [ProductController::class, 'add'])->name('add.product');
Route::post('insert/product', [ProductController::class, 'insert'])->name('insert.product');
Route::get('edit/product/{id}', [ProductController::class, 'edit'])->name('edit.product');
Route::post('update/product/{id}', [ProductController::class, 'update'])->name('update.product');
Route::get('softdelete/product/{id}', [ProductController::class, 'softdelete'])->name('softdelete.product');
Route::get('trash/product', [ProductController::class, 'trash'])->name('trash.product');
Route::get('recycle/product/{id}', [ProductController::class, 'recycle'])->name('recycle.product');
Route::get('delete/product/{id}', [ProductController::class, 'delete'])->name('delete.product');
