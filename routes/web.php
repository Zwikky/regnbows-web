<?php


Artisan::call('storage:link');

use Illuminate\Support\Facades\Route;
use App\Mail\MailtrapExample;
use App\Http\Controllers;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Mail;
use Monolog\Handler\SwiftMailerHandler;

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
    
    // Route::get('/', [App\Http\Controllers\DashboardController::class, 'adminIndex'])->name('dashboard');
    
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'adminIndex'])->name('dashboard');
    Route::get('/places', [App\Http\Controllers\PlaceController::class, 'adminIndex'])->name('places');
    Route::get('/place/view/{id}', [App\Http\Controllers\PlaceController::class, 'viewPlace'])->name('place');
    Route::post('/addPlace', [App\Http\Controllers\PlaceController::class, 'addPlace'])->name('addPlace');
    Route::get('/users', [App\Http\Controllers\DashboardController::class, 'listUsers'])->name('users');
    Route::get('/sliders', [App\Http\Controllers\SliderController::class, 'list'])->name('sliders');
    Route::post('/addSlider', [App\Http\Controllers\SliderController::class, 'addSlider'])->name('addSlider');

    Route::get('/adverts', [App\Http\Controllers\AdvertController::class, 'list'])->name('adverts');
    Route::post('/createAdvert', [App\Http\Controllers\AdvertController::class, 'createAdvert'])->name('createAdvert');

    Route::get('/reviews', [App\Http\Controllers\ReviewsController::class, 'list'])->name('reviews');

    Route::get('/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('logout');

    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'getCategories'])->name('categories');
    Route::post('/addCategory', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('addCategory');
});
Route::middleware(['auth', 'can:accessUser'])->group(function(){
    
    // Route::get('/', [App\Http\Controllers\DashboardController::class, 'userIndex'])->name('user-dashboard');
    // Route::get('/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('user-logout');

    //-----------PLACES / BUSINESSES-----------------\\    
    Route::get('/user/places', [App\Http\Controllers\PlaceController::class, 'userIndex'])->name('user-places');
    Route::get('/user/place/view/{id}', [App\Http\Controllers\PlaceController::class, 'viewPlace'])->name('user-view-place');
    Route::post('/user/addPlace', [App\Http\Controllers\PlaceController::class, 'userAddPlace'])->name('user-add-place');

    //-----------MANAGE SLIDERS-----------------\\
    Route::get('/user/sliders', [App\Http\Controllers\SliderController::class, 'userSlider'])->name('user-sliders');
    Route::post('/user/addSlider', [App\Http\Controllers\SliderController::class, 'userAddSlider'])->name('user-add-slider');

    //-----------MANAGE ADVERTS---------------\\
    Route::get('/user/adverts', [App\Http\Controllers\AdvertController::class, 'userAdverts'])->name('user-adverts');
    Route::post('/user/create/advert', [App\Http\Controllers\AdvertController::class, 'createAdvert'])->name('user-create-advert');

    //-----------DASHBOARD-------------\\
    Route::get('/user/dashboard', [App\Http\Controllers\DashboardController::class, 'userIndex'])->name('user-dashboard');
    Route::get('/user/logout', [App\Http\Controllers\DashboardController::class, 'logout'])->name('user-logout');

    //-----------REVIEWS--------------\\
    Route::get('/user/reviews', [App\Http\Controllers\ReviewsController::class, 'userReviews'])->name('user-reviews');

    
});

// Route::apiResource('/api/categories', CategoryController::class);

Route::get('/api/places/{id}', [App\Http\Controllers\PlaceController::class, 'placesByCategory'])->name('placesByCategory');