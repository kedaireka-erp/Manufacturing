<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SubkonController;
use App\Http\Controllers\PerunitController;
use App\Http\Controllers\LogisticController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WorkOrderController;
use App\Http\Controllers\DetailfpppController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\PerProjectController;
use App\Http\Controllers\ManufactureController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name("login");
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name("logout");
    route::get("/welcome", 'welcome')->name("welcome");
});


Route::middleware([])->group(function () {
    Route::get('/', function () {
        return redirect('/welcome');
    });

    Route::get("/show1/{id}", [ManufactureController::class, "show"]);
    // route::get("/", function () {
    //     return view("items.index");
    // });
    // Route::get(function () {
    //     echo "Hello";
    // });

    // Confirm
    Route::get('/confirm', function () {
        return view("login.welcome");
    });


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
        Route::get('/logistic/show/{id}', 'show')->name('logistic_show');
        Route::post('/logistic/store', 'store')->name('logistic_store');
        Route::get('/logistic/delete/{id}', 'destroy')->name('logistic_destroy');
        Route::get('/logistic/getItemColor/{id}', 'getItemColor')->name('logistic_get_item_color'); // item color
        Route::get('/logistic/getQuotation/{id}', 'getQuotation')->name('logistic_get_quotation');
        Route::get('/logistic/getDropdownItems/{id}', 'getDropdownItems')->name('logistic_get_dropdown_items'); // get items by fppp's id for dropdown
        Route::get('/logistic/handleChangeStatus/{id}', 'handleChangeStatus')->name('logistic_handle_change_status');
        Route::get('/logistic/search', 'logisticSearch')->name('logistic_search');
        Route::get('/logistic/generatePDF/{id}', 'generatePDF')->name('logistic_generate_pdf');
    });


    // Route FPPP
    Route::controller(ManufactureController::class)->group(function () {
        Route::get("/manufactures", "index")->name("manufactures");
        Route::post("/manufactures", "store");
        //Route::get("/manufactures/delete", "delete");
        // Route::get("/manufactures/show", "show");
        Route::get('/manufactures/{id}', 'show')->name("manufactures.show");
        Route::get('/manufactures/detail/{manufacture}', 'detail')->name("manufactures.detail");
        Route::get('/manufactures/detail/pdf/{fppp}', 'toPdf')->name("manufactures.detail.pdf");
    });


    // route::get("/", [ItemController::class, "index"]);
    // route::get("/create", [ItemController::class, "create"])->name("create");
    // route::post("/store", [ItemController::class, "store"])->name("store");
    // route::get("/show", [ItemController::class, "show"])->name("show");
    // route::post("/update/{id}", [ItemController::class, "update"])->name("update");
    // route::delete("/destroy/{id}", [ItemController::class, "destroy"])->name("destroy");


    route::get("/detailfppp", [DetailfpppController::class, "index"]);
    route::get("/perunit", [PerunitController::class, "index"]);
    Route::controller(WorkOrderController::class)->group(function () {
        Route::post('/update-kaca', 'update_kaca')->name("update-kaca");
        Route::post('/update-cutting', 'update_cutting')->name("update-cutting");
        Route::post('/update-machining', 'update_machining')->name("update-machining");
        Route::post('/update-assembly1', 'update_assembly1')->name("update-assembly1");
        Route::post('/update-assembly2', 'update_assembly2')->name("update-assembly2");
        Route::post('/update-assembly3', 'update_assembly3')->name("update-assembly3");
        Route::post('/create-qc', 'create_qc')->name("create-qc");
        Route::post('/update-packing', 'update_packing')->name("update-packing");
        Route::post('/update-keterangan', 'update_keterangan')->name("update-keterangan");
    });


    //monitoring
    Route::controller(MonitoringController::class)->group(function () {
        Route::get('/monitoring', 'indexPerProject');
        Route::get('/monitoring/{id}', 'indexPerUnit');
        Route::get('/search-project', 'searchPerProject');
        Route::get('/search-unit/{id}', 'searchPerUnit');
    });

    route::get("/dashboard", [DashboardController::class, "index"]);
    Route::get("/logs", [LogActivityController::class, "index"]);
});
