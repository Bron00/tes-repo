<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paakpsController extends Controller
{
    public function index(){
        $kps = DB::table('kps')->where('deleted_at',null)->get();

        return view('layout.paaKps',['kps' => $kps]);
    }
}
