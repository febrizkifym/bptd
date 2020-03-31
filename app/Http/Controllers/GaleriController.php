<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeri;
use App\Berita;

class GaleriController extends Controller
{
    public $path;
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
//        $galeri = Galeri::groupBy('id_berita')->join('berita','galeri.id','=','berita.id')->get();
        $berita = Berita::where('jenis',1)->get();
        return view('admin.galeri.index',['berita'=>$berita]);
//        dd($galeri);
    }
    public function detail($id){
        $galeri = Galeri::where('id_berita',$id)->get();
        return view('admin/galeri/detail',['galeri'=>$galeri,'id'=>$id]);
    }
    public function add($id){
        $berita = Berita::where('id',$id)->first();
        return view('admin/galeri/add',['id'=>$id,'berita'=>$berita]);
    }
}
