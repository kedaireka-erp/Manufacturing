<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    public function manufacture()
    {
        return $this->belongsTo("manufactures", "manufacture_id", "id");
    }
}
