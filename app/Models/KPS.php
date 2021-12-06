<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class KPS extends Model
{
    use HasFactory;
    protected $table='kps';
    protected $primaryKey = 'nip_kps';
    protected $guards = ['nip_kps'];
    protected $fillable = ['nama_kps','alamat_kps','jk_kps'];
}