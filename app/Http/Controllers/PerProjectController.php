<?php

namespace App\Http\Controllers;

use App\Models\PerProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PerProjectController extends Controller
{
    public function index()
    {
        // $PerProjects = PerProject::get();
        $fppp = DB::table('fppp')->get();
        $work_order = DB::table('work_orders')->get();

        $monitoring = [];
        foreach ($fppp as $key => $f) {
            $monitoring[$key]['id'] = $f->id;
            $monitoring[$key]['no_fppp'] = $f->no_fppp;
            $monitoring[$key]['tgl_terima_fppp'] = $f->tgl_terima_fppp;
            $monitoring[$key]['deadline'] = $f->deadline;
            $monitoring[$key]['project'] = $f->project;
            $monitoring[$key]['luar_dalam_kota'] = $f->luar_dalam_kota;
            $monitoring[$key]['warna'] = $f->warna;
            $monitoring[$key]['sales'] = $f->sales;
            $monitoring[$key]['sm'] = $f->sm;
            $monitoring[$key]['no_co_quo'] = $f->no_co_quo;
            $monitoring[$key]['total_op'] = $f->total_op;
            $monitoring[$key]['total_unit'] = 0;
            $monitoring[$key]['unit_hold_cancel_revisi'] = $f->unit_hold_cancel_revisi;
            //workorder
            $monitoring[$key]['proses_alumunium'] = '';
            $monitoring[$key]['proses_aksesoris'] = '';
            $monitoring[$key]['proses_kaca'] = 0;
            $monitoring[$key]['proses_lembaran'] = '';
            $monitoring[$key]['jumlah_cutting'] = 0;
            $monitoring[$key]['jumlah_machining'] = 0;
            $monitoring[$key]['jumlah_asembly'] = 0;
            $monitoring[$key]['jumlah_qc'] = 0;
            $monitoring[$key]['jumlah_packing'] = 0;
            $monitoring[$key]['jumlah_delivery'] = 0;
            $monitoring[$key]['acc_pengiriman'] = '';
            $monitoring[$key]['unit_belum_kirim'] = 0;
            $monitoring[$key]['unit_terkirim'] = 0;
            $monitoring[$key]['status'] = '';
        }
        $productions = [];
        
        foreach ($work_order as $key => $wrd) {
            $productions[$key]['id_fppp'] = $wrd->id_fppp;
            $productions[$key]['proses_alumunium'] = $wrd->proses_alumunium;
            $productions[$key]['proses_aksesoris'] = $wrd->proses_aksesoris;
            $productions[$key]['proses_kaca'] = $wrd->proses_kaca;
            $productions[$key]['proses_lembaran'] = $wrd->proses_lembaran;
            $productions[$key]['cutting'] = $wrd->cutting;
            $productions[$key]['machining'] = $wrd->machining;
            $productions[$key]['asembly1'] = $wrd->asembly1;
            $productions[$key]['asembly2'] = $wrd->asembly2;
            $productions[$key]['asembly3'] = $wrd->asembly3;
            $productions[$key]['qc'] = $wrd->qc;
            $productions[$key]['packing'] = $wrd->packing;
            $productions[$key]['delivery'] = $wrd->delivery;
            $productions[$key]['acc_pengiriman'] = $wrd->acc_pengiriman;
            $productions[$key]['unit_belum_kirim'] = $wrd->unit_belum_kirim;
            $productions[$key]['unit_terkirim'] = $wrd->unit_terkirim;
            $productions[$key]['status'] = $wrd->status;
        }
        for ($i=0; $i < count($monitoring); $i++) { 
            for ($j=0; $j < count($productions); $j++) { 
                if ($productions[$j]['id_fppp'] == $monitoring[$i]['id']) {

                    $monitoring[$i]['proses_alumunium'] = $productions[$j]['proses_alumunium'] = $wrd->proses_alumunium;
                    $monitoring[$i]['proses_aksesoris'] = $productions[$j]['proses_aksesoris'] = $wrd->proses_aksesoris;
                    $monitoring[$i]['proses_kaca'] =  $productions[$j]['proses_kaca'] = $wrd->proses_kaca;
                    $monitoring[$i]['proses_lembaran'] = $productions[$j]['proses_lembaran'] = $wrd->proses_lembaran;
                    $monitoring[$i]['acc_pengiriman'] = $productions[$j]['acc_pengiriman'] = $wrd->acc_pengiriman;
                    $monitoring[$i]['status'] = $productions[$j]['status'] = $wrd->status;
                    
                    $monitoring[$i]['total_unit'] += 1;

                    if($productions[$j]['cutting'] == 1 && $productions[$j]['machining'] == 0){
                        $monitoring[$i]['jumlah_cutting'] += 1;
                    }
                    if ($productions[$j]['machining'] == 1 && $productions[$j]['asembly1'] == 0) {
                        $monitoring[$i]['jumlah_machining'] += 1;
                    }
                    if ($productions[$j]['asembly3'] == 1 && $productions[$j]['qc'] == 0) {
                        $monitoring[$i]['jumlah_asembly'] += 1;
                    }
                    if ($productions[$j]['qc'] == 1 && $productions[$j]['packing'] == 0) {
                        $monitoring[$i]['jumlah_qc'] += 1;
                    }
                    if ($productions[$j]['packing'] == 1 && $productions[$j]['delivery'] == 0) {
                        $monitoring[$i]['jumlah_packing'] += 1;
                    }
                    if ($productions[$j]['delivery'] == 1) {
                        $monitoring[$i]['jumlah_delivery'] += 1;
                    }
                    if ($productions[$j]['acc_pengiriman']) {
                        if ($productions[$j]['unit_belum_kirim'] == 1 && $productions[$j]['unit_terkirim'] == 0) {
                            $monitoring[$i]['unit_belum_kirim'] += 1;
                        }
                        if ($productions[$j]['unit_terkirim'] == 1) {
                            $monitoring[$i]['unit_terkirim'] += 1;
                        }
                    }
                }
            }
        }
        
        return view("manufaktur.perproject")->with('monitoring',$monitoring);
    }
}
