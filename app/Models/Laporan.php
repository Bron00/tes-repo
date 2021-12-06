<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Laporan extends Model
{
    use HasFactory;
    protected $table='laporan';
    protected $primaryKey = 'id_laporan';
    protected $guards = ['id_laporan'];
    protected $fillable = ['jenis_laporan'];

    public function Mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class,'nim_mhs','id');
    }


}