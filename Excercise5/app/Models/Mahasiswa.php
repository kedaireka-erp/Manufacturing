<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mahasiswa';
    protected $fillable = ['nama_mahasiswa','id_jurusan','id_kelas','jenis_kelamin','no_telepon','alamat'];
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class,'id_jurusan');
    }
}
