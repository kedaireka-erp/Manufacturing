<?php

namespace App\Http\Controllers;

use App\Models\PerProject;
use Illuminate\Http\Request;

class PerProjectController extends Controller
{
    public function index()
    {
        // $PerProjects = PerProject::get();
        return view("manufaktur.perproject");
    }
}
