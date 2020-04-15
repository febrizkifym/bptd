<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Satpel;
use App\Berita;
use App\Galeri;
use App\Beranda;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::where('public',1)->orderby('created_at','desc')->take(6)->get();
        $b = Beranda::first();
        return view('beranda',['berita'=>$berita,'b'=>$b]);
    }
    public function sejarah()
    {
        $b = Beranda::first();
        return view('sejarah',['b'=>$b]);
    }
    public function satpel($id)
    {
        $sp = Satpel::find($id);
        return view('satpel',['sp' => $sp]);
    }
    public function galeri()
    {
        $berita = Galeri::join('web_berita','web_galeri.id_berita','web_berita.id')->groupBy('id_berita')->get();
        return view('galeri',['berita'=>$berita]);
    }
    public function berita()
    {
        $berita = Berita::where('public',1)->get();
        $terpopuler = Berita::orderby('view_count','desc')->take(3)->get();
        return view('berita',['berita'=>$berita,'terpopuler'=>$terpopuler]);
    }
    public function single($id,$slug){
        $b = Berita::find($id);
        $terpopuler = Berita::orderby('view_count','desc')->take(3)->get();
        if($slug == $b->slug){
            $b->view_count++;
            $b->save();
            return view('single',['b'=>$b,'terpopuler'=>$terpopuler]);
        }else{
            return abort(404);
        }
    }
}
