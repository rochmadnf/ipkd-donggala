<?php

use App\Http\Controllers\UploadFileController;
use App\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', Livewire\WelcomePage::class)->name('welcome');
Route::get('/attachments', Livewire\DataPage::class)->name('attachments');


Route::get('/upload/9c94cf62-c338-498e-9f94-089cbfaad100', [UploadFileController::class, 'index'])->name('upload.file');
Route::post('/upload/9c94cf62-c338-498e-9f94-089cbfaad100', [UploadFileController::class, 'store'])->name('store.file');
