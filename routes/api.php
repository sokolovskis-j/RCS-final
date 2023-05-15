<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::post("/login", [AuthController::class, "login"])->middleware("guest");

Route:middleware("auth")->group(function () { 
    Route::get("/logout", [AuthController::class, "logout"]);

    Route::get("/dashboard/users/index", [UsersController::class, "index"]);
});