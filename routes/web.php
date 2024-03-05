<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Homepage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/iletisim','App\Http\Controllers\Front\Homepage@contact')->name('contact');
Route::get('/','App\Http\Controllers\Front\Homepage@index')->name('homepage');
Route::get('/kategori/{category}','App\Http\Controllers\Front\Homepage@category')->name('category');

Route::get('/{category}/{slug}','App\Http\Controllers\Front\Homepage@single')->name('single');
