<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController as Home;
use App\Http\Controllers\ControlPostController as HomeController;
use App\Http\Controllers\Admin\AcountController;
use App\Http\Controllers\Category\CategoryController;
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


Route::get('/', [Home::class, 'homePage'])->name('home');
Route::get('detail-news/{id}', [Home::class, 'detailNews'])->name('detail-news');
Route::post('detail-news/{id}', [Home::class, 'addComment']);

Route::get('create-post', [Home::class, 'createNewsPost']);
Route::post('create-post', [Home::class, 'saveNewsPost']);

Route::get('browse-post', [HomeController::class, 'browsePost'])->name('browse-post');
Route::put('browse-post/{id}', [HomeController::class, 'upgratePost']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //manage acount
    Route::get('acount', [acountController::class, 'manageAdmin'])->name('manageAdmin');
    Route::get('create-acount', [acountController::class, 'createAcount'])->name('create-acount');
    Route::post('create-acount', [acountController::class, 'saveAcount']);
    Route::post('/disable-account/{id}', [acountController::class, 'disableAccount']);
    Route::get('/auth-account/{id}', [acountController::class, 'authAccount']);
    Route::post('/auth-account/{id}', [acountController::class, 'saveAuthAccount']);
    Route::post('/enable-account/{id}', [acountController::class, 'enableAccount']);

    //manege category
    Route::get('category', [CategoryController::class, 'manageCategory'])->name('manageCategory');
});

require __DIR__ . '/auth.php';
