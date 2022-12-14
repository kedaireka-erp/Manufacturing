<?php

namespace App\Models;

use App\Models\Quotation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class proyekQuotation extends Model
{
    use HasFactory;
    protected $table = 'proyek_quotations';
    protected $fillable = ['id_penginput', 'kode_aplikator', 'no_quotation', 'id_currency', 'nama_proyek', 'nama_owner', 'kontak', 'no_quotation_cus', 'alamat_proyek', 'keterangan', 'status_quotation', 'date', 'alasan', 'revisi_ke'];

    public function Quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}
