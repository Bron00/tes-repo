<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paaSidangController extends Controller
{
    public function index(){
        $dosen = DB::table('dosen')->get();
        $mahasiswa = DB::table('mahasiswa')->get();
        $laporan = DB::table('laporan')->get();

        $sidang = DB::table('sidang')
            ->join('dosen', 'sidang.nip_dosen', '=', 'dosen.nip_dosen')
            ->where('sidang.deleted_at',null)
            ->join('mahasiswa', 'sidang.nim_mhs', '=', 'mahasiswa.nim_mhs')
            ->where('sidang.deleted_at',null)
            ->join('laporan', 'laporan.id_laporan', '=', 'laporan.id_laporan')
            ->where('sidang.deleted_at',null)
            ->get(); 
        
        // return view('layout.paaSidang',['sidang' => $sidang],['dosen' => $dosen],['mahasiswa' => $mahasiswa],['laporan' => $laporan]);
        return view('layout.paaSidang')->with('dosen',$dosen)->with('mahasiswa',$mahasiswa)->with('laporan',$laporan)->with('sidang',$sidang);
    }

    public function store(Request $request){
        $request ->validate([
            'nip_dosen' => 'required|max:16|min:16|exists:dosen,nip_dosen',
            'nim_mhs' => 'required|max:12|min:12|exists:mahasiswa,nim_mhs',
            'id_laporan' => 'required|exists:laporan,id_laporan',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('sidang')->insert([
            'nip_dosen' => $request->nip_dosen,
            'nim_mhs' => $request->nim_mhs,
            'id_laporan' => $request->id_laporan,
            'waktu_sidang' => $request->waktu_sidang,
            'tempat_sidang' => $request->tempat_sidang,
            'status_sidang' => $request->status_sidang,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/paaSidang')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $dosen = DB::table('dosen')->get();
        $mahasiswa = DB::table('mahaswiswa')->get();

        $sidang = DB::table('sidang')
            ->join('dosen', 'sidang.nip_dosen', '=', 'dosen.nip_dosen')
            ->where('sidang.DELETED_AT',null)
            ->join('mahasiswa', 'sidang.nim_mhs', '=', 'mahasiswa.nim_mhs')
            ->where('sidang.DELETED_AT',null)
            ->get(); 
        
        return view('edit.editpaaSidang',['sidang' => $sidang],['dosen' => $dosen],['mahasiswa' => $mahasiswa]);
    }

    public function update(Request $request){
        $request ->validate([
            'nip_dosen' => 'required|max:16|min:16|exists:dosen,nip_dosen',
            'nim_mhs' => 'required|max:12|min:12|exists:mahasiswa,nim_mhs',
            'id_laporan' => 'required|exists:laporan,id_laporan',
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('sidang')->insert([
            'nip_dosen' => $request->nip_dosen,
            'nim_mhs' => $request->nim_mhs,
            'id_laporan' => $request->id_laporan,
            'waktu_sidang' => $request->waktu_sidang,
            'tempat_sidang' => $request->tempat_sidang,
            'status_sidang' => $request->status_sidang,
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/paaSidang')->with('edit','Data berhasil diubah');
    }
    
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('sidang')->where('id_sidang',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/paaSidang')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('sidang')->where('id_sidang',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/paaSidang')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restoresidang = DB::table('sidang')->where('DELETED_AT','!=',null)->get();
        return view('restore.restoreSidang',['restoresidang' => $restoresidang]);
    }

}