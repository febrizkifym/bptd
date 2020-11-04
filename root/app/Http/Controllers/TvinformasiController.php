<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KegiatanPimpinan;
use App\Pagu;
use App\Beranda;
use Carbon\Carbon;
use Telegram;

class TvinformasiController extends Controller
{
    public function __construct(){
        setlocale(LC_ALL, 'IND'); Carbon::setLocale('IND');
    }
    public function index(){
        $format = Carbon::now()->subDays(2);
        $tanggal = $format->year.'-'.$format->month.'-'.$format->day;
        $kegiatan = KegiatanPimpinan::take(10)->orderBy("date","desc");
        $kegiatan1 = $kegiatan->take(5)->get();
        $kegiatan2 = $kegiatan->skip(5)->take(5)->get();
        $pagu = Pagu::orderby("tanggal","desc")->first();
        return view('tvinformasi',['kegiatan1'=>$kegiatan1,'kegiatan2'=>$kegiatan2,'pagu'=>$pagu]);
    }
    public function edit(){
        $b = Beranda::first();
        return view('admin/tvinformasi/index',['b'=>$b]);
    }
    public function update(Request $r){
        $b = Beranda::first();
        $b->video = $r->video;
        $b->runningtext = $r->runningtext;

        $b->save();
        return redirect(route('tvinformasi.index'));
    }
    // 
    public function kegiatan_index(){
        $kegiatan = KegiatanPimpinan::all();
        return view('admin.tvinformasi.kegiatan',['kegiatan'=>$kegiatan]);
    }
    public function kegiatan_post(Request $r){
        $k = new KegiatanPimpinan;
        $k->kegiatan = $r->kegiatan;
        $k->date = $r->date;
        $k->keterangan = $r->keterangan;
        $k->save();

        $telegram_msg = "       __**INFO KEGIATAN BPTD**__

📌**Kegiatan :** $r->kegiatan.

🗓**Tanggal :** $r->date.

✉️**Yang Akan Menghadiri :** $r->keterangan.

Demikian informasi disampaikan, Terimakasih🙏";
        
        Telegram::sendMessage([
            'chat_id' => '@infobptd',
            'text' => $telegram_msg,
            'parse_mode' => 'markdown',
        ]);

        return redirect(route('tvinformasi.kegiatan'));
    }
    public function kegiatan_delete($id){
        $k = KegiatanPimpinan::find($id);
        $k->delete();

        return redirect(route('tvinformasi.kegiatan'));
    }
    public function kegiatan_edit($id){
        $k = KegiatanPimpinan::find($id);
        return view('admin.tvinformasi.kegiatan_edit',['k'=>$k]);
    }
    public function kegiatan_update(Request $r,$id){
        $k = KegiatanPimpinan::find($id);
        $k->kegiatan = $r->kegiatan;
        $k->date = $r->date;
        $k->keterangan = $r->keterangan;

        $k->save();
        return redirect(route('tvinformasi.kegiatan'));
    }
    //
    public function pagu_index(){
        $pagu = Pagu::orderby("tanggal","desc")->get();
        return view("admin.tvinformasi.pagu",['pagu'=>$pagu]);
    }
    public function pagu_post(Request $r){
        $p = new Pagu;
        $p->tanggal = $r->tanggal;
        $p->belanja_pegawai = $r->belanja_pegawai;
        $p->belanja_modal = $r->belanja_modal;
        $p->belanja_barang = $r->belanja_barang;
        $p->total = $r->total;
        $p->save();

        return redirect(route("tvinformasi.pagu"));
    }
    public function pagu_delete($id){
        $pagu = Pagu::find($id);
        $pagu->delete();

        return redirect(route("tvinformasi.pagu"));
    }
}
