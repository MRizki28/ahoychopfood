<?php

use App\Http\Controllers\CMS\InformationController;
use App\Http\Controllers\CMS\MenuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('FE.base');
});


Route::get('/cms/be/menu', function () {
    return view('BE.pages.menu');
});


Route::prefix('v1')->group(function () {

    Route::prefix('menu')->controller(MenuController::class)->group(function() {
        Route::get('/' , 'getAllData');
        Route::post('/create' , 'createData');
    });

    Route::prefix('information')->controller(InformationController::class)->group(function() {
        Route::get('/' , 'getAllData');
        Route::post('/create' , 'createData');
    });
});
