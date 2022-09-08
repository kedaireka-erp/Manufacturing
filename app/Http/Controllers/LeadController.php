<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::paginate(2);
       
        return view('')->with('leads',$leads);
    }
    public function create()
    {
        return view();
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

        return redirect('');
    }
    public function edit($id)
    {
        $lead = Lead::findOrFaill($id);
        return view('')->with('lead',$lead);
    } 
    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFaill($id);

        $lead->update([
            'employee_number' => $request->employee_number,
            'lead_name' => $request->lead_name,
            'is_active' => $request->is_active
        ]);

        return redirect('');
    }
    
    //soft delete
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        $lead->delete();

        return redirect('');
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
         
            $leads = DB::table('leads')->where('employee_number','LIKE','%'.$request->search."%")->paginate(6);

            if ($leads) {
                foreach ($leads as $key => $lead) {
                    $output.='<tr>'.
                    '<td>'.$lead->employee_number.'</td>'.
                    '<td>'.$lead->lead_name.'</td>'.
                    '<td>'.$lead->is_active.'</td>'.
                    
                    '<td>
                        <a class="btn btn-success" style="font-size: 10px" href="/edit/'.$lead->id.'">Edit</a>
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
