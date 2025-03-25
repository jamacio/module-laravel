<?php

use Illuminate\Support\Facades\Route;
use App\Code\SampleModule\Controllers\SampleModuleController;

Route::prefix('sample-module')->group(function () {
    Route::get('/', [SampleModuleController::class, 'index']);
});
