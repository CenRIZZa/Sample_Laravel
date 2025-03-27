<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;  // Add this line at the top

Route::get('/', function () {
    return view('welcome');
});

Route::get('/items', function () {
    $items = DB::table('items')->get();  // This will query your existing items table
    return view('items.index', ['greeting' => 'Hello ', 'items' => $items]);
});