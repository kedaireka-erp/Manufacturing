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
        $all_fppp = FPPP::get();

        return view("sementara.fppp.index", ["all_fppp" => $all_fppp]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "file" => ["required", "mimes:pdf,xlsx"]
        ]);
        if ($validator->fails()) {
            return back();
        }
        $fppp = FPPP::find($request->id);
        if ($fppp["file_" . $request->type] != null) {
            Storage::delete($fppp["file_" . $request->type]);
        }
        $file_path = $request->file("file")->store($request->type);
        $fppp->update(["file_" . $request->type => $file_path]);
        return redirect("fppp")->with("success", "success");
    }

    public function show()
    {
    }
}
