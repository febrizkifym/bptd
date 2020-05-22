<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;

class SuratController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(){
        $surat = Surat::all();
        $last_surat = Surat::latest("no_urut")->first();
        $no_urut = ((int)$last_surat->no_urut)+1;
        return view('admin.surat.index',["surat"=>$surat,"no_urut"=>$no_urut]);
    }
    public function post(Request $r){
        $this->validate($r, [
            'kode_surat' => 'required',
            'no_urut' => 'required',
            'tgl_surat' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'bulan' => 'required',
        ]);
        $cek_no = Surat::where("no_urut",$r->no_urut)->count();
        $s = new Surat;
        $s->kode_surat = $r->kode_surat;
        $s->no_urut = $r->no_urut;
        if($cek_no>0){
            $s->sub = $cek_no;
        }
        $s->tgl_surat = $r->tgl_surat;
        $s->perihal = $r->perihal;
        $s->tujuan = $r->tujuan;
        $s->bulan = $r->bulan;

        dd($s);
        // $s->save();
        // return redirect(route("surat.index"));
    }
}
