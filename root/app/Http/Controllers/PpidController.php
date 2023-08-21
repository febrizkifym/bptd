<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ppid;
use Carbon\Carbon;
use File;
use Storage;
use Auth;

class PpidController extends Controller
{
    public $path;
    public function __construct(){
        $this->middleware('auth');
        $this->path = public_path('berkas_ppid');
    }
    public function index(){
        $ppid = Ppid::orderBy("tanggal","desc")->get();
        return view('admin.ppid.index',[
            'ppid' => $ppid,
        ]);
    }
    public function post(Request $r){
        // dd($r);
        $this->validate($r, [
            'file' => 'required|mimes:pdf,xlsx,docx,doc|max:3072',
        ],[
            'required' => 'File berkas harus diupload',
            'mimes' => 'Format file harus berupa PDF,XLSX,atau DOCX',
            'max' => 'Ukuran file tidak bisa lebih dari 3 MB',
        ]);
        if(!File::isDirectory($this->path)){
            File::makeDirectory($this->path,0777,true);
        }

        $p = new Ppid;
        $p->tanggal = $r->tanggal;
        $p->judul = $r->judul;
        $p->jenis = $r->jenis;
        $p->deskripsi = $r->deskripsi;
        //file
        $file = $r->file('file');
        $filename = $p->judul.'.'.$file->getClientOriginalExtension();
        $path = public_path().'/berkas_ppid/';
        $file->move($path,$filename);
        $p->file = $filename;
        //endfile
        $p->save();

        return redirect(route('ppid.index'));
    }
    public function update(Request $r,$id){
        // dd($r);

        $p = Ppid::find($id);
        $p->tanggal = $r->tanggal;
        $p->judul = $r->judul;
        $p->jenis = $r->jenis;
        $p->deskripsi = $r->deskripsi;
        $p->save();

        return redirect(route('ppid.index'));
    }
    public function edit(Request $r,$id){
        $p = Ppid::find($id);
        return view('admin.ppid.edit',[
            'p' => $p,
        ]);
    }
    public function delete($id){
        $p = Ppid::find($id);
        $path = 'berkas_ppid/'.$p->file;
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
        $p->delete();
        return redirect(route('ppid.index'));
    }
}
