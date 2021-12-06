<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Sidang extends Model
{
    use HasFactory;
    protected $table='sidang';
    protected $primaryKey = 'id_sidang';
    protected $guards = ['id_sidang'];
    protected $fillable = ['waktu_sidang','tempat_sidang','bukti_sidang','status_sidang'];

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class,'nip_dosen','id');
    }

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'nim_mhs','id');
    }

    public function Laporan()
    {
        return $this->belongsTo(Laporan::class,'id_laporan','id');
    }
    
}