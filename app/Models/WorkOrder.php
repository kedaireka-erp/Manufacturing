<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany("q_c_s");
    }
}
