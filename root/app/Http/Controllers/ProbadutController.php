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
    public function get_tiket(Request $r){
        $tiket = Tiket::select('pbd_tiket.id','pbd_tiket.uid','pbd_tiket.nama','no_ktp','jenis_kelamin','agama','usia','pbd_kapal.nama as kapal','kelas','harga')->join('pbd_tarif','pbd_tiket.tarif','=','pbd_tarif.id')->join('pbd_kapal','pbd_tarif.id_kapal','=','pbd_kapal.id')->where('pbd_tiket.uid',$r->id)->first();
        if($tiket){
            $json = [
                'status' => '200',
                'nama' => $tiket->nama,
                'no_ktp' => $tiket->no_ktp,
                'jenis_kelamin' => $tiket->jenis_kelamin,
                'agama' => $tiket->agama,
                'usia' => $tiket->usia,
                'kapal' => $tiket->kapal,
                'kelas' => $tiket->kelas,
                'harga' => $tiket->harga,
        ];
        return response()->json($json,200);
        }else{
            $json = [
                'status' => '404',
            ];
            return response()->json($json,200);
        }
    }
    public function post(Request $r){
        $this->validate($r, [
            'noktp' => 'numeric',
        ],[
            'numeric' => 'No. KTP tidak valid.'
        ]);
        $cp = new Tiket;
        $cp->uid = $r->uid;
        $cp->no_ktp = $r->noktp;
        $cp->nama = $r->nama;
        $cp->jenis_kelamin = $r->jenis_kelamin;
        $cp->agama = $r->agama;
        $cp->usia = $r->usia;
        $tarif = TarifKapal::join("pbd_kapal","pbd_tarif.id_kapal","=","pbd_kapal.id")->where([
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
            "kapal"=>$tarif->nama,
            "kelas"=>$tarif->kelas,
            "tarif"=>$tarif->harga,
        ];
        return redirect(route('probadut.sukses'))->with('result',$array);
    }
    public function penumpang(){
        $penumpang = Tiket::select('pbd_tiket.id','pbd_tiket.uid','pbd_tiket.nama','no_ktp','jenis_kelamin','agama','usia','pbd_kapal.nama as kapal','kelas','harga')->join('pbd_tarif','pbd_tiket.tarif','=','pbd_tarif.id')->join('pbd_kapal','pbd_tarif.id_kapal','=','pbd_kapal.id')->get();
        return view('admin.probadut.penumpang',["penumpang"=>$penumpang]);
    }
    public function sukses(){
        return view('probadut.sukses');
    }
}