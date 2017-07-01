<?php

Auth::routes();

// home page route
Route::get('/', 'PagesController@index');

// Supplier Routes
Route::get('supplier/create', 'SupplierController@create')->name('supplier.create');
Route::get('supplier/{supplier}-{slug?}', 'SupplierController@show')->name('supplier.show');

Route::resource('supplier', 'SupplierController', ['except' => ['show', 'create']]);
Route::get('api/suppliers-data', 'ApiController@index');

//test route
Route::get('test', 'TestController@index');
