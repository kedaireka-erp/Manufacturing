<?php

namespace App\Http\Controllers;

use App\Models\Fppp;
use App\Models\Lead;
use App\Models\Subkon;
use App\Models\WorkOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $subkonCount = Subkon::where("is_active", true)->count();
        $leadCount = Lead::where("is_active", true)->count();
        $fpppCount = Fppp::count();
        $itemCount = WorkOrder::count();
        $itemHoldCount = WorkOrder::where("status_hold", "hold")->count();
        $itemCancelCount = WorkOrder::where("status_hold", "cancel")->count();
        $itemRevisiCount = WorkOrder::where("status_hold", "revisi")->count();
        $itemDeliveredCount = WorkOrder::where("last_process", "delivered")->count();
        return view("dashboard.dashboard", compact("subkonCount", "leadCount", "fpppCount", "itemCount", "itemHoldCount", "itemCancelCount", "itemRevisiCount", "itemDeliveredCount"));
    }
}
