<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardPengajuanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');
Route::get("/login", [AuthController::class, "index"])->name("login")->middleware("guest");
Route::post("/login", [AuthController::class, "authenticate"])->middleware("guest");
Route::get("/register", [AuthController::class, "indexRegister"])->middleware("guest");
Route::post("/register", [AuthController::class, "register"])->middleware("guest");
Route::get("/logout", [AuthController::class, "logout"])->middleware("auth");

Route::group(["middleware" => 'auth', "prefix" => "dashboard"], function () {
    // Dashboard
    Route::get("/", [DashboardPengajuanController::class, 'create']);
    
    Route::get('/pengajuans/download/{filepath}', [DashboardPengajuanController::class, 'download'])->where('filepath', '.*');;

    Route::resource('/pengajuans', DashboardPengajuanController::class);
    
   
});

Route::resource('/users', UserController::class)->middleware("auth");   
