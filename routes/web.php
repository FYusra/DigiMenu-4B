<?php

use App\Http\Controllers\KategoriMenuController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsersController;
use App\Models\DetailOpsiMenu;
use App\Models\OpsiMenu;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', function () {
    return view('index');
});


Route::group(['middleware' => ['auth']], function (){
    Route::prefix('users')->name('users.')->group(function (){
        Route::get('/', [UsersController::class, 'index'])->name('index');
        Route::post('/', [UsersController::class, 'store'])->name('store');
        Route::put('/update/{id_user}', [UsersController::class, 'update'])->name('update');
        Route::delete('/{id_user}', [UsersController::class, 'destroy'])->name('destroy');
        Route::get('/change-password', [UsersController::class, 'showChangePassword'])->name('showChangePassword');
        Route::patch('/change-password/{id_user}', [UsersController::class, 'saveChangePassword'])->name('saveChangePassword');
    });

    Route::prefix('kategoriMenu')->name('kategoriMenu.')->group(function (){
        Route::get('/', [KategoriMenuController::class, 'index'])->name('index');
        Route::post('/', [KategoriMenuController::class, 'store'])->name('store');
        Route::put('/update/{id_kategori}', [KategoriMenuController::class, 'update'])->name('update');
        Route::delete('/{id_kategori}', [KategoriMenuController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('menu')->name('menu.')->group(function (){
        Route::get('/', [MenuController::class, 'index'])->name('index');
        Route::post('/', [MenuController::class, 'store'])->name('store');
        Route::put('/update/{id_men
        u}', [MenuController::class, 'update'])->name('update');
        Route::patch('/updateStatus/{id_menu}', [MenuController::class, 'updateStatus'])->name('updateStatus')->middleware('kasir');
        Route::delete('/{id_menu}', [MenuController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('meja')->name('meja.')->group(function (){
        Route::get('/', [MejaController::class, 'index'])->name('index');
        Route::post('/', [MejaController::class, 'store'])->name('store');
        Route::put('/update/{id_meja}', [MejaController::class, 'update'])->name('update');
        Route::patch('/updateStatus/{id_meja}', [MejaController::class, 'updateStatus'])->name('updateStatus')->middleware('kasir');
        Route::delete('/{id_meja}', [MejaController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('opsiMenu')->name('opsiMenu')->group(function (){
        Route::post('/', [OpsiMenu::class, 'store'])->name('store');
        Route::put('/update/{id_opsi}', [OpsiMenu::class, 'update'])->name('update');
        Route::delete('/{id_opsi}', [OpsiMenu::class, 'destroy'])->name('destroy');
    });

    Route::prefix('detailOpsiMenu')->name('detailOpsiMenu')->group(function (){
        Route::post('/', [DetailOpsiMenu::class, 'store'])->name('store');
        Route::put('/update/{id_detail_opsi}', [DetailOpsiMenu::class, 'update'])->name('update');
        Route::delete('/{id_detail_opsi}', [DetailOpsiMenu::class, 'destroy'])->name('destroy');
    });
    
});