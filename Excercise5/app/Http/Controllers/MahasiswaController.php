<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        //Eloquent Raw Queri

        //iner join
            // $mahasiswas = DB::table('mahasiswas')
            //               ->join('jurusans','mahasiswas.id_jurusan','=','jurusans.id_jurusan')
            //               ->select('mahasiswas.*','jurusans.nama_jurusan as jurusan_nama')
            //               ->get();

        // Eloquent ORM
                 $mahasiswas = Mahasiswa::with('jurusan')->get();
       // dd($mahasiswas);
        return view('dataMahasiswa')->with('mahasiswas',$mahasiswas);
    }
    public function tambah (Request $request)
    {
        $newMahasiswa = new Mahasiswa();

        $newMahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $newMahasiswa->id_jurusan = $request->id_jurusan;
        $newMahasiswa->id_kelas = $request->id_kelas;
        $newMahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $newMahasiswa->no_telepon = $request->no_telepon;
        $newMahasiswa->save();

        return redirect('/dataMahasiswa');
    }
    public function edit ($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id)
;        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        return view('update')->with([
            'mahasiswa'=>$mahasiswa,
            'jurusans' =>$jurusans,
            'kelas' =>$kelas
        ]);
    }
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->update([
            'nama_mahasiswa' => $request->nama_mahasiswa ?? $mahasiswa->nama_mahasiswa,
            'id_jurusan' => $request->id_jurusan ?? $mahasiswa->id_jurusan,
            'id_kelas' => $request->id_kelas ?? $mahasiswa->id_kelas,
            'jenis_kelamin' => $request->jenis_kelamin ?? $mahasiswa->jenis_kelamin,
            'no_telepon' => $request->no_telepon ?? $mahasiswa->no_telepon
        ]);

        return redirect('/dataMahasiswa');
    }
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        $mahasiswa->delete();
        return redirect('/dataMahasiswa');
    }

    //search
    public function search(Request $request)
    {
        
        if ($request->ajax()) {
            $output="";
          //  $mahasiswas = Mahasiswa::with('jurusan')->where('nama_mahasiswa','LIKE','%'.$request->search.'%')->get();
          //  $mahasiswas=DB::table('mahasiswas')->where('nama_mahasiswa','LIKE','%'.$request->search."%")->get();
            $mahasiswas = Mahasiswa::with('jurusan')->where('nama_mahasiswa','LIKE','%'.$request->search."%")->paginate(6);

            if ($mahasiswas) {
                foreach ($mahasiswas as $key => $mhs) {
                    $output.='<tr>'.
                    '<td>'.$mhs->nama_mahasiswa.'</td>'.
                    '<td>'.$mhs->jenis_kelamin.'</td>'.
                    '<td>'.$mhs->no_telepon.'</td>'.
                    '<td>'.$mhs->jurusan->nama_jurusan.'</td>'.
                    
                    '<td>
                        <a class="btn btn-success" style="font-size: 10px" href="/edit/'.$mhs->id_mahasiswa.'">Edit</a>
                        <a class="btn btn-danger" style="font-size: 10px" href="/delete/'.$mhs->id_mahasiswa.'">Delete</a>
                    </td>'.
                    '</tr>';
                }
                return Response($output);
                //dd($output);
            }
        }
    }

}
