<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Testing\Fluent\Concerns\Has;

class Kadep extends Model
{
    use HasFactory;
    protected $table='Kadep';
    protected $primaryKey = 'nip_kadep';
    protected $guards = ['nip_kadep'];
    protected $fillable = ['nama_kadep','alamat_kadep','jk_kadep'];
}