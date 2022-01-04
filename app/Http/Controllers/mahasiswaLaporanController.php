<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class mahasiswaLaporanController extends Controller
{
    public function index(){
        $laporan = DB::table('laporan')
            ->where('laporan.DELETED_AT',null)
            ->get(); 
        
        return view('layout.mahasiswaLaporan')->with('laporan',$laporan);

    }

    public function store(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('laporan')->insert([
            'nama_laporan'=>$request->laporan,
            'nim_mhs'=>'152011513001',
            'jenis_laporan'=>$request->jenis,
            'status_laporan'=>'3',
            'file_laporan'=>$fileName,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        return redirect('/dashboard/mahasiswa/laporan')->with('tambah','Laporan berhasil ditambahkan');
    }

    public function edit($id){
        $laporan = DB::table('laporan')
        ->where('laporan.id_laporan',$id)
        ->get(); 
    
        return view('edit.editlaporan')->with('laporan',$laporan);
    }

    public function update(Request $request){
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('laporan')->where('id_laporan',$request->id_laporan)->update([
            'nama_laporan'=>$request->laporan,
            'jenis_laporan'=>$request->jenis,
            'file_laporan'=>$fileName,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);

        return redirect('/dashboard/mahasiswa/laporan')->with('edit','Laporan berhasil diubah');
    }

    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('laporan')->where('id_laporan',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/dashboard/mahasiswa/laporan')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('laporan')->where('id_laporan',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/dashboard/mahasiswa/laporan')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restorelaporan = DB::table('laporan')->where('deleted_at','!=',null)->get();
        return view('restore.restorelaporan',['restorelaporan' => $restorelaporan]);
    }
    

}
