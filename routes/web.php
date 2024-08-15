<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.main');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/services', function (){
    return view('services', [
        "tagline" => "What our serve",
        "image" => "delivery.jpg"
    ]);
});

Route::get('/menus', function () {
    return view('menus', [
        "menus" => "Double Cheese Burger",
        "description" => "A burger with double cheese",
        "image" => "pizza.jpg"
    ]);
});
