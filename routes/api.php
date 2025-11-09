<?php

use Illuminate\Support\Facades\Route;

Route::get('/get-path', [\App\Http\Controllers\UploadFileController::class, 'getFilePath'])->name('getPath.file');
