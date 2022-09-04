<?php

use App\Http\Controllers\LeadController;
use App\Http\Controllers\SubkonController;
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
    return view('tests.index');
});
//Route leads
Route::controller(LeadController::class)->group(function(){
    Route::get('/leads','index');
    Route::get('/createleads','create');
    Route::post('/storeleads','store');
    Route::get('/editleads/{id}','edit');
    Route::post('/updateleads/{id}','update');
    Route::get('/deleteLeads/{id}','destroy');
    Route::get('/lead/trash','trash');
    Route::post('/lead/{id}/restore','restore');
    Route::get('/searchAjax','search');
});
//Route Subkons
Route::controller(SubkonController::class)->group(function(){
    Route::get('/subkons','index');
    Route::get('/createsubkon','create');
    Route::post('/storesubkon','store');
    Route::get('/editsubkon/{id}','edit');
    Route::post('/updatesubkon/{id}','update');
    Route::get('/deletesubkon/{id}','destroy');
    Route::get('/subkon/trash','trash');
    Route::get('/subkon/{id}/restore','restore');
    Route::get('/serachAjax','search');
});
