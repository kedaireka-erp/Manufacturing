<?php

namespace App\Http\Controllers;

use App\Models\ManufactureActivity;
use Illuminate\Http\Request;

class LogActivityController extends Controller
{
    public function index()
    {

        $log_activities = ManufactureActivity::with("user")->latest("created_at")->search(request(["search"]))->paginate(5);

        return view("log_activity.index", ["log_activities" => $log_activities]);
    }
}
