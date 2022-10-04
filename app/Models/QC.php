<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QC extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function workOrder()
    {
        return $this->belongsTo("work_orders", "work_order_id", "id");
    }
}
