<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    //
    public function index()
    {
        $jurusans = Jurusan::all();

        return view('jurusan')->with('jurusans',$jurusans);
    }
    public function tambah(Request $request)
    {
        $newJurusan = new Jurusan();

        $newJurusan->nama_jurusan = $request->nama_jurusan;
        $newJurusan->save();

        return redirect('/jurusan');
    }
    public function destroy ($id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $jurusan->delete();
        return redirect('/jurusan');
    }
}
