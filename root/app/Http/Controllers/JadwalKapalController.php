<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalKapal;
use App\Kapal;
use Carbon\Carbon;

class JadwalKapalController extends Controller
{
    public function index(){
        $data = JadwalKapal::all();
        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            foreach($data as $d){
                if($d->id_kapal == 1){
                    $kapal = "KMP. MOINIT (Rute Gorontalo-Pagimana)";
                }elseif ($d->id_kapal == 2){
                    $kapal = "KMP. TUNA TOMINI (Rute Gorontalo-Wakai-Ampana)";
                }elseif ($d->id_kapal == 3){
                    $kapal = "KMP. CENGKIH AFO (Rute Gorontalo-Dolong-Pasokan)";
                }
                if($d->keterangan == "kedatangan"){
                    $keterangan = "Tiba di Gorontalo";
                }else{
                    $keterangan = "Berangkat dari Gorontalo";
                }
                $jadwal[$d->id] = [
                    'id_kapal' => $d->id_kapal,
                    'kapal' => $kapal,
                    'tanggal' => $d->tanggal,
                    'keterangan' => $keterangan
                ];
            }
            return response($jadwal);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
    }
}
