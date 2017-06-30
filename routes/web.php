<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('suppliers', 'SupplierController');
Route::get('api/suppliers-data', 'ApiController@index');



Route::resource('customers', 'CustomerController');

Route::resource('products', 'ProductController');
