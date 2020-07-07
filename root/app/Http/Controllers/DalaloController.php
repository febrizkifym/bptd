<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
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
    public function titik_delete($id){
        $titik = Titik::find($id);
        $titik->delete();
        return redirect(route("dalalo.ruas_detail",$titik->id_ruas))->with(['pesan'=>'Data berhasil dihapus.']);
    }
    public function titik_post(Request $r){
        // dd($r);
        $t = new Titik;
        $t->id_ruas = $r->id_ruas;
        $t->tabel_kd = $r->tabel_kd;
        $t->tahun = $r->tahun;
        $t->x = $r->x;
        $t->y = $r->y;
        $t->created_by = Auth::user()->id;
        $t->save();
        return redirect(route("dalalo.ruas_detail",$t->id_ruas))->with(['pesan'=>'Data berhasil ditambahkan.']);
    }
    //ruas
    public function ruas(){
        $ruas = Ruas::all();
        return view("admin.dalalo.ruas",['ruas'=>$ruas]);
    }
    public function ruas_detail($id){
        $ruas = Ruas::find($id);
        $titik = Titik::select("dalalo_titik.*","dalalo_ruas.nama","dalalo_ruas.daerah","dalalo_ruas.kecamatan")->where("id_ruas",$id)->join("dalalo_ruas","dalalo_ruas.id","dalalo_titik.id_ruas")->get();
        // dd($titik);
        return view("admin.dalalo.ruas_detail",['titik'=>$titik,'ruas'=>$ruas]);
    }
    public function ruas_post(Request $r){
        $ruas = new Ruas;
        $ruas->nama = $r->nama;
        $ruas->daerah = $r->daerah;
        $ruas->kecamatan = $r->kecamatan;
        $ruas->created_by = Auth::user()->id;
        $ruas->save();
        return redirect(route("dalalo.ruas_dashboard"))->with(['pesan'=>'Data berhasil ditambahkan.']);
    }
    public function ruas_delete($id){
        if(Titik::where('id_ruas',$id)->exists()){
            return redirect(route("dalalo.ruas_dashboard"))->with(['pesan'=>'Data gagal dihapus. Silahkan kontak admin.']);
        }else{    
            $ruas = Ruas::find($id);
            $ruas->delete();
            return redirect(route("dalalo.ruas_dashboard"))->with(['pesan'=>'Data berhasil dihapus.']);
        }
    }
}
