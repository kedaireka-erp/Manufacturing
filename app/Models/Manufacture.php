<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    use HasFactory;
    protected $guarded = ["id"];

    public function scopeSearch($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('FPPP_number', 'like', '%' . $search . '%')->orWhere('project_name', 'like', '%' . $search . '%')->orWhere('applicator_name', 'like', '%' . $search . '%');
        });
    }

    public function workOrder()
    {
        return $this->hasMany("work_order");
    }
}
