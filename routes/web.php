<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('FE.base');
});

Route::get('/cms/be/category', function () {
    return view('BE.pages.category');
});
