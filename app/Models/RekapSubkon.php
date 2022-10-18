<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapSubkon extends Model
{
    use HasFactory;
    protected $table = "rekap_subkons";
    protected $fillable = ["work_order_id", "assembly_id", "kode_assembly"];
}
