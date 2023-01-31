<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('product', 'ProductCrudController');
    Route::crud('brand', 'BrandCrudController');
    Route::crud('product-categorie', 'ProductCategorieCrudController');
    Route::crud('eav-attribute', 'EavAttributeCrudController');
    Route::crud('eav-attributes-categories', 'EavAttributesCategoriesCrudController');
    Route::crud('eav-attributes-values', 'EavAttributesValuesCrudController');
    Route::crud('eav-enums', 'EavEnumsCrudController');
    Route::crud('product-image', 'ProductImageCrudController');
}); // this should be the absolute last line of this file