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
            ->where('dosen.deleted_at',null)
            ->join('mahasiswa', 'sidang.nim_mhs', '=', 'mahasiswa.nim_mhs')
            ->where('mahasiswa.deleted_at',null)
            ->join('laporan', 'sidang.id_laporan', '=', 'laporan.id_laporan')
            ->where('laporan.deleted_at',null)
            ->where('sidang.deleted_at',null)
            ->get(); 
        
        // return view('layout.paaSidang',['sidang' => $sidang],['dosen' => $dosen],['mahasiswa' => $mahasiswa],['laporan' => $laporan]);
        return view('layout.paaSidang')->with('dosen',$dosen)->with('mahasiswa',$mahasiswa)->with('laporan',$laporan)->with('sidang',$sidang);
    }

    public function store(Request $request){
        // $request ->validate([
        //     'nip_dosen' => 'required|max:16|exists:dosen,nip_dosen',
        //     'nim_mhs' => 'required|max:12|exists:mahasiswa,nim_mhs',
        //     'id_laporan' => 'required|exists:laporan,id_laporan',
        // ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('sidang')->insert([
            'nip_dosen' => $request->nip_dosen,
            'nim_mhs' => $request->nim_mhs,
            'id_laporan' => $request->id_laporan,
            'waktu_sidang' => $request->waktu_sidang,
            'tempat_sidang' => $request->tempat_sidang,
            'status_sidang' => $request->status_sidang,
            'bukti_sidang' => 'Belum Ada',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/dashboard/paa/sidang')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $dosen = DB::table('dosen')->get();
        $mahasiswa = DB::table('mahasiswa')->get();

        $sidang = DB::table('sidang')->where('id_sidang',$id)
            ->join('dosen', 'sidang.nip_dosen', '=', 'dosen.nip_dosen')
            ->where('dosen.DELETED_AT',null)
            ->join('laporan','sidang.id_laporan','=','laporan.id_laporan')
            ->where('laporan.DELETED_AT',null)
            ->join('mahasiswa', 'sidang.nim_mhs', '=', 'mahasiswa.nim_mhs')
            ->where('mahasiswa.DELETED_AT',null)
            ->where('sidang.DELETED_AT',null)
            ->get();

        $laporan = DB::table('laporan')->get();

        
        return view('edit.editpaaSidang')->with('sidang',$sidang)->with('dosen',$dosen)->with('mahasiswa',$mahasiswa)->with('laporan',$laporan);
    }

    public function update(Request $request){
        // $request ->validate([
        //     'nip_dosen' => 'required|max:16|min:16|exists:dosen,nip_dosen',
        //     'nim_mhs' => 'required|max:12|min:12|exists:mahasiswa,nim_mhs',
        //     'id_laporan' => 'required|exists:laporan,id_laporan',
        // ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('sidang')->where('id_sidang',$request->id_sidang)->update([
            'nip_dosen' => $request->dosen,
            'nim_mhs' => $request->mhs,
            'id_laporan' => $request->laporan,
            'waktu_sidang' => $request->waktu,
            'tempat_sidang' => $request->tempat,
            'status_sidang' => $request->status,
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/dashboard/paa/sidang')->with('edit','Data berhasil diubah');
    }
    
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('sidang')->where('id_sidang',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/dashboard/paa/sidang')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('sidang')->where('id_sidang',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/dashboard/paa/sidang')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restoresidang = DB::table('sidang')->where('sidang.deleted_at','!=',null)
        ->join('dosen', 'sidang.nip_dosen', '=', 'dosen.nip_dosen')
        ->join('laporan','sidang.id_laporan','=','laporan.id_laporan')
        ->join('mahasiswa', 'sidang.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->get();
        return view('restore.restoreSidang',['restoresidang' => $restoresidang]);
    }

    public function download(Request $request){
        $nama = $request->file;
        $filePath = public_path()."/uploads/$nama";
    	$headers = ['Content-Type: application/jpg'];
    	$fileName = time().'.jpg';

        if ($nama!="Belum Ada") {
            return response()->download($filePath, $fileName, $headers);
        } else {
            echo "<script>
            alert('File not found');
            </script>";
        }
    }

    public function rekap(){
        $sidang = DB::table('sidang')
        ->join('dosen', 'sidang.nip_dosen', '=', 'dosen.nip_dosen')
        ->where('dosen.deleted_at',null)
        ->join('mahasiswa', 'sidang.nim_mhs', '=', 'mahasiswa.nim_mhs')
        ->where('mahasiswa.deleted_at',null)
        ->join('laporan', 'laporan.id_laporan', '=', 'laporan.id_laporan')
        ->where('laporan.deleted_at',null)
        ->where('sidang.deleted_at',null)
        ->get(); 
        return view('rekap.rekapsidang')->with('sidang',$sidang);
    }

}