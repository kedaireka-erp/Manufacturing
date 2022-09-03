<?php

use App\Http\Controllers\FPPPController;
use App\Models\FPPP;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/fppp", [FPPPController::class, "index"]);
Route::get("/fppp/file", [FPPPController::class, "show_file"]);
Route::post("/fppp", [FPPPController::class, "store"]);
Route::post("/fppp/delete", [FPPPController::class, "delete_file"]);
