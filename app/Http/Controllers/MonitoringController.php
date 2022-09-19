<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use App\Models\QC;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

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
}
