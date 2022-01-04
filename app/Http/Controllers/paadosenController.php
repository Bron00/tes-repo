<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class paadosenController extends Controller
{
    public function index(){
        $dosen = DB::table('dosen')->where('deleted_at',null)->get();

        return view('layout.paaDosen',['dosen' => $dosen]);
    }

    public function store(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('dosen')->insert([
            'nip_dosen' => $request->nip_dosen,
            'nama_dosen' => $request->dosen,
            'password' => $request->password,
            'alamat_dosen' => $request->alamat,
            'jk_dosen' => $request->jenis,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/dashboard/paa/dosen')->with('tambah','Data berhasil ditambahkan');
    }

    public function edit($id){
        $dosen = DB::table('dosen')->where('nip_dosen',$id)->get();
        return view('edit.editdosen',['dosen' => $dosen]);
    }

    public function update(Request $request){
        $request ->validate([
            'nip_dosen' => 'required|max:16|min:16',
            'nama_dosen' => 'required|max:50|min:3',
            'alamat_dosen' => 'required|max:150|min:3',
            'jk_dosen' => 'required'
        ]);
        date_default_timezone_set('Asia/Jakarta');
        DB::table('dosen')->where('nip_dosen',$request->id)->update([
            'nip_dosen' => $request->nip_dosen,
            'nama_dosen' => $request->nama_dosen,
            'alamat_dosen' => $request->alamat_dosen,
            'jk_dosen' => $request->jk_dosen,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/dashboard/paa/dosen')->with('edit','Data berhasil diubah');
    }
    
    public function hapus($id){
        date_default_timezone_set('Asia/Jakarta');
    	DB::table('dosen')->where('nip_dosen',$id)->update([
            'DELETED_AT' => date('Y-m-d H:i:s')
        ]);
 
    	return redirect('/dashboard/paa/dosen')->with('hapus','Data berhasil dihapus');
    }

    public function back($id){
        DB::table('dosen')->where('nip_dosen',$id)->update([
            'DELETED_AT' => null
        ]);

        return redirect('/dashboard/paa/dosen')->with('back','Data berhasil dipulihkan');
    }

    public function restore(){
        $restoredosen = DB::table('dosen')->where('DELETED_AT','!=',null)->get();
        return view('restore.restoredosen',['restoredosen' => $restoredosen]);
    }

}
