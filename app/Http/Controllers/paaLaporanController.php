<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paaLaporanController extends Controller
{
    public function index(){
        $mahasiswa = DB::table('mahasiswa')->get();

        $laporan = DB::table('laporan')
            ->join('mahasiswa', 'laporan.nim_mhs', '=', 'mahasiswa.nim_mhs')
            ->where('laporan.DELETED_AT',null)
            ->get(); 
        
        return view('layout.paaLaporan',['laporan' => $laporan],['mahasiswa' => $mahasiswa]);

    }

    public function update(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('laporan')->where('id_laporan',$request->id_laporan)->update([
            'status_laporan' => $request->status,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/dashboard/paa/laporan')->with('edit','Data berhasil diubah');
    }

    public function download(Request $request){
        $nama = $request->file;
        $filePath = public_path()."/uploads/$nama";
    	$headers = ['Content-Type: application/pdf'];
    	$fileName = time().'.pdf';

    	return response()->download($filePath, $fileName, $headers);
    }
}