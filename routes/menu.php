<?php

use App\Http\Controllers\Menu\MenuController;
use Illuminate\Support\Facades\Route;

Route::post("/get-menu", [MenuController::class, "getMenu"]);
Route::post("/add-menu", [MenuController::class, "addMenu"]);
Route::post("/delete-menu", [MenuController::class, "deleteMenu"]);
Route::post("/update-menu", [MenuController::class, "updateMenu"]);
