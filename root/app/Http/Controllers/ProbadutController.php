<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kapal;
use App\Tiket;
use App\TarifKapal;

class ProbadutController extends Controller
{
    public function index(){
        $kapal = Kapal::all();
        return view('probadut.index',['kapal'=>$kapal]);
    }
    public function get_tarif(Request $r){
        $tarif = TarifKapal::join('pbd_kapal','pbd_kapal.id','pbd_tarif.id_kapal')
                           ->where('id_kapal',$r->id_kapal)
                           ->where('jenis_usia',$r->jenis_usia)
                           ->where('kelas',$r->kelas)
                           ->first();
        $json = [
            'id_kapal' => $tarif->id_kapal,
            'jenis_usia' => $tarif->jenis_usia,
            'kelas' => $tarif->kelas,
            'harga' => $tarif->harga,
        ];
        return response()->json($json,200);
    }
    public function get_tarif_kenderaan(Request $r){
        $tarif = TarifKapal::join('pbd_kapal','pbd_kapal.id','pbd_tarif.id_kapal')
                           ->where('kelas',$r->golongan)
                           ->first();
        $json = [
            'id_kapal' => $tarif->id_kapal,
            'golongan' => $tarif->kelas,
            'harga' => $tarif->harga,
        ];
        return response()->json($json,200);
    }
    public function post(Request $r){
        $this->validate($r, [
            'noktp' => 'numeric',
        ],[
            'numeric' => 'No. KTP tidak valid.'
        ]);
        // dd($r);
        $cp = new Tiket;
        $cp->uid = $r->uid;
        $cp->no_ktp = $r->noktp;
        $cp->nama = $r->nama;
        $cp->jenis_kelamin = $r->jenis_kelamin;
        $cp->agama = $r->agama;
        $cp->usia = $r->usia;
        $tarif = TarifKapal::where([
            ["id_kapal",$r->tujuan],
            ["kelas",$r->kelas],
            ["jenis_usia",$r->usia]
            ])->first();
        $cp->tarif = $tarif->id;
        $cp->save();
        $array = [
            "uid"=>$cp->uid,
            "no_ktp"=>$cp->no_ktp,
            "nama"=>$cp->nama,
            "jenis_kelamin"=>$cp->jenis_kelamin,
            "agama"=>$cp->agama,
            "usia"=>$cp->usia,
        ];
        // dd($tarif);
        return redirect(route('probadut.sukses'))->with('result',$array);
    }
    public function penumpang(){
        $penumpang = Tiket::all();
        return view('admin.probadut.penumpang',["penumpang"=>$penumpang]);
    }
    public function sukses(){
        return view('probadut.sukses');
    }
}
