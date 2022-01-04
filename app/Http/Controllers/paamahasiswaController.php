<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class paamahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = DB::table('mahasiswa as a')->select('a.*','b.nama_dosen as nama')->where('a.deleted_at',null)->join('dosen as b','b.nip_dosen','=','a.nip_dosen')->get();

        return view('layout.paaMahasiswa',['mahasiswa' => $mahasiswa]);
    }
}
