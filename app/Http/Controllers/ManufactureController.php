<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use App\Models\QC;
use App\Models\Subkon;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ManufactureController extends Controller
{
    //
    public function index()
    {
        $all_fppp = Manufacture::latest("updated_at");

        return view("manufacture.fppp.index", [
            "all_fppp" => $all_fppp->search(request(["search"]))->paginate(5)
        ]);
    }

    public function store(Request $request)
    {
        $mimes = "pdf";
        if (str_contains($request->type, "wo")) {
            $mimes = "xlsx";
        }
        $validator = Validator::make($request->all(), [
            "file" => ["required", "mimes:" . $mimes]
        ]);
        if ($validator->fails()) {

            toast("File format untuk {$request->type} harus ." . $mimes, "error");
            return
                redirect("manufactures")->with("failed", "File format untuk {$request->type} harus ." . $mimes);
        }
        $fppp = Manufacture::find($request->id);
        if ($fppp["file_" . $request->type] != null) {
            Storage::delete($fppp["file_" . $request->type]);
        }
        $file_path = $request->file("file")->store($request->type);
        $fppp->update(["file_" . $request->type => $file_path]);
        toast("File berhasil diunggah", "success");
        return redirect("manufactures")->with("success", "Sukses upload file!");
    }

    public function show($id)
    {
        $manufacture    = Manufacture::findOrFail($id);
        $workOrders     = WorkOrder::where("manufacture_id", $manufacture->id)->get();
        $subkons        = Subkon::where("is_active", 1)->get();
        $all_qc         = QC::get();

        $all_wo_id = [];
        foreach ($all_qc as $key => $value) {
            array_push($all_wo_id,$value->work_order_id);
        }

    
        return view("manufacture.fppp.show", compact("manufacture", "workOrders", "subkons", "all_wo_id"));
    }

    public function delete(Request $request)
    {
        $fppp = Manufacture::find($request->id);
        Storage::delete($request->path);
        $fppp["file_" . $request->type] = null;
        $fppp->save();

        toast("File berhasil dihapus", "success");
        return redirect("/manufactures");
    }

    public function show_file(Request $request)
    {
        // dd($request->path);
        // return response()->file($request->path);
        return Storage::download($request->path);
    }
}
