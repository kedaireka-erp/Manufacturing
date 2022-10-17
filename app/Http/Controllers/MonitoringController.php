<?php

namespace App\Http\Controllers;

use App\Models\Logistic;
use App\Models\Manufacture;
use App\Models\QC;
use App\Models\WorkOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MonitoringController extends Controller
{
    public function indexPerProject()
    {
        $fppps = DB::table('fppps')
                ->where('acc_produksi','=','ACCEPT')
                ->join('users','users.id','=','fppps.user_id')
                ->select('fppps.*','users.name as sales')
                ->get();
        $quo = DB::table('quotations')
                ->join('proyek_quotations','quotations.proyek_quotation_id','=','proyek_quotations.id')
                ->join('master_aplikators','master_aplikators.kode','=','proyek_quotations.kode_aplikator')
                ->select('quotations.id as id_qtn','proyek_quotations.*','master_aplikators.aplikator','master_aplikators.alamat')
                ->get();
        $workOrder = DB::table('work_orders')
                    ->orderBy('tanggal_kirim','asc')
                    ->get();
        $logistics = DB::table('logistic_work_order')
                    ->leftJoin('logistics','logistic_work_order.logistic_id','=','logistics.id')
                    ->leftJoin('work_orders','work_orders.id','=','logistic_work_order.work_order_id')
                    ->select('logistics.fppp_id as fppp_id_on_logistics', 'logistics.no_logistic','logistics.tgl_berangkat','logistic_work_order.work_order_id')
                    ->get();
                //dd($logistics);
        
        
        //dd($wo);
        
        $mpp = []; //monitoring per project
        $wor = []; //data work orders   
        $tglKirim = [];

        foreach ($fppps as $key => $fppp) {
            $mpp[$key]['id_fppp'] = $fppp->id;
            $mpp[$key]['no_fppp'] = $fppp->fppp_no;
            $mpp[$key]['quotation_id'] = $fppp->quotation_id;
            $mpp[$key]['tanggalTerimaFppp'] = $this->ubahTanggal($fppp->created_at);
            $mpp[$key]['deadline'] = $this->ubahTanggal($fppp->retrieval_deadline);
            foreach ($quo as $qt) {
                if ($mpp[$key]['quotation_id'] == $qt->id_qtn) {
                    $mpp[$key]['project'] = $qt->nama_proyek;
                    $mpp[$key]['no_quo'] = $qt->no_quotation;
                }
            }
            $mpp[$key]['warna'] = $fppp->color;
            $mpp[$key]['sales'] = $fppp->sales;
            $mpp[$key]['total_op'] = 0;
            $mpp[$key]['total_unit'] = 0;
            $mpp[$key]['unit_hold'] = 0;
            $mpp[$key]['proses_kaca'] = 0;
            $mpp[$key]['cutting'] = 0;
            $mpp[$key]['machining'] = 0;
            $mpp[$key]['assembly'] = 0;
            $mpp[$key]['qc'] = 0;
            $mpp[$key]['packing'] = 0;
            $mpp[$key]['delivery'] = 0;
            $mpp[$key]['acc_pengiriman'] = 0;
            $mpp[$key]['acc_pengiriman_status'] = "-";
            $mpp[$key]['unitBelumKirim'] = 0;
            $mpp[$key]['unitTerkirim'] = 0;
            $mpp[$key]['tanggalKirimAwal'] = '-';
            $mpp[$key]['tanggalKirimAkhir'] = '-';
            $mpp[$key]['status'] = '-';
            $mpp[$key]['jumlahtgl'] = 0;
            $jumlahacc = 0;
            $j =0;
            foreach ($workOrder as $k => $wo) {
                if ($wo->fppp_id == $mpp[$key]['id_fppp']) {
                    $wor[$k]['id_fppp'] = $wo->fppp_id;
                    $wor[$k]['kode_op'] = $wo->kode_op;
                    if ($wo->kode_op) {
                        $op[$key][$k] = $wo->kode_op;
                        $mpp[$key]['total_op'] = count(array_unique($op[$key]));
                    }
                    
                    if ($wo->tanggal_kaca) {
                        $mpp[$key]['proses_kaca'] += 1;
                    }
                    if ($wo->kode_unit) {
                        $mpp[$key]['total_unit'] += 1;
                    }
                    if ($wo->last_process == "queued") {
                        
                    }elseif ($wo->last_process == "cutting") {
                        $mpp[$key]['cutting'] += 1;
                    }elseif ($wo->last_process == "machining") {
                        $mpp[$key]['machining'] += 1;
                    }elseif ($wo->last_process == "assembly") {
                        $mpp[$key]['assembly'] += 1;
                    }elseif ($wo->last_process == "qc") {
                        $mpp[$key]['qc'] += 1;
                    }elseif ($wo->last_process == "packing") {
                        $mpp[$key]['packing'] += 1;
                    }elseif ($wo->last_process == "on delivery") {
                        $mpp[$key]['delivery'] += 1;
                    }
                    foreach ($logistics as $keyl => $logis) {
                        if ($wo->id == $logis->work_order_id) {
                            if ($logis->tgl_berangkat != null) {
                                $tglKirim[$key][$keyl] = $this->ubahTanggal($logis->tgl_berangkat);
                                $j++;
                                $mpp[$key]['tanggalKirimAwal'] = $tglKirim[$key][0];
                                $mpp[$key]['jumlahtgl'] += 1;
                            }
                            if ($mpp[$key]['jumlahtgl'] == $mpp[$key]['total_unit']) {
                                $mpp[$key]['tanggalKirimAkhir'] = $tglKirim[$key][$mpp[$key]['total_unit']-1];
                            }
                        }
                    }
                    
                    if ($wo->acc_pengiriman == "ACCEPT") {
                        $mpp[$key]['acc_pengiriman'] += 1;
                        $jumlahacc +=1;
                    }
                    if ($wo->last_process != "delivered") {
                        $mpp[$key]['unitBelumKirim'] += 1;
                    }
                    if ($wo->last_process == "delivered") {
                        $mpp[$key]['unitTerkirim'] += 1;
                    }
                    if ($wo->status_hold) {
                        $mpp[$key]['unit_hold'] += 1;
                    }
                    
                }
            }
            if ($jumlahacc == 0) {
                $mpp[$key]['acc_pengiriman_status'] = "BLANK";
            } elseif ($jumlahacc < $mpp[$key]['total_unit']) {
                $mpp[$key]['acc_pengiriman_status'] = "PARSIAL";
            }elseif ($jumlahacc == $mpp[$key]['total_unit']) {
                $mpp[$key]['acc_pengiriman_status'] = "COMPLETED";
            }

            
            if ($mpp[$key]['unitTerkirim'] == 0) {
                $mpp[$key]['status'] = "BLANK";
            }
            elseif ($mpp[$key]['unitTerkirim'] == $mpp[$key]['total_unit']) {
                $mpp[$key]['status'] = 'LUNAS';
            }elseif ($mpp[$key]['unitTerkirim'] != $mpp[$key]['total_unit']) {
                $mpp[$key]['status'] = 'PARSIAL';
            }
        }
        
        
        
       return view('Manufaktur.perproject')->with('mpp',$mpp);
    }

    public function indexPerUnit($id)
    {
        $fppps = DB::table('fppps')->findOr($id);
        $fppp = DB::table('fppps')
                ->where('fppps.id','=',$id)
                ->join('quotations','quotations.id','=','fppps.quotation_id')
                ->join('proyek_quotations','proyek_quotations.id','=','quotations.proyek_quotation_id')
                ->join('master_aplikators','proyek_quotations.kode_aplikator','=','master_aplikators.kode')
                ->select('fppps.id','fppps.color','fppps.created_at as tanggalTerimaFppp','fppps.fppp_no','fppps.retrieval_deadline as deadline','proyek_quotations.nama_proyek','master_aplikators.aplikator')
                ->get();
        $wo =DB::table('work_orders')
                ->where('work_orders.fppp_id','=',$id)
                ->leftJoin('q_c_s','q_c_s.work_order_id','=','work_orders.id')
                ->select('work_orders.*','q_c_s.id as id_qcs','q_c_s.work_order_id','q_c_s.subkon as subkon_qcs','q_c_s.alasan as alasanqc','q_c_s.keterangan as keterangan_qc','q_c_s.status as status_qc','q_c_s.created_at','q_c_s.updated_at')
                ->get();
        $logistics = DB::table('logistic_work_order')
                    ->leftJoin('logistics','logistic_work_order.logistic_id','=','logistics.id')
                    ->leftJoin('work_orders','work_orders.id','=','logistic_work_order.work_order_id')
                    ->select('logistics.fppp_id as fppp_id_on_logistics', 'logistics.no_logistic','logistics.tgl_berangkat','logistic_work_order.work_order_id')
                    ->get();
        foreach ($wo as $key => $w) {
            foreach ($fppp as $key => $fp) {
                if ($fp->id == $w->fppp_id) {
                    $w->warna = $fp->color;
                }
            }
            $w->tanggalReject = "-";
            $w->alasanReject = "-";
            $w->tanggalFinishQC = "-";
            if ($w->status_qc == "REJECTED") {
                $w->tanggalReject = $this->ubahTanggal($w->created_at);
                $w->alasanReject = $w->alasanqc;
            }elseif ($w->status_qc == "OK!") {
                if ($w->alasanqc != null) {
                    $w->tanggalFinishQC = $this->ubahTanggal($w->updated_at);
                }else {
                    $w->tanggalFinishQC = $this->ubahTanggal($w->created_at);
                }
                $w->tanggalReject = "-";
                $w->alasanReject = "-";
            }
            foreach ($logistics as $keyl => $logis) {
                if ($w->id == $logis->work_order_id) {
                    $w->tanggal_kirim = $logis->tgl_berangkat;
                    $w->no_surat_jalan = $logis->no_logistic;
                }
            }
        }

        return view('Manufaktur.perunit')->with([
            'fppp' => $fppp,
            'wo' => $wo,
            'fppps' =>$fppps
        ]);
    }

    private function ubahTanggal($tanggal) {
        return date("d/m/Y", strtotime($tanggal) + 25200) . " " . date("H:i", strtotime($tanggal) + 25200);
    }

    public function searchPerProject(Request $request){
        $fppps = DB::table('fppps')
                ->where('acc_produksi','=','ACCEPT')
                ->where('fppp_no','LIKE','%'.$request->search."%")
                ->join('users','users.id','=','fppps.user_id')
                ->select('fppps.*','users.name as sales')
                ->get();
        $quo = DB::table('quotations')
                ->join('proyek_quotations','quotations.proyek_quotation_id','=','proyek_quotations.id')
                ->join('master_aplikators','master_aplikators.kode','=','proyek_quotations.kode_aplikator')
                ->select('quotations.id as id_qtn','proyek_quotations.*','master_aplikators.aplikator','master_aplikators.alamat')
                ->get();
        $workOrder = DB::table('work_orders')
                    ->orderBy('tanggal_kirim','asc')
                    ->get();
        $logistics = DB::table('logistic_work_order')
        ->leftJoin('logistics','logistic_work_order.logistic_id','=','logistics.id')
        ->leftJoin('work_orders','work_orders.id','=','logistic_work_order.work_order_id')
        ->select('logistics.fppp_id as fppp_id_on_logistics', 'logistics.no_logistic','logistics.tgl_berangkat','logistic_work_order.work_order_id')
        ->get();
        
        
        //dd($wo);
        
        $mpp = []; //monitoring per project
        $wor = []; //data work orders   
        $tglKirim = [];

        foreach ($fppps as $key => $fppp) {
            $mpp[$key]['id_fppp'] = $fppp->id;
            $mpp[$key]['no_fppp'] = $fppp->fppp_no;
            $mpp[$key]['quotation_id'] = $fppp->quotation_id;
            $mpp[$key]['tanggalTerimaFppp'] = $this->ubahTanggal($fppp->created_at);
            $mpp[$key]['deadline'] = $this->ubahTanggal($fppp->retrieval_deadline);
            foreach ($quo as $qt) {
                if ($mpp[$key]['quotation_id'] == $qt->id_qtn) {
                    $mpp[$key]['project'] = $qt->nama_proyek;
                    $mpp[$key]['no_quo'] = $qt->no_quotation;
                }
            }
            $mpp[$key]['warna'] = $fppp->color;
            $mpp[$key]['sales'] = $fppp->sales;
            $mpp[$key]['total_op'] = 0;
            $mpp[$key]['total_unit'] = 0;
            $mpp[$key]['unit_hold'] = 0;
            $mpp[$key]['proses_kaca'] = 0;
            $mpp[$key]['cutting'] = 0;
            $mpp[$key]['machining'] = 0;
            $mpp[$key]['assembly'] = 0;
            $mpp[$key]['qc'] = 0;
            $mpp[$key]['packing'] = 0;
            $mpp[$key]['delivery'] = 0;
            $mpp[$key]['acc_pengiriman'] = 0;
            $mpp[$key]['acc_pengiriman_status'] = "-";
            $mpp[$key]['unitBelumKirim'] = 0;
            $mpp[$key]['unitTerkirim'] = 0;
            $mpp[$key]['tanggalKirimAwal'] = '-';
            $mpp[$key]['tanggalKirimAkhir'] = '-';
            $mpp[$key]['status'] = '-';
            $mpp[$key]['jumlahtgl'] = 0;
            $jumlahacc = 0;
            $j =0;
            foreach ($workOrder as $k => $wo) {
                if ($wo->fppp_id == $mpp[$key]['id_fppp']) {
                    $wor[$k]['id_fppp'] = $wo->fppp_id;
                    $wor[$k]['kode_op'] = $wo->kode_op;
                    if ($wo->kode_op) {
                        $op[$key][$k] = $wo->kode_op;
                        $mpp[$key]['total_op'] = count(array_unique($op[$key]));
                    }
                    $wor[$k]['tanggal_kirim'] = $this->ubahTanggal($wo->tanggal_kirim);
                    if ($wo->tanggal_kaca) {
                        $mpp[$key]['proses_kaca'] += 1;
                    }
                    if ($wo->kode_unit) {
                        $mpp[$key]['total_unit'] += 1;
                    }
                    if ($wo->last_process == "queued") {
                        
                    }elseif ($wo->last_process == "cutting") {
                        $mpp[$key]['cutting'] += 1;
                    }elseif ($wo->last_process == "machining") {
                        $mpp[$key]['machining'] += 1;
                    }elseif ($wo->last_process == "assembly") {
                        $mpp[$key]['assembly'] += 1;
                    }elseif ($wo->last_process == "qc") {
                        $mpp[$key]['qc'] += 1;
                    }elseif ($wo->last_process == "packing") {
                        $mpp[$key]['packing'] += 1;
                    }elseif ($wo->last_process == "on delivery") {
                        $mpp[$key]['delivery'] += 1;
                    }
                    foreach ($logistics as $keyl => $logis) {
                        if ($wo->id == $logis->work_order_id) {
                            if ($logis->tgl_berangkat != null) {
                                $tglKirim[$key][$keyl] = $this->ubahTanggal($logis->tgl_berangkat);
                                $j++;
                                $mpp[$key]['tanggalKirimAwal'] = $tglKirim[$key][0];
                                $mpp[$key]['jumlahtgl'] += 1;
                            }
                            if ($mpp[$key]['jumlahtgl'] == $mpp[$key]['total_unit']) {
                                $mpp[$key]['tanggalKirimAkhir'] = $tglKirim[$key][$mpp[$key]['total_unit']-1];
                            }
                        }
                    }
                    
                    if ($wo->acc_pengiriman == "ACCEPT") {
                        $mpp[$key]['acc_pengiriman'] += 1;
                        $jumlahacc +=1;
                    }
                    if ($wo->last_process != "delivered") {
                        $mpp[$key]['unitBelumKirim'] += 1;
                    }
                    if ($wo->last_process == "delivered") {
                        $mpp[$key]['unitTerkirim'] += 1;
                    }
                    if ($wo->status_hold) {
                        $mpp[$key]['unit_hold'] += 1;
                    }
                    
                }
            }
            if ($jumlahacc == 0) {
                $mpp[$key]['acc_pengiriman_status'] = "BLANK";
            } elseif ($jumlahacc < $mpp[$key]['total_unit']) {
                $mpp[$key]['acc_pengiriman_status'] = "PARSIAL";
            }elseif ($jumlahacc == $mpp[$key]['total_unit']) {
                $mpp[$key]['acc_pengiriman_status'] = "COMPLETED";
            }

            
            if ($mpp[$key]['unitTerkirim'] == 0) {
                $mpp[$key]['status'] = "BLANK";
            }
            elseif ($mpp[$key]['unitTerkirim'] == $mpp[$key]['total_unit']) {
                $mpp[$key]['status'] = 'LUNAS';
            }elseif ($mpp[$key]['unitTerkirim'] != $mpp[$key]['total_unit']) {
                $mpp[$key]['status'] = 'PARSIAL';
            }
        }
        
        
        
       return view('Manufaktur.perproject')->with('mpp',$mpp);
    }

    public function searchPerUnit(Request $request,$id)
    {
        $fppps = DB::table('fppps')->findOr($id);
        $fppp = DB::table('fppps')
                ->where('fppps.id','=',$id)
                ->join('quotations','quotations.id','=','fppps.quotation_id')
                ->join('proyek_quotations','proyek_quotations.id','=','quotations.proyek_quotation_id')
                ->join('master_aplikators','proyek_quotations.kode_aplikator','=','master_aplikators.kode')
                ->select('fppps.id','fppps.color','fppps.created_at as tanggalTerimaFppp','fppps.fppp_no','fppps.retrieval_deadline as deadline','proyek_quotations.nama_proyek','master_aplikators.aplikator')
                ->get();
        $wo =DB::table('work_orders')
                ->where('work_orders.fppp_id','=',$id)
                ->where('work_orders.kode_unit','LIKE','%'.$request->search."%")
                ->leftJoin('q_c_s','q_c_s.work_order_id','=','work_orders.id')
                ->select('work_orders.*','q_c_s.id as id_qcs','q_c_s.work_order_id','q_c_s.subkon as subkon_qcs','q_c_s.alasan as alasanqc','q_c_s.keterangan as keterangan_qc','q_c_s.status as status_qc','q_c_s.created_at','q_c_s.updated_at')
                ->get();
        $logistics = DB::table('logistic_work_order')
            ->leftJoin('logistics','logistic_work_order.logistic_id','=','logistics.id')
            ->leftJoin('work_orders','work_orders.id','=','logistic_work_order.work_order_id')
            ->select('logistics.fppp_id as fppp_id_on_logistics', 'logistics.no_logistic','logistics.tgl_berangkat','logistic_work_order.work_order_id')
            ->get();
        foreach ($wo as $key => $w) {
            foreach ($fppp as $key => $fp) {
                if ($fp->id == $w->fppp_id) {
                    $w->warna = $fp->color;
                }
            }
            $w->tanggalReject = "-";
            $w->alasanReject = "-";
            $w->tanggalFinishQC = "-";
            if ($w->status_qc == "REJECTED") {
                $w->tanggalReject = $this->ubahTanggal($w->created_at);
                $w->alasanReject = $w->alasanqc;
            }elseif ($w->status_qc == "OK!") {
                if ($w->alasanqc != null) {
                    $w->tanggalFinishQC = $this->ubahTanggal($w->updated_at);
                }else {
                    $w->tanggalFinishQC = $this->ubahTanggal($w->created_at);
                }
                $w->tanggalReject = "-";
                $w->alasanReject = "-";
            }
            foreach ($logistics as $keyl => $logis) {
                if ($w->id == $logis->work_order_id) {
                    $w->tanggal_kirim = $logis->tgl_berangkat;
                    $w->no_surat_jalan = $logis->no_logistic;
                }
            }
        }

        return view('Manufaktur.perunit')->with([
            'fppp' => $fppp,
            'wo' => $wo,
            'fppps' =>$fppps
        ]);
    }
}
