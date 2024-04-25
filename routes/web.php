<?php

use App\Http\Controllers\KomentarFotoController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [GalleryController::class, 'index']);

Route::get('/dashboard', function () {
    return view('admin/dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'index']);
});


Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::resource('/admin/data-foto', FotoController::class)->middleware('auth');
Route::resource('/admin/album', AlbumController::class)->middleware('auth');
Route::get('/detail/{fotoId}', [FotoController::class, 'show']);
Route::get('/detail/{photoId}/like', [LikeController::class, 'like']);
Route::post('/detail/{id}', [KomentarFotoController::class, 'storeComment']);


require __DIR__.'/auth.php';
