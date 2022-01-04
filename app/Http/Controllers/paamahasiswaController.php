<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class paamahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = DB::table('mahasiswa')->where('mahasiswa.deleted_at',null)->join('dosen','dosen.nip_dosen','=','mahasiswa.nip_dosen')->get();

        return view('layout.paaMahasiswa',['mahasiswa' => $mahasiswa]);
    }
}
