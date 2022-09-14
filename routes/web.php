<?php

use App\Http\Controllers\ManufactureController;
use App\Models\FPPP;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LeadController;


use App\Http\Controllers\SubkonController;
use App\Http\Controllers\PerProjectController;

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
Route::get('/',function() {
    return redirect()->route('/leads');
});

//Route leads
Route::controller(LeadController::class)->group(function(){
    Route::get('/leads','index')->name('leads');
    Route::get('/lead/create','create')->name('createLead');
    Route::post('/lead/store','store')->name('storeLead');
    Route::get('/lead/edit/{id}','edit')->name('editLead');
    Route::post('/lead/update/{id}','update')->name('updateLead');
    Route::get('/lead/delete/{id}','destroy')->name('deleteLead');
    Route::get('/lead/trash','trash');
    Route::post('/lead/restore/{id}','restore');
    Route::get('/lead/search','search');
});
//Route Subkons
Route::controller(SubkonController::class)->group(function(){
    Route::get('/subkons','index')->name('subkons');
    Route::get('/subkon/create','create')->name('createSubkon');
    Route::post('/subkon/store','store')->name('storeSubkon');
    Route::get('/subkon/edit/{id}','edit')->name('editSubkon');
    Route::post('/subkon/update/{id}','update')->name('updateSubkon');
    Route::get('/subkon/delete/{id}','destroy')->name('deleteSubkon');
    Route::get('/subkon/trash','trash');
    Route::get('/subkon/restore/{id}','restore');
    Route::get('/subkon/search','search');
});



// route::get("/manufacture", function () {
//     return view("items.index");
// });

route::get("/perproject", function () {
    return view("manufaktur.perproject");
});


// Route FPPP
Route::controller(ManufactureController::class)->group(function () {
    Route::get("/manufactures", "index");
    Route::post("/manufactures", "store");
    Route::get("/manufactures/delete", "delete");
});


// route::get("/", [ItemController::class, "index"]);
// route::get("/create", [ItemController::class, "create"])->name("create");
// route::post("/store", [ItemController::class, "store"])->name("store");
// route::get("/show", [ItemController::class, "show"])->name("show");
// route::post("/update/{id}", [ItemController::class, "update"])->name("update");
// route::delete("/destroy/{id}", [ItemController::class, "destroy"])->name("destroy");

