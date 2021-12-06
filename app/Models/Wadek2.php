<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Wadek2 extends Model
{
    use HasFactory;
    protected $table='wadek2';
    protected $primaryKey = 'nip_wadek2';
    protected $guards = ['nip_wadek2'];
    protected $fillable = ['nama_wadek2','alamat_wadek2','jk_wadek2'];
}