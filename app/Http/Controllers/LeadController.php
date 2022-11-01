<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\ManufactureActivity;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::paginate(5);

        return view('master.lead.index')->with('leads', $leads);
    }
    public function create()
    {
        return view('master.lead.create');
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!',
            'unique' => ':attribute sudah digunakan!',
            'numeric' => ':attribute harus angka!'
        ];
        $request->validate([
            'employee_number' => 'required|unique:leads|numeric',
            'lead_name' => 'required',
            'email' => 'unique:users'
        ], $messages);

        $newLeads = new Lead();

        $newLeads->employee_number = $request->employee_number;
        $newLeads->lead_name = $request->lead_name;
        $newLeads->is_active = $request->is_active;

        //register lead to users table
        $user = User::create([
            'name' => $request->lead_name,
            'email' => $request->email . "@alluresystem.site",
            'gender' => $request->gender,
            'active' => $request->is_active,
            'password' => Hash::make("lead1234"),
        ]);
        ManufactureActivity::logActivity("create", $_SERVER['REMOTE_ADDR'], [
            'name' => $request->lead_name,
            'email' => $request->email . "@alluresystem.site",
            'gender' => $request->gender,
            'active' => $request->is_active,
        ], "users");


        $user->assignRole("lead-manufacture");

        event(new Registered($user));
        $newLeads->save();
        ManufactureActivity::logActivity("update", $_SERVER['REMOTE_ADDR'], $newLeads->getChanges(), $newLeads->getTable());

        toast("Data Berhasil Ditambahkan", "success");
        return redirect('/leads');
    }
    public function edit($id)
    {
        $lead = Lead::findOrFail($id);
        return view('master.lead.edit')->with('lead', $lead);
    }
    public function update(Request $request, $id)
    {
        $lead = Lead::findOrFail($id);

        $lead->update([
            'employee_number' => $request->employee_number,
            'lead_name' => $request->lead_name,
            'is_active' => $request->is_active
        ]);
        ManufactureActivity::logActivity("update", $_SERVER['REMOTE_ADDR'], $lead->getChanges(), $lead->getTable());

        toast("Data Berhasil Diupdate", "success");
        return redirect('/leads');
    }

    //soft delete
    public function destroy($id)
    {
        $lead = Lead::findOrFail($id);
        ManufactureActivity::logActivity("delete", $_SERVER['REMOTE_ADDR'], $lead, $lead->getTable());
        $lead->delete();
        toast("Data Berhasil Dihapus", "error");
        return redirect('/leads');
    }
    public function trash()
    {
        $leads = Lead::onlyTrashed()->paginate(5);

        return view('', compact('leads'));
    }
    public function restore($id)
    {
        $lead = Lead::onlyTrashed()->findOrFail($id);
        $lead->restore();

        return to_route('leads')->with('success', 'lead restore successfully');
    }


    //search with ajax
    public function search(Request $request)
    {

        if ($request->ajax()) {
            $output = "";

            $leads = DB::table('leads')->where('deleted_at', null)->Where('lead_name', 'LIKE', '%' . $request->search . "%")->paginate(6);

            if ($leads) {
                foreach ($leads as $key => $lead) {
                    if ($lead->is_active == 1) {
                        $is_active = 'Active';
                        $warna = "success";
                    } else {
                        $is_active = 'Inactive';
                        $warna = "danger";
                    }

                    $output .= '<tr class="text-center">' .
                        '<td>' . $lead->employee_number . '</td>' .
                        '<td>' . $lead->lead_name . '</td>' .
                        '<td><label class="badge badge-' . $warna . '">' . $is_active . '</label></td>' .

                        '<td>
                        <a class="btn btn-success" style="font-size: 10px" href="/lead/edit/' . $lead->id . '">Ubah</a>
                        <button type="button" class="btn btn-danger" onclick="handleDelete(' . $lead->id . ')">Hapus</button>
                    </td>' .
                        '</tr>';
                }
                return Response($output);
                //dd($output);
            }
        }
    }
}
