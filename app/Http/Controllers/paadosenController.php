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
}
