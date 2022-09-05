<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::get();

        return view("items.index", compact("items"));
    }
    public function create()
    {
        $items = Item::get();

        return view("items.create");
    }
}
