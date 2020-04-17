<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Galeri;
use App\Berita;
use Carbon\Carbon;
use File;
use Image;

class GaleriController extends Controller
{
    public $path;
    public function __construct(){
        $this->middleware('auth');
        $this->path = public_path('img/galeri');

    }
    public function index(){
    //        $galeri = Galeri::groupBy('id_berita')->join('berita','galeri.id','=','berita.id')->get();
        $berita = Berita::all();
        return view('admin.galeri.index',['berita'=>$berita]);
    }
    public function detail($id){
        $berita = Berita::find($id);
        $galeri = Galeri::where('id_berita',$id)->get();
        return view('admin/galeri/detail',['galeri'=>$galeri,'berita'=>$berita,'id'=>$id]);
    }
    public function post(Request $r){
        $newid = (Galeri::where('id_berita',$r->id_berita)->count())+1;
        $g = new Galeri;
        $g->id_berita = $r->id_berita;

        $this->validate($r, [
            'path' => 'image|mimes:jpg,png,jpeg'
        ],[
            'image' => ':attribute harus berupa gambar',
            'mimes' => 'Format file harus berupa jpg,jpeg,png',
        ]);
        $now = Carbon::now();
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path,0777,true);
        }
        $gambar = $r->file('path');
        $gambar_filename = $now->year.''.$now->month.'_'.$g->id_berita.$newid. '.' . $gambar->getClientOriginalExtension();
        Image::make($gambar)->resize(1366,768,function($const){
            $const->aspectRatio();
        })->save($this->path.'/'.$gambar_filename);
        $g->path = $gambar_filename;
        $g->save();

        return redirect(route('galeri.detail',$r->id_berita));
    }
    public function delete($id){
        $galeri = Galeri::find($id);
        $galeri->delete();

        return redirect(route('berita.index'));
    }
}
