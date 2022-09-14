<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
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
            return
                redirect("manufactures")->with("failed", "File format harus ." . $mimes);
        }
        $fppp = Manufacture::find($request->id);
        if ($fppp["file_" . $request->type] != null) {
            Storage::delete($fppp["file_" . $request->type]);
        }
        $file_path = $request->file("file")->store($request->type);
        $fppp->update(["file_" . $request->type => $file_path]);
        return redirect("manufactures")->with("success", "Sukses upload file!");
    }

    public function show()
    {
    }

    public function delete(Request $request)
    {
        $fppp = Manufacture::find($request->id);
        Storage::delete($request->path);
        $fppp["file_" . $request->type] = null;
        $fppp->save();

        return redirect("/manufactures");
    }

    public function show_file(Request $request)
    {
        // dd($request->path);
        // return response()->file($request->path);
        return Storage::download($request->path);
    }
}
