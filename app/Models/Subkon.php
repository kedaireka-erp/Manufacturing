<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subkon extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable =[
        'employee_number',
        'subkon_name',
        'lead_name',
        'is_active'
    ];
}
