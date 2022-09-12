<?php

namespace App\Http\Controllers;

use App\Models\Subkon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubkonController extends Controller
{
    public function index()
    {
        $subkons = Subkon::paginate(5);
        
        return view('master.subkon.index',compact('subkons'));
    }
    public function create()
    {
        return view('master.subkon.create');
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'unique' => ':attribute sudah digunakan!'
        ];
        $request->validate([
            'employee_number' => 'required|unique:subkons',
            'subkon_name' => 'required',
        ],$messages);

        $subkon = new Subkon();

        $subkon->create([
            'employee_number' => $request->employee_number,
            'subkon_name' => $request->subkon_name,
            'is_active' => $request->is_active
        ]);
        toast("Data Berhasil Ditambahkan","success");
        return redirect('/subkons');
    }
    public function edit($id)
    {
        $subkon = Subkon::findOrFail($id);

        return view('master.subkon.edit',compact('subkon'));
    }
    public function update(Request $request,$id)
    {
        $subkon = Subkon::findOrFail($id);

        $subkon->update([
            'employee_number' => $request->employee_number,
            'subkon_name' => $request->subkon_name,
            'is_active' => $request->is_active
        ]);
        toast("Data Berhasil Diupdate","success");
        return redirect('/subkons');
    }

    //soft delete
    public function destroy($id)
    {
        $subkon = Subkon::findOrFail($id);
        $subkon->delete();
        toast("Data Berhasil Dihapus","error");
        return redirect('/subkons');
    }
    public function trash()
    {
        $subkons = Subkon::onlyTrashed()->paginate(5);

        return view('',compact('subkons'));
    }
    public function restore($id)
    {
        $subkon = Subkon::onlyTrashed()->findOrFail($id);
        $subkon->restore();

        return to_route('master.subkon.index')->with('success','lead restore successfully');
    }
    

    //search with ajax
    public function search(Request $request)
    {
        
        if ($request->ajax()) {
            $output="";
         
            $subkons = DB::table('subkons')->where('deleted_at',null)->Where('subkon_name','LIKE','%'.$request->search."%")->paginate(6);

            if ($subkons) {
                foreach ($subkons as $key => $subkon) {
                    if ($subkon->is_active == 1) {
                        $is_active = 'Active';
                        $warna = "success";
                    }else{
                        $is_active = 'Inactive';
                        $warna = "danger";
                    }

                    $output.='<tr class="text-center">'.
                    '<td>'.$subkon->employee_number.'</td>'.
                    '<td>'.$subkon->subkon_name.'</td>'.
                    '<td><label class="badge badge-'.$warna.'">'.$is_active.'</label></td>'.
                    
                    '<td>
                            <a class="btn btn-success" style="font-size: 10px" href="/subkon/edit/'.$subkon->id.'">Ubah</a>
                            <button type="button" class="btn btn-danger" onclick="handleDelete('. $subkon->id.')" >Hapus</button>
                    </td>'.
                    '</tr>';
                }
                return Response($output);
                //dd($output);
            }
        }
    }
}
