<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodappController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;


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

Route::get('/', function () {
    return view('home');
});



// MyOrders Page
Route::get('/customerOrder', [OrderController::class, 'customerOrder']);
Route::post('/customerOrder', [OrderController::class, 'customerOrder']);

// AdminPage
Route::resource('admin', FoodappController::class)->middleware('auth', 'isadmin');
Route::get('/manageOrder', [OrderController::class, 'order']);


//Show Menus ke halaman utama dan order
Route::get('/', [FoodappController::class, 'showMenus'])->name('menus');
Route::post('/order/{id}', [OrderController::class, 'saveOrder'])->name('saveOrder');
Route::get('/order/{id}', [OrderController::class, 'showOrderForm'])->name('order');


// LoginPage
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);


Route::post('/logout', [LoginController::class, 'logout']);


// RegisterPage
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
