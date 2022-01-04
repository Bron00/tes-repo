<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class paaWadekController extends Controller
{
    public function index(){
        $wadek = DB::table('wadek2')->where('deleted_at',null)->get();

        return view('layout.paaWadek',['wadek' => $wadek]);
    }
}
