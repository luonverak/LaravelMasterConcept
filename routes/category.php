<?php

use App\Http\Controllers\Category\CategoryController;
use Illuminate\Support\Facades\Route;

Route::post('/add-category', [CategoryController::class, 'addCategory']);
