<?php


Artisan::call('storage:link');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware(['auth', 'can:accessAdmin'])->group(function(){
    
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'adminIndex'])->name('dashboard');
    Route::get('/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'adminIndex'])->name('dashboard');
    Route::get('/places', [App\Http\Controllers\PlaceController::class, 'adminIndex'])->name('places');
    Route::get('/place/view/{id}', [App\Http\Controllers\PlaceController::class, 'viewPlace'])->name('place');
    Route::post('/addPlace', [App\Http\Controllers\PlaceController::class, 'addPlace'])->name('addPlace');
    Route::get('/users', [App\Http\Controllers\DashboardController::class, 'listUsers'])->name('users');
    Route::get('/sliders', [App\Http\Controllers\SliderController::class, 'list'])->name('sliders');
    Route::get('/adverts', [App\Http\Controllers\AdvertController::class, 'list'])->name('adverts');


    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'getCategories'])->name('categories');
    Route::post('/addCategory', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('addCategory');
});
Route::middleware(['auth', 'can:accessUser'])->group(function(){
    
    
});

// Route::apiResource('/api/categories', CategoryController::class);

Route::get('/api/places/{id}', [App\Http\Controllers\PlaceController::class, 'placesByCategory'])->name('placesByCategory');