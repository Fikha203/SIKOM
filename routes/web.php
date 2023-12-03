<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login", [AuthController::class, "index"])->name("login")->middleware("guest");
Route::post("/login", [AuthController::class, "authenticate"])->middleware("guest");
Route::get("/register", [AuthController::class, "indexRegister"])->middleware("guest");
Route::post("/register", [AuthController::class, "register"])->middleware("guest");
Route::get("/logout", [AuthController::class, "logout"])->middleware("auth");

Route::group(["middleware" => 'auth', "prefix" => "dashboard"], function () {
    // Dashboard
    Route::get("/", [DashboardPengajuanController::class, 'create']);

    Route::resource('/pengajuans', DashboardPengajuanController::class);

    // // Sluggable check
    // Route::get("/complaints/checkSlug", [DashboardComplaintController::class, "checkSlug"])->middleware("student");
    // Route::get("/categories/checkSlug", [DashboardAdminCategoryController::class, "checkSlug"])->middleware("admin");

    // // Complaint
    // Route::resource("/complaints", DashboardComplaintController::class)->middleware("auth");
    // // Response
    // Route::put("/response/update-status", [DashboardResponseController::class, "updateStatus"])->middleware("response");
    // Route::resource("/responses", DashboardResponseController::class)->middleware("response")->except(["create"]);
    // Route::get("/responses/create/{complaint:slug}", [DashboardResponseController::class, "create"])->middleware("response");
    // // Category
    // Route::resource("/categories", DashboardAdminCategoryController::class)->middleware("admin")->except(["show"]);
    // // User
    // Route::resource("/users", DashboardUserController::class)->middleware("adminOrOfficer")->except(["create"]);
    // // Website settings
    // Route::get("/website", [DashboardSettingController::class, "index"])->middleware("admin");
    // Route::put("/website", [DashboardSettingController::class, "update"])->middleware("admin");
});

// Keluhan kamu gagal dibuat.SQLSTATE[01000]: Warning: 1265 Data truncated for column 'lembaga' at row 1 (Connection: mysql, SQL: insert into `pengajuans` (`no_kendali`, `judul`, `jenis`, `tipe`, `pendanaan`, `lembaga`, `nama_ketua`, `nim_ketua`, `no_ketua`, `bentuk`, `no_rek`, `status`, `mahasiswa_id`, `updated_at`, `created_at`) values (fafasf, fafasfa, lpj, baru, dana, Badan Eksekutif Mahasiswa, fafaf, fasfasf, fasfaf, kegiatam, fsafaf, diproses, 1, 2023-12-03 15:58:48, 2023-12-03 15:58:48))
