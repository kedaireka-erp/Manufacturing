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
        $request->validate([
            'employee_number' => 'required',
            'subkon_name' => 'required',
            'lead_name' => 'required'
        ]);

        $subkon = new Subkon();

        $subkon->create([
            'employee_number' => $request->employee_number,
            'subkon_name' => $request->subkon_name,
            'lead_name' => $request->lead_name,
            'is_active' => $request->is_active
        ]);
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
            'lead_name' => $request->lead_name,
            'is_active' => $request->is_active
        ]);
        return redirect('/subkons');
    }

    //soft delete
    public function destroy($id)
    {
        $lead = Subkon::findOrFail($id);
        $lead->delete();

        return redirect('/subkons');
    }
    public function trash()
    {
        $leads = Subkon::onlyTrashed()->paginate(5);

        return view('',compact('leads'));
    }
    public function restore($id)
    {
        $lead = Subkon::onlyTrashed()->findOrFail($id);
        $lead->restore();

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
                    }else{
                        $is_active = 'Inactive';
                    }

                    $output.='<tr class="text-center">'.
                    '<td>'.$subkon->employee_number.'</td>'.
                    '<td>'.$subkon->subkon_name.'</td>'.
                    '<td>'.$subkon->lead_name.'</td>'.
                    '<td>'.$is_active.'</td>'.
                    
                    '<td>
                        <a class="btn btn-success" style="font-size: 10px" href="/editsubkon/'.$subkon->id.'">Edit</a>
                        <a class="btn btn-danger" style="font-size: 10px" href="/deletesubkon/'.$subkon->id.'">Delete</a>
                    </td>'.
                    '</tr>';
                }
                return Response($output);
                //dd($output);
            }
        }
    }
}
