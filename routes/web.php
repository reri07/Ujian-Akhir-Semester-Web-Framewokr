<?php

use App\Http\Controllers\BokingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageController;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function () {
    $title = "Login";
    return view("auth.login", compact("title"));
});

Route::resource("/login", \App\Http\Controllers\LoginController::class);
Route::resource("/register", \App\Http\Controllers\RegisterController::class);
Route::post("auth", [LoginController::class, "auth"])->name("auth");
Route::resource("/space", \App\Http\Controllers\SpaceWorkController::class);
Route::resource("/manage", \App\Http\Controllers\ManageController::class);
Route::resource("/boking", \App\Http\Controllers\BokingController::class);
Route::resource("/history", \App\Http\Controllers\HistoryController::class);
Route::resource("/about", \App\Http\Controllers\AboutController::class);
Route::resource("/checkout", \App\Http\Controllers\CheckOutController::class);
Route::get("logout", [LoginController::class, "logout"])->name("logout");
Route::get("/order/{id}", [BokingController::class, "show"])->name("show");
Route::post("/checkout/{id_space}", [BokingController::class, "store"])->name(
    "store"
);
// Route::post('/manage/{id_space}', [ManageController::class, 'update'])->name('update');
Route::get("/destroy/{id_space}", [ManageController::class, "destroy"])->name(
    "destroy"
);
Route::get("/payment/{id_boking}", [ManageController::class, "payment"])->name(
    "payment"
);
