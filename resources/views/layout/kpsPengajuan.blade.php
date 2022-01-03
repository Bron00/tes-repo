<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class paapengajuanController extends Controller
{
    public function index(){
        $pengajuan = DB::table('pengajuan')
            ->where('pengajuan.DELETED_AT',null)
            ->get(); 
        
        return view('layout.paaPengajuan')->with('pengajuan',$pengajuan);

    }

    public function edit($id){
        $mahasiswa = DB::table('mahaswiswa')->get();

        $laporan = DB::table('laporan')
            ->join('mahasiswa', 'laporan.nim_mhs', '=', 'mahasiswa.nim_mhs')
            ->where('laporan.DELETED_AT',null)
            ->get(); 
        
        return view('edit.editPaaLaporan',['laporan' => $laporan],['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request){
        $request ->validate([
            'nim_mhs' => 'required|max:12|min:12|exists:mahasiswa,nim_mhs',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('laporan')->insert([
            'nim_mhs' => $request->nim_mhs,
            'nama_laporan' => $request->nama_laporan,
            'jenis_laporan' => $request->jenis_laporan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/paaLaporan')->with('edit','Data berhasil diubah');
    }
    

}
