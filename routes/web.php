<?php

use App\Http\Controllers\ManufactureController;
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

Route::get("/fppp", [ManufactureController::class, "index"]);
Route::get("/fppp/file", [ManufactureController::class, "show_file"]);
Route::post("/fppp", [ManufactureController::class, "store"]);
Route::post("/fppp/delete", [ManufactureController::class, "delete_file"]);
