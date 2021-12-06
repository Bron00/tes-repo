<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Dosen extends Model
{
    use HasFactory;
    protected $table='dosen';
    protected $primaryKey = 'nip_dosen';
    protected $guards = ['nip_dosen'];
    protected $fillable = ['nama_dosen','alamat_dosen','jk_dosen'];
    
}

