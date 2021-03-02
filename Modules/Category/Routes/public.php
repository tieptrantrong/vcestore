<?php

use Illuminate\Support\Facades\Route;

Route::get('vendors', 'CategoryController@index')->name('categories.index');
Route::get('vendors/{category}', 'CategoryProductController@index')->name('categories.products.index');
