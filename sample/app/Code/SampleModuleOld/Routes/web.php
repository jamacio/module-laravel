<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('sample_module_old::myIndex');
});
