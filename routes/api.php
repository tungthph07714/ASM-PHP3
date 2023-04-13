<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('list-key-word/', [HomePageController::class, 'listPost']);
Route::post('key/create', [HomePageController::class, 'createKey']);
Route::get('key/detail-key/{id}', [HomePageController::class, 'detailKey']);
Route::put('key/update/{id}', [HomePageController::class, 'updatelKey']);
Route::delete('key/delete/{id}', [HomePageController::class, 'deleteKey']);

Route::get('category/list', [HomePageController::class, 'listCate']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
