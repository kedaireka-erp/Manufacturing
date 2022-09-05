<?php

use App\Http\Controllers\ItemController;
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

// Route::get('/', function () {
//     return view('tests.index');
// });

route::get("/", [ItemController::class, "index"]);
route::get("/create", [ItemController::class, "create"])->name("create");
route::post("/store", [ItemController::class, "store"])->name("store");
route::get("/show", [ItemController::class, "show"])->name("show");
// route::post("/update/{id}", [ItemController::class, "update"])->name("update");
// route::delete("/destroy/{id}", [ItemController::class, "destroy"])->name("destroy");