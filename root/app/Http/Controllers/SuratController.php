<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;
use App\Klasifikasi;
use App\Exports\SuratExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class SuratController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $surat = Surat::join("surat_klasifikasi","surat_klasifikasi.id","surat_arsip.id_klasifikasi")
                ->select("surat_arsip.id","kode","surat_klasifikasi.sub as klasifikasi_sub","tgl_surat","bulan","tujuan","perihal","ket","no_urut")
                ->get();
        $klasifikasi = Klasifikasi::orderBy('kode','asc')->get();
        if($surat->count()>0){
            $last_surat = Surat::latest("no_urut")->first();
            $no_urut = ((int)$last_surat->no_urut)+1;
        }else{
            $no_urut = 1;
        }
        return view('admin.surat.index',["surat"=>$surat,"no_urut"=>$no_urut,"klasifikasi"=>$klasifikasi]);
    }
    public function post(Request $r){
        $this->validate($r, [
            'no_urut' => 'required',
            'tgl_surat' => 'required',
            'perihal' => 'required',
            'tujuan' => 'required',
            'bulan' => 'required',
        ]);
        $cek_no = Surat::where("no_urut",$r->no_urut)->count();
        $s = new Surat;
        $s->id_klasifikasi = $r->id_klasifikasi;
        $s->no_urut = $r->no_urut;
        if($cek_no>0){
            $s->sub = $cek_no;
        }
        $s->tgl_surat = $r->tgl_surat;
        $s->perihal = $r->perihal;
        $s->tujuan = $r->tujuan;
        $s->bulan = $r->bulan;

        // dd($s);
        $s->save();
        return redirect(route("surat.index"));
    }
    public function delete($id){
        $surat = Surat::find($id);
        $surat->delete();
        return redirect(route('surat.index'));
    }
    public function edit($id){
        $klasifikasi = Klasifikasi::all();
        $surat = Surat::find($id);
        return view('admin.surat.edit',['s'=>$surat,'klasifikasi'=>$klasifikasi]);
    }
    public function update(Request $r, $id){
        //cek no_urut exist
        $cekno = Surat::where("no_urut",$r->no_urut)->where("id","!=",$id)->count();

        $surat = Surat::find($id);
        $surat->kode_surat = $r->kode_surat;
        $surat->no_urut = $r->no_urut;
        if($cekno>0){
            $surat->sub = $cekno;
        }elseif($cekno == 0){
            $surat->sub = NULL;
        }
        $surat->tgl_surat = $r->tgl_surat;
        $surat->perihal = $r->perihal;
        $surat->tujuan = $r->tujuan;
        $surat->bulan = $r->bulan;
        $surat->ket = $r->ket;

        $surat->save();
        return redirect(route("surat.index"));
    }
    public function export(Request $r){
        $data = [
            'id_klasifikasi'=>$r->id_klasifikasi,
            'bulan'=>$r->bulan,
            'tahun'=>$r->tahun,
        ];
        $now = Carbon::now();
        $filename = "Surat_".$now->day.'_'.$now->month.'_'.$now->year.'.xlsx';
        return Excel::download(new SuratExport($data),$filename);
    }
    //
    public function klasifikasi(){
        $klasifikasi = Klasifikasi::all();
        return view("admin.klasifikasi.index",["klasifikasi"=>$klasifikasi]);
    }
    public function klasifikasi_post(Request $r){
        $k = new Klasifikasi;
        $k->klasifikasi = $r->klasifikasi;
        $k->kode = $r->kode;
        $k->sub = $r->sub;
        $k->keterangan = $r->keterangan;
        $k->save();

        return redirect(route("surat.klasifikasi"));
    }
    public function klasifikasi_delete($id){
        $k = Klasifikasi::find($id);
        $k->delete();

        return redirect(route("surat.klasifikasi"));
    }
    public function klasifikasi_edit($id){
        $k = Klasifikasi::find($id);
        return view("admin.klasifikasi.edit",["k"=>$k]);
    }
    public function klasifikasi_update(Request $r,$id){
        $k = Klasifikasi::find($id);
        $k->klasifikasi = $r->klasifikasi;
        $k->kode = $r->kode;
        $k->sub = $r->sub;
        $k->keterangan = $r->keterangan;
        $k->save();

        return redirect(route("surat.klasifikasi"));
    }
}
