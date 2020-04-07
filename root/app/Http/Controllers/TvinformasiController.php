<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KegiatanPimpinan;
use App\Beranda;

class TvinformasiController extends Controller
{
    public function index(){
        return view('tvinformasi');
    }
    public function edit(){
        $b = Beranda::first();
        return view('admin/tvinformasi/index',['b'=>$b]);
    }
    public function update(Request $r){
        $b = Beranda::first();
        $b->video = $r->video;
        $b->runningtext = $r->runningtext;

        $b->save();
        return redirect(route('tvinformasi.index'));
    }
}
