<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

Route::get('/', [Controllers\WelcomeController::class, 'index'])->name('welcome');

Route::get('/attachments', [Controllers\AttachmentController::class, 'index'])->name('attachments');

Route::controller(Controllers\UploadFileController::class)->prefix('uploads')->group(function () {

    $randKey = config('upload-file.key');

    Route::get("/key=$randKey", 'index')->name('index.file');
    Route::post("/key=$randKey", 'store')->name('store.file');
});
