<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use App\Models\QC;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    public function indexPerProject()
    {
        $manufactures = Manufacture::all();
        $work_orders = WorkOrder::all();

        $monitoringPerProject = [];

        //mengambil data dari manufactures dimasukan ke monitoring
        foreach ($manufactures as $key => $mft) {
            $monitoringPerProject[$key]['id'] = $mft->id;
            $monitoringPerProject[$key]['no_fppp'] = $mft->FPPP_number;
            $monitoringPerProject[$key]['tgl_terima_fppp'] = $mft->created_at;
            $monitoringPerProject[$key]['deadline'] = $mft->retrieval_deadline;
            $monitoringPerProject[$key]['project'] = $mft->project_name;
            $monitoringPerProject[$key]['luar/dalamKota'] = "-";
            $monitoringPerProject[$key]['warna'] = $mft->color;
            $monitoringPerProject[$key]['sales'] = $mft->user_name;
            $monitoringPerProject[$key]['sm'] ="-";
            $monitoringPerProject[$key]['no_quo'] = $mft->quotation_id;
            $monitoringPerProject[$key]['total_op'] = 0;
            $monitoringPerProject[$key]['total_unit'] = 0;
            $monitoringPerProject[$key]['unit_hold_revisi_cancel'] = 0;
            $monitoringPerProject[$key]['proses_alumunium'] ="-";
            $monitoringPerProject[$key]['proses_aksesoris'] ="-";
            $monitoringPerProject[$key]['proses_kaca'] ="-";
            $monitoringPerProject[$key]['proses_lembaran'] ="-";
            $monitoringPerProject[$key]['cutting'] = 0;
            $monitoringPerProject[$key]['machining'] = 0;
            $monitoringPerProject[$key]['assembly'] = 0;
            $monitoringPerProject[$key]['qc'] = 0;
            $monitoringPerProject[$key]['packing'] = 0;
            $monitoringPerProject[$key]['delivery'] = 0;
            $monitoringPerProject[$key]['acc_pengiriman_finance'] = "-";
            $monitoringPerProject[$key]['unit_belum_kirim'] = 0;
            $monitoringPerProject[$key]['unit_terkirim'] = 0;
            $monitoringPerProject[$key]['tgl_kirim_awal'] = 0;
            $monitoringPerProject[$key]['tgl_kirim_akhir'] = 0;
            $monitoringPerProject[$key]['status'] = "BLANK";
        }

        $WO = []; //array tampungan untuk variabel work_orders
        //mengambil data dari work_orders dimasukan ke $wo
        foreach ($work_orders as $key => $wrkOrder) {
             $WO[$key]['manufacture_id'] = $wrkOrder->manufacture_id;
             $WO[$key]['kode_op'] = $wrkOrder->kode_op;
             $WO[$key]['kode_unit'] = $wrkOrder->kode_unit;
             $WO[$key]['last_process'] =$wrkOrder->last_process;

        }

        

        for ($i=0; $i < count($monitoringPerProject); $i++) { 
            for ($j=0; $j < count($WO); $j++) { 
                if ($WO[$j]['manufacture_id'] == $monitoringPerProject[$i]['id']) {

                    if ($WO[$j]['kode_unit']) {
                        $monitoringPerProject[$i]['total_unit'] += 1;
                    }


                    if ($WO[$j]['last_process'] == 'queued') {
                        
                    }elseif ($WO[$j]['last_process'] == 'cutting') {
                        $monitoringPerProject[$i]['cutting'] += 1;
                    }elseif ($WO[$j]['last_process'] == 'machining') {
                        $monitoringPerProject[$i]['machining'] += 1;
                    }elseif ($WO[$j]['last_process'] == 'assembly') {
                        $monitoringPerProject[$i]['assembly'] += 1;
                    }elseif ($WO[$j]['last_process'] == 'qc') {
                        $monitoringPerProject[$i]['qc'] += 1;
                    }elseif ($WO[$j]['last_process'] == 'packing') {
                        $monitoringPerProject[$i]['packing'] += 1;
                    }elseif ($WO[$j]['last_process'] == 'on delivery') {
                        $monitoringPerProject[$i]['delivery'] += 1;
                    }elseif ($WO[$j]['last_process'] == 'delivered') {
                        $monitoringPerProject[$i]['unit_terkirim'] += 1;
                    }

                    if ($monitoringPerProject[$i]['unit_terkirim'] == $monitoringPerProject[$i]['total_unit']) {
                        $monitoringPerProject[$i]['status'] = "LUNAS";
                    }elseif ($monitoringPerProject[$i]['unit_terkirim'] != $monitoringPerProject[$i]['total_unit']) {
                        $monitoringPerProject[$i]['status'] = "PARSIAL";
                    }
                }
            }
        }

        $temp = array_unique(array_column($WO,'kode_op'));
        $unique_kodeOP = array_intersect_key($WO,$temp);
        
        
        
        for ($l=0; $l < count($monitoringPerProject); $l++) { 
            foreach ($unique_kodeOP as $key => $uop) {
                if ($uop['manufacture_id'] == $monitoringPerProject[$l]['id']) {
                    $monitoringPerProject[$l]['total_op'] += 1;
                }
            }
        }
        
        
        
       return view('Manufaktur.perproject')->with('monitoringPerProject',$monitoringPerProject);
    }

    public function indexPerUnit($id)
    {   
        $FPPP = Manufacture::findOrFail($id);
        $manufacture = DB::table('manufactures')
                        ->where('manufactures.id','=',$id)
                        ->join('work_orders','manufactures.id','=','work_orders.manufacture_id')
                        ->select('manufactures.*','work_orders.id as id_wo','work_orders.*')
                        ->get();
        $q_c_s = QC::all();
        $MPU = [];
        foreach ($manufacture as $key => $mft) {
            $MPU[$key]['id_manufaktur'] = $mft->id;
            $MPU[$key]['tanggal_terimafppp'] = $mft->created_at;
            $MPU[$key]['no_fppp'] = $mft->FPPP_number;
            $MPU[$key]['deadline'] = $mft->retrieval_deadline;
            $MPU[$key]['nama_proyek'] = $mft->project_name;
            $MPU[$key]['aplikator'] = $mft->applicator_name;
            $MPU[$key]['luar/dalamkota'] = "-";
            $MPU[$key]['upload_bom_alumunium'] = "null";
            $MPU[$key]['upload_bom_aksesoris'] = "null";
            $MPU[$key]['upload_wo_alumunium'] = "null";
            $MPU[$key]['upload_wo_lembaran'] = "null";
            $MPU[$key]['upload_wo_kaca'] = "null";
            $MPU[$key]['warna'] = $mft->color;
            $MPU[$key]['hold/revisi/cancel'] = "-";
            $MPU[$key]['id_wo'] = $mft->id_wo;
            $MPU[$key]['manufacture_id'] = $mft->manufacture_id;
            $MPU[$key]['kode_op'] = $mft->kode_op;
            $MPU[$key]['kode_unit'] = $mft->kode_unit;
            $MPU[$key]['last_process'] = $mft->last_process;
            $MPU[$key]['tipe_barang'] = $mft->nama_item;
            $MPU[$key]['jenis_kaca'] = $mft->jenis_kaca;
            $MPU[$key]['tanggal_proses_kaca'] = $mft->tanggal_kaca;
            $MPU[$key]['user_kaca'] = $mft->user_kaca;
            $MPU[$key]['tanggal_cutting'] = $mft->tanggal_cutting;
            $MPU[$key]['user_cutting'] = $mft->lead1_cutting;
            $MPU[$key]['proses_cutting'] = $mft->proses_cutting;
            $MPU[$key]['keterangan'] = "null";
            $MPU[$key]['tanggal_machining'] = $mft->tanggal_machining;
            $MPU[$key]['user_machining'] = $mft->lead1_machining;
            $MPU[$key]['tanggal_assembly'] = $mft->tanggal_assembly3;
            $MPU[$key]['user_assembly'] = $mft->lead1_assembly3;
            $MPU[$key]['subkon_assembly'] = $mft->subkon1_assembly3;
            $MPU[$key]['finish_qc'] = "-";
                    $MPU[$key]['subkon_qc'] = "-";
                    $MPU[$key]['alasan_qc'] = "-";
                    $MPU[$key]['keterangan_qc'] = "-";
                    $MPU[$key]['status_qc'] = "-";
            foreach ($q_c_s as $qc) {
                if ($qc['work_order_id'] == $MPU[$key]['id_wo']) {
                    $MPU[$key]['finish_qc'] = $qc->updated_at;
                    $MPU[$key]['subkon_qc'] = $qc->subkon;
                    $MPU[$key]['alasan_qc'] = $qc->alasan;
                    $MPU[$key]['keterangan_qc'] = $qc->keterangan;
                    $MPU[$key]['status_qc'] = $qc->status;
                }
            }
            $MPU[$key]['tanggal_pack'] = $mft->tanggal_packing;
            $MPU[$key]['qty_pack'] = $mft->qty_packing;
            $MPU[$key]['user_pack'] = $mft->lead1_packing;
            $MPU[$key]['tanggal_kirim'] = $mft->tanggal_kirim;
            $MPU[$key]['no_surat_jalan'] = $mft->no_surat_jalan;
        }
        return view('Manufaktur.perunit')->with([
            'MPU' => $MPU,
            'FPPP' => $FPPP
        ]);
    }
}
