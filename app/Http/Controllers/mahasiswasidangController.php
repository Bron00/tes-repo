<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class mahasiswasidangController extends Controller
{
    public function index(){
        $sidang = DB::table('sidang')
        ->join('dosen', 'sidang.nip_dosen', '=', 'dosen.nip_dosen')
        ->join('laporan', 'sidang.id_laporan', '=', 'laporan.id_laporan')
        ->where('sidang.deleted_at',null)
        ->get(); 
        
        return view('layout.mahasiswasidang')->with('sidang',$sidang);

    }
    public function upload(Request $request){
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,xlx,csv|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
        DB::table('sidang')
        ->where('id_sidang',$request->id_sidang)
        ->update([
            'bukti_sidang'=>$fileName
        ]);

        return redirect('/dashboard/mahasiswa/sidang');
    }
    public function edit($id){
        $bukti = DB::table('sidang')
        ->where('sidang.id_sidang',$id)
        ->get(); 
    
        return view('edit.editbukti')->with('bukti',$bukti);
    }
}
