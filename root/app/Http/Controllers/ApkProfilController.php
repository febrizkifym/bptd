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
    public function profil_ppm(){
        return view('apkprofil.404',['sidebar'=>true]);
    }
    public function profil_ttadungingi(){
        return view('apkprofil.404',['sidebar'=>true]);
    }
    public function profil_ttaisimu(){
        return view('apkprofil.404',['sidebar'=>true]);
    }
    public function profil_uppkbmarisa(){
        return view('apkprofil.404',['sidebar'=>true]);
    }
    public function profil_uppkbmolotabu(){
        return view('apkprofil.404',['sidebar'=>true]);
    }
    public function notfound(){
        return view('apkprofil.404',['sidebar'=>true]);
    }
    public function tentang(){
        return view('apkprofil.404',['sidebar'=>true]);
    }
}
