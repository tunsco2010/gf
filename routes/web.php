<?php

Auth::routes();

// home page route
Route::get('/', 'PagesController@index');

// Supplier Routes
Route::get('supplier/create', 'SupplierController@create')->name('supplier.create');
Route::get('supplier/{supplier}-{slug?}', 'SupplierController@show')->name('supplier.show');

Route::resource('supplier', 'SupplierController', ['except' => ['show', 'create']]);
Route::get('api/suppliers-data', 'ApiController@suppliersIndex');
Route::get('api/suppliers', 'ApiController@suppliersList');

// Customer Routes
Route::get('customer/create', 'CustomerController@create')->name('customer.create');
Route::get('customer/{customer}-{slug?}', 'CustomerController@show')->name('customer.show');

Route::resource('customer', 'CustomerController', ['except' => ['show', 'create']]);
Route::get('api/customers-data', 'ApiController@customersIndex');
Route::get('api/customers', 'ApiController@customersList');


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
Route::get('api/items', 'ApiController@itemsList');

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
Route::get('order/receipt/{id}', 'OrderController@receipt');

// Inventories Routes
Route::group(['prefix' => 'inventory'], function () {
    Route::resource('receiving', 'ReceivingController', ['except' => ['edit', 'update', 'destroy']]);
    Route::resource('adjustment', 'AdjustmentController', ['except' => ['edit', 'update', 'destroy']]);
    Route::get('tracking', 'TrackingController@index');
});

// Health (Feeds) Routes
Route::resource('health/feeds', 'FeedController');
Route::post('health/feeds/store', 'FeedController@store');
Route::post('health/feeds_mass_destroy', ['uses' => 'FeedController@massDestroy', 'as' => 'feeds.mass_destroy']);

// Health (Consumption) Routes
Route::resource('health/consumptions', 'ConsumptionController');
Route::get('health/consumptions/create', 'ConsumptionController@create')->name('consumptions.create');
Route::post('health/consumptions_mass_destroy', ['uses' => 'ConsumptionController@massDestroy', 'as' => 'feeds.mass_destroy']);

Route::resource('health/vacinecategories', 'VacinecategoriesController');
Route::post('health/vacinecategories_mass_destroy', ['uses' => 'VacinecategoriesController@massDestroy', 'as' => 'vacinecategories.mass_destroy']);

Route::resource('health/vacines', 'VacineController');
Route::post('health/vacines_mass_destroy', ['uses' => 'VacineController@massDestroy', 'as' => 'vacines.mass_destroy']);

Route::resource('time_work_types', 'TimeWorkTypesController');
Route::post('time_work_types_mass_destroy', ['uses' => 'TimeWorkTypesController@massDestroy', 'as' => 'time_work_types.mass_destroy']);

Route::resource('time_projects', 'TimeProjectsController');
Route::post('time_projects_mass_destroy', ['uses' => 'TimeProjectsController@massDestroy', 'as' => 'time_projects.mass_destroy']);

Route::resource('time_entries', 'TimeEntriesController');
Route::post('time_entries_mass_destroy', ['uses' => 'TimeEntriesController@massDestroy', 'as' => 'time_entries.mass_destroy']);

Route::resource('time_reports', 'TimeReportsController');


Route::resource('expense_categories', 'ExpenseCategoriesController');
Route::post('expense_categories_mass_destroy', ['uses' => 'ExpenseCategoriesController@massDestroy', 'as' => 'expense_categories.mass_destroy']);

Route::resource('income_categories', 'IncomeCategoriesController');
Route::post('income_categories_mass_destroy', ['uses' => 'IncomeCategoriesController@massDestroy', 'as' => 'income_categories.mass_destroy']);

Route::resource('incomes', 'IncomesController');
Route::post('incomes_mass_destroy', ['uses' => 'IncomesController@massDestroy', 'as' => 'incomes.mass_destroy']);

Route::resource('expenses', 'ExpensesController');
Route::post('expenses_mass_destroy', ['uses' => 'ExpensesController@massDestroy', 'as' => 'expenses.mass_destroy']);

Route::resource('monthly_reports', 'MonthlyReportsController');

Route::resource('faq_categories', 'FaqCategoriesController');
Route::post('faq_categories_mass_destroy', ['uses' => 'FaqCategoriesController@massDestroy', 'as' => 'faq_categories.mass_destroy']);

Route::resource('faq_questions', 'FaqQuestionsController');
Route::post('faq_questions_mass_destroy', ['uses' => 'FaqQuestionsController@massDestroy', 'as' => 'faq_questions.mass_destroy']);

Route::resource('roles', 'RolesController');
Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);

Route::resource('users', 'UsersController');
Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);


//test route
Route::get('test', 'TestController@index');
Route::get('test/user', 'TestController@getUser');
