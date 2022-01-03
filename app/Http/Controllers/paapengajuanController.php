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

    public function store(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
        DB::table('pengajuan')->insert([
            'file_pengajuan'=> $fileName,
            'status_pengajuan'=> 1,
            'acc_kps' => 0,
            'acc_kadep'=> 0,
            'acc_wadek2' => 0,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        return redirect('/dashboard/paa/pengajuan')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $pengajuan = DB::table('pengajuan')
        ->where('pengajuan.id_pengajuan',$id)
        ->get(); 
    
        return view('edit.editpengajuan')->with('pengajuan',$pengajuan);
    }

    public function update(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
  
        $fileName = time().'.'.$request->file->extension();  
   
        $request->file->move(public_path('uploads'), $fileName);
        DB::table('pengajuan')->where('id_pengajuan',$request->id_pengajuan)->update([
            'file_pengajuan'=> $fileName,
            'updated_at'=>date('Y-m-d H:i:s')
        ]);
        return redirect('/dashboard/paa/pengajuan')->with('tambah','Data berhasil dirubah');
    }
    
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('pengajuan')->where('id_pengajuan',$id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/dashboard/paa/pengajuan')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('pengajuan')->where('id_pengajuan',$id)->update([
            'deleted_at' => null
        ]);

        return redirect('/dashboard/paa/pengajuan')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restorepengajuan = DB::table('pengajuan')->where('deleted_at','!=',null)->get();
        return view('restore.restorePengajuan',['restorepengajuan' => $restorepengajuan]);
    }

}
