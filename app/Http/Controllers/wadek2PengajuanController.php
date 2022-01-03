<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class wadek2PengajuanController extends Controller
{
    public function index(){
        $pengajuan = DB::table('pengajuan')
            ->where('pengajuan.DELETED_AT',null)
            ->get(); 
        
        return view('layout.wadek2Pengajuan')->with('pengajuan',$pengajuan);

    }

    public function update(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('pengajuan')->insert([
            'acc_wadek2' => $request->acc_wadek2,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/wadek2/pengajuan')->with('update','Pengajuan berhasil disetujui');
    }
    

}
