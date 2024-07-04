<?php

use App\Http\Controllers\Logo\LogoController;
use Illuminate\Support\Facades\Route;

Route::post("/logo", [LogoController::class, "getLogo"]);
Route::post("/logo-upload", [LogoController::class, "uploadLogo"]);
