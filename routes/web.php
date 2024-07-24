<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/attachments', [Controllers\AttachmentController::class, 'index'])->name('attachments');

Route::controller(Controllers\UploadFileController::class)->prefix('uploads')->group(function () {
    Route::get('/', 'index')->name('index.file');
    Route::post('/', 'store')->name('store.file');
});
