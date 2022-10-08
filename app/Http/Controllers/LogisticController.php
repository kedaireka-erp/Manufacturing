<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LogisticController extends Controller
{
    public function index()
    {
        $getLogistics = Logistic::select('logistics.id', 'no_logistic', 'fppp.id as fppp_id', 'fppp.FPPP_no', 'tgl_berangkat', 'driver')
            ->join('fppps as fppp', 'logistics.fppp_id', '=', 'fppp.id')
            ->orderBy('logistics.updated_at', 'desc')
            ->paginate(5);

        // $getQuotations = DB::table('fppps')
        //     ->select('fppps.id as fppp_id', 'quotations.id as quotation_id', 'fppp_no', 'proyek_quotations.no_quotation')
        //     ->join('quotations', 'fppps.quotation_id', '=', 'quotations.id')
        //     ->join('proyek_quotations', 'quotations.proyek_quotation_id', '=', 'proyek_quotations.id')
        //     ->get();

        $getStatus = DB::table('work_orders as wo')
            ->select('wo.id as wo_id', 'lwo.logistic_id as l_id', 'wo.last_process as last_process')
            ->join('logistic_work_order as lwo', 'wo.id', 'lwo.work_order_id')
            ->get();

        $getQtyPacking = DB::table('work_orders')
            ->selectRaw('lwo.logistic_id as l_id, sum(work_orders.qty_packing) as total')
            ->join('logistic_work_order as lwo', 'work_orders.id', '=', 'lwo.work_order_id')
            ->groupBy('lwo.logistic_id')
            ->get();
        // dd($getStatus);
        return view('logistic.index', compact('getLogistics', 'getQtyPacking', 'getStatus'));
    }

    public function create()
    {
        $getFppps = DB::table('fppps')
            ->select('id', 'FPPP_no')
            ->orderBy('FPPP_no', 'desc')
            ->get();

        return view('logistic.create', compact('getFppps'));
    }

    public function store(Request $request)
    {
        // validate request
        $validate = Validator::make($request->all(), [
            'departDate' => 'required',
            'fppp' => 'required',
            'quotation' => 'required',
            'driver' => 'required',
            'plateNumber' => 'required',
            'address' => 'required',
        ], [
            'required' => ':attribute wajib diisi!',
        ]);
        if ($validate->fails()) {
            toast("Harap isi seluruh data dengan benar!", "error")->timerProgressBar();
            return back()->withInput();
        }

        // if there is no item added
        if (!$request->items) {
            toast("Belum ada barang yang ditambahkan!", "error")->timerProgressBar();
            return redirect()->back()->withInput();
        }

        $lastId = DB::table('logistics')->max('id');

        $logistic = Logistic::create([
            'fppp_id' => $request->fppp,
            'no_logistic' => $lastId + 1 . '/AST/' . date('m') . '/' . date('Y'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'tgl_berangkat' => $request->departDate,
            'driver' => strtolower($request->driver),
            'no_polisi' => strtoupper($request->plateNumber),
            'alamat' => $request->address
        ]);

        $getItems = collect($request->input('items', []));

        // change 'last_process' to 'on delivery'
        foreach ($getItems as $key => $item) {
            $wo = WorkOrder::find($key);
            $wo->update([
                "last_process" => 'on delivery',
            ]);
        }

        $items = collect($request->input('items', []))
            ->map(function ($item) {
                if ($item['description']) {
                    return ['keterangan' => $item['description']];
                } else {
                    return ['keterangan' => null];
                }
            });

        $logistic->workOrder()->sync(
            $items
        );

        toast("Surat Jalan ({$logistic->no_logistic}) berhasil dibuat", "success")->timerProgressBar();
        return redirect("logistic");
    }

    public function show($id)
    {
        $logistic = Logistic::find($id);

        if ($logistic) {
            $getLogistic = DB::table('logistics')
                ->select('logistics.*', 'fppps.fppp_no')
                ->join('fppps', 'logistics.fppp_id', '=', 'fppps.id')
                ->where('logistics.id', '=', $id)
                ->first();

            $getQuotationNo = DB::table('fppps')
                ->select('pq.no_quotation', 'quotations.id as q_id')
                ->join('quotations', 'fppps.quotation_id', 'quotations.id')
                ->where('fppps.id', '=', $getLogistic->fppp_id)
                ->join('proyek_quotations as pq', 'quotations.proyek_quotation_id', '=', 'pq.id')
                ->first();

            $getItems = DB::table('logistic_work_order')
                ->select('wo.nama_item as nama_item', 'fppps.color as warna', 'logistic_work_order.keterangan as keterangan', 'wo.qty_packing as qty')
                ->join('work_orders as wo', 'logistic_work_order.work_order_id', '=', 'wo.id')
                ->where('logistic_work_order.logistic_id', '=', $id)
                ->join('fppps', 'wo.fppp_id', '=', 'fppps.id')
                ->get();

            $getTotalQty = DB::table('work_orders')
                ->selectRaw('sum(work_orders.qty_packing) as total')
                ->join('logistic_work_order as lwo', 'work_orders.id', '=', 'lwo.work_order_id')
                ->where('lwo.logistic_id', '=', $id)
                ->groupBy('lwo.logistic_id')
                ->first();

            $getAplicator = DB::table('quotations')
                ->select('ma.aplikator as nama', 'ma.alamat', 'ma.kontak')
                ->where('quotations.id', '=', $getQuotationNo->q_id)
                ->join('master_aplikators as ma', 'quotations.aplikator_id', '=', 'ma.id')
                ->first();

            // dd($getAplicator);
            return view('logistic.show', compact('getLogistic', 'getQuotationNo', 'getItems', 'getTotalQty', 'getAplicator'));
        } else {
            toast("Surat Jalan tidak ditemukan!", "error")->timerProgressBar();
            return redirect('logistic');
        }
    }

    public function edit(Logistic $logistic)
    {
        //
    }

    public function update(Request $request, Logistic $logistic)
    {
        //
    }

    public function destroy($id)
    {
        $logistic = Logistic::find($id);

        if ($logistic) {
            $getItemsId = DB::table('work_orders as wo')
                ->select('wo.id as id', 'lwo.logistic_id')
                ->where('lwo.logistic_id', '=', $id)
                ->join('logistic_work_order as lwo', 'lwo.work_order_id', '=', 'wo.id')
                ->get();

            $items = collect($getItemsId);

            // change 'last_process' to 'packing'
            foreach ($items as $item) {
                $wo = WorkOrder::find($item->id);
                $wo->update([
                    "last_process" => 'packing',
                ]);
            }
            $logistic->delete(); // soft delete

            $msg = "Surat Jalan ({$logistic->no_logistic}) berhasil dihapus!";
            $msgStatus = "success";
        } else {
            $msg = "Surat Jalan gagal dihapus!";
            $msgStatus = "error";
        }

        toast($msg, $msgStatus)->timerProgressBar();
        return redirect()->back();
    }

    public function getDropdownItems($id)
    {
        $getItems = DB::table('work_orders as wo')
            ->select('fppps.color as warna', 'wo.id as id', 'wo.kode_op as kode_op', 'wo.nama_item as nama_item', 'wo.qty_packing as qty_packing')
            ->join('fppps', 'wo.fppp_id', '=', 'fppps.id')
            ->where('fppps.id', '=', $id)
            ->where('wo.last_process', '=', 'packing')
            ->where('wo.acc_pengiriman', '=', 'ACCEPT')
            ->orWhere('wo.acc_pengiriman', '=', 'ACCEPT WITH NOTE')
            ->get();

        return response()->json($getItems);
    }

    public function getItemColor($id)
    {
        $item = DB::table('work_orders')
            ->select('fppps.color')
            ->where('work_orders.id', '=', $id)
            ->join('fppps', 'work_orders.fppp_id', '=', 'fppps.id')
            ->first();

        return response()->json($item);
    }

    public function getQuotation($id)
    {
        $getQuotationNo = DB::table('fppps')
            ->select('fppps.id', 'quotations.id', 'fppp_no', 'proyek_quotations.no_quotation')
            ->where('fppps.id', '=', $id)
            ->join('quotations', 'fppps.quotation_id', '=', 'quotations.id')
            ->join('proyek_quotations', 'quotations.proyek_quotation_id', '=', 'proyek_quotations.id')
            ->first();

        return response()->json($getQuotationNo);
    }

    public function handleChangeStatus()
    {
        $id = $_GET['id'];
        $status = $_GET['status'];

        $getItemsId = DB::table('work_orders as wo')
            ->select('wo.id as id', 'lwo.logistic_id')
            ->where('lwo.logistic_id', '=', $id)
            ->join('logistic_work_order as lwo', 'lwo.work_order_id', '=', 'wo.id')
            ->get();

        $items = collect($getItemsId);

        // change 'last_process' to given status
        foreach ($items as $item) {
            $wo = WorkOrder::find($item->id);
            $wo->update([
                "last_process" => $status,
            ]);
        }

        $res = (object) [
            "id" =>  $id,
            "status" => $status,
        ];

        return response()->json($res);
    }
}
