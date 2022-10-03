<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\SubkonController;
use App\Http\Controllers\DetailfpppController;
use App\Http\Controllers\PerunitController;
use App\Http\Controllers\PerProjectController;

use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\ManufactureController;
use App\Http\Controllers\MonitoringController;

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
    return redirect('/leads');
});

route::get("/show1", function () {
    return view("manufaktur.show");
});
// route::get("/", function () {
//     return view("items.index");
// });
// Route::get(function () {
//     echo "Hello";
// });

//Route leads
Route::controller(LeadController::class)->group(function () {
    Route::get('/leads', 'index')->name('leads');
    Route::get('/lead/create', 'create')->name('createLead');
    Route::post('/lead/store', 'store')->name('storeLead');
    Route::get('/lead/edit/{id}', 'edit')->name('editLead');
    Route::post('/lead/update/{id}', 'update')->name('updateLead');
    Route::get('/lead/delete/{id}', 'destroy')->name('deleteLead');
    Route::get('/lead/trash', 'trash');
    Route::post('/lead/restore/{id}', 'restore');
    Route::get('/lead/search', 'search');
});
//Route Subkons
Route::controller(SubkonController::class)->group(function () {
    Route::get('/subkons', 'index')->name('subkons');
    Route::get('/subkon/create', 'create')->name('createSubkon');
    Route::post('/subkon/store', 'store')->name('storeSubkon');
    Route::get('/subkon/edit/{id}', 'edit')->name('editSubkon');
    Route::post('/subkon/update/{id}', 'update')->name('updateSubkon');
    Route::get('/subkon/delete/{id}', 'destroy')->name('deleteSubkon');
    Route::get('/subkon/trash', 'trash');
    Route::get('/subkon/restore/{id}', 'restore');
    Route::get('/subkon/search', 'search');
});



// route::get("/manufacture", function () {
//     return view("items.index");
// });

// Route Surat Jalan (Logistic)
Route::controller(LogisticController::class)->group(function () {
    Route::get('/logistic', 'index')->name('logistic_index');
    Route::get('/logistic/create', 'create')->name('logistic_create');
    Route::get('/logistic/show', 'show')->name('logistic_show');
});


// Route FPPP
Route::controller(ManufactureController::class)->group(function () {
    Route::get("/manufactures", "index");
    Route::post("/manufactures", "store");
    Route::get("/manufactures/delete", "delete");
    // Route::get("/manufactures/show", "show");
    Route::get('/manufactures/{id}', 'show')->name("manufactures.show");
    Route::get('/manufactures/detail/{manufacture}', 'detail')->name("manufactures.detail");
});


// route::get("/", [ItemController::class, "index"]);
// route::get("/create", [ItemController::class, "create"])->name("create");
// route::post("/store", [ItemController::class, "store"])->name("store");
// route::get("/show", [ItemController::class, "show"])->name("show");
// route::post("/update/{id}", [ItemController::class, "update"])->name("update");
// route::delete("/destroy/{id}", [ItemController::class, "destroy"])->name("destroy");

route::get("/perproject", [PerProjectController::class, "index"]);

route::get("/detailfppp", [DetailfpppController::class, "index"]);
route::get("/perunit", [PerunitController::class, "index"]);
Route::controller(WorkOrderController::class)->group(function () {
    Route::post('/update-cutting', 'update_cutting')->name("update-cutting");
    Route::post('/update-machining', 'update_machining')->name("update-machining");
    Route::post('/update-assembly1', 'update_assembly1')->name("update-assembly1");
    Route::post('/update-assembly2', 'update_assembly2')->name("update-assembly2");
    Route::post('/update-assembly3', 'update_assembly3')->name("update-assembly3");
    Route::post('/create-qc', 'create_qc')->name("create-qc");
    Route::post('/update-packing', 'update_packing')->name("update-packing");
});


//monitoring
Route::controller(MonitoringController::class)->group(function(){
    Route::get('/monitoringperproject','indexPerProject');
    Route::get('/monitoringperunit/{id}','indexPerUnit');
    Route::get('/search-project','searchPerProject');
    Route::get('/search-unit/{id}','searchPerUnit');
});
