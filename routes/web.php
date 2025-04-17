<?php

use App\Http\Controllers\PropertiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

route::get('/all_properties', [PropertiesController::class, 'all_properties']);

route::get('/property_categories', [PropertiesController::class, 'property_categories']);

route::post('/add_category', [PropertiesController::class, 'add_category']);

route::post('/edit_property', [PropertiesController::class, 'edit_property']);

route::get('/delete_property_category/{id}', [PropertiesController::class, 'delete_property_category']);

route::get('/view_property_type', [PropertiesController::class, 'view_property_type']);

route::post('/add_category_type', [PropertiesController::class, 'add_category_type']);

route::post('/edit_property_type', [PropertiesController::class, 'edit_property_type']);

route::get('/delete_property_type/{id}', [PropertiesController::class, 'delete_property_type']);

route::post('/add_property', [PropertiesController::class, 'add_property']);

route::get('/regions', [PropertiesController::class, 'regions']);

