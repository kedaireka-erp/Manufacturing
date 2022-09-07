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
        
        return view('',compact('subkons'));
    }
    public function create()
    {
        return view('');
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
        return redirect('');
    }
    public function edit($id)
    {
        $subkon = Subkon::findOrFail($id);

        return view('',compact('subkon'));
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
        return redirect('');
    }

    //soft delete
    public function destroy($id)
    {
        $lead = Subkon::findOrFail($id);
        $lead->delete();

        return redirect('');
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

        return to_route('subkons.index')->with('success','lead restore successfully');
    }
    

    //search with ajax
    public function search(Request $request)
    {
        
        if ($request->ajax()) {
            $output="";
         
            $subkons = DB::table('subkons')->where('employee_number','LIKE','%'.$request->search."%")->paginate(6);

            if ($subkons) {
                foreach ($subkons as $key => $subkon) {
                    $output.='<tr>'.
                    '<td>'.$subkon->employee_number.'</td>'.
                    '<td>'.$subkon->subkon_name.'</td>'.
                    '<td>'.$subkon->lead_name.'</td>'.
                    '<td>'.$subkon->is_active.'</td>'.
                    
                    '<td>
                        <a class="btn btn-success" style="font-size: 10px" href="/edit/'.$subkon->id.'">Edit</a>
                        <a class="btn btn-danger" style="font-size: 10px" href="/deleteLeads/'.$subkon->id.'">Delete</a>
                    </td>'.
                    '</tr>';
                }
                return Response($output);
                //dd($output);
            }
        }
    }
}
