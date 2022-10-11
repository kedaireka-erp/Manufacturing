<?php

namespace App\Http\Controllers;

use App\Models\QC;
use App\Models\RekapSubkon;
use App\Models\WorkOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WorkOrderController extends Controller
{
    public function update_kaca(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "tanggal_kaca"  => Carbon::now() ?? $unit->tanggal_kaca,
            "user_kaca"     => "alice"
        ]);
        toast("Data kaca ".$unit->kode_unit." berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function update_cutting(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "tanggal_cutting"   => Carbon::now() ?? $unit->tanggal_cutting,
            "subkon1_cutting"   => $request->subkon1_cutting ?? $unit->subkon1_cutting,
            "lead1_cutting"     => $request->lead1_cutting ?? $unit->lead1_cutting,
            "subkon2_cutting"   => $request->subkon2_cutting ?? $unit->subkon2_cutting,
            "lead2_cutting"     => $request->lead2_cutting ?? $unit->lead2_cutting,
            "proses_cutting"    => $request->proses_cutting ?? $unit->proses_cutting,
            "last_process"      => "cutting"
        ]);
        toast("Data cutting ".$unit->kode_unit." berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function update_machining(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "tanggal_machining"   => Carbon::now() ?? $unit->tanggal_machining,
            "subkon1_machining"   => $request->subkon1_machining ?? $unit->subkon1_machining,
            "lead1_machining"     => $request->lead1_machining ?? $unit->lead1_machining,
            "subkon2_machining"   => $request->subkon2_machining ?? $unit->subkon2_machining,
            "lead2_machining"     => $request->lead2_machining ?? $unit->lead2_machining,
            "last_process"        => "machining"
        ]);
        toast("Data machining ".$unit->kode_unit." berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function update_assembly1(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "tanggal_assembly1"   => Carbon::now() ?? $unit->tanggal_assembly1,
            "subkon1_assembly1"   => $request->subkon1_assembly1 ?? $unit->subkon1_assembly1,
            "lead1_assembly1"     => $request->lead1_assembly1 ?? $unit->lead1_assembly1,
            "subkon2_assembly1"   => $request->subkon2_assembly1 ?? $unit->subkon2_assembly1,
            "lead2_assembly1"     => $request->lead2_assembly1 ?? $unit->lead2_assembly1,
            "process_assembly1"   => $request->process_assembly1 ?? $unit->process_assembly1,
            "last_process"        => "assembly"
        ]);

        $kode = 0;

        switch ($request->process_assembly1) {
            case 'Assembly':
                $kode = 1;
                break;
            case 'Las':
                $kode = 2;
                break;
            case 'Cek Opening':
                $kode = 3;
                break;
            case 'Pasang Kaca':
                $kode = 4;
                break;
            case 'Sealant Kaca':
                $kode = 5;
                break;
        }

        $assembly = RekapSubkon::create([
            "work_order_id"     => $request->id,
            "assembly_id"       => $kode,
            "kode_assembly"     => 1,
        ]);

        toast("Data assembly 1 ".$unit->kode_unit."  berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function update_assembly2(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "tanggal_assembly2"   => Carbon::now() ?? $unit->tanggal_assembly2,
            "subkon1_assembly2"   => $request->subkon1_assembly2 ?? $unit->subkon1_assembly2,
            "lead1_assembly2"     => $request->lead1_assembly2 ?? $unit->lead1_assembly2,
            "subkon2_assembly2"   => $request->subkon2_assembly2 ?? $unit->subkon2_assembly2,
            "lead2_assembly2"     => $request->lead2_assembly2 ?? $unit->lead2_assembly2,
            "process_assembly2"    => $request->process_assembly2 ?? $unit->process_assembly2,
        ]);

        $kode = 0;

        switch ($request->process_assembly1) {
            case 'Assembly':
                $kode = 1;
                break;
            case 'Las':
                $kode = 2;
                break;
            case 'Cek Opening':
                $kode = 3;
                break;
            case 'Pasang Kaca':
                $kode = 4;
                break;
            case 'Sealant Kaca':
                $kode = 5;
                break;
        }

        $assembly = RekapSubkon::create([
            "work_order_id"     => $request->id,
            "assembly_id"       => $kode,
            "kode_assembly"     => 2,
        ]);

        toast("Data assembly 2 ".$unit->kode_unit."  berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function update_assembly3(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "tanggal_assembly3"   => Carbon::now() ?? $unit->tanggal_assembly3,
            "subkon1_assembly3"   => $request->subkon1_assembly3 ?? $unit->subkon1_assembly3,
            "lead1_assembly3"     => $request->lead1_assembly3 ?? $unit->lead1_assembly3,
            "subkon2_assembly3"   => $request->subkon2_assembly3 ?? $unit->subkon2_assembly3,
            "lead2_assembly3"     => $request->lead2_assembly3 ?? $unit->lead2_assembly3,
            "process_assembly3"    => $request->process_assembly3 ?? $unit->process_assembly3,
        ]);

        $kode = 0;

        switch ($request->process_assembly1) {
            case 'Assembly':
                $kode = 1;
                break;
            case 'Las':
                $kode = 2;
                break;
            case 'Cek Opening':
                $kode = 3;
                break;
            case 'Pasang Kaca':
                $kode = 4;
                break;
            case 'Sealant Kaca':
                $kode = 5;
                break;
        }

        $assembly = RekapSubkon::create([
            "work_order_id"     => $request->id,
            "assembly_id"       => $kode,
            "kode_assembly"     => 3,
        ]);

        toast("Data assembly 3 ".$unit->kode_unit."  berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function create_qc(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->work_order_id);
        QC::create([
            "work_order_id"     => $request->work_order_id,
            "subkon"            => $request->subkon,
            "alasan"            => $request->alasan,
            "keterangan"        => $request->keterangan,
            "status"            => $request->status
        ]);
        $unit->update(["last_process", "qc"]);
        toast("Data qc ".$unit->kode_unit."  berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function update_packing(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "tanggal_packing"   => Carbon::now() ?? $unit->tanggal_packing,
            "subkon1_packing"   => $request->subkon1_packing ?? $unit->subkon1_packing,
            "lead1_packing"     => $request->lead1_packing ?? $unit->lead1_packing,
            "subkon2_packing"   => $request->subkon2_packing ?? $unit->subkon2_packing,
            "lead2_packing"     => $request->lead2_packing ?? $unit->lead2_packing,
            "qty_packing"       => $request->qty_packing ?? $unit->qty_packing,
        ]);
        toast("Data packing ".$unit->kode_unit."  berhasil diupdate", "success");
        return redirect("/manufactures/". $unit->manufacture_id);
    }

    public function update_keterangan(Request $request)
    {
        $unit = WorkOrder::findOrFail($request->id);
        $unit->update([
            "status_hold"   => $request->keterangan ?? $unit->status_hold
        ]);

        toast("Data status hold ". $unit->kode_unit." berhasil diupdate", "success");
        return redirect("/manufactures/".$unit->manufacture_id);
    }

}
