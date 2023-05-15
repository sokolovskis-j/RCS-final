<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::middleware(["auth"])->group(function() {
    Route::get("/dashboard", function () {
        return view("dashboard", [
            "title" => "Dashboard",
        ]);
    })->name("dashboard");

    Route::get("dashboard/users", function () {
        return view("dashboard.users.main", [
            "title" => "Users",
        ]);
    })->name("users");
});




Route::middleware(["web"])->group(function () {
    Route::get("/", [HomeController::class, "home"]);
    Route::get("/login", [AuthController::class, "loginView"])->name("login");
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
