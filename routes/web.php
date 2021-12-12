<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatappdController;
use App\Http\Controllers\Frontend\BerandaController;
use App\Http\Controllers\Frontend\TiketController;
use App\Http\Controllers\Frontend\UserController as FrontendUserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
// user auth
Route::get('login-front',[FrontendUserController::class,'create'])
       ->middleware('guest')
       ->name('login.front');
Route::post('login-front/proses',[FrontendUserController::class,'store'])
       ->middleware('guest')
       ->name('login_front.store');
Route::get('/edit-profil/{id}',[FrontendUserController::class,'edit'])
        ->middleware(['auth','role:user'])
        ->name('login_front.edit');
Route::put('/edit-profil/update/{id}',[FrontendUserController::class,'update'])
        ->middleware(['auth','role:user'])
        ->name('login_front.update');
Route::get('logout-user/{id}',[FrontendUserController::class,'destroy'])
        ->middleware(['auth','role:user'])
        ->name('login_front.destroy');
Route::middleware(['auth','role:user'])->group(function(){
    Route::resource('/kirim-tiket', TiketController::class);
    Route::get('download-data/{file}',[TiketController::class,'download'])->name('download.user');
});


// user
Route::get('/', [BerandaController::class, 'index'])->name('index.user');
Route::get('/artikel', [BerandaController::class, 'artikel'])->name('artikel.user');
Route::get('/detail/{slug}', [BerandaController::class, 'detail'])->name('detail.user');

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
