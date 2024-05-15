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
Route::get('/cms/be/information', function () {
    return view('BE.pages.information');
});


Route::prefix('v1')->group(function () {

    Route::prefix('menu')->controller(MenuController::class)->group(function() {
        Route::get('/' , 'getAllData');
        Route::post('/create' , 'createData');
        Route::get('/get/{id}', 'getDataById');
        Route::post('/update/{id}', 'updateData');
        Route::delete('/delete/{id}', 'deleteData');
    });

    Route::prefix('information')->controller(InformationController::class)->group(function() {
        Route::get('/' , 'getData');
        Route::post('/create' , 'createData');
        Route::get('/captcha', 'getCapthcaBumn');
    });
});
