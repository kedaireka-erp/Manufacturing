<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class WorkOrder extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function fppp()
    {
        return $this->belongsTo("fppps", "fppp_id", "id");
    }

    public function qcs()
    {
        return $this->hasMany(\App\Models\QC::class);
    }

    public function logistic()
    {
        return $this->belongsToMany(Logistic::class, 'logistic_work_order', 'work_order_id', 'logistic_id');
    }
}
