<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Titik;
use App\Ruas;

class DalaloController extends Controller
{
    public function index(){
        $titik = Titik::join("dalalo_ruas","dalalo_ruas.id","dalalo_titik.id_ruas")->get();
        return view("dalalo.index",['titik'=>$titik]);
    }
    public function titik(){
        $titik = Titik::join("dalalo_ruas","dalalo_ruas.id","dalalo_titik.id_ruas")->get();
        return view("admin.dalalo.index",['titik'=>$titik]);
    }
    public function ruas(){
        $ruas = Ruas::all();
        return view("admin.dalalo.ruas",['ruas'=>$ruas]);
    }
}
