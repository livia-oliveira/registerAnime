<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AnimeCategoryController;
use App\Http\Controllers\AnimeAuthorController;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/animes', [AnimeController::class, 'index']);
Route::post('/animes', [AnimeController::class, 'store']);
Route::put('/animes/{id}', [AnimeController::class, 'update']);
Route::delete('/animes/{id}', [AnimeController::class, 'destroy']);

Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);
Route::put('/authors/{id}', [AuthorController::class, 'update']);
Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

Route::get('/animecategories', [AnimeCategoryController::class, 'index']);
Route::post('/animecategories', [AnimeCategoryController::class, 'store']);
Route::put('/animecategories/{id}', [AnimeCategoryController::class, 'update']);
Route::delete('/animecategories/{id}', [AnimeCategoryController::class, 'destroy']);


Route::get('/animeauthors', [AnimeAuthorController::class, 'index']);
Route::post('/animeauthors', [AnimeAuthorController::class, 'store']);
Route::put('/animeauthors/{id}', [AnimeAuthorController::class, 'update']);
Route::delete('/animeauthors/{id}', [AnimeAuthorController::class, 'destroy']);
