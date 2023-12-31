<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('articles/{article}', [HomeController::class, 'show'])->name('articles.show');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('categories', CategoriesController::class);
    });

    Route::get('list-articles', [ArticleController::class, 'listArticles'])->name('list-articles');
    Route::get('list-articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('list-articles/create', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('list-articles/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('list-articles/edit/{article}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('list-articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});
