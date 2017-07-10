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


// Product Routes
Route::get('product/create', 'ProductController@create')->name('product.create');
Route::get('product/{product}-{slug?}', 'ProductController@show')->name('product.show');

Route::resource('product', 'ProductController', ['except' => ['show', 'create']]);
Route::get('api/products-data', 'ApiController@productsIndex');

// Item Routes
Route::get('item/create', 'ItemController@create')->name('item.create');
Route::get('item/{item}-{slug?}', 'ItemController@show')->name('item.show');

Route::resource('item', 'ItemController', ['except' => ['show', 'create']]);
Route::get('api/items-data', 'ApiController@itemsIndex');

// Category Routes
Route::get('category/create', 'CategoryController@create')->name('category.create');
Route::get('category/{category}-{slug?}', 'CategoryController@show')->name('category.show');

Route::resource('category', 'CategoryController', ['except' => ['show', 'create']]);
Route::get('api/categories-data', 'ApiController@categoriesIndex');

// Order Routes
Route::get('order/create', 'OrderController@create')->name('order.create');
Route::get('order/{order}-{slug?}', 'OrderController@show')->name('order.show');

Route::resource('order', 'OrderController', ['except' => ['show', 'create']]);
Route::get('api/orders-data', 'ApiController@ordersIndex');

//test route
Route::get('test', 'TestController@index');
