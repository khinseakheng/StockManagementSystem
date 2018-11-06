<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('/product-branch','ProductBrachCrudController');
    CRUD::resource('/product-spec','ProductSpecCrudController');
    CRUD::resource('/product-category','ProductCategoryCrudController');
    CRUD::resource('/product-group','ProductGroupCrudController');
    CRUD::resource('/product-unit','ProductUnitCrudController');
    CRUD::resource('/product-warehouse','ProductWarehouseCrudController');
    CRUD::resource('/currency','CurrencyCrudController');
    CRUD::resource('/tax-group','TaxGroupCrudController');
    CRUD::resource('/product-inventory','ProductInventoryCrudController');
    
    
}); // this should be the absolute last line of this file
