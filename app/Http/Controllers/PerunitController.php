<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerunitController extends Controller
{
    public function index()
    {
        return view("manufaktur.perunit");
    }
}
