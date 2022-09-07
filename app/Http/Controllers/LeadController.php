<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::paginate(5);
       
        return view('master.lead.index')->with('leads',$leads);
    }
    public function create()
    {
        return view('master.lead.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'employee_number' => 'required',
            'lead_name' => 'required'
        ]);

        $newLeads = new Lead();

        $newLeads->employee_number = $request->employee_number;
        $newLeads->lead_name = $request->lead_name;
        $newLeads->is_active = $request->is_active;

        $newLeads->save();

        return redirect('/leads');
    }
    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('master.lead.edit')->with('lead',$lead);
    } 
    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $lead->update([
            'employee_number' => $request->employee_number,
            'lead_name' => $request->lead_name,
            'is_active' => $request->is_active
        ]);

        return redirect('/leads');
    }
    
    //soft delete
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect('/leads');
    }
    public function trash()
    {
        $leads = Lead::onlyTrashed()->paginate(5);
        
        return view('',compact('leads'));
    }
    public function restore($id)
    {
        $lead = Lead::onlyTrashed()->findOrFail($id);
        $lead->restore();

        return to_route('')->with('success','lead restore successfully');
    }
    

    //search with ajax
    public function search(Request $request)
    {
        
        if ($request->ajax()) {
            $output="";
         
            $leads = DB::table('leads')->where('deleted_at',null)->Where('lead_name','LIKE','%'.$request->search."%")->paginate(6);

            if ($leads) {
                foreach ($leads as $key => $lead) {
                    if ($lead->is_active == 1) {
                        $is_active = 'Active';
                    }else{
                        $is_active = 'Inactive';
                    }

                    $output.='<tr class="text-center">'.
                    '<td>'.$lead->employee_number.'</td>'.
                    '<td>'.$lead->lead_name.'</td>'.
                    '<td>'.$is_active.'</td>'.
                    
                    '<td>
                        <a class="btn btn-success" style="font-size: 10px" href="/editleads/'.$lead->id.'">Edit</a>
                        <a class="btn btn-danger" style="font-size: 10px" href="/deleteLeads/'.$lead->id.'">Delete</a>
                    </td>'.
                    '</tr>';
                }
                return Response($output);
                //dd($output);
            }
        }
    }
}
