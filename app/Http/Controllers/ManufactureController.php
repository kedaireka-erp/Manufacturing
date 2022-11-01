<?php

namespace App\Http\Controllers;

use App\Models\Fppp;
use App\Models\Manufacture;
use App\Models\ManufactureActivity;
use App\Models\QC;
use App\Models\Subkon;
use App\Models\WorkOrder;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;




// use PDF;



class ManufactureController extends Controller
{
    //
    public function index()
    {
        $all_fppp = Fppp::with(["quotation"])->where("acc_produksi", "ACCEPT")->latest("updated_at");

        return view("manufacture.fppp.index", [
            "all_fppp" => $all_fppp->search(request(["search"]))->paginate(5)
        ]);
    }

    public function store(Request $request)
    {
        if ($request->type == null) {
            toast("Tidak dapat upload file", "error");
            return redirect("manufactures")->with("success", "Sukses upload file!");
        }
        $mimes = "xlsx";
        if ($request->type == "wo_potong_alumunium") {
            $mimes = "pdf";
        }

        $validator = Validator::make($request->all(), [
            "file" => ["required", "mimes:" . $mimes]
        ]);
        if ($validator->fails()) {

            toast("File format untuk {$request->type} harus ." . $mimes, "error");
            return
                redirect("manufactures")->with("failed", "File format untuk {$request->type} harus ." . $mimes);
        }
        $fppp = Fppp::find($request->id);
        if ($fppp["file_" . $request->type] != null) {
            Storage::delete($fppp["file_" . $request->type]);
        }
        $file_path = $request->file("file")->store($request->type);
        if ($request->type == "detail_wo") {
            $excel_data = $this->read_excel(Storage::path($file_path));
            foreach ($excel_data as $row) {
                WorkOrder::create([
                    "fppp_id" => $request->id,
                    "kode_op" => $row[0],
                    "kode_unit" => $row[1],
                    "nama_item" => $row[2],
                    "last_process" => "queued"
                ]);
            }
        }
        $new_value = ["file_" . $request->type => $file_path];

        ManufactureActivity::logActivity("update", $request->ip(), $new_value, $fppp->getTable());
        $fppp->update($new_value);
        toast("File berhasil diunggah", "success");
        return redirect("manufactures")->with("success", "Sukses upload file!");
    }

    // public function show(Request $request)
    // {
    //     $work_orders = WorkOrder::where("manufacture_id", $request->id)->get();
    //     echo "<table>";
    //     echo "<tr>";
    //     echo "<th>Kode OP</th>";
    //     echo "<th>Kode Unit</th>";
    //     echo "<th>Item</th>";
    //     echo "<th>Glass Spec</th>";
    //     echo "</tr>";
    //     foreach ($work_orders as $key => $wo) {
    //         echo "<tr>";
    //         echo "<td>{$wo->kode_op}</td>";
    //         echo "<td>{$wo->kode_unit}</td>";
    //         echo "<td>{$wo->nama_item}</td>";
    //         echo "<td>{$wo->jenis_kaca}</td>";
    //         echo "</tr>";
    //     }
    //     echo "</table>";
    public function show($id)
    {
        $manufacture    = Fppp::findOrFail($id);
        $workOrders     = WorkOrder::with("qcs")->where("fppp_id", $manufacture->id)->get();
        // dd($workOrders);
        $subkons        = Subkon::where("is_active", 1)->get();

        $qc_statuses = [];
        foreach ($workOrders as $key => $value) {
            $qc_status = [];
            foreach ($value->qcs as $qc) {
                array_push($qc_status, $qc->status);
            }
            $qc_statuses[$key] = $qc_status;
        }

        // dd($qc_statuses);



        return view("manufacture.fppp.show", compact("manufacture", "workOrders", "subkons", "qc_statuses"));
    }

    public function detail(Fppp $manufacture)
    {
        $workOrders = WorkOrder::where("fppp_id", $manufacture->id)->get();
        $allItemStr = "";
        foreach ($workOrders as $key => $value) {
            $allItemStr = $allItemStr . $value->kode_unit . ", ";
        }


        return view("manufacture.fppp.detail", ["manufacture" => $manufacture, "workOrders" => $workOrders, "kodeItems" => $allItemStr]);
    }

    public function toPdf(Fppp $fppp)
    {
        $workOrders = WorkOrder::where("fppp_id", $fppp->id)->get();
        $allItemStr = "";
        foreach ($workOrders as $key => $value) {
            $allItemStr = $allItemStr . $value->kode_unit . ", ";
        }

        $pdf = Pdf::loadView('manufacture.fppp.pdf', ["manufacture" => $fppp, "workOrders" => $workOrders, "kodeItems" => $allItemStr]);
        return $pdf->download($fppp->fppp_no . '.pdf');
        // return view('manufacture.fppp.pdf', ["manufacture" => $fppp, "workOrders" => $workOrders]);
    }

    /*public function delete(Request $request)
    {
        $fppp = Fppp::find($request->id);
        $work_orders = WorkOrder::where("fppp_id", $fppp->id)->get();

        foreach ($work_orders as $wo) {
            $wo->delete();
        }

        Storage::delete($request->path);
        $fppp["file_" . $request->type] = null;
        $fppp->save();

        toast("File berhasil dihapus", "success");
        return redirect("/manufactures");
    }*/

    public function show_file(Request $request)
    {
        // dd($request->path);
        // return response()->file($request->path);
        //return Storage::download($request->path);
        $inputFileName = Storage::path($request->path);

        /** Create a new Xls Reader  **/
        //$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xml();
        //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Ods();
        //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Slk();
        //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Gnumeric();
        //    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($inputFileName);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $i = 1;

        // unset($sheetData[0]);

        foreach ($sheetData as $t => $r) {
            // process element here;
            // access column by index
            dump($r);
            //echo $i . "---" . $t[0] . "," . $t[1] . ",{$t[2]} <br>";
            $i++;
        }
    }

    private function read_excel($file_path)
    {
        // dd($request->path);
        // return response()->file($request->path);
        //return Storage::download($request->path);
        $input_fileName = $file_path;

        /** Create a new Xls Reader  **/
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        /** Load $inputFileName to a Spreadsheet Object  **/
        $spreadsheet = $reader->load($input_fileName);
        $sheet_data = $spreadsheet->getActiveSheet()->toArray();

        $i = 1;

        unset($sheet_data[0]);

        return $sheet_data;
    }
}
