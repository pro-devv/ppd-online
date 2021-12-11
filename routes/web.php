<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatappdController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth','role:admin'])->group(function () {
    Route::get('/administrator', [DashboardController::class,'index'])->name('admin.index');
    Route::prefix('administrator')->group(function () {
        // banner
        Route::resource('/banner', BannerController::class);
        // artikel
        Route::resource('/artikel', ArtikelController::class);
        // Data PPD
        Route::resource('/data-ppd', DatappdController::class);
        // Route::get('/data-ppd',[DatappdController::class,'index'])->name('data-ppd.index');
        // user
        Route::get('/user', [UserController::class,'index'])->name('user.index');
        Route::get('/user/{id}', [UserController::class,'destroy'])->name('user.destroy');

    });
});

require __DIR__.'/auth.php';
