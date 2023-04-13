<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController as Home;
use App\Http\Controllers\ControlPostController;
use App\Http\Controllers\Admin\AcountController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\SocialShareButtonsController;
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

Route::get('/social-media-share', [SocialShareButtonsController::class, 'ShareWidget']);
Route::post('detail-news/{id}', [Home::class, 'addComment']);
Route::post('reply-comment/{id}', [Home::class, 'replyComment']);

Route::middleware(['auth', 'mod'])->group(function () {


    Route::get('/infomation', [Home::class, 'infomation'])->name('infomation');
    Route::post('/change-info/{id}', [Home::class, 'changeInfo']);

    Route::post('/search', [Home::class, 'searchPost']);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware(['auth', 'mod'])->group(function () {
    Route::get('post', [PostController::class, 'listPost'])->name('listPost');
    Route::get('create-post', [Home::class, 'createNewsPost']);
    Route::post('create-post', [Home::class, 'saveNewsPost']);
});

Route::middleware(['auth', 'admin'])->group(function () {
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
    Route::get('create-category', [CategoryController::class, 'createCategory'])->name('createCategory');
    Route::post('/create-category', [CategoryController::class, 'saveCategory']);
    Route::post('/disable-category/{id}', [CategoryController::class, 'disableCategory']);
    Route::post('/enable-category/{id}', [CategoryController::class, 'enableCategory']);
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/edit-category/{id}', [CategoryController::class, 'saveEditCategory']);

    //manage post

    Route::post('/remove-post/{id}', [PostController::class, 'removePost']);
    Route::post('/push-post/{id}', [PostController::class, 'pushPost']);
    Route::get('browse-post', [ControlPostController::class, 'browsePost'])->name('browse-post');
    Route::put('browse-post/{id}', [ControlPostController::class, 'upgratePost']);

    //manage key words
    Route::get('key-words/', [Home::class, 'listKey']);

    Route::get('/detail-category/{id}', [Home::class, 'detailCategory']);

    //manage acount


});


require __DIR__ . '/auth.php';
