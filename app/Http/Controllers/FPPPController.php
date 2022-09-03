<?php

namespace App\Http\Controllers;

use App\Models\FPPP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class FPPPController extends Controller
{
    //
    public function index()
    {
        $all_fppp = FPPP::latest("updated_at");

        return view("sementara.fppp.index", [
            "all_fppp" => $all_fppp->search(request(["search"]))->paginate(5)
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "file" => ["required", "mimes:pdf,xlsx"]
        ]);
        if ($validator->fails()) {
            return
                redirect("fppp")->with("failed", "File format must be .pdf or .xlsx");
        }
        $fppp = FPPP::find($request->id);
        if ($fppp["file_" . $request->type] != null) {
            Storage::delete($fppp["file_" . $request->type]);
        }
        $file_path = $request->file("file")->store($request->type);
        $fppp->update(["file_" . $request->type => $file_path]);
        return redirect("fppp")->with("success", "success uploading file");
    }

    public function show()
    {
    }

    public function delete_file(Request $request)
    {
        $fppp = FPPP::find($request->id);
        Storage::delete($request->path);
        $fppp["file_" . $request->type] = null;
        $fppp->save();

        return redirect("/fppp");
    }

    public function show_file(Request $request)
    {
        // dd($request->path);
        // return response()->file($request->path);
        return Storage::download($request->path);
    }
}
