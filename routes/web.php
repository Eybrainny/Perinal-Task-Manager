<?php

use App\Livewire\Pages\HomePage;
use Illuminate\Support\Facades\Route;



Route::get('/', \App\Livewire\TaskManager::class)->name('page.task');
