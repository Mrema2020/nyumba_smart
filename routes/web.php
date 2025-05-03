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

