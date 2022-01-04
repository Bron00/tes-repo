<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class paapaaController extends Controller
{
    public function index(){
        $paa = DB::table('paa')->where('deleted_at',null)->get();

        return view('layout.paaPaa',['paa' => $paa]);
    }
}
