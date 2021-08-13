<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kapal;

class ApkProfilController extends Controller
{
    public function index(){
        return view('apkprofil.index',['sidebar'=>true]);
    }
    public function profil_ppg(){
        $kapal = Kapal::where('kd_kapal','!=','KMP003')->get();
        // dd($kapal);
        return view('apkprofil.profil_ppg',[
            'sidebar'=>false,
            'back_link'=>route('apkprofil'),
            'kapal'=>$kapal,
        ]);
    }
}
