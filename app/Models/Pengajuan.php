<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Pengajuan extends Model
{
    use HasFactory;
    protected $table='pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $guards = ['id_pengajuan'];
    protected $fillable = ['status_pengajuan','acc_kps','acc_kadep','acc_wadek2'];

    public function Dosen()
    {
        return $this->belongsTo(Dosen::class,'nip_dosen','id');
    }

    public function Sidang()
    {
        return $this->belongsTo(Sidang::class,'id_sidang','id');
    }

    public function KPS()
    {
        return $this->belongsTo(KPS::class,'nip_kps','id');
    }

    public function Kadep()
    {
        return $this->belongsTo(Kadep::class,'nip_kadep','id');
    }

    public function Wadek2()
    {
        return $this->belongsTo(Wadek2::class,'nip_wadek2','id');
    }

}