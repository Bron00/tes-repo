<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class kadepPengajuanController extends Controller
{
    public function index(){
        $pengajuan = DB::table('pengajuan')
            ->where('pengajuan.DELETED_AT',null)
            ->get(); 
        
        return view('layout.kadepPengajuan')->with('pengajuan',$pengajuan);

    }

    public function update(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        DB::table('pengajuan')->where('id_pengajuan',$request->id_pengajuan)->update([
            'acc_kadep' => $request->acc_kadep,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        return redirect('/dashboard/kadep/pengajuan')->with('update','Pengajuan berhasil disetujui');
    }
    

}
