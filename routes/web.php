<?php

use App\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', Livewire\WelcomePage::class)->name('welcome');
Route::get('/data', Livewire\DataPage::class)->name('data');
