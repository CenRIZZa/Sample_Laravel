<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB; 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}/update', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}/delete', [ItemController::class, 'delete'])->name('items.delete');


Route::get('add', function () {
    return view('crud.create');
})->name('crud.create');


Route::get('/view', function () {
    return view('crud.index');
})->name('crud.index');
