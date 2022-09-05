<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

// HOME PAGE
Route::get('/', [ HomeController::class, 'index' ]);
Route::get('/redirects', [ HomeController::class, 'redirects']);

// USER FUNCTIONS ROUTE (ADMIN)
Route::get('/users', [ AdminController::class, 'user']);
Route::get('/deleteUser/{id}', [ AdminController::class, 'deleteUser']);

//FOOD MENU ROUTES
Route::get('/foodmenu', [ AdminController::class, 'foodmenu']);
Route::post('/uploadfood', [ AdminController::class, 'uploadfood']);
Route::get('/deletefood/{id}', [AdminController::class, 'deletefood']);
Route::get('/updatefoodview/{id}', [AdminController::class, 'updatefoodview']);
Route::post('/updatefoodaction/{id}', [AdminController::class, 'updatefoodaction']);

//RESERVATION ROUTES
Route::post('/reservation',[AdminController::class, 'makereservation']);
Route::get('/reservations', [AdminController::class, 'viewreservations']);

//CHEFS
Route::get('/chefs' , [AdminController::class, 'viewchefs']);
Route::post('/uploadchef', [AdminController::class, 'uploadchef']);
Route::get('/updatechefview/{id}', [AdminController::class, 'updatechefview']);
Route::post('/updatechefaction/{id}', [AdminController::class, 'updatechefaction']);
Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);

//CART
Route::post('/addtocart/{id}', [HomeController::class, 'addtocart']);
Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
Route::get('/removeorder/{id}', [HomeController::class, 'removeorder']);
Route::post('/orderconfirmation', [HomeController::class, 'confirmorder']);

//ORDERS ROUTES
Route::get('/orders', [AdminController::class, 'vieworders']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
