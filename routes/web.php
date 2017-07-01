<?php

Auth::routes();

// home page route
Route::get('/', 'PagesController@index');

// Supplier Routes
Route::resource('suppliers', 'SupplierController');
Route::get('api/suppliers-data', 'ApiController@index');


//test route
Route::get('test', 'TestController@index');
