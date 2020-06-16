<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kapal;
use App\TarifKapal;

class KapalController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $kapal = Kapal::all();
        return view("admin.kapal.index",["kapal"=>$kapal]);
    }
    public function post(Request $r){
        $k = new Kapal;
        $k->kd_kapal = $r->kd_kapal;
        $k->nama = $r->nama;
        $k->tujuan = $r->tujuan;

        $k->save();
        return redirect(route("kapal.index"));
    }
    public function delete($id){
        $kapal = Kapal::find($id);
        $kapal->delete();
        return redirect(route("kapal.index"));
    }
    public function edit($id){
        $k = Kapal::find($id);
        return view("admin.kapal.edit",["k"=>$k]);
    }
    public function update($id,Request $r){
        $k = Kapal::find($id);
        $k->kd_kapal = $r->kd_kapal;
        $k->nama = $r->nama;
        $k->tujuan = $r->tujuan;

        $k->save();
        return redirect(route("kapal.index"));
    }
    public function detail($id){
        $k = Kapal::find($id);
        $tarif = collect();
        //variable declaring
            $vip_dewasa = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","vip"],
                ["jenis_usia","=","1"],
            ]);
            $vip_anak = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","vip"],
                ["jenis_usia","=","2"],
            ]);
            $bisnis_dewasa = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","bisnis"],
                ["jenis_usia","=","1"],
            ]);
            $bisnis_anak = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","bisnis"],
                ["jenis_usia","=","2"],
            ]);
            $ekonomi_dewasa = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","ekonomi"],
                ["jenis_usia","=","1"],
            ]);
            $ekonomi_anak = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","ekonomi"],
                ["jenis_usia","=","2"],
            ]);
            $golongan_1 = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","1"],
                ["jenis_usia","=",null],
            ]);
            $golongan_2 = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","2"],
                ["jenis_usia","=",null],
            ]);
            $golongan_3 = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","3"],
                ["jenis_usia","=",null],
            ]);
            $golongan_4penumpang = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","4a"],
                ["jenis_usia","=",null],
            ]);
            $golongan_4barang = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","4a"],
                ["jenis_usia","=",null],
            ]);
            $golongan_5penumpang = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","5a"],
                ["jenis_usia","=",null],
            ]);
            $golongan_5barang = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","5b"],
                ["jenis_usia","=",null],
            ]);
            $golongan_6penumpang = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","6a"],
                ["jenis_usia","=",null],
            ]);
            $golongan_6barang = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","6b"],
                ["jenis_usia","=",null],
            ]);
            $golongan_7 = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","7"],
                ["jenis_usia","=",null],
            ]);
            $golongan_8 = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","8"],
                ["jenis_usia","=",null],
            ]);
            $golongan_9 = TarifKapal::where([
                ["id_kapal","=",$id],
                ["kelas","=","9"],
                ["jenis_usia","=",null],
            ]);
        //end variable declaring
        //storing to variable tarif
            if($vip_dewasa->exists()){$tarif->push(['nama'=>'Bisnis I Dewasa (VIP)','tarif'=>$vip_dewasa->first()->harga,'kelas'=>$vip_dewasa->first()->kelas,'jenis_usia'=>$vip_dewasa->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Bisnis I Dewasa (VIP)','tarif'=>null,'kelas'=>'vip','jenis_usia'=>'1']);
            }
            if($vip_anak->exists()){$tarif->push(['nama'=>'Bisnis I Anak (VIP)','tarif'=>$vip_anak->first()->harga,'kelas'=>$vip_anak->first()->kelas,'jenis_usia'=>$vip_anak->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Bisnis I Anak (VIP)','tarif'=>null,'kelas'=>'vip','jenis_usia'=>'2']);
            }
            if($bisnis_dewasa->exists()){$tarif->push(['nama'=>'Bisnis II Dewasa','tarif'=>$bisnis_dewasa->first()->harga,'kelas'=>$bisnis_dewasa->first()->kelas,'jenis_usia'=>$bisnis_dewasa->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Bisnis II Dewasa','tarif'=>null,'kelas'=>'bisnis','jenis_usia'=>'1']);
            }
            if($bisnis_anak->exists()){$tarif->push(['nama'=>'Bisnis II Anak','tarif'=>$bisnis_anak->first()->harga,'kelas'=>$bisnis_anak->first()->kelas,'jenis_usia'=>$bisnis_anak->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Bisnis II Anak','tarif'=>null,'kelas'=>'bisnis','jenis_usia'=>'2']);
            }
            if($ekonomi_dewasa->exists()){$tarif->push(['nama'=>'Ekonomi Dewasa','tarif'=>$ekonomi_dewasa->first()->harga,'kelas'=>$ekonomi_dewasa->first()->kelas,'jenis_usia'=>$ekonomi_dewasa->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Ekonomi Dewasa','tarif'=>null,'kelas'=>'ekonomi','jenis_usia'=>'1']);
            }
            if($ekonomi_anak->exists()){$tarif->push(['nama'=>'Ekonomi Anak','tarif'=>$ekonomi_anak->first()->harga,'kelas'=>$ekonomi_anak->first()->kelas,'jenis_usia'=>$ekonomi_anak->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Ekonomi Anak','tarif'=>null,'kelas'=>'ekonomi','jenis_usia'=>'2']);
            }
            if($golongan_1->exists()){$tarif->push(['nama'=>'Golongan I','tarif'=>$golongan_1->first()->harga,'kelas'=>$golongan_1->first()->kelas,'jenis_usia'=>$golongan_1->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan I','tarif'=>null,'kelas'=>'1','jenis_usia'=>null]);
            }
            if($golongan_2->exists()){$tarif->push(['nama'=>'Golongan II','tarif'=>$golongan_2->first()->harga,'kelas'=>$golongan_2->first()->kelas,'jenis_usia'=>$golongan_2->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan II','tarif'=>null,'kelas'=>'2','jenis_usia'=>null]);
            }
            if($golongan_3->exists()){$tarif->push(['nama'=>'Golongan III','tarif'=>$golongan_3->first()->harga,'kelas'=>$golongan_3->first()->kelas,'jenis_usia'=>$golongan_3->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan III','tarif'=>null,'kelas'=>'3','jenis_usia'=>null]);
            }
            if($golongan_4penumpang->exists()){$tarif->push(['nama'=>'Golongan IV (Penumpang)','tarif'=>$golongan_4penumpang->first()->harga,'kelas'=>$golongan_4penumpang->first()->kelas,'jenis_usia'=>$golongan_4penumpang->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan IV (Penumpang)','tarif'=>null,'kelas'=>'4a','jenis_usia'=>null]);
            }
            if($golongan_4barang->exists()){$tarif->push(['nama'=>'Golongan IV (Barang)','tarif'=>$golongan_4barang->first()->harga,'kelas'=>$golongan_4barang->first()->kelas,'jenis_usia'=>$golongan_4barang->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan IV (Barang)','tarif'=>null,'kelas'=>'4b','jenis_usia'=>null]);
            }
            if($golongan_5penumpang->exists()){$tarif->push(['nama'=>'Golongan V (Penumpang)','tarif'=>$golongan_5penumpang->first()->harga,'kelas'=>$golongan_5penumpang->first()->kelas,'jenis_usia'=>$golongan_5penumpang->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan V (Penumpang)','tarif'=>null,'kelas'=>'5a','jenis_usia'=>null]);
            }
            if($golongan_5barang->exists()){$tarif->push(['nama'=>'Golongan V (Barang)','tarif'=>$golongan_5barang->first()->harga,'kelas'=>$golongan_5barang->first()->kelas,'jenis_usia'=>$golongan_5barang->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan V (Barang)','tarif'=>null,'kelas'=>'5b','jenis_usia'=>null]);
            }
            if($golongan_6penumpang->exists()){$tarif->push(['nama'=>'Golongan VI (Penumpang)','tarif'=>$golongan_6penumpang->first()->harga,'kelas'=>$golongan_6penumpang->first()->kelas,'jenis_usia'=>$golongan_6penumpang->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan VI (Penumpang)','tarif'=>null,'kelas'=>'6a','jenis_usia'=>null]);
            }
            if($golongan_6barang->exists()){$tarif->push(['nama'=>'Golongan VI (Barang)','tarif'=>$golongan_6barang->first()->harga,'kelas'=>$golongan_6barang->first()->kelas,'jenis_usia'=>$golongan_6barang->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan VI (Barang)','tarif'=>null,'kelas'=>'6b','jenis_usia'=>null]);
            }
            if($golongan_7->exists()){$tarif->push(['nama'=>'Golongan VII','tarif'=>$golongan_7->first()->harga,'kelas'=>$golongan_7->first()->kelas,'jenis_usia'=>$golongan_7->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan VII','tarif'=>null,'kelas'=>'7','jenis_usia'=>null]);
            }
            if($golongan_8->exists()){$tarif->push(['nama'=>'Golongan VIII','tarif'=>$golongan_8->first()->harga,'kelas'=>$golongan_8->first()->kelas,'jenis_usia'=>$golongan_8->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan VIII','tarif'=>null,'kelas'=>'8','jenis_usia'=>null]);
            }
            if($golongan_9->exists()){$tarif->push(['nama'=>'Golongan IX','tarif'=>$golongan_9->first()->harga,'kelas'=>$golongan_9->first()->kelas,'jenis_usia'=>$golongan_9->first()->jenis_usia]);}else{
                $tarif->push(['nama'=>'Golongan IX','tarif'=>null,'kelas'=>'9','jenis_usia'=>null]);
            }
        // end storing
        return view("admin.kapal.detail",["no"=>$no=1,"k"=>$k,"tarif"=>$tarif]);
    }
    public function tarif(Request $r){
        if(isset($r->kapal) && isset($r->kelas)){
            $tarif = TarifKapal::where([
                ['id_kapal',$r->kapal],
                ['kelas',$r->kelas],
                ['jenis_usia',$r->usia],
            ])->first();
            if($tarif){
                return view("admin.kapal.tarif",["t"=>$tarif,"id_kapal"=>$r->kapal,"kelas"=>$r->kelas,"jenis_usia"=>$r->usia]);
            }else{
                return view("admin.kapal.tarif",["id_kapal"=>$r->kapal,"kelas"=>$r->kelas,"jenis_usia"=>$r->usia]);
            }
        }else{
            return abort(404);
        }
    }
    public function update_tarif(Request $r){
        $tarif = TarifKapal::updateOrCreate(
            //cari
            ['id_kapal'=>$r->id_kapal,
            'kelas'=>$r->kelas,
            'jenis_usia'=>$r->jenis_usia],
            //ubah
            ['harga'=>$r->harga]
        );
        return redirect(route("kapal.detail",$r->id_kapal));
    }
}
