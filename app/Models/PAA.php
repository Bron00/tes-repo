<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\SoftDeletes;

class PAA extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='paa';
    protected $primaryKey = 'nip_paa';
    protected $guards = ['nip_paa'];
    protected $fillable = ['nama_paa','alamat_paa','jk_paa'];
}