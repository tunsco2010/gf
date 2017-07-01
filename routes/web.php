<?php

Auth::routes();

// home page route
Route::get('/', 'PagesController@index');

// Supplier Routes
Route::get('supplier/create', 'SupplierController@create')->name('supplier.create');
Route::get('supplier/{supplier}-{slug?}', 'SupplierController@show')->name('supplier.show');

Route::resource('supplier', 'SupplierController', ['except' => ['show', 'create']]);
Route::get('api/suppliers-data', 'ApiController@suppliersIndex');

// Customer Routes
Route::get('customer/create', 'CustomerController@create')->name('customer.create');
Route::get('customer/{customer}-{slug?}', 'CustomerController@show')->name('customer.show');

Route::resource('customer', 'CustomerController', ['except' => ['show', 'create']]);
Route::get('api/customers-data', 'ApiController@customersIndex');


//test route
Route::get('test', 'TestController@index');
