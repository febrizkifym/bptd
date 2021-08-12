<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApkProfilController extends Controller
{
    public function index(){
        return view('apkprofil.index',['sidebar'=>true]);
    }
    public function profil_ppg(){
        return view('apkprofil.profil_ppg',[
            'sidebar'=>false,
            'back_link'=>route('apkprofil'),
        ]);
    }
}
