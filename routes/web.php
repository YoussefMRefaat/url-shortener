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

Route::get('/links/', function () {
    return view('home');
});

Route::get('/links/{code}' , [\App\Http\Controllers\LinkController::class , 'get'])
    ->where('code' , '[A-z0-9]*');

Route::post('/links/' , [\App\Http\Controllers\LinkController::class , 'shorten']);

Route::fallback(function(){
    return redirect('/links/');
});
