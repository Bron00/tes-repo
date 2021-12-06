<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table='mahasiswa';
    protected $primaryKey = 'nim_mhs';
    protected $guards = ['nim_mhs'];
    protected $fillable = ['nama_mhs','tgl_lahir_mhs','alamat_mhs','jk_mhs'];

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class,'nip_dosen','id');
    }
}