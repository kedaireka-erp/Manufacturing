<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        $jurusans = Jurusan::all();

        $mhsLakilaki = DB::table('mahasiswas')
                        ->where('jenis_kelamin','=','laki-laki')
                        ->get();
        $mhsPerempuan = DB::table('mahasiswas')
                        ->where('jenis_kelamin','=','perempuan')
                        ->get();

        $jumlahMahasiswa = count($mahasiswas);
        $jumlahJurusan = count($jurusans);
        $jumlahLakilaki = count($mhsLakilaki);
        $jumlahPerempuan = count($mhsPerempuan);
        
        return view('dashboard')->with([
            'mahasiswas' => $mahasiswas,
            'jurusans' => $jurusans,
            'jumlahMahasiswa' => $jumlahMahasiswa,
            'jumlahJurusan' => $jumlahJurusan,
            'jumlahLakilaki' =>$jumlahLakilaki,
            'jumlahPerempuan' =>$jumlahPerempuan
        ]);
    }
}
