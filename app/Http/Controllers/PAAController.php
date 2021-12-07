<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paaController extends Controller
{
    public function index(){
        $paa = DB::table('paa')->where('DELETED_AT',null)->get();
        return view('dashboard.paa',['paa' => $paa]);

    }

    public function store(Request $request){
        $request ->validate([
            'nip_paa' => 'required|max:16|min:16',
            'nama_paa' => 'required|max:50|min:3',
            'alamat_paa' => 'required|max:150|min:3',
            'jk_paa' => 'required'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('paa')->insert([
            'nip_paa' => $request->nip_paa,
            'nama_paa' => $request->nama_paa,
            'alamat_paa' => $request->alamat_paa,
            'jk_paa' => $request->jk_paa,
            'CREATED_AT' => date('Y-m-d H:i:s'),
            'UPDATED_AT' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/paa')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $paa = DB::table('paa')->where('nip_paa',$id)->get();
        return view('edit.editpaa',['paa' => $paa]);
    }

    public function update(Request $request){
        $request ->validate([
            'nip_paa' => 'required|max:16|min:16',
            'nama_paa' => 'required|max:50|min:3',
            'alamat_paa' => 'required|max:150|min:3',
            'jk_paa' => 'required'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('paa')->where('nip_paa',$request->id)->update([
            'nip_paa' => $request->nip_paa,
            'nama_paa' => $request->nama_paa,
            'alamat_paa' => $request->alamat_paa,
            'jk_paa' => $request->jk_paa,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/paa')->with('edit','Data berhasil diubah');
    }
    
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('paa')->where('nip_paa',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/paa')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('paa')->where('nip_paa',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/paa')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restorepaa = DB::table('paa')->where('DELETED_AT','!=',null)->get();
        return view('restore.restorepaa',['restorepaa' => $restorepaa]);
    }

}