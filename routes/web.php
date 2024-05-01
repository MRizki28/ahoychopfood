<?php

use App\Http\Controllers\CMS\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('FE.base');
});

Route::get('/cms/be/category', function () {
    return view('BE.pages.category');
});

Route::get('v1/category/', [CategoryController::class , 'getAllData']);
Route::post('v1/category/create', [CategoryController::class , 'createData']);
