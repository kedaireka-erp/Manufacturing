<?php

namespace App\Http\Controllers;

use App\Models\FPPP;
use App\Models\Logistic;
use App\Models\Manufacture;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogisticController extends Controller
{
    public function index()
    {
        //  NEW
        $getLogistics = Logistic::select('logistics.id', 'no_logistic', 'fppp.id as fppp_id', 'fppp.FPPP_no', 'tgl_berangkat', 'driver')
            ->join('fppps as fppp', 'logistics.fppp_id', '=', 'fppp.id')
            ->orderBy('logistics.updated_at', 'desc')
            ->paginate(5);

        $getQuotations = DB::table('fppps')
            ->select('fppps.id as fppp_id', 'quotations.id as quotation_id', 'fppp_no', 'proyek_quotations.no_quotation')
            ->join('quotations', 'fppps.quotation_id', '=', 'quotations.id')
            ->join('proyek_quotations', 'quotations.proyek_quotation_id', '=', 'proyek_quotations.id')
            ->get();

        $getQtyPacking = DB::table('work_orders')
            ->selectRaw('lwo.logistic_id as l_id, sum(work_orders.qty_packing) as total')
            ->join('logistic_work_order as lwo', 'work_orders.id', '=', 'lwo.work_order_id')
            ->groupBy('lwo.logistic_id')
            ->get();
        // dd($getLogistics);
        // ->toSql();

        return view('logistic.index', compact('getLogistics', 'getQuotations', 'getQtyPacking'));

        // OLD
        // $getQuotation = FPPP::select('fppp.id', 'quotation.id', 'quotation.quotation_no')
        //     ->join('quotation', 'fppp.quotation_id', '=', 'quotation.id')
        //     ->toSql();
        // // dd($getQuotation);


        // $getLogistics = Logistic::select('logistics.id', 'no_logistic', 'fppp.FPPP_number', 'tgl_berangkat', 'driver')
        //     ->join('manufactures as fppp', 'logistics.fppp_id', '=', 'fppp.id')
        //     ->orderBy('logistics.updated_at', 'desc')
        //     ->paginate(5);

        // dd($getLogistics);

        // return view('logistic.index', compact('getLogistics'));
    }

    public function create()
    {
        // NEW UPDATE
        $getFppps = DB::table('fppps')
            ->select('id', 'FPPP_no')
            ->orderBy('FPPP_no', 'desc')
            ->get();
        // ->toSql();

        // dd($getFppps);

        $getItems = DB::table('work_orders')
            ->where('last_process', '=', 'packing')
            ->where('acc_pengiriman', '=', 'ACCEPT')
            ->orWhere('acc_pengiriman', '=', 'ACCEPT WITH NOTE')
            ->get();

        return view('logistic.create', compact('getFppps', 'getItems'));

        // OLD
        // $getManufactures = Manufacture::select('id', 'FPPP_number')
        //     ->orderBy('FPPP_number', 'desc')
        //     ->get();

        // dd($getManufactures);
        // $getItems = WorkOrder::where('last_process', '=', 'packing')->get();
        // $getItems = MyItem::where('last_process', '=', 'packing')->get();
        // dd($getItems);
        // return view('logistic.create', compact('getManufactures', 'getItems'));

        // return view('logistic.create', compact('getManufactures', 'getItems'));
    }

    public function store(Request $request)
    {
        // NEW
        $lastId = DB::table('logistics')->max('id');

        $logistic = Logistic::create([
            'fppp_id' => $request->fppp,
            'no_logistic' => $lastId + 1 . '/AST/' . date('m') . '/' . date('Y'),
            'tgl_input' => date('Y-m-d H:i:s'),
            'tgl_berangkat' => $request->departDate,
            'driver' => $request->driver,
            'no_polisi' => $request->plateNumber,
            'alamat' => $request->address
        ]);

        $getItems = collect($request->input('items', []));

        // dd($items);

        // change last process to on delivery
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

        // dd($items);

        toast("Surat Jalan ({$logistic->no_logistic}) berhasil dibuat", "success")->timerProgressBar();
        return redirect("logistic");

        // OLD

        // // get last id from logistics' table
        // $lastId = DB::table('logistics')->max('id');


        // // dd(date('d-m-Y H:i:s'));


        // $logistic = Logistic::create([
        //     'fppp_id' => $request->fppp,
        //     'no_logistic' => $lastId + 1 . '/AST/' . date('m') . '/' . date('Y'),
        //     'tgl_input' => date('Y-m-d H:i:s'),
        //     'tgl_berangkat' => $request->departDate,
        //     'driver' => $request->driver,
        //     'no_polisi' => $request->plateNumber,
        //     'alamat' => $request->address
        // ]);
        // // dd($logistic);

        // toast("Surat Jalan ({$logistic->no_logistic}) berhasil dibuat", "success")->timerProgressBar();
        // return redirect("logistic");
    }

    public function show($id)
    {
        $getLogistic = DB::table('logistics')
            ->select('logistics.*', 'fppps.fppp_no')
            ->join('fppps', 'logistics.fppp_id', '=', 'fppps.id')
            ->where('logistics.id', '=', $id)
            ->first();

        $getQuotationNo = DB::table('fppps')
            ->select('pq.no_quotation')
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

        // dd($getTotalQty);

        return view('logistic.show', compact('getLogistic', 'getQuotationNo', 'getItems', 'getTotalQty'));
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
        $logistic = Logistic::findOrFail($id);
        $logistic->delete(); // soft delete

        return redirect('/logistic');
    }

    public function getItems($id)
    {
        $item = DB::table('work_orders')
            ->select('fppps.color')
            ->where('work_orders.id', '=', $id)
            ->join('fppps', 'work_orders.fppp_id', '=', 'fppps.id')
            ->first();

        // dd($item);
        // $item = DB::table('work_orders')->findOrFail($id);
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
        // ->toSql();
        // dd($getQuotationNo);

        return response()->json($getQuotationNo);
    }
}
