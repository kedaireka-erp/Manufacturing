<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
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
Route::group(['Middleware' => 'Auth'], function(){

    

});






Auth::routes();

Route::get('/',function ()
{
    return view('auth.login');
});
Route::get('/Dashboard', [DashboardController::class,'index']);

Route::get('/dataMahasiswa', [MahasiswaController::class,'index']);
Route::get('/tambah', function(){
    $jurusans = Jurusan::all();
    $kelas = Kelas::all();

    return view('tambah')->with([
        'jurusans'=>$jurusans,
        'kelas'=>$kelas
    ]);
});
Route::post('/tambahData',[MahasiswaController::class,'tambah']);
Route::get('/edit/{id_mahasiswa}',[MahasiswaController::class,'edit'])->name('editDataMahasiswa');
Route::post('/update/{id_mahasiswa}',[MahasiswaController::class,'update'])->name('updateDataMahasiswa');
Route::get('/delete/{id}',[MahasiswaController::class,'destroy'])->name('deleteDataMahasiswa');


//jurusan
Route::get('/jurusan',[JurusanController::class,'index']);
Route::get('/tambahJurusan', function(){
    return view('tambahJurusan');
});
Route::post('/tambahDataJurusan',[JurusanController::class,'tambah']);
Route::get('/delete/jurusan/{id_jurusan}',[JurusanController::class,'destroy'])->name('deleteJurusan');

//search
Route::get('/search',[MahasiswaController::class,'search']);



