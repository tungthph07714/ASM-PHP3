<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController as Home;
use App\Http\Controllers\ControlPostController as HomeController;

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

Route::get('/', [Home::class, 'homePage'])->name('home');
Route::get('detail-news/{id}', [Home::class, 'detailNews'])->name('detail-news');
Route::post('detail-news/{id}', [Home::class, 'addComment']);

Route::get('create-post', [Home::class, 'createNewsPost']);
Route::post('create-post', [Home::class, 'saveNewsPost']);

Route::get('browse-post', [HomeController::class, 'browsePost'])->name('browse-post');
Route::put('browse-post/{id}', [HomeController::class, 'upgratePost']);
