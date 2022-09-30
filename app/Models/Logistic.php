<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logistic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'fppp_id',
        'no_logistic',
        'tgl_input',
        'tgl_berangkat',
        'driver',
        'no_polisi',
        'alamat',
    ];

    public function manufacture()
    {
        return $this->belongsTo(Manufacture::class, "fppp_id", "id");
    }

    public function workOrder()
    {
        return $this->belongsToMany(WorkOrder::class, 'logistic_work_order', 'logistic_id', 'work_order_id');
    }

    public function myItem()
    {
        return $this->belongsToMany(MyItem::class, 'logistic_my_item', 'logistic_id', 'my_item_id')
            ->withPivot(['keterangan']);
    }
}
