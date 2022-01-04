<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class paaKadepController extends Controller
{
    public function index(){
        $kadep = DB::table('kadep')->where('deleted_at',null)->get();

        return view('layout.paaKadep',['kadep' => $kadep]);
    }
}
