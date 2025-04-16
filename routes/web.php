<?php

use App\Http\Controllers\PropertiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

route::get('/all_properties', [PropertiesController::class, 'all_properties']);

route::get('/property_categories', [PropertiesController::class, 'property_categories']);

route::post('/add_category', [PropertiesController::class, 'add_category']);
