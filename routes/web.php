<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PropertiesController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/', function () {
    return view('auth.login');
});

Route::view('home', 'home')
->middleware('auth')
->name('home');

Route::post('logout', function(){
    Auth::guard('web')->logout();

    Session::invalidate();
    Session::regenerateToken();

    return redirect('/');

})->name('logout');

Route::view('register', 'register')->name('register');

Route::post('register', RegisterController::class)->name('register.store');

Route::post('login', LoginController::class)
->middleware('throttle:5,1')
->name('login.attempt');

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

route::post('/add_region', [PropertiesController::class, 'add_region']);

route::post('/edit_region', [PropertiesController::class, 'edit_region']);

route::get('/delete_region/{id}', [PropertiesController::class, 'delete_region']);

route::get('/districts', [PropertiesController::class, 'districts']);

route::post('/add_district', [PropertiesController::class, 'add_district']);

route::post('/edit_district', [PropertiesController::class, 'edit_district']);

route::get('/delete_district/{id}', [PropertiesController::class, 'delete_district']);

route::get('/wards', [PropertiesController::class, 'wards']);

route::post('/add_ward', [PropertiesController::class, 'add_ward']);

route::post('/edit_ward', [PropertiesController::class, 'edit_ward']);

route::get('/delete_ward/{id}', [PropertiesController::class, 'delete_ward']);



