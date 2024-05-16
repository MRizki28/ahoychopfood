<?php

use App\Http\Controllers\CMS\AuthController;
use App\Http\Controllers\CMS\InformationController;
use App\Http\Controllers\CMS\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('FE.base');
});

Route::middleware('guest')->group(function () {
    Route::get('cms/be/login', function () {
        return view('Auth.Login');
    })->name('login');
});

Route::prefix('v1/auth')->controller(AuthController::class)->group(function () {
    Route::post('/login',              'login');
    Route::post('/logout',             'logout');
});

Route::get('v1/menu/', [MenuController::class, 'getAllData']);
Route::get('v1/information/', [InformationController::class, 'getData']);

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/cms/be/menu', function () {
        return view('BE.pages.menu');
    });

    Route::get('/cms/be/information', function () {
        return view('BE.pages.information');
    });

    Route::prefix('v1')->group(function () {

        Route::prefix('menu')->controller(MenuController::class)->group(function () {
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });

        Route::prefix('information')->controller(InformationController::class)->group(function () {
            Route::post('/create', 'createData');
            Route::get('/get/{id}', 'getDataById');
            Route::post('/update/{id}', 'updateData');
            Route::delete('/delete/{id}', 'deleteData');
        });
    });

});

