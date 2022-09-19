<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logistic extends Model
{
    use HasFactory;
    public function fppp()
    {
        return $this->belongsTo("f_p_p_p_s", "fppp_id", "id");
    }
}
