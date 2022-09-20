<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\IndexController;
use App\Http\Controllers\Blog\ViewController;
use App\Http\Controllers\Comment\CreateController;
use App\Http\Controllers\Blog\DeleteController;
use App\Http\Controllers\Blog\GetCreateController;
use App\Http\Controllers\Blog\PostCreateController;
use App\Http\Controllers\Blog\GetUpdateController;
use App\Http\Controllers\Blog\PostUpdateController;
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

Route::get('/', [IndexController::class, 'handle'])->name('blog.index');
Route::group(['prefix' => 'blog'], function () {
    Route::get('{id}', [ViewController::class, 'handle'])->name('blog.view');
    Route::delete('{id}', [DeleteController::class, 'handle'])->middleware(['auth'])->name('blog.delete');
    Route::get('create/new', [GetCreateController::class, 'handle'])->middleware(['auth'])->name('blog.create');
    Route::post('create/new', [PostCreateController::class, 'handle'])->middleware(['auth'])->name('blog.store');
    Route::get('update/{id}', [GetUpdateController::class, 'handle'])->middleware(['auth'])->name('blog.get.update');
    Route::post('update/{id}', [PostUpdateController::class, 'handle'])->middleware(['auth'])->name('blog.post.update');
});

Route::group(['prefix' => 'comment'], function () {
    Route::post('/', [CreateController::class, 'handle'])->name('comment.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
