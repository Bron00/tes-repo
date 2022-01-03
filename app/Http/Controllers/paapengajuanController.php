<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class paapengajuanController extends Controller
{
    public function index(){
        $dosen = DB::table('dosen')->get();
        $paa = DB::table('paa')->get();
        $kps = DB::table('kps')->get();
        $wadek2 = DB::table('wadek2')->get();
        $kadep = DB::table('kadep')->get();

        $laporan = DB::table('pengajuan')
            ->join('dosen', 'pengajuan.nip_dosen', '=', 'dosen.nip_dosen')
            ->join('paa','pengajuan.nip_paa','=','paa.nip_paa')
            ->join('kps','pengajuan.nip_kps','=','kps.nip_kps')
            ->join('wadek2','pengajuan.nip_wadek2','=','wadek2.nip_wadek2')
            ->join('kadep','pengajuan.nip_kadep','=','kadep.nip_kadep')
            ->where('pengajuan.DELETED_AT',null)
            ->get(); 
        
        return view('layout.paaPengajuan')->with('dosen',$dosen)->with('paa',$paa)->with('kps',$kps)->with('wadek2',$wadek2)->with('kadep',$kadep);

    }

    public function store(Request $request){
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
        return redirect('/paaLaporan')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $mahasiswa = DB::table('mhaswiswa')->get();

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
    
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('laporan')->where('id_laporan',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/paaLaporan')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('laporan')->where('id_laporan',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/paaLaporan')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restorelaporan = DB::table('laporan')->where('DELETED_AT','!=',null)->get();
        return view('restore.restoreLaporan',['restorelaporan' => $restorelaporan]);
    }

}
